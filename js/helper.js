$(document).ready(function () {
    $(document).on('click',".bar_arrow",function (event) {
        bar = $(this).parent().parent().children(".bar_text").toggleClass('hide');
        $(this).toggleClass('opened');
    });

    $(document).on('click',".button",function (event) {
        form_name = $(this).attr('id');
        form_name = form_name+'_register';
        $("div.karfarma_register").addClass('hide');
        $("div.karjoo_register").addClass('hide');
        $("div."+form_name).removeClass('hide');
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
