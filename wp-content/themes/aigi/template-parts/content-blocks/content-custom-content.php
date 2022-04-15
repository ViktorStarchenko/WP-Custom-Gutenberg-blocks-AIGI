<?php $content_items = $args; ?>
<?php //var_dump($args[0]);?>
<?php if ($content_items) : ?>
    <?php foreach ($content_items as $content_item) : ?>

        <!--                            Header-->
        <?php if ($content_item['item_type'] == 'Header Block') : ?>
            <div class="content-item header-block">
                <div class="single-resource__container">
                    <?php echo $content_item['header_block']['content']; ?>
                </div>

            </div>
        <?php endif ?>

        <!--                            Subheads-->
        <?php if ($content_item['item_type'] == 'Subheads') : ?>
            <div class="content-item subheads-block">
                <p class="sub-heading"><?php echo $content_item['subheads_block']['content']; ?></p>
            </div>
        <?php endif ?>

        <!--                            Text-->
        <?php if ($content_item['item_type'] == 'Text Block') : ?>
            <div class="content-item text-block">
                <?php echo $content_item['text_block']['content']; ?>
            </div>

        <?php endif ?>

        <!--                            Heading-->
        <?php if ($content_item['item_type'] == 'Heading') : ?>
            <div class="content-item text-block text_item heading">
                <?php echo $content_item['heading_block']['content']; ?>
            </div>
        <?php endif ?>

        <!--                            Subheading-->
        <?php if ($content_item['item_type'] == 'Subheading') : ?>
            <div class="content-item text-block text_item subheading">
                <?php echo $content_item['subheading_block']['content']; ?>
            </div>
        <?php endif ?>

        <!--                            Small Text Block-->
        <?php if ($content_item['item_type'] == 'Small Text') : ?>
            <div class="content-item text-block text_item small-text">
                <?php echo $content_item['small_text_block']['content']; ?>
            </div>
        <?php endif ?>


        <!--Video-->
        <?php if ($content_item['item_type'] == 'Video') : ?>
            <?php $data_video_suf = $content_item['block_id']; ?>
            <div class="content-item video-block <?php echo ($content_item['video_block']['disable_styling'] == true) ? 'disable_styling' : '' ?>">
                <div class="single-resource__container video extended">
                    <div class="single-resource__bg extended"></div>
                    <div class="single-resource__inner">
                        <div class="single-resource__header">
                            <div class="single-resource__title">
                                <span><?php echo $content_item['video_block']['title'];?></span>
                            </div>
                            <span class="single-resource__icon video"></span>
                        </div>
                        <div class="single-resource__body">

                            <?php if ($content_item['video_block']['video_source_type'] == 'embed') : ?>

                                <?php if($content_item['video_block']['youtube_code']): ?>
                                    <div class="resource-video__wrap">
                                        <object width="100%" height="100%"><param name="movie" value="https://www.youtube.com/v/<?php echo  $content_item['video_block']['youtube_code']; ?>?wmode=transparent&version=3&amp;hl=en_US&amp;rel=0"></param><param name="allowFullScreen" value="true"></param><param name="allowscriptaccess" value="always"></param><embed src="https://www.youtube.com/v/<?php echo $content_item['video_block']['youtube_code']; ?>?version=1&amp;hl=en_US&amp;rel=0" type="application/x-shockwave-flash" width="460" height="264" allowscriptaccess="always" allowfullscreen="true"></embed></object>
                                    </div>
                                <?php endif; ?>

                            <?php elseif ($content_item['video_block']['video_source_type'] == 'upload') :  ?>

                                <?php if($content_item['video_block']['add_file']): ?>
                                    <div class="resource-video__wrap">
                                        <div class="online__video-wrap">
                                            <video  preload="metadata" class="paused online-video" data-watched="false" data-issetsrc="false" data-video="<?php echo $data_video_suf ?>" playsinline="" webkit-playinginline="" heght="auto" width="100%" src="<?php echo $content_item['video_block']['add_file']['url']?>">
                                            </video>
                                            <div class="video-button-wrap">
                                                <button id="online__video-button" class="play online__video-button fist-lesson-button" data-video="<?php echo $data_video_suf ?>">
                                                    <span class="play-button-body"></span>
                                                </button>
                                            </div>
                                            <div class="video-pause-wrap" data-video="<?php echo $data_video_suf ?>">
                                                <button id="online__video-pause-button" class="pause"></button></div>
                                        </div>
                                    </div>
                                <?php endif ?>

                            <?php elseif ($content_item['video_block']['video_source_type'] == 'vimeo-link') :  ?>

                                <div class="resource-video__wrap vimeo">
                                    <?php echo $content_item['video_block']['vimeo_link']; ?>
                                </div>

                            <?php endif ?>

                            <?php if($content_item['video_block']['add_text']) : ?>
                                <div class="resource__text">
                                    <p><?php echo $content_item['video_block']['add_text']; ?></p>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="single-resource__footer"></div>
                    </div>

                </div>
            </div>

        <?php endif ?>

        <!--                            Image-->
        <?php if ($content_item['item_type'] == 'Image') : ?>
            <div class="content-item image-block">
                <div class="single-resource__container image extended">
                    <div class="single-resource__bg extended"></div>
                    <div class="single-resource__inner">
                        <div class="single-resource__header">
                            <div class="single-resource__title">
                                <a target="_blank" <?php echo ($content_item['image_block']['image_link'] ? 'href="'.$content_item['image_block']['image_link']['url'].'"' : '' ) ?>><?php echo $content_item['image_block']['title'];?></a>
                            </div>
                            <span class="single-resource__icon image"></span>
                        </div>
                        <div class="single-resource__body">

                            <?php if ($content_item['image_block']['add_image']) : ?>
                                <div class="resource-image__wrap">
                                    <picture>
                                        <img src="<?php echo $content_item['image_block']['add_image']['url'];?>" alt="<?php echo $content_item['image_block']['add_image']['url'] ;?>">
                                    </picture>
                                </div>
                            <?php endif ?>

                            <?php if($content_item['image_block']['add_text']) : ?>
                                <div class="resource__text">
                                    <p><?php echo $content_item['image_block']['add_text']; ?></p>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="single-resource__footer"></div>
                    </div>

                </div>
            </div>
            <!--                                --><?php //echo $content_item['image_block']; ?>
        <?php endif ?>


        <!--                        Gallery-->
        <?php if ($content_item['item_type'] == 'Gallery') : ?>
            <div class="content-item video-block">
                <div class="single-resource__container image extended">
                    <div class="single-resource__bg extended"></div>
                    <div class="single-resource__inner">
                        <div class="single-resource__header">
                            <div class="single-resource__title">
                                <span><?php echo $content_item['gallery_block']['title'];?></span>
                            </div>
                            <span class="single-resource__icon image"></span>
                        </div>
                        <div class="single-resource__body">

                            <?php if ($content_item['gallery_block']['add_gallery']) : ?>
                                <?php $gallery = $content_item['gallery_block']['add_gallery']; ?>
                                <div class="resource-image__wrap">
                                    <figure class="">
                                        <img src="<?php echo $content_item['gallery_block']['add_gallery']['0']['url'];?>" alt="<?php echo $content_item['image_block']['add_image']['0']['url'] ;?>">
                                    </figure>

                                </div>

                                <!-- Modal -->

                            <?php endif ?>
                            <?php if($content_item['gallery_block']['add_text']) : ?>
                                <div class="resource__text">
                                    <p><?php echo $content_item['gallery_block']['add_text']; ?></p>
                                </div>
                            <?php endif; ?>

                            <div class="resource__text">
                                <div class="popup_item_wrapper" data-popup="">
                                    <div class="btn-body btn-m-blue full-width popup_button">
                                        <span class="btn-inner">VIew event gallery</span>
                                    </div>
                                    <div class="popup-main-wrapper" id="popup-<?php echo $content_item['block_id'];?>">
                                        <div class="item_popup_wrapper">
                                            <div class="popup_overlay"></div>
                                            <div class="popup_content_wrapper gallery">
                                                <div class="item_popup_content_inner">
                                                    <div id="popup_close_button"></div>
                                                    <?php if ($gallery) : ?>
                                                        <div class="gallery-wrapper">
                                                            <div class="gallery-inner">
                                                                <div class="slider gallery-for-<?php echo $content_item['block_id'];?>">
                                                                    <?php foreach ($gallery as $key=>$item_for) : ?>
                                                                        <div>
                                                                            <div class="gallery-for__item">
                                                                                <div class="gallery-for__img">
                                                                                    <picture>
                                                                                        <img src="<?php echo $item_for['url']?>" alt="<?php echo $item_for['title']?>">
                                                                                    </picture>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    <?php endforeach ?>
                                                                    <?php wp_reset_postdata(); ?>
                                                                </div>
                                                                <div class="gallery__navigation">
                                                                    <div class="gallery__info">
                                                                        <div class="gallery__slide-num">
                                                                            <span> <span class="current-slide" ></span> of <?php echo count($gallery) ?></span>
                                                                            <script>
                                                                                jQuery('.gallery-for-<?php echo $content_item['block_id'];?> ').on('afterChange', function(event, slick, currentSlide, nextSlide){
                                                                                    let current_slide = parseInt(currentSlide) + 1;
                                                                                    jQuery('#popup-<?php echo $content_item['block_id'];?> .current-slide').text(current_slide);
                                                                                });
                                                                            </script>
                                                                        </div>
                                                                        <div class="gallery__title">
                                                                            <span><?php echo $content_item['gallery_block']['title'];?></span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="slider-arrows">

                                                                    </div>
                                                                </div>

                                                                <div class="slider gallery-nav-<?php echo $content_item['block_id'];?>">
                                                                    <?php foreach ($gallery as $item_nav) : ?>
                                                                        <div>
                                                                            <div class="gallery-nav__item">
                                                                                <div class="gallery-nav__img">
                                                                                    <picture>
                                                                                        <img src="<?php echo $item_nav['url']?>" alt="<?php echo $item_nav['title']?>">
                                                                                    </picture>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    <?php endforeach ?>
                                                                    <?php wp_reset_postdata(); ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <div class="popup_content_footer"></div>

                                                        <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
                                                        <script>
                                                            jQuery('.gallery-for-<?php echo $content_item['block_id'];?>').slick({
                                                                infinite: true,
                                                                slidesToShow: 1,
                                                                slidesToScroll: 1,
                                                                arrows: true,
                                                                fade: true,
                                                                autoplay: true,
                                                                autoplaySpeed: 2000,
                                                                asNavFor: '.gallery-nav-<?php echo $content_item['block_id'];?>',
                                                                appendArrows:'#popup-<?php echo $content_item['block_id'];?> .slider-arrows',
                                                                prevArrow:'<span class="slider-arrow prev"></span>',
                                                                nextArrow:'<span class="slider-arrow next"></span>'

                                                            });
                                                            jQuery('.gallery-nav-<?php echo $content_item['block_id'];?>').slick({
                                                                slidesToShow: 7,
                                                                slidesToScroll: 7,
                                                                asNavFor: '.gallery-for-<?php echo $content_item['block_id'];?>',
                                                                dots: false,
                                                                centerMode: true,
                                                                focusOnSelect: true,
                                                                autoplay: true,
                                                                autoplaySpeed: 2000,
                                                                responsive: [
                                                                    {
                                                                        breakpoint: 1024,
                                                                        settings: {
                                                                            slidesToShow: 3,
                                                                            slidesToScroll: 1,
                                                                            infinite: true,
                                                                            dots: true
                                                                        }
                                                                    },
                                                                    {
                                                                        breakpoint: 600,
                                                                        settings: {
                                                                            slidesToShow: 2,
                                                                            slidesToScroll: 1
                                                                        }
                                                                    },
                                                                    // You can unslick at a given breakpoint now by adding:
                                                                    // settings: "unslick"
                                                                    // instead of a settings object
                                                                ]
                                                            });
                                                        </script>
                                                    <?php endif ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="single-resource__footer"></div>
                    </div>
                </div>
            </div>
        <?php endif ?>

        <!--Blockquote-->
        <?php if ($content_item['item_type'] == 'Blockquote') : ?>
            <div class="content-item text-block">
                <div class="blockquote-body">
                    <p class="blockquote-text"><?php echo $content_item['blockquote']['text']; ?></p>
                    <div class="blockquote-author">
                        <span><?php echo $content_item['blockquote']['author']; ?></span>
                    </div>
                    <div class="blockquote-author-position">
                        <span><?php echo $content_item['blockquote']['author_position']; ?></span>
                    </div>
                </div>
            </div>
        <?php endif ?>

        <!--                                Accordion-->
        <?php if ($content_item['item_type'] == 'Accordion') : ?>
            <?php if ($content_item['accordion_block']) : ?>
                <div class="content-item accordion">
                    <div class="accordion_wrapper">
                        <?php foreach ($content_item['accordion_block'] as $accordion_item) : ?>
                            <div class="accordion_item">
                                <?php if($accordion_item['content']): ?>
                                    <span class="title-h4 nav_list-title accordion_btn"><?php echo $accordion_item['title']?></span>
                                <?php endif ?>
                                <div  class="accordion_panel">
                                    <?php if($accordion_item['subtitle']): ?>
                                        <span class="accordion_subtitle"><?php echo $accordion_item['subtitle']?></span>
                                    <?php endif ?>
                                    <div class="accordion_content">
                                        <?php if($accordion_item['content']): ?>
                                            <?php echo $accordion_item['content']?>
                                        <?php endif ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                        <?php wp_reset_postdata(); ?>
                    </div>
                </div>
            <?php endif ?>
        <?php endif ?>

    <!--File-->
    <?php if ($content_item['item_type'] == 'File') : ?>
            <div class="content-item file">
                <div class="single-resource__container file">
                    <div class="single-resource__bg"></div>
                    <div class="single-resource__inner">
                        <div class="single-resource__header">
                            <div class="single-resource__title">
                                <span><?= $content_item['file_block']['file_title'] ?></span>
                            </div>
                            <span class="single-resource__icon file"></span>
                        </div>
                        <div class="single-resource__body">

                                <div class="resource__text">
                                    <?= $content_item['file_block']['file_text']; ?>
                                </div>

                            <?php if($content_item['file_block']['files']): ?>
                            <?php foreach ($content_item['file_block']['files'] as $file): ?>
                                <div class="resource-link file">
                                    <a href="<?php echo $file['file']['url']; ?>" download><?php echo $file['file']['title']; ?></a>
                                </div>
                            <?php endforeach; ?>
                            <?php endif; ?>

                        </div>

                        <div class="single-resource__footer"></div>
                    </div>

                </div>
            </div>
    <?php endif ?>

    <!--Link-->
    <?php if ($content_item['item_type'] == 'Link'): ?>
            <div class="content-item link">
                <div class="single-resource__container link">
                    <div class="single-resource__bg"></div>
                    <div class="single-resource__inner">
                        <div class="single-resource__header">
                            <div class="single-resource__title">
                                <span><?= $content_item['link_block']['link_title']; ?></span>
                            </div>
                            <span class="single-resource__icon  link"></span>
                        </div>
                        <div class="single-resource__body">
                                <div class="resource__text">
                                    <?= $content_item['link_block']['link_text']; ?>
                                </div>
                            <?php if($content_item['link_block']['link']): ?>
                                <div class="resource-link">
                                    <a target="_blank" href="<?= $content_item['link_block']['link']['url']; ?>"><?= $content_item['link_block']['link']['title']; ?></a>
                                </div>
                            <?php endif; ?>

                        </div>

                        <div class="single-resource__footer"></div>
                    </div>

                </div>
            </div>
    <?php endif ?>
    
    <?php if ($content_item['item_type'] == 'Profile List') : ?>
            <?php $posts = $content_item['profile_list']['resources']; ?>
        
            <div class="content-item profile-list">
                <div class="rslider__header">
                    <div class="rslider__header-top">
                        <div class="rslider__heading"><?= $content_item['profile_list']['heading']; ?></div>
                    </div>
                    <div class="rslider__desc"><?= $content_item['profile_list']['description'] ?></div>
                </div>
                <div class="profile-list__wrapper">
                    <?php if ($posts) : ?>
                        <?php foreach($posts as $post) : ?>
                            <div class="profile-list__item">
                                <div class="rslider__item-header">
                                    <!--                            <div class="rslider__type content-tags__item">--><?php //echo $terms[0]; ?><!--</div>-->
                                </div>
                                <div class="rslider__item-body">
                                    <div class="speakers__bio">
                                        <div class="speakers__image">
                                            <img src="<?php echo get_the_post_thumbnail_url( $post->ID, 'full' ) ?>" alt="<?= $post->post_title; ?>">
                                        </div>
                                        <div class="speakers__bio-text">
                                            <div class="speakers__name"><?php echo $post->post_title; ?></div>
                                            <div class="speakers__position"><?php echo get_field('people_info')['position']; ?></div>
                                        </div>
                                    </div>
                                    <?php
                                    $excerpt = '';
                                    ?>
                                    <div class="rslider__excerpt"><?php echo get_custom_excerpt($post->post_excerpt, 450, true) ?></div>

                                </div>

                            </div>
                        <?php endforeach ?>
                        <?php wp_reset_postdata(); ?>
                    <?php endif ?>

                </div>
            </div>
        
    <?php endif ?>

        <!--Buttons Group-->
        <?php if ($content_item['item_type'] == 'Buttons Group') : ?>
            <div class="content-item buttons-block">
                <?php
                $button_group = $content_item['button_group'];
                $button_group_classes = '';
                if ($button_group['alignment']['desktop']) {
                    $button_group_classes .= ' ' . $button_group['alignment']['desktop'] . ' ';
                }
                if ($button_group['alignment']['mobile']) {
                    $button_group_classes .= ' ' . $button_group['alignment']['mobile'] . ' ';
                }

                if ($button_group['margin']['margin_top']) {
                    $button_group_classes .= ' ' . $button_group['margin']['margin_top'] . ' ';
                }
                if ($button_group['margin']['margin_bottom']) {
                    $button_group_classes .= ' ' . $button_group['margin']['margin_bottom'] . ' ';
                }

                ?>

                <?php if($button_group['buttons']) : ?>
                    <div class="btn-group <?php echo $button_group_classes ; ?>">
                        <?php foreach($button_group['buttons'] as $button) : ?>

                            <?php
                            $classes = '';
                            if ($button['styling']['color']) {
                                $classes .= ' ' . $button['styling']['color'] . ' ';
                            }
                            if ($button['styling']['icon']) {
                                $classes .= ' ' . $button['styling']['icon'] . ' ';
                            }
                            if ($button['styling']['icon_position']) {
                                $classes .= ' ' . $button['styling']['icon_position'] . ' ';
                            }
                            if ($button['styling']['alignment']) {
                                $classes .= ' ' . $button['styling']['alignment'] . ' ';
                            }
                            if ($button['anchor'] == true) {
                                $classes .= ' ' . 'crane' . ' ';
                            }

                            ?>
                            <a href="<?php echo $button['button']['url'] ;?>" target="<?= $button['button']['target'] ?>" class="btn-<?php echo $button['id']; ?>  btn-body <?php echo $classes ?>">
                                <span class="btn-inner"><?php echo $button['button']['title'] ;?></span>
                            </a>
                        <?php endforeach; ?>
                        <?php wp_reset_postdata(); ?>
                    </div>
                <?php endif; //edif buttons ?>
            </div>

        <?php endif ?>

    <?php endforeach ?>
    <?php wp_reset_postdata(); ?>
<?php endif ?>