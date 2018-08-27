$(document).ready(function () {
    $(document).on('click touchstart',".bar",function (event) {
        bar = $(this).parent().children(".bar_text").toggleClass('hide');
        $(this).children(".bar_arrow").toggleClass('opened');
    });

    $(document).on('click touchstart',".show_side_menu",function (event) {
        $(".side_menu").removeClass('hide');
    });
    $('.side_menu').on('click touchstart', function(e) {
        if (e.target !== this)
            return;

        $(".side_menu").addClass('hide');
    });
});
