<?php
    $server     = "localhost"; //sesuaikan dengan nama server
    $username   = "root"; //sesuaikan dengan username server, username default adalah root
    $password   = ""; //sesuaikan dengan password server, apabila tidak ada dikosongi saja
    $database   = "contoh_timer"; //sesuaikan dengan nama database yang sudah dibuat
 
    // Koneksi dan memilih database di server
    mysqli_connect($server,$username,$password) or die("Koneksi gagal");
    mysqli_select_db($database) or die("database tidak ada");
?>