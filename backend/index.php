<?php 
  
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
ob_start();
session_start();

include 'config/tgl_indo.php';
include 'config/tgl_hari.php';
include 'config/fisher_yates_soal.php';
include 'config/koneksi2.php';
include 'config/tanggal_indo.php';

if ($_SESSION['admin']) {
    header("Location:index.php");
}else{
  
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
               
                <h5>Aplikasi Ujian Kompetensi Karyawan (admin)</h5>
                 <br />
            </div>
        </div>
         <div class="row ">
            <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                  <div class="panel panel-default">
                      <div class="panel-heading">
                  <strong>Silahkan Masukkan Username dan Password</strong>  
                      </div>
                      <div class="panel-body">
                          <form role="form" method="POST">
                                 <br />
                               <div class="form-group input-group">
                                      <span class="input-group-addon"><i class="fa fa-user"  ></i></span>
                                      <input type="text" name="username" class="form-control" placeholder="Username" />
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
    if (empty($_POST['username'])) {
       echo "<script>alert('Anda Harus Mengisi Username!');
        document.location.href='index.php';</script>";
    }
    else if  (empty($_POST['password'])) {
       echo "<script>alert('Anda Harus Mengisi Password!');
        document.location.href='index.php';</script>";
    }  else  {

      $username = $_POST['username'];
      $password = $_POST['password'];

      $sql = $koneksi-> query("select * from t_user where username='$username' and password='$password'");

      $data = $sql->fetch_assoc();

      $ketemu = $sql->num_rows;

      if ($ketemu >= 1) {
        if ($data['level'] == "admin") {
          $_SESSION['admin'] = $data['id_user'];
          header("location:index_admin.php");
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
}
?>