$(document).ready(function () {
    $(document).on('click',".bar_arrow",function (event) {
        bar = $(this).parent().parent().children(".bar_text").toggleClass('hide');
        $(this).toggleClass('opened');
    });
});
