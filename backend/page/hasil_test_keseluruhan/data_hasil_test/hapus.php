<?php
	
	$id = $_GET['id'];

	$nip = $_GET['nip'];

	$nama_pelatihan = $_GET['nama_pelatihan'];

	$nama_tipe_test = $_GET['nama_tipe_test'];

	$status_ujian = $_GET['status_ujian'];

	//$sql_update = mysqli_query($koneksi, "UPDATE t_hasil_test_keseluruhan SET $nama_pelatihan = 'Belum Mengikuti' where nip='$nip'");

	$sql_delete_nilai = mysqli_query($koneksi, "delete from t_nilai where nip='$nip' and nama_pelatihan='$nama_pelatihan' and nama_tipe_test='$nama_tipe_test'");

	$sql_status_update = mysqli_query($koneksi, "UPDATE t_tanggal_test SET keterangan_ujian = 'Belum Mengikuti' where nip='$nip' and nama_pelatihan='$nama_pelatihan' and nama_tipe_test='$nama_tipe_test'");

?>

<script type="text/javascript">					
	alert("Data Berhasil Dihapus");
	window.location.href="?page=laporan_hasil_test&aksi=data_laporan_hasil_test&nama_pelatihan=<?php echo $nama_pelatihan;?>&nama_tipe_test=<?php echo $nama_tipe_test;?>&status_ujian=<?php echo $status_ujian;?>";
</script>
