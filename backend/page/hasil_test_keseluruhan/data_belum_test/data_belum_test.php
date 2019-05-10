<?php

    $nama_pelatihan = $_GET['nama_pelatihan'];

    $nama_tipe_test = $_GET['nama_tipe_test'];

    $sql = $koneksi->query("select * from t_pelatihan where nama_pelatihan='$nama_pelatihan'");

    $tampil = $sql->fetch_assoc();

    $sql3 = $koneksi->query("select * from t_soal where nama_tipe_soal='$nama_pelatihan'");

    $tampi3 = $sql3->fetch_assoc();

?>

<div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                             Daftar Belum Test Ujian <?php echo $nama_tipe_test;?> <?php echo $tampil['keterangan'];?>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>NIK</th>
                                            <th>Nama</th>
                                            <th>Jabatan</th>
                                            <th>Unit Kerja</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $no = 1;

                                            //$sql = $koneksi-> query("select * from t_hasil_test_keseluruhan where $nama_pelatihan IS NULL OR $nama_pelatihan='0' oR $nama_pelatihan='Belum Mengikuti' ");

                                           $sql = $koneksi-> query("select * from t_tanggal_test inner join t_pegawai on t_tanggal_test.nip = t_pegawai.nip where nama_pelatihan ='$nama_pelatihan' and keterangan_ujian ='Belum Mengikuti' and nama_tipe_test='$nama_tipe_test'");

                                            while($data=$sql->fetch_assoc()){    
                                        ?>
                                        <tr>
                                            <td><?php echo $no++;?></td>
                                            <td><?php echo $data['nip'];?></td>
                                            <td><?php echo $data['nama_lengkap'];?></td>
                                            <td><?php echo $data['nama_jabatan'];?></td>
                                            <td><?php echo $data['unit_kerja'];?></td>
                                        </tr> 
                                         <?php } ?>                               
                                    </tbody>
                                </table>
                            </div>
                            <a href="?page=laporan_belum_test&aksi=tipe_test&nama_pelatihan=<?php echo $nama_pelatihan;?>&nama_tipe_test=<?php echo $nama_tipe_test;?>" class="btn btn-success" style="margin-top: 10px"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></i> Kembali</a>
                            <a href="./laporan/laporan_belum_test/laporan_belum_test_excel.php?nama_pelatihan=<?php echo $nama_pelatihan;?>&nama_tipe_test=<?php echo $nama_tipe_test;?>" target="blank" class="btn btn-default" style="margin-top: 10px"><i class="fa fa-print"></i>Export To Excel</a>
                            <a href="./laporan/laporan_belum_test/laporan_belum_test_pdf.php?nama_pelatihan=<?php echo $nama_pelatihan;?>&nama_tipe_test=<?php echo $nama_tipe_test;?>" target="blank" class="btn btn-default" style="margin-top: 10px"><i class="fa fa-print"></i>Export To PDF</a>
                            </div>
                            <div class="panel-footer">
                                Form Daftar Belum Test Ujian <?php echo $tampil['keterangan'];?> <?php echo $tampil['keterangan'];?>
                            </div>
                        </div>
                </div>
        </div>