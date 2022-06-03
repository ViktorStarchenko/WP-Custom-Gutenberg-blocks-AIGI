<?php
/*
Template Name: Sitemap
*/
?>

<?php get_header();?>

<?php
// запрос
//$wpb_all_query = new WP_Query(array('post_type'=>'post, toolkit, page, resource, events, people, staff, partners', 'post_status'=>'publish', 'posts_per_page'=>-1)); ?>
<?php
$wpb_all_query = new WP_Query( [
    'post_type' => array( 'post', 'page', 'resource', 'news', 'toolkit', 'case_studies' ),
    'posts_per_page' => -1,
    'orderby' => 'date',
    'order'   => 'DESC',
] );
?>
<div class="main-inner">
    <div class="content-wrapper wrapper-1245">
        <div class="post-tile__list landing-page sitemap-page">
            <h1><?php echo get_the_title(); ?></h1>
            <?php if ( $wpb_all_query->have_posts() ) : ?>
                <ul>
                    <!-- the loop -->
                    <?php while ( $wpb_all_query->have_posts() ) : $wpb_all_query->the_post(); ?>
                        <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                    <?php endwhile; ?>
                    <!-- end of the loop -->
                </ul>
                <?php wp_reset_postdata(); ?>
            <?php else : ?>
                <p><?php _e( 'Sorry, there is no results.' ); ?></p>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php get_footer();?>
