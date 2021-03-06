<?php
/**
 * Created by PhpStorm.
 * User: maryam
 * Date: 8/4/2018
 * Time: 7:13 PM
 */

$productXMLNAME = "XMLs/aboutus.xml";
if (file_exists($productXMLNAME)) {
    $XMLFile = simplexml_load_file($productXMLNAME);
    $SEOdescription=$XMLFile->description;
    $SEOKEYWORDS=$XMLFile->kewords;
    $SEOTITLE=$XMLFile->seotitle;
}else{
    $SEOdescription="";
    $SEOKEYWORDS="";
    $SEOTITLE="";
}
?>


<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <title><?php echo $SEOTITLE?></title>
    <meta name="description" content="<?php echo $SEOdescription;?>">
    <meta name="keywords" content="<?php echo $SEOKEYWORDS;?>">
    <meta property="og:type" content="website">
    <meta property="og:title" content="<?php echo $SEOTITLE?>">
    <meta property="og:description" content="<?php echo $SEOdescription;?>">
    <meta property="og:url" content="http://www.karasa.ir/">
    <meta property="og:site_name" content="کارآسا">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <link rel="icon" type="image/x-icon" href="/images/favicon.ico" />


    <link rel="stylesheet" href="/css/bootstrap.css"/>
    <link rel="stylesheet" href="/css/global.css"/>
    <link rel="stylesheet" href="/css/home.css"/>
    <link rel="stylesheet" href="/css/helper.css"/>
    <script src="/js/jQuery.js" ></script>
    <script src="/js/helper.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<?php
include "/header.php";
?>
<div class ="container grayColor main" id="main">
<div class="row">
    <div class="col-md-12">
            <h1 class="col-md-12 subj">درباره ما</h1>
            <p class="dark_text tozih">
                گروه مدیریت تجاری و توسعه کسب و کار مرکز مطالعات تكنولوژي دانشگاه صنعتي شريف (کارآسا) به عنوان بازوی اجرایی مرکز مطالعات دانشگاه صنعتی شریف با بیش از ده سال سابقه مشاوره، آموزش و پژوهش در جهت کمک به تامین، جذب، آموزش و نگه داشت نیروی انسانی سازمان ها، نهادها، صنایع و شرکت ها، خدمات زیر را ارائه می دهد.
            </p>

            <div class="opening_bars">
                <div class="item">
                    <div id="bar_1" class="bar"> برگزاری آزمون استخدامی<span id="arrow_1" class="bar_arrow"></span></div>
                    <div id="text_1" class="bar_text hide">جذب و استخدام عبارت است از فرآیند جستجو و جذب کردن کاندیداهای شایسته برای موقعیت های شغلی موجود و یا به وجود آمده در سازمان، به نحوی که هر دو طرف بتوانند برای طرف مقابل سودمند باشند. آنچه همواره در جذب و استخدام منابع انسانی مورد پرسش بوده است روش انجام دادن این پروسه می باشد. نظر به پیشرفت علم و افزایش رشد دانش آموختگان در سطح جامعه در مقابل پست های محدود بلا تصدی جهت جذب افراد جویای کار و به منظور رعایت عدالت استخدامی و انتصاب افراد اصلح به نظر می رسد بهترین روش انجام مراحل جذب نیروی انسانی برگزاری آزمون استخدامی می باشد.</div>
                </div>
                <div class="item">
                    <div id="bar_2" class="bar">انجام مصاحبه تخصصی<span class="bar_arrow"/> </div>
                    <div class="bar_text hide">مصاحبه يكي از مهم ترين مراحل فرآيند استخدام است كه بيشتر كارفرمايان و سازمان هاي استخدامي بر انجام آن اصرار دارند. هدف از مصاحبه، دادن فرصتي به مصاحبه كننده (استخدام كننده يا كارفرما ) براي ارزيابي مهارت ها و قابليت های استخدام شونده و نیز برای کارجو و استخدام شونده جهت نمایش مهارت ها و قابلیت های خود می باشد. این واحد در جهت تکمیل فرآیند جذب نیروی انسانی برگزار کننده مصاحبه های تخصصی می باشد. پرسش هايي كه در اين قبيل مصاحبه ها پرسيده مي شود، معمولابه گونه اي طراحي مي شوند تا منعكس كننده مهارت ها و قابليت هايي باشند كه كارفرما به دنبال آنهاست.</div>
                </div>
                <div class="item">
                    <div id="bar_3" class="bar">انجام مصاحبه روانشناختی<span class="bar_arrow"/> </div>
                    <div class="bar_text hide">واحد کارآسا فعال، در زمینه برگزاری مصاحبه های روانشناختی برای مشاغل مختلف و در سطوح مختلف سازمان می باشد. برخی از آزمون هایی که این واحد برگزار می کند عبارتند از:</div>
                </div>
                <div class="item">
                    <div id="bar_4" class="bar">جذب از طریق رزومه<span class="bar_arrow" /></div>
                    <div class="bar_text hide">یکی دیگر از روش های تامین نیروی انسانی مورد نیاز سازمان ها جذب از طریق ارسال رزومه می باشد. که فرآیند روش به شکل زیر می باشد:

                        بررسی و استخراج رزومه ها و مطابقت با نیازها
                        ارزشیابی اولیه کارجویان به صورت حضوری
                        ارسال رزومه به کارفرما به همراه نمرات ارزشیابی
                        اطلاع رسانی رزومه های تایید شده به کارآسا توسط کارفرما
                        ارسال افراد تایید شده به همراه معرفی نامه از کارآسا</div>
                </div>
            </div>
            </div>

        </div>
</div>

<?php
include '/Footer.php';
?>

</body>
</html>