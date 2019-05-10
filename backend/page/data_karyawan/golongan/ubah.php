<?php

	$id = $_GET['id'];

	$sql = $koneksi->query("select * from t_golongan where id='$id'");

	$tampil = $sql->fetch_assoc();

?>

<div class="panel panel-primary">
		<div class="panel-heading">
		    Form Ubah Golongan
        </div>
		<div class="panel-body">
	        <div class="row">
	            <div class="col-md-11">
	                <h3>Ubah Golongan</h3>
	                <form method="POST" enctype="multipart/form-data"> 
	                <input type="hidden" name="id" class="field-divided" value="<?php echo $tampil['id'];?>"/> 
	                    <div class="form-group">
	                        <label>Nama Golongan</label>
	                         <input class="form-control" name="nama_golongan" value="<?php echo $tampil['nama_golongan'];?>"/>
	                    </div>
	                    <div class="form-group">
	                        <label>Keterangan</label>
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

	$id=$_POST['id'];
	$nama_golongan=$_POST['nama_golongan'];
	$keterangan=$_POST['keterangan'];
	
	$simpan=$_POST['simpan'];

	if ($simpan) {

			$sql = $koneksi->query("UPDATE `t_golongan` set nama_golongan='$nama_golongan', keterangan='$keterangan' WHERE id='$id'");

		if ($sql ) {
			?>
				<script type="text/javascript">
					
					alert("Data Berhasil Diubah");
					window.location.href="?page=golongan";

				</script>

			<?php
		}
	}
?>