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
                            <label>Nama Materi Pelatihan</label>
                            <select class="form-control" name="nama_pelatihan">
                            <?php
	                        	$sql = $koneksi->query("Select * from t_pelatihan order by id_pelatihan");

	                        	while ($data=$sql->fetch_assoc()) {
	                        		echo "<option value='$data[nama_pelatihan]'>$data[nama_pelatihan]</option>";
	                        	}
	                        ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Tipe Test</label>
                            <select class="form-control" name="nama_tipe_test">
                            <?php
	                        	$sql = $koneksi->query("Select * from t_tipe_test order by id_tipe_test");

	                        	while ($data=$sql->fetch_assoc()) {
	                        		echo "<option value='$data[nama_tipe_test]'>$data[nama_tipe_test]</option>";
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
	                        <input class="form-control" name="isi_materi" type="file" />
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
	$nama_tipe_test=$_POST['nama_tipe_test'];
	$judul_materi=$_POST['judul_materi'];
	$isi_materi=$_POST['isi_materi'];
	
	$simpan=$_POST['simpan'];

	if ($simpan) {
		$sql_cek =$koneksi->query("SELECT * FROM t_materi_soal WHERE nama_pelatihan='$nama_pelatihan' and nama_tipe_test='$nama_tipe_test'");
		$cek_user = mysqli_num_rows($sql_cek);
		if ($cek_user > 0) {
			echo 'Nama Materi Pelatihan Sudah Ada';
		} else {
			//mendapatkan file upload foto
			$ekstensi_diperbolehkan	= array('pdf');
			$nama = $_FILES['isi_materi']['name'];
			$x = explode('.', $nama);
			$ekstensi = strtolower(end($x));
			$ukuran	= $_FILES['isi_materi']['size'];
			$file_tmp = $_FILES['isi_materi']['tmp_name'];

			if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
					if($ukuran < 5044070){			

						move_uploaded_file($file_tmp, 'assets/file/'.$nama);
						$sql = $koneksi->query("INSERT INTO t_materi_soal(`nama_pelatihan`, `nama_tipe_test`, `judul_materi`, `isi_materi`) VALUES('$nama_pelatihan', '$nama_tipe_test', '$judul_materi','$nama')");
						//$query = mysql_query("INSERT INTO upload VALUES(NULL, '$nama')");
						if($sql){
							?>
								<script type="text/javascript">
									
									alert("Data Berhasil Ditambah");
									window.location.href="?page=materi";

								</script>

							<?php
						}else{
							?>
								<script type="text/javascript">
									
									alert("Data Gagal Diubah");
									

								</script>

							<?php
						}
					}else{
						echo 'UKURAN FILE TERLALU BESAR';
					}
				} else {
					$sql2 = $koneksi->query("INSERT INTO t_materi_soal(`nama_pelatihan`,`nama_tipe_test`, `judul_materi`) VALUES('$nama_pelatihan','$nama_tipe_test', '$judul_materi')");
				} if ($sql2) {
					?>
						<script type="text/javascript">
							
							alert("Data Berhasil Ditambah");
							window.location.href="?page=materi";

						</script>

					<?php
				} 
			}
		}
   	   
?>         
