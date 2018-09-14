<?php
/**
 * Created by PhpStorm.
 * post_type page va post
 * User: HamidReza
 */
session_start();
include '../Settings.php';
include 'Parsedown.php';
if ($_SESSION['type']>8) {

    if (isset($_GET['type'])) {
        $type = $_GET['type'];
    } elseif (isset($_POST['type'])) {
        $type = $_POST['type'];
    } else {
        $type = 1;
    }
    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>افزودن آزمون</title>

        <link rel="stylesheet" href="../css/oldcss.css">
        <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" />
        <link rel="stylesheet" type="text/css" href="css/local.css" />

        <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
        <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="../froala/css/froala_editor.css">
        <link rel="stylesheet" href="../froala/css/froala_style.css">
        <link rel="stylesheet" href="../froala/css/plugins/code_view.css">
        <link rel="stylesheet" href="../froala/css/plugins/colors.css">
        <link rel="stylesheet" href="../froala/css/plugins/emoticons.css">
        <link rel="stylesheet" href="../froala/css/plugins/image.css">
        <link rel="stylesheet" href="../froala/css/plugins/line_breaker.css">
        <link rel="stylesheet" href="../froala/css/plugins/table.css">
        <link rel="stylesheet" href="../froala/css/plugins/char_counter.css">
        <link rel="stylesheet" href="../froala/css/plugins/video.css">
        <link rel="stylesheet" href="../froala/css/plugins/fullscreen.css">
        <link rel="stylesheet" href="../froala/css/plugins/file.css">
        <link rel="stylesheet" href="../froala/css/plugins/quick_insert.css">
        <link rel="stylesheet" href="../css/codemirror.min.css">
        <link rel="stylesheet" href="css/kamadatepicker.css">
        <link href="css/addblog.css" rel="stylesheet">
        <script src="js/addblog.js"></script>
        <script src="js/kamadatepicker.js"></script>
        <style>
            table{
                color: #000000;}
        </style>
    </head>
    <body dir="rtl">
    <?php

    if (isset($_GET['product'])) {
        $product = $_GET['product'];
    } else
        $product = "all";
    if ($product == "namovafagh"){
        $product = "all";
    }

    if ((isset($_POST['editor1'])) && (isset($_POST['topic'])) && (isset($_POST['englishtopic'])) && (strlen($_POST['editor1']) > 0) && (strlen($_POST['topic']) > 0) && (strlen($_POST['englishtopic']) > 0)) {
//        echo "<script>window.alert('pr $product');</script>";
        $writer = new XMLWriter();
        if ($product === "all") {
            $name = (string)uniqid().uniqid();
        } else {
            $query = "SELECT * FROM azmun WHERE ID='$product'";
            $result = $connection->query($query);
            if ($result->num_rows > 0) {
                $row = mysqli_fetch_assoc($result);
            }
            $productXMLNAME = $row['xmlAdress'];
            if (file_exists($productXMLNAME)) {
                $produc = simplexml_load_file($productXMLNAME);
                $name = $produc->code;
            }
        }
        $writer->openMemory();
        $writer->setIndent(true);
        $writer->startDocument('1.0" encoding="UTF-8');
        $writer->startElement('azmun');
        $writer->writeElement('code', $name);
        $writer->writeElement('name', $_POST['topic']);
        $titleshould=$_POST['topic'];
        $englishtopic = $_POST['englishtopic'];
        $englishtopic=str_replace(" ","-",$englishtopic);
        $CITy="";
        foreach ($_POST['ostan'] as $XXX) {
            $writer->writeElement('shahr', $XXX);
            if (strlen($CITy)==0)
                $CITy=$XXX;
            else
                $CITy=$CITy.",".$XXX;
        }
        $filename = '../XMLs/azmuns/' . $name . '.xml';

        $uploadOk = 0;
        $URL = "";
        $writer->writeElement('data', $_POST['editor1']);
        $datashould=$_POST['editor1'];

        if(isset($_POST['dateAzmun'])){
            $dateAzmun = $_POST['dateAzmun'];
        }
        if(isset($_POST['dateKart'])){
            $dateKart = $_POST['dateKart'];
        }
        if(isset($_POST['dateNatayej'])){
            $dateNatayej = $_POST['dateNatayej'];
        }
        if(isset($_POST['dateNatayejNahayi'])){
            $dateNatayejNahayi = $_POST['dateNatayejNahayi'];
        }
        if(isset($_POST['dateMosahebe'])){
            $dateMosahebe = $_POST['dateMosahebe'];
        }
        if(isset($_POST['state'])){
            $state = (int)$_POST['state'];
        }
        if(isset($_POST['typeAzmun'])){
            $azmuntype = (int)$_POST['typeAzmun'];
        }

        $description="";
        if (isset($_POST['seodesc'])) {
            $writer->writeElement('description', $_POST['seodesc']);
            $description=$_POST['seodesc'];
        }
        $kewords="";
        if (isset($_POST['seokeyword'])) {
            $writer->writeElement('kewords', $_POST['seokeyword']);
            $kewords=$_POST['seokeyword'];
        }
        $titleseo="";
        if (isset($_POST['seotitle'])) {
            $writer->writeElement('seotitle', $_POST['seotitle']);
            $titleseo=$_POST['seotitle'];
        }
        $writer->endElement();
        $writer->endDocument();
        $file = $writer->outputMemory();
        file_put_contents($filename, $file);
        $topic = $_POST['topic'];
        date_default_timezone_set("Iran");
        $modified_time=date('Y-m-d H:i:s');
        // date_default_timezone_set('Asia/Tehran');

//        $now = new DateTime();
//
//        $formatter = new IntlDateFormatter(
//            "fa_IR@calendar=persian",
//            IntlDateFormatter::FULL,
//            IntlDateFormatter::FULL,
//            'Asia/Tehran',
//            IntlDateFormatter::TRADITIONAL,
//            "yyyy/MM/dd");
//        $DATE= tr_num($formatter->format($now));
//        $x = explode("/",$DATE);
//        $y = explode("/",$dateAzmun);
//        if((int)$y[0]>=(int)$x[0]){
//            if((int)$y[1]>=(int)$x[1]){
//                if((int)$y[2]>=(int)$x[2]){
//                    $active=1;
//                }else{
//                    $active=2;
//                }
//            }else{
//                $active=2;
//            }
//        }else{
//            $active=2;
//        }

        if ($product === "all") {
//            echo "<script>window.alert('insert db');</script>";
            $stmt  = $connection->prepare("INSERT INTO azmun (xmlAdress,title, dateAzmun, dateKart, dateNatayej,dateNatayejNahayi,dateMosahebe,englishName,typ, state, realtime , ostan)  VALUES (?,?,?,?,?,?,?,?,?,?,?,?)");
            $stmt->bind_param("ssssssssssss", $filename,$topic,$dateAzmun,$dateKart,$dateNatayej,$dateNatayejNahayi,$dateMosahebe,$englishtopic,$azmuntype,$state, $modified_time , $CITy);
        } else {
//            echo "<script>window.alert('update db');</script>";
            $stmt  = $connection->prepare("UPDATE azmun SET xmlAdress=?,title=?,dateAzmun=?, dateKart=?,dateNatayej=?,dateNatayejNahayi=?,dateMosahebe=?,englishName=?,typ=?,state=?,realtime=?,ostan=? WHERE ID='$product'");
            $stmt->bind_param("ssssssssssss", $filename,$topic,$dateAzmun,$dateKart,$dateNatayej,$dateNatayejNahayi,$dateMosahebe,$englishtopic,$azmuntype,$state,$modified_time,$CITy);
        }
        $result = $stmt->execute(); //execute() tries to fetch a result set. Returns true on succes, false on failure.
        $stmt->store_result();
        $result = $stmt->get_result();
        if ($product === "all") {
            $product =$connection->insert_id;
        }
        $movafagh = 'عملیات مورد نظر با موفقیت انجام شد.';

        if ($connection->error) {
            $movafagh = 'عملیات مورد نظر موفق نبود. وارد کردن تمامی موارد الزامی است.';
            $product="namovafagh";
            if (isset($_POST['topic'])){
                $titleshould=$_POST['topic'];
            }
            if (isset($_POST['editor1'])){
                $datashould=$_POST['editor1'];
            }

            if (isset($_POST['seodesc'])){
                $description=$_POST['seodesc'];
            }
            if (isset($_POST['seotitle'])){
                $titleseo=$_POST['seotitle'];
            }
            if (isset($_POST['seokeyword'])){
                $kewords=$_POST['seokeyword'];
            }
        }else{
            echo "<script>alert('عملیات مورد نظر موفقیت آمیز بود.');</script>";
            echo '<META HTTP-EQUIV="Refresh" Content="0; URL=addAzmun.php?product='.$product.'&type='.$type.'">';
        }
    } elseif ((isset($_POST['editor1'])) && (isset($_POST['topic'])) ) {
//        echo "<script>window.alert('2');</script>";
        $movafagh = 'عملیات مورد نظر موفق نبود. وارد کردن تمامی موارد الزامی است.';
        $product="namovafagh";
        if (isset($_POST['topic'])){
            $titleshould=$_POST['topic'];
        }
        if (isset($_POST['editor1'])){
            $datashould=$_POST['editor1'];
        }

        if (isset($_POST['seodesc'])){
            $description=$_POST['seodesc'];
        }
        if (isset($_POST['seotitle'])){
            $titleseo=$_POST['seotitle'];
        }
        if (isset($_POST['seokeyword'])){
            $kewords=$_POST['seokeyword'];
        }

    } else {
//        echo "<script>window.alert('3');</script>";
        $movafagh = '';
    }
    ?>
    <div id="wrapper">
        <?php
        $which=6;
        include 'adminmenue.php';
        $query = "SELECT * FROM azmun WHERE ID='$product'";
        $result = $connection->query($query);
        if ($result->num_rows > 0) {
            $row = mysqli_fetch_assoc($result);
        }
        $tempvar = 0;
        $tempvar2 = 0;
        if ($product === "all") {
            $URL = "addAzmun.php";
        } else {
            $URL = "addAzmun.php?product=$product";
        }
        $URL2 = "allAzmun.php?type=$type";
        $englishtopic="";
        if ($product=="namovafagh"){

//            echo "<script>window.alert('set1');</script>";
        } else if ($product !== "all") {
//            echo "<script>window.alert('set2');</script>";
            $query = "SELECT * FROM azmun WHERE ID='$product'";
            $result = $connection->query($query);
            if ($result->num_rows > 0) {
                $row = mysqli_fetch_assoc($result);
            }
            $productXMLNAME = $row['xmlAdress'];
            if (file_exists($productXMLNAME)) {
                $produc = simplexml_load_file($productXMLNAME);
                $name = $produc->code;
                $titleshould = $produc->name;
                $datashould = $produc->data;
                $description = $produc->description;
                $kewords = $produc->kewords;
                $titleseo = $produc->seotitle;
            }
            $englishtopic=$row['englishName'];
            $dateAzmun=$row['dateAzmun'];
            $dateKart=$row['dateKart'];
            $dateNatayej=$row['dateNatayej'];
            $dateNatayejNahayi=$row['dateNatayejNahayi'];
            $dateMosahebe=$row['dateMosahebe'];
            $typ = $row['typ'];
            $stat =$row['state'];
            $city = $row['ostan'];
        } else {
//            echo "<script>window.alert('set3');</script>";
            $datashould = "";
            $titleshould = "";
            $description = "";
            $kewords = "";
            $titleseo = "";
            $englishtopic="";
        }
        ?>

        <form action="<?php echo $URL ?>" method="post" enctype="multipart/form-data" onsubmit="return validateFormdata(4)">

            <div id="X-wrapper">
                <div class="container2">
                    <div class="row">
                        <div class="block"><?php echo $movafagh ?></div>
                        <div class="block">
                            <div class="">
                                <div class="">عنوان: (حداکثر 300 کاراکتر)</div>
                                <br/>
                                <input id="topic" name="topic" type="text" class="width700" placeholder="عنوان" maxlength="300" class="inlineblock"
                                       value="<?php echo $titleshould; ?>"/>
                            </div>
                        </div>
                        <div class="block">
                            <div class="">
                                <br/>
                                <div class="">عنوان انگلیسی یکتا: (حداکثر 300 کاراکتر به هیچ عنوان از اسپیس درون این بخش استفاده نشود)</div>
                                <input id="englishtopic" name="englishtopic" type="text" class="width700" placeholder="عنوان انگلیسی یکتا" maxlength="300" class="inlineblock"
                                       value="<?php echo $englishtopic; ?>"/>
                                <div id="englishtopicerror"></div>
                                <input type="text" name="hiddentopic" id="hiddentopic" hidden value="<?php echo $englishtopic; ?>">
                            </div>
                        </div>
                        <div class="block">
                            <div class="">
                                <br/>
                                <div class="">زمان برگزاری آزمون</div>
                                <input id="tarikhAzmun" name="dateAzmun" type="text" class="width700" maxlength="300" class="inlineblock" value="<?php echo $dateAzmun; ?>"/>

                            </div>
                        </div>
                        <div class="block">
                            <div class="">
                                <br/>
                                <div class="">زمان دریافت کارت</div>
                                <input id="tarikhKart" name="dateKart" type="text" class="width700" maxlength="300" class="inlineblock" value="<?php echo $dateKart; ?>"/>

                            </div>
                        </div>
                        <div class="block">
                            <div class="">
                                <br/>
                                <div class="">زمان اعلام نتایج اولیه</div>
                                <input id="tarikhNatayej" name="dateNatayej" type="text" class="width700" maxlength="300" class="inlineblock" value="<?php echo $dateNatayej; ?>"/>

                            </div>
                        </div>
                        <div class="block">
                            <div class="">
                                <br/>
                                <div class="">زمان مصاحبه</div>
                                <input id="tarikhMosahebe" name="dateMosahebe" type="text" class="width700" maxlength="300" class="inlineblock" value="<?php echo $dateMosahebe; ?>"/>

                            </div>
                        </div>
                        <div class="block">
                            <div class="">
                                <br/>
                                <div class="">زمان اعلام نتایج نهایی</div>
                                <input id="tarikhNatayejNahayi" name="dateNatayejNahayi" type="text" class="width700" maxlength="300" class="inlineblock" value="<?php echo $dateNatayejNahayi; ?>"/>

                            </div>
                        </div>
                        <div class="block">
                            <div class="">
                                <br/>
                                <div class="">نوع آزمون</div>
                                <input id="stateAzmun" name="state" value="1" type="radio" maxlength="300" class="inlineblock" <?php if($stat==1) echo " checked";?>/>فعال
                                <input id="stateAzmun" name="state" value="2" type="radio" maxlength="300" class="inlineblock" <?php if($stat==2) echo " checked";?>/>غیرفعال

                            </div>
                        </div>
                        <div class="block">
                            <div class="">
                                <br/>
                                <div class="">نوع آزمون</div>
                                <input id="typeAzmun" name="typeAzmun" value="1" type="radio" maxlength="300" class="inlineblock" <?php if($typ==1) echo " checked";?>/>جاری
                                <input id="typeAzmun" name="typeAzmun" value="2" type="radio" maxlength="300" class="inlineblock" <?php if($typ==2) echo " checked";?>/>گذشته

                            </div>
                        </div>
                        <div class="block">
                            <div class="col-md-6 pull-right">
                                <label for="ostan" class="loginFormElement">استان برگزاری:</label>
                                <select id="ostan" class="form-control bfh-states" name="ostan[]" multiple >
                                    <option value="0" >تمامی استان ها</option>
                                    <option  value="تهران" <?php if (strpos($city, 'تهران') !== false) echo ' selected'; ?>  >تهران </option>
                                    <option  value="البرز"  <?php if (strpos($city, 'البرز') !== false) echo ' selected'; ?>  >البرز</option>
                                    <option  value="آذربایجان غربی"  <?php if (strpos($city, 'آذربایجان غربی') !== false) echo ' selected'; ?>  >آذربایجان غربی</option><option value="اردبیل">اردبیل</option>
                                    <option  value="بوشهر"  <?php if (strpos($city, 'بوشهر') !== false) echo ' selected'; ?>  >بوشهر</option>
                                    <option  value="چهار محال بختیاری" <?php if (strpos($city, 'چهار محال بختیاری') !== false) echo ' selected'; ?>  >چهار محال بختیاری</option>
                                    <option  value="آذربایجان شرقی" <?php if (strpos($city, 'آذربایجان شرقی') !== false) echo ' selected'; ?>  >آذربایجان شرقی</option>
                                    <option  value="اصفهان" <?php if (strpos($city, 'اصفهان') !== false) echo ' selected'; ?>  >اصفهان</option>
                                    <option  value="فارس" <?php if (strpos($city, 'فارس') !== false) echo ' selected'; ?>  >فارس</option>
                                    <option  value="گیلان" <?php if (strpos($city, 'گیلان') !== false) echo ' selected'; ?>  >گیلان</option>
                                    <option  value="گلستان" <?php if (strpos($city, 'گلستان') !== false) echo ' selected'; ?>  >گلستان</option>
                                    <option  value="همدان" <?php if (strpos($city, 'همدان') !== false) echo ' selected'; ?>  >همدان</option>
                                    <option  value="هرمزگان" <?php if (strpos($city, 'هرمزگان') !== false) echo ' selected'; ?>  >هرمزگان</option>
                                    <option  value="ایلام" <?php if (strpos($city, 'ایلام') !== false) echo ' selected'; ?>  >ایلام</option>
                                    <option  value="کهگیلویه و بویراحمد" <?php if (strpos($city, 'کهگیلویه و بویراحمد') !== false) echo ' selected'; ?>  >کهگیلویه و بویراحمد</option>
                                    <option  value="کرمان" <?php if (strpos($city, 'کرمان') !== false) echo ' selected'; ?>  >کرمان</option>
                                    <option  value="کردستان" <?php if (strpos($city, 'کردستان') !== false) echo ' selected'; ?>  >کردستان</option>
                                    <option value="کرمانشاه" <?php if (strpos($city, 'کرمانشاه') !== false) echo ' selected'; ?>  >کرمانشاه</option>
                                    <option value="خوزستان" <?php if (strpos($city, 'خوزستان') !== false) echo ' selected'; ?>  >خوزستان</option>
                                    <option value="لرستان" <?php if (strpos($city, 'لرستان') !== false) echo ' selected'; ?>  >لرستان</option>
                                    <option value="مرکزی" <?php if (strpos($city, 'مرکزی') !== false) echo ' selected'; ?>  >مرکزی</option>
                                    <option value="مازندران" <?php if (strpos($city, 'مازندران') !== false) echo ' selected'; ?>  >مازندران</option>
                                    <option value="خراسان شمالی" <?php if (strpos($city, 'خراسان شمالی') !== false) echo ' selected'; ?>  >خراسان شمالی</option>
                                    <option value="قزوین" <?php if (strpos($city, 'قزوین') !== false) echo ' selected'; ?>  >قزوین</option>
                                    <option value="قم" <?php if (strpos($city, 'قم') !== false) echo ' selected'; ?>  >قم</option>
                                    <option value="خراسان رضوی" <?php if (strpos($city, 'خراسان رضوی') !== false) echo ' selected'; ?>  >خراسان رضوی</option>
                                    <option value="سیستان و بلوچستان" <?php if (strpos($city, 'سیستان و بلوچستان') !== false) echo ' selected'; ?>  >سیستان و بلوچستان</option>
                                    <option value="خراسان جنوبی" <?php if (strpos($city, 'خراسان جنوبی') !== false) echo ' selected'; ?>  >خراسان جنوبی</option>
                                    <option value="سمنان" <?php if (strpos($city, 'سمنان') !== false) echo ' selected'; ?>  >سمنان</option>
                                    <option value="یزد" <?php if (strpos($city, 'یزد') !== false) echo ' selected'; ?>  >یزد</option>
                                    <option value="زنجان" <?php if (strpos($city, 'زنجان') !== false) echo ' selected'; ?>  >زنجان</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="getred" class="marginright">محتوای اصلی سایت:</div>
                <div id="editor">
                    <div id='edit' style="margin-top: 30px;"><?php echo $datashould; ?></div>
                </div>
                <input name="editor1" id="editor122" class="form-control input-lg ckeditor"
                       type="text" value="" placeholder="آزمون"/>
                <div class="seo row width700">
                    <div>کنترل سئو:</div>
                    <label for="seodesc">متا توضیحات:(حداکثر 300 کاراکتر کلمات با - از یکدیگر جداسازی شوند)</label>
                    <br />
                    <textarea name="seodesc" id="seodesc" class="form-control" rows="4" maxlength="300"
                              placeholder="متا توضیحات"><?php echo $description;?></textarea>
                    <div id="feedbackseodesc"></div>
                    <br />

                    <label for="seokeyword">متا کلمات کلیدی:(حداکثر 200 کاراکتر، کلمات با - از یکدیگر جداسازی شوند)</label>
                    <br />
                    <textarea name="seokeyword" id="seokeyword" class="form-control" rows="5" maxlength="200"
                              placeholder="کلمات کلیدی"><?php echo $kewords;?></textarea>
                    <div id="feedbackseokeyword"></div>
                    <br />
                    <label for="seotitle">عنوان بالای صفحه(title نمایش داده شده بالای صفحه، حداکثر 200 کاراکتر)</label>
                    <br />
                    <textarea name="seotitle" id="seotitle" class="form-control" rows="2" maxlength="200"
                              placeholder="عنوان بالا"><?php echo $titleseo;?></textarea>
                    <div id="feedbackseotitle"></div>

                </div>
                <div class="col-md-12 col-xs-12">
                    <input type="text" class="editor122" value="<?php echo $type ?>">
                    <input type="submit" value="ثبت" class="btn btn-success"/>
                    <input type="button" name="cancel" value="لغو" class="btn btn-danger"
                           onClick="window.location='<?php echo $URL2; ?>';"/>
                    <span id="showerror"></span>
                </div>
            </div>
        </form>
    </div>

    <script type="text/javascript" src="../js/codemirror5.3.0.js"></script>
    <script type="text/javascript" src="../js/codemirror_5.3.0_mode_xml_xml.js"></script>
    <script type="text/javascript" src="../froala/js/froala_editor.min.js"></script>
    <script type="text/javascript" src="../froala/js/plugins/align.min.js"></script>
    <script type="text/javascript" src="../froala/js/plugins/char_counter.min.js"></script>
    <script type="text/javascript" src="../froala/js/plugins/code_beautifier.min.js"></script>
    <script type="text/javascript" src="../froala/js/plugins/code_view.min.js"></script>
    <script type="text/javascript" src="../froala/js/plugins/colors.min.js"></script>
    <script type="text/javascript" src="../froala/js/plugins/draggable.min.js"></script>
    <script type="text/javascript" src="../froala/js/plugins/emoticons.min.js"></script>
    <script type="text/javascript" src="../froala/js/plugins/entities.min.js"></script>
    <script type="text/javascript" src="../froala/js/plugins/file.min.js"></script>
    <script type="text/javascript" src="../froala/js/plugins/font_size.min.js"></script>
    <script type="text/javascript" src="../froala/js/plugins/font_family.min.js"></script>
    <script type="text/javascript" src="../froala/js/plugins/fullscreen.min.js"></script>
    <script type="text/javascript" src="../froala/js/plugins/image.min.js"></script>
    <script type="text/javascript" src="../froala/js/plugins/line_breaker.min.js"></script>
    <script type="text/javascript" src="../froala/js/plugins/inline_style.min.js"></script>
    <script type="text/javascript" src="../froala/js/plugins/link.min.js"></script>
    <script type="text/javascript" src="../froala/js/plugins/lists.min.js"></script>
    <script type="text/javascript" src="../froala/js/plugins/paragraph_format.min.js"></script>
    <script type="text/javascript" src="../froala/js/plugins/paragraph_style.min.js"></script>
    <script type="text/javascript" src="../froala/js/plugins/quick_insert.min.js"></script>
    <script type="text/javascript" src="../froala/js/plugins/quote.min.js"></script>
    <script type="text/javascript" src="../froala/js/plugins/table.min.js"></script>
    <script type="text/javascript" src="../froala/js/plugins/save.min.js"></script>
    <script type="text/javascript" src="../froala/js/plugins/url.min.js"></script>
    <script type="text/javascript" src="../froala/js/plugins/video.min.js"></script>
    <script>
        $(function () {
            $('#edit').froalaEditor({
                // Define new image styles.
                // Set the image upload parameter.
                imageUploadParam: 'image',

                // Set the image upload URL.
                imageUploadURL: '../images/froala/takefile.php',

                // Additional upload params.
//                imageUploadParams: {id: 'my_editor'},

                // Set request type.
                imageUploadMethod: 'POST',

                // Set max image size to 5MB.
                imageMaxSize: 5 * 1024 * 1024,

                // Allow to upload PNG and JPG.
                imageAllowedTypes: ['jpeg', 'jpg', 'png'],

                imageStyles: {
                    class1: 'Class 1',
                    class2: 'Class 2'
                },
                // Set the video upload parameter.
                videoUploadParam: 'image',

                // Set the video upload URL.
                videoUploadURL: '../images/froala/takeVideoFile.php',

                // Additional upload params.
                videoUploadParams: {id: 'my_editor'},

                // Set request type.
                videoUploadMethod: 'POST',

                // Set max video size to 50MB.
                videoMaxSize: 50 * 1024 * 1024,

                // Set the file upload parameter.
                fileUploadParam: 'image',

                // Set the file upload URL.
                fileUploadURL: '../images/froala/takeVideoFile.php',

                // Additional upload params.
                fileUploadParams: {id: 'my_editor'},

                // Set request type.
                fileUploadMethod: 'POST',

                // Set max file size to 20MB.
                fileMaxSize: 20 * 1024 * 1024,

                // Allow to upload any file.
                fileAllowedTypes: ['*']
            })
                .on('froalaEditor.image.beforeUpload', function (e, editor, images) {
//            alert("berfor upload");
                })
                .on('froalaEditor.image.uploaded', function (e, editor, response) {
                    // Image was uploaded to the server.
//            alert(response);
                })
                .on('froalaEditor.image.inserted', function (e, editor, $img, response) {
                    // Image was inserted in the editor.
//            alert("inserted");
                })
                .on('froalaEditor.image.replaced', function (e, editor, $img, response) {
                    // Image was replaced in the editor.
//            alert("replaced");
                })
                .on('froalaEditor.image.error', function (e, editor, error, response) {
                    // Bad link.
                    alert(error.code);
//            if (error.code == 1) { }
//
//            // No link in upload response.
//            else if (error.code == 2) { }
//
//            // Error during image upload.
//            else if (error.code == 3) {  }
//
//            // Parsing response failed.
//            else if (error.code == 4) {  }
//
//            // Image too text-large.
//            else if (error.code == 5) {  }
//
//            // Invalid image type.
//            else if (error.code == 6) {  }
//
//            // Image can be uploaded only to same domain in IE 8 and IE 9.
//            else if (error.code == 7) {  }

                    // Response contains the original server response to the request if available.
                }).on('froalaEditor.video.beforeUpload', function (e, editor, videos) {
                // Return false if you want to stop the video upload.
//            alert("berfor upload");
            })
                .on('froalaEditor.video.uploaded', function (e, editor, response) {
                    // Video was uploaded to the server.
//            alert(response);
                })
                .on('froalaEditor.video.inserted', function (e, editor, $img, response) {
                    // Video was inserted in the editor.
//            alert("inserted");
                })
                .on('froalaEditor.video.replaced', function (e, editor, $img, response) {
                    // Video was replaced in the editor.
//            alert("replaced");
                })
                .on('froalaEditor.video.error', function (e, editor, error, response) {
                    // Bad link.
//            alert(error.code);
//            if (error.code == 1) { }
//
//            // No link in upload response.
//            else if (error.code == 2) { }
//
//            // Error during video upload.
//            else if (error.code == 3) { }
//
//            // Parsing response failed.
//            else if (error.code == 4) { }
//
//            // Video too text-large.
//            else if (error.code == 5) { }
//
//            // Invalid video type.
//            else if (error.code == 6) { }
//
//            // Video can be uploaded only to same domain in IE 8 and IE 9.
//            else if (error.code == 7) { }

                    // Response contains the original server response to the request if available.
                });


        });
        $('#edit1').froalaEditor({
            linkAutoPrefix: '/'
        });
        $('#edit1').froalaEditor({
            imageDefaultAlign: 'center'
        });
    </script>
    </body>
<!--    <script>-->
<!--        var customOptions = {-->
<!--            placeholder: "روز / ماه / سال"-->
<!--            , twodigit: false-->
<!--            , closeAfterSelect: true-->
<!--            , nextButtonIcon: "fa fa-arrow-circle-right"-->
<!--            , previousButtonIcon: "fa fa-arrow-circle-left"-->
<!--            , buttonsColor: "black"-->
<!--            , forceFarsiDigits: true-->
<!--            , markToday: true-->
<!--            , markHolidays: true-->
<!--            , highlightSelectedDay: true-->
<!--            , sync: true-->
<!--            , gotoToday: true-->
<!--        };-->
<!--        kamaDatepicker('tarikhAzmun', customOptions);-->
<!--        kamaDatepicker('tarikhKart', customOptions);-->
<!--        kamaDatepicker('tarikhNatayej', customOptions);-->
<!--    </script>-->
    </html>
    <?php
}else{
    header('Location:/');
}

//function gregorian_to_jalali($gy,$gm,$gd,$mod=''){
//    list($gy,$gm,$gd)=explode('_',tr_num($gy.'_'.$gm.'_'.$gd));/* <= Extra :اين سطر ، جزء تابع اصلي نيست */
//    $g_d_m=array(0,31,59,90,120,151,181,212,243,273,304,334);
//    if($gy > 1600){
//        $jy=979;
//        $gy-=1600;
//    }else{
//        $jy=0;
//        $gy-=621;
//    }
//    $gy2=($gm > 2)?($gy+1):$gy;
//    $days=(365*$gy) +((int)(($gy2+3)/4)) -((int)(($gy2+99)/100)) +((int)(($gy2+399)/400)) -80 +$gd +$g_d_m[$gm-1];
//    $jy+=33*((int)($days/12053));
//    $days%=12053;
//    $jy+=4*((int)($days/1461));
//    $days%=1461;
//    $jy+=(int)(($days-1)/365);
//    if($days > 365)$days=($days-1)%365;
//    if($days < 186){
//        $jm=1+(int)($days/31);
//        $jd=1+($days%31);
//    }else{
//        $jm=7+(int)(($days-186)/30);
//        $jd=1+(($days-186)%30);
//    }
//    return($mod==='')?array($jy,$jm,$jd):$jy .$mod .$jm .$mod .$jd;
//}

function tr_num($str,$mod='en',$mf='٫'){
    $num_a=array('0','1','2','3','4','5','6','7','8','9','.');
    $key_a=array('۰','۱','۲','۳','۴','۵','۶','۷','۸','۹',$mf);
    return($mod=='fa')?str_replace($num_a,$key_a,$str):str_replace($key_a,$num_a,$str);
}