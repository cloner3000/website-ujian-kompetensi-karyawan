<!DOCTYPE html>
<html>
<head>
	<title>Membuat Form Posting Dengan CKEditor | www.malasngoding.com</title>	
	<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

     <div class="kotak">
		<h1>
			Membuat Form Posting Dengan CKEditor<br/> 
			Cara Menggunakan CKEditor <br/> 
			www.malasngoding.com
		</h1>	

	<form action="" method="post">
		<textarea class="ckeditor" name="editor"></textarea>
		<br/>
		<input class="tombol" type="submit" value="INSERT"></input>
	</form>
	</div>
</body>
</html>

<?php
	if(isset($_POST['editor']))
	{
		$text = $_POST['editor'];

		$con = mysqli_connect('localhost','root','','db_ujian_online_karyawan') or die("ERROR");	

		//echo "$text";

		$query=mysqli_query($con, "INSERT INTO t_aturan (isi_aturan) VALUES ('$text')") or die(mysql_error());

	}
?>