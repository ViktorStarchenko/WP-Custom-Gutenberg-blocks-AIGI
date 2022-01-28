<?php
/*
* Template Name: Case studies Landing page
* Template Post Type: page
*/

?>

<?php get_header(); ?>
    <main id="content" role="main">
        <!--    <div class="section">-->
        <!--        <div class="wrapper">-->
        <!--            <div class="hero-slider" style="height: 548px; width: 100%; background: var(--color-error)" ></div>-->
        <!--        </div>-->
        <!--    </div>-->
        <div class="main-inner <?php  echo ((get_field('header_slider')['enable'] == true) ? ' top-of-hero ' :''); ?>">
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <?php get_template_part('template-parts/layout', 'page-before-content-blocks'); ?>

            <div class="wrapper-1245">
                <div class="content-wrapper wrapper-1245">
                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <div class="entry-content" itemprop="mainContentOfPage">
                            <?php the_content(); ?>
                        </div>
                    </article>
                </div>
            </div>
            <!--            <div class="wrapper-full-width">-->
            <!--                <div class="landing__filter-map" style="height: 650px; background-color: red; margin: 79px 0 -79px;">-->
            <!--                    --><?php //echo facetwp_display( 'facet', 'landing_location_map' ) ?>
            <!--                </div>-->
            <!--            </div>-->

            <div class="wrapper-1245">
                <div class="content-wrapper wrapper-full-width">


                </div>
                <?php
                $post_type = get_field('landing_page')['post_type'];
                if ($post_type == 'event') {
                    $event_group = get_field('landing_page')['event_term'];
                    $event_group = $event_group->slug;
                }
                ?>
                <div class="landing__filter-block <?php echo $post_type; ?>" id="" data-post-type="<?php echo $post_type; ?>" data-event-group="<?php echo (isset($event_group)) ? $event_group : '' ?>">
                    <div class="landing__filter-inner">
                        <div class="landing__filter-header">
                            <div class="filter-button">
                                <img class="filter-button__filter filter-button__img" src="/wp-content/themes/aigi/assets/images/filter.svg" alt="filter">
                                <img class="filter-button__close filter-button__img" src="/wp-content/themes/aigi/assets/images/close-blue.svg" alt="close">
                            </div>
                            <div class="landing__filter-heading"><?= get_field('landing_page')['heading']; ?></div>

                            <?php if ($post_type == 'event') { ?>
                                <div class="landing__filter-heading event-type-filter-mob">
                                    <div class="landing__filter-input">
                                        <?php echo do_shortcode('[facetwp facet="landing_event_type"]'); ?>
                                    </div>
                                </div>
                            <?php } ?>

                        </div>
                        <div class="landing__filter-list global-search__filter" id="global-search__filter">
                            <div class="landing__filter-item post-type">
                                <div class="landing__filter-title">post type</div>
                                <div class="landing__filter-input"><?php echo do_shortcode('[facetwp facet="post_type"]'); ?></div>
                            </div>
                            <?php if (get_field('landing_page')['post_type'] == 'event') : ?>
                                <div class="landing__filter-item post-type">
                                    <div class="landing__filter-title">event group</div>
                                    <div class="landing__filter-input"><?php echo do_shortcode('[facetwp facet="events_group"]'); ?></div>
                                </div>
                            <?php endif ?>
                            <?php if (get_field('landing_page')['filter_item']) : ?>
                                <?php foreach (get_field('landing_page')['filter_item'] as $filter_item) : ?>
                                    <div class="landing__filter-item <?php echo $filter_item['filter_name']; ?>">
                                        <div class="landing__filter-title"><?= $filter_item['title']; ?></div>
                                        <div class="landing__filter-input"><?php echo do_shortcode('[facetwp facet="'. $filter_item['filter_name'] .'"]'); ?></div>
                                    </div>
                                <?php endforeach ?>
                            <?php endif ?>
                        </div>

                    </div>
                </div>
            </div>
            <div class="content-wrapper wrapper-1245">
                <div class="post-tile__list landing-page search-page__results">

                    <?php echo do_shortcode('[facetwp template="landing_page_result"]'); ?>

                </div>

                <div class="search-pagination">

                    <div class="search-pagination__info">
                        You've viewed <span class="search-pagination__per-page"><?php echo FWP()->facet->pager_args['per_page']; ?></span> of <span class="search-pagination__total-rows"><?php echo FWP()->facet->pager_args['total_rows']; ?></span> events
                    </div>
                    <?php echo do_shortcode('[facetwp facet="pager_"]'); ?>

                </div>

            </div>
        </div>
        <?php get_template_part('template-parts/layout', 'page-after-content-blocks'); ?>

        <?php endwhile; endif; ?>
        </div>

    </main>
    <script>
        jQuery(document).ready(function(){
            let post_type = jQuery('.landing__filter-block').attr('data-post-type');
            let url = new URL(window.location.href);
            if (url.searchParams.get('_post_type') != post_type) {
                // setTimeout(selectPostType, 500, post_type);
            }
            function selectPostType(post_type) {
                console.log('selectPostType')

                jQuery('.facetwp-checkbox[data-value="'+post_type+'"]').click();
                if (post_type == 'event') {

                    let event_group = jQuery('.landing__filter-block').attr('data-event-group');

                    setTimeout(function(){
                        jQuery('.facetwp-facet-events_group .facetwp-radio[data-value="'+event_group+'"]').click();
                    }, 200, event_group);
                }
            }

        })

    </script>
<?php get_footer(); ?>