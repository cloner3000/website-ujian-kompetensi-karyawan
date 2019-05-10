 <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                             Pengaturan Status Ujian
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Ujian</th>
                                            <th>Pre Test</th>
                                            <th>Post Test</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                     <?php
                                        $no = 1;

                                        $sql = $koneksi-> query("select * from t_pelatihan");

                                        while($data=$sql->fetch_assoc()){    
                                    ?>
                                        <tr>
                                            <td><?php echo $no++;?></td>
                                            <td><?php echo $data['keterangan'];?></td>
                                            <td>
                                                <?php
                                                    if ($data["Pre Test"]=="Y") {
                                                ?>
                                                    <a onclick="return confirm('Anda Yakin Akan Mengnonaktifkan Halaman Ini?')"  href="?page=status_ujian&aksi=pre_test_non_aktif&id_pelatihan=<?php echo $data['id_pelatihan'];?>" class="btn btn-info">Non Aktif</a>
                                                <?php
                                                } else {
                                                ?>
                                                    <a onclick="return confirm('Anda Yakin Akan Mengaktifkan Ini?')" href="?page=status_ujian&aksi=pre_test_aktif&id_pelatihan=<?php echo $data['id_pelatihan'];?>" class="btn btn-danger"></i>Aktif</a>
                                                <?php
                                                } 
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                    if ($data["Post Test"]=="Y") {
                                                ?>
                                                    <a onclick="return confirm('Anda Yakin Akan Mengnonaktifkan Halaman Ini?')"  href="?page=status_ujian&aksi=post_test_non_aktif&id_pelatihan=<?php echo $data['id_pelatihan'];?>" class="btn btn-info">Non Aktif</a>
                                                <?php
                                                } else {
                                                ?>
                                                    <a onclick="return confirm('Anda Yakin Akan Mengaktifkan Ini?')" href="?page=status_ujian&aksi=post_test_aktif&id_pelatihan=<?php echo $data['id_pelatihan'];?>" class="btn btn-danger"></i>Aktif</a>
                                                <?php
                                                } 
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                    if ($data[status]=="Y") {
                                                ?>
                                                    <a onclick="return confirm('Anda Yakin Akan Mengnonaktifkan Halaman Ini?')" href="?page=status_ujian&aksi=ubah_non_aktif&id_pelatihan=<?php echo $data['id_pelatihan'];?>" class="btn btn-info">Non Aktif</a>
                                                <?php
                                                } else {
                                                ?>
                                                    <a onclick="return confirm('Anda Yakin Akan Mengaktifkan Ini?')" href="?page=status_ujian&aksi=ubah_aktif&id_pelatihan=<?php echo $data['id_pelatihan'];?>" class="btn btn-danger"></i>Aktif</a>
                                                <?php
                                                } 
                                                ?>
                                            </td>
                                        </tr>
                                     <?php } ?> 
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
                <div class="col-md-4 col-sm-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Keterangan
                        </div>
                        <div class="panel-body">
                            <a class="btn btn-info">Non Aktif</a> = Halaman Aktif
                        </br>
                        </br>
                            <a class="btn btn-danger">Aktif</a> = Halaman Tidak Aktif
                        </div>
                        <div class="panel-footer">
                            Keterangan
                        </div>
                    </div>
                </div>
            </div>