<div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                             Data Pelatihan
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Pelatihan</th>
                                            <th>Keterangan</th>
                                            <th>Tools</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $no = 1;

                                        $sql2 = $koneksi-> query("select * from t_pelatihan");

                                        while($data=$sql2->fetch_assoc()){    
                                    ?>
                                        <tr>
                                            <td><?php echo $no++;?></td>
                                            <td><?php echo $data['nama_pelatihan'];?></td>
                                            <td><?php echo $data['keterangan'];?></td>
                                            <td>
                                                <a href="?page=pelatihan&aksi=ubah&id_pelatihan=<?php echo $data['id_pelatihan'];?>&nama_pelatihan2=<?php echo $data['nama_pelatihan'];?>" class="btn btn-info"><i class="fa fa-edit"></i></a>
                                                <a onclick="return confirm('Anda Yakin Akan Menghapus Data Ini?')" href="?page=pelatihan&aksi=hapus&id_pelatihan=<?php echo $data['id_pelatihan'];?>&nama_pelatihan=<?php echo $data['nama_pelatihan'];?>" class="btn btn-danger"><i class="fa fa-trash" ></i></a>
                                            </td>
                                        </tr>
                                    <?php } ?>                               
                                    </tbody>
                                </table>
                            </div>
                            <a href="?page=pelatihan&aksi=tambah" class="btn btn-success" style="margin-top: 10px"><i class="fa fa-plus"></i>Tambah Pelatihan</a>
                        </div>
                         <div class="panel-footer">
                                Form Data Pelatihan
                        </div>
                    </div>
                </div>
        </div>