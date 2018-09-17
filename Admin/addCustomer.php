<?php
/**
 * Created by PhpStorm.
 * User: maryam
 * Date: 8/10/2018
 * Time: 8:48 PM
 */

session_start();
include '../Settings.php';
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
        <title>افزودن مشتری</title>

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
        <link href="css/addblog.css" rel="stylesheet">
        <script src="js/addblog.js"></script>
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
    if ($type == 2) {
        $_POST['MOkhtasar'] = "aaaaaaaaaaaaaaa";
    }
    if ((isset($_POST['editor1'])) && (isset($_POST['topic'])) && (isset($_POST['MOkhtasar'])) && (strlen($_POST['editor1']) > 0) && (strlen($_POST['MOkhtasar']) > 0) && (strlen($_POST['topic']) > 0)) {
        $writer = new XMLWriter();
        if ($product === "all") {
            $imageURL = "";
            $name = (string)uniqid().uniqid();
        } else {
            if ($type == 1) {
                $query = "SELECT * FROM customers WHERE ID='$product'";
            } else {
                $query = "SELECT * FROM customers WHERE ID='$product'";
            }
            $result = $connection->query($query);
            if ($result->num_rows > 0) {
                $row = mysqli_fetch_assoc($result);
            }
            $productXMLNAME = $row['xmlAdress'];
            $imageURL = $row['image'];
            if (file_exists($productXMLNAME)) {
                $produc = simplexml_load_file($productXMLNAME);
                $name = $produc->code;
            }
        }
        $writer->openMemory();
        $writer->setIndent(true);
        $writer->startDocument('1.0" encoding="UTF-8');
        $writer->startElement('customer');
        $writer->writeElement('code', $name);
        $writer->writeElement('name', $_POST['topic']);
        $titleshould=$_POST['topic'];
        $englishtopic = $_POST['englishtopic'];
        $englishtopic=str_replace(" ","-",$englishtopic);
        $filename = '../XMLs/customerXMLs/' . $name . '.xml';
        $writer->writeElement('Mokhtasar', $_POST['MOkhtasar']);
        $Mokhtasar = $_POST['MOkhtasar'];

        if (isset($_FILES["files"])) {
            $imagenames = $_FILES["files"]["name"];
            $imagetempname = $_FILES["files"]["tmp_name"];
        } else {
            $imagetempname = "";
            $imagenames = "";
        }
        $uploadOk = 0;
        $URL = "";
        for ($i = 0; $i < sizeof($imagetempname); $i++) {
            $NAMESSS = "";
            $TMPNAMESSS = "";
            if (sizeof($imagetempname) == 1) {
                $NAMESSS = $imagenames;
                $TMPNAMESSS = $imagetempname;
            }
            if (strlen($NAMESSS) > 0) {
                $target_dir = "../images/customers/";
                $BBB = (string)uniqid();
                $target_file = $target_dir . $BBB . basename($NAMESSS);
                $uploadOk = 1;
                $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
                // Check if image file is a actual image or fake image
                $check = getimagesize($TMPNAMESSS);
                if ($check !== false) {
                    $uploadOk = 1;
                } else {
                    $uploadOk = 0;
                }
                // Allow certain file formats
                if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                    && $imageFileType != "gif") {
                    $uploadOk = 0;
                }
                // Check if $uploadOk is set to 0 by an error
                if ($uploadOk == 0) {
                } else {
                    if (move_uploaded_file($TMPNAMESSS, $target_file)) {
//                            $imageSize = getImageSize($target_file);
//                            $imageWidth = $imageSize[0];
//                            $imageHeight = $imageSize[1];
//                            $TYPEOFIMAGE = $imageSize[2];
//                            if ($imageWidth>400){
//                                $resizedDestination = "../images/blog/".md5( $BBB . basename($NAMESSS))."_RESIZED.jpg";
//
//                                copy($target_file, $resizedDestination);
//
//                                $DESIRED_WIDTH = 300;
//                                $proportionalHeight = round(($DESIRED_WIDTH * $imageHeight) / $imageWidth);
//
////                                if ($TYPEOFIMAGE == 1)
////                                {
////                                    $originalImage = imagecreate($target_file);
////                                }
////                                elseif ($TYPEOFIMAGE == 2)
////                                {
////                                    $originalImage = imagecreatefromjpeg($target_file);
////                                }
////                                elseif ($TYPEOFIMAGE == 3)
////                                {
////                                    $originalImage = imagecreatefrompng($target_file);
////                                }
////                                else
////                                {
////                                    $originalImage = imagecreatefromwbmp($target_file);
////                                }
//                                $originalImage = imagecreate($target_file);
//
//                                $resizedImage = imageCreateTrueColor($DESIRED_WIDTH, $proportionalHeight);
//
//                                imageCopyResampled($resizedImage, $originalImage, 0, 0, 0, 0, $DESIRED_WIDTH+1, $proportionalHeight+1, $imageWidth, $imageHeight);
//                                imageJPEG($resizedImage, $resizedDestination);
//
//                                imageDestroy($originalImage);
//                                imageDestroy($resizedImage);
//                            }else {
//                                $resizedDestination="../images/blog/".$BBB . basename($NAMESSS);
//                            }
                        $imageURL = $target_file;
                    } else {
                        $uploadOk = 0;
                    }
                }
            } else {
                $uploadOk = 0;
            }
        }
        if (($uploadOk === 0) && ($imageURL == "")) {
            $movafagh = 'عملیات مورد نظر موفق نبود. وارد کردن تصویر اصلی الزامی است.';
        } else {


            if ($type == 1) {
                $writer->writeElement('image', $imageURL);
            }
            $writer->writeElement('data', $_POST['editor1']);
            $datashould = $_POST['editor1'];

            $description = "";
            if (isset($_POST['seodesc'])) {
                $writer->writeElement('description', $_POST['seodesc']);
                $description = $_POST['seodesc'];
            }
            $kewords = "";
            if (isset($_POST['seokeyword'])) {
                $writer->writeElement('kewords', $_POST['seokeyword']);
                $kewords = $_POST['seokeyword'];
            }
            $titleseo = "";
            if (isset($_POST['seotitle'])) {
                $writer->writeElement('seotitle', $_POST['seotitle']);
                $titleseo = $_POST['seotitle'];
            }

            $writer->endElement();
            $writer->endDocument();
            $file = $writer->outputMemory();
            file_put_contents($filename, $file);
            $topic = $_POST['topic'];



            date_default_timezone_set("Iran");
            $DATE = date('Y-m-d H:i:s');
            list($DATE, $time) = explode(" ", $DATE);

            if ($product === "all") {
                $stmt = $connection->prepare("INSERT INTO customers (xmlAdress,title,englishName, Mokhtasar,image,realtime)  VALUES (?,?,?,?,?,?)");
                $stmt->bind_param("ssssss", $filename, $topic, $englishtopic, $Mokhtasar, $imageURL, $DATE);
            } else {
                $stmt = $connection->prepare("UPDATE customers SET xmlAdress=?,title=?, Mokhtasar=?,image=?,englishName=?,realtime=? WHERE ID='$product'");
                $stmt->bind_param("ssssss", $filename, $topic, $Mokhtasar, $imageURL, $englishtopic, $DATE);
            }
            $result = $stmt->execute(); //execute() tries to fetch a result set. Returns true on succes, false on failure.
            $stmt->store_result();
            $result = $stmt->get_result();
            if ($product === "all") {
                $product = $connection->insert_id;
            }
            $movafagh = 'عملیات مورد نظر با موفقیت انجام شد.';

            if ($connection->error) {
                $movafagh = 'عملیات مورد نظر موفق نبود. وارد کردن تمامی موارد الزامی است.';
                $product = "namovafagh";
                if (isset($_POST['topic'])) {
                    $titleshould = $_POST['topic'];
                }
                if (isset($_POST['MOkhtasar'])) {
                    $Mokhtasar = $_POST['MOkhtasar'];
                }
                if (isset($_POST['editor1'])) {
                    $datashould = $_POST['editor1'];
                }

                if (isset($_POST['seodesc'])) {
                    $description = $_POST['seodesc'];
                }
                if (isset($_POST['seotitle'])) {
                    $titleseo = $_POST['seotitle'];
                }
                if (isset($_POST['seokeyword'])) {
                    $kewords = $_POST['seokeyword'];
                }
            } else {
                echo "<script>alert('عملیات مورد نظر موفقیت آمیز بود.');</script>";
                echo '<META HTTP-EQUIV="Refresh" Content="0; URL=addCustomer.php?product=' . $product . '&type=' . $type . '">';
            }
        }

    } elseif ((isset($_POST['editor1'])) && (isset($_POST['topic'])) && (isset($_POST['MOkhtasar']))) {
        $movafagh = 'عملیات مورد نظر موفق نبود. وارد کردن تمامی موارد الزامی است.';
        $product="namovafagh";
        if (isset($_POST['topic'])){
            $titleshould=$_POST['topic'];
        }
        if (isset($_POST['MOkhtasar'])){
            $Mokhtasar = $_POST['MOkhtasar'];
        }
        if (isset($_POST['dastebandi'])){
            $dastebandi = $_POST['dastebandi'];
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
        $movafagh = '';
    }
    ?>
    <div id="wrapper">
        <?php
        $which=12;
        include 'adminmenue.php';
        $query = "SELECT * FROM customers WHERE ID='$product'";
        $result = $connection->query($query);
        if ($result->num_rows > 0) {
            $row = mysqli_fetch_assoc($result);
        }
        $tempvar = 0;
        $tempvar2 = 0;
        if ($product === "all") {
            $URL = "addCustomer.php";
        } else {
            $URL = "addCustomer.php?product=$product";
        }
        $URL2 = "allCustomer.php?type=$type";
        $englishtopic="";
        if ($product=="namovafagh"){

        } else if ($product !== "all") {
            if ($type == 1) {
                $query = "SELECT * FROM customers WHERE ID='$product'";
            }
            $result = $connection->query($query);
            if ($result->num_rows > 0) {
                $row = mysqli_fetch_assoc($result);
            }
            $productXMLNAME = $row['xmlAdress'];
            $imageURL = $row['image'];
            if (file_exists($productXMLNAME)) {
                $produc = simplexml_load_file($productXMLNAME);
                $name = $produc->code;
                $titleshould = $produc->name;
                $datashould = $produc->data;
                $description = $produc->description;
                $kewords = $produc->kewords;
                $titleseo = $produc->seotitle;
                if ($type == 1) {
                    $Mokhtasar = $produc->Mokhtasar;
                }
            }
            $englishtopic=$row['englishName'];
        } else {
            $imageURL = "";
            $titleshould = "";
            $datashould = "";
            if ($type == 1) {
                $Mokhtasar = "";
            }
            $description = "";
            $kewords = "";
            $titleseo = "";
            $englishtopic="";
        }
        ?>

        <form action="<?php echo $URL ?>" method="post" enctype="multipart/form-data" onsubmit="return validateFormdata(5)">

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
                        <br/>
                        <div class="block">
                            <div class="">
                                <div class="">توضیح مختصر: (حداکثر 150 کاراکتر)</div>
                                <br/>
                                <textarea id="MOkhtasar" class="form-control width700" rows="10" name="MOkhtasar"
                                          placeholder="توضیح مختصر"
                                          class="inlineblock" maxlength="1000"><?php echo $Mokhtasar; ?></textarea>
                                <div id="charNum"></div>
                            </div>
                        </div>
                        <br/>
                        <div class="block">  لوگوی مشتری: (تصاویر مربعی باشد، بهتر است سایز آن 200 در 200 باشد.)
                            <br/>
                            <?php
                            if (strlen($imageURL)>0){
                                ?>
                                <img id="forcheck" src="<?php echo $imageURL; ?>" width="200" height="200" alt=""/>
                                <?php
                            }
                            ?>
                            <input name="files" id="files" class="filestyle" type="file" data-icon="false" value="">
                        </div>
                        <br/>
                    </div>
                </div>
                <div id="getred" class="marginright">توضیح کامل مشتری:</div>
                <div id="editor">
                    <div id='edit' style="margin-top: 30px;"><?php echo $datashould; ?></div>
                </div>
                <input name="editor1" id="editor122" class="form-control input-lg ckeditor"
                       type="text" value="" placeholder="بلاک"/>
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

    </html>
    <?php
}else{
    header('Location:/');
}

