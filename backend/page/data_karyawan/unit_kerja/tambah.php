<div class="panel panel-primary">
		<div class="panel-heading">
		    Form Tambah Unit Kerja
        </div>
		<div class="panel-body">
	        <div class="row">
	            <div class="col-md-11">
	                <h3>Tambah Unit Kerja</h3>
	                <form method="POST" enctype="multipart/form-data"> 
	                    <div class="form-group">
	                        <label>Nama Unit Kerja</label>
	                         <input class="form-control" name="nama_unit_kerja" />
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

	$nama_unit_kerja=$_POST['nama_unit_kerja'];
	$keterangan=$_POST['keterangan'];
	
	$simpan=$_POST['simpan'];

	if ($simpan) {
		
			$sql = $koneksi->query("INSERT INTO `t_unit_kerja`(`nama_unit_kerja`, `keterangan`) VALUES ('$nama_unit_kerja', '$keterangan')");

			if ($sql) {
				?>
					<script type="text/javascript">
						
						alert("Data Berhasil Disimpan");
						window.location.href="?page=unit_kerja";

					</script>

				<?php
			}
	}
?>