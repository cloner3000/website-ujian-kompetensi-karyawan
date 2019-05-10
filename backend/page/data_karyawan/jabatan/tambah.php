<div class="panel panel-primary">
		<div class="panel-heading">
		    Form Tambah Jabatan
        </div>
		<div class="panel-body">
	        <div class="row">
	            <div class="col-md-11">
	                <h3>Tambah Jabatan</h3>
	                <form method="POST" enctype="multipart/form-data"> 
	                    <div class="form-group">
	                        <label>Nama Jabatan</label>
	                         <input class="form-control" name="nama_jabatan" />
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

	$nama_jabatan=$_POST['nama_jabatan'];
	
	$simpan=$_POST['simpan'];

	if ($simpan) {
		
			$sql = $koneksi->query("INSERT INTO `t_jabatan`(`nama_jabatan`) VALUES ('$nama_jabatan')");

			if ($sql) {
				?>
					<script type="text/javascript">
						
						alert("Data Berhasil Disimpan");
						window.location.href="?page=jabatan";

					</script>

				<?php
			}
	}
?>