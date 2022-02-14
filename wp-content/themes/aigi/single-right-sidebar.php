<?php
/*
 * Template Name: Page with right sidebar
 * Template Post Type: post
 */
?>

<?php get_header(); ?>
    <main id="content" role="main">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <div class="section">
                <div class="wrapper">
                    <div class="hero-slider" style="height: 548px; width: 100%; background: var(--color-error)" ></div>
                </div>
            </div>
        <div class="main-inner  <?php  echo ((get_field('header_slider')['enable'] == true) ? ' top-of-hero ' :''); ?>">
            <div class="wrapper-1245">

                <div class="col-2-wrapper">
                    <div class="col-content">
                        <?php the_content(); ?>
                    </div>
                    <div class="col-sidebar">
                        SIDEBAR
                    </div>
                </div>


            </div>
            <?php get_template_part('template-parts/layout', 'page-after-content-blocks'); ?>
        </div>

        <?php endwhile; endif; ?>
        <footer class="footer">
            <div class="footones_custom_wrapper">
                <ul class="footones_custom_list"></ul>
            </div>
            <?php get_template_part( 'nav', 'below-single' ); ?>
        </footer>
    </main>
<?php get_footer(); ?>
