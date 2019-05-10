 <?php

	$id = $_GET['id'];

	$sql = $koneksi->query("select * from t_pegawai where id='$id'");

	$tampil = $sql->fetch_assoc();

	$jkl = $tampil['jenis_kelamin'];
	
	$jabatan = $tampil['nama_jabatan'];

	$unit_kerja= $tampil['unit_kerja'];

	$golongan= $tampil['nama_golongan'];
?>

 <div class="panel panel-primary">
		<div class="panel-heading">
		    Form Ubah Profil Karyawan
        </div>
		<div class="panel-body">
	        <div class="row">
	            <div class="col-md-11">
	                <h3>Profil Ubah Karyawan</h3>
	                <form method="POST" enctype="multipart/form-data">
	                    <div class="form-group">
	                        <label>NIP</label>
	                        <input class="form-control" name="nip" value="<?php echo $tampil['nip'];?>" readonly>
	                    </div>
	                    <div class="form-group">
	                        <label>Nama Lengkap</label>
	                        <input class="form-control" name="nama_lengkap" value="<?php echo $tampil['nama_lengkap'];?>" />
	                    </div>
	                    <div class="form-group">
                            <label>Jenis Kelamin</label>
                            <select class="form-control" name="jenis_kelamin">
                                <option value="laki-laki" <?php if ($jkl=='laki-laki'){echo "selected";}?>>Laki - Laki</option>
                                <option value="perempuan" <?php if ($jkl=='perempuan'){echo "selected";}?>>Perempuan</option>
                            </select>
                        </div> 
	                    <div class="form-group">
	                        <label>Tempat Lahir</label>
	                        <input class="form-control" name="tempat_lahir" value="<?php echo $tampil['tempat_lahir'];?>"/>
	                    </div>
	                    <div class="form-group">
	                        <label>Tanggal Lahir</label>
	                        <input class="form-control" name="tanggal_lahir" type="date" value="<?php echo $tampil['tanggal_lahir'];?>"/>
	                    </div>
	                    <div class="form-group">
	                        <label>Nomor Telepon</label>
	                        <input class="form-control" name="nomor_telepon" value="<?php echo $tampil['nomor_telepon'];?>"/>
	                    </div>
	                     <div class="form-group">
	                        <label>Alamat</label>
	                        <textarea class="form-control" name="alamat"><?php echo $tampil['alamat'];?></textarea>
	                    </div>
	                    <div class="form-group">
	                        <label>Jabatan</label>
	                        <select class="form-control" name="nama_jabatan">
	                        <?php
	                        	$sql = $koneksi->query("Select * from t_jabatan order by id");

	                        	while ($data=$sql->fetch_assoc()) {
	                        ?>
	                        	<option value="<?php echo $data['nama_jabatan']; ?>" <?php if($jabatan==$data['nama_jabatan']){ ?>selected<?php } ?>><?php echo $data['nama_jabatan']; ?></option>
	                        <?php } ?>
	                        </select>
	                    </div>
	                    <div class="form-group">
	                        <label>Unit Kerja</label>
                            <select class="form-control" name="unit_kerja">
	                        <?php
	                        	$sql = $koneksi->query("Select * from t_unit_kerja order by id");

	                        	while ($data=$sql->fetch_assoc()) {
	                        ?>
	                        	<option value="<?php echo $data['nama_unit_kerja']; ?>" <?php if($unit_kerja==$data['nama_unit_kerja']){ ?>selected<?php } ?>><?php echo $data['nama_unit_kerja']; ?></option>
	                        <?php } ?>
	                        </select>
	                    </div>
	                    <div class="form-group">
	                        <label>Golongan</label>
                            <select class="form-control" name="nama_golongan">
	                        <?php
	                        	$sql = $koneksi->query("Select * from t_golongan order by id");

	                        	while ($data=$sql->fetch_assoc()) {
	                        ?>
	                        	<option value="<?php echo $data['nama_golongan']; ?>" <?php if($golongan==$data['nama_golongan']){ ?>selected<?php } ?>><?php echo $data['nama_golongan']; ?></option>
	                        <?php } ?>
	                        </select>
	                    </div> 
	                     <div class="form-group">
	                        <label>Pendidikan</label>
	                        <input class="form-control" name="pendidikan" value="<?php echo $tampil['pendidikan'];?>"/>
	                    </div>   
	                    <div class="form-group">
	                        <label>Foto Profil</label>
	                        <input class="form-control" name="foto" type="file" />
	                    </div>
	                    <div>
	                    	<input type="submit" name="simpan" value="Ubah" class="btn btn-primary">
	                    </div>
	            	</div>
	            	</form>
	         </div>
		</div>
		<div class="panel-footer">
                Form Profil Karyawan 
         </div>
