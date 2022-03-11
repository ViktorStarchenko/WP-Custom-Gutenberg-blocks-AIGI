

<?php if (get_sub_field('content')) :
    $content = get_sub_field('content');

endif ?>

<?php if (get_sub_field('attributes')) :
    $attributes = get_sub_field('attributes');
endif ?>

<?php
$background_texture = '';
if ($attributes['background']['background_texture']) :
    $background_texture_classes = $attributes['background']['background_texture'];
    $background_texture = implode(" ", $background_texture_classes);
endif;
?>

<?php
$padding = '';
if ($attributes['padding']) :
    foreach ($attributes['padding'] as $key=>$value) {
        $padding .=' ' . strval($value) . ' ';
    }
endif;
?>

<?php
$border = '';
if ($attributes['border']) :
    foreach ($attributes['border'] as $key=>$value) {
        $border .=' ' . strval($value) . ' ';
    }
endif;
?>

<?php
$classes = '';
if ($content['text_color']) {
    $classes .= ' ' . $content['text_color'] . ' ';
}
if ($attributes['wrappers']['section_wrapper']) {
    $classes .= ' ' . $attributes['wrappers']['section_wrapper'] . ' ';
}
if ($attributes['section_class']) {
    $classes .= ' ' . $attributes['section_class'] . ' ';
}
if ($attributes['margin']['margin_top']) {
    $classes.= ' ' . $attributes['margin']['margin_top'] . ' ';
}
if ($attributes['margin']['margin_bottom']) {
    $classes.= ' ' . $attributes['margin']['margin_bottom'] . ' ';
}
if ($attributes['background']['background_image']) {
    $classes.= '  bg-image ';
}
$bg_color = '';
if ($attributes['background']['background_color']) {
    $bg_color =  $attributes['background']['background_color'];
}

$bg_color_preset = '';
if ($attributes['background']['bg_color_preset']) {
    $bg_color_preset =  $attributes['background']['bg_color_preset'];
}
?>

<?php if ($attributes) : ?>
    <style>
        .acf-section-<?php echo $attributes['uniq_id']; ?> {
        <?php if ($attributes['background']['background_color']) : ?>
            /*background-color: */<?php //echo $attributes['background']['background_color']; ?>/*;*/
        <?php endif ?>
        <?php if ($attributes['section_height']['height_numbers']) : ?>
            height: <?php echo $attributes['section_height']['height_numbers']; ?><?php echo $attributes['section_height']['height_value']; ?>
        <?php endif ?>

        }
        @media (max-width: 767px) {
            .acf-section-<?php echo $attributes['uniq_id']; ?> {
            <?php if ($attributes['section_height']['height_numbers_mobile']) : ?>
                height: <?php echo $attributes['section_height']['height_numbers_mobile']; ?><?php echo $attributes['section_height']['height_value_mobile']; ?>
            <?php endif ?>
            }
        }
    </style>
<?php endif // end padding styles ?>



<section class="scholarship-open__section acf-section-<?php echo $attributes['uniq_id']; ?> <?php echo $classes ;?> <?php echo $background_texture; ?> <?= $padding; ?> <?= $bg_color_preset; ?>" style="background-image: url(<?php echo $attributes['background']['background_image']['url']; ?>); <?php  echo ($bg_color ?  'background-color: ' . $bg_color . ';' :''); ?> ">
    <div class="border-container wrapper-1245 <?= $border; ?>"></div>
    <div class="bg-overlay <?php  echo ($attributes['background']['enable_overlay'] == true ?  ' active ' : ''); ?>"></div>
    <div class="content-wrapper  <?php  echo ($attributes['wrappers']['content_wrapper'] ?  ' ' . $attributes['wrappers']['content_wrapper'] . ' ' :''); ?> text-media__content <?php echo $content['content_direction']; ?> <?php echo $content['content_direction_mobile']; ?> ">

        <div class="text-media__text-wrapper text-media__content-column " data-height="<?php echo $attributes['uniq_id']; ?>">

            <?php if ($content['heading']): ?>
                <div class="highlighted__title">
                    <p><?php echo $content['heading'] ?></p>
                </div>
            <?php endif ?>

            <?php if ($content['description']): ?>
                <div class="highlighted__short-text">
                    <p><?php echo $content['description']; ?></p>
                </div>
            <?php endif ?>

        </div>

        <div class="text-media__media-wrapper text-media__content-column" data-height="<?php echo $attributes['uniq_id']; ?>">

            <div class="post-technical__item">

                <div class="popup_item_wrapper" data-popup="">

                    <div href="#" target="" class="popup_button btn-body  btn-h-secondary-blue  arrow  after  Between " tabindex="0">
                        <span class="btn-inner">Apply for scholarship</span>
                    </div>

                    <div class="popup-main-wrapper" id="popup-main-wrapper">
                        <div class="item_popup_wrapper">
                            <div class="popup_overlay"></div>
                            <div class="popup_content_wrapper scholarship w-1016">
                                <div class="item_popup_content_inner">
                                    <div class="popup_close_button"></div>
                                    <div class="scholarship-open__wrapper modal modal-content">
                                        <div class="post-content-form">
                                            <div class="scholarship-open-form__wrapper">
                                                <div class="form-heading">
                                                    <?php if ($content['form_heading']) : ?>
                                                        <div class="form-title"><?php echo $content['form_heading']; ?></div>
                                                    <?php endif ?>
                                                    <?php if ($content['form_description']) : ?>
                                                        <div class="form-desc"><?php echo $content['form_description']; ?></div>
                                                    <?php endif ?>
                                                </div>

                                                <?php if ($content['form_id']) : ?>
                                                    <div class=""><?php echo do_shortcode('[gravityform id="'. $content['form_id'] .'" title="false" description="false" ajax="true" tabindex="49"]');?></div>
                                                <?php endif ?>
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
        </div>

    </div>
</section>


<?php wp_reset_postdata(); ?>

<script>

    jQuery( window ).on('load resize', function() {
        if (jQuery(window).width() > 768) {
            jQuery('.scholarship-open__wrapper .gform_button').val('Start your application today');
        } else {
            jQuery('.scholarship-open__wrapper .gform_button').val('Start your application');
        }

    })

</script>

