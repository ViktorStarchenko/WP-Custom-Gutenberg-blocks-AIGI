

<?php
$button_group = get_sub_field('button_group');
$button_group_classes = '';
if ($button_group['alignment']['desktop']) {
    $button_group_classes .= ' ' . $button_group['alignment']['desktop'] . ' ';
}
if ($button_group['alignment']['mobile']) {
    $button_group_classes .= ' ' . $button_group['alignment']['mobile'] . ' ';
}

if ($button_group['margin']['margin_top']) {
    $button_group_classes .= ' ' . $button_group['margin']['margin_top'] . ' ';
}
if ($button_group['margin']['margin_bottom']) {
    $button_group_classes .= ' ' . $button_group['margin']['margin_bottom'] . ' ';
}

?>



<?php if($button_group['buttons']) : ?>
    <div class="btn-group <?php echo $button_group_classes ; ?>">
    <?php foreach($button_group['buttons'] as $button) : ?>

    <?php
    $classes = '';
    if ($button['styling']['color']) {
        $classes .= ' ' . $button['styling']['color'] . ' ';
    }
    if ($button['styling']['icon']) {
        $classes .= ' ' . $button['styling']['icon'] . ' ';
    }
    if ($button['styling']['icon_position']) {
        $classes .= ' ' . $button['styling']['icon_position'] . ' ';
    }
    if ($button['styling']['alignment']) {
        $classes .= ' ' . $button['styling']['alignment'] . ' ';
    }
    if ($button['anchor'] == true) {
        $classes .= ' ' . 'crane' . ' ';
    }

    ?>
        <a href="<?php echo $button['button']['url'] ;?>" target="<?= $button['button']['target'] ?>" class="btn-<?php echo $button['id']; ?>  btn-body <?php echo $classes ?>">
            <span class="btn-inner"><?php echo $button['button']['title'] ;?></span>
        </a>
    <?php endforeach; ?>
        <?php wp_reset_postdata(); ?>
    </div>
<?php endif; //edif buttons ?>

