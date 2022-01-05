<?php

?>

<?php get_header(); ?>
<main id="content" role="main">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <div class="section">
            <div class="wrapper">
                <div class="hero-slider" style="height: 548px; width: 100%; background: var(--color-error)" ></div>
            </div>
        </div>

        <div class="main-inner top-of-hero">
            <div class="wrapper-1245 content-wrapper">

                <div class="col-2-wrapper  sidebar-left">
                    <div class="col-sidebar">
                        SIDEBAR
                    </div>
                    <div class="col-content">
                        <?php $terms =  wp_get_post_terms( get_the_id(), 'resource_type', array('fields' => 'names') );?>
                        <?php if($terms[0] == 'Video') { ?>

                            <div class="single-resource__container video pb-l">
                                <div class="single-resource__bg"></div>
                                <div class="single-resource__inner">
                                    <div class="single-resource__header">
                                        <span class="single-resource__type"><?php echo $terms[0]; ?></span>
                                        <span class="single-resource__icon video"></span>
                                    </div>
                                    <div class="single-resource__body">

                                        <?php if(get_field('youtube_code')): ?>
                                            <div class="resource-video__wrap mb-s">
                                                <object width="100%" height="100%"><param name="movie" value="https://www.youtube.com/v/<?php the_field('youtube_code'); ?>?wmode=transparent&version=3&amp;hl=en_US&amp;rel=0"></param><param name="allowFullScreen" value="true"></param><param name="allowscriptaccess" value="always"></param><embed src="https://www.youtube.com/v/<?php the_field('youtube_code'); ?>?version=1&amp;hl=en_US&amp;rel=0" type="application/x-shockwave-flash" width="460" height="264" allowscriptaccess="always" allowfullscreen="true"></embed></object>
                                            </div>
                                        <?php endif; ?>

                                        <?php if(get_field('add_text')): ?>
                                            <div class="resource-video__text mb-s">
                                                <p><?php the_field('add_text'); ?></p>
                                            </div>

                                        <?php endif; ?>
                                        <?php if(get_field('how_to_use')): ?>
                                        <p><strong>How To Use:</strong><br/><?php echo get_field('how_to_use'); ?><p>
                                            <?php endif; ?>

                                    </div>

                                    <div class="single-resource__footer"></div>
                                </div>

                            </div>

                        <?php } ?>
                    </div>
                </div>


            </div>
            <?php get_template_part('template-parts/layout', 'page-before-content-blocks'); ?>
        </div>

    <?php endwhile; endif; ?>
    <footer class="footer">
        <?php get_template_part( 'nav', 'below-single' ); ?>
    </footer>
</main>
<?php get_footer(); ?>
