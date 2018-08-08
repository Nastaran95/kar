var range, page, category;
$(document).ready(function() {
    range = $("#limit").find(":selected").text();
    type=$("input[name='type']").val();
    $.get("allblogpagination.php", {page:1, limit:range,type:type,query:"=====+++=====",category:"all"}, function (data, status) {
        $("#results").html(data);
    });
    //executes code below when user click on pagination links
    $("#results").on( "click", ".pagination a", function (e){
        e.preventDefault();
        $(".loading-div").show(); //show loading element
        page = $(this).attr("data-page"); //get page number from link
        $.get("allblogpagination.php", {page:page, limit:range,type:type,query:"=====+++=====",category:"all"}, function (data, status) {
            $(".loading-div").hide(); //show loading element
            $("#results").html(data);
        });

    });
    $(document).on('change','#limit',function(e){
        e.preventDefault();
        $(".loading-div").show(); //show loading element
        range = $("#limit").find(":selected").text();
        $.get("allblogpagination.php", {page:1, limit:range,type:type,query:"=====+++=====",category:"all"}, function (data, status) {
            $(".loading-div").hide(); //show loading element
            $("#results").html(data);
        });

    });
    $('#sarching').bind("enterKey",function(e){
        searchdata=$('#sarching').val();
        if (searchdata==""){
            searchdata="=====+++=====";
        }
        e.preventDefault();
        $(".loading-div").show(); //show loading element
        range = $("#limit").find(":selected").text();
        $.get("allblogpagination.php", {page:1, limit:range,type:type,query:searchdata,category:"all"}, function (data, status) {
            $(".loading-div").hide(); //show loading element
            $("#results").html(data);
        });
    });
    $(document).on('change','#dastebandi',function(e){
        searchdata=$('#sarching').val();
        if (searchdata==""){
            searchdata="=====+++=====";
        }
        e.preventDefault();
        $(".loading-div").show(); //show loading element
        range = $("#limit").find(":selected").text();
        category1 = $("#dastebandi").find(":selected").val();
        $.get("allblogpagination.php", {page:1, limit:range,type:type,query:searchdata,category:category1}, function (data, status) {
            $(".loading-div").hide(); //show loading element
            $("#results").html(data);
        });

    });
    $('#sarching').keyup(function(e){
        if(e.keyCode == 13)
        {
            $(this).trigger("enterKey");
        }
    });
});

function confirming() {
    return confirm('آیا از حذف این مورد مطمعن هستید؟');
}