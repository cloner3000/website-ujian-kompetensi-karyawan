<?php

function classify($X,$n,$table,$koneksi,$nama_lengkap,$nama_pelatihan,$nama_tipe_test,$hasil)
{
  	$class = array();//different classes 
	$allclass = array();//total individual classes
	$temp = array();


	//Finding different class attributes
	$i = mysqli_query($koneksi, "select distinct(".$n.") from ".$table);
	while($j = mysqli_fetch_array($i,MYSQL_ASSOC))
		$temp[] = $j;
	foreach($temp as $t)
		$class[] = $t[$n];

	//Finding total number of training classes
	$nc = mysqli_query($koneksi, "select count(".$n.") as num from ".$table);
	$p = mysqli_fetch_array($nc,MYSQL_ASSOC);
	$C = $p["num"];

	//Finding total number of individual classes
	foreach($class as $c)
	{
		$nc = mysqli_query($koneksi, "select count(*) as num from ".$table." where ".$n."= '".$c."'");
		$m = mysqli_fetch_array($nc,MYSQL_ASSOC);
		$allclass[$c] = $m["num"];
	}


	//Finding Prob of each class
	foreach($allclass as $c=>$p)
	{
		$Pc[$c] = round($p/$C,7);
		$argmax[$c] = 1;
	}


	//var_dump($allclass);
	foreach($allclass as $c=>$p)
	{
		foreach($X as $x=>$y)
		{
			$i = mysqli_query($koneksi, "select count(*) as num from ".$table." where ".$n."='".$c."' AND ".$x."='".$y."'");
			$j = mysqli_fetch_array($i,MYSQL_ASSOC);
			
			$P[$c][$x] = round($j["num"]/$allclass[$c],7);

	//Exception: P(data/class) might be 0 in some cases, ignore 0 for now
			if($P[$c][$x] != 0)
				$argmax[$c] *= $P[$c][$x];
		}
		$argmax[$c] *= $Pc[$c];
	}

	$data = implode (array_keys($argmax,min($argmax)));

	//echo $data;

	$sql_insert = mysqli_query($koneksi,"insert into ".$table."(`nama_lengkap`, `nama_pelatihan`, `nama_tipe_test`, `nilai`, `status_ujian`) values('$nama_lengkap',$nama_pelatihan','$nama_tipe_test','$hasil','$data')");

	$sql_nilai = mysqli_query($koneksi, "INSERT INTO t_nilai (nip, jenis_kelamin, nama_pelatihan, nama_tipe_test, nilai, status_ujian) VALUES ('$nip', '$jkl' ,'$nama_pelatihan', '$nama_tipe_test', '$hasil', '$data')");
}

?>
