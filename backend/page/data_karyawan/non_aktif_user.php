<?php
	
	$id = $_GET['id'];

	$koneksi->query("UPDATE t_pegawai SET status='N' WHERE id='$id' ");
?>

<script type="text/javascript">					
	alert("Akun user Berhasil Di Non Aktifkan");
	window.location.href="?page=data_karyawan";
</script>