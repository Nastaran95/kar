<?php
/**
 * Created by PhpStorm.
 * User: Nastaran
 * Date: 8/3/18
 * Time: 11:51 PM
 */

include "Settings.php";
$page = $_GET['page'];
$typ = $_GET['typ'];

if ($typ==1){
    if ($page==-1)
        $page = 1;
    $query = "SELECT * FROM azmun WHERE (typ='2' and state='1')" ;
    $result = $connection->query($query);
    $pagenum = $result->num_rows;
    if ($page==-2)
        $page = floor(($pagenum+4) / 5);

    $a = ($page-1)*5;
    $query = "SELECT * FROM azmun WHERE (typ='2' and state='1') LIMIT $a , 5;";
    $result = $connection->query($query);

    while ($row=$result->fetch_assoc()) {
        $name=$row['title'];
        $link = '/azmun/'.$row['englishName']
        ?>
        <div class="col-md-12 colorWhite col-sm-12 col-xs-12">
            <div class="col-md-1 pull-right icon col-xs-1"><img src="images/pre-news.png" ></div>
            <div class="col-md-11 col-xs-11">
                <a class="navnavbarlink" href="<?php echo $link?>"> <?php echo $name?> </a>
                <p></p>
                <a class="navnavbarlink pull-left" href="/Home/PostView/94"> ادامه خبر ...</a>
            </div>
        </div>
        <?php
    }

    ?>

    <div class="pagination-container pull-left">
        <ul class="pagination">
            <li id="-1" class="PagedList-skipToNext paginationoldAzmun" rel="prev"> >> </li>
            <li id="1" class="paginationoldAzmun <?php if (1==$page) echo "active" ?>">1</li>
            <?php
            if($page>3)
                echo "<li>...</li>";
            $x = ($pagenum+4) / 5 ;
            for ($i=max(2,$page-1) ; $i <= min($page+1,$x) ; $i++){
                ?>
                <li id="<?php echo $i?>" class="paginationoldAzmun <?php if ($i==$page) echo "active" ?>"><?php echo $i?></li>
                <?php
            }
            $i--;
            if ($i<max(1,floor($x)-1))
                echo "<li>...</li>";
            if ($i<max(1,floor($x))){
            ?>
            <li id="<?php echo floor($x)?>" class="paginationoldAzmun"><?php echo floor($x)?></li>
            <?php
            }
            ?>



            <li id="-2" class="PagedList-skipToNext paginationoldAzmun" rel="next"> << </li>
        </ul>

    </div>
<?php
}


else if($typ==2){
    if ($page==-1)
        $page = 1;
    $query = "SELECT * FROM news " ;
    $result = $connection->query($query);
    $pagenum = $result->num_rows;
    if ($page==-2)
        $page = floor(($pagenum+4) / 5);

    $a = ($page-1)*5;
    $query = "SELECT * FROM news LIMIT $a , 5;";
    $result = $connection->query($query);

    while ($row=$result->fetch_assoc()) {
        $name=$row['title'];
        $link = '/azmun/'.$row['englishName']
        ?>
        <div class="col-md-12 colorWhite col-sm-12 col-xs-12">
            <div class="col-md-1 pull-right icon col-xs-1"><img src="images/pre-news.png" ></div>
            <div class="col-md-11 col-xs-11">
                <a class="navnavbarlink" href="<?php echo $link?>"> <?php echo $name?> </a>
                <p></p>
                <a class="navnavbarlink pull-left" href="/Home/PostView/94"> ادامه خبر ...</a>
            </div>
        </div>
        <?php
    }

    ?>

    <div class="pagination-container pull-left">
        <ul class="pagination">
            <li id="-1" class="PagedList-skipToNext paginationoldNews" rel="prev"> >> </li>
            <li id="1" class="paginationoldNews <?php if (1==$page) echo "active" ?>">1</li>
            <?php
            if($page>3)
                echo "<li>...</li>";
            $x = ($pagenum+4) / 5 ;
            for ($i=max(2,$page-1) ; $i <= min($page+1,$x) ; $i++){
                ?>
                <li id="<?php echo $i?>" class="paginationoldNews <?php if ($i==$page) echo "active" ?>"><?php echo $i?></li>
                <?php
            }
            $i--;
            if ($i<max(1,floor($x)-1))
                echo "<li>...</li>";
            if ($i<max(1,floor($x))){
                ?>
                <li id="<?php echo floor($x)?>" class="paginationoldNews"><?php echo floor($x)?></li>
                <?php
            }
            ?>



            <li id="-2" class="PagedList-skipToNext paginationoldNews" rel="next"> << </li>
        </ul>

    </div>
    <?php
}
else if($typ==3){
    if ($page==-1)
        $page = 1;
    $query = "SELECT * FROM BLOG " ;
    $result = $connection->query($query);
    $pagenum = $result->num_rows;
    if ($page==-2)
        $page = floor(($pagenum+4) / 5);

    $a = ($page-1)*5;
    $query = "SELECT * FROM BLOG LIMIT $a , 5;";
    $result = $connection->query($query);


    while ($row=$result->fetch_assoc()) {
        $name=$row['topic'];
        $link = '/blog/'.$row['post_name'];
        $mokhtasar = $row['Mokhtasar'];
        ?>


        <a class="maghaleA" href="<?php echo $link ?>">
            <div class="col-md-12 maghale">
                <h2 class="h3size">
                    <?php echo $name ; ?>
                </h2>
                <p class="text-justify">
                    <?php echo $mokhtasar ; ?>
                </p>
            </div>
        </a>
        <?php
    }

    ?>

    <div class="pagination-container pull-left">
        <ul class="pagination">
            <li id="-1" class="PagedList-skipToNext paginationoldBlogs" rel="prev"> >> </li>
            <li id="1" class="paginationoldNews <?php if (1==$page) echo "active" ?>">1</li>
            <?php
            if($page>3)
                echo "<li>...</li>";
            $x = ($pagenum+4) / 5 ;
            for ($i=max(2,$page-1) ; $i <= min($page+1,$x) ; $i++){
                ?>
                <li id="<?php echo $i?>" class="paginationoldBlogs <?php if ($i==$page) echo "active" ?>"><?php echo $i?></li>
                <?php
            }
            $i--;
            if ($i<max(1,floor($x)-1))
                echo "<li>...</li>";
            if ($i<max(1,floor($x))){
                ?>
                <li id="<?php echo floor($x)?>" class="paginationoldBlogs"><?php echo floor($x)?></li>
                <?php
            }
            ?>



            <li id="-2" class="PagedList-skipToNext paginationoldBlogs" rel="next"> << </li>
        </ul>

    </div>
    <?php
}
