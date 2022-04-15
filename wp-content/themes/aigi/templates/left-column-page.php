<?php
/*
* Template Name: Left Column Page
* Template Post Type: page
*/

get_header(); ?>
<main id="content" role="main">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

        <div class="main-inner <?php  echo ((get_field('header_slider')['enable'] == true) ? ' top-of-hero ' :''); ?>">

            <div class="wrapper-1245 content-wrapper">

                <div class="has-sidebar  sidebar-left">
                    <div class="col-sidebar">
                        <div class="col-sidebar__inner">
                            <?php

                            if (get_field('sidebar_menu')['menu_type'] == 'Toolkit Menu') {
                                $sidebar_menu = get_field('toolkits_menu', 'option');
                            } else if (get_field('sidebar_menu')['menu_type'] == 'Custom Menu') {
                                $sidebar_menu = get_field('sidebar_menu')['toolkits_menu'];
                            } ?>
                            <?php if ($sidebar_menu['toolkits_menu_item']) {?>
                            <div class="toolkit-menu__wrap">
                                <div class="toolkit-menu__mobile-button">
                                    <?php the_title(); ?>
                                </div>

                                <ul class="toolkit-menu__list">
                                    <?php foreach ($sidebar_menu['toolkits_menu_item'] as $sidebar_menu_item) {?>
                                        <?php if ($sidebar_menu_item) {?>
                                            <li class="toolkit-menu__item">
                                                <?php if ($sidebar_menu_item['link']) {?>
                                                    <a class="toolkit-menu__link" href="<?php echo $sidebar_menu_item['link']['url'] ?>"><?php echo $sidebar_menu_item['link']['title'] ?></a>
                                                    <?php if ($sidebar_menu_item['submenu']) {?>
                                                        <span class="toolkit-menu__link-arrow">
                                                            <img src="/wp-content/themes/aigi/assets/images/Triangle-p-blue.svg" alt="triangle">
                                                        </span>
                                                    <?php } ?>
                                                <?php } ?>
                                                <?php if ($sidebar_menu_item['submenu']) {?>
                                                    <ul class="toolkit-menu__submenu rounded-list">
                                                        <?php foreach($sidebar_menu_item['submenu'] as $submenu) {?>
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
                            <?php the_content() ?>
                            <?php $content_items = get_field('content_items'); ?>
                            <?php get_template_part('template-parts/content-blocks/content', 'custom-content', $content_items); ?>


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
