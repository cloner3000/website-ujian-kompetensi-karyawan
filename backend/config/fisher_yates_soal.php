<?php
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
?>