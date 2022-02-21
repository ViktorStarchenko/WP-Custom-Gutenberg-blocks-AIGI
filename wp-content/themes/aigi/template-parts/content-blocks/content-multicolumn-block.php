

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


$columns_per_row = '';
if($content['columns_per_row']) {
    $columns_per_row = $content['columns_per_row'];
}

$columns_per_row_desk = '';
if($content['columns_per_row']['desktop']) {
    $columns_per_row_desk = $content['columns_per_row']['desktop'];
}
$columns_per_row_tablet = '';
if($content['columns_per_row']['tablet']) {
    $columns_per_row_tablet = $content['columns_per_row']['tablet'];
}

$multicolumn_list_bg_color = '';
if($content['multicolumn_list_bg_color']) {
    $multicolumn_list_bg_color = $content['multicolumn_list_bg_color'];
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



<section class="text-media__section acf-section-<?php echo $attributes['uniq_id']; ?> <?php echo $classes ;?> <?php echo $background_texture; ?> <?= $padding; ?> <?= $bg_color_preset; ?>" style="background-image: url(<?php echo $attributes['background']['background_image']['url']; ?>); <?php  echo ($bg_color ?  'background-color: ' . $bg_color . ';' :''); ?> ">
    <div class="border-container wrapper-1245 <?= $border; ?>"></div>
    <div class="bg-overlay <?php  echo ($attributes['background']['enable_overlay'] == true ?  ' active ' : ''); ?>"></div>
    <div class="content-wrapper  <?php  echo ($attributes['wrappers']['content_wrapper'] ?  ' ' . $attributes['wrappers']['content_wrapper'] . ' ' :''); ?> text-media__content ">
        <div class="multicolumn__list <?php echo $multicolumn_list_bg_color; ?>">
            <?php if ($content['multicolumn_list']) : ?>
                <?php foreach ($content['multicolumn_list'] as $multicolumn_list) : ?>

                    <div class="multicolumn__item <?php echo $multicolumn_list['text_color']; ?> <?php echo $columns_per_row_desk; ?> <?php echo $columns_per_row_tablet; ?>">
                        <?php foreach ($multicolumn_list['multicolumn_item'] as $content_item) : ?>

                                <?php if ($content_item['content_type'] == 'text') : ?>
                                    <div class="text_item <?php echo $content_item['type'] ?> <?php echo $content_item['alighnment']; ?>">
                                        <?php echo $content_item['text'] ?>
                                    </div>
                                <?php elseif ($content_item['content_type'] == 'image') : ?>
                                    <div class="header-block__content-item text_item image <?php echo $content_item['alighnment']; ?>">
                                        <img src="<?php echo $content_item['image']['url'] ?>" alt="<?php echo $content_item['image']['title'] ?>">
                                    </div>
                                <?php endif ?>

                        <?php endforeach ?>
                    </div>

                <?php endforeach ?>
            <?php endif ?>
        </div>
    </div>
</section>


<?php wp_reset_postdata(); ?>

