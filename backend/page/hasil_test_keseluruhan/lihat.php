<?php
	$nip = $_GET['nip'];

	$id = $_GET['nomor'];

	$sql = $koneksi->query("select * from t_hasil_test_keseluruhan where Nip='$nip'");

	$tampil = $sql->fetch_assoc();

	//$jkl = $tampil['jenis_kelamin'];
?>

 <div class="panel panel-primary">
		<div class="panel-heading">
		    Form Lihat Hasil Test Post Test User
        </div>
		<div class="panel-body">
	        <div class="row">
	            <div class="col-md-11">
	                <h3>Lihat Hasil Test Keseluruhan Post Test User</h3>
	                <form method="POST">
	                	 <table class="table table-striped table-condensed">
		                	<tr>
	                          <th width="20%">NIP</th>
	                          <td><?php echo $tampil['Nip']; ?></td>
	                        </tr>
	                        <tr>
	                          <th>Nama Lengkap</th>
	                          <td><?php echo $tampil['Nama Lengkap']; ?></td>
	                        </tr>
	                        <tr>
	                          <th>Nama Jabatan</th>
	                          <td><?php echo $tampil['Jabatan']; ?></td>
	                        </tr>
                        	<tr>
	                          <th>Unit Kerja</th>
	                          <td><?php echo $tampil['Unit Kerja']; ?></td>
	                        </tr>
	                	 </table>
                    </form> 
                   <h3> List Test Ujian Kompetensi Post Test</h3>
                  <table class="table table-striped table-condensed"> 
                      <tr>
                          <th>No</th>
                          <th>Nama Ujian</th>
                          <th>Keterangan</th>
                          <th>Tanggal Ujian</th>
                      </tr>
                      <?php
                        $no = 1;

                         $sql2 = $koneksi-> query("select * from t_tanggal_test inner join t_pelatihan on t_tanggal_test.nama_pelatihan = t_pelatihan.nama_pelatihan where nip='".$tampil['Nip']."' and nama_tipe_test='Post Test' order by t_pelatihan.keterangan asc ");

                        while($data=$sql2->fetch_assoc()){ 

                      ?>
                      <tr>
                          <td><?php echo $no++;?></td>
                          <td><?php echo $data['keterangan'];?></td>
                          <td><?php echo $data['keterangan_ujian'];?></td>
                          <td><?php echo $data['tanggal_test'];?></td>
                      </tr>
                      <?php } ?> 
                  </table> 
                  <a href="?page=laporan_hasil_test_keseluruhan" class="btn btn-sm btn-success"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> </span>Kembali</a>      
            	</div>
	         </div>
		</div>
		<div class="panel-footer">
	        Form Lihat Hasil Keseluruhan Post Test User
	    </div>
</div> 

