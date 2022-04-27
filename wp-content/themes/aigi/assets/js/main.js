
jQuery( window ).on('load resize', function() {
    // Auto normalize header background for resources (link, file, tips, table)
    jQuery('.single-resource__container').not(".extended").each(function(i){
        let headerHeight = jQuery(this).find( '.single-resource__header' ).innerHeight();
        jQuery(this).find( '.single-resource__bg' ).innerHeight(headerHeight)
    })
})




// VIDEO PLAYER
jQuery(document).ready(function () {
    jQuery('.online__video-button').on('click', function () {


        var data = jQuery(this).attr('data-video');
        var video_button_wrap = jQuery(this).parent().get(0);
        var video_pause_wrap = jQuery(video_button_wrap).siblings("div.video-pause-wrap").get(0);


        var video = jQuery('.online-video');

        video.each(function (elem) {

            // console.log($(video[elem]).attr('data-issetSrc'))

            if (jQuery(video[elem]).attr('data-video') == data) {
                // console.log($(this).attr('data-issetSrc'))
                var issetSrc = jQuery(this).attr('data-issetSrc')
                if (issetSrc == 'false') {
                    console.log(issetSrc)
                    var src = jQuery(this).attr('data-src');
                    jQuery(this).attr('src', src);
                    jQuery(this).attr('data-issetSrc', true)
                }

                jQuery('.video-poster[data-video=' + data + ']').hide()
                jQuery(this).removeClass('paused');
                jQuery(this).get(0).play();
                jQuery(this).prop("controls",true)
            }
            if (jQuery(video[elem]).attr('data-video')) {
                // $(this).removeClass('paused');
                // $(this).get(0).play();
            }

        })
        jQuery('.video-poster[data-video=' + data + ']').hide()
        jQuery(video_button_wrap).hide()

        jQuery(video_pause_wrap).addClass('visible')
        // $('.video-button-wrap').hide()
        // $('.video-pause-wrap').addClass('visible')
    })

    jQuery('.video-pause-wrap').on('click', function () {
        var data = jQuery(this).attr('data-video');
        console.log(data)
        var video_button_wrap = jQuery(this).siblings("div.video-button-wrap").get(0);


        var video = jQuery('.online-video');

        video.each(function (elem) {
            if (jQuery(video[elem]).attr('data-video') == data) {
                jQuery(this).addClass('paused');
                jQuery(this).get(0).pause();
                jQuery(this).prop("controls",false)
            }

        })

        jQuery(video_button_wrap).show()
        jQuery(this).removeClass('visible')
    })

})

////////////////////////// ACCORDION
var acc = document.getElementsByClassName("accordion_btn");
var i;

for (i = 0; i < acc.length; i++) {
    acc[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var panel = this.nextElementSibling;
        if (panel.style.maxHeight) {
            panel.classList.remove('active');
            panel.style.maxHeight = null;
        } else {
            panel.classList.add('active');
            panel.style.maxHeight = panel.scrollHeight + "px";
        }
    });
}


// Check if element in view
function elementInViewport2(el) {
    var top = el.offsetTop;
    var left = el.offsetLeft;
    var width = el.offsetWidth;
    var height = el.offsetHeight;

    while(el.offsetParent) {
        el = el.offsetParent;
        top += el.offsetTop;
        left += el.offsetLeft;
    }

    return (
        top < (window.pageYOffset + window.innerHeight) &&
        left < (window.pageXOffset + window.innerWidth) &&
        (top + height) > window.pageYOffset &&
        (left + width) > window.pageXOffset
    );
}



