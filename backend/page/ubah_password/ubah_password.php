<?php

  //check data


	$sql = $koneksi->query("Select * from t_user");

	$tampil = $sql->fetch_assoc();

?>
 <div class="panel panel-primary">
		<div class="panel-heading">
		    Form Ubah Username Password Admin
        </div>
		<div class="panel-body">
	        <div class="row">
	            <div class="col-md-11">
	                <h3>Username Password Admin</h3>
	                <form method="POST">
	                <input type="hidden" name="id_user" class="field-divided" value="<?php echo $tampil['id_user'];?>"/>
	                    <div class="form-group">
	                        <label>Username</label>
	                        <input class="form-control" name="username" value="<?php echo $tampil['username'];?>"/>
	                    </div>
	                    <div class="form-group">
	                        <label>Password</label>
	                        <input class="form-control" name="password" value="<?php echo $tampil['password'];?>" />
	                    </div>
	                    <div>
	                    	<input type="submit" name="simpan" value="Ubah" class="btn btn-primary">
	                    </div>
	            	</div>
	            	</form>
	         </div>
		</div>
		<div class="panel-footer">
                Form Ubah Username Password Admin
         </div>
</div> 

<?php

	
	$id_user = $_POST['id_user'];
	$username = $_POST['username'];
	$password = $_POST['password'];

	
	$simpan=$_POST['simpan'];

		if ($simpan) {
			
			$sql = $koneksi->query("UPDATE `t_user` set username='$username', password='$password' WHERE id_user='$id_user'");

			if ($sql) {
				?>
					<script type="text/javascript">
						
						alert("Ubah Data Berhasil Disimpan");
						window.location.href="?page=ubah_password";

					</script>

				<?php
			}
		}
?>    