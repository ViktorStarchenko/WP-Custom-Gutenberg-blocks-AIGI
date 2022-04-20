<?php
/*
* Template Name: Single AIGI Staff
* Template Post Type: event
*/
?>

<?php get_header(); ?>
<main id="content" role="main">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <div class="main-inner  <?php  echo ((get_field('header_slider')['enable'] == true) ? ' top-of-hero ' :''); ?>">

        <div class="wrapper-1245 content-wrapper">
            <div class="has-sidebar  sidebar-right">
                <div class="col-sidebar" data-height="pageSidebarCol">
                    <div class="col-sidebar__inner">

                        <div class="post-details">


                            <?php if (get_field('staff_info')['achievements']) : ?>
                                <div class="post-details__item">
                                    <div class="post-details__heading"><?php the_title();?></div>
                                    <div class="post-details__text">
                                        <ul class="rounded-list">
                                            <?php foreach (get_field('staff_info')['achievements'] as $achievements) : ?>
                                                <li><?php echo $achievements['item']; ?></li>
                                            <?php endforeach ?>
                                        </ul>

                                    </div>

                                </div>
                            <?php endif ?>


                        </div>

                        <?php if (get_field('social_links')): ?>
                            <div class="post-details__item">
                                <div class="social-links__heading ">Speaker's Social Links:</div>
                                <div class="social-links">
                                    <?php foreach (get_field('social_links') as $social_links) : ?>
                                        <div class="social-links__item">
                                            <a class="social-links__item-link" href="<?= $social_links['link'] ?>" target="_blank">
                                                <i class="<?= $social_links['icon'] ?>"></i>
                                            </a>
                                        </div>
                                    <?php endforeach ?>
                                    <?php wp_reset_postdata(); ?>
                                </div>
                            </div>
                        <?php endif ?>




                        <?php if (get_field('staff_info')['topics_of_expertise']) : ?>
                            <div class="post-details__item border-top">
                                <div class="post-details__heading topics_of_expertise">topics of expertise:</div>
                                <div class="post-details__text">

                                    <div class="post-tile__tags">

                                        <?php foreach (get_field('staff_info')['topics_of_expertise'] as $topics_of_expertise) : ?>
                                        <div class="content-tags__item small"><?php echo $topics_of_expertise['item'] ?></div>
                                        <?php endforeach ?>

                                    </div>

                                </div>

                            </div>
                        <?php endif ?>


                        <?php if (get_field('share_download')) : ?>
                            <?php get_template_part('template-parts/content-blocks/content', 'share-download', get_the_ID()); ?>
                        <?php endif ?>

<!--                        --><?php //if (get_field('share_download')) : ?>
<!--                            <div class="post-technical-block bordered content-item post-details__item">-->
<!--                                --><?php //if (get_field('share_download')['enable_share']) : ?>
<!--                                    --><?php //get_template_part('template-parts/content-blocks/content', 'social-share'); ?>
<!--                                --><?php //endif ?>
<!--                                --><?php //if (get_field('share_download')['enable_print']) : ?>
<!--                                    <div class="post-technical__item">-->
<!--                                        <div class="post-technical__title">Print</div>-->
<!--                                        <a class="post-technical__button print-button" href="#">-->
<!--                                            <img src="/wp-content/themes/aigi/assets/images/print.svg" alt="print">-->
<!--                                        </a>-->
<!--                                    </div>-->
<!--                                --><?php //endif ?>
<!--                                --><?php //if (get_field('share_download')['enable_download']) : ?>
<!--                                    <div class="post-technical__item">-->
<!--                                        <div class="post-technical__title">Download</div>-->
<!--                                        <a class="post-technical__button" href="--><?php //echo get_field('share_download')['download_file']['url']?><!--"  target="_blank">-->
<!--                                            <img src="/wp-content/themes/aigi/assets/images/download-big.svg" alt="download">-->
<!--                                        </a>-->
<!--                                    </div>-->
<!--                                --><?php //endif ?>
<!--                                --><?php //if (get_field('share_download')['enable_save']) : ?>
<!--                                    <div class="post-technical__item">-->
<!--                                        <div class="post-technical__title">Save</div>-->
<!--                                        <a class="post-technical__button" href="">-->
<!--                                            <img src="/wp-content/themes/aigi/assets/images/star-review.svg" alt="save">-->
<!--                                        </a>-->
<!--                                    </div>-->
<!--                                --><?php //endif ?>
<!---->
<!--                            </div>-->
<!--                        --><?php //endif ?>


                    </div>
                </div>
                <div class="col-content" data-height="pageSidebarCol">
                    <div class="has-sidebar__inner">
                        <?php the_content() ?>
                        <?php $content_items = get_field('content_items'); ?>
                        <?php get_template_part('template-parts/content-blocks/content', 'custom-content', $content_items); ?>

                        <div class="footones_custom_wrapper">
                            <ul class="footones_custom_list"></ul>
                        </div>

<!--                        --><?php //get_template_part( 'nav', 'below-single' ); ?>

                    </div>

                </div>

            </div>

        </div>


        <?php get_template_part('template-parts/layout', 'page-after-content-blocks'); ?>
        <?php endwhile; endif; ?>
        <footer class="footer">

        </footer>
</main>
<?php get_footer(); ?>
