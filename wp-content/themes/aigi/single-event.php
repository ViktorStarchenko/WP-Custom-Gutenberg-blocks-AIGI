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

            <?php
            $event_group =  wp_get_post_terms( get_the_ID(), 'event_group');
//            if ($event_group[0]->slug == 'event' || $event_group[0]->slug== 'webinar' || $event_group[0]->slug == 'masterclass') {
            if (get_field('enable_event_info') == true) {
            ?>
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
                                        <div><?= get_field('events_details')['start_date']; ?> - <?= get_field('events_details')['end_date']; ?></div>
                                    </div>
                                    <?php $googleCalendarLink = googleCalendarLink() ?>
                                    <a href="<?= $googleCalendarLink ?>" target="_blank" class="post-details__link">Add to calendar</a>
                                </div>
                                <div class="post-details__item">
                                    <div class="post-details__heading">Location</div>
                                    <div class="post-details__text"><?= get_field('location')['address']['address']; ?></div>
                                    <a href="https://maps.google.com/?q=<?php echo get_field('location')['address']['lat'];?>,<?php echo get_field('location')['address']['lng'];?>" target="_blank" class="post-details__link">View on map</a>
                                </div>
                            </div>

                            <?php if (get_field('social_links')): ?>
                            <div class="post-details__item">
                                <div class="social-links__heading ">Event's Social Links:</div>
                                <div class="social-links">
                                    <?php foreach (get_field('social_links') as $social_links) : ?>
                                        <div class="social-links__item">
                                            <a class="social-links__item-link" href="<?= $social_links['link'] ?>" target="_blank">
                                                <i class="<?= $social_links['icon'] ?>"></i>
                                            </a>
                                        </div>
                                    <?php endforeach ?>
                                </div>
                            </div>
                            <?php endif ?>

                            <?php if (get_field('share_download')) : ?>
                            <div class="post-technical-block bordered content-item post-details__item">
                                <?php if (get_field('share_download')['enable_share']) : ?>
                                <div class="post-technical__item">
                                    <div class="post-technical__title">SHARE</div>

                                    <div class="popup_item_wrapper" data-popup="">
                                        <div href="" class="popup_button post-technical__button">
                                            <img src="/wp-content/themes/aigi/assets/images/share.svg" alt="share">
                                        </div>

                                        <div class="popup-main-wrapper" id="popup-main-wrapper">
                                            <div class="item_popup_wrapper">
                                                <div class="popup_overlay"></div>
                                                <div class="popup_content_wrapper threatment">
                                                    <div class="item_popup_content_inner">
                                                        <div id="popup_close_button"></div>
                                                        <div class="social-share__wrapper modal p-m">
                                                            <div class="social-share__header">
                                                                <div class="social-share__title">
                                                                    Share
                                                                </div>
                                                            </div>
                                                            <div class="social-share__container">
                                                                <?php echo do_shortcode('[Sassy_Social_Share]'); ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                                <?php endif ?>
                                <?php if (get_field('share_download')['enable_print']) : ?>
                                <div class="post-technical__item">
                                    <div class="post-technical__title">Print</div>
                                    <a class="post-technical__button print-button" href="#">
                                        <img src="/wp-content/themes/aigi/assets/images/print.svg" alt="print">
                                    </a>
                                </div>
                                <?php endif ?>
                                <?php if (get_field('share_download')['enable_download']) : ?>
                                <div class="post-technical__item">
                                    <div class="post-technical__title">Download</div>
                                    <a class="post-technical__button" href="<?php echo get_field('share_download')['download_file']['url']?>"  target="_blank">
                                        <img src="/wp-content/themes/aigi/assets/images/download-big.svg" alt="download">
                                    </a>
                                </div>
                                <?php endif ?>
                                <?php if (get_field('share_download')['enable_save']) : ?>
                                    <div class="post-technical__item">
                                        <div class="post-technical__title">Save</div>
                                        <a class="post-technical__button" href="">
                                            <img src="/wp-content/themes/aigi/assets/images/star-review.svg" alt="save">
                                        </a>
                                    </div>
                                <?php endif ?>

                            </div>
                            <?php endif ?>


                        </div>
                    </div>
                    <div class="col-content">
                        <div class="has-sidebar__inner">
                            <?php the_content() ?>
                            <?php $content_items = get_field('content_items'); ?>
                            <?php get_template_part('template-parts/content-blocks/content', 'custom-content', $content_items); ?>

                            <?php //get_template_part( 'nav', 'below-single' ); ?>

                            <?php $speakers = get_field('speakers'); ?>

                            <?php if ($speakers) : ?>
                            <div class="content-item profile-list">
                                <div class="rslider__header">
                                    <div class="rslider__header-top">
                                        <div class="rslider__heading">Keynote speakers</div>
                                    </div>
                                </div>
                                <div class="profile-list__wrapper">

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


                                </div>
                            </div>
                        <?php endif ?>

                        <!--Event info tab-->
                            <div class="single-event__info-tabs">
                                <div class="nav">
                                    <div class="tabs__nav tabs-nav">
                                        <div class="tabs-nav__item global-search-tab-nav is-active text-left" data-tab-name="tab-program"  data-post-type="program">Program</div>
                                        <div class="tabs-nav__item global-search-tab-nav text-left" data-tab-name="tab-venue-details" data-post-type="venue-details">Venue details</div>
                                        <div class="tabs-nav__item global-search-tab-nav text-left" data-tab-name="tab-map" data-post-type="map">Map</div>
                                        <div class="tabs-nav__item global-search-tab-nav text-left" data-tab-name="tab-faqs" data-post-type="faqs">FAQS</div>

                                    </div>
                                </div>
                                <div class="content">
                                    <div class="tabs__content" id="global-search__filter">
                                        <!--Program-->
                                        <div class="tab tab-program global-search-tab is-active" data-post-type="program">
                                            <div class="tab-heading">Program</div>
                                            <div class="tab-content-wrapper">
                                                <?php if (get_field('program')) : ?>
                                                    <div class="accordion_wrapper">
                                                        <?php foreach (get_field('program') as $program) : ?>
                                                            <div class="accordion_item">
                                                                <?php if($program['action_time']): ?>
                                                                    <span class="title-h4 nav_list-title accordion_btn"><?= $program['action_time']; ?> - <?= $program['action_title'] ?></span>
                                                                <?php endif ?>
                                                                <div  class="accordion_panel">
                                                                    <div class="accordion_content"><?= $program['action_description']?></div>
                                                                </div>
                                                            </div>
                                                        <?php endforeach; ?>
                                                        <?php wp_reset_postdata(); ?>
                                                    </div>
                                                <?php endif ?>
                                            </div>

                                        </div>

                                        <!--Venue details-->
                                        <div class="tab tab-venue-details global-search-tab" data-post-type="venue-details">
                                            <div class="tab-heading">Venue details</div>
                                            <div class="tab-content-wrapper">

                                            <?php if (get_field('venue_details')['catered'] == 'yes') : ?>
                                                <div class="post-details__item">
                                                    <div class="post-details__heading">Catered</div>
                                                    <div class="post-details__text">
                                                        Catered - <?php echo get_field('venue_details')['catered']; ?>
                                                    </div>
                                                    <div class="post-details__text">
                                                        Details: <?= get_field('venue_details')['catered_details']; ?>
                                                    </div>
                                                </div>
                                            <?php endif ?>

                                            <?php if (get_field('venue_details')['accessibility_options']) : ?>
                                                <div class="post-details__item">
                                                    <div class="post-details__heading">Accessibility Options</div>
                                                    <div class="post-details__text">
                                                        <?php foreach (get_field('venue_details')['accessibility_options'] as $accessibility_options) : ?>
                                                        <?php echo $accessibility_options ?>,
                                                        <?php endforeach ?>
                                                    </div>
                                                </div>
                                            <?php endif ?>

                                            <?php if (get_field('venue_details')['carparking_options']): ?>
                                                <div class="post-details__item">
                                                    <div class="post-details__heading">Carparking Options</div>
                                                    <div class="post-details__text">
                                                        <?php foreach (get_field('venue_details')['carparking_options'] as $carparking_options) : ?>
                                                            <?php echo $carparking_options ?>,
                                                        <?php endforeach ?>
                                                    </div>
                                                </div>
                                            <?php endif ?>

                                            <?php if (get_field('venue_details')['other_transport_options']): ?>
                                                <div class="post-details__item">
                                                    <div class="post-details__heading">Other Transport Options</div>
                                                    <div class="post-details__text">
                                                        <?= get_field('venue_details')['other_transport_options']; ?>
                                                    </div>
                                                </div>
                                            <?php endif ?>

                                            <?php if (get_field('venue_details')['covid_safe_plan']): ?>
                                                <div class="post-details__item">
                                                    <div class="post-details__heading">COVID safe plan</div>
                                                    <div class="post-details__text">
                                                    </div>
                                                    <a href="<?php echo get_field('venue_details')['covid_safe_plan']['url']; ?>" class="post-details__link">safe plan</a>
                                                </div>
                                            <?php endif ?>


                                            </div>
                                        </div>

                                        <!--Map-->
                                        <div class="tab tab-map global-search-tab " data-post-type="map">
                                            <div class="tab-heading">Map</div>
                                            <div class="tab-content-wrapper">
                                                <?php if (get_field('location')['address']) : ?>
                                                <div class="map-wrapper">
                                                    <iframe src="https://maps.google.com/maps?q=<?php echo get_field('location')['address']['lat'];?>,<?php echo get_field('location')['address']['lng'];?>&t=&z=15&ie=UTF8&iwloc=&output=embed" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>

                                                </div>
                                                <?php endif ?>
                                            </div>


                                        </div>

                                        <!--FAQS-->
                                        <div class="tab tab-faqs global-search-tab " data-post-type="faqs">
                                            <div class="tab-heading">FAQS</div>
                                            <div class="tab-content-wrapper">
                                                <?php if (get_field('faqs')) : ?>
                                                    <div class="accordion_wrapper">
                                                        <?php foreach (get_field('faqs') as $faqs) : ?>
                                                            <div class="accordion_item">
                                                                <?php if($faqs['question']): ?>
                                                                    <span class="title-h4 nav_list-title accordion_btn"><?= $faqs['question']; ?></span>
                                                                <?php endif ?>
                                                                <div  class="accordion_panel">
                                                                    <div class="accordion_content"><?= $faqs['answer']?></div>
                                                                </div>
                                                            </div>
                                                        <?php endforeach; ?>
                                                        <?php wp_reset_postdata(); ?>
                                                    </div>
                                                <?php endif ?>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>


                            <?php if (get_field('event_subscribe_form')['enable'] == true) : ?>
                            <div class="subscribe-event-form post-content-form">
                                <div class="subscribe-event-form__wrapper">
                                    <div class="form-heading">
                                    <div class="form-heading">
                                        <?php if (get_field('event_subscribe_form')['heading']) : ?>
                                        <div class="form-title"><?php echo get_field('event_subscribe_form')['heading']; ?></div>
                                        <?php endif ?>
                                        <?php if (get_field('event_subscribe_form')['description']) : ?>
                                        <div class="form-desc"><?php echo get_field('event_subscribe_form')['description']; ?></div>
                                        <?php endif ?>
                                    </div>

                                        <?php if (get_field('event_subscribe_form')['form_id']) : ?>
                                    <div class=""><?php echo do_shortcode('[gravityform id="'. get_field('event_subscribe_form')['form_id'] .'" title="false" description="false" ajax="true" tabindex="49"]');?></div>
                                        <?php endif ?>
                                </div>
                            </div>
                            <?php endif ?>


                        </div>
                    </div>

                </div>


            </div>

<!--            <div class="post-content-blocks">-->
<!--                --><?php //if (get_field('lates_news_block')['enable']) : ?>
<!--                    --><?php //$latest_news = get_field('lates_news_block'); ?>
<!--                    --><?php //get_template_part('template-parts/content-single-post/single-post', 'news-slider', $latest_news); ?>
<!--                --><?php //endif ?>
<!---->
<!--                --><?php //if (get_field('blockquote_slider_block')['enable']) : ?>
<!--                    --><?php //$blockquote_slider = get_field('blockquote_slider_block'); ?>
<!--                    --><?php //get_template_part('template-parts/content-single-post/single-post', 'blockquote-slider', $blockquote_slider); ?>
<!--                --><?php //endif ?>
<!--            </div>-->


        </div>
            <?php } ?>

            <?php get_template_part('template-parts/layout', 'page-after-content-blocks'); ?>
    <?php endwhile; endif; ?>
    <footer class="footer">

    </footer>
</main>
<?php get_footer(); ?>
