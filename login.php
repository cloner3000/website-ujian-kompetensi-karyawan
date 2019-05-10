<?php 
  
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
ob_start();
session_start();

include 'config/tgl_indo.php';
include 'config/tgl_hari.php';
include 'config/fisher_yates_soal.php';
include 'config/koneksi2.php';
include 'config/tanggal_indo.php';

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <?php include 'head.php' ?>

</head>
<body>
    <div class="container">
        <div class="row text-center ">
            <div class="col-md-12">
                <br /><br />
                <h2>Selamat Datang</h2>
               
                <h5>Aplikasi Ujian Kompetensi Karyawan</h5>
                 <br />
            </div>
        </div>
         <div class="row ">
            <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                  <div class="panel panel-default">
                      <div class="panel-heading">
                  <strong> Silahkan Masukkan NIP dan Password </strong>  
                      </div>
                      <div class="panel-body">
                          <form role="form" method="POST">
                                 <br />
                               <div class="form-group input-group">
                                      <span class="input-group-addon"><i class="fa fa-user"  ></i></span>
                                      <input type="text" name="nip" class="form-control" placeholder="NIP" />
                                  </div>
                                  <div class="form-group input-group">
                                      <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                                      <input type="password" name="password" class="form-control"  placeholder="Password" />
                                  </div>
                                <input type="submit" name="login" value="Login" class="btn btn-primary">
                              <hr />

                              </form>
                      </div> 
                  </div>
              </div>      
        </div>
        <footer class="main-footer">
          <div class="pull-center hidden-xs">
            <center><strong>Copyright &copy; 2018-2019 Muhammad Nugi Kusuma Wardana</a>.</strong> All rights
            reserved.</center>
          </div>
        </footer>
    </div>


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

<?php


  if (isset($_POST['login'])) {
    if (empty($_POST['nip'])) {
       echo "<script>alert('Anda Harus Mengisi NIP!');
        document.location.href='login.php';</script>";
    }
    else if  (empty($_POST['password'])) {
       echo "<script>alert('Anda Harus Mengisi Password!');
        document.location.href='login.php';</script>";
    } else {

    $nip = $_POST['nip'];
    $password = $_POST['password'];

    $sql = $koneksi-> query("select * from t_pegawai where nip='$nip' and password='$password'");

    $data = $sql->fetch_assoc();

    $ketemu = $sql->num_rows;

    if ($ketemu >= 1) {
      if ($data['nip'] == $nip) {
        $_SESSION['nip'] = $nip;
        header("location:index.php");
      } else {
        ?>
          <script type="text/javascript">
            alert("Login gagal username dan password anda salah... silahkan ulangi lagi");
          </script>
        <?php
      }
    }
  }
}
?>