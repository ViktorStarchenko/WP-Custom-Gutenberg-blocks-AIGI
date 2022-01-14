

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
if ($content['text_color']) {
    $classes .= ' ' . $content['text_color'] . ' ';
}
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



<section class="text-media__section acf-section-<?php echo $attributes['uniq_id']; ?> <?php echo $classes ;?> <?php echo $background_texture; ?> <?= $padding; ?><?= $border; ?>" style="background-image: url(<?php echo $attributes['background']['background_image']['url']; ?>); <?php  echo ($bg_color ?  'background-color: ' . $bg_color . ';' :''); ?> ">
    <div class="bg-overlay <?php  echo ($attributes['background']['enable_overlay'] == true ?  ' active ' : ''); ?>"></div>
    <div class="content-wrapper  <?php  echo ($attributes['wrappers']['content_wrapper'] ?  ' ' . $attributes['wrappers']['content_wrapper'] . ' ' :''); ?> text-media__content <?php echo $content['content_direction']; ?> <?php echo ($content['media']['enable'] == true) ? ' media-enabled ' : '' ?>">

        <div class="text-media__text-wrapper text-media__content-column <?php echo $content['justify_content'];?>" data-height="<?php echo $attributes['uniq_id']; ?>">
            <?php if ($content['text']) : ?>
            <?php foreach ($content['text'] as $content_item) : ?>
                <div class="text-media__text <?php echo $content_item['type'] ?>"><?php echo $content_item['body'] ?></div>
            <?php endforeach ?>
            <?php endif ?>
            <?php if (get_sub_field('button_group')['buttons']) {
                get_template_part('template-parts/content-blocks/content', 'button-group');
            } ?>
        </div>

        <?php if ($content['media']['enable'] == true) : ?>
        <div class="text-media__media-wrapper text-media__content-column" data-height="<?php echo $attributes['uniq_id']; ?>">
            <?php if ($content['media']['type'] == 'image') : ?>

                <div class="text-media__media <?= $content['media']['type'] ?>">
                    <img src="<?php echo $content['media']['image']['url'] ?>" alt="<?php echo $content['media']['image']['title'] ?>">
                </div>

            <?php elseif ($content['media']['type'] == 'video-embed') : ?>
                <div class="text-media__media <?= $content['media']['type'] ?>">
                    <iframe width="100%" height="100%" src="https://www.youtube.com/embed/<?php echo $content['media']['embed_video'] ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

                </div>
            <?php elseif ($content['media']['type'] == 'video-upload') : ?>
                <div class="text-media__media <?= $content['media']['type'] ?>">
                    <div class="online__video-wrap">
                        <video  preload="metadata" class="paused online-video" data-watched="false" data-issetsrc="false" data-video="<?php echo $attributes['uniq_id']; ?>" playsinline="" webkit-playinginline="" heght="auto" width="100%" src="<?php echo $content['media']['upload_video']['url']?>">
                        </video>
                        <div class="video-button-wrap">
                            <button id="online__video-button" class="play online__video-button fist-lesson-button" data-video="<?php echo $attributes['uniq_id']; ?>">
                                <span class="play-button-body"></span>
                            </button>
                        </div>
                        <div class="video-pause-wrap" data-video="<?php echo $attributes['uniq_id']; ?>">
                            <button id="online__video-pause-button" class="pause"></button></div>
                    </div>
                </div>
            <?php endif ?>

            <div class="text-media__media-text">
                <?php echo $content['media']['text']; ?>
            </div>

        </div>
        <?php endif ?>

    </div>
</section>


<?php wp_reset_postdata(); ?>

