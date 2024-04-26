<?php include('../../../database/conn.php');?>
<?php include('../../../database/function.php');?>
<?php session_start(); ?>
<?php include('login_restriction.php');?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>SKILLED GARAGE</title>
  <!-- Favicon -->
  <link rel="icon" href="../../../assets/img/brand/icon.jpg" type="image/jpg">

  <link rel="stylesheet" href="../../../css/bootstrap.min.css" type="text/css">
  <link rel="stylesheet" href="../../../css/font.css" type="text/css">
  <link rel="stylesheet" href="../../../assets/vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="../../../css/dataTables.bootstrap4.min.css" type="text/css">
  <link rel="stylesheet" href="../../../css/dataTables.dataTables.min.css" type="text/css">
  <link rel="stylesheet" href="../../../css/dataTables.jqueryui.min.css" type="text/css">
  <link rel="stylesheet" href="../../../css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="../../../css/styles.css" type="text/css">
  <link rel="stylesheet" href="../../../css/jquery.dataTables.min.css" type="text/css">
  
  <link rel="stylesheet" href="../../../assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
  <link rel="stylesheet" href="../../../assets/css/argon.css?v=1.2.0" type="text/css">
  <script src='../../../js/jquery-3.3.1.min.js'></script>
  <script src="../../../js/bootstrap.min.js"></script>
  <script src="../../../js/dataTables.bootstrap4.min.js"></script>
  <script src="../../../js/dataTables.dataTables.min.js"></script>
  <script src="../../../js/dataTables.jqueryui.min.js"></script>
  <script src="../../../js/jquery.dataTables.min.js"></script>
  <script src="../../../js/scripts.js"></script>
  <script src="../../../js/utils.js"></script>

</head>
<script>
$(document).ready(function() {
    $('.datatable').DataTable();
} );
</script>
