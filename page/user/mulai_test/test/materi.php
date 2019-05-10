<?php

$nip = $_GET['nip'];

$nama_pelatihan = $_GET['nama_pelatihan'];

$nama_tipe_test = $_GET['nama_tipe_test'];

$sql_status  = $koneksi->query("SELECT * FROM t_pelatihan WHERE nama_pelatihan='$nama_pelatihan'");

$status = $sql_status->fetch_assoc();

if ($status[$nama_tipe_test]=="Y") {
    # code...
} else {
    ?>
    <script type="text/javascript">         
      alert("Anda Tidak bisa masuk halaman ini");
      window.location.href="?page=mulai_test2&aksi=tipe_test&nip=<?php echo $row['nip'];?>&nama_pelatihan=<?php echo $data['nama_pelatihan'];?>&nama_pelatihan=<?php echo $nama_pelatihan;?>&nama_tipe_test=<?php echo $nama_tipe_test;?>";
    </script>
    <?php

}

if ($nama_tipe_test == "Post Test") {
    $sql_cek  = $koneksi->query("SELECT * FROM t_tanggal_test WHERE nip='$nip' and nama_pelatihan='$nama_pelatihan' and nama_tipe_test='Pre Test' and keterangan_ujian = 'Sudah Mengikuti'");
    $cek_user = mysqli_num_rows($sql_cek);
    if ($cek_user > 0) { 
        
      } else {
        ?>
        <script type="text/javascript">         
          alert("Anda harus mengikuti ujian pre test terlebih dahulu");
          window.location.href="?page=mulai_test2&aksi=tipe_test&nip=<?php echo $row['nip'];?>&nama_pelatihan=<?php echo $data['nama_pelatihan'];?>&nama_pelatihan=<?php echo $nama_pelatihan;?>&nama_tipe_test=<?php echo $nama_tipe_test;?>";
        </script>
        <?php
    }
}


$sql_cek2  = $koneksi->query("SELECT * FROM t_tanggal_test WHERE nip='$nip' and nama_pelatihan='$nama_pelatihan' and nama_tipe_test='$nama_tipe_test'");
$cek_user2 = mysqli_num_rows($sql_cek2);
if ($cek_user2 > 0) {
  
   //$sql_update_tanggal = mysqli_query($koneksi, "UPDATE t_tanggal_test SET keterangan_ujian = 'Belum Mengikuti', tanggal_test = 'NULL' where nip='$nip' and nama_pelatihan='$nama_pelatihan' and nama_tipe_test='$nama_tipe_test'");  
    
  } else {
    
   $sql_update_tanggal = mysqli_query($koneksi, "INSERT INTO t_tanggal_test (nip, nama_pelatihan, nama_tipe_test, keterangan_ujian, tanggal_test) VALUES ('$nip','$nama_pelatihan', '$nama_tipe_test', 'Belum Mengikuti', 'NULL')");
}

?>
<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="panel panel-primary">
        <script type="text/javascript">
            function isChecked()
            {
                if (document.getElementById("exam_chkbox").checked == true) {
                window.location = "?page=mulai_test2&aksi=test&nip=<?php echo $row['nip'];?>&nama_pelatihan=<?php echo $nama_pelatihan;?>&nama_tipe_test=<?php echo $nama_tipe_test;?>";
                } else {
                    alert("Harap setujui jika sudah selesai membaca materinya");
                return false; 
                }
            }
        </script>
             <div class="panel-heading">
                Form Materi Ujian Komptensi
            </div>
            <?php
              $sql2 = $koneksi-> query("select * from t_materi_soal where nama_pelatihan='$nama_pelatihan' and nama_tipe_test='$nama_tipe_test'");

              $tampil = $sql2->fetch_assoc();
            ?>
            <h2 align="center">Materi Ujian Kompetensi</h2>
            <div class="panel-body">
                <form method="POST">                                 
                        <?php
                            $cek_materi  =  $koneksi->query("SELECT * FROM t_materi_soal where nama_pelatihan='$nama_pelatihan' and nama_tipe_test='$nama_tipe_test' and isi_materi is not null");
                            $cek = mysqli_num_rows($cek_materi);

                            if ($cek > 0) {
                                ?>
                                <div>
                                  <h3 align="center"><?php echo $tampil['judul_materi']; ?></h3> 
                                  <embed src="backend/assets/file/<?php echo $tampil['isi_materi'];?>" type='application/pdf' width='100%' height='700px'/>
                                </div>

                                <?php
                            } else {
                        ?>
                                <div>
                                    <h3 align="center">Materi Ujian Tidak Ada</h3>
                                </div>
                         <?php
                            } 
                        ?>       
                    </form>  
            </div>
            <center><input type="checkbox" name="checkbox" id="exam_chkbox" >
                <label for="checkbox"></label>Saya Sudah Membaca Materi Sampai Selesai </center>
            <center><p><a class="btn btn-primary" style="cursor:pointer;" onclick="isChecked(); return false; "/>Mulai Test</a></p></center>
            <center><a href="?page=mulai_test2&aksi=tipe_test&nip=<?php echo $row['nip'];?>&nama_pelatihan=<?php echo $data['nama_pelatihan'];?>&nama_pelatihan=<?php echo $nama_pelatihan;?>&nama_tipe_test=<?php echo $nama_tipe_test;?>" class="btn btn-success" style="margin-top: 10px"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></i> Kembali</a></center>
            <div class="panel-footer" align="center">
                Form Materi Ujian Komptensi
            </div>
        </div>
    </div>
</div>