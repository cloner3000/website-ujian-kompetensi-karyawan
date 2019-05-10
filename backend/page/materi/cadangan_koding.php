 <div class="panel panel-primary">
		<div class="panel-heading">
		    Form Tambah Materi Soal
        </div>
		<div class="panel-body">
	        <div class="row">
	            <div class="col-md-11">
	                <h3>Tambah Materi Soal</h3>
	                <form method="POST" enctype="multipart/form-data">  
	                    <div class="form-group">
                            <label>Materi Soal</label>
                            <select class="form-control" name="nama_pelatihan">
                            <?php
	                        	$sql = $koneksi->query("Select * from t_pelatihan order by id_pelatihan");

	                        	while ($data=$sql->fetch_assoc()) {
	                        		echo "<option value='$data[nama_pelatihan]'>$data[keterangan]</option>";
	                        	}
	                        ?>
                            </select>
                        </div>
                        <div class="form-group">
	                        <label>Judul Materi</label>
	                         <input class="form-control" name="judul_materi" />
	                    </div>
	                    <div class="form-group">
	                        <label>Isi Materi</label>
	                        <input class="form-control" name="myFile" type="file" class="filestyle" data-icon="false" />
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
	$judul_materi=$_POST['judul_materi'];
	
	$simpan=$_POST['simpan'];

	if ($simpan) {
		
		// definisi folder upload
			define("UPLOAD_DIR", "assets/file/");

			if (!empty($_FILES["myFile"])) {
			  $myFile = $_FILES["myFile"];
			  $ext    = pathinfo($_FILES["myFile"]["name"], PATHINFO_EXTENSION);
			  $size   = $_FILES["myFile"]["size"];
			  $tgl   = date("Y-m-d");

			  if ($myFile["error"] !== UPLOAD_ERR_OK) {
			    echo '<div class="alert alert-warning">Gagal upload file.</div>';
			    exit;
			  }

			  // filename yang aman
			  $name = preg_replace("/[^A-Z0-9._-]/i", "_", $myFile["name"]);

			  // mencegah overwrite filename
			  $i = 0;
			  $parts = pathinfo($name);
			  while (file_exists(UPLOAD_DIR . $name)) {
			    $i++;
			    $name = $parts["filename"] . "-" . $i . "." . $parts["extension"];
			  }

			  // upload file
			  $success = move_uploaded_file($myFile["tmp_name"],
			    UPLOAD_DIR . $name);
			  if (!$success) { 
			    echo '<div class="alert alert-warning">Gagal upload file.</div>';
			    exit;
			  }else{

			    $insert = $koneksi->query("INSERT INTO t_materi_soal(`nama_pelatihan`, `judul_materi`, `isi_materi`) VALUES('$nama_pelatihan','$judul_materi','$name')");
			    if($insert){
					?>
						<script type="text/javascript">
							
							alert("Data Berhasil Disimpan");
							window.location.href="?page=materi";

						</script>

					<?php
			    }else{
			      echo '<div class="alert alert-warning">Gagal upload file.</div>';
			      exit;
			    }
			  }

			  // set permisi file
			  chmod(UPLOAD_DIR . $name, 0644);
			}

	}
      
?>         
