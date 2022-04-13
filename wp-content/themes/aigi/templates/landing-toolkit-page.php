<?php
/*
* Template Name: Landing Toolkit
* Template Post Type: page
*/

get_header(); ?>
<main id="content" role="main">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

        <div class="main-inner toolkit-landing-inner main-toolkit-landing-inner  <?php  echo ((get_field('header_slider')['enable'] == true) ? ' top-of-hero ' :''); ?>">
            <div class="wrapper-full-width content-wrapper search-page__top">
                <div class="search-page__header wrapper-1245 content-wrapper">
                    <div class="search-page__heading">
                        <div class="search-page__heading-box">

                        </div>
                    </div>
                    <div class="search-page__sorting">

                    </div>
                </div>
            </div>
            <div class="wrapper-1245 content-wrapper">

                <div class="has-sidebar  sidebar-left">
                    <div class="col-sidebar">
                        <div class="col-sidebar__inner">
                            <?php if (get_field('toolkits_menu', 'option')) {
                                $toolkits_menu = get_field('toolkits_menu', 'option');
                            } ?>
                            <?php if ($toolkits_menu['toolkits_menu_item']) {?>
                            <div class="toolkit-menu__wrap">
                                <div class="toolkit-menu__mobile-button">
                                    <?php the_title(); ?>
                                </div>

                                <ul class="toolkit-menu__list">
                                    <?php foreach ($toolkits_menu['toolkits_menu_item'] as $toolkits_menu_item) {?>
                                        <?php if ($toolkits_menu_item) {?>
                                            <li class="toolkit-menu__item">
                                                <?php if ($toolkits_menu_item['link']) {?>
                                                    <a class="toolkit-menu__link" href="<?php echo $toolkits_menu_item['link']['url'] ?>"><?php echo $toolkits_menu_item['link']['title'] ?></a>
                                                    <?php if ($toolkits_menu_item['submenu']) {?>
                                                        <span class="toolkit-menu__link-arrow">
                                                            <img src="/wp-content/themes/aigi/assets/images/Triangle-p-blue.svg" alt="triangle">
                                                        </span>
                                                    <?php } ?>
                                                <?php } ?>
                                                <?php if ($toolkits_menu_item['submenu']) {?>
                                                    <ul class="toolkit-menu__submenu rounded-list">
                                                        <?php foreach($toolkits_menu_item['submenu'] as $submenu) {?>
                                                            <li class="toolkit-menu__submenu-item">
                                                                <a href="<?php echo $submenu['link']['url'];?>" class="toolkit-menu__submenu-link"><?php echo $submenu['link']['title'];?></a>
                                                            </li>
                                                        <?php } ?>

                                                    </ul>
                                                <?php }?>

                                            </li>
                                        <?php } ?>
                                    <?php } ?>

                                    <?php } ?>
                                </ul>

                            </div>

                        </div>
                    </div>
                    <div class="col-content">
                        <div class="has-sidebar__inner">
                            <?php if (get_field('toolkits_landing_page')['page_title']) {?>
                            <div class="toolkit-landing__page-title">
                                    <h1><?php echo get_field('toolkits_landing_page')['page_title']; ?></h1>
                            </div>
                            <?php } ?>

                            <?php if (get_field('toolkits_landing_page')['page_description']) {?>
                            <div class="toolkit-landing__page-description">
                                <?php echo get_field('toolkits_landing_page')['page_description']; ?>
                            </div>
                            <?php } ?>

                            <div class="table-of-content">

                                <?php if (get_field('toolkits_landing_page')['table_of_contents_heding']) {?>
                                    <div class="toolkit-landing__toc-heading">
                                        <?php echo get_field('toolkits_landing_page')['table_of_contents_heding']; ?>
                                    </div>
                                <?php } ?>

                                <?php if (get_field('toolkits_landing_page')['table_of_contents']) {?>
                                    <div class="table-of-content__list">
                                        <?php foreach (get_field('toolkits_landing_page')['table_of_contents'] as $table_of_contents) {?>
                                            <div class="table-of-content__item">
                                                <?php if ($table_of_contents['heading']) {?>
                                                    <div class="toolkit-single__header">
                                                        <?php echo $table_of_contents['heading']; ?>
                                                    </div>
                                                <?php } ?>

                                                <?php if ($table_of_contents['description']) {?>
                                                   <div class="table-of-content__description">
                                                       <?php echo $table_of_contents['description']; ?>
                                                   </div>
                                                <?php } ?>


                                                <?php if ($table_of_contents['links']) {?>
                                                    <ul class="toolkit-menu__list toolkit-landing-page">
                                                        <?php foreach ($table_of_contents['links'] as $toolkits_menu_item) {?>
                                                            <?php if ($toolkits_menu_item) {?>
                                                                <li class="toolkit-menu__item">
                                                                    <?php if ($toolkits_menu_item['link']) {?>
                                                                        <a class="toolkit-menu__link" href="<?php echo $toolkits_menu_item['link']['url'] ?>"><?php echo $toolkits_menu_item['link']['title'] ?></a>
                                                                        <?php if ($toolkits_menu_item['submenu']) {?>
                                                                            <span class="toolkit-menu__link-arrow">
                                                                                <img src="/wp-content/themes/aigi/assets/images/Triangle-p-blue.svg" alt="triangle">
                                                                            </span>
                                                                        <?php } ?>
                                                                    <?php } ?>
                                                                    <?php if ($toolkits_menu_item['submenu']) {?>
                                                                        <ul class="toolkit-menu__submenu rounded-list">
                                                                            <?php foreach($toolkits_menu_item['submenu'] as $submenu) {?>
                                                                                <li class="toolkit-menu__submenu-item">
                                                                                    <a href="<?php echo $submenu['link']['url'];?>" class="toolkit-menu__submenu-link"><?php echo $submenu['link']['title'];?></a>
                                                                                </li>
                                                                            <?php } ?>

                                                                        </ul>
                                                                    <?php }?>

                                                                </li>
                                                            <?php } ?>
                                                        <?php } ?>

                                                    </ul>
                                                <?php } ?>


                                                <div class="toolkit-tag-container">
                                                    <?php if ($table_of_contents['read_topic']) {?>
                                                        <a href="<?php echo $table_of_contents['read_topic']['url'] ?>" class="read-topic">Read Topic</a>
                                                    <?php } ?>
                                                    <?php if ($table_of_contents['download_topic']) {?>
                                                        <a href="<?php echo $table_of_contents['download_topic']['url'] ?>" class="toolkit-download-topic">Download Topic</a>
                                                    <?php } ?>

                                                </div>
                                            </div>

                                        <?php } ?>
                                    </div>
                                 <?php } ?>




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
