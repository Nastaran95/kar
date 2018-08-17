$(document).ready(function () {
    $(document).on('click',".paginationoldAzmun",function (event) {
        // alert(event.target.id);
        page=event.target.id;
        $.get("getPage.php", {page:page , typ:1}, function (res) {
            $("#replacepagination").html(res);
            window.scrollTo(0, 0);
        });
    });

    $(document).on('click',".paginationoldNews",function (event) {
        // alert(event.target.id);
        page=event.target.id;
        $.get("getPage.php", {page:page , typ:2}, function (res) {
            $("#replacepagination").html(res);
            window.scrollTo(0, 0);
        });
    });

    $(document).on('click',".paginationoldBlogs",function (event) {
        // alert(event.target.id);
        page=event.target.id;
        $.get("getPage.php", {page:page , typ:3}, function (res) {
            $("#replacepagination").html(res);
            window.scrollTo(0, 0);
        });
    });

    $(document).on('click',".paginationoldInterviews",function (event) {
        // alert(event.target.id);
        page=event.target.id;
        $.get("getPage.php", {page:page , typ:4}, function (res) {
            $("#replacepagination").html(res);
            window.scrollTo(0, 0);
        });
    });

    $(document).on('click',".paginationoldBooks",function (event) {
        // alert(event.target.id);
        page=event.target.id;
        $.get("getPage.php", {page:page , typ:5}, function (res) {
            $("#replacepagination").html(res);
            window.scrollTo(0, 0);
        });
    });


});
