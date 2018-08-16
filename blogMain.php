<?php
/**
 * Created by PhpStorm.
 * User: Nastaran
 * Date: 8/8/18
 * Time: 5:49 PM
 */

session_start();

include 'Settings.php'; //harja khasti DB estefade koni ino bezan faghat
$productXMLNAME = "XMLs/blogMain.xml";
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
    <link rel="icon" type="image/x-icon" href="images/favicon.ico" />
    <link rel="stylesheet" href="css/bootstrap.css"/>
    <script src="js/jQuery.js" ></script>
    <script src="js/bootstrap.js" ></script>
    <script src="js/home.js" ></script>
    <link rel="stylesheet" href="css/global.css"/>
    <link rel="stylesheet" href="css/blogMain.css"/>
    <link rel="canonical" href="https://www.karasa.ir/">
    <link rel="alternate" href="https://www.karasa.ir/" hreflang="fa-IR" />
</head>
<body>
<?php
include 'Header.php';
?>
<div class ="container grayColor main">
    <div class="row">

        <div class="col-md-4">
            <h3 class="subj">
                &#9673;
                معرفی کتاب
            </h3>

            <?php
            $query = "SELECT * FROM book ;";
            $result1 = $connection->query($query);
            $y = 0;
            while ( ($row=$result1->fetch_assoc()) && ($y<2)) {
                $y++;
                $name = $row['topic'];
                $writer = $row['writer'];
                $motarjem = $row['motarjem'];
                $nashr = $row['nashr'];
                $link = '/book/' . $row['post_name'];
                $mokhtasar = $row['Mokhtasar'];
                $image = $row['image'];
                $image = substr($image,3);
                ?>

                <div class="col-md-12 book">
                    <div class="col-md-10 bookImg">
                        <img src="<?php echo $image; ?>" width="100%" height="300">
                    </div>

                    <div class="col-md-11 bookText pull-right">
                        <h2 class="h4size">
                            <?php echo $name; ?>
                        </h2>
                        نویسنده:
                        <?php echo $writer; ?>
                        <br>
                        مترجم:
                        <?php echo $motarjem; ?>
                        <br>
                        <?php echo $nashr; ?>
                        <br><br>
                        <p>
                            <?php echo $mokhtasar; ?>
                        </p>
                    </div>
                    <a href="<?php echo $link ?>">
                        <div class="col-md-12 bookBut">
                            در مورد این کتاب بیشتر بخوانید
                        </div>
                    </a>
                </div>
                <br>

                <?php
            }
            ?>

        </div>



        <div class="col-md-8">
            <div class="col-md-12 rightTop">

                <?php
                $query = "SELECT * FROM BLOG ;";
                $result = $connection->query($query);
                $x = 0;
                while ( ($row=$result->fetch_assoc()) && ($x<3)) {
                    $x++;
                    $name=$row['topic'];
                    $link = '/blog/'.$row['post_name'];
                    $mokhtasar = $row['Mokhtasar'];
                    ?>

                    <a class="maghaleA" href="<?php echo $link ?>">
                        <div class="col-md-10 col-md-offset-1  maghale">
                            <h2 class="h3size">
                                <?php echo $name ; ?>
                            </h2>
                            <p>
                                <?php echo $mokhtasar ; ?>
                            </p>
                        </div>
                    </a>

                    <?php
                }
                ?>

                <div class="col-md-3 button">
                    <a href="allBlogs.php">
                    تمام مقالات
                    </a>
                </div>

            </div>


            <div class="col-md-12 rightMid pull-right">

                <?php
                $query = "SELECT * FROM mosahebe ;";
                $result3 = $connection->query($query);
                if ( ($row=$result3->fetch_assoc())) {
                    $name=$row['topic'];
                    $birthday=$row['birthday'];
                    $image = $row['image'];
                    if(strlen($image)>0)
                        $image = substr($image,3);
                    $link = '/mosahebe/'.$row['post_name'];
                    $mokhtasar = $row['Mokhtasar'];
                    ?>

                    <div class="col-md-12 bio col-xs-12">
                        <div class="col-md-9 col-sm-9 col-xs-9">
                            <h2 class="h4size">
                                <?php echo $name ; ?>
                            </h2>
                            <?php
                            if(strlen($birthday)>0){
                                ?>
                                <h5 class="h5size">
                                    متولد
                                    <?php echo $birthday ; ?>
                                </h5>
                                <?php
                            }
                            ?>

                            <p class="text-justify">
                                <?php echo $mokhtasar ; ?>
                            </p>
                            <a href="<?php echo $link ?>">
                                <div class="col-md-4 button col-sm-12 col-xs-12">

                                    بیشتر بخوانید
                                </div>
                            </a>
                        </div>
                        <?php
                        if (strlen($image)>0){
                            ?>
                            <div class=" col-md-3 col-sm-3 col-xs-3 parimg">
                                <img src="<?php echo $image ?>" class="circle circleIn">
                            </div>
                            <?php
                        }
                        else{ ?>
                            <div class=" col-md-3 col-sm-3 col-xs-3 parimg">
                                <div class="noImg ">
                                    <span class="glyphicon glyphicon-user circleIn"></span>
                                </div>
                            </div>
                        <?php }
                        ?>

                    </div>
                    <?php
                }

                if ( ($row=$result3->fetch_assoc())) {
                    $name=$row['topic'];
                    $birthday=$row['birthday'];
                    $image = $row['image'];
                    $image = substr($image,3);
                    $link = '/mosahebe/'.$row['post_name'];
                    $mokhtasar = $row['Mokhtasar'];
                    ?>

                    <div class="col-md-12 bio col-xs-12">

                        <?php
                        if (strlen($image)>0){
                            ?>
                            <div class=" col-md-3 col-sm-3 col-xs-3 parimg">
                                <img src="<?php echo $image ?>" class="circle circleIn">
                            </div>
                            <?php
                        }
                        else{ ?>
                            <div class=" col-md-3 col-sm-3 col-xs-3 parimg">
                                <div class="noImg ">
                                    <span class="glyphicon glyphicon-user circleIn"></span>
                                </div>
                            </div>
                        <?php }
                        ?>

                        <div class="col-md-9 col-sm-9 col-xs-9">
                            <h2 class="h4size">
                                <?php echo $name ; ?>
                            </h2>
                            <?php
                            if(strlen($birthday)>0){
                                ?>
                                <h5 class="h5size">
                                    متولد
                                    <?php echo $birthday ; ?>
                                </h5>
                                <?php
                            }
                            ?>

                            <p class="text-justify">
                                <?php echo $mokhtasar ; ?>
                            </p>
                            <a href="<?php echo $link ?>">
                                <div class="col-md-4 button col-sm-12 col-xs-12">

                                    بیشتر بخوانید
                                </div>
                            </a>
                        </div>


                    </div>



                    <?php
                }
                if ( ($row=$result3->fetch_assoc())) {
                    $name=$row['topic'];
                    $birthday=$row['birthday'];
                    $image = $row['image'];
                    if(strlen($image)>0)
                        $image = substr($image,3);
                    $link = '/mosahebe/'.$row['post_name'];
                    $mokhtasar = $row['Mokhtasar'];
                    ?>

                    <div class="col-md-12 bio col-xs-12">
                        <div class="col-md-9 col-sm-9 col-xs-9">
                            <h2 class="h4size">
                                <?php echo $name ; ?>
                            </h2>
                            <?php
                            if(strlen($birthday)>0){
                                ?>
                                <h5 class="h5size">
                                    متولد
                                    <?php echo $birthday ; ?>
                                </h5>
                                <?php
                            }
                            ?>

                            <p class="text-justify">
                                <?php echo $mokhtasar ; ?>
                            </p>
                            <a href="<?php echo $link ?>">
                                <div class="col-md-4 button col-sm-12 col-xs-12">

                                    بیشتر بخوانید
                                </div>
                            </a>
                        </div>
                        <?php
                        if (strlen($image)>0){
                            ?>
                            <div class=" col-md-3 col-sm-3 col-xs-3 parimg">
                                <img src="<?php echo $image ?>" class="circle circleIn">
                            </div>
                            <?php
                        }
                        else{ ?>
                            <div class=" col-md-3 col-sm-3 col-xs-3 parimg">
                                <div class="noImg ">
                                    <span class="glyphicon glyphicon-user circleIn"></span>
                                </div>
                            </div>
                        <?php }
                        ?>
                        <div class="col-md-12 col-xs-12 text-left">
                            <a href="allInterviws.php" class="col-md-11 col-md-offset-1 more text-left">
                                تمام مصاحبه‌ها ...
                            </a>
                        </div>

                    </div>
                    <?php
                }

                ?>




            </div>

            <div class="col-md-12 rightBut pull-right">
                <?php
                while ( ($row=$result->fetch_assoc()) && ($x<6)) {
                    $x++;
                    $name=$row['topic'];
                    $link = '/blog/'.$row['post_name'];
                    $mokhtasar = $row['Mokhtasar'];
                    ?>

                    <a class="maghaleA" href="<?php echo $link ?>">
                        <div class="col-md-10 col-md-offset-1 maghale">
                            <h2 class="h3size">
                                <?php echo $name ; ?>
                            </h2>
                            <p>
                                <?php echo $mokhtasar ; ?>
                            </p>
                        </div>
                    </a>

                    <?php
                }
                ?>
                <div class="col-md-3 button">
                    <a href="allBlogs.php">
                    تمام مقالات
                    </a>
                </div>
            </div>

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