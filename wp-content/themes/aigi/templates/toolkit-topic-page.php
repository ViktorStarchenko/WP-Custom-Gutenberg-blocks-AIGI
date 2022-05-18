<?php
/*
* Template Name: Toolkit Topics Page
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
                            <div class="toolkit-single__header">
                                <h1 class="toolkit-single__title"><?php the_title(); ?></h1>
                            </div>
                            <div class="toolkit-tag-container">
                                <div class="post-tile__tags">

                                </div>
                                <div class="toolkit-tag__download">
<!--                                    Direct PDG download-->
<!--                                    <a href="/pdf-test?post_id=--><?php //echo get_the_ID();?><!--" class="toolkit-download-topic__after ">Download</a>-->
                                    <div class="popup_item_wrapper" data-popup="">
                                        <div href="" class="popup_button post-technical__button">
                                            <span href="" class="toolkit-download-topic__after ">Download</span>
                                        </div>

                                        <div class="popup-main-wrapper" id="popup-main-wrapper">
                                            <div class="item_popup_wrapper">
                                                <div class="popup_overlay"></div>
                                                <div class="popup_content_wrapper download-pdf">
                                                    <div class="item_popup_content_inner">
                                                        <div class="popup_close_button"></div>
                                                        <div class="download-pdf__wrapper modal modal-content">
                                                            <div class="post-content-form">
                                                                <div class="scholarship-open-form__wrapper">
                                                                    <div class="form-heading">
                                                                        <?php if (get_field('download_button', 'option')['modal_pdf_heading']) {?>
                                                                            <div class="form-title"><?php echo get_field('download_button', 'option')['modal_pdf_heading']; ?></div>
                                                                        <?php } ?>
                                                                        <?php if (get_field('download_button', 'option')['modal_pdf_description']) { ?>
                                                                            <div class="form-desc"><?php echo get_field('download_button', 'option')['modal_pdf_description']; ?></div>
                                                                        <?php } ?>
                                                                    </div>

                                                                    <?php if (get_field('download_button', 'option')['modal_pdf_form_id']) { ?>
                                                                        <div class=""><?php echo do_shortcode('[gravityform id="'.get_field('download_button', 'option')['modal_pdf_form_id'].'" title="false" description="false" ajax="true" tabindex="49"]');?></div>
                                                                    <?php } ?>

                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="popup_content_footer">
                                                            <img src="/wp-content/themes/aigi/assets/images/group.svg" alt="">
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>

                            <?php the_content();?>

<!--                            --><?php //if (get_field('toolkit_topics')['toolkits']) {?>
<!--                                <div class="table-of-content">-->
<!--                                    <div class="table-of-content__list">-->
<!--                                        --><?php //foreach (get_field('toolkit_topics')['toolkits'] as $post) {?>
<!--                                            --><?php //setup_postdata( $post ) ?>
<!--                                            <div class="table-of-content__item">-->
<!--                                                <div class="table-of-content__item-content">-->
<!--                                                    --><?php //the_content(); ?>
<!--                                                </div>-->
<!--                                            </div>-->
<!--                                        --><?php //} ?>
<!--                                        --><?php //wp_reset_postdata(); ?>
<!--                                    </div>-->
<!---->
<!--                                </div>-->
<!--                            --><?php //} ?>


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
