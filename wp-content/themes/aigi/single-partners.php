<?php
/*
* Template Name: Single Partners
* Template Post Type: partners
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
                            <?php if (get_field('post_info')['logo']) {?>
                                <div class="post-details__item centered partners_logo">
                                    <img src="<?php echo get_field('post_info')['logo']['url']; ?>" alt="<?php echo get_field('post_info')['logo']['title']; ?>">
                                </div>
                            <?php } ?>
                        </div>
                    </div>


                        <div class="post-details__item centered">
                                <div class="post-details__heading">Contact Details</div>
                                <?php if (get_field('post_info')['address']) {?>
                                    <div class="post-details__text">
                                        <?php foreach (get_field('post_info')['address'] as $address) { ?>
                                            <div><?= $address['item']; ?> </div>
                                        <?php } ?>
                                    </div>
                                <?php } ?>


                                <?php if (get_field('post_info')['phone']) {?>
                                    <div class="post-details__text">
                                        <?php foreach (get_field('post_info')['phone'] as $phone) { ?>
                                            <div><?= $phone['type']; ?> <?= $phone['number']; ?></div>
                                        <?php } ?>
                                    </div>
                                <?php } ?>

                                <?php if (get_field('post_info')['email']) {?>
                                    <div class="post-details__text">
                                        <?php foreach (get_field('post_info')['email'] as $email) { ?>
                                            <div>email:
                                                <a href="mailto:<?= $email['item']; ?>"><?= $email['item']; ?></a>
                                        <?php } ?>
                                    </div>
                                <?php } ?>

                                <?php if (get_field('post_info')['website']) {?>
                                    <div class="post-details__text">
                                        <?php foreach (get_field('post_info')['website'] as $website) { ?>
                                            <div>
                                                <a target="_blank" href="<?= $website['item']; ?>">visit their website</a>
                                        <?php } ?>
                                    </div>
                                <?php } ?>

                            </div>


                        </div>

                        <?php if (get_field('share_download')) : ?>
                            <div class="post-technical-block bordered content-item post-details__item">
                                <?php if (get_field('share_download')['enable_share']) : ?>
                                    <?php get_template_part('template-parts/content-blocks/content', 'social-share'); ?>
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

                        <div class="footones_custom_wrapper">
                            <ul class="footones_custom_list"></ul>
                        </div>

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
