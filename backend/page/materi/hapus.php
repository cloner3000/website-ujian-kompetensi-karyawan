<?php
	
	$id_materi = $_GET['id_materi'];

	$sql = $koneksi->query("select * from t_materi_soal where id_materi = '$id_materi'");
	$data = mysqli_fetch_array($sql);

	if(is_file("assets/file/".$data['isi_materi'])) // Jika file ada
	unlink("assets/file/".$data['isi_materi']); // Hapus file yang telah diupload dari folder 

	$koneksi->query("delete from t_materi_soal where id_materi = '$id_materi'");

?>

<script type="text/javascript">					
	alert("Data Berhasil Dihapus");
	window.location.href="?page=materi";
</script>
