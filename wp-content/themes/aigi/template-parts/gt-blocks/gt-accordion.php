<?php
    $classname = 'custom_accordion';
    if (!empty($block['clasName'])) {
        $classname .= ' ' . $block['clasName'];
    }
    if (!empty($block['align'])) {
        $classname .= ' align' . $block['align'];
    }
?>
<?php if (get_field('accordion_block')) { ?>
    <?php $data = get_field('accordion_block'); ?>
<div class="content-item accordion <?php echo esc_attr($classname)  ?>">
    <div class="accordion_wrapper">

        <?php foreach ($data as $item) {?>
            <div class="accordion_item">
                <?php if($item['content']): ?>
                    <span class="title-h4 nav_list-title accordion_btn"><?php echo $item['title'];?></span>
                <?php endif ?>
                <div  class="accordion_panel">
                    <?php if($item['subtitle']): ?>
                        <span class="accordion_subtitle"><?php echo $item['subtitle'];?></span>
                    <?php endif ?>
                    <div class="accordion_content">
                        <?php if($item['content']): ?>
                            <?php echo $item['content'];?>
                        <?php endif ?>
                    </div>
                </div>
            </div>
        <?php }?>

    </div>
</div>
<?php } ?>