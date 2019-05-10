<?php
	
	$id = $_GET['id'];

	$koneksi->query("delete from t_unit_kerja where id = '$id'");

?>

<script type="text/javascript">					
	alert("Data Berhasil Dihapus");
	window.location.href="?page=unit_kerja";
</script>