function gregorian_to_jalali($gy,$gm,$gd,$mod=''){
    list($gy,$gm,$gd)=explode('_',tr_num($gy.'_'.$gm.'_'.$gd));/* <= Extra :اين سطر ، جزء تابع اصلي نيست */
    $g_d_m=array(0,31,59,90,120,151,181,212,243,273,304,334);
    if($gy > 1600){
        $jy=979;
        $gy-=1600;
    }else{
        $jy=0;
        $gy-=621;
    }
    $gy2=($gm > 2)?($gy+1):$gy;
    $days=(365*$gy) +((int)(($gy2+3)/4)) -((int)(($gy2+99)/100)) +((int)(($gy2+399)/400)) -80 +$gd +$g_d_m[$gm-1];
    $jy+=33*((int)($days/12053));
    $days%=12053;
    $jy+=4*((int)($days/1461));
    $days%=1461;
    $jy+=(int)(($days-1)/365);
    if($days > 365)$days=($days-1)%365;
    if($days < 186){
        $jm=1+(int)($days/31);
        $jd=1+($days%31);
    }else{
        $jm=7+(int)(($days-186)/30);
        $jd=1+(($days-186)%30);
    }
    return($mod==='')?array($jy,$jm,$jd):$jy .$mod .$jm .$mod .$jd;
}

function tr_num($str,$mod='en',$mf='٫'){
    $num_a=array('0','1','2','3','4','5','6','7','8','9','.');
    $key_a=array('۰','۱','۲','۳','۴','۵','۶','۷','۸','۹',$mf);
    return($mod=='fa')?str_replace($num_a,$key_a,$str):str_replace($key_a,$num_a,$str);
}