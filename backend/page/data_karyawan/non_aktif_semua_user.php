<?php
	
	$koneksi->query("UPDATE t_pegawai SET status='N'");
?>

<script type="text/javascript">					
	alert("Akun semua User Berhasil Di Non Aktifkan");
	window.location.href="?page=data_karyawan";
</script>