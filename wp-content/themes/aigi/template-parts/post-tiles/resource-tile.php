<?php $terms =  wp_get_post_terms( get_the_id(), 'resource_type', array('fields' => 'names') );?>
<?php
$post_type = get_post_type( get_the_ID() );
$type = '';
$resource_bg_extended = '';
$tag_title = '';
$data_video_suf = '';
$appearance = get_field('appearance');
if($terms[0] == 'Video') {
    $type = 'video';
    $resource_bg_extended = 'extended';
    $data_video_suf = random_int(0, 999);
} else if ($terms[0] == 'Link') {
    $type = 'link';
} else if ($terms[0] == 'Diagram') {
    if (get_field('diagram_type') == 'Table') {
        $type = 'table';
    } else if (get_field('diagram_type') == 'Rightaligned' || get_field('add_diagram')) {
        $type = 'image';
        $resource_bg_extended = 'extended';
    }
} else if ($terms[0] == 'File') {
    $type = 'file';
} else if ($terms[0] == 'Example') {
    $term_list = wp_get_post_terms(get_the_ID(), 'resource_tag', array("fields" => "names"));
    $the_tags = implode(", ", $term_list);
    if($the_tags == 'Tips'):

        $tag_title = 'Tips: ';
    else:
        $tag_title = 'Example: ';
    endif;
    $type = 'tips';
} else if ($terms[0] == 'Publication') {
    $type = 'publication';
}

?>

<?php

if (get_field('td_resource_teaser')) {
    $excerpt = get_field('td_resource_teaser');
} else if (get_field('add_text')) {
    $excerpt = get_field('add_text');
} else if (get_the_excerpt()){
    $excerpt = get_the_excerpt();
} else if (get_the_content()) {
    $excerpt = get_the_content();
} else {
    $excerpt = '';
}

?>

<?php
$bg_image = '';
if (get_field('add_diagram')) {
    $bg_image = get_field('add_diagram');
} else if (get_field('td_resource_image')) {
    $bg_image = get_field('td_resource_image')['url'];
}
?>

<div class="post-tile__wrap  <?= $post_type; ?> <?php echo $type;?> post-<?php echo get_the_ID(); ?> <?php echo ($appearance['disable_header_footer_on_mobile'] == false) ? 'mob-style-2' : '' ?>">
    <div class="post-tile__mob-header">
        <div class="post-tile__tags">
            <?php $term_list = wp_get_post_terms( get_the_ID(), 'topic', array('fields' => 'all') );
            foreach ($term_list as $term) :
                ?>
                <a class="content-tags__item" href="/search?/?_topics=<?php echo $term->slug ?>" data-tem-id="<?php echo  $term->term_id ?>"><?php echo $term->name ?></a>
            <?php endforeach ?>
        </div>
        <!--        <a href="#" class="add-to-calendar"></a>-->
    </div>
    <div class="post-tile__img-box">
        <div class="post-tile__img">
            <?php if (!empty($bg_image)) { ?>

                <img class="post-tile__thumb" src="<?= $bg_image; ?>" alt="<?php the_title(); ?>">

            <?php } else { ?>

                <?php if ($type == 'video') { ?>
                    <picture>
                        <img class="post-tile__type-text" src="/wp-content/themes/aigi/assets/images/VideoClip.svg" alt="<?php the_title(); ?>">
                    </picture>
                <?php } else if ($type == 'image') { ?>
                    <picture>
                        <img class="post-tile__type-text" src="/wp-content/themes/aigi/assets/images/image.svg" alt="<?php the_title(); ?>">
                    </picture>
                <?php } else if ($type == 'link') { ?>
                    <picture>
                        <img class="post-tile__type-text" src="/wp-content/themes/aigi/assets/images/Link.svg" alt="<?php the_title(); ?>">
                    </picture>
                <?php } else if ($type == 'file') { ?>
                    <picture>
                        <img class="post-tile__type-text" src="/wp-content/themes/aigi/assets/images/file.svg" alt="<?php the_title(); ?>">
                    </picture>
                <?php } else if ($type == 'table') { ?>
                    <picture>
                        <img class="post-tile__type-text" src="/wp-content/themes/aigi/assets/images/table.svg" alt="<?php the_title(); ?>">
                    </picture>
                <?php } else if ($type == 'tips') { ?>
                    <picture>
                        <img class="post-tile__type-text" src="/wp-content/themes/aigi/assets/images/tips.svg" alt="<?php the_title(); ?>">
                    </picture>
                <?php } else if ($type == 'publication') { ?>
                    <picture>
                        <img class="post-tile__type-text" src="/wp-content/themes/aigi/assets/images/file.svg" alt="<?php the_title(); ?>">
                    </picture>
                <?php } ?>

            <?php } ?>
        </div>
    </div>

    <div class="post-tile__content">
        <div class="post-tile__content-header">
            <div class="post-tile__left">
                <span class="post-tile__pub-date"><?php echo date("M d Y", strtotime(get_the_date())); ?></span>
            </div>

            <div class="post-tile__right">
                <?php if (get_field('time_to_read')): ?>
                    <span class="post-tile__time"><?php echo get_field('time_to_read'); ?> read</span>
                <?php endif ?>
<!--                --><?php //echo do_shortcode('[favorite_button]') ?>
                <?php
                $user_id = get_current_user_id();
                $post_id = get_the_ID();
                $reading_list = get_user_favorites($user_id);
                if(is_user_logged_in()){
                    if (in_array("Irix", $reading_list)) { ?>
                        <span>
                                <button class="simplefavorite-button active" data-postid="<?php echo $post_id; ?>" data-siteid="1" data-groupid="1" data-favoritecount="1" style="">
                                    <i class="sf-icon-star-full"></i>
                                    <span>Remove to reading list</span>
                                </button>
                            </span>
                    <?php } else { ?>
                        <span>
                                <button class="simplefavorite-button" data-postid="<?php echo $post_id; ?>" data-siteid="1" data-groupid="1" data-favoritecount="0" style="">
                                    <i class="sf-icon-star-empty"></i>
                                    <span>Add to reading list</span>
                                </button>
                            </span>
                    <?php }
                }?>
            </div>
        </div>
        <div class="post-tile__content-body">
            <div class="post-tile__tags">
                <?php $term_list = wp_get_post_terms( get_the_ID(), 'topic', array('fields' => 'all') );
                foreach ($term_list as $term) : ?>
                    <a class="content-tags__item" href="/search?_topics=<?php echo $term->slug ?>" data-tem-id="<?php echo  $term->term_id ?>"><?php echo $term->name ?></a>
                <?php endforeach ?>
            </div>

            <div class="post-tile__title">
                <span><?php the_title(); ?></span>
            </div>
            <div class="post-tile__excerpt"><p><?php echo get_custom_excerpt($excerpt, 213, true) ?></p></div>
        </div>
        <div class="post-tile__content-footer">
            <a href="<?=  get_the_permalink(get_the_ID()) ?>" target="" class="btn-body btn-transparent triangle after Between">
                <span class="btn-inner">READ MORE</span>
            </a>
        </div>

    </div>
    <div class="post-tile__mob-footer">
        <a href="<?=  get_the_permalink(get_the_ID()) ?>" target="" class="  btn-body  btn-h-secondary-blue  triangle  after  Between " tabindex="0">
            <span class="btn-inner">Read more</span>
        </a>
    </div>
</div>
