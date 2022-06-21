<?php

$classname = 'custom_gallery';
if (!empty($block['clasName'])) {
    $classname .= ' ' . $block['clasName'];
}
if (!empty($block['align'])) {
    $classname .= ' align' . $block['align'];
}
?>

<!--                        Gallery-->
<?php if (get_field('gallery_block')) : ?>
<?php $data = get_field('gallery_block'); ?>
    <div class="content-item video-block  <?php echo esc_attr($classname)  ?>">
        <div class="single-resource__container image extended">
            <div class="single-resource__bg extended"></div>
            <div class="single-resource__inner">
                <div class="single-resource__header">
                    <div class="single-resource__title">
                        <span><?php echo $data['title'];?></span>
                    </div>
                    <span class="single-resource__icon image"></span>
                </div>
                <div class="single-resource__body">

                    <?php if ($data['add_gallery']) : ?>
                        <?php $gallery = $data['add_gallery']; ?>
                        <div class="resource-image__wrap">
                            <figure class="">
                                <img src="<?php echo $data['add_gallery']['0']['url'];?>" alt="">
                            </figure>

                        </div>

                        <!-- Modal -->

                    <?php endif ?>
                    <?php if($data['add_text']) : ?>
                        <div class="resource__text gallery_description">
                            <p><?php echo $data['add_text']; ?></p>
                        </div>
                    <?php endif; ?>

                    <div class="resource__text">
                        <div class="popup_item_wrapper" data-popup="">
                            <div class="btn-body btn-m-blue full-width popup_button">
                                <span class="btn-inner">VIew event gallery</span>
                            </div>
                            <div class="popup-main-wrapper" id="popup-<?php echo $data['block_id'];?>">
                                <div class="item_popup_wrapper">
                                    <div class="popup_overlay"></div>
                                    <div class="popup_content_wrapper gallery">
                                        <div class="item_popup_content_inner">
                                            <div id="popup_close_button"></div>
                                            <?php if ($gallery) : ?>
                                                <div class="gallery-wrapper">
                                                    <div class="gallery-inner">
                                                        <div class="slider gallery-for-<?php echo $data['block_id'];?>">
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
                                                            <?php if (!is_admin()) {?>
                                                                <div class="gallery__info">
                                                                    <div class="gallery__slide-num">
                                                                        <span> <span class="current-slide" ></span> of <?php echo count($gallery) ?></span>
                                                                        <script>
                                                                            jQuery('.gallery-for-<?php echo $data['block_id'];?> ').on('afterChange', function(event, slick, currentSlide, nextSlide){
                                                                                let current_slide = parseInt(currentSlide) + 1;
                                                                                jQuery('#popup-<?php echo $data['block_id'];?> .current-slide').text(current_slide);
                                                                            });
                                                                        </script>
                                                                    </div>
                                                                    <div class="gallery__title">
                                                                        <span><?php echo $data['title'];?></span>
                                                                    </div>
                                                                </div>
                                                                <div class="slider-arrows">

                                                                </div>
                                                            <?php } ?>


                                                        </div>

                                                        <div class="slider gallery-nav-<?php echo $data['block_id'];?>">
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

                                            <?php if (!is_admin()) {?>
                                                <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
                                                <script>
                                                    jQuery('.gallery-for-<?php echo $data['block_id'];?>').slick({
                                                        infinite: true,
                                                        slidesToShow: 1,
                                                        slidesToScroll: 1,
                                                        arrows: true,
                                                        fade: true,
                                                        autoplay: true,
                                                        autoplaySpeed: 2000,
                                                        asNavFor: '.gallery-nav-<?php echo $data['block_id'];?>',
                                                        appendArrows:'#popup-<?php echo $data['block_id'];?> .slider-arrows',
                                                        prevArrow:'<span class="slider-arrow prev"></span>',
                                                        nextArrow:'<span class="slider-arrow next"></span>'

                                                    });
                                                    jQuery('.gallery-nav-<?php echo $data['block_id'];?>').slick({
                                                        slidesToShow: 7,
                                                        slidesToScroll: 7,
                                                        asNavFor: '.gallery-for-<?php echo $data['block_id'];?>',
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
                                            <?php } ?>

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
