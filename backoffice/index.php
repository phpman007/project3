<?php

include '../connection/connection.php';

if (empty($_SESSION['member'])) {
    header( "location: login.php" );
    exit(0);
}

$member = $_SESSION['member'];

 ?>
