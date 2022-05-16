<!DOCTYPE html>
<html <?php language_attributes(); ?>>
   <head>
      <meta charset="<?php bloginfo( 'charset' ); ?>" />
      <meta name="viewport" content="width=device-width" />
       <script type="text/javascript" defer src="https://donorbox.org/install-popup-button.js"></script><script>window.DonorBox = { widgetLinkClassName: 'custom-dbox-popup' }</script>
      <?php wp_head(); ?>
   </head>
   <?php
   if ( is_single() ) {
//       gt_set_post_view();
   }

   $bg_color_preset = '';
   if (get_field('bg_color_preset')) {
       $bg_color_preset =  get_field('bg_color_preset');
   }
   $bg_color = '';
   if (get_field('body_background')) {
       $bg_color =  get_field('body_background');
   }
   $header_slider = '';
   if (get_field('header_slider')['enable'] == false) {
       $header_slider = 'header-slider-disabled';
   }
   ?>
   <body <?php body_class(array( $bg_color_preset, $header_slider )); ?> style="background-color: <?php  echo ($bg_color) ?  ' ' . $bg_color  . ' '  :''; ?>">
      <div id="aigi-preloader"><img class="preloader-logo" src="/wp-content/themes/aigi/assets/images/aigi-preloader-logo.svg" alt=""></div>
      <style type="text/css">
         #aigi-preloader
            {
               position: fixed;
               top: 0;
               left: 0;
               width: 100%;
               height: 100vh;
               background: #fff;
               z-index: 9999;
               text-align: center;
            }
         .preloader-logo
            {
             position: relative;
             top: 45%;
             margin-top: -75px;
             width: 150px;
             border-radius: 50%;
             animation: rotation 1.5s infinite;
            }
            @-webkit-keyframes rotation {
                  from {
                        -webkit-transform: rotate(0deg);
                  }
                  to {
                        -webkit-transform: rotate(359deg);
                  }
            }
      </style>
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


                <div id="mobile_login-menu" class="mobile_login-menu">
                    <?php if (is_user_logged_in()) : ?>
                        <?php  $current_user = wp_get_current_user();

                        if( $current_user->exists() ){ ?>
                                    <div class="main_menu_item">
                                        <a href="<?php echo $bottom_menu['useraccount_link']['link']['url']; ?>" target="" class="main_menu_top account-dropdown__link" tabindex="0"><?php echo $bottom_menu['useraccount_link']['link']['title']; ?></a>
                                    </div>
                            <?php if (!empty($bottom_menu['header_bottom_menu_right']['logged'])) : ?>

                                <?php foreach($bottom_menu['header_bottom_menu_right']['logged'] as $item) : ?>
                                    <div class="main_menu_item">
                                        <div class="main_menu_icon">
                                            <?php if (!empty($item['icon'])) : ?>
                                                <img class="header_bottom_menu_icon" src="<?= $item['icon']['url'] ?>" alt="<?= $item['link']['title'] ?>">
                                            <?php endif; ?>
                                        </div>

                                        <a class="main_menu_top" href="<?= $item['link']['url'] ?>"><?= $item['link']['title'] ?></a>
                                    </div>
                                <?php endforeach; endif; ?>

                                <div class="main_menu_item">
                                    <div class="main_menu_icon">

                                    </div>
                                    <a href="<?php echo wp_logout_url('/'); ?>" target="" class="main_menu_top" tabindex="0">Logout</a>
                                </div>

                        <?php  } ?>

                    <?php else : ?>

                        <?php if (!empty($bottom_menu['header_bottom_menu_right']['unlogged'])) :
                            foreach($bottom_menu['header_bottom_menu_right']['unlogged'] as $item) : ?>
                                <div class="main_menu_item">
                                    <div class="main_menu_icon">
                                        <?php if (!empty($item['icon'])) : ?>
                                            <img class="header_bottom_menu_icon" src="<?= $item['icon']['url'] ?>" alt="<?= $item['link']['title'] ?>">
                                        <?php endif; ?>
                                    </div>
                                    <a class="main_menu_top" href="<?= $item['link']['url'] ?>"><?= $item['link']['title'] ?></a>
                                </div>
                            <?php endforeach; endif; ?>


                    <?php endif ?>
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
<!--                  <a class="btn-body custom-dbox-popu" href="--><?//= $button['url'] ?><!--"><span class="btn-inner">--><?//= $button['title'] ?><!--</span></a>-->
                      <a class="custom-dbox-popup btn-body" href="https://donorbox.org/aigi-dev-donations">Donate Now</a>
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
                       <?php
                       if ('templates/landing-page.php' != get_page_template_slug($post)) { ?>
                           <div style="display:none"><?php echo do_shortcode('[facetwp template="search_page_result"]');?></div>
                       <?php } ?>
                       <button class="fwp-submit btn-body btn-m-blue" data-href="/search/">Search</button>
                   </div>
               </div>
               <div class="header_bottom_menu" id="header_login_menu">
