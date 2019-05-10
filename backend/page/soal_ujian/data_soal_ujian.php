<?php

    $nama_pelatihan = $_GET['nama_pelatihan'];

    $sql = $koneksi->query("select * from t_pelatihan where nama_pelatihan='$nama_pelatihan'");

    $tampil = $sql->fetch_assoc();

    $sql3 = $koneksi->query("select * from t_soal where nama_tipe_soal='$nama_pelatihan'");

    $tampi3 = $sql3->fetch_assoc();

    $nama_tipe_test = $_GET['nama_tipe_test'];

    //$sql3 = $koneksi->query("select * from t_soal where nama_tipe_soal='$nama_pelatihan'");

    //$tampi3 = $sql3->fetch_assoc();
?>

<div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                             Data Soal <?php echo $nama_tipe_test;?> <?php echo $tampil['keterangan'];?>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Soal</th>
                                            <th>Status</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                         <?php
                                            $no = 1;

                                            $sql2 = $koneksi-> query("select * from t_soal where nama_tipe_soal='$nama_pelatihan' and nama_tipe_test ='$nama_tipe_test'");

                                            while($data=$sql2->fetch_assoc()){    
                                        ?>
                                        <tr>
                                            <td><?php echo $no++;?></td>
                                            <td><?php echo $data['soal'];?></td>
                                             <td>
                                                <?php
                                                    if ($data[status]=="Y") {
                                                ?>
                                                    <a onclick="return confirm('Anda Yakin Akan Mengnonaktifkan Halaman Ini?')" href="?page=soal_ujian&aksi=non_aktif&id_soal=<?php echo $data['id_soal'];?>&nama_pelatihan=<?php echo $nama_pelatihan;?>&nama_tipe_test=<?php echo $nama_tipe_test;?>" class="btn btn-info">Non Aktif</a>
                                                <?php
                                                } else {
                                                ?>
                                                    <a onclick="return confirm('Anda Yakin Akan Mengaktifkan Ini?')" href="?page=soal_ujian&aksi=aktif&id_soal=<?php echo $data['id_soal'];?>&nama_pelatihan=<?php echo $nama_pelatihan;?>&nama_tipe_test=<?php echo $nama_tipe_test;?>" class="btn btn-danger"></i>Aktif</a>
                                                <?php
                                                } 
                                                ?>
                                            <td>
                                                <a href="?page=soal_ujian&aksi=lihat&id_soal=<?php echo $data['id_soal'];?>&nama_pelatihan=<?php echo $nama_pelatihan;?>&nama_tipe_test=<?php echo $nama_tipe_test;?>" class="btn btn-success"><i class="fa fa-eye" ></i></a>
                                                <a href="?page=soal_ujian&aksi=ubah&id_soal=<?php echo $data['id_soal'];?>&nama_pelatihan=<?php echo $nama_pelatihan;?>&nama_tipe_test=<?php echo $nama_tipe_test;?>" class="btn btn-info"><i class="fa fa-edit"></i></a>
                                                <a onclick="return confirm('Anda Yakin Akan Menghapus Data Ini?')" href="?page=soal_ujian&aksi=hapus&id_soal=<?php echo $data['id_soal'];?>&nama_pelatihan=<?php echo $nama_pelatihan;?>&nama_tipe_test=<?php echo $nama_tipe_test;?>" class="btn btn-danger"><i class="fa fa-trash" ></i></a>
                                            </td>
                                        </tr>
                                        <?php } ?>                                
                                    </tbody>
                                </table>
                            </div>
                            <!--a href="?page=soal_ujian" class="btn btn-success" style="margin-top: 10px"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></i> Kembali</a-->
                            <a href="?page=soal_ujian&aksi=tipe_test&nama_pelatihan=<?php echo $nama_pelatihan;?>" class="btn btn-success" style="margin-top: 10px"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></i> Kembali</a>
                            <a href="?page=soal_ujian&aksi=tambah&nama_pelatihan=<?php echo $nama_pelatihan;?>&nama_tipe_test=<?php echo $nama_tipe_test;?>" class="btn btn-success" style="margin-top: 10px"><i class="fa fa-plus"></i>Tambah Soal Ujian</a>
                            <a href="?page=soal_ujian&aksi=import_excel&nama_pelatihan=<?php echo $nama_pelatihan;?>&nama_tipe_test=<?php echo $nama_tipe_test;?>" class="btn btn-success" style="margin-top: 10px"><i class="fa fa-plus"></i>Import Excel</a>
                            <a onclick="return confirm('Anda Yakin Akan Menghapus semua data soal Ini?')" href="?page=soal_ujian&aksi=hapus_semua_soal&nama_pelatihan=<?php echo $nama_pelatihan;?>&nama_tipe_test=<?php echo $nama_tipe_test;?>" class="btn btn-danger" style="margin-top: 10px"><i class="fa fa-trash" ></i>Hapus Semua Data Soal</a>
                            <a href="./laporan/laporan_soal/laporan_soal_excel.php?nama_pelatihan=<?php echo $nama_pelatihan;?>&nama_tipe_test=<?php echo $nama_tipe_test;?>" target="blank" class="btn btn-default" style="margin-top: 10px"><i class="fa fa-print"></i>Export To Excel</a>
                            <!--a href="./laporan/laporan_soal/laporan_soal_pdf.php?nama_pelatihan=<?php echo $nama_pelatihan;?>&nama_tipe_test=<?php echo $nama_tipe_test;?>" target="blank" class="btn btn-default" style="margin-top: 10px"><i class="fa fa-print"></i>Export To PDF</a-->
                            <!--a href="./laporan/laporan_soal/bhd/laporan_soal_bhd_word.php" target="blank" class="btn btn-default" style="margin-top: 10px"><i class="fa fa-print"></i>Export To Word</a-->
                        </div>
                        <div class="panel-footer">
                             Form Data Soal <?php echo $nama_tipe_test;?> <?php echo $tampil['keterangan'];?>
                        </div>
                    </div>
                </div>
        </div>