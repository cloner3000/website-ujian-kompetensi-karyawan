<?php
	$koneksi = new mysqli("localhost","root","","db_ujian_online_karyawan");

	$nama_pelatihan = $_GET['nama_pelatihan'];

    $nama_tipe_test = $_GET['nama_tipe_test'];

	$sql2 = $koneksi->query("select * from t_pelatihan where nama_pelatihan='$nama_pelatihan'");

	$tampil2 = $sql2->fetch_assoc();

	$filename = "Laporan_Soal_excel-(".date('d-m-Y').").xls";

	header("content-disposition: attachment; filename=$filename");
	header("content-type: application/vdn.ms-exel");

?>

<h2>Laporan Soal <?php echo $nama_tipe_test;?> <?php echo $tampil2['keterangan'];?></h2>

<table border="1">
	<tr>
	    <th>No</th>
	    <th>Soal</th>
		<th>Pilihan A</th>
		<th>Pilihan B</th>
		<th>Pilihan C</th>
		<th>Pilihan D</th>
		<th>Pilihan E</th>
        <th>Kunci Jawaban</th>
	</tr>
	 <?php
        $no = 1;

        $sql = $koneksi-> query("select * from t_soal where nama_tipe_soal='$nama_pelatihan' and nama_tipe_test ='$nama_tipe_test'");

        while($data=$sql->fetch_assoc()){    
    ?>
    <tr>
	    <td><?php echo $no++;?></td>
	    <td><?php echo $data['soal'];?></td>
	    <td><?php echo $data['a'];?></td>
	    <td><?php echo $data['b'];?></td>
	    <td><?php echo $data['c'];?></td>
	    <td><?php echo $data['d'];?></td>
	    <td><?php echo $data['e'];?></td>
	    <td><?php echo $data['kunci_jawaban'];?></td>
	</tr>

	<?php } ?>
</table>