</div> 

<?php

	$nip=$_POST['nip'];
	$nama_lengkap=$_POST['nama_lengkap'];
	$jenis_kelamin=$_POST['jenis_kelamin'];
	$tempat_lahir=$_POST['tempat_lahir'];
	$tanggal_lahir=$_POST['tanggal_lahir'];
	$nomor_telepon=$_POST['nomor_telepon'];
	$alamat=$_POST['alamat'];
	$nama_jabatan=$_POST['nama_jabatan'];
	$unit_kerja=$_POST['unit_kerja'];
	$nama_golongan=$_POST['nama_golongan'];
	$pendidikan=$_POST['pendidikan'];
	$foto=$_POST['foto'];

	$simpan=$_POST['simpan'];

	if ($simpan) {
		//mendapatkan file upload foto
		$ekstensi_diperbolehkan	= array('png','jpg','jpeg');
		$nama = $_FILES['foto']['name'];
		$x = explode('.', $nama);
		$ekstensi = strtolower(end($x));
		$ukuran	= $_FILES['foto']['size'];
		$file_tmp = $_FILES['foto']['tmp_name'];

		if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
				if($ukuran < 1044070){			

					$cek_foto = $koneksi->query("select * from t_pegawai where id='$id'");
					$data = mysqli_fetch_array($cek_foto);

					if(is_file("backend/assets/foto_karyawan/".$data['foto'])) // Jika foto ada
					unlink("backend/assets/foto_karyawan/".$data['foto']); // Hapus foto yang telah diupload dari folder 

					move_uploaded_file($file_tmp, 'backend/assets/foto_karyawan/'.$nama);
					$sql = $koneksi->query("UPDATE `t_pegawai` set  nip='$nip', nama_lengkap='$nama_lengkap', jenis_kelamin='$jenis_kelamin', tempat_lahir='$tempat_lahir', tanggal_lahir='$tanggal_lahir', nomor_telepon='$nomor_telepon', alamat='$alamat', nama_jabatan='$nama_jabatan',unit_kerja='$unit_kerja',nama_golongan='$nama_golongan',pendidikan='$pendidikan', foto='$nama' WHERE id='$id'");
					
					$sql_status =  $koneksi->query("UPDATE `t_hasil_test_keseluruhan` set `Nama Lengkap` ='$nama_lengkap', `Jabatan` ='$nama_jabatan', `Unit Kerja` ='$unit_kerja' WHERE `Nip` ='$nip'");
					//$query = mysql_query("INSERT INTO upload VALUES(NULL, '$nama')");
					if($sql && $sql_status){
						?>
							<script type="text/javascript">
								
								alert("Data Berhasil Diubah");
								window.location.href="?page=profil";

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
				$sql2 = $koneksi->query("UPDATE `t_pegawai` set  nip='$nip', nama_lengkap='$nama_lengkap', jenis_kelamin='$jenis_kelamin', tempat_lahir='$tempat_lahir', tanggal_lahir='$tanggal_lahir', nomor_telepon='$nomor_telepon', alamat='$alamat', nama_jabatan='$nama_jabatan',unit_kerja='$unit_kerja',nama_golongan='$nama_golongan',pendidikan='$pendidikan' WHERE nip='$nip'");
				
				$sql_status =  $koneksi->query("UPDATE `t_hasil_test_keseluruhan` set `Nama Lengkap` ='$nama_lengkap', `Jabatan` ='$nama_jabatan', `Unit Kerja` ='$unit_kerja' WHERE `Nip` ='$nip'");
			} if ($sql2 && $sql_status) {
				?>
					<script type="text/javascript">
						
						alert("Data Berhasil Diubah");
						window.location.href="?page=profil";

					</script>

				<?php
			} 
	}

?>
