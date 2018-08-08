jQuery(document).ready(function($) {

    $('#login-form-link').click(function(e) {
        $("#login-form").delay(100).fadeIn(100);
        $("#register-form").fadeOut(100);
        $('#register-form-link').removeClass('active');
        $(this).addClass('active');
        e.preventDefault();
    });
    $('#register-form-link').click(function(e) {
        $("#register-form").delay(100).fadeIn(100);
        $("#login-form").fadeOut(100);
        $('#login-form-link').removeClass('active');
        $(this).addClass('active');
        e.preventDefault();
    });

    $('#phoneNo').keypress(function (e) {
        //if the letter is not digit then display error and don't type anything
        if (e.which !== 8 && e.which !== 0 && (e.which < 48 || e.which > 57)) {
            //display error message
            $("#errmsg1").html("لطفا فقط عدد انگلیسی وارد کنید.").show().fadeOut("slow");
            return false;
        }
    });

    $('#MobileNo').keypress(function (e) {
        //if the letter is not digit then display error and don't type anything
        if (e.which !== 8 && e.which !== 0 && (e.which < 48 || e.which > 57)) {
            //display error message
            $("#errmsg2").html("لطفا فقط عدد انگلیسی وارد کنید.").show().fadeOut("slow");
            return false;
        }
    });

    $('#zipcode').keypress(function (e) {
        //if the letter is not digit then display error and don't type anything
        if (e.which !== 8 && e.which !== 0 && (e.which < 48 || e.which > 57)) {
            //display error message
            $("#errmsg3").html("لطفا فقط عدد انگلیسی وارد کنید.").show().fadeOut("slow");
            return false;
        }
    });
    loadprovince();
    $(".province").change(function(){
        $(".city").addClass( "TEMPSHAHR" );
        loadCity($(this).val());
    });
});

function validateEmail(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}

function validateForm() {
    var time=0;
    if(document.getElementById("names").value.length===0){
        $("#names").addClass( "BORDERCOLOR" );
        time=time+1;
    }else{
        $("#names").removeClass( "BORDERCOLOR" );
    }
    // if(document.getElementById("family").value.length===0){
    //     document.getElementById("errmsgall2").innerHTML ="الزامی";
    //     time=time+1;
    // }else{
    //     document.getElementById("errmsgall2").innerHTML ="";
    // }
    if(document.getElementById("emails").value.length===0){
        $("#emails").addClass( "BORDERCOLOR" );
        time=time+1;
    }else{
        $("#emails").removeClass( "BORDERCOLOR" );
        if (!validateEmail(document.getElementById("emails").value)){
            document.getElementById("errmsgall3").innerHTML ="فرمت ایمیل وارد شده صحیح نمی باشد.";
            time=time+1;
        }
    }
    if(document.getElementById("phoneNo").value.length===0){
        $("#phoneNo").addClass( "BORDERCOLOR" );
        time=time+1;
    }else{
        $("#phoneNo").removeClass( "BORDERCOLOR" );
    }
    if(document.getElementById("MobileNo").value.length===0){
        $("#MobileNo").addClass( "BORDERCOLOR" );
        time=time+1;
    }else{
        $("#MobileNo").removeClass( "BORDERCOLOR" );
    }
    // if(document.getElementById("address").value.length===0){
    //     document.getElementById("errmsgall6").innerHTML ="الزامی";
    //     time=time+1;
    // }else{
    //     document.getElementById("errmsgall6").innerHTML ="";
    // }
    if(document.getElementById("firstpassword").value.length===0){
        $("#firstpassword").addClass( "BORDERCOLOR" );
        time=time+1;
    }else{
        $("#firstpassword").removeClass( "BORDERCOLOR" );
    }
    if(document.getElementById("secondpassword").value.length===0){
        $("#secondpassword").addClass( "BORDERCOLOR" );
        time=time+1;
    }else{
        $("#secondpassword").removeClass( "BORDERCOLOR" );
    }
    if((document.getElementById("firstpassword").value.length!==0)&&(document.getElementById("secondpassword").value.length!==0)){
        if (document.getElementById("firstpassword").value!==document.getElementById("secondpassword").value){
            document.getElementById("errmsgall8").innerHTML ="پسوردهای وارد شده یکسان نمی باشند.";
            time=time+1;
        }else {
            if (document.getElementById("firstpassword").value.length<8){
                document.getElementById("errmsgall8").innerHTML ="طول پسورد حداقل باید 8 کاراکتر باشد.";
                time=time+1;
            }else {
                document.getElementById("errmsgall8").innerHTML ="";
            }
        }
    }else{
        time=time+1;
    }
    if (time<=0){
        $('#registersubmitpp').click(function(){
            $('#registersubmitpp').prop('disabled', true);
        });
    }
    return time <= 0;
}

