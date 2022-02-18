


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

<section class="accordion-block-section pos-relative acf-section-<?php echo get_row_index() . ' '; ?> acf-section-<?php echo $attributes['uniq_id']. ' '; ?> <?php echo $classes ?> <?= $background_texture; ?><?= $padding; ?> <?= $bg_color_preset; ?>" id="<?php  echo ($attributes['section_id'] ? $attributes['section_id'] :''); ?>" style="background-image: url(<?php echo $attributes['background']['background_image']['url']; ?>); <?php  echo ($bg_color ?  'background-color: ' . $bg_color . ';' :''); ?> color: <?php echo $attributes['background']['text_color']; ?>; ">
    <div class="border-container wrapper-1245 <?= $border; ?>"></div>
    <div class="accordion-block-wrapper content-wrapper <?php  echo ($attributes['wrappers']['content_wrapper'] ?  ' ' . $attributes['wrappers']['content_wrapper'] . ' ' :''); ?>">


        <div class="global-search-tab " data-post-type="faqs">
            <div class="tab-heading"><?php echo $content['heading']; ?></div>
                <div class="tab-content-wrapper">
                    <?php $accord = $content['accordion_tab']; ?>
                    <?php if ($accord) : ?>
                        <div class="accordion_wrapper">
                                <?php foreach ($accord as $acco) : ?>
                                    <div class="accordion_item">
                                        <?php if($acco['question']): ?>
                                            <span class="title-h4 nav_list-title accordion_btn"><?= $acco['question']; ?></span>
                                        <?php endif ?>
                                        <div  class="accordion_panel">
                                            <div class="accordion_content"><?= $acco['answer']?></div>
                                         </div>
                                    </div>
                                <?php endforeach; ?>
                                <?php wp_reset_postdata(); ?>
                        </div>
                    <?php endif ?>
                </div>
        </div>
</div>
</section>
