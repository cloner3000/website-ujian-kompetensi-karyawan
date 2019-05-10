<?php
	
	$id = $_GET['id'];

	$koneksi->query("delete from t_golongan where id = '$id'");

?>

<script type="text/javascript">					
	alert("Data Berhasil Dihapus");
	window.location.href="?page=golongan";
</script>
