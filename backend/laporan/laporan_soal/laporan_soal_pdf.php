<?php
$koneksi = new mysqli("localhost","root","","db_ujian_online_karyawan");

$nama_pelatihan = $_GET['nama_pelatihan'];

$sql2 = $koneksi->query("select * from t_pelatihan where nama_pelatihan='$nama_pelatihan'");

$tampil2 = $sql2->fetch_assoc();

$content ='
    <style type="text/css">
    .table{
        border-collapse: collapse;
    }
    .table th{
        padding: 8px 5px;
        background-color: #cccccc;
    }
    .table td{
        padding: 8px 5px;
    }
    </style>
';

$content.='

<page>
    <h2> Laporan Soal '.$tampil2['keterangan'].'</h2>

    <table border="0" class="table">';

            $no = 1;

            $sql = $koneksi-> query("select * from t_soal where nama_tipe_soal='$nama_pelatihan'");

            while($data=$sql->fetch_assoc()){ 

            /*$id_soal=$data["id_soal"];
              $soal=$data["soal"];
              $nomor_soal=$data["nomor_soal"];
              $pilihan_a=$data["a"];
              $pilihan_b=$data["b"];
              $pilihan_c=$data["c"];
              $pilihan_d=$data["d"];
              $pilihan_e=$data["e"];
              */  

            $content .='

            <tr>
                  <td>'.$no++.'.  </td>
                  <td>'.$data['soal'].'</td>
            </tr>
            <tr>
                  <td>a.</td>
                  <td>'.$data['a'].'</td>
            </tr>
            <tr>
                  <td>b.</td>
                  <td>'.$data['b'].'</td>
            </tr>
            <tr>
                  <td>c.</td>
                  <td>'.$data['c'].'</td>
            </tr>
            <tr>
                  <td>d.</td>
                  <td>'.$data['d'].'</td>
            </tr>
            <tr>
                  <td>e.</td>
                  <td>'.$data['e'].'</td>
            </tr>
            <tr>
                  <td>Kunci Jawaban : </td>
                  <td>'.$data['kunci_jawaban'].'</td>
            </tr>

                      
            ';
            
            }
    $content .='
    </table>
</page>';
            

    require_once('../../assets/html2pdf/html2pdf.class.php');
    $html2pdf = new HTML2PDF('L','A4','en');
    $html2pdf->writeHTML($content);
    $html2pdf->Output('soal_ujian.pdf'); 
?>