function validateFormLogin() {
    var time=0;
    if(document.getElementById("usernamelogin").value.length===0){
        $("#usernamelogin").addClass( "BORDERCOLOR" );
        time=time+1;
    }else{
        $("#usernamelogin").removeClass( "BORDERCOLOR" );
    }
    if(document.getElementById("passwordLogin").value.length===0){
        $("#passwordLogin").addClass( "BORDERCOLOR" );
        time=time+1;
    }else{
        $("#usernamelogin").addClass( "BORDERCOLOR" );
    }
    return time <= 0;
}
function validateFormverify() {
    var time=0;
    if(document.getElementById("verifymobile").value.length===0){
        document.getElementById("errmsgall10").innerHTML ="الزامی";
        time=time+1;
    }else{
        document.getElementById("errmsgall10").innerHTML ="";
    }
    if(document.getElementById("CODE").value.length===0){
        document.getElementById("errmsgall11").innerHTML ="الزامی";
        time=time+1;
    }else{
        document.getElementById("errmsgall11").innerHTML ="";
    }
    return time <= 0;
}
function validateFormgetcode() {
    var time=0;
    if(document.getElementById("getcode").value.length===0){
        document.getElementById("errmsgall10").innerHTML ="الزامی";
        time=time+1;
    }else{
        document.getElementById("errmsgall10").innerHTML ="";
    }
    return time <= 0;
}


function loadprovince() {
    selectValues = {"استان":"استان","آذربایجان‌شرقی":"آذربایجان شرقی","آذربایجان‌غربی":"آذربایجان غربی","اردبیل":"اردبیل","اصفهان":"اصفهان","البرز":"البرز","ایلام":"ایلام",
        "بوشهر":"بوشهر","تهران":"تهران","چهارمحال‌و‌بختیاری":"چهارمحال و بختیاری","خراسان‌جنوبی":"خراسان جنوبی","خراسان‌رضوی":"خراسان رضوی","خراسان‌شمالی":"خراسان شمالی","خوزستان":"خوزستان",
        "زنجان":"زنجان","سمنان":"سمنان","سیستان‌و‌بلوچستان":"سیستان و بلوچستان","فارس":"فارس","قزوین":"قزوین","قم":"قم","کردستان":"کردستان",
        "کرمان":"کرمان","کرمانشاه":"کرمانشاه","کهکیلویه‌و‌بویراحمد":"کهگیلویه و بویراحمد","گلستان":"گلستان","گیلان":"گیلان","لرستان":"لرستان","مازندران":"مازندران",
        "مرکزی":"مرکزی","هرمزگان":"هرمزگان","همدان":"همدان","یزد":"یزد"};

    $.each(selectValues, function (key, value) {
        $('.province')
            .append($("<option></option>")
                .attr("value", key)
                .text(value));
    });
}

