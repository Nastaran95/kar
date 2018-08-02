<?php
/**
 * Created by PhpStorm.
 * User: Nastaran
 * Date: 8/2/18
 * Time: 7:57 PM
 */

$connection = new mysqli("localhost", "root", "123456", "karasa");
// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}
$connection->query("SET NAMES utf8");