<?php

	$nama_pelatihan = $_GET['nama_pelatihan'];

	$id_soal = $_GET['id_soal'];

	$nama_tipe_test = $_GET['nama_tipe_test'];

    $sql = $koneksi->query("select * from t_pelatihan where nama_pelatihan='$nama_pelatihan'");

    $tampil = $sql->fetch_assoc();

	$sql2 = $koneksi->query("select * from t_soal where nama_tipe_soal='$nama_pelatihan' and id_soal='$id_soal'");

	$tampil2 = $sql2->fetch_assoc();

	$kunci_jawaban =  $tampil2['kunci_jawaban'];
?>

 <div class="panel panel-primary">
		<div class="panel-heading">
		    Form Lihat Soal <?php echo $nama_tipe_test;?> <?php echo $tampil['keterangan'];?>
        </div>
		<div class="panel-body">
	        <div class="row">
	            <div class="col-md-11">
	                <h3>Lihat Soal <?php echo $nama_tipe_test;?> <?php echo $tampil['keterangan'];?></h3>
	                <form method="POST">
	                	<table class="table table-striped table-condensed">
	                        <tr>
	                          <th>Soal</th>
	                          <td><?php echo $tampil2['soal'];?></td>
	                        </tr>
	                        <tr>
	                          <th>Pilihan A</th>
	                          <td><?php echo $tampil2['a'];?></td>
	                        </tr>
	                        <tr>
	                          <th>Pilihan B</th>
	                          <td><?php echo $tampil2['b'];?></td>
	                        </tr>
	                        <tr>
	                          <th>Pilihan C</th>
	                          <td><?php echo $tampil2['c'];?></td>
	                        </tr>
	                        <tr>
	                          <th>Pilihan D</th>
	                          <td><?php echo $tampil2['d'];?></td>
	                        </tr>
	                        <tr>
	                          <th>Pilihan E</th>
	                          <td><?php echo $tampil2['e'];?></td>
	                        </tr>
	                        <tr>
	                          <th>Kunci Jawaban</th>
	                          <td><?php echo $tampil2['kunci_jawaban']; ?></td>
	                        </tr>
                   	 </table>
                  </form> 
                  <a href="?page=soal_ujian&aksi=data_soal&nama_pelatihan=<?php echo $nama_pelatihan;?>&nama_tipe_test=<?php echo $nama_tipe_test;?>" class="btn btn-sm btn-success"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> </span>Kembali</a>               
	            </div>
	         </div>
		</div>
		<div class="panel-footer">
	        Form Lihat Soal <?php echo $nama_tipe_test;?> <?php echo $tampil['keterangan'];?><?php echo $tampil['keterangan'];?>
	    </div>
</div> 

