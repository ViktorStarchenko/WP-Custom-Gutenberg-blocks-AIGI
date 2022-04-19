$(document).ready(function(){

    console.log($('.favor-sorted-posts').attr('data-paged'));

    function readCookie(name) {
        let name_cook = name + "=";
        let spl = document.cookie.split(";");
        for (let i = 0; i < spl.length; i++) {
            let c = spl[i];
            while (c.charAt(0) == " ") {
                c = c.substring(1, c.length);
            }
            if (c.indexOf(name_cook) == 0) {
                return c.substring(name_cook.length, c.length);
            }
        }
        return null;
    }

    function writeCookie(name, val, expires) {
        var date = new Date;
        date.setDate(date.getDate() + expires);
        document.cookie = name+"="+val+"; path=/; expires=" + date.toUTCString();
    }

    $('.sorting-wish-selector').on('change', function(){
        let sorted_val = $(this).find(':selected').val();
        console.log(sorted_val)
        let sorted_order = '';

        if(sorted_val === 'newes'){
            writeCookie('sortType', 'newes');
            sorted_order = -1;
        } else if(sorted_val === 'oldest'){
            writeCookie('sortType', 'oldest');
            sorted_order = 1;
        } else if(sorted_val === 'relevance'){
            writeCookie('sortType', 'relevance');
            sorted_order = -1;
        }

        jQuery.ajax({
            url: '/wp-admin/admin-ajax.php',
            type: 'POST',
            data: {
                value_by : sorted_val,
                page: $('.favor-sorted-posts').attr('data-paged'),
                action: 'sort_favourites',
                contentType: "application/json; charset=utf-8"
            },
            success: function (data) {
                let json = JSON.parse(data);
                $('.favor-sorted-posts').html(json.posts_new);
            }
        });

        // $('.post-tile__wrap[data-date]').sort(function (a, b) {
        //     let x = parseInt($(a).data('date'), 10);
        //     let y = parseInt($(b).data('date'), 10);
        //     return (x < y ? -1: 1) * sorted_order;
        // }).appendTo('.favor-sorted-posts');
    });
});