

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



<section class="blockquote-single acf-section-<?php echo $attributes['uniq_id']; ?> <?php echo $classes ;?> <?php echo $background_texture; ?> <?= $padding; ?><?= $border; ?>" style="background-image: url(<?php echo $attributes['background']['background_image']['url']; ?>); <?php  echo ($bg_color ?  'background-color: ' . $bg_color . ';' :''); ?> ">
    <div class="bg-overlay <?php  echo ($attributes['background']['enable_overlay'] == true ?  ' active ' : ''); ?>"></div>
    <div class="content-wrapper  <?php  echo ($attributes['wrappers']['content_wrapper'] ?  ' ' . $attributes['wrappers']['content_wrapper'] . ' ' :''); ?>">

        <div class="blockquote__wrapper">
            <div class="blockquote-slider_nav blockquote-slider_nav-<?php echo $attributes['uniq_id'];?> slider-arrows"></div>
            <div class="blockquote-body">
                <p class="blockquote-text"><?php echo $content['form_title']; ?></p>
                <div class="blockquote-author">
                    <span><?php echo $content['author']; ?></span>
                </div>
                <div class="blockquote-author-position">
                    <span><?php echo $content['author_position']; ?></span>
                </div>
            </div>
                <?php wp_reset_postdata(); ?>
            </div>
        </div>

    </div>
</section>





