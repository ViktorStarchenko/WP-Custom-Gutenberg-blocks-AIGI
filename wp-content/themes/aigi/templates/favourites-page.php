<?php
/*
Template Name: Reading list template
*/
?>

<?php get_header();?>

<?php
$user_id = get_current_user_id();
$reading_list = get_user_favorites($user_id);
$paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
?>
<div class="wrapper-full-width content-wrapper search-page__top">
    <div class="search-page__header wrapper-1245 ">
        <div class="search-page__heading">
            <p class="search-page_title">Reading list</p>
            <p class="search-page_desc"><? echo count($reading_list)?> reading contents on your list</p>
        </div>
        <div class="search-page__sorting">
            <div class="filter-button">
                <img src="/wp-content/themes/aigi/assets/images/filter.svg" alt="filter">
            </div>
<!--            --><?php //echo do_shortcode('[facetwp facet="sort_by_relevance"]'); ?>
            <div class="facetwp-facet" data-name="sort_by_relevance" data-type="sort">
                <select class="sorting-wish-selector">
                    <option value="">Sort by</option>
                    <option value="newes" data-order="1">Newes</option>
                    <option value="oldest" data-order="-1">Oldest</option>
                    <option value="relevance">Relevance</option>
                </select>
            </div>

        </div>
    </div>
</div>
<div class="content-wrapper wrapper-1245">
    <div class="post-tile__list landing-page search-page__results favourites-page">
        <div class="facetwp-template" data-name="landing_page_result">
            <div class="favor-sorted-posts" data-paged="<? echo $paged;?>">
                <?php
                $sort_info = $_COOKIE["sortType"];

                if($sort_info === 'newes'){
                    $query = new WP_Query( [
                        'paged' => $paged,
                        'post_type' => array( 'post', 'page', 'resource' ),
                        'posts_per_page' => 5,
                        'post__in'  => $reading_list,
                        'orderby' => 'date',
                        'order'   => 'DESC',
                    ] );
                } elseif ($sort_info === 'oldest'){
                    $query = new WP_Query( [
                        'paged' => $paged,
                        'post_type' => array( 'post', 'page', 'resource' ),
                        'posts_per_page' => 5,
                        'post__in'  => $reading_list,
                        'orderby' => 'date',
                        'order'   => 'ASC',
                    ] );
                } elseif($sort_info === 'relevance'){
                    $query = new WP_Query( [
                        'paged' => $paged,
                        'post_type' => array( 'post', 'page', 'resource' ),
                        'posts_per_page' => 5,
                        'post__in'  => $reading_list,
                        'orderby' => 'post_views_count',
                        'order'   => 'DESC',
                    ] );
                } else {
                    $query = new WP_Query( [
                        'paged' => $paged,
                        'post_type' => array( 'post', 'page', 'resource' ),
                        'posts_per_page' => 5,
                        'post__in'  => $reading_list,
                        'orderby' => 'date',
                        'order'   => 'DESC',
                    ] );
                }

//                for($i=0; $i < count($query->posts); $i++){
//                    echo $query->posts[$i]->ID.'; ';
//                }

                while ( $query->have_posts() ) {
                    $query->the_post();

                    $bg_image = '';
                    if (get_field('add_diagram')) {
                        $bg_image = get_field('add_diagram');
                    } else if (get_field('td_resource_image')) {
                        $bg_image = get_field('td_resource_image')['url'];
                    } else {
                        $bg_image = get_the_post_thumbnail_url('full' );
                    }

                    if(get_post_type() == 'resource'){
                        $term_list = wp_get_post_terms( get_the_ID(), 'topic', array('fields' => 'all'));
                    }

                    if (get_field('td_resource_teaser')) {
                        $excerpt = get_field('td_resource_teaser');
                    } else if (get_field('add_text')) {
                        $excerpt = get_field('add_text');
                    } else if (get_the_excerpt()){
                        $excerpt = get_the_excerpt();
                    } else if (get_the_content()) {
                        $excerpt = get_the_content();
                    } else {
                        $excerpt = '';
                    }

                    ?>

                    <div class="post-tile__wrap  resource image post-<? echo get_the_id();?> mob-style-2" data-date="<?php echo strtotime(get_the_date('Y-m-d H:i:s'));?>" data-views="<?php echo get_post_meta( get_the_ID(), 'post_views_count', true ); ?>">
                        <div class="post-tile__img-box">
                            <div class="post-tile__img">
                                <?php if ($bg_image != '' || $bg_image != NULL) { ?>
                                    <img class="post-tile__thumb" src="<?php echo $bg_image ?>" alt="<?php echo get_the_title(); ?>">
                                <?php } ?>
                            </div>
                        </div>
                        <div class="post-tile__content">
                            <div class="post-tile__content-header">
                                <div class="post-tile__left">
                            <span class="post-tile__pub-date">
                                <?php echo get_the_date('M d Y');?>
                            </span>
                                </div>
                                <div class="post-tile__right">
                                    <?php if (get_field('time_to_read')): ?>
                                        <span class="post-tile__time"><?php echo get_field('time_to_read'); ?> read</span>
                                    <?php endif ?>
                                    <span><?php echo do_shortcode('[favorite_button]') ?></span>
                                </div>
                            </div>
                            <div class="post-tile__content-body">
                                <div class="post-tile__tags">
                                    <?php foreach ($term_list as $term) : ?>
                                        <a class="content-tags__item" href="/search?_content_tags=<?php echo $term->slug ?>" data-tem-id="<?php echo  $term->term_id ?>"><?php echo $term->name ?></a>
                                    <?php endforeach ?>
                                </div>
                                <div class="post-tile__title">
                                    <span><? echo get_the_title();?></span>
                                </div>
                                <div class="post-tile__excerpt">
                                    <p><?php echo get_custom_excerpt($excerpt, 213, true) ?></p>
                                </div>
                            </div>
                            <div class="post-tile__content-footer">
                                <a href="<?echo get_post_permalink() ?>" class="btn-body btn-transparent triangle after Between">
                                    <span class="btn-inner">READ MORE</span>
                                </a>
                            </div>
                        </div>
                    </div>

                <?php } ?>
            </div>