////////////////////////  Header Slider
jQuery(document).ready(function(){

    let header_slider__el = document.getElementById('header-slider');

    if (header_slider__el) {
        let header_slider = jQuery('.header-slider');
        $header_slider = jQuery('.header-slider');


        var reinitSlick = function(header_slider) {
            console.log('reinitSlick')
            // jQuery(header_slider).slick('slickSetOption', 'autoplay', false);
            jQuery(header_slider).slick('slickPause');
        }

        jQuery(header_slider).slick({
            autoplay: true,
            adaptiveHeight: true,
            autoplaySpeed: 2000,
            speed: 1000,
            fade: true,
            cssEase: 'linear',
            appendArrows:'.gallery-nav',
            prevArrow:'<span class="slider-arrow prev"></span>',
            nextArrow:'<span class="slider-arrow next"></span>'
        }).slick('slickPause');
        // .on('setPosition', function (event, slick) {
        //     slick.$slides.css('height', slick.$slideTrack.height() + 'px');
        // });

        // A function that start autoplay when entering the viewport
        function triggerScroll(targetObj) {
            let targetName = targetObj.attr("id"); //for console.log
            let targetFlag = false;
            let scrollTop = jQuery(window).scrollTop();
            let scrollBottom = scrollTop + $(window).height();
            let targetTop = targetObj.offset().top;
            let targetBottom = targetTop + targetObj.height();
            // while loading
            if (scrollBottom > targetTop && scrollTop < targetBottom) {
                if (!targetFlag) {
                    console.log(targetName + ' is in sight'); //for console.log
                    targetObj.slick('slickPlay');
                    targetFlag = true;
                }
            } else {
                console.log(targetName + ' is not in sight'); //for console.log
                targetObj.slick('slickPause');
                targetFlag = false;
            }

            jQuery(window).on('scroll', function () {
                scrollTop = jQuery(window).scrollTop();
                scrollBottom = scrollTop + $(window).height();
                targetTop = targetObj.offset().top;
                targetBottom = targetTop + targetObj.height();
                if (scrollBottom > targetTop && scrollTop < targetBottom) {
                    // Start autoplay when entering the viewport
                    if (!targetFlag) {
                        console.log(targetName + ' is in sight');//確認用
                        targetObj.slick('slickPlay');
                        targetFlag = true;
                    }
                } else {
                    // Stop autoplay when you get out of the viewport
                    if (targetFlag) {
                        console.log(targetName + ' is not in sight');//for console.log
                        targetObj.slick('slickPause');
                        targetFlag = false;
                    }
                }
            });
        }
        // Execute function
        triggerScroll(jQuery('#header-slider'));
    }


});
jQuery('.header-slider').on('beforeChange', function(event, slick, currentSlide, nextSlide){
    initProgressBar(nextSlide)
});
jQuery('.header-slider').on('init', function(event, slick, direction) {
    initProgressBar()
    console.log(jQuery('.header-slider .slick-slide').length)
    // check to see if there are one or less slides
    if (jQuery('.header-slider .slick-slide').length <= 1) {

        // remove arrows
        jQuery('.header-slider__section .slider__progress-bar').hide();
        jQuery('.header-slider__section .gallery-nav').hide();

    }
})

function initProgressBar(nextSlide = 0){
    jQuery('.slider__progress-bar').empty();
    let current_slide = jQuery('.slick-current.slick-active').attr('data-slick-index')
    let slider_items = jQuery('.header-slider__item')
    let total_slider = slider_items.length;
    let progress_bar_width = jQuery('.slider__progress-bar').width();
    for(i=0; i<total_slider; i++ ) {
        jQuery('.slider__progress-bar').append('<div class="slider__progress-item" style="width: '+ progress_bar_width/total_slider +'px" data-slick-index="'+ i +'"><div class="slider__progress-inner"></div></div>');
        if (i == nextSlide) {
            jQuery('.slider__progress-inner').removeClass('animate');
            jQuery('.slider__progress-item[data-slick-index="'+i+'"] .slider__progress-inner').addClass('animate');
        }
    }
}



// header - footer
jQuery(window).on("load resize", function() {

    if (jQuery(window).width() < 1200) {

        jQuery("#burger").click(function() {
            jQuery("#menu").toggleClass("menu_mobile_visible");
            jQuery(this).toggleClass("burger_opened");
            jQuery("body").toggleClass("fixed-position");
            jQuery("#header_bottom_buttons").toggleClass("show_submenu_mob");
        });

        jQuery(document).on('click', ".main_menu_item.has_sub.has_sub_mobile", function() {
            jQuery(this).children(".main_menu_submenu_overlay").show();
            jQuery(this).addClass("submenu_opened");
            jQuery(this).removeClass("has_sub_mobile");
        });

        jQuery(".submenu_opened, .main_menu_submenu_title").click(function(e) {
            e.stopPropagation();
            jQuery(this).parents(".submenu_opened").removeClass("submenu_opened").addClass("has_sub_mobile");
            jQuery(this).closest(".main_menu_submenu_overlay").hide();
        })

        // Login menu
        jQuery("#mobile_user_icon").click(function() {
            jQuery("#mobile_login-menu").toggleClass("menu_mobile_visible");
            jQuery(this).toggleClass("burger_opened");
            jQuery("body").toggleClass("fixed-position");
        });


    } else {

        jQuery(".main_menu_item.has_sub").hover(function() {
            jQuery(this).children(".main_menu_submenu_overlay").show();
            jQuery(this).addClass("submenu_opened");
        }, function() {
            jQuery(this).children(".main_menu_submenu_overlay").hide();
            jQuery(this).removeClass("submenu_opened");
        });

        jQuery('.account-dropdown__link').on('click', function() {
            jQuery(this).toggleClass('open');
            jQuery('.account-dropdown').toggleClass('open');
            return false;
        });
    }


    if (jQuery(window).width() < 1000) {

        jQuery(".footer_social_block").appendTo(".footer_location_block");
    } else {

        jQuery(".footer_social_block").insertAfter(".footer_location_block");
    }

});


