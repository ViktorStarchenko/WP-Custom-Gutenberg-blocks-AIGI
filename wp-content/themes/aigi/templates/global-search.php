<?php
/*
* Template Name: Global search page
* Template Post Type: page
*/
?>

<?php get_header(); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
<script type="text/javascript" src="https://addevent.com/libs/atc/1.6.1/atc.min.js" async defer></script>
<main id="content" role="main">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>


        <div class="main-inner search-page">
            <div class="wrapper-full-width content-wrapper search-page__top">
                <div class="search-page__header wrapper-1245 content-wrapper">
                    <div class="search-page__heading">
                        <div class="search-page__heading-box">
                            <p class="search-page_title">Search Results</p>
                            <p class="search-page_desc"> <span class="search-bar__count"></span> search results for "<span class="search-bar__param"></span>"</p>
                        </div>

                    </div>
                    <div class="search-page__sorting">
                        <div class="filter-button">
                            <img class="filter-button__filter filter-button__img" src="/wp-content/themes/aigi/assets/images/filter.svg" alt="filter">
                            <img class="filter-button__close filter-button__img" src="/wp-content/themes/aigi/assets/images/close-blue.svg" alt="close">
                        </div>

                        <?php if (!isset($_GET['_search_bar'])) {
                            echo do_shortcode('[facetwp facet="sort_by_relevance"]');
                        }
                         ?>

                    </div>
                </div>
            </div>
            <div class="wrapper-1245 content-wrapper">



                <div class="has-sidebar  sidebar-left">
                    <div class="col-sidebar">
                        <span class="search__filter-heading">Refine by</span>
                        <div class="tabs__content global-search__filter desktop" id="global-search__filter">
                            <div class="tab tab-all global-search-tab <?php echo (empty($_GET['_post_type']) || ($_GET['_post_type'] == 'resource,toolkit,event,news')) ? 'is-active' : '' ?>" data-post-type="all">
                                <div class="search__filter-list">
                                    <div class="search__filter-item">
                                        <div class="accordion_item">
                                            <span class="search__filter-title accordion_btn">Post type</span>
                                            <div  class="accordion_panel">
                                                <div class="accordion_content">
                                                    <?php echo do_shortcode('[facetwp facet="post_type"]'); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="search__filter-item">
                                        <div class="accordion_item">
                                            <span class="search__filter-title accordion_btn">Content Tags</span>
                                            <div  class="accordion_panel">
                                                <div class="accordion_content">
                                                    <?php echo do_shortcode('[facetwp facet="content_tags"]'); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="search__filter-item">
                                        <div class="accordion_item">
                                            <span class="search__filter-title accordion_btn">Topics</span>
                                            <div  class="accordion_panel">
                                                <div class="accordion_content">
                                                    <?php echo do_shortcode('[facetwp facet="topics"]'); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <!--Events filter-->
                            <div class="tab tab-event global-search-tab <?php echo (!empty($_GET['_post_type'])  && $_GET['_post_type'] == 'event') ? 'is-active' : '' ?>" data-post-type="event">
                                <div class="search__filter-list">
                                    <div class="search__filter-item">
                                        <div class="accordion_item">
                                                <span class="search__filter-title accordion_btn">Post type</span>
                                            <div  class="accordion_panel">
                                                <div class="accordion_content">
                                                    <?php echo do_shortcode('[facetwp facet="post_type"]'); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="search__filter-item">
                                        <div class="accordion_item">
                                            <span class="search__filter-title accordion_btn">Events Group</span>
                                            <div  class="accordion_panel">
                                                <div class="accordion_content">
                                                    <?php echo do_shortcode('[facetwp facet="events_group"]'); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="search__filter-item">
                                        <div class="accordion_item">
                                            <span class="search__filter-title accordion_btn">Events Type</span>
                                            <div  class="accordion_panel">
                                                <div class="accordion_content">
                                                    <?php echo do_shortcode('[facetwp facet="search_event_type"]'); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="search__filter-item">
                                        <div class="accordion_item">
                                            <span class="search__filter-title accordion_btn">Content Tags</span>
                                            <div  class="accordion_panel">
                                                <div class="accordion_content">
                                                    <?php echo do_shortcode('[facetwp facet="content_tags"]'); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="search__filter-item">
                                        <div class="accordion_item">
                                            <span class="search__filter-title accordion_btn">Topics</span>
                                            <div  class="accordion_panel">
                                                <div class="accordion_content">
                                                    <?php echo do_shortcode('[facetwp facet="topics"]'); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        <!--News filter-->
                            <div class="tab tab-news global-search-tab <?php echo (!empty($_GET['_post_type'])  && $_GET['_post_type'] == 'news') ? 'is-active' : '' ?>" data-post-type="news">
                                <div class="search__filter-list">
                                    <div class="search__filter-item">
                                        <div class="accordion_item">
                                            <span class="search__filter-title accordion_btn">Post type</span>
                                            <div  class="accordion_panel">
                                                <div class="accordion_content">
                                                    <?php echo do_shortcode('[facetwp facet="post_type"]'); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="search__filter-item">
                                        <div class="accordion_item">
                                            <span class="search__filter-title accordion_btn">Content Tags</span>
                                            <div  class="accordion_panel">
                                                <div class="accordion_content">
                                                    <?php echo do_shortcode('[facetwp facet="content_tags"]'); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

