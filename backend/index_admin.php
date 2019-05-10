<?php 
  
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

session_start();

include 'config/tgl_indo.php';
include 'config/tgl_hari.php';
include 'config/fisher_yates_soal.php';
include 'config/koneksi2.php';
include 'config/tanggal_indo.php';

date_default_timezone_set('Asia/Jakarta');

if ($_SESSION['admin']) {
   
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <?php include 'head.php' ?>
</head>
<body>
    <div id="wrapper">
        <?php include 'navbar.php' ?>   
           <!-- /. NAV TOP  -->
          <?php include 'nav_top2.php' ?> 
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
                            include "page/ubah_password/ubah_password.php";
                          } else if($aksi == "edit"){
                            include "page/ubah_password/edit.php";
                          }
                        } if ($page == "aturan") {
                            if ($aksi == "") {
                              include "page/aturan/aturan.php";
                          } else if ($aksi =="ubah") {
                             include "page/aturan/ubah_aturan.php";
                          }
                        } if ($page == "materi") {
                          if ($aksi == "") {
                              include "page/materi/data_ujian_materi.php";
                            } else if ($aksi == "tambah") {
                              include "page/materi/tambah.php";
                            } else if ($aksi == "ubah") {
                              include "page/materi/ubah.php";
                            } else if ($aksi == "hapus") {
                              include "page/materi/hapus.php";
                            } else if ($aksi == "lihat") {
                              include "page/materi/lihat.php";
                            }
                        }  if ($page == "data_karyawan") {
                            if ($aksi == "") {
                              include "page/data_karyawan/data_karyawan.php";
                            } else if ($aksi == "lihat") {
                              include "page/data_karyawan/lihat.php";
                            } else if ($aksi == "tambah") {
                              include "page/data_karyawan/tambah.php";
                            } else if ($aksi == "ubah") {
                              include "page/data_karyawan/ubah.php";
                            } else if ($aksi == "hapus") {
                              include "page/data_karyawan/hapus.php";
                            } else if ($aksi == "import_excel") {
                              include "page/data_karyawan/import_excel.php";
                            } else if ($aksi == "proses_import") {
                              include "page/data_karyawan/proses_import.php";
                            } else if ($aksi == "aktif_user") {
                              include "page/data_karyawan/aktif_user.php";
                            } else if ($aksi == "non_aktif_user") {
                              include "page/data_karyawan/non_aktif_user.php";
                            } else if ($aksi == "aktif_semua_user") {
                              include "page/data_karyawan/aktif_semua_user.php";
                            } else if ($aksi == "non_aktif_semua_user") {
                              include "page/data_karyawan/non_aktif_semua_user.php";
                            }
                        } if ($page == "golongan") {
                            if ($aksi == "") {
                              include "page/data_karyawan/golongan/data_golongan.php";
                            } else if ($aksi == "lihat") {
                              include "page/data_karyawan/golongan/lihat.php";
                            } else if ($aksi == "tambah") {
                              include "page/data_karyawan/golongan/tambah.php";
                            } else if ($aksi == "ubah") {
                              include "page/data_karyawan/golongan/ubah.php";
                            } else if ($aksi == "hapus") {
                              include "page/data_karyawan/golongan/hapus.php";
                            } else if ($aksi == "import_excel") {
                              include "page/data_karyawan/golongan/import_excel.php";
                            } else if ($aksi == "proses_import") {
                              include "page/data_karyawan/golongan/proses_import.php";
                            }
                        }if ($page == "timer_ujian") {
                            if ($aksi == "") {
                              include "page/pengaturan/ubah_timer_ujian.php";
                            } 
                        }  if ($page == "status_ujian") {
                            if ($aksi == "") {
                              include "page/pengaturan/status_ujian.php";
                            } else if ($aksi == "ubah_non_aktif") {
                              include "page/pengaturan/ubah_non_aktif.php";
                            } else if ($aksi == "ubah_aktif") {
                              include "page/pengaturan/ubah_aktif.php";
                            } else if ($aksi == "pre_test_aktif") {
                              include "page/pengaturan/pre_test_aktif.php";
                            } else if ($aksi == "pre_test_non_aktif") {
                              include "page/pengaturan/pre_test_non_aktif.php";
                            } else if ($aksi == "post_test_aktif") {
                              include "page/pengaturan/post_test_aktif.php";
                            } else if ($aksi == "post_test_non_aktif") {
                              include "page/pengaturan/post_test_non_aktif.php";
                            } 
                        } if ($page == "pelatihan") {
                          if ($aksi == "") {
                            include "page/pelatihan/data_pelatihan.php";
                          } else if ($aksi == "tambah") {
                            include "page/pelatihan/tambah.php";
                          } else if ($aksi == "ubah") {
                            include "page/pelatihan/ubah.php";
                          } else if ($aksi == "hapus") {
                            include "page/pelatihan/hapus.php";
                          }
                        } if ($page == "soal_ujian") {
                          if ($aksi == "") {
                            include "page/soal_ujian/daftar_soal_ujian.php";
                          } else if ($aksi == "tipe_test") {
                            include "page/soal_ujian/daftar_tipe_test.php";
                          } else if ($aksi == "data_soal") {
                            include "page/soal_ujian/data_soal_ujian.php";
                          } else if ($aksi == "tambah") {
                            include "page/soal_ujian/tambah.php";
                          } else if ($aksi == "lihat") {
                            include "page/soal_ujian/lihat.php";
                          } else if ($aksi == "ubah") {
                            include "page/soal_ujian/ubah.php";
                          } else if ($aksi == "hapus") {
                            include "page/soal_ujian/hapus.php";
                          } else if ($aksi == "hapus_semua_soal") {
                            include "page/soal_ujian/hapus_semua_soal.php";
                          } else if ($aksi == "import_excel") {
                            include "page/soal_ujian/import_excel.php";
                          } else if ($aksi == "aktif") {
                            include "page/soal_ujian/aktif.php";
                          } else if ($aksi == "non_aktif") {
                            include "page/soal_ujian/non_aktif.php";
                          }
                        } if ($page == "unit_kerja") {
                          if ($aksi == "") {
                            include "page/data_karyawan/unit_kerja/data_unit_kerja.php";
                          } else if ($aksi == "tambah") {
                            include "page/data_karyawan/unit_kerja/tambah.php";
                          } else if ($aksi == "ubah") {
                            include "page/data_karyawan/unit_kerja/ubah.php";
                          } else if ($aksi == "hapus") {
                            include "page/data_karyawan/unit_kerja/hapus.php";
                          } else if ($aksi == "lihat") {
                            include "page/data_karyawan/unit_kerja/lihat.php";
                          } else if ($aksi == "import_excel") {
                            include "page/data_karyawan/unit_kerja/import_excel.php";
                          } else if ($aksi == "format_import_excel") {
                            include "page/data_karyawan/unit_kerja/format_unit_kerja.xls";
                          }
                        } if ($page == "jabatan") {
                          if ($aksi == "") {
                            include "page/data_karyawan/jabatan/data_jabatan.php";
                          } else if ($aksi == "tambah") {
                            include "page/data_karyawan/jabatan/tambah.php";
                          } else if ($aksi == "ubah") {
                            include "page/data_karyawan/jabatan/ubah.php";
                          } else if ($aksi == "hapus") {
                            include "page/data_karyawan/jabatan/hapus.php";
                          } else if ($aksi == "lihat") {
                            include "page/data_karyawan/jabatan/lihat.php";
                          } else if ($aksi == "import_excel") {
                            include "page/data_karyawan/jabatan/import_excel.php";
                          } else if ($aksi == "proses_import_excel") {
                            include "page/data_karyawan/jabatan/proses_import_excel.php";
                          } else if ($aksi == "format_import_excel") {
                            include "page/data_karyawan/jabatan/format_jabatan.xls";
                          }
                        } if ($page == "laporan_sudah_test") {
                          if ($aksi == "") {
                            include "page/hasil_test_keseluruhan/data_sudah_test/daftar_sudah_mengikuti_ujian.php";
                          } else if ($aksi == "tipe_test") {
                            include "page/hasil_test_keseluruhan/data_sudah_test/daftar_tipe_test.php";
                          } else if ($aksi == "data_laporan_sudah_test") {
                            include "page/hasil_test_keseluruhan/data_sudah_test/data_sudah_test.php";
                          }
                        } if ($page == "laporan_belum_test") {
                          if ($aksi == "") {
                            include "page/hasil_test_keseluruhan/data_belum_test/daftar_belum_mengikuti_ujian.php";
                          } else if ($aksi == "tipe_test") {
                            include "page/hasil_test_keseluruhan/data_belum_test/daftar_tipe_test.php";
                          } else if ($aksi == "data_laporan_belum_test") {
                            include "page/hasil_test_keseluruhan/data_belum_test/data_belum_test.php";
                          }
                        } if ($page == "laporan_hasil_test") {
                          if ($aksi == "") {
                            include "page/hasil_test_keseluruhan/data_hasil_test/daftar_hasil_test.php";
                          } else if ($aksi == "tipe_test") {
                            include "page/hasil_test_keseluruhan/data_hasil_test/daftar_tipe_test.php";
                          } else if ($aksi == "status_ujian") {
                            include "page/hasil_test_keseluruhan/data_hasil_test/daftar_keterangan_test.php";
                          } else if ($aksi == "data_laporan_hasil_test") {
                            include "page/hasil_test_keseluruhan/data_hasil_test/data_hasil_test.php";
                          } else if ($aksi == "hapus") {
                            include "page/hasil_test_keseluruhan/data_hasil_test/hapus.php";
                          }
                        } if ($page == "laporan_hasil_test_keseluruhan") {
                          if ($aksi == "") {
                            include "page/hasil_test_keseluruhan/hasil_test_keseluruhan.php";
                          } else if ($aksi == "lihat") {
                            include "page/hasil_test_keseluruhan/lihat.php";
                          }
                        } if ($page == "about") {
                            if ($aksi == "" ) {
                              include "page/about/about.php";
                            }
                        } else if ($page=="") {
                            include "home.php";
                        } 
                     ?>
                       
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr/>
               
    </div>
             <!-- /. PAGE INNER  -->
            
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
}else{
  ?>
  <script type="text/javascript">         
  alert("Anda Harus Login!");
  window.location.href="index.php";
</script>
<?php
    
  }
?>