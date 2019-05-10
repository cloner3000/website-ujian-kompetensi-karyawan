    <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                             Data Jabatan
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Jabatan</th>
                                            <th>Tools</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $no = 1;

                                        $sql2 = $koneksi-> query("select * from t_jabatan");

                                        while($data=$sql2->fetch_assoc()){    
                                    ?>
                                        <tr>
                                            <td><?php echo $no++;?></td>
                                            <td><?php echo $data['nama_jabatan'];?></td>
                                            <td>
                                                <a href="?page=jabatan&aksi=ubah&id=<?php echo $data['id'];?>" class="btn btn-info"><i class="fa fa-edit"></i></a>
                                                <a onclick="return confirm('Anda Yakin Akan Menghapus Data Ini?')" href="?page=jabatan&aksi=hapus&id=<?php echo $data['id'];?>" class="btn btn-danger"><i class="fa fa-trash" ></i></a>
                                            </td>
                                        </tr> 
                                    <?php } ?>                            
                                    </tbody>
                                </table>
                            </div>
                            <a href="?page=jabatan&aksi=tambah" class="btn btn-success" style="margin-top: 10px"><i class="fa fa-plus"></i>Tambah Jabatan</a>
                            <a href="?page=jabatan&aksi=import_excel" class="btn btn-success" style="margin-top: 10px"><i class="fa fa-plus"></i>Import Excel</a>
                        </div>
                        <div class="panel-footer">
                            Form Data jabatan
                        </div>
                    </div>
                </div>
        </div>
        