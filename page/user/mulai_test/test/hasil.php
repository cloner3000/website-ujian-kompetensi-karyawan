<?php

unset($_SESSION['mulai']);

$nip = $_GET['nip'];

$nama_pelatihan = $_GET['nama_pelatihan'];

$nama_tipe_test = $_GET['nama_tipe_test'];

date_default_timezone_set('Asia/Jakarta');
$tanggal = date("Y-m-d H:i:s");

$sql_pegawai = $koneksi->query("select * from t_pegawai where nip='$nip'");

$tampil = $sql_pegawai->fetch_assoc();

$jkl = $tampil['jenis_kelamin'];

$nama_lengkap = $tampil['nama_lengkap'];

if(isset($_POST['jawab'])){
            $pilihan=$_POST["pilihan"];
            $id_soal=$_POST["id"];
            $jumlah=$_POST['jumlah'];
            
            $score=0;
            $benar=0;
            $salah=0;
            $kosong=0;
            
            for ($i=0;$i<$jumlah;$i++){
                //id nomor soal
                $nomor=$id_soal[$i];
                
                //jika user tidak memilih jawaban
                if (empty($pilihan[$nomor])){
                    $kosong++;
                }else{
                    //jawaban dari user
                    $jawaban=$pilihan[$nomor];
                    
                    //cocokan jawaban user dengan jawaban di database
                    $data = $koneksi->query("select * from t_soal where id_soal='$nomor' and kunci_jawaban='$jawaban' and nama_tipe_soal='$nama_pelatihan' and nama_tipe_test ='$nama_tipe_test'and status='Y'");
                    
                    $cek=mysqli_num_rows($data);
                    
                    if($cek){
                        //jika jawaban cocok (benar)
                        $benar++;
                    }else{
                        //jika salah
                        $salah++;
                    }
                    
                } 
                /*RUMUS
                Jika anda ingin mendapatkan Nilai 100, berapapun jumlah soal yang ditampilkan 
                hasil= 100 / jumlah soal * jawaban yang benar
                */
                
                $result=$koneksi->query("select * from t_soal WHERE nama_tipe_soal='$nama_pelatihan' and nama_tipe_test ='$nama_tipe_test'and status='Y'");
                $jumlah_soal=mysqli_num_rows($result);
                $score = 100/$jumlah_soal*$benar;
                $hasil = number_format($score);
            }

        } else if ($_SERVER["REQUEST_METHOD"] == "POST") {
            
            $pilihan=$_POST["pilihan"];
            $id_soal=$_POST["id"];
            $jumlah=$_POST['jumlah'];
            
            $score=0;
            $benar=0;
            $salah=0;
            $kosong=0;
            
            for ($i=0;$i<$jumlah;$i++){
                //id nomor soal
                $nomor=$id_soal[$i];
                
                //jika user tidak memilih jawaban
                if (empty($pilihan[$nomor])){
                    $kosong++;
                }else{
                    //jawaban dari user
                    $jawaban=$pilihan[$nomor];
                    
                    //cocokan jawaban user dengan jawaban di database
                    $data = $koneksi->query("select * from t_soal where id_soal='$nomor' and kunci_jawaban='$jawaban' and nama_tipe_soal='$nama_pelatihan' and nama_tipe_test ='$nama_tipe_test'and status='Y'");
                    
                    $cek=mysqli_num_rows($data);
                    
                    if($cek){
                        //jika jawaban cocok (benar)
                        $benar++;
                    }else{
                        //jika salah
                        $salah++;
                    }
                    
                } 
                /*RUMUS
                Jika anda ingin mendapatkan Nilai 100, berapapun jumlah soal yang ditampilkan 
                hasil= 100 / jumlah soal * jawaban yang benar
                */
                
                $result=$koneksi->query("select * from t_soal WHERE nama_tipe_soal='$nama_pelatihan' and nama_tipe_test ='$nama_tipe_test'and status='Y'");
                $jumlah_soal=mysqli_num_rows($result);
                $score = 100/$jumlah_soal*$benar;
                $hasil = number_format($score);
              }
        } else if (empty($_POST['submit'])) {
          $hasil = 0;
        } 


       /*if (($hasil >= 70) && ($hasil <=100)) {
          $keterangan2 = "Lulus";
        } else {
          $keterangan2 = "Tidak Lulus";
        }*/

        //$sql_nilai = mysqli_query($koneksi, "INSERT INTO t_nilai (nip, jenis_kelamin, nama_pelatihan, nama_tipe_test, nilai, status_ujian) VALUES ('$nip', '".$row['jenis_kelamin']."' ,'$nama_pelatihan', '$nama_tipe_test', '$hasil', '$keterangan2')");

        $X=array('nama_pelatihan'=>'$nama_pelatihan','nama_tipe_test'=>'$nama_tipe_test','nilai'=>$hasil);

        //Classification factor
        $n = 'status_ujian';

        //table name
        $table='t_nilai_naive_bayes';

        //klasifikasi kelulusan ujian naive bayes
        classify($X,$n,$table,$koneksi,$nama_lengkap,$nama_pelatihan,$nama_tipe_test,$hasil);


        $sql_cek2  =  $koneksi->query("SELECT * FROM t_tanggal_test WHERE nip='$nip' and nama_pelatihan='$nama_pelatihan' and nama_tipe_test='$nama_tipe_test'");
        $cek_user2 = mysqli_num_rows($sql_cek2);
        if ($cek_user2 > 0) {

            $sql_update_tanggal = mysqli_query($koneksi, "UPDATE t_tanggal_test SET keterangan_ujian = 'Sudah Mengikuti', tanggal_test = '$tanggal' where nip='$nip' and nama_pelatihan='$nama_pelatihan' and nama_tipe_test='$nama_tipe_test'");

        } else {

            $sql_update_tanggal = mysqli_query($koneksi, "INSERT INTO t_tanggal_test (nip, nama_pelatihan, nama_tipe_test, keterangan_ujian, tanggal_test) VALUES ('$nip','$nama_pelatihan', '$nama_tipe_test', 'Sudah Mengikuti', '$tanggal')");

        }

        if ($nama_tipe_test == "Post Test") {
            
            $sql_update_hasil_test_keseluruhan = mysqli_query($koneksi, "UPDATE t_hasil_test_keseluruhan SET $nama_pelatihan = '$tanggal'where `Nip` ='$nip'");
        }


?>

<div class="row">
<div class="col-md-12 col-sm-12">
    <div class="panel panel-primary">
        <div class="panel-heading">
            Form Hasil Ujian Kompetensi Pegawai
        </div>
        <script language=javascript>
           setTimeout("location.href='?page=hasil_test'", 5000);
        </script>
        <div class="panel-body">
            <center><h3>Hasil Ujian Kompetensi Pegawai</h3></center></br>
            <center><h3><?php echo "$hasil"; ?></h3></center></br>
            <center><h3>Terima Kasih</h3></center></br>
        </div>
        <div class="panel-footer">
            Form Hasil Ujian Kompetensi Pegawai
        </div>
    </div>
</div>
</div>
