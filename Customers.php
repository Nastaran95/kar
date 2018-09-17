<?php
/**
 * Created by PhpStorm.
 * User: maryam
 * Date: 8/8/2018
 * Time: 10:00 PM
 */

session_start();

include '/Settings.php'; //harja khasti DB estefade koni ino bezan faghat
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
    <link rel="stylesheet" href="/css/customers.css"/>
    <script src="/js/jQuery.js" ></script>
    <script src="/js/helper.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<?php
include "/header.php";
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
            $name = $row['title'];
            $uniqueName = $row['englishName'];
            $xmlAdress = $row['xmlAdress'];
            $xmlAdress = substr($xmlAdress,3);
            $customerLogo = $row['image'];
            $customerLogo = substr($customerLogo,2);
            $mokh  = $row['Mokhtasar'];

//            if (file_exists($xmlAdress)) {
//                $XMLFile = simplexml_load_file($xmlAdress);
//                $customerName = $XMLFile->name;
//                $customerLogo = $XMLFile->image;
//                $customerDescription = $XMLFile->Mokhtasar;
//            }
//            else{
//                $customerName = "";
//                $customerLogo = "";
//                $customerDescription = "";
//            }

            if (file_exists($xmlAdress)) {
                $XMLFile = simplexml_load_file($xmlAdress);
                $customerDescription=$XMLFile->data;
            }else{
                $customerDescription="";
            }
            ?>
            <div class="customer">
                <a href="/customer/<?php echo $uniqueName; ?> " class="customera">
                <div class="customer_name">
                    <h2 class="h5size customera"><?php echo $name ?></h2>
                </div>
                <div class="customer_info customera">
<!--                    <div class="customer_logo">-->
                        <img class="customer_logo_img" src="<?php echo $customerLogo ?>"/>
<!--                    </div>-->
                    <p class="customer_description"><?php echo $mokh ?></p>
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
include '/Footer.php';
?>
</body>
</html>