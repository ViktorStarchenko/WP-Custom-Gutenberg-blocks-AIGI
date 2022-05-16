<?php $share_download = get_field('share_download', $args); ?>

<?php if ($share_download) : ?>
    <div class="post-technical-block bordered content-item post-details__item">
        <?php if ($share_download['enable_share']) : ?>
            <?php get_template_part('template-parts/content-blocks/content', 'social-share'); ?>
        <?php endif ?>

        <?php if ($share_download['enable_print']) : ?>
            <div class="post-technical__item print">
                <div class="post-technical__title">Print</div>
                <a class="post-technical__button print-button" href="#">
                    <img src="/wp-content/themes/aigi/assets/images/print.svg" alt="print">
                </a>
            </div>
        <?php endif ?>

<!--        Direct PDF Dowmload-->
<!--                --><?php //if ($share_download['enable_download']) : ?>
<!--                    <div class="post-technical__item">-->
<!--                        <div class="post-technical__title">Download</div>-->
<!--                        <a class="post-technical__button" href="/pdf-test?post_id=--><?php //echo get_the_ID();?><!--"  target="_blank">-->
<!--                            <img src="/wp-content/themes/aigi/assets/images/download-big.svg" alt="download">-->
<!--                        </a>-->
<!--                    </div>-->
<!--                --><?php //endif ?>


        <?php if ($share_download['enable_download']) : ?>
            <div class="post-technical__item download">
                <div class="post-technical__title">Download</div>
                <div class="popup_item_wrapper" data-popup="">
                    <div href="" class="popup_button post-technical__button">
                        <img src="/wp-content/themes/aigi/assets/images/download-big.svg" alt="download">
                    </div>

                    <div class="popup-main-wrapper" id="popup-main-wrapper">
                        <div class="item_popup_wrapper">
                            <div class="popup_overlay"></div>

                            <div class="popup_content_wrapper download-pdf">
                                <div class="item_popup_content_inner">
                                    <div class="popup_close_button"></div>
                                    <div class="download-pdf__wrapper modal modal-content">
                                        <div class="post-content-form">
                                            <div class="scholarship-open-form__wrapper">
                                                <div class="form-heading">
                                                    <?php if (get_field('download_button', 'option')['modal_pdf_heading']) {?>
                                                        <div class="form-title"><?php echo get_field('download_button', 'option')['modal_pdf_heading']; ?></div>
                                                    <?php } ?>
                                                    <?php if (get_field('download_button', 'option')['modal_pdf_description']) { ?>
                                                        <div class="form-desc"><?php echo get_field('download_button', 'option')['modal_pdf_description']; ?></div>
                                                    <?php } ?>
                                                </div>

                                                <?php if (get_field('download_button', 'option')['modal_pdf_form_id'] ) { ?>
                                                    <div class=""><?php echo do_shortcode('[gravityform id="'.get_field('download_button', 'option')['modal_pdf_form_id'].'" title="false" description="false" ajax="true" tabindex="49"]');?></div>
                                                <?php } ?>

                                            </div>
                                        </div>

                                    </div>
                                    <div class="popup_content_footer">
                                        <img src="/wp-content/themes/aigi/assets/images/group.svg" alt="">
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        <?php endif ?>

        <?php if (is_user_logged_in()) { ?>
            <?php if ($share_download['enable_save']) : ?>
                <div class="post-technical__item save">
                    <div class="post-technical__title">Save</div>
                    <!--                <a class="post-technical__button" href="">-->
                    <!--                    <img src="/wp-content/themes/aigi/assets/images/star-review.svg" alt="save">-->
                    <!--                </a>-->
                    <span><?php echo do_shortcode('[favorite_button]') ?></span>
                </div>
            <?php endif ?>
        <?php } ?>


    </div>
<?php endif ?>