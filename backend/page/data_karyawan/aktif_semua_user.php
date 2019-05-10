<?php

	$koneksi->query("UPDATE t_pegawai SET status='Y' ");
?>

<script type="text/javascript">					
	alert("Akun semua User Berhasil Di Aktifkan");
	window.location.href="?page=data_karyawan";
</script>