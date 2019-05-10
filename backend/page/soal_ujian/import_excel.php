 <?php
//memanggil file excel_reader
	require "excel_reader2.php";

 	$nama_pelatihan = $_GET['nama_pelatihan'];

    $nama_tipe_test = $_GET['nama_tipe_test'];

    $sql = $koneksi->query("select * from t_pelatihan where nama_pelatihan='$nama_pelatihan'");

    $tampil = $sql->fetch_assoc();
?>

 <div class="panel panel-primary">
		<div class="panel-heading">
		    Import Excel Soal <?php echo $nama_tipe_test;?> <?php echo $tampil['keterangan'];?>
        </div>
		<div class="panel-body">
	        <div class="row">
	            <div class="col-md-11">
	                <h3>Import Excel Soal <?php echo $nama_tipe_test;?> <?php echo $tampil['keterangan'];?></h3>
	                <form name="myForm" id="myForm" onSubmit="return validateForm()" action="?page=soal_ujian&aksi=import_excel&nama_pelatihan=<?php echo $nama_pelatihan;?>&nama_tipe_test=<?php echo $nama_tipe_test;?>" method="post" enctype="multipart/form-data"> 
	                	<a href="format_soal.xls" class="btn btn-default">
							<span class="glyphicon glyphicon-download"></span>
							Download Format
						</a><br><br> 
	                    <div class="form-group">
	                        <label>File Excel</label>
	                         <input type="file" id="filesoalall" name="filesoalall" />
						     <!--label><input type="checkbox" name="drop" value="1" /> <u>Kosongkan tabel sql terlebih dahulu.</u> </label-->
	                    </div>
	                    <div>
	                    	<input type="submit" name="submit" value="Simpan" class="btn btn-primary">
	                    </div>
	                 </form>
	                 <a href="?page=soal_ujian&aksi=data_soal&nama_pelatihan=<?php echo $nama_pelatihan;?>&nama_tipe_test=<?php echo $nama_tipe_test;?>" class="btn btn-success" style="margin-top: 10px"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></i> Kembali</a>
	                 <script type="text/javascript">
					//    validasi form (hanya file .xls yang diijinkan)
					    function validateForm()
					    {
					        function hasExtension(inputID, exts) {
					            var fileName = document.getElementById(inputID).value;
					            return (new RegExp('(' + exts.join('|').replace(/\./g, '\\.') + ')$')).test(fileName);
					        }

					        if(!hasExtension('filepegawaiall', ['.xls'])){
					            alert("Hanya file XLS (Excel 2003) yang diijinkan.");
					            return false;
					        }
					    }
					</script>
	            </div>
	         </div>
		</div>
</div> 


<div class="col-md-4 col-sm-4">
    <div class="panel panel-default">
        <div class="panel-heading">
            Keterangan
        </div>
        <div class="panel-body">
           <p> Untuk kunci jawababn, dalam excel harus di isi huruf (a,b,c,d,e) dengan  huruf kecil,jika tidak maka jawaban tidak bisa di baca oleh program.</p>
        </div>
        <div class="panel-footer">
            Keterangan
        </div>
    </div>
</div>

<?php
//jika tombol import ditekan
if(isset($_POST['submit'])){

    $target = basename($_FILES['filesoalall']['name']) ;
    move_uploaded_file($_FILES['filesoalall']['tmp_name'], $target);
    
    $data = new Spreadsheet_Excel_Reader($_FILES['filesoalall']['name'],false);
    
//    menghitung jumlah baris file xls
    $baris = $data->rowcount($sheet_index=0);
    
//    import data excel mulai baris ke-2 (karena tabel xls ada header pada baris 1)
    for ($i=2; $i<=$baris; $i++)
    {
//       membaca data (kolom ke-1 sd terakhir)
      $soal     		= $data->val($i, 2);
      $a 				= $data->val($i, 3);
      $b 				= $data->val($i, 4);
      $c 				= $data->val($i, 5);
      $d 				= $data->val($i, 6);
      $e 				= $data->val($i, 7);
      $kunci_jawaban	= $data->val($i, 8);

//      setelah data dibaca, masukkan ke tabel pegawai sql
      $sql = $koneksi->query("INSERT INTO `t_soal`(`nama_tipe_soal`, `nama_tipe_test`, `soal`, `a`, `b`, `c`, `d`, `e`, `kunci_jawaban`, `status`) VALUES ('$nama_pelatihan','$nama_tipe_test','$soal','$a','$b','$c','$d','$e','$kunci_jawaban','Y')");

    }
    
    if(!$sql){
//          jika import gagal
          die(mysqli_connect_error());
      }else{
//        ?>
			<script type="text/javascript">					
				alert("Data Berhasil Diimpor");
				window.location.href="?page=soal_ujian&aksi=data_soal&nama_pelatihan=<?php echo $nama_pelatihan;?>&nama_tipe_test=<?php echo $nama_tipe_test;?>";
			</script>
		<?php
          //echo "Data berhasil diimpor.";
    }
    
    //    hapus file xls yang udah dibaca
    unlink($_FILES['filesoalall']['name']);
}

?>