$(document).ready(function () {

    var top_of_element=0, bottom_of_element=1, bottom_of_screen=1, top_of_screen=0, zoom=1;
    $("#scroll").click(function() {
        $('html, body').animate({
            scrollTop: $("div#main").offset().top
        }, 100);
        $(".fixed").removeClass('hide');
        $(".home_main").css('margin-top', '200px');
    });

    $(window).scroll(function() {
        if (zoom>1.49)
            return ;
        top_of_element = $(".cover").offset().top;
        bottom_of_element = $(".cover").offset().top + $(".cover").outerHeight();
        bottom_of_screen = $(window).scrollTop() + window.innerHeight;
        top_of_screen = $(window).scrollTop();

        if((bottom_of_screen > top_of_element) && (top_of_screen < bottom_of_element)){
            // The element is visible, do something
            $(".fixed").addClass('hide');
            $(".home_main").css('margin-top', '100');
            $(".header").removeClass('headerfix');
        }
        else {
            $(".fixed").removeClass('hide');
            // $(".home_main").css('margin-top', '125px');
            $(".header").addClass('headerfix');
        }
    });

    $(window).resize(function() {
        $(window).trigger('zoom');
    });
    $(window).on('zoom', function() {
        // console.log('zoom', window.devicePixelRatio);
        zoom = window.devicePixelRatio;
        if (zoom > 1.49){
            $(".cover").addClass('hide');
            $(".fixed").removeClass('hide');
        }else{
            $(".cover").removeClass('hide');
            if((bottom_of_screen > top_of_element) && (top_of_screen < bottom_of_element)) {
                $(".fixed").addClass('hide');
            }
        }

    });
});