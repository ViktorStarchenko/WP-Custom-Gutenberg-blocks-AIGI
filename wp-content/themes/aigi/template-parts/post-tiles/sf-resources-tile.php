<?php $args = array('post_type' => 'event');
$args['search_filter_id'] = 3129;
$query_news = new WP_Query($args);
$posts = $query_news->posts;
?>
<?php if ($posts) {
foreach ($posts as $post) { ?>

    <?php $terms =  wp_get_post_terms( $post->ID, 'resource_type', array('fields' => 'names') );?>
    <?php
    $type = '';
    $resource_bg_extended = '';
    $tag_title = '';
    $data_video_suf = '';
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
        $term_list = wp_get_post_terms($post->ID, 'resource_tag', array("fields" => "names"));
        $the_tags = implode(", ", $term_list);
        if($the_tags == 'Tips'):

            $tag_title = 'Tips: ';
        else:
            $tag_title = 'Example: ';
        endif;
        $type = 'tips';
    }
    ?>


    <div class="post-tile__wrap resource <?php echo $type;?> post-<?php echo $post->ID; ?>">
        <div class="post-tile__img-box">
            <div class="post-tile__img">
                <?php if (get_the_post_thumbnail_url( $post->ID, 'full' )) { ?>

                    <img class="post-tile__thumb" src="<?= get_the_post_thumbnail_url( $post->ID, 'full' ); ?>" alt="<?php echo $post->post_titl; ?>">

                <?php } else { ?>

                    <?php if ($type == 'video') { ?>
                        <picture>
                            <img class="post-tile__type-text" src="/wp-content/themes/aigi/assets/images/VideoClip.svg" alt="<?php echo $post->post_titl; ?>">
                        </picture>
                    <?php } else if ($type == 'image') { ?>
                        <picture>
                            <img class="post-tile__type-text" src="/wp-content/themes/aigi/assets/images/image.svg" alt="<?php echo $post->post_titl; ?>">
                        </picture>
                    <?php } else if ($type == 'link') { ?>
                        <picture>
                            <img class="post-tile__type-text" src="/wp-content/themes/aigi/assets/images/Link.svg" alt="<?php echo $post->post_titl; ?>">
                        </picture>
                    <?php } else if ($type == 'file') { ?>
                        <picture>
                            <img class="post-tile__type-text" src="/wp-content/themes/aigi/assets/images/file.svg" alt="<?php echo $post->post_titl; ?>">
                        </picture>
                    <?php } else if ($type == 'table') { ?>
                        <picture>
                            <img class="post-tile__type-text" src="/wp-content/themes/aigi/assets/images/table.svg" alt="<?php  echo $post->post_titl; ?>">
                        </picture>
                    <?php } else if ($type == 'tips') { ?>
                        <picture>
                            <img class="post-tile__type-text" src="/wp-content/themes/aigi/assets/images/tips.svg" alt="<?php  echo $post->post_titl; ?>">
                        </picture>
                    <?php } ?>

                <?php } ?>
            </div>
        </div>

        <div class="post-tile__content">
            <div class="post-tile__content-header">
                <div class="post-tile__left">
                    <span class="post-tile__pub-date"><?php echo $post->post_date; ?></span>
                </div>

                <div class="post-tile__right">
                <span class="post-tile__time">
                    <span>10 min read</span>
                </span>
                    <?php echo do_shortcode('[favorite_button]') ?>
                </div>
            </div>
            <div class="post-tile__content-body">
                <div class="post-tile__tags">
                    <?php $term_list = wp_get_post_terms( $post->ID, 'topics', array('fields' => 'all') );
                    foreach ($term_list as $term) : ?>
                        <a class="content-tags__item" href="/search?_content_tags=<?php echo $term->slug ?>" data-tem-id="<?php echo  $term->term_id ?>"><?php echo $term->name ?></a>
                    <?php endforeach ?>
                </div>

                <div class="post-tile__title">
                    <span><?php echo $post->post_title; ?></span>
                </div>
                <div class="post-tile__excerpt"><p><?php echo substr($post->post_excerpt, 0,185) ?></p></div>
            </div>
            <div class="post-tile__content-footer">
                <a href="<?=  get_the_permalink($post->ID) ?>" target="" class="btn-body btn-transparent triangle after Between">
                    <span class="btn-inner">READ MORE</span>
                </a>
            </div>

        </div>
    </div>
<?php } ?>
    <?php wp_reset_postdata(); ?>
<?php } ?>




