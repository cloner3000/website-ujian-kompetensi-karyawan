<?php

    $tanggallahir = date('Y-m-d', strtotime($row['tanggal_lahir']));
?>

<div class="panel panel-primary">
		<div class="panel-heading">
		    Form Profil Pegawai
        </div>
		<div class="panel-body">
	        <div class="row">
	            <div class="col-md-11">
	                <h3>Profil Pegawai</h3>
	                <form method="POST">
	                    <table class="table table-striped table-condensed">
							<tr>
								<th width="20%">NIP</th>
								<td><?php echo $row['nip']; ?></td>
							</tr>
							<tr>
								<th>Nama Lengkap</th>
								<td><?php echo $row['nama_lengkap']; ?></td>
							</tr>
							<tr>
								<th>Jenis Kelamin</th>
								<td><?php echo $row['jenis_kelamin']; ?></td>
							</tr>
							<tr>
								<th>Tempat Lahir</th>
								<td><?php echo $row['tempat_lahir']; ?></td>
							</tr>
							<tr>
								<th>Tanggal Lahir</th>
								<td><?php echo''.tanggal_indo($tanggallahir, true).'';?></td>
							</tr>
							<tr>
								<th>Nomor Telepon</th>
								<td><?php echo $row['nomor_telepon']; ?></td>
							</tr>
							<tr>
								<th>Alamat</th>
								<td><?php echo $row['alamat']; ?></td>
							</tr>
							<tr>
								<th>Jabatan</th>
								<td><?php echo $row['nama_jabatan']; ?></td>
							</tr>
							<tr>
								<th>Unit Kerja</th>
								<td><?php echo $row['unit_kerja']; ?></td>
							</tr>
							<tr>
								<th>Golongan</th>
								<td><?php echo $row['nama_golongan']; ?></td>
							</tr>
							<tr>
								<th>Pendidikan</th>
								<td><?php echo $row['pendidikan']; ?></td>
							</tr>
						</table>
	            	</form>
	            	<a href="?page=profil&aksi=ubah&id=<?php echo $row['id'];?>" class="btn btn-sm btn-success"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Edit Profile</a>
	         </div>

		</div>
		<div class="panel-footer">
                Form Profil Pegawai 
         </div>
</div> 