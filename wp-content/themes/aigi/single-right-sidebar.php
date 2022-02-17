<?php
/*
 * Template Name: Page with right sidebar
 * Template Post Type: page
 */
?>

<?php get_header(); ?>
<main id="content" role="main">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <div class="main-inner <?php  echo ((get_field('header_slider')['enable'] == true) ? ' top-of-hero ' :''); ?>">
            <div class="wrapper-1245 content-wrapper">

                <div class="has-sidebar  sidebar-right">
                    <div class="col-sidebar">
                        <div class="col-sidebar__inner">

                            <div class="post-details">

                                <?php if (get_field('contacts')['location']) : ?>
                                <div class="post-details__item">
                                    <div class="post-details__heading">Location</div>
                                    <?php foreach (get_field('contacts')['location'] as $location) : ?>
                                    <div class="post-details__text">
                                        <div><?= $location['address']; ?></div>
                                    </div>
                                    <?php endforeach ?>
                                </div>
                                <?php endif ?>

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
                                        <?php get_template_part('template-parts/content-blocks/content', 'social-share'); ?>
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

                        </div>
                    </div>

                </div>


            </div>
            <div class="contact-us__location-map">

                <section class="acf-section-contact-us " >

                    <div class="wrapper-full-width">

                        <?php
                        $location = get_field('contacts')['location'];

                        if( $location ): ?>
                            <div class="acf-map acf-map-contact-us" data-zoom="16">
                                <?php

                                foreach ($location as $loc) { ?>
                                    <div class="marker" data-lat="<?php echo esc_attr($loc['lat']); ?>" data-lng="<?php echo esc_attr($loc['lng']); ?>">
                                        <p><?php echo esc_html( $loc['address'] ); ?></p>
                                    </div>
                                <?php } ?>

                            </div>
                        <?php endif; ?>

                    </div>
                </section>


                <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDKQ6x5al7NFc63XIBOw6VmnIGe1hjha64"></script>
                <script type="text/javascript">
                    (function( $ ) {

                        /**
                         * initMap
                         *
                         * Renders a Google Map onto the selected jQuery element
                         *
                         * @date    22/10/19
                         * @since   5.8.6
                         *
                         * @param   jQuery $el The jQuery element.
                         * @return  object The map instance.
                         */
                        function initMap( $el ) {

                            // Find marker elements within map.
                            var $markers = $el.find('.marker');

                            // Create gerenic map.
                            var mapArgs = {
                                zoom        : $el.data('zoom') || 16,
                                mapTypeId   : google.maps.MapTypeId.ROADMAP,
                                styles: [
                                    {
                                        "featureType": "water",
                                        "elementType": "all",
                                        "stylers": [
                                            {
                                                "hue": "#bbbbbb"
                                            },
                                            {
                                                "saturation": -100
                                            },
                                            {
                                                "lightness": -4
                                            },
                                            {
                                                "visibility": "on"
                                            }
                                        ]
                                    },
                                    {
                                        "featureType": "landscape",
                                        "elementType": "all",
                                        "stylers": [
                                            {
                                                "hue": "#999999"
                                            },
                                            {
                                                "saturation": -100
                                            },
                                            {
                                                "lightness": -33
                                            },
                                            {
                                                "visibility": "on"
                                            }
                                        ]
                                    },
                                    {
                                        "featureType": "road",
                                        "elementType": "all",
                                        "stylers": [
                                            {
                                                "hue": "#999999"
                                            },
                                            {
                                                "saturation": -100
                                            },
                                            {
                                                "lightness": -6
                                            },
                                            {
                                                "visibility": "on"
                                            }
                                        ]
                                    },
                                    {
                                        "featureType": "poi",
                                        "elementType": "all",
                                        "stylers": [
                                            {
                                                "hue": "#aaaaaa"
                                            },
                                            {
                                                "saturation": -100
                                            },
                                            {
                                                "lightness": -15
                                            },
                                            {
                                                "visibility": "on"
                                            }
                                        ]
                                    }
                                ]
                            };
                            var map = new google.maps.Map( $el[0], mapArgs );

                            // Add markers.
                            map.markers = [];
                            $markers.each(function(){
                                initMarker( $(this), map );
                            });

                            // Center map based on markers.
                            centerMap( map );

                            // Return map instance.
                            return map;
                        }

                        /**
                         * initMarker
                         *
                         * Creates a marker for the given jQuery element and map.
                         *
                         * @date    22/10/19
                         * @since   5.8.6
                         *
                         * @param   jQuery $el The jQuery element.
                         * @param   object The map instance.
                         * @return  object The marker instance.
                         */
                        function initMarker( $marker, map ) {

                            // Get position from marker.
                            var lat = $marker.data('lat');
                            var lng = $marker.data('lng');
                            var latLng = {
                                lat: parseFloat( lat ),
                                lng: parseFloat( lng )
                            };

                            // Create marker instance.
                            var marker = new google.maps.Marker({
                                position : latLng,
                                map: map,
                                icon: '/wp-content/themes/aigi/assets/images/custom-marker.svg'
                            });

                            // Append to reference for later use.
                            map.markers.push( marker );

                            // If marker contains HTML, add it to an infoWindow.
                            if( $marker.html() ){

                                // Create info window.
                                var infowindow = new google.maps.InfoWindow({
                                    content: $marker.html()
                                });

                                // Show info window when marker is clicked.
                                google.maps.event.addListener(marker, 'click', function() {
                                    infowindow.open( map, marker );
                                });
                            }
                        }

                        /**
                         * centerMap
                         *
                         * Centers the map showing all markers in view.
                         *
                         * @date    22/10/19
                         * @since   5.8.6
                         *
                         * @param   object The map instance.
                         * @return  void
                         */
                        function centerMap( map ) {

                            // Create map boundaries from all map markers.
                            var bounds = new google.maps.LatLngBounds();
                            map.markers.forEach(function( marker ){
                                bounds.extend({
                                    lat: marker.position.lat(),
                                    lng: marker.position.lng()
                                });
                            });

                            // Case: Single marker.
                            if( map.markers.length == 1 ){
                                map.setCenter( bounds.getCenter() );

                                // Case: Multiple markers.
                            } else{
                                map.fitBounds( bounds );
                            }
                        }

// Render maps on page load.
                        $(document).ready(function(){
                            $('.acf-map-contact-us').each(function(){
                                var map = initMap( $(this) );
                            });
                        });

                    })(jQuery);
                </script>

            </div>
            <?php get_template_part('template-parts/layout', 'page-after-content-blocks'); ?>
        </div>

    <?php endwhile; endif; ?>
    <footer class="footer">

    </footer>
</main>
<?php get_footer(); ?>

