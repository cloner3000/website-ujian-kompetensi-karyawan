<?php

	$id_pelatihan = $_GET['id_pelatihan'];

	//$nama_pelatihan2 = $_GET['nama_pelatihan'];

	$sql = $koneksi->query("select * from t_pelatihan where id_pelatihan='$id_pelatihan'");

	$tampil = $sql->fetch_assoc();

?>

<div class="panel panel-primary">
		<div class="panel-heading">
		    Form Ubah Pelatihan
        </div>
		<div class="panel-body">
	        <div class="row">
	            <div class="col-md-11">
	                <h3>Ubah Pelatihan</h3>
	                <form method="POST" enctype="multipart/form-data"> 
	                <input type="hidden" name="id_pelatihan" class="field-divided" value="<?php echo $tampil['id_pelatihan'];?>"/> 
	                <input type="hidden" class="form-control" name="nama_pelatihan2" value="<?php echo $tampil['nama_pelatihan'];?>"/>
	                    <div class="form-group">
	                        <label>Nama pelatihan (harus singkatan)</label>
	                         <input class="form-control" name="nama_pelatihan" value="<?php echo $tampil['nama_pelatihan'];?>"/>
	                    </div>
	                    <div class="form-group">
	                        <label>keterangan</label>
	                          <textarea class="form-control" name="keterangan"><?php echo $tampil['keterangan'];?></textarea>
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

	$id_pelatihan=$_POST['id_pelatihan'];
	$nama_pelatihan=$_POST['nama_pelatihan'];
	$nama_pelatihan2=$_POST['nama_pelatihan2'];
	$keterangan=$_POST['keterangan'];
	
	$simpan=$_POST['simpan'];

	if ($simpan) {

		if (ctype_upper($nama_pelatihan)) {
			 echo "nama pelatihan berisi huruf besar";
		} else {

		if (strlen($nama_pelatihan) <= 9 ) {

			$sql = $koneksi->query("UPDATE `t_pelatihan` set nama_pelatihan='$nama_pelatihan', keterangan='$keterangan' WHERE id_pelatihan='$id_pelatihan'");

			$sql2 = $koneksi->query("ALTER TABLE `t_hasil_test_keseluruhan` CHANGE `$nama_pelatihan2` `$nama_pelatihan` DATETIME NULL ");

			//$sql_ubh_tgl = mysqli_query($koneksi, "ALTER TABLE `t_hasil_test_keseluruhan` CHANGE `tgl_$nama_pelatihan2` `tgl_$nama_pelatihan` DATETIME NULL");

			if ($sql && $sql2) {
				?>
					<script type="text/javascript">
						
						alert("Data Berhasil Diubah");
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