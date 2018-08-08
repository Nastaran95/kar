<?php
/**
 * Created by PhpStorm.
 * User: maryam
 * Date: 8/8/2018
 * Time: 10:00 PM
 */

session_start();

include 'Settings.php'; //harja khasti DB estefade koni ino bezan faghat
$productXMLNAME = "XMLs/customers.xml";
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
    <link rel="stylesheet" href="css/bootstrap.css"/>
    <link rel="stylesheet" href="css/global.css"/>
    <link rel="stylesheet" href="css/customers.css"/>
    <script src="js/jQuery.js" ></script>
    <script src="js/helper.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY&callback=myMap"></script>
</head>
<body>
<?php
include "header.php";
?>
<div class ="container grayColor main">
    <h1 class="dark_text">مشتریان ما</h1>

    <div class="customers">
        <?php
        $query = "SELECT * FROM customers;";
        $result = $connection->query($query);
        //    echo $connection->error;
        while ($row = $result->fetch_assoc()) {
            $name = $row['name'];
            $xmlAdress = $row['xmlAdress'];
            if (file_exists($xmlAdress)) {
                $XMLFile = simplexml_load_file($xmlAdress);
                $customerName = $XMLFile->name;
                $customerLogo = $XMLFile->logo;
                $customerDescription = $XMLFile->description;
            }
            else{
                $customerName = "";
                $customerLogo = "";
                $customerDescription = "";
            }
            ?>
            <div class="customer">
                <div class="customer_name">
                    <i class="fa fa-circle"></i>
                    <h2><?php echo $customerName ?></h2>
                </div>
                <div class="customer_info">
                    <div class="customer_logo">
                        <img class="customer_logo_img" src="<?php echo $customerLogo ?>"/>
                    </div>
                    <p class="customer_description"><?php echo $customerDescription ?></p>
                </div>
            </div>

        <?php
        }
        ?>

    </div>
</div>
</body>
