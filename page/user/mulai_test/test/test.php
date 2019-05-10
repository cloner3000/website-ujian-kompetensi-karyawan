
<?php

$nip = $_GET['nip'];

$nama_pelatihan = $_GET['nama_pelatihan'];

$nama_tipe_test = $_GET['nama_tipe_test'];

$sql = $koneksi-> query("select * from t_pelatihan where nama_pelatihan='$nama_pelatihan'");

$status = $sql->fetch_assoc();

$sql_cek  = $koneksi->query("SELECT * FROM t_nilai WHERE nama_pelatihan='$nama_pelatihan' and nama_tipe_test='$nama_tipe_test' and nip='$nip'");
$cek_user = mysqli_num_rows($sql_cek);
if ($cek_user > 0) {
  ?>
    <script type="text/javascript">         
      alert("Anda sudah mengikuti ujian tersebut");
      window.location.href="?page=mulai_test2&aksi=materi&nip=<?php echo $row['nip'];?>&nama_pelatihan=<?php echo $nama_pelatihan;?>&nama_tipe_test=<?php echo $nama_tipe_test;?>";
    </script>
    <?php
    
  } else {
    
}

if ($status[status]== "Y") {

//set session dulu dengan nama $_SESSION["mulai"]
if (isset($_SESSION["mulai"])) { 
    //jika session sudah ada
    $telah_berlalu = time() - $_SESSION["mulai"];
} else { 
    //jika session belum ada
    $_SESSION["mulai"]  = time();
    $telah_berlalu      = 0;
} 

  $sql    = mysqli_query($koneksi, "SELECT * FROM t_timer ");  
  $data   = mysqli_fetch_array($sql);

  $temp_waktu = ($data['timer']*60) - $telah_berlalu; //dijadikan detik dan dikurangi waktu yang berlalu
  $temp_menit = (int)($temp_waktu/60);                //dijadikan menit lagi
  $temp_detik = $temp_waktu%60;                       //sisa bagi untuk detik
   
  if ($temp_menit < 60) { 
      /* Apabila $temp_menit yang kurang dari 60 meni */
      $jam    = 0; 
      $menit  = $temp_menit; 
      $detik  = $temp_detik; 
  } else { 
      /* Apabila $temp_menit lebih dari 60 menit */           
      $jam    = (int)($temp_menit/60);    //$temp_menit dijadikan jam dengan dibagi 60 dan dibulatkan menjadi integer 
      $menit  = $temp_menit%60;           //$temp_menit diambil sisa bagi ($temp_menit%60) untuk menjadi menit
      $detik  = $temp_detik;
  }   
?>
 
<div class="row">
  <div class="col-md-12 col-sm-12">
    <div class="panel panel-primary">
      <div class="panel-heading">
          Form Test Kompetensi Pegawai
      </div>
      <!-- Script Timer -->
    <script type="text/javascript">
        $(document).ready(function() {
            /** Membuat Waktu Mulai Hitung Mundur Dengan 
                * var detik;
                * var menit;
                * var jam;
            */
            var detik   = <?= $detik; ?>;
            var menit   = <?= $menit; ?>;
            var jam     = <?= $jam; ?>;
                  
            /**
               * Membuat function hitung() sebagai Penghitungan Waktu
            */
            function hitung() {
                /** setTimout(hitung, 1000) digunakan untuk 
                     * mengulang atau merefresh halaman selama 1000 (1 detik) 
                */
                setTimeout(hitung,1000);
  
                /** Jika waktu kurang dari 10 menit maka Timer akan berubah menjadi warna merah */
                if(menit < 10 && jam == 0){
                    var peringatan = 'style="color:red"';
                };
  
                /** Menampilkan Waktu Timer pada Tag #Timer di HTML yang tersedia */
                $('#timer').html(
                    '<h4 align="center"'+peringatan+'>Sisa waktu anda <br />' + jam + ' jam : ' + menit + ' menit : ' + detik + ' detik</h4><hr>'
                );
  
                /** Melakukan Hitung Mundur dengan Mengurangi variabel detik - 1 */
                detik --;
  
                /** Jika var detik < 0
                    * var detik akan dikembalikan ke 59
                    * Menit akan Berkurang 1
                */
                if(detik < 0) {
                    detik = 59;
                    menit --;
  
                   /** Jika menit < 0
                        * Maka menit akan dikembali ke 59
                        * Jam akan Berkurang 1
                    */
                    if(menit < 0) {
                        menit = 59;
                        jam --;
  
                        /** Jika var jam < 0
                            * clearInterval() Memberhentikan Interval dan submit secara otomatis
                        */
                             
                        if(jam < 0) { 
                            clearInterval(hitung); 
                            /** Variable yang digunakan untuk submit secara otomatis di Form */
                            var frmSoal = document.getElementById("frmSoal"); 
                            alert('Waktu Anda telah habis, Terima Kasih');
                            frmSoal.submit(); 
                        } 
                    } 
                } 
            }           
            /** Menjalankan Function Hitung Waktu Mundur */
            hitung();
        });
    </script>
        <h3 align="center">Test Kompetensi Pegawai</h3>
          <div class="panel-body">
          <div id='timer'></div>
            <table class="table table-striped table-bordered table-hover" border="0"> 
                <?php
                      $no = 1;

                      $hasil2=$koneksi->query("select * from t_soal where nama_tipe_soal='$nama_pelatihan' and nama_tipe_test='$nama_tipe_test' and status='Y'");
                      $jumlah=mysqli_num_rows($hasil2);

                      //include dari file config/fisher_yates_soal.php
                      for ($x=0; $x < $arrlenght ; $x++) {  
                        $soal[$x];
                    
                        $acak =  $soal[$x];

                        $data = $koneksi->query("select * from t_soal where id_soal='$acak' and nama_tipe_soal='$nama_pelatihan' and nama_tipe_test='$nama_tipe_test'and status='Y'");
                     
                      while($row =mysqli_fetch_array($data))
                      {

                          $id=$row["id_soal"];
                          $pertanyaan=$row["soal"];
                          $pilihan_a=$row["a"];
                          $pilihan_b=$row["b"];
                          $pilihan_c=$row["c"];
                          $pilihan_d=$row["d"];
                          $pilihan_e=$row["e"]; 

                          $option = array($pilihan_a,$pilihan_b,$pilihan_c,$pilihan_d,$pilihan_e); 

                          $abjad = array('A','B','C','D','E');

                          shuffle($option);          
                  ?>
                 <form id="frmSoal"  method='POST' action="?page=mulai_test2&aksi=hasil&nip=<?php echo $nip;?>&nama_pelatihan=<?php echo $nama_pelatihan;?>&nama_tipe_test=<?php echo $nama_tipe_test;?>"">
                     <input type="hidden" name="id[]" value=<?php echo $id; ?>>
                        <input type="hidden" name="jumlah" value=<?php echo $jumlah; ?>>
                          <tr>
                                <td width="17"><font color="#000000"><?php echo "$no"; ?></font></td>
                                <td width="430"><font color="#000000"><?php echo "$pertanyaan"; ?></font></td>
                          </tr>
                          <?php
                            for ($i=0; $i < 5 ; $i++) { 
                              for ($i=0; $i < count($abjad) ; $i++) { 
                          ?>

                          <tr>
                                <td><font color="#000000">&nbsp;</font></td>
                              <td><font color="#000000">
                             <?php echo $abjad[$i]; ?>.<input name="pilihan[<?php echo $id; ?>]" type="radio" value="<?php echo "$option[$i]";?>"> 
                              <?php echo "$option[$i]";?></font></td>
                          </tr>
                          <?php
                                }
                              }
                            $no++;
                            }
                          }
                        ?>            
                     </table>
                      <tr>
                          <td>&nbsp;</td>
                            <center><td><input class="btn btn-primary" type="submit" name="jawab" value="Jawab" onclick="return confirm('Apakah Anda yakin dengan jawaban Anda?')"></td></center>
                      </tr>
                  </form>
            </div>
        </div>
    </div>
</div>

<?php

} else{
  ?>
<script type="text/javascript">         
  alert("Anda tidak bisa masuk halaman");
  window.location.href="?page=mulai_test2&aksi=materi&nip=<?php echo $row['nip'];?>&nama_pelatihan=<?php echo $nama_pelatihan;?>&nama_tipe_test=<?php echo $nama_tipe_test;?>";
</script>
<?php
}
?>