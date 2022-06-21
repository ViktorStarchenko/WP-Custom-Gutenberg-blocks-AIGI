<?php
$classname = 'custom_image';
if (!empty($block['clasName'])) {
    $classname .= ' ' . $block['clasName'];
}
if (!empty($block['align'])) {
    $classname .= ' align' . $block['align'];
}
?>

<?php if (get_field('image_block')) {?>
    <?php $data = get_field('image_block'); ?>
    <div class="content-item image-block  <?php echo esc_attr($classname) ?>">

        <div class="single-resource__container image extended">
            <div class="single-resource__bg extended"></div>
            <div class="single-resource__inner">
                <div class="single-resource__header">
                    <div class="single-resource__title">
                        <a target="_blank" <?php echo ($data['image_link'] ? 'href="'.$data['image_link']['url'].'"' : '' ) ?>><?php echo $data['title'];?></a>
                    </div>
                    <span class="single-resource__icon image"></span>
                </div>
                <div class="single-resource__body">

                    <?php if ($data['add_image']) : ?>
                        <div class="resource-image__wrap">
                            <picture>
                                <img src="<?php echo $data['add_image']['url'];?>" alt="<?php echo $data['add_image']['url'] ;?>">
                            </picture>
                        </div>
                    <?php endif ?>

                    <?php if($data['add_text']) : ?>
                        <div class="resource__text">
                            <p><?php echo $data['add_text']; ?></p>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="single-resource__footer"></div>
            </div>

        </div>


    </div>
<?php }?>

