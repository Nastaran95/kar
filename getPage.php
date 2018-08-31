<?php
/**
 * Created by PhpStorm.
 * User: Nastaran
 * Date: 8/3/18
 * Time: 11:51 PM
 */

include "/Settings.php";
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
            <div class="col-md-1 pull-right icon col-xs-1"><img src="/images/pre-news.png" ></div>
            <div class="col-md-11 col-xs-11">
                <a class="navnavbarlink" href="<?php echo $link?>"> <?php echo $name?> </a>
                <p></p>
                <a class="navnavbarlink pull-left" href="<?php echo $link?>"> ادامه خبر ...</a>
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
        $link = '/new/'.$row['englishName']
        ?>
        <div class="col-md-12 colorWhite col-sm-12 col-xs-12">
            <div class="col-md-1 pull-right icon col-xs-1"><img src="/images/pre-news.png" ></div>
            <div class="col-md-11 col-xs-11">
                <a class="navnavbarlink" href="<?php echo $link?>"> <?php echo $name?> </a>
                <p></p>
                <a class="navnavbarlink pull-left" href="<?php echo $link?>"> <?php echo $row['realtime']?> </a>
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
            <li id="1" class="paginationoldBlogs <?php if (1==$page) echo "active" ?>">1</li>
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

else if($typ==4){
    if ($page==-1)
        $page = 1;
    $query = "SELECT * FROM mosahebe " ;
    $result = $connection->query($query);
    $pagenum = $result->num_rows;
    if ($page==-2)
        $page = floor(($pagenum+4) / 5);

    $a = ($page-1)*5;
    $query = "SELECT * FROM mosahebe LIMIT $a , 5;";
    $result = $connection->query($query);


    while ($row=$result->fetch_assoc()) {
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

    ?>

    <div class="pagination-container pull-left">
        <ul class="pagination">
            <li id="-1" class="PagedList-skipToNext paginationoldInterviews" rel="prev"> >> </li>
            <li id="1" class="paginationoldInterviews <?php if (1==$page) echo "active" ?>">1</li>
            <?php
            if($page>3)
                echo "<li>...</li>";
            $x = ($pagenum+4) / 5 ;
            for ($i=max(2,$page-1) ; $i <= min($page+1,$x) ; $i++){
                ?>
                <li id="<?php echo $i?>" class="paginationoldInterviews <?php if ($i==$page) echo "active" ?>"><?php echo $i?></li>
                <?php
            }
            $i--;
            if ($i<max(1,floor($x)-1))
                echo "<li>...</li>";
            if ($i<max(1,floor($x))){
                ?>
                <li id="<?php echo floor($x)?>" class="paginationoldInterviews"><?php echo floor($x)?></li>
                <?php
            }
            ?>



            <li id="-2" class="PagedList-skipToNext paginationoldInterviews" rel="next"> << </li>
        </ul>

    </div>
    <?php
}


else if($typ==5){
    if ($page==-1)
        $page = 1;
    $query = "SELECT * FROM BOOK " ;
    $result = $connection->query($query);
    $pagenum = $result->num_rows;
    if ($page==-2)
        $page = floor(($pagenum+4) / 5);

    $a = ($page-1)*5;
    $query = "SELECT * FROM BOOK LIMIT $a , 5;";
    $result = $connection->query($query);


    while ($row=$result->fetch_assoc()) {
        $name = $row['topic'];
        $writer = $row['writer'];
        $motarjem = $row['motarjem'];
        $nashr = $row['nashr'];
        $link = '/book/'.$row['post_name'];
        $mokhtasar = $row['Mokhtasar'];
        $image = $row['image'];
        $image = substr($image,3);
        ?>

        <div class="col-md-12 bookdiv">
            <div class="col-md-3 pull-right">
                <img src="<?php echo $image; ?>" width="100%" height="300">
            </div>

            <div class="col-md-9 bookText pull-right">
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
                <div class="col-md-4 pull-left bookBut">
                    در مورد این کتاب بیشتر بخوانید
                </div>
            </a>
        </div>
        <br>

        <?php
    }
    ?>

    <div class="pagination-container pull-left">
        <ul class="pagination">
            <li id="-1" class="PagedList-skipToNext paginationoldBooks" rel="prev"> >> </li>
            <li id="1" class="paginationoldBooks <?php if (1==$page) echo "active" ?>">1</li>
            <?php
            if($page>3)
                echo "<li>...</li>";
            $x = ($pagenum+4) / 5 ;
            for ($i=max(2,$page-1) ; $i <= min($page+1,$x) ; $i++){
                ?>
                <li id="<?php echo $i?>" class="paginationoldBooks <?php if ($i==$page) echo "active" ?>"><?php echo $i?></li>
                <?php
            }
            $i--;
            if ($i<max(1,floor($x)-1))
                echo "<li>...</li>";
            if ($i<max(1,floor($x))){
                ?>
                <li id="<?php echo floor($x)?>" class="paginationoldBooks"><?php echo floor($x)?></li>
                <?php
            }
            ?>



            <li id="-2" class="PagedList-skipToNext paginationoldBooks" rel="next"> << </li>
        </ul>

    </div>
    <?php
}
