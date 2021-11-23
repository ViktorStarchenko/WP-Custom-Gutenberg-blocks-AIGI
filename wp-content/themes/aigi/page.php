

<?php get_header(); ?>
    <main id="content" role="main">
        <?php get_template_part('template-parts/layout', 'page-before-content-blocks'); ?>
        <div class="wrapper-1245">
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header class="header">
                    <h1 class="entry-title" itemprop="name"><?php the_title(); ?></h1> <?php edit_post_link(); ?>
                </header>
                <div class="entry-content" itemprop="mainContentOfPage">
                    <?php if ( has_post_thumbnail() ) { the_post_thumbnail( 'full', array( 'itemprop' => 'image' ) ); } ?>
                    <?php the_content(); ?>
                    <div class="entry-links"><?php wp_link_pages(); ?></div>
                </div>
            </article>
        </div>

            <?php get_template_part('template-parts/layout', 'page-after-content-blocks'); ?>
        <div class="wrapper-1245">
            <?php if ( comments_open() && !post_password_required() ) { comments_template( '', true ); } ?>
        <?php endwhile; endif; ?>
        </div>


    </main>
<?php get_footer(); ?>