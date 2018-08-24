<?php
/**
 * Created by PhpStorm.
 * User: HamidReza
 * Date: 11/4/2017
 * Time: 11:57 AM
 */
$imagenames=$_FILES['image']['name'];
$imagetempname=$_FILES['image']['tmp_name'];

$NAMESSS=$imagenames;
$TMPNAMESSS=$imagetempname;
if (strlen($NAMESSS)>0) {
    $target_dir = $_SERVER['DOCUMENT_ROOT']+"/karasa/images/froala/";
//    $target_dir =  "http://localhost/clubrenter/image/froala/";
    $BBB = (string)uniqid();
    $target_file = $target_dir . $BBB . basename($NAMESSS);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
    // Check if image file is a actual image or fake image
    $check = getimagesize($TMPNAMESSS);
    if ($check !== false) {
//             echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif") {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($TMPNAMESSS,$target_file)) {
            $X="{\"link\": \"/images/froala/$target_file\"}";
            echo $X;
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}else {
    echo "asdkjasdkasbdkb";
}
