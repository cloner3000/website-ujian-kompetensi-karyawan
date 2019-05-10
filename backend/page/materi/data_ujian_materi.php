<div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                             Data Ujian Materi Soal
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Materi Pelatihan</th>
                                            <th>Tipe Test</th>
                                            <th>Judul Materi</th>
                                            <th>Tools</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $no = 1;

                                   /*   SELECT siswa.*,jurusan.*,gelar_sarjana.* FROM `siswa`
                                        INNER JOIN jurusan ON `siswa`.`kode_jurusan` = `jurusan`.`kode_jurusan`
                                        INNER JOIN gelar_sarjana ON `siswa`.`kode_jurusan` = `gelar_sarjana`.`kode_jurusan`
                                        AND nim='$nim'

                                        select * from t_materi_soal

                                        $sql = $koneksi-> query("select t_materi_soal.*, t_kategori.*,t_tipe_soal.* from t_materi_soal inner join t_kategori on t_materi_soal.id_kategori = nama_kategori inner join t_tipe_soal on t_materi_soal.id_tipe_soal = nama_tipe_soal");
                                    */

                                       $sql2 = $koneksi-> query("select * from t_materi_soal inner join t_pelatihan on t_materi_soal.nama_pelatihan = t_pelatihan.nama_pelatihan");

                                        while($data=$sql2->fetch_assoc()){    
                                    ?>
                                        <tr>
                                            <td><?php echo $no++;?></td>
                                            <td><?php echo $data['keterangan'];?></td>
                                            <td><?php echo $data['nama_tipe_test'];?></td>
                                            <td><?php echo $data['judul_materi'];?></td>
                                            <td>
                                                <a href="?page=materi&aksi=lihat&id_materi=<?php echo $data['id_materi'];?>" class="btn btn-success"><i class="fa fa-eye" ></i></a>
                                                <a href="?page=materi&aksi=ubah&id_materi=<?php echo $data['id_materi'];?>" class="btn btn-info"><i class="fa fa-edit"></i></a>
                                                <a onclick="return confirm('Anda Yakin Akan Menghapus Data Ini?')" href="?page=materi&aksi=hapus&id_materi=<?php echo $data['id_materi'];?>" class="btn btn-danger"><i class="fa fa-trash" ></i></a>
                                            </td>
                                        </tr>
                                    <?php } ?>                               
                                    </tbody>
                                </table>
                            </div>
                            <a href="?page=materi&aksi=tambah" class="btn btn-success" style="margin-top: 10px"><i class="fa fa-plus"></i>Tambah Materi soal</a>
                        </div>
                         <div class="panel-footer">
                                Form Data Ujian Materi Soal
                        </div>
                    </div>
                </div>
        </div>