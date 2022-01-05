<?php

?>

<?php get_header(); ?>
<main id="content" role="main">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <div class="main-inner  <?php  echo ((get_field('header_slider')['enable'] == true) ? ' top-of-hero ' :''); ?>">
            <div class="wrapper-1245 content-wrapper">

                <div class="has-sidebar  sidebar-left">
                    <div class="col-sidebar">
                        SIDEBAR
                    </div>
                    <div class="col-content">
                        <div class="has-sidebar__inner">
                            <?php get_template_part('template-parts/resource-templates/resource', 'template'); ?>
                            <?php get_template_part( 'nav', 'below-single' ); ?>
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
