<?php
/**
 * Created by PhpStorm.
 * User: HamidReza
 * Date: 18/03/2018
 * Time: 07:40 PM
 */
session_start();
include '../Settings.php';
$ID=$_GET['ID'];
$tab= $_GET['Table'];
$ID=str_replace(" ","-",$ID);
if($tab==1)
    $query="SELECT * from blog where post_name='$ID'";
else if($tab==2)
    $query="SELECT * from book where post_name='$ID'";
$result = $connection->query($query);
if ($result->num_rows>0){
    echo "0";
}else {
    echo "1";
}