    <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                             Data Unit Kerja
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Unit Kerja</th>
                                            <th>Tools</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $no = 1;

                                        $sql2 = $koneksi-> query("select * from t_unit_kerja");

                                        while($data=$sql2->fetch_assoc()){    
                                    ?>
                                        <tr>
                                            <td><?php echo $no++;?></td>
                                            <td><?php echo $data['nama_unit_kerja'];?></td>
                                            <td>
                                                <a href="?page=unit_kerja&aksi=ubah&id=<?php echo $data['id'];?>" class="btn btn-info"><i class="fa fa-edit"></i></a>
                                                <a onclick="return confirm('Anda Yakin Akan Menghapus Data Ini?')" href="?page=unit_kerja&aksi=hapus&id=<?php echo $data['id'];?>" class="btn btn-danger"><i class="fa fa-trash" ></i></a>
                                            </td>
                                        </tr> 
                                    <?php } ?>                               
                                    </tbody>
                                </table>
                            </div>
                            <a href="?page=unit_kerja&aksi=tambah" class="btn btn-success" style="margin-top: 10px"><i class="fa fa-plus"></i>Tambah Unit Kerja</a>
                            <a href="?page=unit_kerja&aksi=import_excel" class="btn btn-success" style="margin-top: 10px"><i class="fa fa-plus"></i>Import Excel</a>
                        </div>
                        <div class="panel-footer">
                            Form Data Unit Kerja
                        </div>
                    </div>
                </div>
        </div>
        