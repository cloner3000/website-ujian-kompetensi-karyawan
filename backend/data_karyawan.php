<?php 

error_reporting(E_ALL ^ (E_NOTICE | E_WARNING)); 

include 'config/tgl_indo.php';
include 'config/tgl_hari.php';


?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php include 'head.php' ?> 
</head>
<body>
<div id="wrapper">
  <?php include 'navbar.php' ?> 

  <?php include 'nav_top.php' ?>

      <!-- /. NAV SIDE  -->
      <div id="page-wrapper" >
          <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                             Data Karyawan
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Lengkap</th>
                                            <th>Jabatan</th>
                                            <th>Username</th>
                                            <th>Password</th>
                                            <th>Tools</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <a href="lihat_data_karyawan.php" class="btn btn-success">Lihat</a>
                                                <a href="ubah_data_karyawan.php" class="btn btn-info">Ubah</a>
                                                <a onclick="return confirm('Anda Yakin Akan Menghapus Data Ini?')" href="hapus_data_karyawan.php" class="btn btn-danger">Hapus</a>
                                            </td>
                                        </tr>                               
                                    </tbody>
                                </table>
                            </div>
                            <a href="tambah_data_karyawan.php" class="btn btn-success" style="margin-top: 10px"><i class="fa fa-plus"></i>Tambah Karyawan</a>

                                 <a href="./laporan/laporan_anggota_excel.php" target="blank" class="btn btn-default" style="margin-top: 10px"><i class="fa fa-print"></i>Export To Excel</a>
                                 <a href="./laporan/laporan_anggota_pdf.php" target="blank" class="btn btn-default" style="margin-top: 10px"><i class="fa fa-print"></i>Export To PDF</a>
                        </div>
                        <div class="panel-footer">
                            Form Data Karyawan
                        </div>
                    </div>
                </div>
        </div>
               <!-- /. ROW  -->
               <hr />
             
  </div>
           <!-- /. PAGE INNER  -->
             <?php include 'footer.php' ?> 
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
