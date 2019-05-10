<?php

$koneksi = new mysqli("localhost","root","","db_ujian_online_karyawan");

$nama_pelatihan = $_GET['nama_pelatihan'];

$nama_tipe_test = $_GET['nama_tipe_test'];

$sql2 = $koneksi->query("select * from t_pelatihan where nama_pelatihan='$nama_pelatihan'");

$tampil2 = $sql2->fetch_assoc();

$tgl = "tgl_$nama_pelatihan";

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
    <h2 align="center"> Laporan Belum Test '.$nama_tipe_test.' '.$tampil2['keterangan'].'</h2>

    <table border="1" class="table" align="center">
        <tr>
            <th>No</th>
            <th>NIP</th>
            <th>Nama Lengkap</th>
            <th>Jabatan</th>
            <th>Unit Kerja</th>
        </tr>';

            $no = 1;

            $sql = $koneksi-> query("select * from t_tanggal_test inner join t_pegawai on t_tanggal_test.nip = t_pegawai.nip where nama_pelatihan ='$nama_pelatihan' and keterangan_ujian ='Belum Mengikuti' and nama_tipe_test='$nama_tipe_test'");

            while($data=$sql->fetch_assoc()){

            $content .='
            <tr>
                <td>'.$no++.'</td>
                <td>'.$data['nip'].'</td>
                <td>'.$data['nama_lengkap'].'</td>
                <td>'.$data['nama_jabatan'].'</td>
                <td>'.$data['unit_kerja'].'</td> 
            </tr>            
            ';
            }
    $content .='
    </table>
</page>';
            

    require_once('../../assets/html2pdf/html2pdf.class.php');
    $html2pdf = new HTML2PDF('L','A4','en');
    $html2pdf->writeHTML($content);
    $html2pdf->Output('laporan_hasil_data_belum_test.pdf'); 
?>
