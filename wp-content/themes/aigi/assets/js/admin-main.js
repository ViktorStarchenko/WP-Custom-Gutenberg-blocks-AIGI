////////////////////////// ACCORDION

jQuery(document).ready(function(){
    jQuery('body').on('click', function(e){

        if (e.target.classList.contains('accordion_btn')) {

            e.target.classList.toggle('active');
            var panel = e.target.nextElementSibling;
            console.log(e.target);
            if (panel.style.maxHeight) {
                panel.classList.remove('active');
                panel.style.maxHeight = null;
            } else {
                panel.classList.add('active');
                panel.style.maxHeight = panel.scrollHeight + 'px';
            }

        }
    })
});


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
                    // console.log(issetSrc)
                    var src = jQuery(this).attr('data-src');
                    jQuery(this).attr('src', src);
                    jQuery(this).attr('data-issetSrc', true)
                }

                jQuery('.video-poster[data-video="' + data + '"]').hide()
                jQuery(this).removeClass('paused');
                jQuery(this).get(0).play();
                jQuery(this).prop("controls",true)
            }
            if (jQuery(video[elem]).attr('data-video')) {
                // $(this).removeClass('paused');
                // $(this).get(0).play();
            }

        })
        jQuery('.video-poster[data-video="' + data + '"]').hide()
        jQuery(video_button_wrap).hide()

        jQuery(video_pause_wrap).addClass('visible')
        // $('.video-button-wrap').hide()
        // $('.video-pause-wrap').addClass('visible')
    })

    jQuery('.video-pause-wrap').on('click', function () {
        var data = jQuery(this).attr('data-video');
        // console.log(data)
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


