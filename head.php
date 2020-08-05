<?php 
error_reporting(0);
session_start();
if ($_SESSION['username'] == null || $_SESSION['password'] == null) {
	echo "<meta http-equiv='refresh' content='0;url=login.php'>";
	exit;
}

include "inc/koneksi.php";
include "config/authentication_users.php";
include "config/fungsi_indotgl.php";
include "config/library.php";
include 'inc/library.php';

$tanggal = tgl_indo(date("Y m d"));
$jam	= date("H:i:s");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/favicon.html">
    <title>BEASISWA </title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-reset.css" rel="stylesheet">
	 <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/advanced-datatable/media/css/demo_page.css" rel="stylesheet" />
    <link href="assets/advanced-datatable/media/css/demo_table.css" rel="stylesheet" />
    <link rel="stylesheet" href="assets/data-tables/DT_bootstrap.css" />
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />
	<!--Form Wizard-->
    <link rel="stylesheet" type="text/css" href="css/jquery.steps.css" />

	<link rel="stylesheet" href="css/owl.carousel.css" type="text/css">
	 <link rel="stylesheet" type="text/css" href="assets/bootstrap-datepicker/css/datepicker.css" />
    <link rel="stylesheet" type="text/css" href="assets/bootstrap-timepicker/compiled/timepicker.css" />
    <link rel="stylesheet" type="text/css" href="assets/bootstrap-daterangepicker/daterangepicker-bs3.css" />
      <link rel="stylesheet" type="text/css" href="assets/bootstrap-datetimepicker/css/datetimepicker.css" />
  </head>
  <body>
  <style>
  
 .card-header {
    border-color: #fff;
    background-image: linear-gradient(135deg, #ec9fa6 0%, #092156 100%);
    font-size: 16px;
    font-weight: 600;
    color: #fff;
}
  </style>

  <section id="container" class="boxed">
      <header class="header white-bg">
          <div class="sidebar-toggle-box">
              <i class="fa fa-bars"></i>
          </div>
          <a href="index.php" class="logo">BEASISWA<span></span></a>
         
          <div class="top-nav ">
              
          </div>
      </header>
      
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <ul class="sidebar-menu" id="nav-accordion">
                <li><a href="index.php"><i class="fa fa-laptop"></i> Beranda</a></li>
                <li><a href="kriteria.php"><i class="fa fa-bar-chart-o"></i> Kriteria Penilaian</a></li>
                <li><a href="sub_kriteria.php"><i class="fa fa-tag"></i> Sub Kriteria</a></li>
                <li><a href="peserta.php"><i class="fa fa-users"></i> Peserta Beasiswa</a></li>
                <li><a href="nilai.php"><i class="fa fa-book"></i> Penilaian Peserta</a></li>
                <li><a href="analisa_hasil2.php"><i class="fa fa-bookmark"></i> Pehitungan MOORA</a></li>
                <li><a href="cetak.php"><i class="fa fa-list"></i> Laporan Penerima</a></li>
                <li><a href="logout.php"><i class="fa fa-power-off"></i> Keluar Aplikasi</a></li>
                </ul>
          </div>
      </aside>
      <section id="main-content">
          <section class="wrapper">
