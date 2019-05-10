<?php
	$koneksi = new mysqli("localhost","root","","db_ujian_online_karyawan");

  $nama_pelatihan = $_GET['nama_pelatihan'];

  $nama_tipe_test = $_GET['nama_tipe_test'];

  $sql2 = $koneksi->query("select * from t_pelatihan where nama_pelatihan='$nama_pelatihan'");

  $tampil2 = $sql2->fetch_assoc();

  $tgl = "tgl_$nama_pelatihan";

	$filename = "Laporan_Belum_Test_excel-(".date('d-m-Y').").xls";

	header("content-disposition: attachment; filename=$filename");
	header("content-type: application/vdn.ms-exel");

?>

<h2>Laporan Sudah Test <?php echo $nama_tipe_test;?> <?php echo $tampil2['keterangan'];?></h2>

<table border="1">
	<tr>
    <th>No</th>
    <th>NIP</th>
    <th>Nama</th>
    <th>Jabatan</th>
    <th>Unit Kerja</th>
	</tr>
	 <?php
        $no = 1;

        //$sql = $koneksi-> query("select * from t_hasil_test_keseluruhan where $nama_pelatihan IS NULL OR $nama_pelatihan='0' oR $nama_pelatihan='Belum Mengikuti'");

        $sql = $koneksi-> query("select * from t_tanggal_test inner join t_pegawai on t_tanggal_test.nip = t_pegawai.nip where nama_pelatihan ='$nama_pelatihan' and keterangan_ujian ='Belum Mengikuti' and nama_tipe_test='$nama_tipe_test'");

        while($data=$sql->fetch_assoc()){    
    ?>
  <tr>
	    <td><?php echo $no++;?></td>
      <td><?php echo $data['nip'];?></td>
      <td><?php echo $data['nama_lengkap'];?></td>
      <td><?php echo $data['nama_jabatan'];?></td>
      <td><?php echo $data['unit_kerja'];?></td>
	</tr>

	<?php } ?>
</table>