//Load city for selete
function loadCity(province){
    $(".TEMPSHAHR").find('option').remove();
    switch (province) {
        case "آذربایجان‌شرقی":
            var selectValues = {"آذرشهر":"آذرشهر","اسکو":"اسکو","اهر":"اهر","بستان‌آباد":"بستان‌آباد","بناب":"بناب","تبریز":"تبریز","جلفا":"جلفا","چاراویماق":"چاراویماق","سراب":"سراب","شبستر":"شبستر","عجب‌شیر":"عجب‌شیر","کلیبر":"کلیبر","مراغه":"مراغه","مرند":"مرند","ملکان":"ملکان","میانه":"میانه","ورزقان":"ورزقان","هریس":"هریس","هشترود":"هشترود"};
            break;
        case "آذربایجان‌غربی":
            var selectValues = {"ارومیه":"ارومیه","اشنویه":"اشنویه","بوکان":"بوکان","پیرانشهر":"پیرانشهر","تکاب":"تکاب","چالدران":"چالدران","خوی":"خوی","سردشت":"سردشت","سلماس":"سلماس","شاهین‌دژ":"شاهین‌دژ","ماکو":"ماکو","مهاباد":"مهاباد","میاندوآب":"میاندوآب","نقده":"نقده"};
            break;
        case "اردبیل":
            var selectValues = {"اردبیل":"اردبیل","بیله‌سوار":"بیله‌سوار","پارس‌آباد":"پارس‌آباد","خلخال":"خلخال","کوثر":"کوثر","گرمی":"گرمی","مشگین شهر":"مشگین شهر","نمین":"نمین","نیر":"نیر"};
            break;
        case "اصفهان":
            var selectValues = {"آران و بیدگل":"آران و بیدگل","اردستان":"اردستان","اصفهان":"اصفهان","برخوردار و میمه":"برخوردار و میمه","تیران و کرون":"تیران و کرون","چادگان":"چادگان","خمینی‌شهر":"خمینی‌شهر","خوانسار":"خوانسار","سمیرم":"سمیرم","شهرضا":"شهرضا","سمیرم سفلی":"سمیرم سفلی","فریدن":"فریدن","فریدون‌شهر":"فریدون‌شهر","فلاورجان":"فلاورجان","کاشان":"کاشان","گلپایگان":"گلپایگان","لنجان":"لنجان","مبارکه":"مبارکه","نائین":"نائین","نجف‌آباد":"نجف‌آباد","نطنز":"نطنز"};
            break;
        case "البرز":
            var selectValues = {"ساوجبلاغ":"ساوجبلاغ","طالقان":"طالقان","کرج":"کرج","نظرآباد":"نظرآباد"};
            break;
        case "ایلام":
            var selectValues = {"آبدانان":"آبدانان","ایلام":"ایلام","ایوان":"ایوان","دره‌شهر":"دره‌شهر","دهلران":"دهلران","شیروان و چرداول":"شیروان و چرداول","مهران":"مهران"};
            break;
        case "بوشهر":
            var selectValues = {"بوشهر":"بوشهر","تنگستان":"تنگستان","جم":"جم","دشتستان":"دشتستان","دشتی":"دشتی","دیر":"دیر","دیلم":"دیلم","کنگان":"کنگان","گناوه":"گناوه"};
            break;
        case "تهران":
            var selectValues = {"ورامین":"ورامین","فیروزکوه":"فیروزکوه","شهریار":"شهریار","شمیرانات":"شمیرانات","ری":"ری","رباط‌کریم":"رباط‌کریم","دماوند":"دماوند","تهران":"تهران","پاکدشت":"پاکدشت","اسلام‌شهر":"اسلام‌شهر"};
            break;
        case "چهارمحال‌و‌بختیاری":
            var selectValues = {"اردل":"اردل","بروجن":"بروجن","شهرکرد":"شهرکرد","فارسان":"فارسان","کوهرنگ":"کوهرنگ","لردگان":"لردگان"};
            break;
        case "خراسان‌جنوبی":
            var selectValues = {"بیرجند":"بیرجند","درمیان":"درمیان","سرایان":"سرایان","سربیشه":"سربیشه","فردوس":"فردوس","قائنات":"قائنات","نهبندان":"نهبندان"};
            break;
        case "خراسان‌رضوی":
            var selectValues = {"بردسکن":"بردسکن","تایباد":"تایباد","تربت جام":"تربت جام","تربت حیدریه":"تربت حیدریه","چناران":"چناران","خلیل‌آباد":"خلیل‌آباد","خواف":"خواف","درگز":"درگز","رشتخوار":"رشتخوار","سبزوار":"سبزوار","سرخس":"سرخس","فریمان":"فریمان","قوچان":"قوچان","کاشمر":"کاشمر","کلات":"کلات","گناباد":"گناباد","مشهد":"مشهد","مه ولات":"مه ولات","نیشابور":"نیشابور"};
            break;
        case "خراسان‌شمالی":
            var selectValues = {"اسفراین":"اسفراین","بجنورد":"بجنورد","جاجرم":"جاجرم","شیروان":"شیروان","فاروج":"فاروج","مانه و سملقان":"مانه و سملقان"};
            break;
        case "خوزستان":
            var selectValues = {"آبادان":"آبادان","امیدیه":"امیدیه","اندیمشک":"اندیمشک","اهواز":"اهواز","ایذه":"ایذه","باغ‌ملک":"باغ‌ملک","بندر ماهشهر":"بندر ماهشهر","بهبهان":"بهبهان","خرمشهر":"خرمشهر","دزفول":"دزفول","دشت آزادگان":"دشت آزادگان","رامشیر":"رامشیر","رامهرمز":"رامهرمز","شادگان":"شادگان","شوش":"شوش","شوشتر":"شوشتر","گتوند":"گتوند","لالی":"لالی","مسجد سلیمان":"مسجد سلیمان","هندیجان":"هندیجان"};
            break;
        case "زنجان":
            var selectValues = {"ابهر":"ابهر","ایجرود":"ایجرود","خدابنده":"خدابنده","خرمدره":"خرمدره","زنجان":"زنجان","طارم":"طارم","ماه‌نشان":"ماه‌نشان"};
            break;
        case "سمنان":
            var selectValues = {"دامغان":"دامغان","سمنان":"سمنان","شاهرود":"شاهرود","گرمسار":"گرمسار","مهدی‌شهر":"مهدی‌شهر"};
            break;
        case "سیستان‌و‌بلوچستان":
            var selectValues = {"ایرانشهر":"ایرانشهر","چابهار":"چابهار","خاش":"خاش","دلگان":"دلگان","زابل":"زابل","زاهدان":"زاهدان","زهک":"زهک","سراوان":"سراوان","سرباز":"سرباز","کنارک":"کنارک","نیک‌شهر":"نیک‌شهر"};
            break;
        case "فارس":
            var selectValues = {"آباده":"آباده","ارسنجان":"ارسنجان","استهبان":"استهبان","اقلید":"اقلید","بوانات":"بوانات","پاسارگاد":"پاسارگاد","جهرم":"جهرم","خرم‌بید":"خرم‌بید","خنج":"خنج","داراب":"داراب","زرین‌دشت":"زرین‌دشت","سپیدان":"سپیدان","شیراز":"شیراز","فراشبند":"فراشبند","فسا":"فسا","فیروزآباد":"فیروزآباد","قیر و کارزین":"قیر و کارزین","کازرون":"کازرون","لارستان":"لارستان","لامرد":"لامرد","مرودشت":"مرودشت","ممسنی":"ممسنی","مهر":"مهر","نی‌ریز":"نی‌ریز"};
            break;
        case "قزوین":
            var selectValues = {"آبیک":"آبیک","البرز":"البرز","بوئین‌زهرا":"بوئین‌زهرا","تاکستان":"تاکستان","قزوین":"قزوین"};
            break;
        case "قم":
            var selectValues = {"قم":"قم"};
            break;
        case "کردستان":
            var selectValues = {"بانه":"بانه","بیجار":"بیجار","دیواندره":"دیواندره","سروآباد":"سروآباد","سقز":"سقز","سنندج":"سنندج","قروه":"قروه","کامیاران":"کامیاران","مریوان":"مریوان"};
            break;
        case "کرمان":
            var selectValues = {"بافت":"بافت","بردسیر":"بردسیر","بم":"بم","جیرفت":"جیرفت","راور":"راور","رفسنجان":"رفسنجان","رودبار جنوب":"رودبار جنوب","زرند":"زرند","سیرجان":"سیرجان","شهر بابک":"شهر بابک","عنبرآباد":"عنبرآباد","قلعه گنج":"قلعه گنج","کرمان":"کرمان","کوهبنان":"کوهبنان","کهنوج":"کهنوج","منوجان":"منوجان"};
            break;
        case "کرمانشاه":
            var selectValues = {"اسلام‌آباد غرب":"اسلام‌آباد غرب","پاوه":"پاوه","ثلاث باباجانی":"ثلاث باباجانی","جوانرود":"جوانرود","دالاهو":"دالاهو","روانسر":"روانسر","سرپل ذهاب":"سرپل ذهاب","سنقر":"سنقر","صحنه":"صحنه","قصر شیرین":"قصر شیرین","کرمانشاه":"کرمانشاه","کنگاور":"کنگاور","گیلان غرب":"گیلان غرب","هرسین":"هرسین"};
            break;
        case "کهکیلویه‌و‌بویراحمد":
            var selectValues = {"بویراحمد":"بویراحمد","بهمئی":"بهمئی","دنا":"دنا","کهگیلویه":"کهگیلویه","گچساران":"گچساران"};
            break;
        case "گلستان":
            var selectValues = {"آزادشهر":"آزادشهر","آق‌قلا":"آق‌قلا","بندر گز":"بندر گز","ترکمن":"ترکمن","رامیان":"رامیان","علی‌آباد":"علی‌آباد","کردکوی":"کردکوی","کلاله":"کلاله","گرگان":"گرگان","گنبد کاووس":"گنبد کاووس","مراوه‌تپه":"مراوه‌تپه","مینودشت":"مینودشت"};
            break;
        case "گیلان":
            var selectValues = {"آستارا":"آستارا","آستانه":"آستانه","اشرفیه":"اشرفیه","املش":"املش","بندر انزلی":"بندر انزلی","رشت":"رشت","رضوانشهر":"رضوانشهر","رودبار":"رودبار","رودسر":"رودسر","سیاهکل":"سیاهکل","شفت":"شفت","صومعه‌سرا":"صومعه‌سرا","طوالش":"طوالش","فومن":"فومن","لاهیجان":"لاهیجان","لنگرود":"لنگرود","ماسال":"ماسال"};
            break;
        case "لرستان":
            var selectValues = {"ازنا":"ازنا","الیگودرز":"الیگودرز","بروجرد":"بروجرد","پل‌دختر":"پل‌دختر","خرم‌آباد":"خرم‌آباد","دورود":"دورود","دلفان":"دلفان","سلسله":"سلسله","کوهدشت":"کوهدشت"};
            break;
        case "مازندران":
            var selectValues = {"آمل":"آمل","بابل":"بابل","بابلسر":"بابلسر","بهشهر":"بهشهر","تنکابن":"تنکابن","جویبار":"جویبار","چالوس":"چالوس","رامسر":"رامسر","ساری":"ساری","سوادکوه":"سوادکوه","قائم‌شهر":"قائم‌شهر","گلوگاه":"گلوگاه","محمودآباد":"محمودآباد","نکا":"نکا","نور":"نور","نوشهر":"نوشهر"};
            break;
        case "مرکزی":
            var selectValues = {"آشتیان":"آشتیان","اراک":"اراک","تفرش":"تفرش","خمین":"خمین","دلیجان":"دلیجان","زرندیه":"زرندیه","ساوه":"ساوه","شازند":"شازند","کمیجان":"کمیجان","محلات":"محلات"};
            break;
        case "هرمزگان":
            var selectValues = {"ابوموسی":"ابوموسی","بستک":"بستک","بندر عباس":"بندر عباس","بندر لنگه":"بندر لنگه","جاسک":"جاسک","حاجی‌آباد":"حاجی‌آباد","خمیر":"خمیر","رودان":"رودان","قشم":"قشم","گاوبندی":"گاوبندی","میناب":"میناب"};
            break;
        case "همدان":
            var selectValues = {"اسدآباد":"اسدآباد","بهار":"بهار","تویسرکان":"تویسرکان","رزن":"رزن","کبودرآهنگ":"کبودرآهنگ","ملایر":"ملایر","نهاوند":"نهاوند","همدان":"همدان"};
            break;
        case "یزد":
            var selectValues = {"ابرکوه":"ابرکوه","اردکان":"اردکان","بافق":"بافق","تفت":"تفت","خاتم":"خاتم","صدوق":"صدوق","طبس":"طبس","مهریز":"مهریز","میبد":"میبد","یزد":"یزد"};
            break;
        case "":
            var selectValues = {"":""}

    }
    $.each( selectValues , function (key, value) {
        $(".TEMPSHAHR")
            .append($("<option></option>")
                .attr("value", key)
                .text(value));
    });
    $(".TEMPSHAHR").removeClass("TEMPSHAHR");
}