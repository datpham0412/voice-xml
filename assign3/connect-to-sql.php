<?php 
include_once "settings.php";
$connection = new mysqli($host, $user, $pwd, $sql_db);
mysqli_set_charset($connection,"utf8");
if ($connection->connect_errno) {
    echo $connection->connect_errno;
}