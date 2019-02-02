<?php

include '../connection/connection.php';

if (empty($_SESSION['member'])) {
    header( "location: login.php" );
    exit(0);
}

$member = $_SESSION['member'];

 ?>

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
    <meta name="author" content="Coderthemes">

    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <title>Minton - Responsive Admin Dashboard Template</title>

    <link href="../plugins/switchery/switchery.min.css" rel="stylesheet" />

    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/icons.css" rel="stylesheet" type="text/css">
    <link href="assets/css/lightbox.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/style.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="assets/summernote/summernote.css" />
    <script src="assets/js/modernizr.min.js"></script>
</head>
