 <?php
//memanggil file excel_reader
require "excel_reader2.php";
?>

 <div class="panel panel-primary">
		<div class="panel-heading">
		    Import Excel Data Jabatan
        </div>
		<div class="panel-body">
	        <div class="row">
	            <div class="col-md-11">
	                <h3>Import Excel Data Jabatan</h3>
	                <form name="myForm" id="myForm" onSubmit="return validateForm()" action="?page=jabatan&aksi=import_excel" method="post" enctype="multipart/form-data">  
	                	<a href="format_jabatan.xls" class="btn btn-default">
							<span class="glyphicon glyphicon-download"></span>
							Download Format
						</a><br><br>
	                    <div class="form-group">
	                        <label>File Excel</label>
	                         <input type="file" id="filejabatanall" name="filejabatanall" />
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

					        if(!hasExtension('filejabatanall', ['.xls'])){
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

    $target = basename($_FILES['filejabatanall']['name']) ;
    move_uploaded_file($_FILES['filejabatanall']['tmp_name'], $target);
    
    $data = new Spreadsheet_Excel_Reader($_FILES['filejabatanall']['name'],false);

    chmod($_FILES['filejabatanall']['name'],0777);
    
//    menghitung jumlah baris file xls
    $baris = $data->rowcount($sheet_index=0);

//    import data excel mulai baris ke-2 (karena tabel xls ada header pada baris 1)
    for ($i=2; $i<=$baris; $i++)
    {
//       membaca data (kolom ke-1 sd terakhir)
      $nama_jabatan  = $data->val($i, 2);
  
//      setelah data dibaca, masukkan ke tabel jBbatan sql
      $query = "INSERT INTO  t_jabatan (`nama_jabatan`) VALUES ('$nama_jabatan')";
      $hasil = mysqli_query($koneksi, $query);
    }
    
    if(!$hasil){
//          jika import gagal
          die(mysqli_connect_error());
      }else{
//          jika impor berhasil
          echo "Data berhasil diimpor.";
    }

  //    hapus file xls yang udah dibaca
    unlink($_FILES['filejabatanall']['name']);
    
}

?>