<?php
/*
* Template Name: Landing page
* Template Post Type: page
*/
?>
<?php get_header(); ?>
    <main id="content" role="main">
        <div class="section">
            <div class="wrapper">
                <div class="hero-slider" style="height: 548px; width: 100%; background: var(--color-error)" ></div>
            </div>
        </div>
        <div class="main-inner top-of-hero">
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <div class="wrapper-1245">
                    <div class="content-wrapper wrapper-1245 mobile-fullwidth">
                        <div class="resource-filter__wrapper" style="width: 100%; height: 238px; background: #F8F8F8; border-radius: 5px;">
                            <h1>Placeholder for Resources filter</h1>
                        </div>
                    </div>
                    <div class="content-wrapper wrapper-1245">
                        <div class="resource-filter__wrapper" style="width: 100%; height: 100vh;">
                            <h1>LIST OF POSTS</h1>
                        </div>
                    </div>
                </div>
                <?php get_template_part('template-parts/layout', 'page-after-content-blocks'); ?>
            <?php endwhile; endif; ?>
        </div>

    </main>
<?php get_footer(); ?>