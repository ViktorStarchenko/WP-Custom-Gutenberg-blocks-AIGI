<?php $args = array('post_type' => 'event');
$args['search_filter_id'] = 3130;
$query_news = new WP_Query($args);
$posts = $query_news->posts;

?>

<?php if ($posts) {
foreach ($posts as $post) { ?>

    <?php
    $terms =  wp_get_post_terms( $post->ID, 'event_group');
    $class = '';
    if (get_field('upload_toolkit_pdf', $post->ID)) {
        $class .= ' file ';
    }
    ?>

    <div class="post-tile__wrap toolkit <?php echo $class ?> post-<?php echo $post->ID; ?>">
        <div class="post-tile__img-box">
            <div class="post-tile__img">
                <picture>
                    <img class="post-tile__type-text" src="/wp-content/themes/aigi/assets/images/toolkit.svg" alt="<?php echo $post->post_title; ?>">
                </picture>
            </div>
        </div>

        <div class="post-tile__content">
            <div class="post-tile__content-header">
                <div class="post-tile__left">
                    <span class="post-tile__pub-date"><?php echo get_the_date(); ?></span>
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
                    <?php $term_list = wp_get_post_terms( $post->ID, 'topic', array('fields' => 'all') );

                    foreach ($term_list as $term) :

                        ?>
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