<!--                  --><?php //if (!empty($bottom_menu['header_bottom_menu_right'])) :
//                     foreach($bottom_menu['header_bottom_menu_right'] as $item) : ?>
<!--                  <div class="header_bottom_menu_item">-->
<!--                     --><?php //if (!empty($item['icon'])) : ?>
<!--                     <img class="header_bottom_menu_icon" src="--><?//= $item['icon']['url'] ?><!--" alt="--><?//= $item['link']['title'] ?><!--">-->
<!--                     --><?php //endif; ?>
<!--                     <a class="header_bottom_link" href="--><?//= $item['link']['url'] ?><!--">--><?//= $item['link']['title'] ?><!--</a>-->
<!--                  </div>-->
<!--                  --><?php //endforeach; endif; ?>

                   <?php if (is_user_logged_in()) : ?>
                       <?php  $current_user = wp_get_current_user();

                       if( $current_user->exists() ){ ?>
                            <?php $current_user = wp_get_current_user(); ?>
                           <div class="header_bottom_menu_item">
                               <a class="header_bottom_link account-dropdown__link" href=""><?php echo $current_user->user_login; ?></a>

                               <div class="account-dropdown">
                                   <div class="account-dropdown__username"><?php echo $current_user->user_firstname; ?> <?php echo $current_user->user_lastname; ?></div>
                                   <div class="account-dropdown__useremail"><?php echo $current_user->user_email; ?></div>
                                   <div class="btn-group f-center m-center">

                                       <a href="<?php echo $bottom_menu['useraccount_link']['link']['url']; ?>" target="" class="btn-body  btn-transparent  Between " tabindex="0">
                                           <span class="btn-inner"><?php echo $bottom_menu['useraccount_link']['link']['title']; ?></span>
                                       </a>
                                       <a href="<?php echo wp_logout_url('/'); ?>" target="" class="btn-body  btn-m-blue  Between " tabindex="0">
                                           <span class="btn-inner">Logout</span>
                                       </a>
                                   </div>


                               </div>
                           </div>

                     <?php if (!empty($bottom_menu['header_bottom_menu_right']['logged'])) : ?>

                     <?php foreach($bottom_menu['header_bottom_menu_right']['logged'] as $item) : ?>
                         <div class="header_bottom_menu_item">
                            <?php if (!empty($item['icon'])) : ?>
                            <img class="header_bottom_menu_icon" src="<?= $item['icon']['url'] ?>" alt="<?= $item['link']['title'] ?>">
                            <?php endif; ?>
                            <a class="header_bottom_link" href="<?= $item['link']['url'] ?>"><?= $item['link']['title'] ?></a>
                         </div>
                     <?php endforeach; endif; ?>

                       <?php  } ?>

                   <?php else : ?>

                       <?php if (!empty($bottom_menu['header_bottom_menu_right']['unlogged'])) :
                           foreach($bottom_menu['header_bottom_menu_right']['unlogged'] as $item) : ?>
                               <div class="header_bottom_menu_item">
                                   <?php if (!empty($item['icon'])) : ?>
                                       <img class="header_bottom_menu_icon" src="<?= $item['icon']['url'] ?>" alt="<?= $item['link']['title'] ?>">
                                   <?php endif; ?>
                                   <a class="header_bottom_link" href="<?= $item['link']['url'] ?>"><?= $item['link']['title'] ?></a>
                               </div>
                           <?php endforeach; endif; ?>


                   <?php endif ?>
               </div>
            </div>
         </div>
          <?php if(function_exists('bcn_display') && !is_front_page() &&!is_home()){ ?>
              <div class="breadcrumb-container">
                  <div class="wrapper-1245">
                      <div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
                          <?php bcn_display($return = false, $linked = true, $reverse = false, $force = false); ?>
                      </div>
                  </div>
              </div>
          <?php } ?>

      </header>

          <?php if (get_field('header_slider')['enable'] == true): ?>
              <?php get_template_part('template-parts/content-blocks/content', 'header-slider'); ?>
          <?php endif; ?>

      <div id="container">

          <div class="add-to-reading-list">
              <div class="reading-header">
                  <div class="reading-header-left">
                      <img src="<?php echo get_template_directory_uri()?>/assets/images/star_full).png">
                      <span>Reading list</span>
                  </div>
                  <div class="reading-header-right">
                      <img src="<?php echo get_template_directory_uri()?>/assets/images/close_arrows.png" class="close-reading-add">
                  </div>
              </div>
              <div class="reading-body">
                  <div class="resource-message">
                      This resources it has been added to your reading list.
                  </div>
                  <div class="resource-body">
                      Indigenous Governance Training and the CATSI Act Review.
                  </div>
                  <a href="/reading-list/" class="reading-button">View your reading list</a>
              </div>
          </div>
