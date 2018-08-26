<?php
/**
 * Created by PhpStorm.
 * User: maryam
 * Date: 8/6/2018
 * Time: 10:17 PM
 */

include "/header.php";
?>

<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <link rel="stylesheet" href="/css/bootstrap.css"/>
    <link rel="stylesheet" href="/css/global.css"/>
    <link rel="stylesheet" href="/css/login.css"/>
    <script src="/js/jQuery.js" ></script>
    <script src="/js/helper.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<div class ="login_background">
    <div class="submenu">
        <ul>
            <li>اصلاح اطلاعات ثبت شده</li>
            <li>پیگیری و مشاهده اطلاعات ثبت شده</li>
            <li>فراموشی کد پیگیری</li>
        </ul>
    </div>
    <div class="section">
        <div class="section_title">
            <i class="fa fa-circle"></i>
            <h2>ثبت نام در آزمون</h2>
        </div>
        <form id="exam_login">
            <input type="text" name="id" placeholder="کد ملی">
            <input type="text" name="id2" placeholder="شماره شناسنامه">
            <div class="captcha">

            </div>
            <input type="checkbox" name="condition">
            <input type="submit" value="شروع ثبت نام">
        </form>
    </div>
</div>

</body>
