<?php
	$koneksi = new mysqli("localhost","root","","db_ujian_online_karyawan");

	$filename = "Laporan_Hasil_Test_Keseluruhan_excel-(".date('d-m-Y').").xls";

	header("content-disposition: attachment; filename=$filename");
	header("content-type: application/vdn.ms-exel");

?>

<h2>Laporan Hasil Post Test Keseluruhan</h2>

<?php

mysql_connect('localhost', 'root', '');
mysql_select_db('db_ujian_online_karyawan');

$query="select * from t_hasil_test_keseluruhan";
$result=mysql_query($query);
$numfields = mysql_num_fields($result);

echo "<table border=1>\n<tr>";

for ($i=0; $i < $numfields; $i++) // Header
{ echo '<th>'.mysql_field_name($result, $i).'</th>'; }

echo "</tr>\n";

while ($row = mysql_fetch_row($result)) // Data
{ echo '<tr><td>'.implode($row,'</td><td>')."</td></tr>\n"; }

echo "</table>\n"



?>