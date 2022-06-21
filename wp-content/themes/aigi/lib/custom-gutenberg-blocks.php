<?php
if (function_exists('acf_register_block_type_accordion')) {
    add_action('acf/init', 'acf_register_block_type_accordion');
}

function acf_register_block_type_accordion() {
    acf_register_block_type(
        array(
            'name' => 'custom_accordion',
            'title' => __('Custom Accordion'),
            'description' => __('Custom Accordion Block'),
            'render_template' => 'template-parts/gt-blocks/gt-accordion.php',
            'icon' => 'editor-paste-text',
            'keywords' => array('custom_accordion', 'product', 'post'),
        )
    );
}



if (function_exists('acf_register_block_type_image')) {
    add_action('acf/init', 'acf_register_block_type_image');
}

function acf_register_block_type_image() {
    acf_register_block_type(
        array(
            'name' => 'custom_image',
            'title' => __('Custom Image'),
            'description' => __('Custom Image Block'),
            'render_template' => 'template-parts/gt-blocks/gt-image.php',
            'icon' => 'editor-paste-text',
            'keywords' => array('custom_image', 'product', 'post'),
        )
    );
}

if (function_exists('acf_register_block_type_video')) {
    add_action('acf/init', 'acf_register_block_type_video');
}

function acf_register_block_type_video() {
    acf_register_block_type(
        array(
            'name' => 'custom_video',
            'title' => __('Custom Video'),
            'description' => __('Custom Video Block'),
            'render_template' => 'template-parts/gt-blocks/gt-video.php',
            'icon' => 'editor-paste-text',
            'keywords' => array('custom_video', 'product', 'post'),
        )
    );
}