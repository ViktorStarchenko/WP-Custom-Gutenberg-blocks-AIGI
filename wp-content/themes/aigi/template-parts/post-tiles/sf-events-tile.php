<?php $args = array('post_type' => 'event');
$args['search_filter_id'] = 3125;
$query_news = new WP_Query($args);
$posts = $query_news->posts;

?>

<?php if ($posts) {
    foreach ($posts as $post) { ?>

        <?php $event_group =  wp_get_post_terms( $post->ID, 'event_group'); ?>

        <div class="post-tile__wrap event post-<?php echo $post->ID; ?>">
            <div class="post-tile__mob-header">
                <div class="post-tile__tags">
                    <?php $term_list = wp_get_post_terms( $post->ID, 'content_tags', array('fields' => 'all') );
                    foreach ($term_list as $term) :
                        ?>
                        <a class="content-tags__item" href="/search?/?_news_categories=<?php echo $term->slug ?>" data-tem-id="<?php echo  $term->term_id ?>"><?php echo $term->name ?></a>
                    <?php endforeach ?>
                </div>
                <a href="#" class="add-to-calendar"></a>
            </div>
            <div class="post-tile__img-box">
                <div class="post-tile__img">
                    <?php if (get_the_post_thumbnail_url( $post->ID, 'full' )) { ?>
                        <img class="post-tile__thumb" src="<?php echo get_the_post_thumbnail_url( $post->ID, 'full' ) ?>" alt="<?php echo $post->post_title; ?>">
                    <?php } else { ?>
                        <a href="#">ascasascascascas</a>
                    <?php } ?>
                </div>

                <div class="btn-group f-start m-center">
                    <a href="#" target="" class="btn-body  btn-transparent  calendar  after  Between " tabindex="0">
                        <span class="btn-inner">Add to Calendar</span>
                    </a>
                    <a href="<?=  get_the_permalink($post->ID) ?>" target="_blank" class="btn-body btn-h-secondary-blue triangle after Between" tabindex="0">
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
                        <?php if (get_field('events_details')['date']) : ?>
                            <span class="post-tile__pub-date"><?php echo get_field('events_details')['date']?></span>
                        <?php endif ?>

							<?php if (get_field('location')['address']): ?>
								<span class="post-tile__location"><a href="https://maps.google.com/?q=<?php echo get_field('location')['address']['lat'];?>,<?php echo get_field('location')['address']['lng'];?>" target="_blank"><?php echo get_field('location')['address']['address']?></a></span>
							<?php endif ?>
                    </div>

                    <div class="post-tile__right">

                    </div>
                </div>
                <div class="post-tile__content-body">
                    <div class="post-tile__tags">
                        <?php $term_list = wp_get_post_terms( $post->ID, 'content_tags', array('fields' => 'all') );
                        foreach ($term_list as $term) :
                            ?>
                            <a class="content-tags__item" href="/global-search?/?_news_categories=<?php echo $term->slug ?>" data-tem-id="<?php echo  $term->term_id ?>"><?php echo $term->name ?></a>
                        <?php endforeach ?>
                    </div>

                    <div class="post-tile__title">
                        <span><?php echo $post->post_title; ?></span>
                    </div>
                    <div class="post-tile__excerpt"><p><?php echo substr($post->post_excerpt, 0,165) ?>...</p></div>
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
                <a href="#" target="" class="  btn-body  btn-h-secondary-blue  triangle  after  Between " tabindex="0">
                    <span class="btn-inner">FIND A STORE</span>
                </a>
            </div>
        </div>

    <?php } ?>
    <?php wp_reset_postdata(); ?>

<?php } ?>
