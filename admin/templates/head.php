<?php 
session_start();
if (!isset($_SESSION['username'])) {
   header('Location: login.php'); 
}

$cargo = $_SESSION['cargo'];
                        ?>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> 
<html class="no-js" lang="es"> 
<!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- COMENTE EL TITULO DE ABAJO PORQUE DABA ERROR EN LA PESTAÑA -->
    <!-- <title>Panel administrativo | <?php echo "$title"; ?> </title> -->
    <link rel="icon" href="../img/favicon.png" type="image/png">
    <title>Panel administrativo</title>
    <meta name="description" content="Dashboard">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--Local-->
    <link rel="stylesheet" type="text/css" href="./assets/css/pe-icon-7-stroke/css/pe-icon-7-stroke.css">
    <link rel="stylesheet" type="text/css" href="./assets/css/themify-icons.css">
    <link rel="stylesheet" type="text/css" href="./assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="./assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="./assets/css/webgradients.css">
    <!-- Animated css -->
    <link rel="stylesheet" type="text/css" href="./assets/css/animate.css">
    <!--Font-awesome-->
    <link rel="stylesheet" type="text/css" href="./assets/css/all.css">
    <script type="text/javascript" src="./assets/js/Chart.js"></script>

     <!--Datatables-->
    <link rel="stylesheet" type="text/css" href="./assets/datatables/datatables.min.css"/>
   <script type="text/javascript" src="./assets/datatables/datatables.min.js"></script>
   <script type="text/javascript" src="./assets/css/bootstrap.min.js"></script>
    <!--Select2-->
    <link rel="stylesheet" type="text/css" href="./assets/select2/select2.min.css" />
    <script type="text/javascript" src="./assets/select2/select2.min.js"></script>

    <!-- jspdf -->
    <script src="./assets/jspdf/jspdf.min.js"></script>
<script src="./assets/jspdf/jspdf.plugin.autotable.js"></script>
    
</head>
