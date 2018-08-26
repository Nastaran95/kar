<?php
/**
 * Created by PhpStorm.
 * User: maryam
 * Date: 8/5/2018
 * Time: 11:53 AM
 */

$productXMLNAME = "/XMLs/allBlogs.xml";
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

include "/Settings.php";

?>


<?php

if (isset($_GET['request']))
    if($_GET['request']=='karfarma') {
        if(isset($_POST['company']) && isset($_POST['subject']) && isset($_POST['matn']) && strlen($_POST['matn'])>0 ){
            $company = $_POST['company'];
            $subject = $_POST['subject'];
            if(isset($_POST['email'])){
                $mail = $_POST['email'];
            }
            if(isset($_POST['phone'])){
                $phone = $_POST['phone'];
            }
            if(isset($_POST['mobile'])){
                $mobile = $_POST['mobile'];
            }
            $matn = $_POST['matn'];
            $stmt  = $connection->prepare("INSERT INTO karfarma_request (company,subject,email,phone,mobile ,matn)  VALUES (?,?,?,?,?,?)");
            $stmt->bind_param("ssssss", $company, $subject, $mail, $phone, $mobile, $matn);
            $result = $stmt->execute();
            $stmt->store_result();
            $result = $stmt->get_result();
            if ($connection->error) {
//                echo "<script>alert('عملیات موفقیت آمیز نبود. لطفا دوباره امتحان کنید.');</script>";
                echo '<META HTTP-EQUIV="Refresh" Content="0; URL=contactUs.php?result=namovafagh">';
            }else{
//                echo "<script>alert('درخواست شما با موفقیت ثبت شد.');</script>";
                echo '<META HTTP-EQUIV="Refresh" Content="0; URL=contactUs.php?result=movafagh">';
            }
        }
        else{
//            echo "<script>alert('به موارد الزامی دقت کنید.');</script>";
            echo '<META HTTP-EQUIV="Refresh" Content="0; URL=contactUs.php?result=namovafagh">';
        }
    }else if($_GET['request']=='karjoo'){
        if(isset($_POST['name']) && isset($_POST['azmun']) && isset($_POST['matn']) && strlen($_POST['matn'])>0 ){
            $name = $_POST['name'];
            $azmun = $_POST['azmun'];
            if(isset($_POST['email'])){
                $mail = $_POST['email'];
            }
            if(isset($_POST['phone'])){
                $phone = $_POST['phone'];
            }
            if(isset($_POST['personalID'])){
                $personal = $_POST['id'];
            }
            $matn = $_POST['matn'];
            $stmt  = $connection->prepare("INSERT INTO karjoo_request (name,azmun,email,phone,personalID ,matn)  VALUES (?,?,?,?,?,?)");
            $stmt->bind_param("ssssss", $name, $azmun, $mail, $phone, $personal, $matn);
            $result = $stmt->execute();
            $stmt->store_result();
            $result = $stmt->get_result();
            if ($connection->error) {
//                echo "<script>alert('عملیات موفقیت آمیز نبود. لطفا دوباره امتحان کنید.');</script>";
                echo '<META HTTP-EQUIV="Refresh" Content="0; URL=contactUs.php?result=namovafagh">';
            }else{
//                echo "<script>alert('نظر شما با موفقیت ثبت شد.');</script>";
                echo '<META HTTP-EQUIV="Refresh" Content="0; URL=contactUs.php?result=movafagh">';
            }
        }else{
//            echo "<script>alert('به موارد الزامی دقت کنید.');</script>";
            echo '<META HTTP-EQUIV="Refresh" Content="0; URL=contactUs.php?result=namovafagh">';
        }
    }else{
        // invalid
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
    <link rel="stylesheet" href="/css/contact.css"/>
    <script src="/js/jQuery.js" ></script>
    <script src="/js/helper.js"></script>
    <script src="/js/contact.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY&callback=myMap"></script>
</head>


<body>
<?php
include "/header.php";
?>
<?php

if(isset($_GET['result'])){
    if ($_GET['result'] == 'movafagh'){
        echo "<script>alert('نظر شما با موفقیت ثبت شد.');</script>";
    }else{
        echo "<script>alert('عملیات موفقیت آمیز نبود. لطفا دوباره امتحان کنید.');</script>";
    }
}

?>
<div class ="container grayColor main">
    <div class="row">
        <br/>
        <div class="col-md-12">
    <h1 class="col-md-12 subj">تماس با ما</h1>
    <p class="dark_text tozih">
        اگر کارفرما یا کارجو هستید، به صورت زیر با ما ارتباط برقرار کنید
    </p>

    <div class="buttons col-md-12 col-xs-12">
        <div id="karfarma" class="button light_text col-md-4 col-md-offset-1 col-xs-12 ">کارفرما</div>
        <div id="karjoo" class="button light_text col-md-4 col-md-offset-1 col-xs-12">کارجو</div>
    </div>

    <div class="karfarma_register col-md-9 col-md-offset-1 hide">
        <div class="show_res hide">به موارد الزامی دقت کنید.</div>
        <form id="karfarma" action="contactUs.php?request=karfarma" method="post" onsubmit="return validateForm_karfarma()">
            <input type="text" id="company_farma" name="company" placeholder="نام شرکت">
            <div><input type="text" id="subject_farma" name="subject" placeholder="موضوع درخواست">
                <input type="email" id="mail_farma" name="email" placeholder="ایمیل"></div>
            <div><input type="number" id="phone_farma" name="phone" placeholder="شماره تلفن">
                <input type="number" id="mobile_farma" name="mobile" placeholder="شماره موبایل"></div>
            <textarea rows="10" id="matn_farma" name="matn" placeholder="متن درخواست"></textarea>
            <input type="submit" value="ارسال" class="cntct">
        </form>
    </div>

    <div class="karjoo_register col-md-9 col-md-offset-1 hide">
        <div class="show_res hide">به موارد الزامی دقت کنید.</div>
        <form id="karjoo" action="contactUs.php?request=karjoo" method="post" onsubmit="return validateForm_karjoo()">
            <input type="text" id="name_joo" name="name" placeholder="نام و نام خانوادگی">
            <div><input type="number" id="id_joo" name="id" placeholder="کد ملی">
                <input type="text" id="azmun_joo" name="azmun" placeholder="نام آزمون"></div>
            <div><input type="number" id="phone_joo" name="phone" placeholder="تلفن تماس">
                <input type="email" id="mail_joo" name="email" placeholder="ایمیل"></div>
            <textarea rows="10" id="matn_joo" name="matn" placeholder="متن شکایت و نظر"></textarea>
            <input type="submit" value="ارسال" class="cntct">
        </form>
    </div>

    <div class="communication_ways">
        <div class="item col-md-3 col-xs-12">
            <img src="/images/address.png" class="icon"/>
            <div class="info">
                <span class="way">آدرس</span>
                <span class="data">تهران - خیابان آزادی - دانشگاه صنعتی شریف</span>
            </div>
        </div>
        <div class="item col-md-3 col-xs-12">
            <img src="/images/telephone.png" class="icon"/>
            <div class="info">
                <span class="way">تلفن</span>
                <span class="data">02166666666</span>
            </div>
        </div>
        <div class="item col-md-3 col-xs-12">
            <img src="/images/fax.png" class="icon"/>
            <div class="info">
                <span class="way">فکس</span>
                <span class="data">02166666666</span>
            </div>
        </div>
        <div class="item col-md-3 col-xs-12">
            <img src="/images/mail.png" class="icon"/>
            <div class="info">
                <span class="way">ایمیل</span>
                <span class="data">info.karasa@gmail.com</span>
            </div>
        </div>
    </div>

<!--    <div id="googleMap" style="width:100%;height:400px;"></div>-->
            <div class="mapouter">
                <div class="gmap_canvas">
                    <iframe width="100%" height="100%" id="gmap_canvas" src="https://maps.google.com/maps?q=sharif%20university&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
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