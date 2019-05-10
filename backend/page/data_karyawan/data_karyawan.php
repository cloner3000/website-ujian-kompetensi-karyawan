<div class="row">
    <div class="col-md-12">
        <!-- Advanced Tables -->
        <div class="panel panel-primary">
            <div class="panel-heading">
                 Data Pegawai
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-karyawan">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIP</th>
                                <th>Nama Lengkap</th>
                                <th>Jabatan</th>
                                <th>Unit Kerja</th>
                                <th>Status user</th>
                                <th>Tools</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $no = 1;

                                $sql = $koneksi-> query("select * from t_pegawai");

                                while($data=$sql->fetch_assoc()){    
                            ?>
                            <tr>
                                <td><?php echo $no++;?></td>
                                <td><?php echo $data['nip'];?></td>
                                <td><?php echo $data['nama_lengkap'];?></td>
                                <td><?php echo $data['nama_jabatan'];?></td>
                                <td><?php echo $data['unit_kerja'];?></td>
                                <td>
                                    <?php
                                        if ($data[status]=="Y") {
                                    ?>
                                        <a onclick="return confirm('Anda Yakin Akan Mengnonaktifkan Akun Ini?')"  href="?page=data_karyawan&aksi=non_aktif_user&id=<?php echo $data['id'];?>" class="btn btn-info">Non Aktif</a>
                                    <?php
                                    } else {
                                    ?>
                                        <a onclick="return confirm('Anda Yakin Akan Mengaktifkan Akun Ini?')" href="?page=data_karyawan&aksi=aktif_user&id=<?php echo $data['id'];?>" class="btn btn-danger"></i>Aktif</a>
                                    <?php
                                    } 
                                    ?>
                                </td>
                                <td>
                                    <a href="?page=data_karyawan&aksi=lihat&id=<?php echo $data['id'];?>" class="btn btn-success"><i class="fa fa-eye" ></i></a>
                                    <a href="?page=data_karyawan&aksi=ubah&id=<?php echo $data['id'];?>" class="btn btn-info"><i class="fa fa-edit"></i></a>
                                    <a onclick="return confirm('Anda Yakin Akan Menghapus Data Ini?')" href="?page=data_karyawan&aksi=hapus&id=<?php echo $data['id'];?>&nip=<?php echo $data['nip'];?>" class="btn btn-danger"><i class="fa fa-trash" ></i></a>
                                </td>
                            </tr>
                            <?php } ?>                               
                        </tbody>
                    </table>
                </div>
                <a href="?page=data_karyawan&aksi=tambah" class="btn btn-success" style="margin-top: 10px"><i class="fa fa-plus"></i>Tambah Pegawai</a>
                <a href="?page=data_karyawan&aksi=import_excel" class="btn btn-success" style="margin-top: 10px"><i class="fa fa-plus"></i>Import Excel</a>
                <a onclick="return confirm('Anda Yakin Akan Mengaktifkan Semua Akun Ini?')" href="?page=data_karyawan&aksi=aktif_semua_user" class="btn btn-info" style="margin-top: 10px">Aktif Semua User</a>
                <a onclick="return confirm('Anda Yakin Akan Mengnonaktifkan Semua Akun Ini?')"  href="?page=data_karyawan&aksi=non_aktif_semua_user" class="btn btn-danger" style="margin-top: 10px">Non Aktif Semua User</a>
            </div>
            <div class="panel-footer">
                Form Data Pegawai
            </div>
        </div>
    </div>
</div>
<script>
        $(document).ready(function () {
            $('#dataTables-karyawan').dataTable();
        });
</script>

<!--script>
    $(document).ready(function() {
    $('#dataTables-karyawan').DataTable( {
        //scrolly : '250px',
        dom: 'Bfrtip',
        buttons: [ 
        {
            extend      : 'pdf',
            oriented    : 'landscape'
            pageSize    : 'Legal'
            title       : 'Data Pegawai'
            download    : 'open'
        }
            'copy', 'csv', 'excel', 'pdf', 'print'
        
        ]
    } );
} );
</script-->
