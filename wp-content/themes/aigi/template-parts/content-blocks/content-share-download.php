<?php $share_download = get_field('share_download', $args); ?>

<?php if ($share_download) : ?>
    <div class="post-technical-block bordered content-item post-details__item">
        <?php if ($share_download['enable_share']) : ?>
            <?php get_template_part('template-parts/content-blocks/content', 'social-share'); ?>
        <?php endif ?>
        <?php if ($share_download['enable_print']) : ?>
            <div class="post-technical__item">
                <div class="post-technical__title">Print</div>
                <a class="post-technical__button print-button" href="#">
                    <img src="/wp-content/themes/aigi/assets/images/print.svg" alt="print">
                </a>
            </div>
        <?php endif ?>

<!--        --><?php //if ($share_download['enable_download']) : ?>
<!--            <div class="post-technical__item">-->
<!--                <div class="post-technical__title">Download</div>-->
<!--                <a class="post-technical__button" href="/pdf-test?post_id=--><?php //echo get_the_ID();?><!--"  target="_blank">-->
<!--                    <img src="/wp-content/themes/aigi/assets/images/download-big.svg" alt="download">-->
<!--                </a>-->
<!--            </div>-->
<!--        --><?php //endif ?>

        <?php if ($share_download['enable_download']) : ?>
            <div class="post-technical__item">
                <div class="post-technical__title">Download</div>
                <div class="popup_item_wrapper" data-popup="">
                    <div href="" class="popup_button post-technical__button">
                        <img src="/wp-content/themes/aigi/assets/images/download-big.svg" alt="download">
                    </div>

                    <div class="popup-main-wrapper" id="popup-main-wrapper">
                        <div class="item_popup_wrapper">
                            <div class="popup_overlay"></div>
                            <div class="popup_content_wrapper threatment">
                                <div class="item_popup_content_inner">
                                    <div class="popup_close_button"></div>
                                    <div class="social-share__wrapper modal modal-content p-m">
                                        <div class="social-share__header">
                                            <div class="social-share__title">

                                            </div>
                                        </div>
                                        <div class="social-share__container">
                                            <?php echo do_shortcode('[gravityform id="8" title="false" description="false" ajax="true" tabindex="49"]'); ?>
                                        </div>
                                    </div>
                                    <div class="popup_content_footer"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        <?php endif ?>

        <?php if ($share_download['enable_save']) : ?>
            <div class="post-technical__item">
                <div class="post-technical__title">Save</div>
                <a class="post-technical__button" href="">
                    <img src="/wp-content/themes/aigi/assets/images/star-review.svg" alt="save">
                </a>
            </div>
        <?php endif ?>

    </div>
<?php endif ?>