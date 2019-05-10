<?php

	$id = $_GET['id'];

	$sql = $koneksi->query("select * from t_jabatan where id='$id'");

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
	                <input type="hidden" name="id" class="field-divided" value="<?php echo $tampil['id'];?>"/> 
	                    <div class="form-group">
	                        <label>Nama jabatan</label>
	                         <input class="form-control" name="nama_jabatan" value="<?php echo $tampil['nama_jabatan'];?>"/>
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

	$id=$_POST['id'];
	$nama_jabatan=$_POST['nama_jabatan'];
	
	$simpan=$_POST['simpan'];

	if ($simpan) {

			$sql = $koneksi->query("UPDATE `t_jabatan` set nama_jabatan='$nama_jabatan' WHERE id='$id'");

		if ($sql ) {
			?>
				<script type="text/javascript">
					
					alert("Data Berhasil Diubah");
					window.location.href="?page=jabatan";

				</script>

			<?php
		}
	}
?>