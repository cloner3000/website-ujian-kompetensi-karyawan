<?php

  //check data
    $sql = $koneksi->query("Select * from t_aturan");

    $tampil = $sql->fetch_assoc();

?> 
 <div class="panel panel-primary">
		<div class="panel-heading">
		    Form Ubah Aturan Ujian Komptensi
        </div>
		<div class="panel-body">
	        <div class="row">
	            <div class="col-md-11">
	                <h3>Aturan Ujian Kompetensi</h3>
	                <form method="POST">
	                 <input type="hidden" name="id_aturan" class="field-divided" value="<?php echo $tampil['id_aturan'];?>"/>
	                    <div class="form-group">
	                        <label>Aturan</label>
	                        <textarea class="ckeditor" name="isi_aturan"><?php echo $tampil['isi_aturan'];?></textarea>
	                    </div>
	                    <div>
	                    	<input type="submit" name="simpan" value="Ubah Aturan" class="btn btn-primary">
	                    </div>
	            	</div>
	            	</form>
	         </div>
		</div>
		 <div class="panel-footer">
                Form Ubah Aturan Ujian Komptensi
        </div>
</div> 

<?php

	
	$id_aturan = $_POST['id_aturan'];
	$isi_aturan = $_POST['isi_aturan'];

	
	$simpan=$_POST['simpan'];

		if ($simpan) {
			
			$sql = $koneksi->query("UPDATE `t_aturan` set isi_aturan='$isi_aturan' WHERE id_aturan='$id_aturan'");

			if ($sql) {
				?>
					<script type="text/javascript">
						
						alert("Ubah Data Berhasil Disimpan");
						window.location.href="?page=aturan";

					</script>

				<?php
			}
		}
?>  