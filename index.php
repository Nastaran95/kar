<?php
/**
 * Created by PhpStorm.
 * User: Nastaran
 * Date: 8/2/18
 * Time: 7:53 PM
 */
session_start();

include 'Settings.php'; //harja khasti DB estefade koni ino bezan faghat
$productXMLNAME = "XMLs/home.xml";
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
    <script src="/js/jQuery.js" ></script>
    <script src="/js/bootstrap.js" ></script>
    <link rel="stylesheet" href="/css/global.css"/>
    <link rel="stylesheet" href="/css/home.css"/>
    <link rel="canonical" href="https://www.karasa.ir/">
    <link rel="alternate" href="https://www.karasa.ir/" hreflang="fa-IR" />
</head>
<body>
<?php
include 'Header.php';
?>
//

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