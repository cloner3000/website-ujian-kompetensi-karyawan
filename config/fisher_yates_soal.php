<?php
include 'koneksi2.php';

 function MyShuffle(&$soal) {
             $i = count($soal);

                while(--$i) {
                    $j = mt_rand(0, $i);

                    if ($i != $j) {
                        //swap elements
                        $tmp = $soal[$j];
                        $soal [$j] = $soal[$i];
                        $soal [$i] = $tmp;
                    }
                }
                return $soal;
        };

$arr_soal=$koneksi->query("SELECT MAX(id_soal) FROM t_soal");
$hasil = mysqli_fetch_array($arr_soal);
//print $hasil[0];

/*$soal=array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,
    21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,
    38,39,40,41,42,43,44,45,46,47,48,49,50);
MyShuffle($soal);
$arrlenght = count($soal);*/

$soal = array();

for ($i=0; $i < $hasil[0]; $i++) { 
    $soal[$i] = $i+1; // proses pemanggilan array perurutan
}

MyShuffle($soal);
$arrlenght = count($soal);
?>