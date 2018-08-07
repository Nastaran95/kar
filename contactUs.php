<?php
/**
 * Created by PhpStorm.
 * User: maryam
 * Date: 8/5/2018
 * Time: 11:53 AM
 */
include "header.php";
?>

<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <link rel="stylesheet" href="css/bootstrap.css"/>
    <link rel="stylesheet" href="css/global.css"/>
    <link rel="stylesheet" href="css/contact.css"/>
    <script src="js/jQuery.js" ></script>
    <script src="js/helper.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY&callback=myMap"></script>
</head>
<body>
<div class ="container grayColor main">

    <h1 class="dark_text">تماس با ما</h1>
    <p class="dark_text" style="margin: 70px 50px;">
        اگر کارفرما یا کارجو هستید، به صورت زیر با ما ارتباط برقرار کنید
    </p>

    <div class="buttons">
        <span id="karfarma" class="button light_text col-md-4">کارفرما</span>
        <span id="karjoo" class="button light_text col-md-4">کارجو</span>
    </div>

    <div class="karfarma_register hide">
        <form id="karfarma">
            <input type="text" name="name" placeholder="نام و نام خانوادگی">
            <div><input type="number" name="id" placeholder="کد ملی">
            <input type="text" name="exam" placeholder="نام آزمون"></div>
            <div><input type="number" name="phone" placeholder="تلفن تماس">
            <input type="email" name="email" placeholder="ایمیل"></div>
            <textarea form="karfarma" rows="10" placeholder="متن شکایت و نظر"></textarea>
            <input type="submit" value="ارسال">
        </form>
    </div>

    <div class="karjoo_register hide">
        <form id="karjoo">
            <input type="text" name="company" placeholder="نام شرکت">
            <div><input type="text" name="subject" placeholder="موضوع درخواست">
                <input type="email" name="email" placeholder="ایمیل"></div>
            <div><input type="number" name="phone" placeholder="شماره تلفن">
                <input type="number" name="mobile" placeholder="شماره موبایل"></div>
            <textarea form="karjoo" rows="10" placeholder="متن درخواست"></textarea>
            <input type="submit" value="ارسال">
        </form>
    </div>

    <div class="communication_ways">
        <div class="item col-md-3">
            <img src="images/address.png" class="icon"/>
            <div class="info">
                <span class="way">آدرس</span>
                <span class="data">تهران - خیابان آزادی - دانشگاه صنعتی شریف</span>
            </div>
        </div>
        <div class="item col-md-3">
            <img src="images/telephone.png" class="icon"/>
            <div class="info">
                <span class="way">تلفن</span>
                <span class="data">02166666666</span>
            </div>
        </div>
        <div class="item col-md-3">
            <img src="images/fax.png" class="icon"/>
            <div class="info">
                <span class="way">فکس</span>
                <span class="data">02166666666</span>
            </div>
        </div>
        <div class="item col-md-3">
            <img src="images/mail.png" class="icon"/>
            <div class="info">
                <span class="way">ایمیل</span>
                <span class="data">info.karasa@gmail.com</span>
            </div>
        </div>
    </div>

    <div id="googleMap" style="width:100%;height:400px;"></div>

</div>

</body>

<script>
    function myMap() {
        var mapProp= {
            center:new google.maps.LatLng(51.508742,-0.120850),
            zoom:5,
        };
        var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
    }
</script>