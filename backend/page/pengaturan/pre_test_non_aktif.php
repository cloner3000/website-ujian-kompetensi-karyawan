<?php
	
	$id_pelatihan = $_GET['id_pelatihan'];

	$koneksi->query("UPDATE t_pelatihan SET `Pre Test`='T' WHERE id_pelatihan='$id_pelatihan'");

?>

<script type="text/javascript">					
	alert("Data Berhasil Di Non Aktifkan");
	window.location.href="?page=status_ujian";
</script>