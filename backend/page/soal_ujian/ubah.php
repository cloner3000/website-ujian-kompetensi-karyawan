<?php

	$nama_pelatihan = $_GET['nama_pelatihan'];

	$nama_tipe_test = $_GET['nama_tipe_test'];

	$id_soal = $_GET['id_soal'];

    $sql = $koneksi->query("select * from t_pelatihan where nama_pelatihan='$nama_pelatihan'");

    $tampil = $sql->fetch_assoc();

	$sql2 = $koneksi->query("select * from t_soal where nama_tipe_soal='$nama_pelatihan' and id_soal='$id_soal'");

	$tampil2 = $sql2->fetch_assoc();

	$kunci_jawaban =  $tampil2['kunci_jawaban'];
?>
 <div class="panel panel-primary">
		<div class="panel-heading">
		    Form Ubah Soal <?php echo $nama_tipe_test;?> <?php echo $tampil['keterangan'];?>
        </div>
		<div class="panel-body">
	        <div class="row">
	            <div class="col-md-11">
	                <h3>Ubah Soal <?php echo $nama_tipe_test;?> <?php echo $tampil['keterangan'];?></h3>
	                <form method="POST">
	                 <input type="hidden" name="id_soal" class="field-divided" value="<?php echo $tampil2['id_soal'];?>"/>
	                 <input type="hidden" name="nama_tipe_soal" class="field-divided" value="<?php echo $tampil2['nama_tipe_soal'];?>"/>
	                    <div class="form-group">
	                        <label>Soal</label>
	                        <textarea class="ckeditor" name="soal"><?php echo $tampil2['soal'];?></textarea>
	                    </div>
	                    <div class="form-group">
	                        <label>Pilihan A</label>
	                        <textarea class="ckeditor" name="a"><?php echo $tampil2['a'];?></textarea>
	                    </div>
	                     <div class="form-group">
	                        <label>Pilihan B</label>
	                        <textarea class="ckeditor" name="b"><?php echo $tampil2['b'];?></textarea>
	                    </div>
	                     <div class="form-group">
	                        <label>Pilihan C</label>
	                        <textarea class="ckeditor" name="c"><?php echo $tampil2['c'];?></textarea>
	                    </div>
	                     <div class="form-group">
	                        <label>Pilihan D</label>
	                        <textarea class="ckeditor" name="d"><?php echo $tampil2['d'];?></textarea>
	                    </div>
	                     <div class="form-group">
	                        <label>Pilihan E</label>
	                        <textarea class="ckeditor" name="e"><?php echo $tampil2['e'];?></textarea>
	                    </div>
	                    <div class="form-group">
	                        <label>Kunci jawaban</label>
	                        <textarea class="ckeditor" name="kunci_jawaban"><?php echo $tampil2['kunci_jawaban'];?></textarea>
	                    </div>             
	                    <div>
	                    	<input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
	                    </div>
	            	</div>
	            	</form>
	            	<a href="?page=soal_ujian&aksi=data_soal&nama_pelatihan=<?php echo $nama_pelatihan;?>&nama_tipe_test=<?php echo $nama_tipe_test;?>" class="btn btn-success" style="margin-top: 10px"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></i> Kembali</a>
	         </div>
		</div>
</div> 

<?php

	$soal=$_POST['soal'];
	$a=$_POST['a'];
	$b=$_POST['b'];
	$c=$_POST['c'];
	$d=$_POST['d'];
	$e=$_POST['e'];
	$kunci_jawaban=$_POST['kunci_jawaban'];
	
	$simpan=$_POST['simpan'];

	if ($simpan) {
		
		$sql = $koneksi->query("UPDATE `t_soal` set soal='$soal', a='$a', b='$b', c='$c', d='$d', e='$e', kunci_jawaban='$kunci_jawaban' WHERE id_soal='$id_soal'");

		if ($sql) {
			?>
				<script type="text/javascript">
					
					alert("Data Berhasil Diubah");
					window.location.href="?page=soal_ujian&aksi=data_soal&nama_pelatihan=<?php echo $nama_pelatihan;?>&nama_tipe_test=<?php echo $nama_tipe_test;?>";

				</script>

			<?php
		}
	}
?>