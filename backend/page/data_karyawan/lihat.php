<?php
	$id = $_GET['id'];

	$sql = $koneksi->query("select * from t_pegawai where id='$id'");

	$tampil = $sql->fetch_assoc();

	$jkl = $tampil['jenis_kelamin'];

	$kategori = $tampil['nama_kategori'];

	$tanggallahir = date('Y-m-d', strtotime($tampil['tanggal_lahir']));
?>

 <div class="panel panel-primary">
		<div class="panel-heading">
		    Form Lihat Biodata Pegawai
        </div>
		<div class="panel-body">
	        <div class="row">
	            <div class="col-md-11">
	                <h3>Lihat Biodata Pegawai</h3>
	                <form method="POST">
	                 <table class="table table-striped table-condensed">
                        <tr>
                          <th width="20%">Foto Pegawai</th>
                          <td><img src="<?php echo "assets/foto_karyawan/".$tampil['foto']; ?>" class="user-image img-responsive"/></td>
                        </tr>
                        <tr>
                          <th width="20%">NIK</th>
                          <td><?php echo $tampil['nip']; ?></td>
                        </tr>
                        <tr>
                          <th>Nama Lengkap</th>
                          <td><?php echo $tampil['nama_lengkap']; ?></td>
                        </tr>
                        <tr>
                          <th>Jenis Kelamin</th>
                          <td><?php echo $tampil['jenis_kelamin']; ?></td>
                        </tr>
                        <tr>
                          <th>Tempat Lahir</th>
                          <td><?php echo $tampil['tempat_lahir']; ?></td>
                        </tr>
                        <tr>
                          <th>Tanggal Lahir</th>
                          <td><?php echo''.tanggal_indo($tanggallahir, true).'';?></td>
                        </tr>
                        <tr>
                          <th>Nomor Telepon</th>
                          <td><?php echo $tampil['nomor_telepon']; ?></td>
                        </tr>
                        <tr>
                          <th>Alamat Sekarang</th>
                          <td><?php echo $tampil['alamat']; ?></td>
                        </tr>
                        <tr>
                          <th>Nama Jabatan</th>
                          <td><?php echo $tampil['nama_jabatan']; ?></td>
                        </tr>
                        <tr>
                          <th>Unit Kerja</th>
                          <td><?php echo $tampil['unit_kerja']; ?></td>
                        </tr>
                        <tr>
                          <th>Golongan</th>
                          <td><?php echo $tampil['nama_golongan']; ?></td>
                        </tr>
                         <tr>
                          <th>Pendidikan</th>
                          <td><?php echo $tampil['pendidikan']; ?></td>
                        </tr>
                        <tr>
                          <th>Password</th>
                          <td><?php echo $tampil['password']; ?></td>
                        </tr>
                    </table>
                  </form> 
                  <a href="?page=data_karyawan" class="btn btn-sm btn-success"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> </span>Kembali</a>              
	            	</div>
	         </div>
		</div>
		<div class="panel-footer">
	        Form Lihat Biodata Karyawan
	    </div>
</div> 

