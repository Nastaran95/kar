<?php
/**
 * Created by PhpStorm.
 * User: Nastaran
 * Date: 9/10/18
 * Time: 7:51 PM
 */

session_start();
if ($_SESSION['type'] >0) {
    include '../Settings.php';
    if ((isset($_REQUEST['orderID'])) && (isset($_REQUEST['type']))) {
        $product = $_REQUEST['orderID'];
        $type = $_REQUEST['type'];
        $status= $_REQUEST['status'];
        if ($type == 1)
            $query = "update karjoo_request set status=".$status." WHERE ID = ".$product;
        else if($type == 2)
            $query = "update karfarma_request set status=".$status." WHERE ID = ".$product;
        $result = $connection->query($query);
        if($connection->error){
            return "0";
        }
        else{
            return "1";
        }
    }
}else {
    header('Location:/');
}