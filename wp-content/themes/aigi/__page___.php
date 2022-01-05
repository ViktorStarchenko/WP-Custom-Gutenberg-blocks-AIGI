

<?php get_header(); ?>
<main id="content" role="main">
    <div class="section">
        <div class="wrapper">
            <div class="hero-slider" style="height: 548px; width: 100%; background: var(--color-error)" ></div>
        </div>
    </div>
    <div class="main-inner top-of-hero">
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




        <div class="wrapper-1245">
            <div style="height: 3px; background-color: #ccc; margin-top: 30px;"></div>
            <h4>ASSETS</h4>
            <h1>Heading 1</h1>
            <h2>Heading 2</h2>
            <h3>Heading 3</h3>
            <h4>Heading 4</h4>
            <h5>Heading 5</h5>
            <h6 class="h1">Heading 6</h6>


            <div class="div">
                <a href="#" class="btn-body calendar before btn-m-blue"><span class="btn-inner">read more</span></a>
                <a href="#" class="btn-body triangle before btn-m-blue"><span class="btn-inner">read more</span></a>
                <a href="#" class="btn-body enlarge before btn-m-blue"><span class="btn-inner">read more</span></a>
                <a href="#" class="btn-body arrow before btn-m-blue"><span class="btn-inner">read more</span></a>
                <a href="#" class="btn-body topic before btn-m-blue"><span class="btn-inner">read more</span></a>
            </div>
            <div class="">
                <a href="#" class="btn-body calendar before btn-h-secondary-blue"><span class="btn-inner">read more</span></a>
                <a href="#" class="btn-body triangle before btn-h-secondary-blue"><span class="btn-inner">read more</span></a>
                <a href="#" class="btn-body enlarge before btn-h-secondary-blue"><span class="btn-inner">read more</span></a>
                <a href="#" class="btn-body arrow before btn-h-secondary-blue"><span class="btn-inner">read more</span></a>
                <a href="#" class="btn-body topic before btn-h-secondary-blue"><span class="btn-inner">read more</span></a>
            </div>
            <div class="">
                <a href="#" class="btn-body calendar after btn-white">
                    <span class="btn-inner">read more</span>
                </a>
                <a href="#" class="btn-body triangle after btn-white"><span class="btn-inner">read more</span></a>
                <a href="#" class="btn-body enlarge after btn-white"><span class="btn-inner">read more</span></a>
                <a href="#" class="btn-body arrow after btn-white"><span class="btn-inner">read more</span></a>
                <a href="#" class="btn-body topic after btn-white"><span class="btn-inner">read more</span></a>
            </div>
            <div class="">
                <a href="#" class="btn-body calendar after btn-navy centered-icon"><span class="btn-inner">read more</span></a>
                <a href="#" class="btn-body triangle after btn-navy centered-icon"><span class="btn-inner">read more</span></a>
                <a href="#" class="btn-body enlarge after btn-navy centered-icon"><span class="btn-inner">read more</span></a>
                <a href="#" class="btn-body arrow after btn-navy centered-icon"><span class="btn-inner">read more</span></a>
                <a href="#" class="btn-body topic after btn-navy centered-icon"><span class="btn-inner">read more</span></a>
            </div>
            <div class="" style="background: grey">
                <a href="#" class="btn-body calendar after btn-transparent"><span class="btn-inner">read more</span></a>
                <a href="#" class="btn-body triangle after btn-transparent"><span class="btn-inner">read more</span></a>
                <a href="#" class="btn-body enlarge after btn-transparent"><span class="btn-inner">read more</span></a>
                <a href="#" class="btn-body arrow after btn-transparent"><span class="btn-inner">read more</span></a>
                <a href="#" class="btn-body topic after btn-transparent"><span class="btn-inner">read more</span></a>
            </div>


            <form action="">

                <div class="form-inner">
                    <div class="qc-form-group w49">
                        <input id="contact-us-name" class="contact-us-name form-input" type="text" placeholder="First name">
                    </div>

                    <div class="qc-form-group w100">

                    </div>
                </div>

            </form>
            <!--                --><?php //if ( comments_open() && !post_password_required() ) { comments_template( '', true ); } ?>

        </div>
    <?php endwhile; endif; ?>
    </div>

</main>
<?php get_footer(); ?>