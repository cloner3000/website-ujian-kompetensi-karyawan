<?php
	
	$id = $_GET['id'];

	$nip = $_GET['nip'];

	$sql = $koneksi->query("select * from t_pegawai where id='$id'");
	$data = mysqli_fetch_array($sql);

	if(is_file("assets/foto_karyawan/".$data['foto'])) // Jika foto ada
	unlink("assets/foto_karyawan/".$data['foto']); // Hapus foto yang telah diupload dari folder 

	$koneksi->query("delete from t_pegawai where id = '$id'");

	$koneksi->query("delete from t_hasil_test_keseluruhan where `Nip` = '$nip'");

?>

<script type="text/javascript">					
	alert("Data Berhasil Dihapus");
	window.location.href="?page=data_karyawan";
</script>
