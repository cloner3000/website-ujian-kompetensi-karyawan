<?php

	$nama_pelatihan = $_GET['nama_pelatihan'];

    $nama_tipe_test = $_GET['nama_tipe_test'];

	$koneksi->query("delete from t_soal where nama_tipe_soal = '$nama_pelatihan' and nama_tipe_test = '$nama_tipe_test'");

?>

<script type="text/javascript">					
	alert("Data Berhasil Dihapus");
	window.location.href="?page=soal_ujian&aksi=data_soal&nama_pelatihan=<?php echo $nama_pelatihan;?>&nama_tipe_test=<?php echo $nama_tipe_test;?>";
</script>
