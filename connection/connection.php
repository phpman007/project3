<?php
include '../config/db.conf.php';

error_reporting(1);

$con = mysqli_connect(__HOST,__USERNAME,__PASSWORD,__DATABASE);

mysqli_set_charset($con,"utf8");

// Check connection
if (mysqli_connect_errno())
{
    return  "Failed to connect to MySQL: " . mysqli_connect_error();
}

?>
