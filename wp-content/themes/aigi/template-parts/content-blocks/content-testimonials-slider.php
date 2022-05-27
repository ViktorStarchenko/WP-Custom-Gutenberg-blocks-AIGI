
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
$bg_color= '';
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
    class="rslider-section testimonials-slider wrapper-full-width acf-section-<?php echo get_row_index() . ' '; ?>
acf-section-<?php echo $attributes['uniq_id']. ' '; ?><?php echo $classes ?><?= $background_texture; ?><?= $padding; ?><?= $border; ?> <?= $bg_color_preset; ?>" id="<?php  echo ($attributes['section_id'] ? $attributes['section_id'] :''); ?>" style="background-image: url(<?php echo $attributes['background']['background_image']['url']; ?>); <?php  echo ($bg_color ?  'background-color: ' . $bg_color . ';' :''); ?> ">
    <div class="bg-overlay <?php  echo ($attributes['background']['enable_overlay'] == true ?  ' active ' : ''); ?>"></div>
    <div class="wrapper-1245 content-wrapper">
        <div class="rslider__header">
            <div class="rslider__header-top">
                <div class="rslider__heading"><?= $content['heading']; ?></div>
                <div class="rslider_nav rslider_nav-<?php echo $attributes['uniq_id'];?> slider-arrows"></div>
            </div>
            <div class="rslider__desc"><?= $content['description'] ?></div>
        </div>
    </div>
    <div class="rslider__outter wrapper-1245 stick-right">
        <div class="rslider__inner content-wrapper wrapper-full-width">

            <div class="rslider__wrapper">
                <div class="slider rslider rslider-<?php echo $attributes['uniq_id'];?> rslider__testimonials">
                    <?php foreach( $content['testimonials'] as $testimonials ) : ?>

                        <div>
                            <div class="rslider__item rslider__testimonials-item">
                                <div class="testimonial__image">
                                    <?php if ($testimonials['image']) : ?>
                                    <img src="<?php echo $testimonials['image']['url']; ?>" alt="<?php echo $testimonials['image']['title']; ?>">
                                    <?php endif ?>
                                </div>
                                <div class="testimonial__author-name"><?php echo $testimonials['author']; ?></div>
                                <div class="testimonial__author-title"><?php echo $testimonials['author_title']; ?></div>
                                <div class="testimonial__text"><?php echo $testimonials['testimonial']; ?></div>
                            </div>
                        </div>

                    <?php endforeach; ?>
                    <?php wp_reset_postdata(); ?>
                </div>
            </div>
<!--            --><?php //if (get_sub_field('button_group')['buttons']) {
//                get_template_part('template-parts/content-blocks/content', 'button-group');
//            } ?>

        </div>
    </div>

</section>

<script>
    // Sticky to right sliders

    $('.rslider-<?php echo $attributes['uniq_id'];?>').slick({
        // variableWidth: true,
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
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
                breakpoint: 992,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    centerMode: true,
                }
            },
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    centerMode: false,
                    centerPadding: false,
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
</script>
