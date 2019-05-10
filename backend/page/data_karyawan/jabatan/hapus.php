<?php
	
	$id = $_GET['id'];

	$koneksi->query("delete from t_jabatan where id = '$id'");

?>

<script type="text/javascript">					
	alert("Data Berhasil Dihapus");
	window.location.href="?page=jabatan";
</script>
