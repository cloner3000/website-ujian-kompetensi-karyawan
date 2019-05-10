<?php
	
	$id_pelatihan = $_GET['id_pelatihan'];

	$nama_pelatihan = $_GET['nama_pelatihan'];

	$sql = $koneksi->query("delete from t_pelatihan where id_pelatihan = '$id_pelatihan'");

	$sql2 = $koneksi->query("ALTER TABLE `t_hasil_test_keseluruhan` DROP `$nama_pelatihan`");

	//$sql_hps_tgl = mysqli_query($koneksi, "ALTER TABLE `t_hasil_test_keseluruhan` DROP `tgl_$nama_pelatihan`");

	if ($sql && $sql2) {
			?>

			<script type="text/javascript">					
				alert("Data Berhasil Dihapus");
				window.location.href="?page=pelatihan";
			</script>

			<?php
		} else if ($sql) {
			?>
			<script type="text/javascript">					
				alert("Data Berhasil Dihapus");
				window.location.href="?page=pelatihan";
			</script>
			<?php
		}
?>


