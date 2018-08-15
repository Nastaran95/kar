$(document).ready(function () {
    $(document).on('click',".paginationoldAzmun",function (event) {
        // alert(event.target.id);
        page=event.target.id;
        $.get("getPage.php", {page:page , typ:1}, function (res) {
            $("#replacepagination").html(res);
        });
    });

    $(document).on('click',".paginationoldNews",function (event) {
        // alert(event.target.id);
        page=event.target.id;
        $.get("getPage.php", {page:page , typ:2}, function (res) {
            $("#replacepagination").html(res);
        });
    });

    $(document).on('click',".paginationoldBlogs",function (event) {
        // alert(event.target.id);
        page=event.target.id;
        $.get("getPage.php", {page:page , typ:3}, function (res) {
            $("#replacepagination").html(res);
        });
    });



    // $(".paginationold").on('click',function (){
    //
    // });

});
