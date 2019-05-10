<?php ob_start(); ?>
<html>
<head>
  <title>Laporan Hasil Post Test Keseluruhan</title>
</head>
<body>
  
<h1 style="text-align: center;">Laporan Hasil Post Test Keseluruhan</h1>
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

</body>
</html>
<?php
$html = ob_get_contents();
ob_end_clean();
        
require_once('../../assets/html2pdf/html2pdf.class.php');
$pdf = new HTML2PDF('L','A4','en');
$pdf->WriteHTML($html);
$pdf->Output('laporan_hasil_data_test_keselurhan.pdf'); 
?>