// TABS
let tab = function () {
    let tabNav = document.querySelectorAll('.tabs-nav__item'),
        tabContent = document.querySelectorAll('.tab'),
        tabName;

    tabNav.forEach(item => {

        item.addEventListener('click', selectTabNav)
    });

    tabNav.forEach(item => {

        item.addEventListener('touchend', selectTabNav)
    });

    function selectTabNav() {

        tabNav.forEach(item => {
            item.classList.remove('is-active');
            item.classList.add('inactive');
        });
        this.classList.remove('inactive');
        this.classList.add('is-active');

        tabName = this.getAttribute('data-tab-name');

        selectTabContent(tabName);
    }

    function selectTabContent(tabName) {
        console.log(tabName)

        tabContent.forEach(item => {
            item.classList.contains(tabName) ? item.classList.add('is-active') : item.classList.remove('is-active');
        })
    }

};

tab();

// GLOBAL SEARCH
// FaceWP post type switch
jQuery('.global-search-tab-nav').on('click', function (){
    let post_type = jQuery(this).attr('data-post-type')
    url = new URL(window.location.href);

    if (!url.searchParams.get('_search_bar') && !url.searchParams.get('_content_tags')) {
        resetFilter()
    } else if (url.searchParams.get('_search_bar') || url.searchParams.get('_content_tags')) {
        jQuery('.global-search-tab[data-post-type="'+post_type+'"] .facetwp-facet-post_type .facetwp-checkbox.checked').removeClass('checked')

        if (post_type == 'all') {
            jQuery('.global-search-tab[data-post-type="'+post_type+'"] .facetwp-facet-post_type .facetwp-checkbox').click()
        }
    }

    setTimeout(checkPostType, 2200, post_type);
})
function checkPostType(post_type) {
    console.log(post_type)
    jQuery('.global-search-tab[data-post-type="'+post_type+'"] .facetwp-facet-post_type .facetwp-checkbox[data-value="'+post_type+'"]').click();
}
function refreshSearchPageCounter() {

    let page = FWP.settings.pager.page;
    let total_rows = FWP.settings.pager.total_rows;

    let posts_per_page = jQuery('.search-page__results .post-tile__wrap').length
    let viewed_posts = parseInt(page) * parseInt(posts_per_page);
    if (posts_per_page < 10) {
        viewed_posts = total_rows;
    }
    console.log('page ' + page)
    console.log('posts_per_page ' + posts_per_page)
    console.log('viewed_posts ' + viewed_posts)
    jQuery('.search-pagination__per-page').html(viewed_posts);
    jQuery('.search-pagination__total-rows').html(total_rows);

}
jQuery('body').on('click', function(e){
    if(e.target.classList.contains('facetwp-page') ) {
        top = jQuery('.search-page__results').offset().top;

        jQuery('body,html').animate({scrollTop: top-190}, 400);
    }
});
// Init speakers slider on faceWP load
(function(jQuery) {
    document.addEventListener('facetwp-loaded', function() {
        setTimeout(initSpeakersSlider, 2000);
        url = new URL(window.location.href);
        if (url.searchParams.get('_search_bar') || url.searchParams.get('_content_tags')) {
            console.log(FWP.settings.pager.total_rows);
            // Refresh post types count for search result
            jQuery('.global-search-tab-nav .posts-count').html(0);
            let posts = jQuery('.global-search-tab[data-post-type="all"] .facetwp-facet-post_type .facetwp-checkbox');
            let all_count = 0;
            posts.each(function(){
                console.log(jQuery(this).attr('data-value'))
                let post_type = jQuery(this).attr('data-value');
                let posts_count = parseInt(jQuery(this).find('.facetwp-counter').html().slice(1).slice(0,-1));
                all_count+= posts_count;
                jQuery('.global-search-tab-nav[data-post-type="'+post_type+'"]').find('.posts-count').html(posts_count);
                jQuery('.global-search-tab-nav[data-post-type="all"]').find('.posts-count').html(all_count);
            })


        }

        refreshSearchPageCounter();
        refreshFilterNavArrows();

    });
})(jQuery);

