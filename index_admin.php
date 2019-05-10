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
   <script type="text/javascript" src="assets/ckeditor/ckeditor.js"></script>
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
                <a class="navbar-brand" href="index_admin.php">Admin</a> 
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
                        <a  href="index_admin.php"><i class="fa fa-dashboard fa-1x"></i>Dashboard</a>
                    </li>
                    <li>
                        <a  href="?page=ubah_password"><i class="fa fa-user fa-1x"></i>Ubah Password</a>
                    </li>
                    <li>
                        <a  href="?page=data_karyawan"><i class="fa fa-user fa-1x"></i>Data Karyawan</a>
                    </li>
                    <li>
                        <a  href="?page=aturan"><i class="fa fa-file-word-o fa-1x"></i>Aturan</a>
                    </li>
                    <li>
                        <a  href="?page=materi"><i class="fa fa-desktop fa-1x"></i>Materi</a>
                    </li> 
                    <li>
                        <a href=""><i class="fa fa-book fa-1x"></i>soal<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="?page=soal_bhd">BHD</a>
                            </li>
                             <li>
                                <a href="?page=soal_k3rs">K3RS</a>
                            </li>
                            <li>
                                <a href="?page=soal_kprs">KPRS</a>
                            </li>
                            <li>
                                <a href="?page=soal_ppi">PPI</a>
                            </li>
                        </ul>
                    </li>    
                    <li>
                        <a href="#"><i class="fa fa-database sitemap fa-1x"></i>Data Test Karyawan<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="?page=hasil_test_keseluruhan">Data hasil test keseluruhan</a>
                            </li>
                            <li>
                                <a href="?page=data_sudah_test">Data sudah test keseluruhan</a>
                            </li>
                            <li>
                                <a href="?page=data_belum_test">Data belum test keseluruhan</a>
                            </li>
                        </ul>
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
                            include "page/admin/ubah_password/ubah_password.php";
                          } else if($aksi == "edit"){
                            include "page/admin/ubah_password/edit.php";
                          }
                        } if ($page == "aturan") {
                            if ($aksi == "") {
                              include "page/admin/aturan/aturan.php";
                          }
                        } if ($page == "materi") {
                          if ($aksi == "") {
                              include "page/admin/materi/data_ujian_materi.php";
                            } else if ($aksi == "tambah") {
                              include "page/admin/materi/tambah.php";
                            } else if ($aksi == "ubah") {
                              include "page/admin/materi/ubah.php";
                            }
                        } if ($page == "hasil_test_keseluruhan") {
                            if ($aksi == "") {
                              include "page/admin/hasil_test_keseluruhan/hasil_test_keseluruhan.php";
                            } else if ($aksi == "lihat") {
                              include "page/admin/hasil_test_keseluruhan/lihat.php";
                            } else if ($aksi == "ubah") {
                              include "page/admin/hasil_test_keseluruhan/ubah.php";
                            }
                        } if ($page == "data_sudah_test") {
                            if ($aksi == "") {
                               include "page/admin/hasil_test_keseluruhan/data_sudah_test/data_sudah_test.php";                          
                            }
                        } if ($page == "data_belum_test") {
                            if ($aksi == "") {
                               include "page/admin/hasil_test_keseluruhan/data_belum_test/data_belum_test.php";                          
                            }
                        } if ($page == "data_karyawan") {
                            if ($aksi == "") {
                              include "page/admin/data_karyawan/data_karyawan.php";
                            } else if ($aksi == "lihat") {
                              include "page/admin/data_karyawan/lihat.php";
                            } else if ($aksi == "tambah") {
                              include "page/admin/data_karyawan/tambah.php";
                            } else if ($aksi == "ubah") {
                              include "page/admin/data_karyawan/ubah.php";
                            }
                        }  if ($page == "soal_bhd") {
                            if ($aksi == "") {
                              include "page/admin/soal/bhd/data_soal.php";
                            } else if ($aksi == "tambah") {
                              include "page/admin/soal/bhd/tambah.php";
                            } else if ($aksi == "ubah") {
                              include "page/admin/soal/bhd/ubah.php";
                            }
                        } if ($page == "soal_k3rs") {
                            if ($aksi == "") {
                              include "page/admin/soal/k3rs/data_soal.php";
                            } else if ($aksi == "tambah") {
                              include "page/admin/soal/k3rs/tambah.php";
                            } else if ($aksi == "ubah") {
                              include "page/admin/soal/k3rs/ubah.php";
                            }
                        } if ($page == "soal_kprs") {
                            if ($aksi == "") {
                              include "page/admin/soal/kprs/data_soal.php";
                            } else if ($aksi == "tambah") {
                              include "page/admin/soal/kprs/tambah.php";
                            } else if ($aksi == "ubah") {
                              include "page/admin/soal/kprs/ubah.php";
                            }
                        } if ($page == "soal_ppi") {
                            if ($aksi == "") {
                              include "page/admin/soal/ppi/data_soal.php";
                            } else if ($aksi == "tambah") {
                              include "page/admin/soal/ppi/tambah.php";
                            } else if ($aksi == "ubah") {
                              include "page/admin/soal/ppi/ubah.php";
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
