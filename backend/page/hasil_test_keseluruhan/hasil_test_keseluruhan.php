<div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                             Daftar Hasil Test Keseluruhan Post Test
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>NIP</th>
                                            <th>Nama</th>
                                            <th>Jabatan</th>
                                            <th>Unit Kerja</th>
                                            <th>Tools</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                     <?php
                                            $no = 1;

                                            //$sql = $koneksi-> query("select DISTINCT * from t_nilai inner join t_pegawai on t_nilai.nip = t_pegawai.nip");

                                            $sql = $koneksi-> query("select * from t_hasil_test_keseluruhan");

                                            while($data=$sql->fetch_assoc()){    
                                        ?>
                                        <tr>
                                            <td><?php echo $no++;?></td>
                                            <td><?php echo $data['Nip'];?></td>
                                            <td><?php echo $data['Nama Lengkap'];?></td>
                                            <td><?php echo $data['Jabatan'];?></td>
                                            <td><?php echo $data['Unit Kerja'];?></td>
                                            <td>
                                            <a href="?page=laporan_hasil_test_keseluruhan&aksi=lihat&Nomor=<?php echo $data['Nomor'];?>&nip=<?php echo $data['Nip'];?>" class="btn btn-success"><i class="fa fa-eye" ></i></a>
                                            </td>
                                        </tr>  
                                        <?php } ?>                              
                                    </tbody>
                                </table>
                            </div>
                                 <a href="./laporan/laporan_hasil_test_keseluruhan/laporan_hasil_test_keseluruhan_excel.php" target="blank" class="btn btn-default" style="margin-top: 10px"><i class="fa fa-print"></i>Export To Excel</a>
                                 <a href="./laporan/laporan_hasil_test_keseluruhan/laporan_hasil_test_keseluruhan_pdf.php" target="blank" class="btn btn-default" style="margin-top: 10px"><i class="fa fa-print"></i>Export To PDF</a>
                            </div>
                            <div class="panel-footer">
                                Form Data Hasil Test Keseluruhan Post Test
                            </div>
                        </div>
                </div>
        </div>