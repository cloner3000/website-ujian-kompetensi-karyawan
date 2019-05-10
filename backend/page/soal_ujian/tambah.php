<?php

    $nama_pelatihan = $_GET['nama_pelatihan'];

    $nama_tipe_test = $_GET['nama_tipe_test'];

    $sql = $koneksi->query("select * from t_pelatihan where nama_pelatihan='$nama_pelatihan'");

    $tampil = $sql->fetch_assoc();

?>

 <div class="panel panel-primary">
		<div class="panel-heading">
		    Form Tambah Soal <?php echo $nama_tipe_test;?> <?php echo $tampil['keterangan'];?>
        </div>
		<div class="panel-body">
	        <div class="row">
	            <div class="col-md-11">
	                <h3>Tambah Soal <?php echo $nama_tipe_test;?> <?php echo $tampil['keterangan'];?></h3>
	                <form method="POST">
	                    <div class="form-group">
	                        <label>Soal</label>
	                        <textarea class="ckeditor" name="soal"></textarea>
	                    </div>
	                    <div class="form-group">
	                        <label>Pilihan A</label>
	                        <textarea class="ckeditor" name="a"></textarea>
	                    </div>
	                     <div class="form-group">
	                        <label>Pilihan B</label>
	                        <textarea class="ckeditor" name="b"></textarea>
	                    </div>
	                     <div class="form-group">
	                        <label>Pilihan C</label>
	                        <textarea class="ckeditor" name="c"></textarea>
	                    </div>
	                     <div class="form-group">
	                        <label>Pilihan D</label>
	                        <textarea class="ckeditor" name="d"></textarea>
	                    </div>
	                     <div class="form-group">
	                        <label>Pilihan E</label>
	                        <textarea class="ckeditor" name="e"></textarea>
	                    </div>
	                    <div class="form-group">
	                        <label>PKunci JawabanE</label>
	                        <textarea class="ckeditor" name="kunci_jawaban"></textarea>
	                    </div>
	                    <!--div class="form-group">
                            <label>Kunci Jawaban</label>
                            <select class="form-control" name="kunci_jawaban">
                                <option value="a">A</option>
                                <option value="b">B</option>
                                <option value="c">C</option>
                                <option value="d">D</option>
                                <option value="e">E</option>
                            </select>
                        </div-->                    
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
		
		$sql = $koneksi->query("INSERT INTO `t_soal`(`nama_tipe_soal`, `nama_tipe_test`, `soal`, `a`, `b`, `c`, `d`, `e`, `kunci_jawaban`, `status`) VALUES ('$nama_pelatihan','$nama_tipe_test','$soal','$a','$b','$c','$d','$e','$kunci_jawaban','Y')");

		if ($sql) {
			?>
				<script type="text/javascript">
					
					alert("Data Berhasil Disimpan");
					window.location.href="?page=soal_ujian&aksi=data_soal&nama_pelatihan=<?php echo $nama_pelatihan;?>&nama_tipe_test=<?php echo $nama_tipe_test;?>";

				</script>

			<?php
		}
	}
?>