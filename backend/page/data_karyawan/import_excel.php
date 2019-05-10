 <?php
//memanggil file excel_reader
require "excel_reader2.php";
?>

 <div class="panel panel-primary">
		<div class="panel-heading">
		    Import Excel Data Pegawai
        </div>
		<div class="panel-body">
	        <div class="row">
	            <div class="col-md-11">
	                <h3>Import Excel Data Pegawai</h3>
	                <form name="myForm" id="myForm" onSubmit="return validateForm()" action="?page=data_karyawan&aksi=import_excel" method="post" enctype="multipart/form-data"> 
	                	<a href="format_pegawai.xls" class="btn btn-default">
							<span class="glyphicon glyphicon-download"></span>
							Download Format
						</a><br><br> 
	                    <div class="form-group">
	                        <label>File Excel</label>
	                         <input type="file" id="filepegawaiall" name="filepegawaiall" />
						     <!--label><input type="checkbox" name="drop" value="1" /> <u>Kosongkan tabel sql terlebih dahulu.</u> </label-->
	                    </div>
	                    <div>
	                    	<input type="submit" name="submit" value="Simpan" class="btn btn-primary">
	                    </div>
	                 </form>
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

<?php
//jika tombol import ditekan
if(isset($_POST['submit'])){

    $target = basename($_FILES['filepegawaiall']['name']) ;
    move_uploaded_file($_FILES['filepegawaiall']['tmp_name'], $target);
    
    $data = new Spreadsheet_Excel_Reader($_FILES['filepegawaiall']['name'],false);
    
//    menghitung jumlah baris file xls
    $baris = $data->rowcount($sheet_index=0);
    
//    import data excel mulai baris ke-2 (karena tabel xls ada header pada baris 1)
    for ($i=2; $i<=$baris; $i++)
    {
//       membaca data (kolom ke-1 sd terakhir)
      $nip            = $data->val($i, 2);
      $nama_lengkap   = $data->val($i, 3);
      $jenis_kelamin  = $data->val($i, 4);
      $tempat_lahir	  = $data->val($i, 5);
      $tanggal_lahir  = $data->val($i, 6);
      $nomor_telepon  = $data->val($i, 7);
      $alamat		  = $data->val($i, 8);
      $nama_jabatan	  = $data->val($i, 9);
      $unit_kerja	  = $data->val($i, 10);
      $nama_golongan  = $data->val($i, 11);
      $pendidikan	  = $data->val($i, 12);
      $password		  = $data->val($i, 13);

//      setelah data dibaca, masukkan ke tabel pegawai sql
      $sql2 = $koneksi->query("INSERT INTO `t_pegawai`(`nip`, `nama_lengkap`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `nomor_telepon`, `alamat`, `nama_jabatan`, `unit_kerja`, `nama_golongan`, `pendidikan`, `password`,`status`) VALUES ('$nip','$nama_lengkap','$jenis_kelamin','$tempat_lahir','$tanggal_lahir','$nomor_telepon','$alamat','$nama_jabatan','$unit_kerja','$nama_golongan','$pendidikan', '$password','Y')");

	  $sql_status = mysqli_query($koneksi, "INSERT INTO t_hasil_test_keseluruhan (`Nip`, `Nama Lengkap`, `Jabatan`, `Unit Kerja`) VALUES ('$nip', '$nama_lengkap' , '$nama_jabatan' , '$unit_kerja')");
    }
    
    if(!$sql2 && $sql_status){
//          jika import gagal
          die(mysqli_connect_error());
      }else{
//          jika impor berhasil
          echo "Data berhasil diimpor.";
    }
    
    //    hapus file xls yang udah dibaca
    unlink($_FILES['filepegawaiall']['name']);
}

?>