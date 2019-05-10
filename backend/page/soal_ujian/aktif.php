<?php
	
	$id_soal= $_GET['id_soal'];

	$nama_pelatihan = $_GET['nama_pelatihan'];

    $nama_tipe_test = $_GET['nama_tipe_test'];

	$koneksi->query("UPDATE t_soal SET status='Y' WHERE id_soal='$id_soal' ");
?>

<script type="text/javascript">					
	alert("Data Berhasil Diaktifkan");
	window.location.href="?page=soal_ujian&aksi=data_soal&nama_pelatihan=<?php echo $nama_pelatihan;?>&nama_tipe_test=<?php echo $nama_tipe_test;?>";
</script>