function resetFilter(){
    console.log('reset filter')
    jQuery('.search-filter__reset').click();
}
function refreshFilterNavArrows() {
    jQuery('.facetwp-page.next').html('▶')
    jQuery('.facetwp-page.prev').html('◀')
}
jQuery().on()

jQuery('.facetwp-search').keypress(function(e) {

});

jQuery('body').keypress(function(event) {


    if (event.target.matches('.facetwp-search')) {
        console.log('You pressed enter!');
        console.log(event.target);
        var keycode = (event.keyCode ? event.keyCode : event.which);
        if(keycode == '13'){
            jQuery( ".fwp-submit" ).trigger( "click" );
        }
    }
});


// =============================


/*
Reference: http://jsfiddle.net/BB3JK/47/
*/

function customizeSelect() {
    $('select').each(function(){
        var $this = $(this), numberOfOptions = $(this).children('option').length;

        $this.addClass('select-hidden');
        $this.wrap('<div class="select"></div>');
        $this.after('<div class="select-styled"></div>');

        var $styledSelect = $this.next('div.select-styled');
        $styledSelect.text($this.children('option').eq(0).text());

        var $list = $('<ul />', {
            'class': 'select-options'
        }).insertAfter($styledSelect);

        for (var i = 0; i < numberOfOptions; i++) {
            $('<li />', {
                text: $this.children('option').eq(i).text(),
                rel: $this.children('option').eq(i).val()
            }).appendTo($list);
            //if ($this.children('option').eq(i).is(':selected')){
            //  $('li[rel="' + $this.children('option').eq(i).val() + '"]').addClass('is-selected')
            //}
        }

        var $listItems = $list.children('li');

        $styledSelect.click(function(e) {
            e.stopPropagation();
            $('div.select-styled.active').not(this).each(function(){
                $(this).removeClass('active').next('ul.select-options').hide();
            });
            $(this).toggleClass('active').next('ul.select-options').toggle();
        });

        $listItems.click(function(e) {
            e.stopPropagation();
            $styledSelect.text($(this).text()).removeClass('active');
            $this.val($(this).attr('rel'));
            $list.hide();
            //console.log($this.val());
        });

        $(document).click(function() {
            $styledSelect.removeClass('active');
            $list.hide();
        });

    });
}
// jQuery('.dropbtn').on('click', function(){
//     console.log(jQuery(this).next('.dropdown-content').find('.dropdown-item'))
// })
jQuery('.dropdown-item').on('click', function(){
    let btn_text = jQuery(this).text();
    console.log(jQuery(this).closest('.dropdown-content').siblings('.dropbtn'))
    jQuery(this).closest('.dropdown-content').siblings('.dropbtn').text(btn_text)
})



jQuery('select').each(function(){
    let options = $(this).children('option')
    console.log(options)
})


// setTimeout(customizeSelect, 1000)


// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {

    if (!event.target.matches('.dropbtn')) {

        var dropdowns = document.getElementsByClassName("dropdown-content");

        var i;
        for (i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            if (openDropdown.classList.contains('show')) {
                openDropdown.classList.remove('show');
            }
        }
    }
}
jQuery('.dropbtn').on('click', function(){
    let data_dropdown = jQuery(this).attr('data-dropdown')
    var dropdowns = document.querySelectorAll('.dropdown-content[data-dropdown="'+data_dropdown+'"]');
    jQuery('.dropdown-content').removeClass('show')
    jQuery(dropdowns).toggleClass('show')
})

// mobile filter
jQuery('.filter-button').on('click', function(){
    var panel = document.getElementById('global-search__filter');
    console.log(panel)
    if (panel.style.maxHeight) {
        jQuery(this).removeClass('active');
        panel.style.maxHeight = null;
        setTimeout(function(){panel.classList.remove('active')},200)

    } else {
        // panel.style.maxHeight = panel.scrollHeight + "px";
        jQuery(this).addClass('active');
        panel.classList.add('active');
        panel.style.height = "auto";
        panel.style.maxHeight = "2000px"
    }
})
///////////////////////////////////////// CLOSE MENU
jQuery('.navbar-toggler').on('click', function() {
    jQuery('body').addClass('hidden');
    jQuery('.shadow-screen').addClass('active');
})

