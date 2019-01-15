<?php
include '../config/db.conf.php';

$con = mysqli_connect(__HOST,__USERNAME,__PASSWORD,__DATABASE);

// Check connection
if (mysqli_connect_errno())
{
    return  "Failed to connect to MySQL: " . mysqli_connect_error();
}

?>
