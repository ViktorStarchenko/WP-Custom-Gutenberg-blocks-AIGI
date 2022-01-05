

<?php if (get_sub_field('content')) :
    $content = get_sub_field('content');

    $posts = $content['resources'];

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


<section class="profile-list acf-section-<?php echo $attributes['uniq_id']; ?> <?php echo $classes ;?> <?php echo $background_texture; ?> <?= $padding; ?><?= $border; ?>" style="background-image: url(<?php echo $attributes['background']['background_image']['url']; ?>); <?php  echo ($bg_color ?  'background-color: ' . $bg_color . ';' :''); ?> ">
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
    <div class="content-wrapper  <?php  echo ($attributes['wrappers']['content_wrapper'] ?  ' ' . $attributes['wrappers']['content_wrapper'] . ' ' :''); ?> highlighted-content <?php echo $content['content_direction']; ?>">

        <div class="profile-list__wrapper">
            <?php if ($posts) : ?>
                <?php foreach($posts as $post) : ?>
                    <div class="profile-list__item">
                        <div class="rslider__item-header">
<!--                            <div class="rslider__type content-tags__item">--><?php //echo $terms[0]; ?><!--</div>-->
                        </div>
                        <div class="rslider__item-body">
                            <div class="speakers__bio">
                                <div class="speakers__image">
                                    <img src="<?php echo get_the_post_thumbnail_url( $post->ID, 'full' ) ?>" alt="<?= $post->post_title; ?>">
                                </div>
                                <div class="speakers__bio-text">
                                    <div class="speakers__name"><?php echo $post->post_title; ?></div>
                                    <div class="speakers__position"><?php echo get_field('people_info')['position']; ?></div>
                                </div>
                            </div>
                            <?php
                            $excerpt = '';
                            ?>
                            <div class="rslider__excerpt"><?php echo get_custom_excerpt($post->post_content, 450, true) ?></div>
                            <!--                                    <div class="rslider__excerpt">--><?php //echo substr($post->post_content, 234) ?><!--</div>-->

                        </div>
                        <div class="rslider__item-footer">
                            <div class="rslider__link">
                                <a href="<?=  get_the_permalink($post->ID) ?>">Read more</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
                <?php wp_reset_postdata(); ?>
            <?php endif ?>

        </div>


    </div>
</section>




