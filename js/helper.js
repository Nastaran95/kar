$(document).ready(function () {
    $(document).on('click',".item",function (event) {
        bar = $(this).children(".bar_text").toggleClass('hide');
        $(this).children(".bar").children(".bar_arrow").toggleClass('opened');
    });

    $(document).on('click',".show_side_menu",function (event) {
        $(".side_menu").removeClass('hide');
    });
    $('.side_menu').on('click', function(e) {
        if (e.target !== this)
            return;

        $(".side_menu").addClass('hide');
    });
});
