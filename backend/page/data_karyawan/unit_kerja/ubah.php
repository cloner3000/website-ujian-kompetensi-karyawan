<?php

	$id = $_GET['id'];

	$sql = $koneksi->query("select * from t_unit_kerja where id='$id'");

	$tampil = $sql->fetch_assoc();

?>

<div class="panel panel-primary">
		<div class="panel-heading">
		    Form Ubah Unit Kerja
        </div>
		<div class="panel-body">
	        <div class="row">
	            <div class="col-md-11">
	                <h3>Ubah Pelatihan</h3>
	                <form method="POST" enctype="multipart/form-data"> 
	                <input type="hidden" name="id" class="field-divided" value="<?php echo $tampil['id'];?>"/> 
	                    <div class="form-group">
	                        <label>Nama Unit Kerja</label>
	                         <input class="form-control" name="nama_unit_kerja" value="<?php echo $tampil['nama_unit_kerja'];?>"/>
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
	$nama_unit_kerja=$_POST['nama_unit_kerja'];
	
	$simpan=$_POST['simpan'];

	if ($simpan) {

			$sql = $koneksi->query("UPDATE `t_unit_kerja` set nama_unit_kerja='$nama_unit_kerja'WHERE id='$id'");

		if ($sql ) {
			?>
				<script type="text/javascript">
					
					alert("Data Berhasil Diubah");
					window.location.href="?page=unit_kerja";

				</script>

			<?php
		}
	}
?>