
<?php
$content = NULL;
    if (get_sub_field('content')) :
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
//if ($content['text_color']) {
//    $classes .= ' ' . $content['text_color'] . ' ';
//}
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



<section class="timeline__section acf-section-<?php echo $attributes['uniq_id']; ?> <?php echo $classes ;?> <?php echo $background_texture; ?> <?= $padding; ?> <?= $bg_color_preset; ?>" style="background-image: url(<?php echo $attributes['background']['background_image']['url']; ?>); <?php  echo ($bg_color ?  'background-color: ' . $bg_color . ';' :''); ?> ">
    <div class="border-container wrapper-1245 <?= $border; ?>"></div>
    <div class="bg-overlay <?php  echo ($attributes['background']['enable_overlay'] == true ?  ' active ' : ''); ?>"></div>
    <div class="content-wrapper  <?php  echo ($attributes['wrappers']['content_wrapper'] ?  ' ' . $attributes['wrappers']['content_wrapper'] . ' ' :''); ?>">

        <div class="heading-block">
            <div class="rslider__heading"><?= $content['heading']; ?></div>
            <div class="rslider__desc"><?= $content['description'] ?></div>
        </div>
        <div class="timeline__wrapper">
            <?php if ($content['testimonials']) : ?>
                <?php foreach ($content['testimonials'] as $testimonials) : ?>
                    <div class="timeline__item">
                        <div class="timeline__image-block timeline__item-col">
                            <?php if ($testimonials['image']): ?>
                            <div class="timeline__image">
                                <img src="<?php echo $testimonials['image']['url'] ?>" alt="<?php echo $testimonials['image']['title'] ?>" title="<?php echo $testimonials['image']['title'] ?>">
                            </div>
                            <?php endif ?>
                        </div>
                        <div class="timeline__text-block timeline__item-col">
                            <div class="timeline__text-wrapper">
                                <div class="triangle">
                                    <div class="inner-triangle"></div>
                                </div>
                                <div class="timeline__date"><?php echo $testimonials['date'] ?></div>
                                <div class="timeline__subheads"><?php echo $testimonials['subheads'] ?></div>
                                <div class="timeline__text"><?php echo $testimonials['text'] ?></div>
                                <?php if ($testimonials['quotes']) : ?>
                                <div class="timeline__quotes">
                                    <div class="blockquote-body">
                                        <?php if ($testimonials['quotes']['text']) { ?>
                                        <p class="blockquote-text"><?php echo $testimonials['quotes']['text']; ?></p>
                                        <?php } ?>
                                        <div class="blockquote-author">
                                            <span><?php echo $testimonials['quotes']['author']; ?></span>
                                        </div>
                                        <div class="blockquote-author-position">
                                            <span><?php echo $testimonials['quotes']['position']; ?></span>
                                        </div>
                                    </div>
                                </div>
                                <?php endif ?>
                                <?php if ( $testimonials['link'] ): ?>
                                <div class="timeline__btn-group">
                                    <a href="<?php echo $testimonials['link']['url']; ?>" class="timeline__link">Read More</a>
                                </div>
                                <?php endif ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            <?php endif ?>

        </div>

    </div>
</section>


<?php wp_reset_postdata(); ?>

