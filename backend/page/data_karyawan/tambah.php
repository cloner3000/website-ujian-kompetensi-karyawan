<?php 


?>

 <div class="panel panel-primary">
		<div class="panel-heading">
		    Form Tambah Pegawai
        </div>
		<div class="panel-body">
	        <div class="row">
	            <div class="col-md-11">
	                <h3>Tambah Pegawai</h3>
	                <form method="POST" enctype="multipart/form-data">
	                    <div class="form-group">
	                        <label>NIP</label>
	                        <input class="form-control" name="nip" />
	                    </div>
	                    <div class="form-group">
	                        <label>Nama Lengkap</label>
	                        <input class="form-control" name="nama_lengkap" />
	                    </div>
	                    <div class="form-group">
                            <label>Jenis Kelamin</label>
                            <select class="form-control" name="jenis_kelamin">
                                <option value="laki-laki">Laki - Laki</option>
                                <option value="perempuan">Perempuan</option>
                            </select>
                        </div> 
	                    <div class="form-group">
	                        <label>Tempat Lahir</label>
	                        <input class="form-control" name="tempat_lahir" />
	                    </div>
	                    <div class="form-group">
	                        <label>Tanggal Lahir</label>
	                        <input class="form-control" name="tanggal_lahir" type="date"/>
	                    </div>
	                    <div class="form-group">
	                        <label>Nomor Telepon</label>
	                        <input class="form-control" name="nomor_telepon" />
	                    </div>
	                     <div class="form-group">
	                        <label>Alamat</label>
	                        <textarea class="form-control" name="alamat"></textarea>
	                    </div>
	                    <div class="form-group">
	                        <label>Jabatan</label>
	                        <select class="form-control" name="nama_jabatan">
	                        <?php
	                        	$sql = $koneksi->query("Select * from t_jabatan order by id");

	                        	while ($data=$sql->fetch_assoc()) {
	                        		echo "<option value='$data[nama_jabatan]'>$data[nama_jabatan]</option>";
	                        	}
	                        ?>
	                        </select>
	                    </div>
	                    <div class="form-group">
                            <label>Unit Kerja</label>
                            <select class="form-control" name="unit_kerja">
	                        <?php
	                        	$sql = $koneksi->query("Select * from t_unit_kerja order by id");

	                        	while ($data=$sql->fetch_assoc()) {
	                        		echo "<option value='$data[nama_unit_kerja]'>$data[nama_unit_kerja]</option>";
	                        	}
	                        ?>
	                        </select>
                        </div>
                         <div class="form-group">
                            <label>Golongan</label>
                            <select class="form-control" name="nama_golongan">
	                        <?php
	                        	$sql = $koneksi->query("Select * from t_golongan order by id");

	                        	while ($data=$sql->fetch_assoc()) {
	                        		echo "<option value='$data[nama_golongan]'>$data[nama_golongan]</option>";
	                        	}
	                        ?>
	                        </select>
                        </div>
                        <div class="form-group">
	                        <label>Pendidikan</label>
	                        <input class="form-control" name="pendidikan" />
	                    </div>      
	                    <div class="form-group">
	                        <label>Password</label>
	                        <input class="form-control" name="password" />
	                    </div> 
	                    <div class="form-group">
	                        <label>Foto Pegawai</label>
	                        <input class="form-control" name="foto" type="file" />
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

	if(isset($_POST['simpan'])) {
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
	$password=$_POST['password'];
	$foto=$_POST['foto'];
   
	//script validasi data
	$sql_cek =$koneksi->query("SELECT * FROM t_pegawai WHERE nip='$nip'");
	$cek_user = mysqli_num_rows($sql_cek);
	if ($cek_user > 0) {
		echo 'NiP Sudah Terdaftar';
	} else {
		//mendapatkan file upload foto
			$ekstensi_diperbolehkan	= array('png','jpg','jpeg');
			$nama = $_FILES['foto']['name'];
			$x = explode('.', $nama);
			$ekstensi = strtolower(end($x));
			$ukuran	= $_FILES['foto']['size'];
			$file_tmp = $_FILES['foto']['tmp_name'];

		    if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
				if($ukuran < 1044070){			
					move_uploaded_file($file_tmp, 'assets/foto_karyawan/'.$nama);
					$sql = $koneksi->query("INSERT INTO `t_pegawai`(`nip`, `nama_lengkap`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `nomor_telepon`, `alamat`, `nama_jabatan`, `unit_kerja`, `nama_golongan`, `pendidikan`, `password`, `foto`, `status`) VALUES ('$nip','$nama_lengkap','$jenis_kelamin','$tempat_lahir','$tanggal_lahir','$nomor_telepon','$alamat','$nama_jabatan','$unit_kerja', '$nama_golongan','$pendidikan','$password', '$nama','Y')");
					
					 $sql_status = mysqli_query($koneksi, "INSERT INTO t_hasil_test_keseluruhan (`Nip`, `Nama Lengkap`, `Jabatan`, `Unit Kerja`) VALUES ('$nip', '$nama_lengkap' , '$nama_jabatan' , '$unit_kerja')");
					if($sql && $sql_status){
						?>
							<script type="text/javascript">
								
								alert("Data Berhasil Disimpan");
								window.location.href="?page=data_karyawan";

							</script>

						<?php
					}else{
						?>
							<script type="text/javascript">
								
								alert("Data Gagal Disimpan");
								window.location.href="?page=data_karyawan";

							</script>

						<?php
					}
				}else{
					echo 'UKURAN FILE TERLALU BESAR';
				}
			}else {
				$sql2 = $koneksi->query("INSERT INTO `t_pegawai`(`nip`, `nama_lengkap`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `nomor_telepon`, `alamat`, `nama_jabatan`, `unit_kerja`, `nama_golongan`, `pendidikan`, `password`, `status`) VALUES ('$nip','$nama_lengkap','$jenis_kelamin','$tempat_lahir','$tanggal_lahir','$nomor_telepon','$alamat','$nama_jabatan','$unit_kerja','$nama_golongan','$pendidikan', '$password','Y')");

				 $sql_status = mysqli_query($koneksi, "INSERT INTO t_hasil_test_keseluruhan (`Nip`, `Nama Lengkap`, `Jabatan`, `Unit Kerja`) VALUES ('$nip', '$nama_lengkap' , '$nama_jabatan' , '$unit_kerja')");
			} if ($sql2 && $sql_status) {
				?>
					<script type="text/javascript">
						
						alert("Data Berhasil Disimpan");
						window.location.href="?page=data_karyawan";

					</script>

				<?php
			}

		}
   		
	}
?>         