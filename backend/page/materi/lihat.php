<?php

	$id_materi = $_GET['id_materi'];

	$sql = $koneksi->query("select * from t_materi_soal where id_materi='$id_materi'");

	$tampil = $sql->fetch_assoc();

	$nama_tipe_soal =  $tampil['nama_tipe_soal'];
?>
 <div class="panel panel-primary">
		<div class="panel-heading">
		    Form Lihat Materi Soal
        </div>
		<div class="panel-body">
	        <div class="row">
	            <div class="col-md-11">
	                <h3>Lihat Materi Soal</h3>
	                <form method="POST">
		                <div style='border-bottom:1px solid #000'><?php echo $tampil['judul_materi']; ?></div>
		                <div>Tipe Soal : <?php echo $tampil['nama_pelatihan']; ?></div><br>
		                <div>Tipe Test : <?php echo $tampil['nama_tipe_test']; ?></div><br>
						<div>
							<embed src="assets/file/<?php echo $tampil['isi_materi'];?>" type='application/pdf' width='109%' height='700px'/>
						</div>
                    </form> 
                    <a href="?page=materi" class="btn btn-sm btn-success"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> </span>Kembali</a>               
	            </div>
	         </div>
		</div>
		<div class="panel-footer">
	        Form Lihat Materi Soal
	    </div>
</div> 

