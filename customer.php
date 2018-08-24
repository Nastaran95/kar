<?php
/**
 * Created by PhpStorm.
 * User: maryam
 * Date: 8/10/2018
 * Time: 7:56 PM
 */


session_start();

include 'Settings.php'; //harja khasti DB estefade koni ino bezan faghat
$productXMLNAME = "XMLs/blog.xml";
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
    <link rel="stylesheet" href="css/bootstrap.css"/>
    <script src="js/jQuery.js" ></script>
    <script src="js/bootstrap.js" ></script>
    <script src="js/home.js" ></script>
    <link rel="stylesheet" href="css/global.css"/>
    <link rel="stylesheet" href="css/azmun.css"/>
    <link rel="canonical" href="https://www.karasa.ir/">
    <link rel="alternate" href="https://www.karasa.ir/" hreflang="fa-IR" />

    <link rel="stylesheet" href="css/helper.css"/>
    <script src="js/helper.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="froala/css/froala_style.css">
</head>
<body>
<?php
include 'Header.php';
if (isset($_GET['ID'])) {
    $ID = $_GET['ID'];
    $query = "SELECT * FROM customers WHERE englishName='$ID';";
    $result = $connection->query($query);
    if ($row = $result->fetch_assoc()) {
        $name = $row['title'];
        $mokhtasar = $row['Mokhtasar'];
        $imageAdd = $row['image'];
        $xmlAdress = $row['xmlAdress'];
        $xmlAdress = substr($xmlAdress,3);
        $image = $row['image'];
        $image = substr($image,3);
        if (file_exists($xmlAdress)) {
            $XMLFile = simplexml_load_file($xmlAdress);
            $blogDescription=$XMLFile->data;
        }else{
            $blogDescription="";
        }
    } else{

    }
}else {
    header('Location:/');
}

?>

<div class ="container grayColor main">

    <h2 class="subj">
        <span class="glyphicon glyphicon-file"></span>
        <?php echo $name;?>
    </h2>
    <div class="col-md-12">
        <img class="pull-right col-md-3" src="<?php echo $image; ?>">
        <div class="col-md-9">
            <?php echo $mokhtasar; ?>

        </div>

    </div>


    <div class="col-md-12">
        <div class="fr-element fr-view">
            <br><br>
            <?php echo $blogDescription;?>
        </div>
    </div>

</div>

<?php
include 'Footer.php';
?>
<script type="application/ld+json">
    {
    "@context":"http://schema.org",
    "@type":"Organization",
    "url":"http://www.karasa.ir/",
    "sameAs":["https://www.instagram.com/karasa/"],
    "@id":"#organization",
    "name":"کارآسا",
    "logo":"http://www.karasa.ir/<?php echo $XMLFile->logo->url;?>"}
</script>
<!-- Global site tag (gtag.js) - Google Analytics -->
</body>
</html>