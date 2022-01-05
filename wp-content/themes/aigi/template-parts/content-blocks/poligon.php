

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



<section class="how-to-use acf-section-<?php echo $attributes['uniq_id']; ?> <?php echo $classes ;?> <?php echo $background_texture; ?> <?= $padding; ?><?= $border; ?>" style="background-image: url(<?php echo $attributes['background']['background_image']['url']; ?>); <?php  echo ($bg_color ?  'background-color: ' . $bg_color . ';' :''); ?> ">
    <div class="bg-overlay <?php  echo ($attributes['background']['enable_overlay'] == true ?  ' active ' : ''); ?>"></div>
    <div class="content-wrapper  <?php  echo ($attributes['wrappers']['content_wrapper'] ?  ' ' . $attributes['wrappers']['content_wrapper'] . ' ' :''); ?> how-to-use-content <?php echo $content['content_direction']; ?>">
        <div class="highlighted-text">
            <?php if ($content['title']): ?>
                <div class="highlighted__title">
                    <p><?php echo $content['title'] ?></p>
                </div>
            <?php endif ?>

            <?php if ($content['subtitle']): ?>
                <div class="highlighted__subtitle">
                    <p><?php echo $content['subtitle'] ?></p>
                </div>
            <?php endif ?>

            <?php if ($content['short_text']): ?>
                <div class="highlighted__short-text">
                    <p><?php echo $content['short_text']; ?></p>
                </div>
            <?php endif ?>

        </div>

        <div class="how-to-use__list">
            <div class="how-to-use__item">
                <div class="how-to-use__icon">
                    <img src="/wp-content/themes/aigi/assets/images/icons8-book.svg" alt="icons8-book.svg">
                </div>
                <div class="how-to-use__title">
                    1. Read online
                </div>
                <div class="how-to-use__text">
                    Read the toolkit just like a book, or jump to whichever topic interests you.
                </div>
            </div>

            <div class="how-to-use__item">
                <div class="how-to-use__icon">
                    <img src="/wp-content/themes/aigi/assets/images/icons8-book.svg" alt="icons8-book.svg">
                </div>
                <div class="how-to-use__title">
                    2. Customise
                </div>
                <div class="how-to-use__text">
                    Use the toolkit to customise your own strategies and solutions.
                </div>
            </div>

            <div class="how-to-use__item">
                <div class="how-to-use__icon">
                    <img src="/wp-content/themes/aigi/assets/images/icons8-book.svg" alt="icons8-book.svg">
                </div>
                <div class="how-to-use__title">
                    3. Self-evaluate
                </div>
                <div class="how-to-use__text">
                    Use the check-up resources throughout the toolkit to see how you are going.
                </div>
            </div>

            <div class="how-to-use__item">
                <div class="how-to-use__icon">
                    <img src="/wp-content/themes/aigi/assets/images/icons8-book.svg" alt="icons8-book.svg">
                </div>
                <div class="how-to-use__title">
                    4. Download + Print
                </div>
                <div class="how-to-use__text">
                    Download or print out sections of the toolkit as you need them.
                </div>
            </div>
        </div>


    </div>
</section>


<?php wp_reset_postdata(); ?>


