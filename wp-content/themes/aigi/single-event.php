<?php
/*
* Template Name: Single Event
* Template Post Type: event
*/
?>

<?php get_header(); ?>
<main id="content" role="main">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <div class="main-inner  <?php  echo ((get_field('header_slider')['enable'] == true) ? ' top-of-hero ' :''); ?>">
            <div class="wrapper-1245 content-wrapper">

                <div class="has-sidebar  sidebar-right">
                    <div class="col-sidebar">
                        <div class="col-sidebar__inner">
                            <?php
                            $term_list = wp_get_post_terms( get_the_ID(), 'event_group', array('fields' => 'all') );
                            ?>
                            <div class="single-event__pricing-block">
                                <?php if ($term_list[0]->slug == 'event') { ?>

                                    <div class="single-event__pricing-title">
                                        Tickets
                                    </div>
                                    <div class="single-event__pricing-list">
                                        <?php if (get_field('pricing')['freepaid'] == 'paid') : ?>
                                            <?php if (get_field('pricing')['early_bird']) : ?>
                                                <div class="single-event__pricing-item">
                                                    <span class="single-event__pricing-type">Early Bird</span>
                                                    <span class="single-event__pricing-price">$<?php echo get_field('pricing')['early_bird']; ?></span>
                                                </div>
                                            <?php endif ?>
                                            <?php if (get_field('pricing')['full_price']) : ?>
                                                <div class="single-event__pricing-item">
                                                    <span class="single-event__pricing-type">Full Price</span>
                                                    <span class="single-event__pricing-price">$<?php echo get_field('pricing')['full_price']; ?></span>
                                                </div>
                                            <?php endif ?>
                                            <?php if (get_field('pricing')['partner_price']) : ?>
                                                <div class="single-event__pricing-item">
                                                    <span class="single-event__pricing-type">Partner Price</span>
                                                    <span class="single-event__pricing-price">$<?php echo get_field('pricing')['partner_price']; ?></span>
                                                </div>
                                            <?php endif ?>
                                            <?php if (get_field('pricing')['date_rate']) : ?>
                                                <div class="single-event__pricing-item">
                                                    <span class="single-event__pricing-type">Date Rate</span>
                                                    <span class="single-event__pricing-price">$<?php echo get_field('pricing')['date_rate']; ?></span>
                                                </div>
                                            <?php endif ?>


                                        <?php elseif (get_field('pricing')['freepaid'] == 'free') : ?>
                                            <div class="single-event__pricing-title">
                                                Event Pricing
                                            </div>
                                            <div class="single-event__pricing-list">
                                                <div class="single-event__pricing-item">
                                                    <span class="single-event__pricing-type">Free</span>
                                                </div>
                                            </div>
                                        <?php endif ?>

                                        <?php if (get_field('pricing')['ticket_link']) : ?>
                                            <div class="single-event__pricing-item">
                                                <a href="<?php echo get_field('pricing')['ticket_link']['url'] ?>" target="_blank" class="btn-body  btn-h-secondary-blue  enlarge  after  Between " tabindex="0"><span class="btn-inner">Get tickets</span></a>
                                            </div>
                                        <?php endif ?>
                                    </div>

                                <?php } else if ($term_list[0]->slug == 'webinar') { ?>
                                    <?php if (get_field('pricing')['webinar_link']) : ?>
                                        <div class="single-event__pricing-item">
                                            <a href="<?php echo get_field('pricing')['webinar_link']['url'] ?>" target="_blank" class="btn-body  btn-h-secondary-blue  enlarge  after  Between " tabindex="0"><span class="btn-inner">Join to webinar</span></a>
                                        </div>
                                    <?php endif ?>
                                <?php } ?>
                            </div>

                            <div class="post-details">
                                <div class="post-details__item">
                                    <div class="post-details__heading">Events details</div>
                                    <div class="post-details__text">
                                        <div><?= get_field('events_details')['date']; ?></div>
                                        <div><?= get_field('events_details')['event_start']; ?> - <?= get_field('events_details')['event_end']; ?></div>
                                    </div>
                                    <a href="#" class="post-details__link">Add to calendar</a>
                                </div>
                                <div class="post-details__item">
                                    <div class="post-details__heading">Location</div>
                                    <div class="post-details__text"><?= get_field('location')['address']['address']; ?></div>
                                    <a href="https://maps.google.com/?q=<?php echo get_field('location')['address']['lat'];?>,<?php echo get_field('location')['address']['lng'];?>" target="_blank" class="post-details__link">View on map</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-content">
                        <div class="has-sidebar__inner">
                            <?php the_content() ?>
                            <?php $content_items = get_field('content_items'); ?>
                            <?php get_template_part('template-parts/content-blocks/content', 'custom-content', $content_items); ?>

                            <?php //get_template_part( 'nav', 'below-single' ); ?>

                            <?php $speakers = get_field('speakers'); ?>

                            <div class="content-item profile-list">
                                <div class="rslider__header">
                                    <div class="rslider__header-top">
                                        <div class="rslider__heading">Keynote speakers</div>
                                    </div>
                                </div>
                                <div class="profile-list__wrapper">
                                    <?php if ($speakers) : ?>
                                        <?php foreach($speakers as $post) : ?>
                                            <div class="profile-list__item">
                                                <div class="rslider__item-header">
                                                    <!--                            <div class="rslider__type content-tags__item">--><?php //echo $terms[0]; ?><!--</div>-->
                                                </div>
                                                <div class="rslider__item-body">
                                                    <div class="speakers__bio">
                                                        <div class="speakers__image">
                                                            <img src="<?php echo get_the_post_thumbnail_url( $post->ID, 'full' ) ?>" alt="<?= $post->post_title; ?>">
                                                        </div>
                                                        <div class="speakers__bio-text">
                                                            <div class="speakers__name"><?php echo $post->post_title; ?></div>
                                                            <div class="speakers__position"><?php echo get_field('people_info')['position']; ?></div>
                                                        </div>
                                                    </div>
                                                    <?php
                                                    $excerpt = '';
                                                    ?>
                                                    <div class="rslider__excerpt"><?php echo get_custom_excerpt($post->post_content, 450, true) ?></div>

                                                </div>

                                            </div>
                                        <?php endforeach ?>
                                        <?php wp_reset_postdata(); ?>
                                    <?php endif ?>

                                </div>
                            </div>



                        </div>
                    </div>

                </div>


            </div>
            <?php get_template_part('template-parts/layout', 'page-after-content-blocks'); ?>
        </div>

    <?php endwhile; endif; ?>
    <footer class="footer">

    </footer>
</main>
<?php get_footer(); ?>
