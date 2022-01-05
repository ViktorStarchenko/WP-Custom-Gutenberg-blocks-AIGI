<?php
/*
* Template Name: Search & Filter page
* Template Post Type: page
*/
?>
<?php
$queries = array();
parse_str($_SERVER['QUERY_STRING'], $queries);
?>
<?php get_header(); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
<script type="text/javascript" src="https://addevent.com/libs/atc/1.6.1/atc.min.js" async defer></script>
<main id="content" role="main">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>


        <div class="main-inner search-page">
            <div class="wrapper-full-width content-wrapper search-page__top">
                <div class="search-page__header wrapper-1245 ">
                    <div class="search-page__heading">
                        <p class="search-page_title">Search Results</p>
                        <p class="search-page_desc">361 search results for "Masterclass"</p>
                    </div>
                    <div class="search-page__sorting">
                        <div class="filter-button">
                            <img src="/wp-content/themes/aigi/assets/images/filter.svg" alt="filter">
                        </div>
                        <?php echo do_shortcode('[facetwp facet="sort_by_relevance"]'); ?>

                    </div>
                </div>
            </div>
            <div class="wrapper-1245 content-wrapper">



                <div class="has-sidebar  sidebar-left">
                    <div class="col-sidebar">
                        <div class="tabs__content global-search__filter desktop" id="global-search__filter">
                            <div class="tab tab-all global-search-tab <?php echo (empty($_GET['_post_type'])) ? 'is-active' : '' ?>" data-post-type="all"> All
                                <div class="search__filter-list">
                                    <div class="search__filter-item">
                                        <div class="accordion_item">
                                            <span class="search__filter-title accordion_btn">Post type</span>
                                            <div  class="accordion_panel">
                                                <div class="accordion_content">

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="search__filter-item">
                                        <div class="accordion_item">
                                            <span class="search__filter-title accordion_btn">Content Tags</span>
                                            <div  class="accordion_panel">
                                                <div class="accordion_content">

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="search__filter-item">
                                        <div class="accordion_item">
                                            <span class="search__filter-title accordion_btn">Topics</span>
                                            <div  class="accordion_panel">
                                                <div class="accordion_content">

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <!--Events filter-->
                            <div class="tab tab-event global-search-tab <?php echo (!empty($_GET['_post_type'])  && $_GET['_post_type'] == 'event') ? 'is-active' : '' ?>" data-post-type="event">
                                Events
                                <?php echo do_shortcode('[searchandfilter id="3125"]') ?>
                            </div>

                            <!--News filter-->
                            <div class="tab tab-news global-search-tab <?php echo (!empty($_GET['_post_type'])  && $_GET['_post_type'] == 'news') ? 'is-active' : '' ?>" data-post-type="news">
                                News
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

                            <!--                            Resourcec filter-->
                            <div class="tab tab-resource global-search-tab <?php echo (!empty($_GET['_post_type'])  && $_GET['_post_type'] == 'resource') ? 'is-active' : '' ?>" data-post-type="resource">
                                Resources
                                <?php echo do_shortcode('[searchandfilter id="3129"]') ?>
                            </div>

                            <!--                            Toolkit filter-->
                            <div class="tab tab-toolkit global-search-tab <?php echo (!empty($_GET['_post_type'])  && $_GET['_post_type'] == 'toolkit') ? 'is-active' : '' ?>" data-post-type="toolkit">
                                Toolkit
                                <?php echo do_shortcode('[searchandfilter id="3130"]') ?>

                            </div>
                            <span class="search-filter__reset btn-body  btn-h-secondary-blue  triangle  after  Between " onclick="FWP.reset()">CLear all</span>
                        </div>


                    </div>
                    <div class="col-content">
                        <div class="has-sidebar__inner search">
                            <div class="tabs__nav tabs-nav search__nav-desktop">
                                <div class="tabs-nav__item global-search-tab-nav <?php echo (empty($_GET['_post_type'])) ? 'is-active' : '' ?>" data-tab-name="tab-all"  data-post-type="all">All (<span class="posts-count"><?php echo get_total_posts(); ?></span>)</div>
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
                                        <div class="tabs-nav__item global-search-tab-nav dropdown-item" data-tab-name="tab-event" data-post-type="event">Events (<span class="posts-count"><?php echo wp_count_posts('event')->publish ;?></span>)</div>
                                        <div class="tabs-nav__item global-search-tab-nav dropdown-item" data-tab-name="tab-news" data-post-type="news">News (<span class="posts-count"><?php echo wp_count_posts('news')->publish ;?></span>)</div>
                                        <div class="tabs-nav__item global-search-tab-nav dropdown-item" data-tab-name="tab-resource" data-post-type="resource">Resources (<span class="posts-count"><?php echo wp_count_posts('resource')->publish ;?></span>)</div>
                                        <div class="tabs-nav__item global-search-tab-nav dropdown-item" data-tab-name="tab-toolkit" data-post-type="toolkit">Toolkit (<span class="posts-count"><?php echo wp_count_posts('toolkit')->publish ;?></div>
                                    </div>
                                </div>

                            </div>

                            <div class="search-page__results">

                                <div class="tabs__content global-search__filter desktop" id="global-search__filter">
                                    <div class="tab tab-all global-search-tab <?php echo (empty($_GET['_post_type'])) ? 'is-active' : '' ?>" data-post-type="all"> All
                                        <div class="search__filter-list">
                                            <div class="search__filter-item">
                                                <div class="accordion_item">
                                                    <span class="search__filter-title accordion_btn">Post type</span>
                                                    <div  class="accordion_panel">
                                                        <div class="accordion_content">

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="search__filter-item">
                                                <div class="accordion_item">
                                                    <span class="search__filter-title accordion_btn">Content Tags</span>
                                                    <div  class="accordion_panel">
                                                        <div class="accordion_content">

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="search__filter-item">
                                                <div class="accordion_item">
                                                    <span class="search__filter-title accordion_btn">Topics</span>
                                                    <div  class="accordion_panel">
                                                        <div class="accordion_content">

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <!--Events filter-->
                                    <div class="tab tab-event global-search-tab <?php  echo ($queries['_sft_content_tags'] || $queries['_sft_categoies'] ?  ' active show'  :''); ?>" data-post-type="event">
                                        Events
                                        <?php include( get_stylesheet_directory() . '/template-parts/post-tiles/sf-events-tile.php' ); ?>
                                    </div>

                                    <!--News filter-->
                                    <div class="tab tab-news global-search-tab <?php echo (!empty($_GET['_post_type'])  && $_GET['_post_type'] == 'news') ? 'is-active' : '' ?>" data-post-type="news">
                                        News
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

                                    <!--                            Resourcec filter-->
                                    <div class="tab tab-resource global-search-tab <?php echo (!empty($_GET['_post_type'])  && $_GET['_post_type'] == 'resource') ? 'is-active' : '' ?>" data-post-type="resource">
                                        Resources
                                        <?php include( get_stylesheet_directory() . '/template-parts/post-tiles/sf-resources-tile.php' ); ?>
                                    </div>

                                    <!--                            Toolkit filter-->
                                    <div class="tab tab-toolkit global-search-tab <?php echo (!empty($_GET['_post_type'])  && $_GET['_post_type'] == 'toolkit') ? 'is-active' : '' ?>" data-post-type="toolkit">
                                        Toolkit
                                        <?php include( get_stylesheet_directory() . '/template-parts/post-tiles/sf-toolkits-tile.php' ); ?>

                                    </div>

                                </div>



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
<?php get_footer(); ?>
<script>
    function activateAllFilter() {
        console.log('click ALL POSTS TYPES')
        jQuery('.global-search-tab[data-post-type="all"] .facetwp-facet-post_type .facetwp-checkbox[data-value="event"]').click();
        jQuery('.global-search-tab[data-post-type="all"] .facetwp-facet-post_type .facetwp-checkbox[data-value="news"]').click();
        jQuery('.global-search-tab[data-post-type="all"] .facetwp-facet-post_type .facetwp-checkbox[data-value="resource"]').click();
        jQuery('.global-search-tab[data-post-type="all"] .facetwp-facet-post_type .facetwp-checkbox[data-value="toolkit"]').click();
    }
    // var parameterValue = decodeURIComponent(window.location.search.match(/(\?|&)_post_type\=([^&]*)/)[2]);

    url = new URL(window.location.href);
    if (!url.searchParams.get('_post_type')) {
        console.log('Trulalala')
        setTimeout(activateAllFilter, 2000)
    } else {

    }
</script>
