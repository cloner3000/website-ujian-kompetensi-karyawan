 <div class="panel panel-primary">
		<div class="panel-heading">
		    Form Tambah Karyawan
        </div>
		<div class="panel-body">
	        <div class="row">
	            <div class="col-md-11">
	                <h3>Tambah Karyawan</h3>
	                <form method="POST" enctype="multipart/form-data">
	                    <div class="form-group">
	                        <label>NIK</label>
	                        <input class="form-control" name="nik" />
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
	                        <input class="form-control" name="nama_jabatan" />
	                    </div>
	                    <div class="form-group">
                            <label>Kategori</label>
                            <select class="form-control" name="nama_kategori">
                                <option value="umum">Umum</option>
                                <option value="non medis">Non Medis</option>
                                <option value="medis">Medis</option>
                            </select>
                        </div>     
	                    <div class="form-group">
	                        <label>Username</label>
	                        <input class="form-control" name="username" />
	                    </div>
	                    <div class="form-group">
	                        <label>Password</label>
	                        <input class="form-control" name="password" />
	                    </div> 
	                    <div class="form-group">
	                        <label>Foto Karyawan</label>
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

	$nik=$_POST['nik'];
	$nama_lengkap=$_POST['nama_lengkap'];
	$jenis_kelamin=$_POST['jenis_kelamin'];
	$tempat_lahir=$_POST['tempat_lahir'];
	$tanggal_lahir=$_POST['tanggal_lahir'];
	$nomor_telepon=$_POST['nomor_telepon'];
	$alamat=$_POST['alamat'];
	$nama_jabatan=$_POST['nama_jabatan'];
	$nama_kategori=$_POST['nama_kategori'];
	$username=$_POST['username'];
	$password=$_POST['password'];
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
					move_uploaded_file($file_tmp, 'assets/foto_karyawan/'.$nama);
					$sql = $koneksi->query("INSERT INTO `t_karyawan`(`nik`, `nama_lengkap`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `nomer_telepon`, `alamat`, `nama_jabatan`, `nama_kategori`, `username`, `password`, `foto`, `bhd`, `k3rs`, `kprs`, `ppi`) VALUES ('$nik','$nama_lengkap','$jenis_kelamin','$tempat_lahir','$tanggal_lahir','$nomor_telepon','$alamat','$nama_jabatan','$nama_kategori','$username','$password', '$nama','N','N','N','N')");
					//$query = mysql_query("INSERT INTO upload VALUES(NULL, '$nama')");
					if($sql){
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
				$sql2 = $koneksi->query("INSERT INTO `t_karyawan`(`nik`, `nama_lengkap`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `nomer_telepon`, `alamat`, `nama_jabatan`, `nama_kategori`, `username`, `password`, `bhd`, `k3rs`, `kprs`, `ppi`) VALUES ('$nik','$nama_lengkap','$jenis_kelamin','$tempat_lahir','$tanggal_lahir','$nomor_telepon','$alamat','$nama_jabatan','$nama_kategori','$username','$password','N','N','N','N')");
			} if ($sql2) {
				?>
					<script type="text/javascript">
						
						alert("Data Berhasil Disimpan");
						window.location.href="?page=data_karyawan";

					</script>

				<?php
			}

		}	 
?>         