function closeButton() {
    jQuery('.close_btn').on('click', function(){
        jQuery('.global-search__filter-mobile').removeClass('show');
        jQuery('.shadow-screen').removeClass('active');
        jQuery('body').removeClass('hidden');

    })
}

// // Speakers slider
// jQuery(document).ready(function(){
//     jQuery('.speakers-slider').slick({
//         arrows: true,
//         adaptiveHeight: true,
//         centerPadding: '10px',
//         responsive: [
//             {
//                 breakpoint: 992,
//                 settings: {
//                     dots: true,
//                     arrows: false,
//                 }
//             }
//             // You can unslick at a given breakpoint now by adding:
//             // settings: "unslick"
//             // instead of a settings object
//         ]
//         // appendArrows:'.speakers-slider__nav',
//         // prevArrow:'<span class="slider-arrow prev"></span>',
//         // nextArrow:'<span class="slider-arrow next"></span>'
//     });
// });


function initSpeakersSlider() {
    console.log('init speakers slider')
    jQuery('.speakers-slider').not('.slick-initialized').slick({
        arrows: true,
        adaptiveHeight: true,
        centerPadding: '10px',
        responsive: [
            {
                breakpoint: 992,
                settings: {
                    dots: true,
                    arrows: false,
                }
            }
        ]
    });

}
setTimeout(initSpeakersSlider, 1000);


// // Sticky to right sliders
//
// $('.rslider').slick({
//     // variableWidth: true,
//     slidesToShow: 3,
//     slidesToScroll: 1,
//     // autoplay: true,
//     autoplaySpeed: 2000,
//     centerMode: true,
//     // centerPadding: '16px',
//     adaptiveHeight: true,
//     arrows: true,
//     appendArrows:'.rslider_nav.slider-arrows',
//     prevArrow:'<span class="slider-arrow prev"></span>',
//     nextArrow:'<span class="slider-arrow next"></span>',
//     responsive: [
//         {
//             breakpoint: 992,
//             settings: {
//                 slidesToShow: 2,
//                 slidesToScroll: 1,
//                 centerMode: true,
//             }
//         },
//         {
//             breakpoint: 767,
//             settings: {
//                 slidesToShow: 2,
//                 slidesToScroll: 1,
//                 centerMode: false,
//                 centerPadding: false,
//             }
//         },
//         {
//             breakpoint: 580,
//             settings: {
//                 slidesToShow: 1,
//                 slidesToScroll: 1,
//                 centerMode: false,
//                 centerPadding: false,
//             }
//         }
//
//     ]
// });


//  Alignment heigh of similar blocks
function normalizeHeigh(data) {
    let data_height = jQuery('[data-height=' +  data + ']')

    let data_allHeight = [];
    data_height.each(function(elem){
        // console.log($(this).outerHeight())
        data_allHeight.push(parseInt($(this).outerHeight()));
    })
    slider1_maxHeight = Math.max.apply(Math, data_allHeight);
    jQuery('[data-height=' +  data + ']').css('min-height', slider1_maxHeight + 'px')
    // console.log(slider1_maxHeight);
}

jQuery(document).ready(function() {
    let data_arr = ['Hero2ColText', 'teamMemberName', 'teamMemberPosition'];

    for(i=0; i<=data_arr.length; i++) {
        normalizeHeigh(data_arr[i])
    }
})

jQuery( window ).on('load resize', function() {
    if (jQuery(window).width() > 768) {
        let data_arr = ['pageSidebarCol', 'multicolumnItem', 'partnersImage', 'partnersTitle', 'partnersDescription'];

        for(i=0; i<=data_arr.length; i++) {
            normalizeHeigh(data_arr[i])
        }
    } else {
        jQuery('[data-height=pageSidebarCol]').css('min-height', 'unset');
    }

})



// PRINT BUTTON

jQuery(document).ready(function(){
    jQuery('.print-button').on('click', function(){
        window.print();
    })
})

//////////////////////////////// Popup

jQuery('.popup_button').on('click', function () {
    jQuery(this).siblings(".popup-main-wrapper").addClass('popup_opened');
});

jQuery(document).on('click', '#popup_close_button, .popup_close_button', function () {
    jQuery(".popup-main-wrapper").removeClass('popup_opened');
});


///////////////// Preloader

jQuery(document).ready(function(){
    jQuery("#aigi-preloader").hide();
});

