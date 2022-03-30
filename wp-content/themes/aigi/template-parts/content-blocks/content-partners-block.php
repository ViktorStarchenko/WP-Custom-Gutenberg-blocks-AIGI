

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

$outter_padding = '';
if ($attributes['outter_padding']['padding_top']) {
    $outter_padding .= ' ' . $attributes['outter_padding']['padding_top'] . ' ';
}
if ($attributes['outter_padding']['padding_bottom']) {
    $outter_padding .= ' ' . $attributes['outter_padding']['padding_bottom'] . ' ';
}
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
//if ($attributes['wrappers']['section_wrapper']) {
//    $classes .= ' ' . $attributes['wrappers']['section_wrapper'] . ' ';
//}
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
$outter_bg_color = '';
if ($attributes['background']['outter_background_color']) {
    $outter_bg_color =  $attributes['background']['outter_background_color'];
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
        <?php if ($attributes['background']['background_image']) : ?>
            /*background-image: url(*/<?php //echo $attributes['background']['background_image']['url']; ?>/*);*/
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


<section
        class="partners-block-section resources-slider wrapper-full-width acf-section-<?php echo get_row_index() . ' '; ?>
acf-section-<?php echo $attributes['uniq_id']. ' '; ?><?php echo $classes ?><?= $background_texture; ?><?= $padding; ?><?= $border; ?> <?= $outter_padding; ?> <?= $outter_bg_color; ?>" id="<?php  echo ($attributes['section_id'] ? $attributes['section_id'] :''); ?> " style="background-image: url(<?php echo $attributes['background']['background_image']['url']; ?>); <?php  echo ($bg_color ?  'background-color: ' . $bg_color . ';' :''); ?> ">
    <div class="bg-overlay <?php  echo ($attributes['background']['enable_overlay'] == true ?  ' active ' : ''); ?>"></div>
    <div class="wrapper-1245 content-wrapper <?= $bg_color_preset; ?> partners-block__wrapper">
        <div class="">
            <div class="partners-block__inner">
                <div class="rslider__header">
                    <div class="rslider__header-top">
                        <div style="color: <?php echo $attributes['background']['text_color'] ?>;" class="rslider__heading"><?= $content['heading']; ?></div>
                        <div class="rslider_nav rslider_nav-<?php echo $attributes['uniq_id'];?> slider-arrows"></div>
                    </div>
                </div>
                <div class="rslider__outter">
                    <div class="rslider__inner content-wrapper wrapper-1245">

                        <div class="rslider__wrapper">
                            <div class="slider rslider rslider-<?php echo $attributes['uniq_id'];?> rslider__resources">
                                <?php if ($content['partners_items']) : ?>
                                    <?php $partners_items = $content['partners_items']; ?>
                                    <?php foreach( $partners_items as $post ) :
                                        setup_postdata( $post ); ?>
                                        <div class="partners_item_wrapper">
                                            <div class="partners_item">
                                                <?php $partner_info = get_field('post_info' , $post->ID); ?>
                                                <img alt="<?php $title = get_the_title( $post->ID ); ?>" src="<?php echo $partner_info['logo']['url']; ?>">
                                            </div>
                                            <?php $title = get_the_title( $post->ID ); ?>

                                            <div class="partners_item_popup_wrapper">
                                                <div class="partners_item_popup_overlay"></div>
                                                <div class="partners_item_popup_content_wrapper">
                                                    <div class="partners_item_popup_content_inner">
                                                        <div class="popup_close_button"></div>
                                                        <!--                                        <div id="popup_close_button"></div>-->
                                                        <div class="partners_item_popup_header">
                                                            <div class="partners_item_popup_logo">
                                                                <img alt="<?php echo get_the_title( $post->ID ); ?>" src="<?php echo $partner_info['logo']['url']; ?>">
                                                            </div>
                                                            <div class="partners_item_popup_text">
                                                                <p class="partners_item_popup_headline">Contact Details</p>

                                                                <?php if ($partner_info['address']) : ?>
                                                                    <div class="popup-address">
                                                                        <?php $address = $partner_info['address']  ?>
                                                                        <?php foreach( $address as $adrow ) :  ?>
                                                                            <p><?php echo $adrow['item']; ?></p>
                                                                        <?php endforeach; ?>
                                                                    </div>
                                                                <?php endif; ?>

                                                                <?php if ($partner_info['phone']) : ?>
                                                                    <div class="popup-phone">
                                                                        <?php $phone = $partner_info['phone']  ?>
                                                                        <?php foreach( $phone as $phrow ) :  ?>
                                                                            <p><span><?php echo $phrow['type']; ?></span> <?php echo $phrow['number']; ?></p>
                                                                        <?php endforeach; ?>
                                                                    </div>
                                                                <?php endif; ?>


                                                                <?php if ($partner_info['email']) : ?>
                                                                    <div class="popup-email">
                                                                        <?php $email = $partner_info['email']  ?>
                                                                        <?php foreach( $email as $emrow ) :  ?>
                                                                            <p><a target="_blank" href="mailto:<?php echo $emrow['item']; ?>"><?php echo $emrow['item']; ?></a></p>
                                                                        <?php endforeach; ?>
                                                                    </div>
                                                                <?php endif; ?>

                                                                <?php if ($partner_info['website']) : ?>
                                                                    <div class="popup-web">
                                                                        <?php $web = $partner_info['website']  ?>
                                                                        <?php foreach( $web as $webrow ) :  ?>
                                                                            <p><a target="_blank" href="<?php echo $webrow['item']; ?>"><?php echo $webrow['item']; ?></a></p>
                                                                        <?php endforeach; ?>
                                                                    </div>
                                                                <?php endif; ?>

                                                                <?php $partner_social = get_field('social_links' , $post->ID); ?>
                                                                <?php if ($partner_social) : ?>
                                                                    <div class="popup-social">
                                                                        <?php foreach( $partner_social as $socrow ) :  ?>
                                                                            <p><a target="_blank" href="<?php echo $socrow['link']; ?>" ><?php echo $socrow['icon']; ?></a></p>
                                                                        <?php endforeach; ?>
                                                                    </div>
                                                                <?php endif; ?>


                                                            </div>
                                                        </div>
                                                        <h4><?php echo $title; ?></h4>
                                                        <?php echo $partner_info['description']; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    <?php endforeach; ?>
                                    <?php wp_reset_postdata(); ?>
                                <?php endif; ?>

                            </div>
                        </div>

                    </div>
                </div>
            </div>


        </div>


    </div>



</section>
<script>
    // Sticky to right sliders

    $('.rslider-<?php echo $attributes['uniq_id'];?>').slick({
        // variableWidth: true,
        slidesToShow: 4,
        slidesToScroll: 1,
        // autoplay: true,
        autoplaySpeed: 2000,
        centerMode: true,
        // centerPadding: '16px',
        adaptiveHeight: true,
        arrows: true,
        appendArrows:'.rslider_nav-<?php echo $attributes['uniq_id'];?>.slider-arrows',
        prevArrow:'<span class="slider-arrow prev"></span>',
        nextArrow:'<span class="slider-arrow next"></span>',
        responsive: [
            {
                breakpoint: 1190,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    centerMode: true,
                }
            },
            {
                breakpoint: 769,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    centerMode: true,
                }
            },
            {
                breakpoint: 580,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    centerMode: false,
                    centerPadding: false,
                }
            }

        ]
    });


        jQuery('.partners_item').on('click', function () {
            jQuery("#partner-popup-main-wrapper").empty();
            jQuery(this).siblings(".partners_item_popup_wrapper").clone().appendTo( "#partner-popup-main-wrapper" );
            jQuery("#partner-popup-main-wrapper").addClass('popup_opened');
        });

    jQuery(document).on('click', '#popup_close_button, .popup_close_button', function () {
        jQuery("#partner-popup-main-wrapper").removeClass('popup_opened');
            
    });



</script>
