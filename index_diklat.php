<?php 
  
  error_reporting(E_ALL ^ (E_NOTICE | E_WARNING)); 

  include 'config/tgl_indo.php';
  include 'config/tgl_hari.php'; 
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Aplikasi Ujian Online Komptensi Karyawan</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index_diklat.php">Diklat</a> 
            </div>
  <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;"> <?php echo tgl_indo(date('Y-m-d')); ?> &nbsp; <a href="login.php" class="btn btn-danger square-btn-adjust">Logout</a> </div>
        </nav>   
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
          				<li class="text-center">
                        <img src="assets/img/find_user.png" class="user-image img-responsive"/>
          					</li>
                    <li>
                        <a  href="index_diklat.php"><i class="fa fa-dashboard fa-3x"></i>Dashboard</a>
                    </li>
                    <li>
                        <a  href="?page=ubah_password"><i class="fa fa-user fa-3x"></i>Ubah Password</a>
                    </li>
                    <li>
                        <a href="?page=hasil_test_keseluruhan"><i class="fa fa-database fa-3x"></i>Hasil Test Keseluruhan</a>
                    </li>	
                    <li>
                        <a href="?page=data_karyawan"><i class="fa fa-group fa-3x"></i>Data Karyawan</a>
                    </li> 
                </ul>
               
            </div>
            
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <?php
                       
                        $page=$_GET['page'];
                        $aksi=$_GET['aksi'];

                        if($page == "ubah_password"){
                          if($aksi == ""){
                            include "page/diklat/ubah_password/ubah_password.php";
                          }else if($aksi == "edit"){
                            include "page/diklat/ubah_password/edit.php";
                          }
                        } if ($page == "hasil_test_keseluruhan") {
                            if ($aksi == "") {
                              include "page/diklat/hasil_test_keseluruhan/hasil_test_keseluruhan.php";
                          } else if ($aksi == "lihat") {
                              include "page/diklat/hasil_test_keseluruhan/lihat.php";
                            }
                        } if ($page == "data_karyawan") {
                            if ($aksi == "") {
                              include "page/diklat/data_karyawan/data_karyawan.php";
                            } else if ($aksi == "lihat") {
                              include "page/diklat/data_karyawan/lihat.php";
                            }
                        } else if ($page=="") {
                            include "home.php";
                        } 
                     ?>
                       
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />
               
    </div>
             <!-- /. PAGE INNER  -->
             <footer class="main-footer">
              <div class="pull-center hidden-xs">
                <center><strong>Copyright &copy; 2018-2019 Muhammad Nugi Kusuma Wardana</a>.</strong> All rights
                reserved.</center>
              </div>
            </footer>
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    
   
</body>
</html>
