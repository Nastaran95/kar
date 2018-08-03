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
});
