<?php
/**
 * Created by PhpStorm.
 * User: maryam
 * Date: 10/28/2017
 * Time: 10:25 AM
 */
session_start();
if (($_SESSION['type'] == 10) || ($_SESSION['type'] == 9)) {
    include '../Settings.php';

    if ((isset($_REQUEST['product'])) && (isset($_REQUEST['type']))) {
        $product = $_REQUEST['product'];
        $type = $_REQUEST['type'];
        if ($type == 1)
            $query = "SELECT * FROM blog WHERE ID = $product";
        else if($type == 2)
            $query = "SELECT * FROM book WHERE ID = $product";
        else if($type == 3)
            $query = "SELECT * FROM azmun WHERE ID = $product";
        $result = $connection->query($query);
        $row = $result->fetch_assoc();
        $name = $row['XMLNAME'];
        unlink($name);
        if ($type == 1)
            $query = "DELETE FROM blog WHERE ID = $product";
        else if($type == 2)
            $query = "DELETE FROM book WHERE ID = $product";
        else if($type == 3)
            $query = "DELETE FROM azmun WHERE ID = $product";
        $result = $connection->query($query);
        if ($type == 1)
            echo '<META HTTP-EQUIV="Refresh" Content="0; URL=/admin/allblog.php?nocache='.generateRandomString(10).'">';
        else if($type == 2)
            echo '<META HTTP-EQUIV="Refresh" Content="0; URL=/admin/allbook.php?nocache='.generateRandomString(10).'">';
        else if($type == 3)
            echo '<META HTTP-EQUIV="Refresh" Content="0; URL=/admin/allAzmun.php?nocache='.generateRandomString(10).'">';

    }
}else {
    header('Location:/');
}
function generateRandomString($length = 5) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
function generateToken2($length = 20)
{
    return bin2hex(openssl_random_pseudo_bytes($length));
}
?>