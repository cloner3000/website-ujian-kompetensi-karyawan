<?php
	$koneksi = new mysqli("localhost","root","","db_ujian_online_karyawan");

  $nama_pelatihan = $_GET['nama_pelatihan'];

  $nama_tipe_test = $_GET['nama_tipe_test'];

  $status_ujian = $_GET['status_ujian'];

  $sql2 = $koneksi->query("select * from t_pelatihan where nama_pelatihan='$nama_pelatihan'");

  $tampil2 = $sql2->fetch_assoc();

	$filename = "Laporan_Hasil_Test_excel-(".date('d-m-Y').").xls";

	header("content-disposition: attachment; filename=$filename");
	header("content-type: application/vdn.ms-exel");

?>

<h2>Laporan Hasil Test <?php echo $status_ujian;?> <?php echo $nama_tipe_test;?> <?php echo $tampil2['keterangan'];?></h2>

<table border="1">
	<tr>
	      <th>No</th>
        <th>NIP</th>
        <th>Nama</th>
        <th>Nama Jabatan</th>
        <th>Unit Kerja</th>
        <th>NIlai</th>
	</tr>
	 <?php
        $no = 1;

        $sql = $koneksi-> query("select * from t_nilai inner join t_pegawai on t_nilai.nip = t_pegawai.nip where nama_pelatihan ='$nama_pelatihan' and nama_tipe_test='$nama_tipe_test' and status_ujian = '$status_ujian'");

        while($data=$sql->fetch_assoc()){    
    ?>
  <tr>
	  <td><?php echo $no++;?></td>
    <td><?php echo $data['nip'];?></td>
    <td><?php echo $data['nama_lengkap'];?></td>
    <td><?php echo $data['nama_jabatan'];?></td>
    <td><?php echo $data['unit_kerja'];?></td>
    <td><?php echo $data['nilai'];?></td>
	</tr>

	<?php } ?>
</table>