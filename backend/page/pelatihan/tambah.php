<?php

	$id = $_GET['id'];

	//$nama_pelatihan2 = $_GET['nama_pelatihan'];

	$sql = $koneksi->query("SELECT * FROM t_pelatihan ORDER BY id_pelatihan DESC LIMIT 1");

	$tampil = $sql->fetch_assoc();

?>

<div class="panel panel-primary">
		<div class="panel-heading">
		    Form Tambah Pelatihan
        </div>
		<div class="panel-body">
	        <div class="row">
	            <div class="col-md-11">
	                <h3>Tambah Pelatihan</h3>
	                <form method="POST" enctype="multipart/form-data">
	                <input type="hidden" class="form-control" name="nama_pelatihan2" value="<?php echo $tampil['nama_pelatihan'];?>"/>  
	                    <div class="form-group">
	                        <label>Nama pelatihan (harus singkatan)</label>
	                         <input class="form-control" name="nama_pelatihan" />
	                    </div>
	                    <div class="form-group">
	                        <label>keterangan</label>
	                          <textarea class="form-control" name="keterangan"></textarea>
	                    </div>
	                    <div>
	                    	<input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
	                    </div>
	            </div>
	            	</form>
	         </div>
		</div>
</div>

<?php

	$nama_pelatihan=$_POST['nama_pelatihan'];
	$nama_pelatihan2=$_POST['nama_pelatihan2'];
	$keterangan=$_POST['keterangan'];
	
	$simpan=$_POST['simpan'];

	if ($simpan) {

		if (ctype_upper($nama_pelatihan)) {
			 echo "nama pelatihan tidak boleh berisi huruf besar";
		} else {

			if (strlen($nama_pelatihan) <= 9 ) {
			
				$sql = $koneksi->query("INSERT INTO `t_pelatihan`(`nama_pelatihan`, `Pre Test`, `Post Test`, `status`, `keterangan`) VALUES ('$nama_pelatihan','Y','Y','Y','$keterangan')");

				$sql2 = $koneksi->query("ALTER TABLE `t_hasil_test_keseluruhan` ADD `$nama_pelatihan` DATETIME NULL ");

				//$sql_tbh_tgl = mysqli_query($koneksi, "ALTER TABLE `t_hasil_test_keseluruhan` ADD `tgl_$nama_pelatihan`DATETIME NULL");

				//$sql_ubh_posisi1 = mysqli_query($koneksi, "ALTER TABLE `t_hasil_test_keseluruhan` MODIFY COLUMN $nama_pelatihan varchar(200) NULL AFTER $nama_pelatihan2");

				//$sql_ubh_posisi2 = mysqli_query($koneksi, "ALTER TABLE `t_hasil_test_keseluruhan` MODIFY COLUMN `tgl_$nama_pelatihan` DATETIME NULL AFTER 'tgl_$nama_pelatihan2'");

				if ($sql && $sql2) {
					?>
						<script type="text/javascript">
							
							alert("Data Berhasil Disimpan");
							window.location.href="?page=pelatihan";

						</script>

					<?php
				}
			} else {
				echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Panjang karakter nama pelatihan maksimal 9 karakter.</div>';
			}
		}
	}
?>