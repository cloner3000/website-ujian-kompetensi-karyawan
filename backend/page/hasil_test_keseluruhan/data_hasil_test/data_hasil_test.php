<?php

    $nama_pelatihan = $_GET['nama_pelatihan'];

    $nama_tipe_test = $_GET['nama_tipe_test'];

    $status_ujian = $_GET['status_ujian'];

    $sql = $koneksi->query("select * from t_pelatihan where nama_pelatihan='$nama_pelatihan'");

    $tampil = $sql->fetch_assoc();

    $sql3 = $koneksi->query("select * from t_soal where nama_tipe_soal='$nama_pelatihan'");

    $tampi3 = $sql3->fetch_assoc();

    $tgl = "tgl_$nama_pelatihan";

    $tanggal = date('Y-m-d', strtotime($data[$tgl]));

?>

<div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                             Daftar Hasil Test <?php echo $status_ujian;?> <?php echo $nama_tipe_test;?> <?php echo $tampil['keterangan'];?>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>NIP</th>
                                            <th>Nama</th>
                                            <th>Nama Jabatan</th>
                                            <th>Unit Kerja</th>
                                            <th>NIlai</th>
                                            <th>Tools</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $no = 1;

                                            //$sql = $koneksi-> query("select * from t_nilai where nama_pelatihan ='$nama_pelatihan'");

                                            $sql = $koneksi-> query("select * from t_nilai inner join t_pegawai on t_nilai.nip = t_pegawai.nip where nama_pelatihan ='$nama_pelatihan' and nama_tipe_test='$nama_tipe_test' and status_ujian = '$status_ujian'");

                                            while($data=$sql->fetch_assoc()){    
                                        ?>
                                        <tr>
                                            <td><?php echo $no++;?></td>
                                            <td><?php echo $data['nip'];?></td>
                                            <td><?php echo $data['nama_lengkap'];?></td>
                                            <td><?php echo $data['nama_jabatan'];?></td>
                                            <td><?php echo $data['unit_kerja'];?></td>
                                            <td><?php echo $data['nilai'];?></td>
                                            <td>
                                                <!--a href="?page=laporan_hasil_test&aksi=ubah&id=<?php echo $data['id'];?>" class="btn btn-info"><i class="fa fa-edit"></i></a-->
                                                <a onclick="return confirm('Anda Yakin Akan Mengulang Data Ini?')" href="?page=laporan_hasil_test&aksi=hapus&id=<?php echo $data['id'];?>&nip=<?php echo $data['nip'];?>&nama_pelatihan=<?php echo $nama_pelatihan;?>&nama_tipe_test=<?php echo $nama_tipe_test;?>&status_ujian=<?php echo $status_ujian;?>" class="btn btn-danger"><i class="fa fa-trash" ></i></a>
                                            </td>
                                        </tr> 
                                         <?php } ?>                               
                                    </tbody>
                                </table>
                            </div>
                             <a href="?page=laporan_hasil_test&aksi=status_ujian&nama_pelatihan=<?php echo $nama_pelatihan;?>&nama_tipe_test=<?php echo $nama_tipe_test;?>" class="btn btn-success" style="margin-top: 10px"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></i> Kembali</a>
                             <a href="./laporan/laporan_hasil_test/laporan_hasil_test_excel.php?nama_pelatihan=<?php echo $nama_pelatihan;?>&nama_tipe_test=<?php echo $nama_tipe_test;?>&status_ujian=<?php echo $status_ujian;?>" target="blank" class="btn btn-default" style="margin-top: 10px"><i class="fa fa-print"></i>Export To Excel</a>
                             <a href="./laporan/laporan_hasil_test/laporan_hasil_test_pdf.php?nama_pelatihan=<?php echo $nama_pelatihan;?>&nama_tipe_test=<?php echo $nama_tipe_test;?>&status_ujian=<?php echo $status_ujian;?>" target="blank" class="btn btn-default" style="margin-top: 10px"><i class="fa fa-print"></i>Export To PDF</a>
                            </div>
                            <div class="panel-footer">
                                Daftar Hasil Test <?php echo $status_ujian;?> <?php echo $nama_tipe_test;?> <?php echo $tampil['keterangan'];?>
                            </div>
                        </div>
                </div>
        </div>