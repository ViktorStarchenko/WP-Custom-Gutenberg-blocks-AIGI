


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
$classes = '';
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
$bg_color = '';
if ($attributes['background']['background_color']) {
    $bg_color =  $attributes['background']['background_color'];
}


$bg_color_preset = '';
if ($attributes['background']['bg_color_preset']) {
    $bg_color_preset =  $attributes['background']['bg_color_preset'];
}
?>

<?php if ($attributes) : ?>
    <style>
        .acf-section-<?php echo $attributes['uniq_id']; ?> {
        <?php if ($attributes['background']['background_color']) : ?>
            background-color: <?php echo $attributes['background']['background_color']; ?>;
        <?php endif ?>
        <?php if ($attributes['background']['background_image']) : ?>
            background-image: url(<?php echo $attributes['background_image']['url']; ?>);
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

<section class="event-block-section acf-section-<?php echo get_row_index() . ' '; ?> acf-section-<?php echo $attributes['uniq_id']. ' '; ?> <?php echo $classes ?> <?= $background_texture; ?><?= $padding; ?> <?= $bg_color_preset; ?>" id="<?php  echo ($attributes['section_id'] ? $attributes['section_id'] :''); ?>" style="background-image: url(<?php echo $attributes['background']['background_image']['url']; ?>); <?php  echo ($bg_color ?  'background-color: ' . $bg_color . ';' :''); ?> color: <?php echo $attributes['background']['text_color']; ?>; ">
    <div class="event-block-wrapper content-wrapper <?php  echo ($attributes['wrappers']['content_wrapper'] ?  ' ' . $attributes['wrappers']['content_wrapper'] . ' ' :''); ?>">
<div class="wrapper-1245 content-wrapper">
    <div class="event-heading-wrapper">
        <div class="event-block-title"><?= $content['heading']; ?></div>
        <div class="event-block-subtitle"><?= $content['event_subtitle']; ?></div>
    </div>
</div>


<?php
$featured_posts = $content['event'];
if( $featured_posts ): ?>

    <?php foreach( $featured_posts as $post ): 

        setup_postdata($post); ?>


<?php
$post_type = get_post_type( get_the_ID() );
$event_group =  wp_get_post_terms( get_the_ID(), 'event_group');
$appearance = get_field('appearance');
?>
<div class="wrapper-1245 content-wrapper landing-page">
<div class="post-tile__wrap <?= $post_type; ?> post-<?php echo get_the_ID(); ?>">
    <div class="post-tile__mob-header">
        <div class="post-tile__tags">
            <?php $term_list = wp_get_post_terms( get_the_ID(), 'content_tags', array('fields' => 'all') );
            foreach ($term_list as $term) :
                ?>
                <a class="content-tags__item" href="/search?/?_content_tags=<?php echo $term->slug ?>" data-tem-id="<?php echo  $term->term_id ?>"><?php echo $term->name ?></a>
            <?php endforeach ?>
        </div>
        <?php $googleCalendarLink = googleCalendarLink() ?>
        <a href="<?php echo $googleCalendarLink ?>" target="_blank" class="add-to-calendar"></a>
    </div>
    <div class="post-tile__img-box">
        <div class="post-tile__img">
            <?php if (get_the_post_thumbnail_url( get_the_ID(), 'full' )) { ?>
                <img class="post-tile__thumb" src="<?php echo get_the_post_thumbnail_url( get_the_ID(), 'full' ) ?>" alt="<?php the_title(); ?>">
            <?php } else { ?>

            <?php } ?>
        </div>

        <div class="btn-group f-start m-center">
            
            <a href="<?php echo $googleCalendarLink ?>" target="_blank" class="btn-body  btn-transparent  calendar  after  Between " tabindex="0">
                <span class="btn-inner">Add to Calendar</span>
            </a>
            <a href="<?=  get_the_permalink(get_the_ID()) ?>" target="" class="btn-body btn-h-secondary-blue triangle after Between" tabindex="0">
                <?php if ($event_group[0]->slug == 'event') { ?>
                    <span class="btn-inner">View Details</span>
                <?php } else if ($event_group[0]->slug == 'webinar') { ?>
                    <span class="btn-inner">Watch the webinar</span>
                <?php } ?>
            </a>
        </div>

    </div>


    <div class="post-tile__content">
        <div class="post-tile__content-header">
            <div class="post-tile__left">
                <?php if (get_field('location')['address']): ?>
                    <span class="post-tile__location"><a href="https://maps.google.com/?q=<?php echo get_field('location')['address']['lat'];?>,<?php echo get_field('location')['address']['lng'];?>" target="_blank"><?php echo get_field('location')['address']['address']?></a></span>
                <?php endif ?>

                <?php if (get_field('events_details')['start_date']) : ?>
                    <span class="post-tile__pub-date"><?php echo date("M d Y", strtotime(get_field('events_details')['start_date']))?></span>
                <?php endif ?>
            </div>

            <div class="post-tile__right">

            </div>
        </div>
        <div class="post-tile__content-body">
            <div class="post-tile__tags">
                <?php $term_list = wp_get_post_terms( get_the_ID(), 'content_tags', array('fields' => 'all') );
                foreach ($term_list as $term) : ?>
                    <a class="content-tags__item" href="/search?_content_tags=<?php echo $term->slug ?>" data-tem-id="<?php echo  $term->term_id ?>"><?php echo $term->name ?></a>
                <?php endforeach ?>
            </div>

            <div class="post-tile__title">
                <span><?php the_title(); ?>  ( <?php echo get_post_meta( get_the_ID(), 'post_views_count', true ); ?> )</span>
            </div>
            <div class="post-tile__excerpt"><p><?php echo get_custom_excerpt(get_the_excerpt(), 213, true) ?></p></div>
        </div>
        <div class="post-tile__content-footer">
            <div class="post-tile__pricing-block">
                <?php if (get_field('pricing')['freepaid'] == 'paid') : ?>
                <div class="post-tile__pricing-title">
                    Event Pricing
                </div>
                <div class="post-tile__pricing-list">
                    <?php if (get_field('pricing')['early_bird']) : ?>
                    <div class="post-tile__pricing-item">
                        <span class="post-tile__pricing-type">Early Bird</span>
                        <span class="post-tile__pricing-price">$<?php echo get_field('pricing')['early_bird']; ?></span>
                    </div>
                    <?php endif ?>
                    <?php if (get_field('pricing')['full_price']) : ?>
                    <div class="post-tile__pricing-item">
                        <span class="post-tile__pricing-type">Full Price</span>
                        <span class="post-tile__pricing-price">$<?php echo get_field('pricing')['full_price']; ?></span>
                    </div>
                    <?php endif ?>
                    <?php if (get_field('pricing')['partner_price']) : ?>
                    <div class="post-tile__pricing-item">
                        <span class="post-tile__pricing-type">Partner Price</span>
                        <span class="post-tile__pricing-price">$<?php echo get_field('pricing')['partner_price']; ?></span>
                    </div>
                    <?php endif ?>
                    <?php if (get_field('pricing')['date_rate']) : ?>
                    <div class="post-tile__pricing-item">
                        <span class="post-tile__pricing-type">Date Rate</span>
                        <span class="post-tile__pricing-price">$<?php echo get_field('pricing')['date_rate']; ?></span>
                    </div>
                    <?php endif ?>
                </div>
                <?php elseif (get_field('pricing')['freepaid'] == 'free') : ?>
                    <div class="post-tile__pricing-title">
                        Event Pricing
                    </div>
                    <div class="post-tile__pricing-list">
                        <div class="post-tile__pricing-item">
                            <span class="post-tile__pricing-type">Free</span>
                        </div>
                    </div>
                <?php endif ?>
            </div>
        </div>

    </div>
    <div class="post-tile__slider">

        <?php
        $speakers = get_field('speakers');
        ?>
        <?php if ($speakers) : ?>
            <div class="speakers-slider__heading">
                Speakers
            </div>
            <div class="speakers-slider slider">
                <?php foreach ($speakers as $speaker) : ?>
                    <div>
                        <div class="speakers-slider__item">
                            <div class="speakers-slider__img">
                                <?php if (get_the_post_thumbnail_url( $speaker->ID, 'full' )) : ?>
                                    <img src="<?php echo get_the_post_thumbnail_url( $speaker->ID, 'full' ) ?> " alt="<?= $speaker->post_title ?>">
                                <?php endif ?>
                            </div>
                            <div class="speakers-slider__content">
                                <div class="speakers-slider__name">
                                    <?= $speaker->post_title ?>
                                </div>
                                <div class="speakers-slider__position">
                                    <?php echo substr(get_the_excerpt( $speaker->ID), 0,25) ?>
                                </div>
                            </div>

                        </div>
                    </div>
                <?php endforeach ?>

            </div>
            <div class="speakers-slider__nav"></div>
        <?php endif?>
    </div>

    <div class="post-tile__mob-footer">
        <a href="<?=  get_the_permalink(get_the_ID()) ?>" target="" class="  btn-body  btn-h-secondary-blue  triangle  after  Between " tabindex="0">
            <?php if ($event_group[0]->slug == 'event') { ?>
                <span class="btn-inner">View Details</span>
            <?php } else if ($event_group[0]->slug == 'webinar') { ?>
                <span class="btn-inner">Watch the webinar</span>
            <?php } ?>
        </a>
    </div>

</div>
</div>




    <?php endforeach; ?>

    <?php wp_reset_postdata(); ?>
<?php endif; ?>







    </div>
</section>
