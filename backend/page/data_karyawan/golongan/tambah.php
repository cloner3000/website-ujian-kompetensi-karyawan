<div class="panel panel-primary">
		<div class="panel-heading">
		    Form Tambah Golongan
        </div>
		<div class="panel-body">
	        <div class="row">
	            <div class="col-md-11">
	                <h3>Tambah Golongan</h3>
	                <form method="POST" enctype="multipart/form-data"> 
	                    <div class="form-group">
	                        <label>Nama Golongan</label>
	                         <input class="form-control" name="nama_golongan" />
	                    </div>
	                    <div class="form-group">
	                        <label>Keterangan</label>
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

	$nama_golongan=$_POST['nama_golongan'];
	$keterangan=$_POST['keterangan'];
	
	$simpan=$_POST['simpan'];

	if ($simpan) {
		
			$sql = $koneksi->query("INSERT INTO `t_golongan`(`nama_golongan`,`keterangan`) VALUES ('$nama_golongan','$keterangan')");

			if ($sql) {
				?>
					<script type="text/javascript">
						
						alert("Data Berhasil Disimpan");
						window.location.href="?page=golongan";

					</script>

				<?php
			}
	}
?>