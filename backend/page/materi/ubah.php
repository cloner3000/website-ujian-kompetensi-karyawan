<?php

	$id_materi = $_GET['id_materi'];

	$sql = $koneksi->query("select * from t_materi_soal where id_materi='$id_materi'");

	$tampil = $sql->fetch_assoc();

	$nama_pelatihan=  $tampil['nama_pelatihan'];

	$nama_tipe_test=  $tampil['nama_tipe_test'];
?>

 <div class="panel panel-primary">
		<div class="panel-heading">
		    Form Ubah Materi Soal
        </div>
		<div class="panel-body">
	        <div class="row">
	            <div class="col-md-11">
	                <h3>Ubah 	Materi Soal</h3>
	                <form method="POST" enctype="multipart/form-data">
	                     <input type="hidden" name="id_materi" class="field-divided" value="<?php echo $tampil['id_materi'];?>"/>
                        <div class="form-group">
                            <label>Nama Materi Pelatihan</label>
                            <select class="form-control" name="nama_pelatihan">
                             <?php
	                        	$sql = $koneksi->query("Select * from t_pelatihan order by id_pelatihan");

	                        	while ($data=$sql->fetch_assoc()) {
	                        ?>
	                        	<option value="<?php echo $data['nama_pelatihan']; ?>" <?php if($nama_pelatihan==$data['nama_pelatihan']){ ?>selected<?php } ?>><?php echo $data['nama_pelatihan']; ?></option>
	                        <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Tipe Test</label>
                            <select class="form-control" name="nama_tipe_test">
                             <?php
	                        	$sql = $koneksi->query("Select * from t_tipe_test order by id_tipe_test");

	                        	while ($data=$sql->fetch_assoc()) {
	                        ?>
	                        	<option value="<?php echo $data['nama_tipe_test']; ?>" <?php if($nama_tipe_test==$data['nama_tipe_test']){ ?>selected<?php } ?>><?php echo $data['nama_tipe_test']; ?></option>
	                        <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
	                        <label>Judul Materi</label>
	                         <input class="form-control" name="judul_materi" value="<?php echo $tampil['judul_materi'];?>"/>
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
	
	$id_materi=$_POST['id_materi'];
	$nama_pelatihan=$_POST['nama_pelatihan'];
	$nama_tipe_test=$_POST['nama_tipe_test'];
	$judul_materi=$_POST['judul_materi'];
	$isi_materi=$_POST['isi_materi'];
	
	$simpan=$_POST['simpan'];

	if ($simpan) {
		
		//mendapatkan file upload foto
		$ekstensi_diperbolehkan	= array('pdf');
		$nama = $_FILES['isi_materi']['name'];
		$x = explode('.', $nama);
		$ekstensi = strtolower(end($x));
		$ukuran	= $_FILES['isi_materi']['size'];
		$file_tmp = $_FILES['isi_materi']['tmp_name'];

		if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
				if($ukuran < 5044070){			

					$cek_file = $koneksi->query("select * from t_materi_soal where id_materi = '$id_materi'");
					$data = mysqli_fetch_array($cek_file);

					if(is_file("assets/file/".$data['isi_materi'])) // Jika file ada
					unlink("assets/file/".$data['isi_materi']); // Hapus file yang telah diupload dari folder  

					move_uploaded_file($file_tmp, 'assets/file/'.$nama);
					$sql = $koneksi->query("UPDATE t_materi_soal SET nama_pelatihan='$nama_pelatihan', nama_tipe_test='$nama_tipe_test', judul_materi='$judul_materi', isi_materi='$nama' WHERE id_materi='$id_materi'");
					//$query = mysql_query("INSERT INTO upload VALUES(NULL, '$nama')");
					if($sql){
						?>
							<script type="text/javascript">
								
								alert("Data Berhasil Diubah");
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
				$sql2 = $koneksi->query("UPDATE t_materi_soal SET nama_pelatihan='$nama_pelatihan', nama_tipe_test='$nama_tipe_test', judul_materi='$judul_materi' WHERE id_materi='$id_materi'");
			} if ($sql2) {
				?>
					<script type="text/javascript">
						
						alert("Data Berhasil Diubah");
						window.location.href="?page=materi";

					</script>

				<?php
			} 
	}
?>