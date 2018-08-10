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
    <link rel="stylesheet" href="css/home.css"/>
    <link rel="stylesheet" href="css/customers.css"/>
    <script src="js/jQuery.js" ></script>
    <script src="js/helper.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<?php
include "header.php";
?>
<div class ="container grayColor main">
    <div class="row">
        <br/>
        <div class="col-md-12">
    <h1 class="col-md-12 subj">مشتریان ما</h1>

    <div class="customers">
        <?php
        $query = "SELECT * FROM customers;";
        $result = $connection->query($query);
        //    echo $connection->error;
        while ($row = $result->fetch_assoc()) {
            $name = $row['name'];
            $uniqueName = $row['englishName'];
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
                <a href="http://localhost:63342/karasa/customer/<?php echo $uniqueName; ?> ">
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
                </a>
            </div>

        <?php
        }
        ?>
    </div>
    </div>
    </div>

</div>
<?php
include 'Footer.php';
?>
</body>
</html>