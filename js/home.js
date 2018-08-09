$(document).ready(function () {
    $(document).on('click',$(".paginationold"),function (event) {
        // alert(event.target.id);
        page=event.target.id;
        $.get("getPage.php", {page:page}, function (res) {
            $("#replacepagination").html(res);
        });
    });
    // $(".paginationold").on('click',function (){
    //
    // });


    $("#scroll").click(function() {
        $('html, body').animate({
            scrollTop: $("div#main").offset().top
        }, 100);
        $(".fixed").removeClass('hide');
        $(".home_main").css('margin-top', '200px');
    });

    $(window).scroll(function() {
        var top_of_element = $(".cover").offset().top;
        var bottom_of_element = $(".cover").offset().top + $(".cover").outerHeight();
        var bottom_of_screen = $(window).scrollTop() + window.innerHeight;
        var top_of_screen = $(window).scrollTop();

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
});
