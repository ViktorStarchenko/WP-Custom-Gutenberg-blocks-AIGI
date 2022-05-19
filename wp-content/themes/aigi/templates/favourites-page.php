<?php
/*
Template Name: Reading list template
*/
?>

<?php get_header();?>

<?php
if ( is_user_logged_in() ) {
    $user_id = get_current_user_id();
    $reading_list = get_user_favorites($user_id);
    $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
    $sort_info = $_COOKIE["sortType"];
}

?>
<div class="wrapper-full-width content-wrapper search-page__top landing__filter-block">
    <div class="search-page__header wrapper-1245 ">
        <div class="search-page__heading">
            <p class="search-page_title">Reading list</p>
            <p class="search-page_desc">
                <?php $reading_list_new = get_user_favorites($user_id);
                echo(count($reading_list_new, COUNT_RECURSIVE)); ?> reading contents on your list</p>
        </div>
        <div class="search-page__sorting">
            <div class="filter-button">
                <img src="/wp-content/themes/aigi/assets/images/filter.svg" alt="filter">
            </div>
<!--            --><?php //echo do_shortcode('[facetwp facet="sort_by_relevance"]'); ?>
            <div class="facetwp-facet" data-name="sort_by_relevance" data-type="sort">
                <select class="sorting-wish-selector">
                    <?php if($sort_info === 'newes'){
                        echo '<option value="newes" data-order="1" selected>Newest</option>';
                    } else {
                        echo '<option value="newes" data-order="1">Newest</option>';
                    }
                    if($sort_info === 'oldest'){
                        echo '<option value="oldest" data-order="-1" selected>Oldest</option>';
                    } else {
                        echo '<option value="oldest" data-order="-1">Oldest</option>';
                    }
                    if($sort_info === 'relevance'){
                        echo '<option value="relevance" selected>Relevance</option>';
                    } else{
                        echo '<option value="relevance">Relevance</option>';
                    }
                    if($sort_info === '' || $sort_info === NULL){
                        echo '<option value="" selected>Sort by</option>';
                    } else {
                        echo '<option value="">Sort by</option>';
                    }
                    ?>
                </select>
            </div>

        </div>
    </div>
