<?php
/**
 * Created by PhpStorm.
 * User: Nastaran
 * Date: 8/7/18
 * Time: 11:47 PM
 */

session_start();

include '/Settings.php'; //harja khasti DB estefade koni ino bezan faghat
$productXMLNAME = "/XMLs/news.xml";
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

    <script src="/js/jQuery.js" ></script>
    <script src="/js/home.js" ></script>
    <script src="/js/helper.js"></script>

    <link rel="canonical" href="https://www.karasa.ir/">
    <link rel="alternate" href="https://www.karasa.ir/" hreflang="fa-IR" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<?php
include '/header.php';
?>
<div class ="container grayColor main">
    <div class="row">
        <br/>
        <div class="col-md-12">
            <div class="col-md-12 subj">
                اخبار ویژه
            </div>

            <div id="replacepagination">
                <?php
                $page = 1;
                $a = ($page-1)*5;
                $query = "SELECT * FROM news LIMIT $a , 5;";
                $result = $connection->query($query);

                while ($row=$result->fetch_assoc()) {
                    $name=$row['title'];
                    $link = '/new/'.$row['englishName']
                    ?>


                    <div class="col-md-12 colorWhite ">
                        <div class="col-md-1 pull-right icon col-xs-1"><img src="/images/pre-news.png" ></div>
                        <div class="col-md-11 col-xs-11">
                            <a class="navnavbarlink" href="<?php echo $link?>"> <?php echo $name?> </a>
                            <p></p>
                            <a class="navnavbarlink pull-left" href="<?php echo $link?>"> <?php echo $row['realtime']?></a>
                        </div>
                    </div>
                    <?php
                }
                $query = "SELECT * FROM news" ;
                $result = $connection->query($query);
                $pagenum = $result->num_rows;
                ?>

                <div class="pagination-container pull-left">
                    <ul class="pagination">
                        <li id="-1" class="PagedList-skipToNext paginationoldNews" rel="prev"> >> </li>
                        <?php
                        $x = ($pagenum+4) / 5 ;
                        for ($i=1 ; $i <= min($x,2) ; $i++){
                            ?>
                            <li id="<?php echo $i?>" class="paginationoldNews <?php if ($i==1) echo "active" ?> "><?php echo $i?></li>
                            <?php

                        }
                        if ($i<max(1,$x)) {
                            ?>
                            <li>...</li>
                            <li id="<?php echo floor($x) ?>" class="paginationoldNews"><?php echo floor($x) ?></li>

                            <?php
                        }
                        ?>

                        <li id="-2" class="PagedList-skipToNext paginationoldNews" rel="next"> << </li>
                    </ul>

                </div>
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