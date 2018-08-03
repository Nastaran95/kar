<?php
/**
 * Created by PhpStorm.
 * User: Nastaran
 * Date: 8/3/18
 * Time: 11:51 PM
 */

include "Settings.php";
$page = $_GET['page'];
if ($page==-1)
    $page = 1;
$query = "SELECT * FROM azmun WHERE (type='2' and state='1')" ;
$result = $connection->query($query);
$pagenum = $result->num_rows;
if ($page==-2)
    $page = floor(($pagenum+4) / 5);

$a = ($page-1)*5;
$query = "SELECT * FROM azmun WHERE (type='2' and state='1') LIMIT $a , 5;";
$result = $connection->query($query);

while ($row=$result->fetch_assoc()) {
    $name=$row['title'];
    $link = '/azmun/'.$row['englishName']
    ?>
    <div class="col-md-12 colorWhite ">
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
        <li id="-1" class="PagedList-skipToNext" rel="prev"> >> </li>
        <li id="1" class="paginationold <?php if (1==$page) echo "active" ?>">1</li>
        <?php
        if($page>3)
            echo "<li>...</li>";
        $x = ($pagenum+4) / 5 ;
        for ($i=max(2,$page-1) ; $i <= min($page+1,$x) ; $i++){
            ?>
            <li id="<?php echo $i?>" class="paginationold <?php if ($i==$page) echo "active" ?>"><?php echo $i?></li>
            <?php
        }
        $i--;
        if ($i<max(1,floor($x))) {
            echo "<li>...</li>";
            ?>
        <li id="<?php echo floor($x)?>" class="paginationold"><?php echo floor($x)?></li>
        <?php
        }
        ?>



        <li id="-2" class="PagedList-skipToNext" rel="next"> << </li>
    </ul>

</div>