<!--                                    <div class="search__filter-item">-->
<!--                                        <div class="accordion_item">-->
<!--                                            <span class="search__filter-title accordion_btn">Topics</span>-->
<!--                                            <div  class="accordion_panel">-->
<!--                                                <div class="accordion_content">-->
<!--                                                    --><?php //echo do_shortcode('[facetwp facet="topics"]'); ?>
<!--                                                </div>-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                    </div>-->

                                </div>
                            </div>

<!--                            Resourcec filter-->
                            <div class="tab tab-resource global-search-tab <?php echo (!empty($_GET['_post_type'])  && $_GET['_post_type'] == 'resource') ? 'is-active' : '' ?>" data-post-type="resource">
                                <div class="search__filter-list">
                                    <div class="search__filter-item">
                                        <div class="accordion_item">
                                            <span class="search__filter-title accordion_btn">Post type</span>
                                            <div  class="accordion_panel">
                                                <div class="accordion_content">
                                                    <?php echo do_shortcode('[facetwp facet="post_type"]'); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="search__filter-item">
                                        <div class="accordion_item">
                                            <span class="search__filter-title accordion_btn">Resource Type</span>
                                            <div  class="accordion_panel">
                                                <div class="accordion_content">
                                                    <?php echo do_shortcode('[facetwp facet="resource_type"]'); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="search__filter-item">
                                        <div class="accordion_item">
                                            <span class="search__filter-title accordion_btn">Topics</span>
                                            <div  class="accordion_panel">
                                                <div class="accordion_content">
                                                    <?php echo do_shortcode('[facetwp facet="topics"]'); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

<!--                            Toolkit filter-->
                            <div class="tab tab-toolkit global-search-tab <?php echo (!empty($_GET['_post_type'])  && $_GET['_post_type'] == 'toolkit') ? 'is-active' : '' ?>" data-post-type="toolkit">
                                <div class="search__filter-item">
                                    <div class="accordion_item">
                                        <span class="search__filter-title accordion_btn">Post type</span>
                                        <div  class="accordion_panel">
                                            <div class="accordion_content">
                                                <?php echo do_shortcode('[facetwp facet="post_type"]'); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="search__filter-item">
                                    <div class="accordion_item">
                                        <span class="search__filter-title accordion_btn">Topics</span>
                                        <div  class="accordion_panel">
                                            <div class="accordion_content">
                                                <?php echo do_shortcode('[facetwp facet="topics"]'); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <span class="search-filter__reset btn-body  btn-h-secondary-blue  triangle  after  Between " onclick="FWP.reset()">CLear all</span>
                        </div>


                    </div>
                    <div class="col-content">
                        <div class="has-sidebar__inner search">
                            <div class="tabs__nav tabs-nav search__nav-desktop">
                                <div class="tabs-nav__item global-search-tab-nav <?php echo (empty($_GET['_post_type']) || ($_GET['_post_type'] == 'resource,toolkit,event,news')) ? 'is-active' : '' ?>" data-tab-name="tab-all"  data-post-type="all">All (<span class="posts-count"><?php echo get_total_posts(); ?></span>)</div>
                                <div class="tabs-nav__item global-search-tab-nav <?php echo (!empty($_GET['_post_type'])  && $_GET['_post_type'] == 'event') ? 'is-active' : '' ?>" data-tab-name="tab-event" data-post-type="event">Events (<span class="posts-count"><?php echo wp_count_posts('event')->publish ;?></span>)</div>
                                <div class="tabs-nav__item global-search-tab-nav <?php echo (!empty($_GET['_post_type'])  && $_GET['_post_type'] == 'news') ? 'is-active' : '' ?>" data-tab-name="tab-news" data-post-type="news">News (<span class="posts-count"><?php echo wp_count_posts('news')->publish ;?></span>)</div>
                                <div class="tabs-nav__item global-search-tab-nav <?php echo (!empty($_GET['_post_type'])  && $_GET['_post_type'] == 'resource') ? 'is-active' : '' ?>" data-tab-name="tab-resource" data-post-type="resource">Resources (<span class="posts-count"><?php echo wp_count_posts('resource')->publish ;?></span>)</div>
                                <div class="tabs-nav__item global-search-tab-nav <?php echo (!empty($_GET['_post_type'])  && $_GET['_post_type'] == 'toolkit') ? 'is-active' : '' ?>" data-tab-name="tab-toolkit" data-post-type="toolkit">Toolkit (<span class="posts-count"><?php echo wp_count_posts('toolkit')->publish ;?></span>)</div>
                            </div>
