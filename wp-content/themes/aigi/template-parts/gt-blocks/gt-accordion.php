<?php
    $classname = 'custom_accordion';
    if (!empty($block['clasName'])) {
        $classname .= ' ' . $block['clasName'];
    }
    if (!empty($block['align'])) {
        $classname .= ' align' . $block['align'];
    }
?>

<div class="content-item accordion <?php echo esc_attr($classname)  ?>">
    <div class="accordion_wrapper">
    <?php if (have_rows('accordion_block')) { ?>
        <?php while (have_rows('accordion_block')) : the_row();  ?>
            <div class="accordion_item">
                <?php if(get_sub_field('content')): ?>
                    <span class="title-h4 nav_list-title accordion_btn"><?php echo get_sub_field('title')?></span>
                <?php endif ?>
                <div  class="accordion_panel">
                    <?php if(get_sub_field('subtitle')): ?>
                        <span class="accordion_subtitle"><?php echo get_sub_field('subtitle')?></span>
                    <?php endif ?>
                    <div class="accordion_content">
                        <?php if(get_sub_field('content')): ?>
                            <?php echo get_sub_field('content')?>
                        <?php endif ?>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    <?php } ?>
    </div>
</div>
