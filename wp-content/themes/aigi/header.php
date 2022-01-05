<!DOCTYPE html>
<html <?php language_attributes(); ?>>
   <head>
      <meta charset="<?php bloginfo( 'charset' ); ?>" />
      <meta name="viewport" content="width=device-width" />
      <?php wp_head(); ?>
   </head>
   <?php
   if ( is_single() ) {
       gt_set_post_view();
   }


   ?>
   <body <?php body_class(); ?> style="background-color: <?php  echo (get_field('body_background') ?  ' ' . get_field('body_background')  . ' '  :''); ?>"">
      <?php wp_body_open(); ?>
      <div id="wrapper" class="hfeed">
      <?php 
         $logo = get_field('logo', 'option');
         $colors = get_field('colors', 'option');
         $button = get_field('header_button', 'option');
         $bottom_menu = get_field('header_bottom_menu', 'option');
         $main_menu = get_field('top_menu', 'option')
         ?>
      <header id="header" role="banner" >
         <div class="screen-shadow"></div>
         <div class="header__wrap">
            <div class="header_top_wrap">
               <div id="mobile_user_menu_wrapper">
                  <div id="burger"></div>
                  <div id="mobile_user_icon"></div>
               </div>
               <div id="branding">
                  <div id="site-logo">
                     <a href="/">
                     <?php if (!empty($logo)) : ?>
                     <img src="<?= $logo['url'] ?>" alt="<?= get_option( 'blogname' ); ?>">
                     <?php endif; ?>
                     </a>
                  </div>
               </div>
               <nav id="menu" role="navigation" itemscope itemtype="https://schema.org/SiteNavigationElement">
                  <?php if (!empty($main_menu)) : ?>
                  <?php foreach($main_menu as $item) : ?>
                  <div class="main_menu_item <?php if (!empty($item['submenu'])) : ?>has_sub has_sub_mobile<?php endif; ?>">
                     <a class="main_menu_top <?php if (!empty($item['submenu'])) : ?>has_sub<?php endif; ?>" href="<?= $item['link']['url'] ?>"><?= $item['link']['title'] ?></a>
                     <?php if (!empty($item['submenu'])) : ?>
                     <div class="main_menu_submenu_overlay">
                        <div class="main_menu_submenu wrapper-1245">
                           <div class="submenu_items_wrapper <?php if (!empty($item['image'])) : ?>has_image<?php endif; ?> <?php if (!empty($item['border_disable'])) : ?>border_disable<?php endif; ?>">
                              <div>
                                 <p class="main_menu_submenu_title"><?= $item['link']['title'] ?></p>
                                 <div class="submenu_item_blocks_wrapper">
                                    <?php foreach($item['submenu'] as $subitem) : ?>                                                        
                                    <div class="submenu_item_block">
                                       <p class="main_menu_sub" ><a href="<?= $subitem['link']['url'] ?>"><?= $subitem['title'] ?></a></p>
                                       <p class="main_menu_sub_descr"><?= $subitem['description'] ?></p>
                                       <a class="main_menu_sub_link" href="<?= $subitem['link']['url'] ?>"><?= $subitem['link']['title'] ?></a>
                                    </div>
                                    <?php endforeach; ?>
                                 </div>
                              </div>
                              <?php if (!empty($item['image'])) : ?>
                              <div class="submenu_img_wrapper">
                                 <div style="background: url(<?= $item['image']['url'] ?>);" class="submenu_img">
                                    <?php if (!empty($item['image_title'])) : ?>
                                    <p style="color: <?= $item['text_color'] ?>;" class="submenu_img_title"><?= $item['image_title'] ?></p>
                                    <?php endif; ?>
                                    <?php if (!empty($item['image_title'])) : ?>
                                    <p style="color: <?= $item['text_color'] ?>;" class="image_description"><?= $item['image_description'] ?></p>
                                    <?php endif; ?>
                                    <?php if (!empty($item['image_link'])) : ?>
                                    <a class="btn-body btn-m-blue" href="<?= $item['image_link']['url'] ?>"><span class="btn-inner"><?= $item['image_link']['title'] ?></span></a>
                                    <?php endif; ?>
                                 </div>
                              </div>
                              <?php endif; ?>
                           </div>
                        </div>
                     </div>
                     <?php endif; ?>
                  </div>
                  <?php endforeach; ?>
                  <?php endif; ?>
               </nav>
               <div id="header_button_wrapper">
                  <?php if (!empty($button)) : ?>
                  <a class="btn-body" href="<?= $button['url'] ?>"><span class="btn-inner"><?= $button['title'] ?></span></a>
                  <?php endif; ?>
               </div>
            </div>
            <div class="header_bottom_wrap">
               <div class="header_bottom_menu" id="header_bottom_buttons">
                  <?php if (!empty($bottom_menu['header_bottom_menu_left'])) : 
                     foreach($bottom_menu['header_bottom_menu_left'] as $item) : ?>
                  <div class="header_bottom_menu_item">
                     <?php if (!empty($item['icon'])) : ?>
                     <img class="header_bottom_menu_icon" src="<?= $item['icon']['url'] ?>" alt="<?= $item['link']['title'] ?>">
                     <?php endif; ?>
                     <a class="header_bottom_link" href="<?= $item['link']['url'] ?>"><?= $item['link']['title'] ?></a>
                  </div>
                  <?php endforeach; endif; ?>
               </div>
               <div id="header_search">
<!--                  <form>-->
<!--                     <input required class="search_input" type="text" name="" placeholder="Search">-->
<!--                     <input class="btn-body btn-m-blue search_submit_button" type="submit" name="" value="Search">-->
<!--                  </form>-->
                   <div class="facetwp__search_bar-wrap">
                       <?php echo do_shortcode('[facetwp facet="search_bar"]');?>
                       <div style="display:none"><?php echo do_shortcode('[facetwp template="search_page_result"]');?></div>
                       <button class="fwp-submit btn-body btn-m-blue" data-href="/search/">Search</button>
                   </div>
               </div>
               <div class="header_bottom_menu" id="header_login_menu">
                  <?php if (!empty($bottom_menu['header_bottom_menu_right'])) : 
                     foreach($bottom_menu['header_bottom_menu_right'] as $item) : ?>
                  <div class="header_bottom_menu_item">
                     <?php if (!empty($item['icon'])) : ?>
                     <img class="header_bottom_menu_icon" src="<?= $item['icon']['url'] ?>" alt="<?= $item['link']['title'] ?>">
                     <?php endif; ?>
                     <a class="header_bottom_link" href="<?= $item['link']['url'] ?>"><?= $item['link']['title'] ?></a>
                  </div>
                  <?php endforeach; endif; ?>
               </div>
            </div>
         </div>
      </header>
          <?php if (get_field('header_slider')['enable'] == true): ?>
              <?php get_template_part('template-parts/content-blocks/content', 'header-slider'); ?>
          <?php endif; ?>

      <div id="container">