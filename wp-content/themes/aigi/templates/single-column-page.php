<?php
/*
 * Template Name: Single Column Page
 * Template Post Type: page
 */
?>

<?php get_header(); ?>
<main id="content" role="main">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <div class="main-inner main-inner__contact-us <?php  echo ((get_field('header_slider')['enable'] == true) ? ' top-of-hero ' :''); ?>">
            <div class="wrapper-1245">

                <div class="no-sidebar">
                    <div class="col-content"  data-height="pageSidebarCol">
                        <div class="single-column__inner">
                            <?php the_content() ?>
                            <?php $content_items = get_field('content_items'); ?>
                            <?php get_template_part('template-parts/content-blocks/content', 'custom-content', $content_items); ?>

                        </div>
                    </div>
                </div>

            </div>

            <?php get_template_part('template-parts/layout', 'page-after-content-blocks'); ?>
        </div>

    <?php endwhile; endif; ?>
    <footer class="footer">

    </footer>
</main>
<?php get_footer(); ?>

