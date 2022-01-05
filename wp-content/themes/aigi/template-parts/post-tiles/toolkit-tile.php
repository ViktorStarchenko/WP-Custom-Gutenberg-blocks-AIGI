
<?php
$post_type = get_post_type( get_the_ID() );
$terms =  wp_get_post_terms( get_the_ID(), 'event_group');
$class = '';
$appearance = get_field('appearance');
if (get_field('upload_toolkit_pdf', get_the_ID())) {
    $class .= ' file ';
}

?>

<div class="post-tile__wrap  <?= $post_type; ?> <?php echo $class ?> post-<?php echo get_the_ID(); ?> <?php echo ($appearance['disable_header_footer_on_mobile'] == false) ? 'mob-style-2' : '' ?>">
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
            <picture>
                <img class="post-tile__type-text" src="/wp-content/themes/aigi/assets/images/toolkit.svg" alt="<?php the_title(); ?>">
            </picture>
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
                <?php echo do_shortcode('[favorite_button]') ?>
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
            <div class="post-tile__excerpt"><p><?php echo get_custom_excerpt(get_the_excerpt(), 213, true) ?></p></div>
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
