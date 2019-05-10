 <div class="panel panel-primary">
		<div class="panel-heading">
		    Form Ubah Username Password
        </div>
		<div class="panel-body">
	        <div class="row">
	            <div class="col-md-11">
	                <h3>Username Password</h3>
	                <form method="POST" action="" >
	                    <div class="form-group">
	                        <label>Password Lama</label>
	                        <input class="form-control" name="password"/>
	                    </div>
	                    <div class="form-group">
	                        <label>Password Baru</label>
	                        <input class="form-control" name="password1" />
	                    </div>
	                    <div class="form-group">
	                        <label>Ulangi Password Baru</label>
	                        <input class="form-control" name="password2" />
	                    </div>
	                    <div>
	                    	<input type="submit" name="simpan" value="Ubah" class="btn btn-primary">
	                    </div>
	            	</div>
	            	</form>
	         </div>
		</div>
		<div class="panel-footer">
                Form Ubah Username Password 
         </div>
</div> 

<?php
if(isset($_POST['simpan'])){ // jika tombol 'Simpan' dengan properti name="simpan" ditekan
	$nip		= $_SESSION['nip'];
	$password 	= $_POST['password']; 
	$password1 	= $_POST['password1'];
	$password2 	= $_POST['password2'];
	
	$cek = mysqli_query($koneksi, "SELECT * FROM t_pegawai WHERE nip='$nip' AND password='$password'"); // query memilih nik dan password
	if(mysqli_num_rows($cek) == 0){ // mengecek query $cek jika password yang dimasukkan tidak sesuai dengan nik
		echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Password Lama salah, masukan password yang benar</div>'; // maka tampilkan 'Password salah, masukan password yang benar'
	}else{
		if($password1 == $password2){ // jika nilai password1 dan password2 bernilai sama
			if(strlen($password1) >= 3){ // mengecek panjang password minimal 4 karakter
				$pass = ($password1); // enkripsi password dengan md5
				$update = mysqli_query($koneksi, "UPDATE t_pegawai SET password='$pass' WHERE nip='$nip'"); // query update password dari nik yang dipilih
				if($update){ // jika query update berhasil dieksekusi
					?>
					<script type="text/javascript">
						
						alert("Ubah Data Berhasil Disimpan");
						window.location.href="?page=ubah_password";

					</script>

				<?php
				}else{ // jika query update gagal dieksekusi
					echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Password gagal dirubah.</div>';
				}
			}else{ // jika panjang password kurang dari 3 karakter 
				echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Panjang karakter Password minimal 6 karakter.</div>'; // maka tampilkan 'Panjang karakter Password minimal 6 karakter.'
			}
		}else{ // jika password1 dan password2 bernilai berbeda
			echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Pasword Baru tidak sama</div>'; // maka tampilkan 'Pasword tidak sama'
		}
	}
}
?>