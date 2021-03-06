<?php
/**
 * Created by PhpStorm.
 * User: Nastaran
 * Date: 8/2/18
 * Time: 7:53 PM
 */
session_start();

include '/Settings.php'; //harja khasti DB estefade koni ino bezan faghat
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
    <script src="/js/home.js" ></script>
    <script src="/js/index.js" ></script>
    <script src="/js/helper.js" ></script>
    <link rel="stylesheet" href="/css/global.css"/>
    <link rel="stylesheet" href="/css/home.css"/>
    <link rel="canonical" href="https://www.karasa.ir/">
    <link rel="alternate" href="https://www.karasa.ir/" hreflang="fa-IR" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<?php
include '/MainPageHeader.php';
?>
<div class ="container grayColor main home_main" id="main">
    <div class="row">
        <br/>
        <div class="col-md-12">

            <?php
            $query = "SELECT * FROM azmun WHERE typ='1' and state='1'  ORDER by ID DESC ;";
            $result = $connection->query($query);

            while ($row=$result->fetch_assoc()) {
                $name=$row['title'];
                $link = '/azmun/'.$row['englishName']
                ?>
                <div class="col-md-12 colorBlue col-xs-12">
                    <div class="col-md-1 pull-right icon col-xs-1"><img src="/images/new-news.png" ></div>
                    <div class="col-md-11 col-xs-11 ">
                        <a class="navnavbarlink" href="<?php echo $link?>"> <?php echo $name?></a>
                    </div>
                </div>
            <?php
            }
            $query = "SELECT * FROM news" ;
            $result = $connection->query($query);
            $pagenum = $result->num_rows;
            if ($pagenum > 0 ) {
                ?>
                <div class="col-md-12">
                    <hr/>
                </div>
                <div id="replacepagination">
                    <?php
                    $page = 1;
                    $a = ($page - 1) * 5;
                    $query = "SELECT * FROM news ORDER by ID DESC LIMIT $a , 5;";
                    $result = $connection->query($query);

                    while ($row = $result->fetch_assoc()) {
                        $name = $row['title'];
                        $link = '/new/' . $row['englishName']
                        ?>


                        <div class="col-md-12 colorWhite col-sm-12 col-xs-12">
                            <div class="col-md-1 pull-right icon col-xs-1"><img src="/images/pre-news.png"></div>
                            <div class="col-md-11 col-xs-11">
                                <a class="navnavbarlink" href="<?php echo $link ?>"> <?php echo $name ?> </a>
                                <p></p>
                                <a class="navnavbarlink pull-left" href="<?php echo $link ?>"> ادامه خبر ...</a>
                            </div>
                        </div>
                        <?php
                    }

                    ?>

                    <div class="pagination-container pull-left">
                        <ul class="pagination">
                            <li id="-1" class="PagedList-skipToNext paginationoldNews" rel="prev"> >></li>
                            <?php
                            $x = ($pagenum + 4) / 5;
                            for ($i = 1; $i <= min($x, 2); $i++) {
                                ?>
                                <li id="<?php echo $i ?>"
                                    class="paginationoldNews <?php if ($i == 1) echo "active" ?> "><?php echo $i ?></li>
                                <?php

                            }
                            if ($i<max(1,$x)) {
                                ?>
                                <li>...</li>
                                <?php
                            }

                            if ($i<=max(1,$x)) {
                                ?>
                                <li id="<?php echo floor($x) ?>" class="paginationoldNews"><?php echo floor($x) ?></li>

                                <?php
                            }
                            ?>

                            <li id="-2" class="PagedList-skipToNext paginationoldNews" rel="next"> <<</li>
                        </ul>

                    </div>
                </div>
                <?php
            }
            ?>

        </div>



        <div id="myCarousel2" class="carousel slide" data-ride="carousel">
            <?php
            $productXMLNAME = "XMLs/homeslider.xml";
            if (file_exists($productXMLNAME)) {
                $produc = simplexml_load_file($productXMLNAME);
                ?>
                <div class="col-sm-12 marginzero">
                    <div class="slider">
                        <div id="home-slider" class="carousel slide carousel-fade" data-ride="carousel">
                            <!-- Wrapper for slides -->
                            <div class="carousel-inner" role="listbox">
                                <?php
                                foreach ($produc->slider->image as $THIS){
                                    if ($THIS['active']=="true"){
                                        ?>
                                        <a class="item active" href="<?php echo $THIS->productURL?>">
                                            <img class="img-responsive" src="<?php echo "/".$THIS->url?>" alt="<?php echo $THIS->alt?>"/>
                                            <!--<div class="carousel-caption">-->
                                            <!--<h3>Headline</h3>-->
                                            <!--<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. <a href="http://sevenx.de/demo/bootstrap-carousel/" target="_blank" class="label label-danger">Bootstrap 3 - Carousel Collection</a></p>-->
                                            <!--</div>-->
                                        </a>
                                        <?php
                                    }else{
                                        ?>
                                        <a class="item" href="<?php echo $THIS->productURL?>">
                                            <img class="img-responsive" src="<?php echo "/".$THIS->url?>" alt="<?php echo $THIS->alt?>"/>
                                            <!--<div class="carousel-caption">-->
                                            <!--<h3>Headline</h3>-->
                                            <!--<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. <a href="http://sevenx.de/demo/bootstrap-carousel/" target="_blank" class="label label-danger">Bootstrap 3 - Carousel Collection</a></p>-->
                                            <!--</div>-->
                                        </a><!-- End Item -->
                                        <?php
                                    }
                                    ?>
                                    <?php
                                }
                                ?>
                            </div>
                            <!-- Controls -->
                            <span class="left carousel-control" role="button">
                                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                <span class="sr-only">قبلی</span>
                            </span>
                            <span class="right carousel-control" role="button">
                                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                <span class="sr-only">بعدی</span>
                            </span>
                        </div>
                    </div>

                </div>
                <?php
            }
            ?>
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