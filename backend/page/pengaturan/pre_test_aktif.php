<?php
	
	$id_pelatihan = $_GET['id_pelatihan'];

	$koneksi->query("UPDATE t_pelatihan SET `Pre Test`='Y' WHERE id_pelatihan='$id_pelatihan' ");
?>

<script type="text/javascript">					
	alert("Halaman Berhasil Di Aktifkan");
	window.location.href="?page=status_ujian";
</script>