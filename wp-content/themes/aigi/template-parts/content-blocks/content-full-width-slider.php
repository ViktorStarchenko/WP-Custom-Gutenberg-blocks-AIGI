

<?php if (get_sub_field('content')) :
    $content = get_sub_field('content');

    if ($content['slider']) {
        $slider = $content['slider'];
    }

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
if ($attributes['background']['background_color']) {
    $bg_color =  $attributes['background']['background_color'];
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



<section class="fwslider-section acf-section-<?php echo $attributes['uniq_id']; ?> <?php echo $classes ;?> <?php echo $background_texture; ?> <?= $padding; ?><?= $border; ?>" style="background-image: url(<?php echo $attributes['background']['background_image']['url']; ?>); <?php  echo ($bg_color ?  'background-color: ' . $bg_color . ';' :''); ?> ">
    <div class="fwslider slider fwslider-<?php echo $attributes['uniq_id']; ?>" id="fwslider-<?php echo $attributes['uniq_id']; ?>">
        <?php if ($slider) : ?>
        <?php foreach ($slider as $key=>$slide) : ?>
            <?php
            $slide_id = $slide['uniq_id'];
                $slides_counter = 1;
                $title = '';
                $short_text = '';
                $image_credit = '';
                $small_image = '';
                $button_group = '';
                $classes = '';
                $bg_color = '';
                $bg_color_preset = '';
                $bg_texture = '';
                $terms = NULL;
                $enable_overlay = false;
//            if ($slide['section_class']) {
//                $classes .= ' ' . $slide['section_class'] . ' ';
//            }
                if ($slide['background']['background_image']) {
                    $classes.= ' bg-image ';
                }
                if ($slide['background']['enable_overlay']) {
                    $enable_overlay = $slide['background']['enable_overlay'];
                }

                $bg_image = $slide['background']['background_image'];
                if ($slide['background']['background_texture']) {
                    $bg_texture = $slide['background']['background_texture'];
                    $bg_texture = implode(" ", $bg_texture);
                }
                if ($slide['background']['background_color']) {
                    $bg_color = $slide['background']['background_color'];
                }
                if ($slide['background']['bg_color_preset']) {
                    $bg_color_preset = $slide['background']['bg_color_preset'];
                }
//            if ($slide['section_class']) {
//                $classes .= ' ' . $slide['section_class'] . ' ';
//            }
                if ($slide['background']['background_image']) {
                    $classes.= ' bg-image ';
                }
                if ($slide['background']['small_image']) {
                    $small_image = $slide['background']['small_image'];
                }
                if ($slide['background']['image_credit']) {
                    $image_credit = $slide['background']['image_credit'];
                }

                //content
                $content_type_class = 'custom-content';
                if ($slide['content']['title']) {
                    $title = $slide['content']['title'];
                }
                if ($slide['content']['short_text']) {
                    $short_text = $slide['content']['short_text'];
                }
                if ($slide['button_group']) {
                    $button_group = $slide['button_group'];
                }


            ?>


        <div>
            <div class="fwslider-item fwslider-item-<?php echo $slide_id; ?> <?= $bg_texture; ?> <?= $bg_color_preset; ?> slide-<?php echo $key+1?> <?php echo $content_type_class; ?> <?php echo $classes ;?>" style="background-image: url(<?php echo $bg_image['url']?>); <?php  echo ($bg_color ?  'background-color: ' . $bg_color . ';' :''); ?> ">
                <div class="bg-overlay <?php  echo ($enable_overlay == true ?  ' active ' : ''); ?>"></div>
                <div class="content-wrapper wrapper-1245 highlighted-content">
                    <div class="highlighted-text">
                        <?php
                        if($terms): ?>
                            <div class="content-tags">
                                <?php foreach ($terms as $cur_term) : ?>
                                    <div class="content-tags__item">
                                        <span href="<?php echo get_term_link( $cur_term->term_id, $cur_term->taxonomy ) ?>"><?php echo $cur_term->name; ?></span>
                                    </div>
                                <?php endforeach ?>
                            </div>
                        <?php endif ?>
                        <?php if ($title): ?>
                            <div class="header-slider__title">
                                <p><?php echo $title ?></p>
                            </div>
                        <?php endif ?>

                        <?php if ($short_text): ?>
                            <div class="header-slider__short-text">
                                <p><?php echo $short_text; ?></p>
                            </div>
                        <?php endif ?>


                        <?php if ($button_group) : ?>

                            <?php if($button_group['buttons']) : ?>
                                <div class="btn-group f-start m-center">
                                    <?php foreach($button_group['buttons'] as $button) : ?>

                                        <?php
                                        $classes = '';
                                        if ($button['styling']['color']) {
                                            $classes .= ' ' . $button['styling']['color'] . ' ';
                                        }
                                        if ($button['styling']['icon']) {
                                            $classes .= ' ' . $button['styling']['icon'] . ' ';
                                        }
                                        if ($button['styling']['icon_position']) {
                                            $classes .= ' ' . $button['styling']['icon_position'] . ' ';
                                        }
                                        if ($button['styling']['alignment']) {
                                            $classes .= ' ' . $button['styling']['alignment'] . ' ';
                                        }
                                        if ($button['anchor'] == true) {
                                            $classes .= ' ' . 'crane' . ' ';
                                        }

                                        ?>
                                        <a href="<?php echo $button['button']['url'] ;?>" target="<?= $button['button']['target'] ?>" class="btn-<?php echo $button['id']; ?>  btn-body <?php echo $classes ?>">
                                            <span class="btn-inner"><?php echo $button['button']['title'] ;?></span>
                                        </a>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; //edif buttons ?>

                        <?php endif ?>

                        <?php if ($image_credit): ?>
                            <div class="header-slider__image-credit">
                                <p>Photo: <?php echo $image_credit ?></p>
                            </div>
                        <?php endif ?>

                    </div>

                    <div class="highlighted-img__wrap">
                        <?php if ($small_image) : ?>
                            <div class="highlighted-img">
                                <img src="<?php echo $small_image['url']; ?>" alt="<?php echo $small_image['title']; ?>">
                            </div>
                        <?php endif ?>
                    </div>


                </div>
            </div>
        </div>
        <?php endforeach ?>
        <?php endif ?>
    </div>

    <div class="slider__progress-bar slider__progress-bar-<?php echo $attributes['uniq_id']; ?> wrapper-1245"></div>
    <div class="gallery-nav-<?php echo $attributes['uniq_id']; ?> fwslider-nav
    fwslider-nav-<?php echo $attributes['uniq_id']; ?>" ></div>


</section>


<?php wp_reset_postdata(); ?>

<script>
    jQuery(document).ready(function(){

        let fwslider__el = document.getElementById('fwslider-<?php echo $attributes['uniq_id']; ?>');

        if (fwslider__el) {
            let fwslider = jQuery('.fwslider-<?php echo $attributes['uniq_id']; ?>');
            $fwslider = jQuery('.fwslider-<?php echo $attributes['uniq_id']; ?>');


            var reinitSlick = function(fwslider) {
                console.log('reinitSlick');
                // jQuery(header_slider).slick('slickSetOption', 'autoplay', false);
                jQuery(fwslider).slick('slickPause');
            }

            jQuery(fwslider).slick({
                autoplay: true,
                adaptiveHeight: true,
                autoplaySpeed: 2000,
                speed: 1000,
                fade: true,
                cssEase: 'linear',
                appendArrows:'.gallery-nav-<?php echo $attributes['uniq_id']; ?>',
                prevArrow:'<span class="slider-arrow prev slider-arrow-<?php echo $attributes['uniq_id']; ?>"></span>',
                nextArrow:'<span class="slider-arrow next slider-arrow-<?php echo $attributes['uniq_id']; ?>"></span>'
            }).slick('slickPause');
            // .on('setPosition', function (event, slick) {
            //     slick.$slides.css('height', slick.$slideTrack.height() + 'px');
            // });

            // A function that start autoplay when entering the viewport
            function triggerScroll(targetObj) {
                let targetName = targetObj.attr("id"); //for console.log
                let targetFlag = false;
                let scrollTop = jQuery(window).scrollTop();
                let scrollBottom = scrollTop + $(window).height();
                let targetTop = targetObj.offset().top;
                let targetBottom = targetTop + targetObj.height();
                // while loading
                if (scrollBottom > targetTop && scrollTop < targetBottom) {
                    if (!targetFlag) {
                        console.log(targetName + ' is in sight'); //for console.log
                        targetObj.slick('slickPlay');
                        targetFlag = true;
                    }
                } else {
                    console.log(targetName + ' is not in sight'); //for console.log
                    targetObj.slick('slickPause');
                    targetFlag = false;
                }

                jQuery(window).on('scroll', function () {
                    scrollTop = jQuery(window).scrollTop();
                    scrollBottom = scrollTop + $(window).height();
                    targetTop = targetObj.offset().top;
                    targetBottom = targetTop + targetObj.height();
                    if (scrollBottom > targetTop && scrollTop < targetBottom) {
                        // Start autoplay when entering the viewport
                        if (!targetFlag) {
                            console.log(targetName + ' is in sight');//確認用
                            targetObj.slick('slickPlay');
                            targetFlag = true;
                        }
                    } else {
                        // Stop autoplay when you get out of the viewport
                        if (targetFlag) {
                            console.log(targetName + ' is not in sight');//for console.log
                            targetObj.slick('slickPause');
                            targetFlag = false;
                        }
                    }
                });
            }
            // Execute function
            triggerScroll(jQuery('#fwslider-<?php echo $attributes['uniq_id']; ?>'));
        }


    });
    jQuery('.fwslider-<?php echo $attributes['uniq_id']; ?>').on('beforeChange', function(event, slick, currentSlide, nextSlide){
        initProgressBar_<?php echo $attributes['uniq_id']; ?>(nextSlide);
    });
    jQuery('.fwslider-<?php echo $attributes['uniq_id']; ?>').on('init', function(event, slick, direction) {
        initProgressBar_<?php echo $attributes['uniq_id']; ?>()
        console.log(jQuery('.fwslider-<?php echo $attributes['uniq_id']; ?> .slick-slide').length)
        // check to see if there are one or less slides
        if (jQuery('.fwslider-<?php echo $attributes['uniq_id']; ?> .slick-slide').length <= 1) {

            // remove arrows
            jQuery('.slider__progress-bar-<?php echo $attributes['uniq_id']; ?>').hide();
            jQuery('.gallery-nav-<?php echo $attributes['uniq_id']; ?>').hide();

        }
    })

    function initProgressBar_<?php echo $attributes['uniq_id']; ?>(nextSlide = 0){
        jQuery('.slider__progress-bar-<?php echo $attributes['uniq_id']; ?>').empty();
        let current_slide = jQuery('.fwslider-<?php echo $attributes['uniq_id']; ?> .slick-current.slick-active').attr('data-slick-index');
        let slider_items = jQuery('.fwslider-<?php echo $attributes['uniq_id']; ?> .fwslider-item');
        let total_slider = slider_items.length;
        let progress_bar_width = jQuery('.slider__progress-bar-<?php echo $attributes['uniq_id']; ?>').width();
        for(i=0; i<total_slider; i++ ) {
            jQuery('.slider__progress-bar-<?php echo $attributes['uniq_id']; ?>').append('<div class="slider__progress-item" style="width: '+ progress_bar_width/total_slider +'px" data-slick-index="'+ i +'"><div class="slider__progress-inner"></div></div>');
            if (i == nextSlide) {
                jQuery('.slider__progress-bar-<?php echo $attributes['uniq_id']; ?> .slider__progress-inner').removeClass('animate');
                jQuery('.slider__progress-bar-<?php echo $attributes['uniq_id']; ?> .slider__progress-item[data-slick-index="'+i+'"] .slider__progress-inner').addClass('animate');
            }
        }
    }
</script>