<!--            <input type="button" value="Сортировать" data-order="1" />-->
            <div class="search-pagination">
                <div class="search-pagination__info">
<!--                    You've viewed <span class="search-pagination__per-page">--><?php //echo FWP()->facet->pager_args['per_page']; ?><!--</span> of <span class="search-pagination__total-rows">--><?php //echo FWP()->facet->pager_args['total_rows']; ?><!--</span> events-->
                    <?php  $big = 5;
                    $next_text = '▶';
                    $prev_text = '◀';
                    echo paginate_links( array(
                        'base'    => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                        'current' => max( 1, get_query_var('paged') ),
                        'total'   => $query->max_num_pages,
                        'prev_text'    => __($prev_text),
                        'next_text'    => __($next_text),
                    ) ); ?>
                </div>
<!--                --><?php //echo do_shortcode('[facetwp facet="pager_"]'); ?>

            </div>
            <?
//                foreach($reading_list as $single_post){
//                    $bg_image = '';
//                    if (get_field('add_diagram', $single_post)) {
//                        $bg_image = get_field('add_diagram', $single_post);
//                    } else if (get_field('td_resource_image', $single_post)) {
//                        $bg_image = get_field('td_resource_image', $single_post)['url'];
//                    } else {
//                        $bg_image = get_the_post_thumbnail_url( $single_post, 'full' );
//                    }
//
//                    if(get_post_type($single_post) == 'resource'){
//                        $term_list = wp_get_post_terms($single_post, 'topic', array('fields' => 'all'));
//                    }
//
//                    if (get_field('td_resource_teaser', $single_post)) {
//                        $excerpt = get_field('td_resource_teaser', $single_post);
//                    } else if (get_field('add_text', $single_post)) {
//                        $excerpt = get_field('add_text', $single_post);
//                    } else if (get_the_excerpt($single_post)){
//                        $excerpt = get_the_excerpt($single_post);
//                    } else if (get_the_content($single_post)) {
//                        $excerpt = get_the_content($single_post);
//                    } else {
//                        $excerpt = '';
//                    }
//                    ?>
<!--                        <div class="post-tile__wrap  resource image post---><?// echo $single_post;?><!-- mob-style-2">-->
<!--                            <div class="post-tile__img-box">-->
<!--                                <div class="post-tile__img">-->
<!--                                    --><?php //if ($bg_image != '' || $bg_image != NULL) { ?>
<!--                                        <img class="post-tile__thumb" src="--><?php //echo $bg_image ?><!--" alt="--><?php //echo get_the_title($single_post); ?><!--">-->
<!--                                    --><?php //} ?>
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div class="post-tile__content">-->
<!--                                <div class="post-tile__content-header">-->
<!--                                    <div class="post-tile__left">-->
<!--                                            <span class="post-tile__pub-date">-->
<!--                                                --><?php //echo get_the_date('M d Y', $single_post);?>
<!--                                            </span>-->
<!--                                    </div>-->
<!--                                    <div class="post-tile__right">-->
<!--                                        --><?php //if (get_field('time_to_read', $single_post)): ?>
<!--                                            <span class="post-tile__time">--><?php //echo get_field('time_to_read', $single_post); ?><!-- read</span>-->
<!--                                        --><?php //endif ?>
<!--                                        <span>--><?php //echo do_shortcode('[favorite_button]') ?><!--</span>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <div class="post-tile__content-body">-->
<!--                                    <div class="post-tile__tags">-->
<!--                                        --><?php //foreach ($term_list as $term) : ?>
<!--                                            <a class="content-tags__item" href="/search?_content_tags=--><?php //echo $term->slug ?><!--" data-tem-id="--><?php //echo  $term->term_id ?><!--">--><?php //echo $term->name ?><!--</a>-->
<!--                                        --><?php //endforeach ?>
<!--                                    </div>-->
<!--                                    <div class="post-tile__title">-->
<!--                                        <span>--><?// echo get_the_title($single_post);?><!--</span>-->
<!--                                    </div>-->
<!--                                    <div class="post-tile__excerpt">-->
<!--                                        <p>--><?php //echo get_custom_excerpt($excerpt, 213, true) ?><!--</p>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <div class="post-tile__content-footer">-->
<!--                                    <a href="--><?//echo get_post_permalink($single_post) ?><!--" class="btn-body btn-transparent triangle after Between">-->
<!--                                        <span class="btn-inner">READ MORE</span>-->
<!--                                    </a>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    var_dump($single_posts);-->
<!--                --><?// }
//            ?>
        </div>
    </div>
</div>

<?php get_footer();?>