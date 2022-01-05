

<?php get_header(); ?>
<main id="content" role="main">

    <div class="main-inner <?php  echo ((get_field('header_slider')['enable'] == true) ? ' top-of-hero ' :''); ?>">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <?php get_template_part('template-parts/layout', 'page-before-content-blocks'); ?>

        <div class="wrapper-1245">
            <div class="content-wrapper wrapper-1245">
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <div class="entry-content" itemprop="mainContentOfPage">
                        <?php if ( has_post_thumbnail() ) { the_post_thumbnail( 'full', array( 'itemprop' => 'image' ) ); } ?>
                        <?php the_content(); ?>
                        <div class="entry-links"><?php wp_link_pages(); ?></div>
                    </div>
                </article>
            </div>
        </div>
        <?php get_template_part('template-parts/layout', 'page-after-content-blocks'); ?>

    <?php endwhile; endif; ?>
    </div>

</main>
<?php get_footer(); ?>