<!--                            mobile post type select-->
                            <div class="search__nav-mobile">
                                <div class="dropdown-body">
                                    <?php
                                    if(!empty($_GET['_post_type'])  && $_GET['_post_type'] == 'event') {
                                        $post_type = 'Events';
                                    } else if (!empty($_GET['_post_type'])  && $_GET['_post_type'] == 'news') {
                                        $post_type = 'News';
                                    } else if (!empty($_GET['_post_type'])  && $_GET['_post_type'] == 'resource') {
                                        $post_type = 'Resources';
                                    } else if (!empty($_GET['_post_type'])  && $_GET['_post_type'] == 'toolkit') {
                                        $post_type = 'Toolkits';
                                    } else {
                                        $post_type = 'Select type of resource';
                                    }
                                    ?>
                                    <span onclick="" class="dropbtn btn-body btn-transparent triangle after Between" data-dropdown="search-nav"><?php echo $post_type ;?></span>
                                    <div id="myDropdown" class="dropdown-content" data-dropdown="search-nav">
                                        <div class="tabs-nav__item global-search-tab-nav dropdown-item" data-tab-name="tab-all" data-post-type="all">All (<span class="posts-count"><?php echo get_total_posts(); ?></span>)</div>
                                        <div class="tabs-nav__item global-search-tab-nav dropdown-item" data-tab-name="tab-event" data-post-type="event">Events (<span class="posts-count"><?php echo wp_count_posts('event')->publish ;?></span>)</div>
                                        <div class="tabs-nav__item global-search-tab-nav dropdown-item" data-tab-name="tab-news" data-post-type="news">News (<span class="posts-count"><?php echo wp_count_posts('news')->publish ;?></span>)</div>
                                        <div class="tabs-nav__item global-search-tab-nav dropdown-item" data-tab-name="tab-resource" data-post-type="resource">Resources (<span class="posts-count"><?php echo wp_count_posts('resource')->publish ;?></span>)</div>
                                        <div class="tabs-nav__item global-search-tab-nav dropdown-item" data-tab-name="tab-toolkit" data-post-type="toolkit">Toolkit (<span class="posts-count"><?php echo wp_count_posts('toolkit')->publish ;?>)</div>
                                    </div>
                                </div>

                            </div>

                            <div class="search-page__results">
                                <?php echo do_shortcode('[facetwp template="search_page_result"]'); ?>
                            </div>

                            <div class="search-pagination">

                                <div class="search-pagination__info">
                                    You've viewed <span class="search-pagination__per-page"><?php echo FWP()->facet->pager_args['per_page']; ?></span> of <span class="search-pagination__total-rows"><?php echo FWP()->facet->pager_args['total_rows']; ?></span> events
                                </div>
                                <?php echo do_shortcode('[facetwp facet="pager_"]'); ?>

                            </div>
                        </div>

                    </div>
                </div>


            </div>
            <?php get_template_part('template-parts/layout', 'page-before-content-blocks'); ?>
        </div>

    <?php endwhile; endif; ?>
    <footer class="footer">

    </footer>
</main>
<script>

    function showSearResultText(param) {
        console.log(param)
        console.log(FWP.settings.pager.total_rows);
        console.log(jQuery('.search-page__results .post-tile__wrap').length)
        jQuery('.search-page__heading-box').addClass('show');
        jQuery('.search-bar__count').html(FWP.settings.pager.total_rows);
        jQuery('.search-bar__param').html(param);
    }

    url = new URL(window.location.href);
    if (url.searchParams.get('_search_bar')) {
        let param = url.searchParams.get('_search_bar');

        setTimeout(showSearResultText, 2000, param)
        jQuery('.search-filter__reset').on('click', function(){
            setTimeout(function(){location.reload();}, 1000);
        })
    } else {
console.log('no')
    }





</script>
<?php get_footer(); ?>

