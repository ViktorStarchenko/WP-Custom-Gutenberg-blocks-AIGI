<?php
/*
* Template Name: Toolkit
* Template Post Type: toolkit
*/

get_header(); ?>
<main id="content" role="main">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

        <div class="main-inner  <?php  echo ((get_field('header_slider')['enable'] == true) ? ' top-of-hero ' :''); ?>">
            <div class="wrapper-1245 content-wrapper">

                <div class="has-sidebar  sidebar-left">
                    <div class="col-sidebar">
                        <div class="col-sidebar__inner">
                            <?php if (get_field('toolkits_menu', 'option')) {
                                $toolkits_menu = get_field('toolkits_menu', 'option');
                            } ?>
                        <?php if ($toolkits_menu['toolkits_menu_item']) {?>
                            <div class="toolkit-menu__wrap">

                                <ul class="toolkit-menu__list">
                                    <?php foreach ($toolkits_menu['toolkits_menu_item'] as $toolkits_menu_item) {?> <?php } ?>
                                    <?php if ($toolkits_menu_item) {?>
                                        <li class="toolkit-menu__item">
                                            <?php if ($toolkits_menu_item['link']) {?>
                                                <a class="toolkit-menu__link" href="<?php echo $toolkits_menu_item['link']['url'] ?>"><?php echo $toolkits_menu_item['link']['title'] ?></a>
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
                            </div>

                        </div>
                    </div>
                    <div class="col-content">
                        <div class="has-sidebar__inner">
                            <div class="toolkit-single__header">
                                <h1 class="toolkit-single__title"><?php the_title(); ?></h1>
                            </div>
                            <div class="toolkit-tag-container">
                                <div class="post-tile__tags">
                                    <?php $term_list = wp_get_post_terms( get_the_ID(), 'topic', array('fields' => 'all') );
                                    foreach ($term_list as $term) : ?>
                                        <span class="content-tags__item" href="/search?_content_tags=<?php echo $term->slug ?>" data-tem-id="<?php echo  $term->term_id ?>"><?php echo $term->name ?></span>
                                    <?php endforeach ?>
                                </div>
                                <div class="toolkit-tag__download">
                                    <a class="btn-download" href="#">Download</a>
                                </div>
                            </div>
                            <?php the_content() ?>
                        </div>
                    </div>

                </div>


            </div>
            <?php get_template_part('template-parts/layout', 'page-after-content-blocks'); ?>
        </div>

    <?php endwhile; endif; ?>
    <footer class="footer">
        <?php get_template_part( 'nav', 'below-single' ); ?>
    </footer>
</main>
<?php get_footer(); ?>
