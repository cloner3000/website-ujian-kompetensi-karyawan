<?php 
  
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING)); 

session_start();

include 'config/tgl_indo.php';
include 'config/tgl_hari.php';
include 'config/fisher_yates_soal.php';
include 'config/koneksi2.php';
include 'config/tanggal_indo.php';
include 'config/klasifikasi_naive_bayes.php';

$nip= $_SESSION['nip'];

$sql = mysqli_query($koneksi, "SELECT * FROM t_pegawai WHERE nip='$nip'");

if(mysqli_num_rows($sql) == 0){
    header("Location: login.php");
  }else{
    $row = mysqli_fetch_assoc($sql);
  }

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <?php include 'head.php' ?>
</head>
<script type = "text/javascript" >
  function preventBack(){window.history.forward();}
  setTimeout("preventBack()", 0);
  window.onunload=function(){null};
</script>
<body>
    <div id="wrapper">
        <?php include 'navbar.php' ?>   
    </div>
        </nav>   
           <!-- /. NAV TOP  -->
           <?php include 'nav_top.php' ?> 
          
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <?php
                       
                        $page=$_GET['page'];
                        $aksi=$_GET['aksi'];

                        if($page == "profil"){
                          if($aksi == ""){
                            include "page/user/profil/profil.php";
                          }else if($aksi == "ubah"){
                            include "page/user/profil/ubah_profil.php";
                          }
                        } if ($page == "ubah_password") {
                            if ($aksi == "" ) {
                              include "page/user/profil/ubah_password.php";
                            }
                        } if ($page == "aturan") {
                            if ($aksi == "") {
                              include "page/user/aturan/aturan.php";
                            }
                        } if ($page == "hasil_test") {
                          if ($aksi == "") {
                              include "page/user/hasil_test/hasil_test.php";
                            }
                        }if ($page == "mulai_test2") {
                         if ($aksi == "") {
                              include "page/user/mulai_test/mulai_ujian2.php";
                            } else if ($aksi == "tipe_test") {
                              include "page/user/mulai_test/test/daftar_tipe_test.php";
                            } else if ($aksi == "materi") {
                              include "page/user/mulai_test/test/materi.php";
                            } else if ($aksi == "test") {
                              include "page/user/mulai_test/test/test.php";
                            } else if ($aksi == "hasil") {
                              include "page/user/mulai_test/test/hasil.php";
                            }
                        } if ($page == "about") {
                            if ($aksi == "" ) {
                              include "page/user/about/about.php";
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
    <!-- DATA TABLE SCRIPTS -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
    <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    
   
</body>
</html>
<?php

?>