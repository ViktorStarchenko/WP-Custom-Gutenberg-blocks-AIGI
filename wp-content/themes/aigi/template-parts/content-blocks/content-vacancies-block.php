
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



<section class="vacancies__section variety-section acf-section-<?php echo $attributes['uniq_id']; ?> <?php echo $classes ;?> <?php echo $background_texture; ?> <?= $padding; ?> <?= $bg_color_preset; ?>" style="background-image: url(<?php echo $attributes['background']['background_image']['url']; ?>); <?php  echo ($bg_color ?  'background-color: ' . $bg_color . ';' :''); ?> ">
    <div class="border-container wrapper-1245 <?= $border; ?>"></div>
    <div class="bg-overlay <?php  echo ($attributes['background']['enable_overlay'] == true ?  ' active ' : ''); ?>"></div>
    <div class="content-wrapper  <?php  echo ($attributes['wrappers']['content_wrapper'] ?  ' ' . $attributes['wrappers']['content_wrapper'] . ' ' :''); ?>">

        <div class="heading-block">
            <div class="rslider__heading"><?= $content['heading']; ?></div>
            <div class="rslider__desc"><?= $content['description'] ?></div>
        </div>
        <?php if ($content['vacancies']) : ?>

        <div class="vacancies__list">
            <?php foreach ($content['vacancies'] as $vacancy) : ?>
            <div class="vacancies__item">
                <div class="vacancies__item-header">
                    <div class="acancies__item-logo">
                        <img src="wp-content/themes/aigi/assets/images/logo-black.svg" alt="Indigenous Governance Toolkit">
                    </div>
                    <div class="vacancies__item-share">
                        <div class="post-tile__pricing-title">share</div>
                        <div class="vacancies__item-share-icons"><?php echo do_shortcode('[Sassy_Social_Share]'); ?></div>
                    </div>
                </div>

                <div class="vacancies__item-body">
                    <div class="vacancies__item-title"><?= $vacancy['title']; ?></div>
                    <div class="vacancies__item-description"><?= $vacancy['description'] ?></div>
                </div>
                <div class="vacancies__item-footer">
                    <div class="vacancies__item-info">
                        <div class="vacancies__item-info-list post-tile__pricing-list">
                            <?php if ($vacancy['vacancy_info']['employment_type']) : ?>
                            <div class="vacancies__item-info-item post-tile__pricing-item">
                                <div class="vacancies__item-info-title post-tile__pricing-type">Employment Type</div>
                                <div class="vacancies__item-info-lavue post-tile__pricing-price"><?php echo $vacancy['vacancy_info']['employment_type'] ?></div>
                            </div>
                            <?php endif ?>
                            <?php if ($vacancy['vacancy_info']['location']) : ?>
                            <div class="vacancies__item-info-item post-tile__pricing-item">
                                <div class="vacancies__item-info-title post-tile__pricing-type">Location</div>
                                <div class="vacancies__item-info-lavue post-tile__pricing-price"><?php echo $vacancy['vacancy_info']['location'] ?></div>
                            </div>
                            <?php endif ?>
                            <?php if ($vacancy['vacancy_info']['remuneration']) : ?>
                            <div class="vacancies__item-info-item post-tile__pricing-item">
                                <div class="vacancies__item-info-title post-tile__pricing-type">Remuneration</div>
                                <div class="vacancies__item-info-lavue post-tile__pricing-price"><?php echo $vacancy['vacancy_info']['remuneration'] ?></div>
                            </div>
                            <?php endif ?>
                            <?php if ($vacancy['vacancy_info']['closing_date']) : ?>
                            <div class="vacancies__item-info-item post-tile__pricing-item">
                                <div class="vacancies__item-info-title post-tile__pricing-type">Closing Date</div>
                                <div class="vacancies__item-info-lavue post-tile__pricing-price"><?php echo $vacancy['vacancy_info']['closing_date'] ?></div>
                            </div>
                            <?php endif ?>
                        </div>

                        <?php if ($vacancy['job_description_file']) : ?>
                        <div class="btn-group">
                            <a href="<?php echo $vacancy['job_description_file']['url']; ?>" download target="" class="btn-62152a76074ee  btn-body  btn-h-secondary-blue  download  after  Between ">
                                <span class="btn-inner">Download job description</span>
                            </a>
                        </div>
                        <?php endif ?>
                    </div>

                </div>
            </div>
            <?php endforeach ?>
        </div>

        <?php endif ?>
    </div>
</section>


<?php wp_reset_postdata(); ?>

