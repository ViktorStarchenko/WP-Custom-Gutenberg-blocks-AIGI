<?php
/*
* Template Name: Single Case Studies
* Template Post Type: event
*/
?>

<?php get_header(); ?>
<main id="content" role="main">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <div class="main-inner  <?php  echo ((get_field('header_slider')['enable'] == true) ? ' top-of-hero ' :''); ?>">

        <div class="wrapper-1245 content-wrapper">
            <div class="has-sidebar  sidebar-right">
                <div class="col-sidebar">
                    <div class="col-sidebar__inner">

                        <div class="post-details">

                            <?php if (get_field('author')) : ?>
                                <div class="post-details__item author">
                                    <div class="post-details__heading">Written by</div>
                                    <?php foreach (get_field('author') as $author) : ?>
                                    <div class="post-details__text">
                                        <?php echo $author->post_title; ?>
                                        <?php if (get_field ('author_title', $author->ID)) : ?>
                                        <p><?php  echo get_field('author_title', $author->ID) ; ?></p>
                                        <?php endif ?>
                                    </div>
                                    <a class="post-details__link fancybox-inline show-modal" href="#author-<?php echo $author->ID ?>">About the writter</a>

                                        <!--Author modal-->
                                        <div style="display:none" class="fancybox-hidden">
                                            <div class="social-share__block" id="author-<?php echo $author->ID ?>">
                                                <div class="social-share__wrapper modal pt-xl pb-xl pl-xl pr-xl">
                                                    <div class="social-share__header">
                                                        <div class="social-share__title">
                                                            Author
                                                        </div>
                                                    </div>
                                                    <div class="modal__author-container">
                                                        <div class="author__photo">
                                                            <img src="<?= get_the_post_thumbnail_url( $author->ID, 'full' ); ?>" alt="">
                                                        </div>
                                                        <div class="author__name"><?php echo $author->post_title; ?></div>
                                                        <div class="author__title"><?php  echo get_field('author_title', $author->ID) ; ?></div>
                                                        <div class="author__description"><?php echo $author->post_content; ?></div>

                                                        <?php if (get_field('social_links', $author->ID)): ?>
                                                        <div class="author__social">
                                                            <div class="social-links__heading ">Authors's Social Links:</div>
                                                            <div class="social-links">
                                                                <?php foreach (get_field('social_links', $author->ID) as $social_links) : ?>
                                                                    <div class="social-links__item">
                                                                        <a class="social-links__item-link" href="<?= $social_links['link'] ?>" target="_blank">
                                                                            <i class="<?= $social_links['icon'] ?>"></i>
                                                                        </a>
                                                                    </div>
                                                                <?php endforeach ?>
                                                            </div>
                                                        </div>
                                                        <?php endif ?>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                    <?php wp_reset_postdata(); ?>
                                </div>
                            <?php endif ?>

                            <?php if (get_field('c_studies_locationtion')['address']) : ?>
                            <div class="post-details__item">
                                <div class="post-details__heading">Location</div>
                                <div class="post-details__text"><?= get_field('c_studies_locationtion')['address']['address']; ?></div>
                                <a href="https://maps.google.com/?q=<?php echo get_field('c_studies_locationtion')['address']['lat'];?>,<?php echo get_field('c_studies_locationtion')['address']['lng'];?>" target="_blank" class="post-details__link">View on map</a>
                            </div>
                            <?php endif ?>
                        </div>

                        <?php if (get_field('social_links')): ?>
                            <div class="post-details__item">
                                <div class="social-links__heading ">Event's Social Links:</div>
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

                        <?php if (get_field('share_download')) : ?>
                            <div class="post-technical-block bordered content-item post-details__item">
                                <?php if (get_field('share_download')['enable_share']) : ?>
                                    <div class="post-technical__item">
                                        <div class="post-technical__title">SHARE</div>
                                        <a class="post-technical__button fancybox-inline show-modal" href="#share-block">
                                            <img src="/wp-content/themes/aigi/assets/images/share.svg" alt="share">
                                        </a>

                                    </div>
                                <?php endif ?>
                                <?php if (get_field('share_download')['enable_print']) : ?>
                                    <div class="post-technical__item">
                                        <div class="post-technical__title">Print</div>
                                        <a class="post-technical__button print-button" href="#">
                                            <img src="/wp-content/themes/aigi/assets/images/print.svg" alt="print">
                                        </a>
                                    </div>
                                <?php endif ?>
                                <?php if (get_field('share_download')['enable_download']) : ?>
                                    <div class="post-technical__item">
                                        <div class="post-technical__title">Download</div>
                                        <a class="post-technical__button" href="<?php echo get_field('share_download')['download_file']['url']?>"  target="_blank">
                                            <img src="/wp-content/themes/aigi/assets/images/download-big.svg" alt="download">
                                        </a>
                                    </div>
                                <?php endif ?>
                                <?php if (get_field('share_download')['enable_save']) : ?>
                                    <div class="post-technical__item">
                                        <div class="post-technical__title">Save</div>
                                        <a class="post-technical__button" href="">
                                            <img src="/wp-content/themes/aigi/assets/images/star-review.svg" alt="save">
                                        </a>
                                    </div>
                                <?php endif ?>

                            </div>
                        <?php endif ?>


                    </div>
                </div>
                <div class="col-content">
                    <div class="has-sidebar__inner">
                        <?php the_content() ?>
                        <?php $content_items = get_field('content_items'); ?>
                        <?php get_template_part('template-parts/content-blocks/content', 'custom-content', $content_items); ?>

                        <?php get_template_part( 'nav', 'below-single' ); ?>

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