</div>
<?php if(!empty($reading_list) && is_user_logged_in()){?>
<div class="content-wrapper wrapper-1245">
    <div class="post-tile__list landing-page search-page__results favourites-page">
        <div class="facetwp-template" data-name="landing_page_result">
            <div class="favor-sorted-posts" data-paged="<? echo $paged;?>">
                <?php

                if($sort_info === 'newes'){
                    $query = new WP_Query( [
                        'paged' => $paged,
                        'post_type' => array( 'post', 'page', 'resource', 'news', 'toolkit', 'case_studies' ),
                        'posts_per_page' => 5,
                        'post__in'  => $reading_list,
                        'orderby' => 'date',
                        'order'   => 'DESC',
                    ] );
                } elseif ($sort_info === 'oldest'){
                    $query = new WP_Query( [
                        'paged' => $paged,
                        'post_type' => array( 'post', 'page', 'resource', 'news', 'toolkit', 'case_studies' ),
                        'posts_per_page' => 5,
                        'post__in'  => $reading_list,
                        'orderby' => 'date',
                        'order'   => 'ASC',
                    ] );
                } elseif($sort_info === 'relevance'){
                    $query = new WP_Query( [
                        'paged' => $paged,
                        'post_type' => array( 'post', 'page', 'resource', 'news', 'toolkit', 'case_studies' ),
                        'posts_per_page' => 5,
                        'post__in'  => $reading_list,
                        'orderby' => 'post_views_count',
                        'order'   => 'DESC',
                    ] );
                } else {
                    $query = new WP_Query( [
                        'paged' => $paged,
                        'post_type' => array( 'post', 'page', 'resource', 'news', 'toolkit', 'case_studies' ),
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
                    if (get_field('add_diagram', get_the_ID())) {
                        $bg_image = get_field('add_diagram', get_the_ID());
                    } else if (get_field('td_resource_image', get_the_ID())) {
                        $bg_image = get_field('td_resource_image', get_the_ID())['url'];
                    } else {
                        $bg_image = get_the_post_thumbnail_url(get_the_ID(),'full' );
                    }

                    if(get_post_type() == 'resource' || get_post_type() == 'toolkit'){
                        $term_list = wp_get_post_terms( get_the_ID(), 'topic', array('fields' => 'all'));
                    } else if (get_post_type() == 'news' || get_post_type() == 'case_studies'  || get_post_type() == 'event') {
                        $term_list = wp_get_post_terms( get_the_ID(), 'content_tags', array('fields' => 'all'));
                    }

                    if (get_field('td_resource_teaser', get_the_ID())) {
                        $excerpt = get_field('td_resource_teaser', get_the_ID());
                    } else if (get_field('add_text', get_the_ID())) {
                        $excerpt = get_field('add_text', get_the_ID());
                    } else if (get_the_excerpt(get_the_ID())){
                        $excerpt = get_the_excerpt(get_the_ID());
                    } else if (get_the_content(get_the_ID())) {
                        $excerpt = get_the_content(get_the_ID());
                    } else {
                        $excerpt = '';
                    }

                    ?>

                    <div class="post-tile__wrap  <?php echo get_post_type( get_the_ID() ) ?> image post-<? echo get_the_id();?> mob-style-2" data-date="<?php echo strtotime(get_the_date('Y-m-d H:i:s'));?>" data-views="<?php echo get_post_meta( get_the_ID(), 'post_views_count', true ); ?>">
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
                                    <?php if(get_post_type() == 'resource' || get_post_type() == 'toolkit'){ ?>
                                            <a class="content-tags__item" href="/search?_topics=<?php echo $term->slug ?>" data-tem-id="<?php echo  $term->term_id ?>"><?php echo $term->name ?></a>
                                        <?php } else if (get_post_type() == 'news' || get_post_type() == 'case_studies'  || get_post_type() == 'event') { ?>
                                            <a class="content-tags__item" href="/search?_content_tags=<?php echo $term->slug ?>" data-tem-id="<?php echo  $term->term_id ?>"><?php echo $term->name ?></a>
                                      <?php  } ?>
                                    <?php endforeach ?>
                                </div>
                                <div class="post-tile__title">
                                    <span> <?php echo get_the_title(get_the_ID());?> </span>
                                </div>
                                <div class="post-tile__excerpt">
                                    <p><?php echo get_custom_excerpt($excerpt, 213, true) ?></p>
                                </div>
                            </div>
                            <div class="post-tile__content-footer">
                                <a href="<?php echo get_post_permalink(get_the_ID()); ?>" class="btn-body btn-transparent triangle after Between">
                                    <span class="btn-inner">READ MORE</span>
                                </a>
                            </div>
                        </div>
                    </div>

                <?php } ?>
            </div>
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

            </div>
        </div>
    </div>
</div>
<?php } elseif (empty($reading_list) && is_user_logged_in()) { ?>
<div class="content-wrapper wrapper-1245">
    <div class="post-tile__list landing-page search-page__results favourites-page">
        You have no items in your reading list
    </div>
</div>
<?php } elseif(!is_user_logged_in()){ ?>
    <div class="content-wrapper wrapper-1245">
        <div class="post-tile__list landing-page search-page__results favourites-page">
            Please login to add items in your Reading list
        </div>
    </div>
<?php } ?>

<!--<script src="https://donorbox.org/widget.js" paypalExpress="true"></script><iframe src="https://donorbox.org/embed/aladonaris" name="donorbox" allowpaymentrequest="allowpaymentrequest" seamless="seamless" frameborder="0" scrolling="no" height="900px" width="100%" style="max-width: 500px; min-width: 250px; max-height:none!important"></iframe>-->

<?php get_footer();?>