///////////////// Footnotes
function isValidHttpUrl(string) {
    let url;
    try {
        url = new URL(string);
    } catch (_) {
        return false;
    }
    return url.protocol === "http:" || url.protocol === "https:";
}

jQuery(document).ready(function(){
    let footnotes = jQuery('.modern-footnotes-footnote__note');

    footnotes.each(function(elem){

        let footnote = jQuery(this).get(0)

        let footnotes_text = '<div>Ref:  '+jQuery(this).html()+'</div>'
        let footnotes_number = '<span data-mfn="'+jQuery(this).attr('data-mfn')+'" class="footones_custom_prefix">['+jQuery(this).attr('data-mfn')+']</span>';

        // console.log(footnotes_text);
        // console.log(footnotes_number);
        jQuery('.footones_custom_wrapper').addClass('visible');
        jQuery('.footones_custom_list').append('<li>'+footnotes_number+''+footnotes_text+'</li>');
    })

    jQuery('.footones_custom_prefix').on('click', function(){
        let footnote_mfh = jQuery(this).attr('data-mfn');

        let footnote_top = jQuery('.modern-footnotes-footnote[data-mfn="'+footnote_mfh+'"]').offset().top;

        jQuery('body,html').animate({scrollTop: footnote_top-80}, 200);

    })
})



///////////////////// Toolkit Menu
jQuery('.toolkit-menu__link-arrow').on('click', function () {

    let toolkit_dropdown = jQuery(this).siblings(".toolkit-menu__submenu");
    if (toolkit_dropdown[0].style.maxHeight) {
        toolkit_dropdown[0].classList.remove('open');
        toolkit_dropdown[0].style.maxHeight = null;
        jQuery(this).removeClass('open');
    } else {
        toolkit_dropdown[0].classList.add('open');
        toolkit_dropdown[0].style.maxHeight = toolkit_dropdown[0].scrollHeight + "px";
        jQuery(this).addClass('open');
    }
    return false;
});


jQuery( window ).on('load resize', function() {
    if (jQuery(window).width() < 768) {

        jQuery('.toolkit-menu__mobile-button').on('click', function () {

            let toolkit_dropdown = jQuery(this).siblings(".toolkit-menu__list");
            if (toolkit_dropdown[0].style.maxHeight) {
                toolkit_dropdown[0].classList.remove('open');
                toolkit_dropdown[0].style.maxHeight = null;
                jQuery(this).removeClass('open');
            } else {
                toolkit_dropdown[0].classList.add('open');
                // toolkit_dropdown[0].style.maxHeight = toolkit_dropdown[0].scrollHeight + "px";
                toolkit_dropdown[0].style.maxHeight = "2000px";
                jQuery(this).addClass('open');
            }
        });

    }

})



// Breadcrumb


jQuery( window ).on('load resize', function() {
    if (jQuery(window).width() < 768) {

        let highlighted_img = jQuery('.highlighted-img');
        if (highlighted_img.length > 0) {
            let current_item = jQuery('.current-item').text();
            console.log(current_item.length)
            if (current_item.length > 20) {
                var trimmedString = current_item.substring(0, 15);
                trimmedString+= '...';
            }

            jQuery('.current-item').text(trimmedString);
        }

    }

})


jQuery('.generate_pdf').on('click', function(){
    let $data = jQuery('body').html();
     $data = '';
    // console.log($data);

    $.ajax({
        url: "/wp-admin/admin-ajax.php",
        type: "POST",
        // dataType: "JSON",
        data: {
            'action': 'aigi_create_pdf',
            // 'data': $data
        },
        cache: false,
        beforeSend: function(){

        },
        success: function(data) {
            console.log(data);

        },
        error:function (xhr, ajaxOptions, thrownError){
            console.log(xhr);
            console.log(ajaxOptions);
            console.log(thrownError);
        }
    });
})

$(document).ready(function(){
    $('.simplefavorite-button').on('click', function(){
        console.log('Клик прошел');
        if(!$(this).hasClass('active')){
            console.log('dont have active');
            $(".add-to-reading-list").fadeIn(1000);
            $(".add-to-reading-list").delay(2500).fadeOut(1000);
            $(".add-to-reading-list").find('div.resource-body').html($(this).closest('div.post-tile__content').find('div.post-tile__title').text());
        }
    })
    $('.close-reading-add').on('click', function(){
        $(".add-to-reading-list").fadeOut(1000);
    })
});