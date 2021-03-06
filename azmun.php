<?php
/**
 * Created by PhpStorm.
 * User: Nastaran
 * Date: 8/8/18
 * Time: 11:49 AM
 */
session_start();

include '/Settings.php'; //harja khasti DB estefade koni ino bezan faghat
$productXMLNAME = "XMLs/azmun.xml";
if (file_exists($productXMLNAME)) {
    $XMLFile = simplexml_load_file($productXMLNAME);
    $SEOdescription=$XMLFile->description;
    $SEOKEYWORDS=$XMLFile->kewords;
}else{
    $SEOdescription="";
    $SEOKEYWORDS="";
}


if (isset($_GET['ID'])) {
    $ID = $_GET['ID'];
    $query = "SELECT * FROM azmun WHERE englishName='$ID';";
    $result = $connection->query($query);
//    echo $connection->error;
    if ($row = $result->fetch_assoc()) {
        $name = $row['title'];
        $dateAzmun = $row['dateAzmun'];
        $dateKart = $row['dateKart'];
        $dateNatayej = $row['dateNatayej'];
        $dateNatayejNahayi = $row['dateNatayejNahayi'];
        $dateMosahebe = $row['dateMosahebe'];
        $xmlAdress = $row['xmlAdress'];
        $xmlAdress = substr($xmlAdress,3);
        $type = $row['typ'];
        if (file_exists($xmlAdress)) {
            $XMLFile = simplexml_load_file($xmlAdress);
            $azmunDescription=$XMLFile->data;
            $azmunDescription2=$XMLFile->data2;
            $azmunDescription3=$XMLFile->data3;
            $azmunDescription4=$XMLFile->data4;
        }else{
            $azmunDescription="";
            $azmunDescription2="";
            $azmunDescription3="";
            $azmunDescription4="";
        }
        $SEOTITLE=$row['title'];
    } else{
        header('Location:/');
    }
}else {
    header('Location:/');
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
    <script src="/js/home.js" ></script>
    <link rel="stylesheet" href="/css/oldcss.css">
    <link rel="stylesheet" href="/css/global.css"/>
    <link rel="stylesheet" href="/css/azmun.css"/>
    <link rel="canonical" href="https://www.karasa.ir/">
    <link rel="alternate" href="https://www.karasa.ir/" hreflang="fa-IR" />

    <link rel="stylesheet" href="/css/helper.css"/>
    <script src="/js/helper.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/froala/css/froala_style.css">
</head>
<body>
<?php
include '/Header.php';


?>

<div class ="container grayColor main">

    <h2 class="subj">
        &#x2636;
        <?php echo $name;?>
    </h2>
    <div class="subj"><hr></div>


    <?php
    $num = 1;
    if(strlen($azmunDescription4)>0)
        $num = 6;
    elseif (strlen($dateMosahebe)>0)
        $num = 5;
    elseif (strlen($azmunDescription3)>0)
        $num = 4;
    elseif (strlen($dateAzmun)>0)
        $num = 3;
    elseif (strlen($azmunDescription2)>0)
        $num = 2;
    ?>

    <div class="opening_bars azmun">

        <?php
        if(strlen($azmunDescription4)>0) {
            ?>
            <div class="item">
                <div id="bar_6" class="bar">زمان اعلام نتایج نهایی<span class="bar_arrow <?php if($num==6) echo 'opened'?>"/></div>
                <div class="bar_text <?php if($num!=6) echo 'hide'?>">
                    <?php echo $azmunDescription4; ?>
                </div>
            </div>
            <?php
        }

        if(strlen($dateMosahebe)>0) {
            ?>
            <div class="item">
                <div id="bar_5" class="bar">زمان مصاحبه<span class="bar_arrow <?php if($num==5) echo 'opened'?>"/></div>
                <div class="bar_text <?php if($num!=5) echo 'hide'?>">
                    <?php echo $dateMosahebe; ?>
                </div>
            </div>
            <?php
        }

        if(strlen($azmunDescription3)>0) {
            ?>
            <div class="item">
                <div id="bar_4" class="bar">زمان اعلام نتایج اولیه<span class="bar_arrow <?php if($num==4) echo 'opened'?>"/></div>
                <div class="bar_text <?php if($num!=4) echo 'hide'?>">
                    <?php echo $azmunDescription3; ?>
                </div>
            </div>
            <?php
        }
        if(strlen($dateAzmun)>0) {
            ?>
            <div class="item">
                <div id="bar_3" class="bar">زمان برگزاری آزمون<span class="bar_arrow <?php if($num==3) echo 'opened'?>"/></div>
                <div class="bar_text <?php if($num!=3) echo 'hide'?>">
                    <?php echo $dateAzmun; ?>
                </div>
            </div>
            <?php
        }


        if(strlen($azmunDescription2)>0) {
            ?>
            <div class="item">
                <div id="bar_2" class="bar">دریافت کارت<span class="bar_arrow <?php if($num==2) echo 'opened'?>"/></div>
                <div class="bar_text <?php if($num!=2) echo 'hide'?> ">
                    <?php echo $azmunDescription2; ?>
                </div>
            </div>
            <?php
        }
        ?>

        <div class="item">
            <div id="bar_1" class="bar"> آگهی استخدام<span id="arrow_1" class="bar_arrow <?php if($num==1) echo 'opened'?>"/></div>
            <div id="text_1" class="fr-element fr-view bar_text <?php if($num!=1) echo 'hide'?>">
                <?php echo $azmunDescription;?>
            </div>
        </div>

    </div>

</div>

<?php
include '/Footer.php';
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