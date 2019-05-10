<?php

  //check data
    $sql = $koneksi->query("Select * from t_timer");

    $tampil = $sql->fetch_assoc();

?> 
 <div class="panel panel-primary">
		<div class="panel-heading">
		    Form Ubah Atur Waktu Ujian
        </div>
		<div class="panel-body">
	        <div class="row">
	            <div class="col-md-11">
	                <h3>Ubah Atur Waktu Ujian</h3>
	                <form method="POST">
	                 <input type="hidden" name="id" class="field-divided" value="<?php echo $tampil['id'];?>"/>
	                    <div class="form-group">
	                        <label>Waktu Ujian (per menit)</label>
	                        <input class="form-control" name="timer" value="<?php echo $tampil['timer'];?>"/>
	                    </div>
	                    <div>
	                    	<input type="submit" name="simpan" value="Ubah Timer" class="btn btn-primary">
	                    </div>
	            	</div>
	            	</form>
	         </div>
		</div>
		 <div class="panel-footer">
                Form Ubah Atur Waktu Ujian
        </div>
</div> 

<?php

	
	$id = $_POST['id'];
	$timer = $_POST['timer'];

	
	$simpan=$_POST['simpan'];

		if ($simpan) {
			
			$sql = $koneksi->query("UPDATE `t_timer` set timer='$timer' WHERE id='$id'");

			if ($sql) {
				?>
					<script type="text/javascript">
						
						alert("Ubah Data Berhasil Disimpan");
						window.location.href="?page=timer_ujian";

					</script>

				<?php
			}
		}
?>  