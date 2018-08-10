<?php
/**
 * Created by PhpStorm.
 * User: HamidReza
 * Date: 8/9/2018
 * Time: 12:27 AM
 */
?>
<nav class="navbar navbar-inverse navbar-fixed-top pull-right" role="navigation">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">منو</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="admin.php">پنل ادمین</a>
    </div>
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul id="active" class="nav navbar-nav side-nav">
            <li class="<?php if ($which==1) echo "selected";?>"><a href="admin.php"><i class="fa fa-bullseye"></i> داشبورد </a></li>
            <li class="<?php if ($which==2) echo "selected";?>"><a href="addblog.php"><i class="fa fa-tasks"></i> افزودن بلاگ </a></li>
            <li class="<?php if ($which==3) echo "selected";?>"><a href="allblog.php"><i class="fa fa-tasks"></i> همه بلاگ ها </a></li>
            <li class="<?php if ($which==4) echo "selected";?>"><a href="addbook.php"><i class="fa fa-globe"></i> افزودن کتاب </a></li>
            <li class="<?php if ($which==5) echo "selected";?>"><a href="allbook.php"><i class="fa fa-globe"></i> همه کتاب ها </a></li>
            <li class="<?php if ($which==6) echo "selected";?>"><a href="addAzmun.php"><i class="fa fa-list-ol"></i> افزون آزمون </a></li>
            <li class="<?php if ($which==7) echo "selected";?>"><a href="allAzmun.php"><i class="fa fa-list-ol"></i> همه آزمون ها </a></li>
            <li class="<?php if ($which==8) echo "selected";?>"><a href="addNews.php"><i class="fa fa-list-alt"></i> افزودن خبر ویژه </a></li>
            <li class="<?php if ($which==9) echo "selected";?>"><a href="allNews.php"><i class="fa fa-list-alt"></i> همه خبرهای ویژه </a></li>
            <li class="<?php if ($which==12) echo "selected";?>"><a href="addCustomer.php"><i class="fa fa-file"></i> افزودن مشتری </a></li>
            <li class="<?php if ($which==13) echo "selected";?>"><a href="allCustomer.php"><i class="fa fa-file"></i> همه مشتری ها </a></li>
            <li class="<?php if ($which==10) echo "selected";?>"><a href="addmosahebe.php"><i class="fa fa-dedent"></i> افزودن مصاحبه فردی </a></li>
            <li class="<?php if ($which==11) echo "selected";?>"><a href="allmosahebe.php"><i class="fa fa-dedent"></i> همه مصاحبه های فردی </a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right navbar-user">
            <li class="dropdown user-dropdown">
                <a href="./logout.php"><i class="fa fa-power-off"></i> خروج </a>
            </li>
        </ul>
    </div>
</nav>
