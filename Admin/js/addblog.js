$(document).ready(function() {

    $(".btn-success").click(function () {
        if (confirm('آیا از انجام این کار مطمئین هستید؟')) {
            $("#editor122").val($('#edit').froalaEditor('html.get'));
        }
    });
    $(".btn-successeditfooter").click(function () {
        if (confirm('آیا از انجام این کار مطمئین هستید؟')) {
            $("#editor1").val($('#edit1').froalaEditor('html.get'));
            $("#editor4").val($('#edit4').froalaEditor('html.get'));
        }
    });
    $(".btn-successmainpage").click(function () {
        if (confirm('آیا از انجام این کار مطمئین هستید؟')) {
            $("#editor1").val($('#edit1').froalaEditor('html.get'));
            $("#editor2").val($('#edit2').froalaEditor('html.get'));
            $("#editor3").val($('#edit3').froalaEditor('html.get'));
            $("#editor4").val($('#edit4').froalaEditor('html.get'));
            $("#editor5").val($('#edit5').froalaEditor('html.get'));
            $("#editor6").val($('#edit6').froalaEditor('html.get'));
            $("#editor7").val($('#edit7').froalaEditor('html.get'));
            $("#editor8").val($('#edit8').froalaEditor('html.get'));
            $("#editor9").val($('#edit9').froalaEditor('html.get'));
        }
    });
    var feedbackseodesc = parseInt($('#seodesc').attr('maxlength'));
    $('#feedbackseodesc').html(feedbackseodesc + ' کاراکتر باقی مانده ');
    $('#seodesc').keyup(function() {
        var text_length = $('#seodesc').val().length;
        var text_remaining = feedbackseodesc - text_length;


        $('#feedbackseodesc').html(text_remaining + ' کاراکتر باقی مانده ');
    });

    var feedbackseokeyword = parseInt($('#seokeyword').attr('maxlength'));
    $('#feedbackseokeyword').html(feedbackseokeyword + ' کاراکتر باقی مانده ');
    $('#seokeyword').keyup(function() {
        var text_length = $('#seokeyword').val().length;
        var text_remaining = feedbackseokeyword - text_length;

        $('#feedbackseokeyword').html(text_remaining + ' کاراکتر باقی مانده ');
    });

    var feedbackseotitle = parseInt($('#seotitle').attr('maxlength'));
    $('#feedbackseotitle').html(feedbackseotitle + ' کاراکتر باقی مانده ');
    $('#seotitle').keyup(function() {
        var text_length = $('#seotitle').val().length;
        var text_remaining = feedbackseokeyword - text_length;

        $('#feedbackseotitle').html(text_remaining + ' کاراکتر باقی مانده ');
    });

});

function getmydataseoblogs() {
    $("#editor1").val($('#edit').froalaEditor('html.get'));
}

function getEditFooterdata() {
    $("#editor1").val($('#edit1').froalaEditor('html.get'));
    $("#editor2").val($('#edit2').froalaEditor('html.get'));
    $("#editor3").val($('#edit3').froalaEditor('html.get'));
    $("#editor4").val($('#edit4').froalaEditor('html.get'));
}
function countChar(val) {
    var len = val.value.length;
    if (len >= 149) {
        val.value = val.value.substring(0, 149);
    } else {
        $('#charNum').text("تعداد کاراکتر باقیمانده"+(149 - len));
    }
};

function validateFormdata(tab){
    var time=0;
    if(document.getElementById("topic").value.length===0){
        $("#topic").addClass( "BORDERCOLOR" );
        time=time+1;
    }else{
        $("#topic").removeClass( "BORDERCOLOR" );
    }
    if(document.getElementById("englishtopic").value.length===0){
        $("#englishtopic").addClass( "BORDERCOLOR" );
        time=time+1;
    }else{
        SETTOPIC=document.getElementById("englishtopic").value;
        if (document.getElementById("hiddentopic").value!=SETTOPIC){
            $.ajax({
                type: 'GET',
                url: 'CheckUniqueIDBLOG.php',
                success: function (data, status) {
                    if(data=="0"){
                        time=time+1;
                        $("#englishtopic").addClass( "BORDERCOLOR" );
                        $("#englishtopicerror").html("عنوان وارد شده یکتا نیست!");
                    }else{
                        $("#englishtopicerror").html("");
                        $("#englishtopic").removeClass( "BORDERCOLOR");
                    }
                },
                data: {ID:SETTOPIC , Table:tab},
                async: false
            });
        }else {
            $("#englishtopicerror").html("");
            $("#englishtopic").removeClass( "BORDERCOLOR");
        }
    }
    if(document.getElementById("MOkhtasar").value.length===0){
        $("#MOkhtasar").addClass( "BORDERCOLOR" );
        time=time+1;
    }else{
        $("#MOkhtasar").removeClass( "BORDERCOLOR" );
    }
    if(document.getElementById("editor122").value.length===0){
        $("#getred").addClass( "BORDERCOLOR" );
        time=time+1;
    }else{
        $("#getred").removeClass( "BORDERCOLOR" );
    }
    if (document.getElementById("files").files.length == 0){
        var myElem = document.getElementById('forcheck');
        if (myElem!=null){
            if (document.getElementById("forcheck").src.length==0){
                $("#files").addClass( "BORDERCOLOR" );
                time=time+1;
            }else{
                $("#files").removeClass( "BORDERCOLOR" );
            }
        }else{
            $("#files").addClass( "BORDERCOLOR" );
            time=time+1;
        }
    }else{
        $("#files").removeClass( "BORDERCOLOR" );
    }
    if($('#dastebandi').val()=='هیچی'){
        $("#dastebandi").addClass( "BORDERCOLOR" );
        time=time+1;
    }else {
        $("#dastebandi").removeClass( "BORDERCOLOR" );
    }
    if (time>0){
        $('#showerror').text("به موارد الزامی دقت کنید.");
    }


    return time <= 0;
}
