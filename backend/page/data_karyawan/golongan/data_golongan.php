<div class="row">
    <div class="col-md-12">
        <!-- Advanced Tables -->
        <div class="panel panel-primary">
            <div class="panel-heading">
                 Data Golongan
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-karyawan">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama golongan</th>
                                <th>Keterangan</th>
                                <th>Tools</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $no = 1;

                                $sql = $koneksi-> query("select * from t_golongan");

                                while($data=$sql->fetch_assoc()){    
                            ?>
                            <tr>
                                <td><?php echo $no++;?></td>
                                <td><?php echo $data['nama_golongan'];?></td>
                                <td><?php echo $data['keterangan'];?></td>
                                <td>
                                    <!--a href="?page=golongan&aksi=lihat&id=<?php echo $data['id'];?>" class="btn btn-success"><i class="fa fa-eye" ></i></a-->
                                    <a href="?page=golongan&aksi=ubah&id=<?php echo $data['id'];?>" class="btn btn-info"><i class="fa fa-edit"></i></a>
                                    <a onclick="return confirm('Anda Yakin Akan Menghapus Data Ini?')" href="?page=golongan&aksi=hapus&id=<?php echo $data['id'];?>" class="btn btn-danger"><i class="fa fa-trash" ></i></a>
                                </td>
                            </tr>
                            <?php } ?>                               
                        </tbody>
                    </table>
                </div>
                <a href="?page=golongan&aksi=tambah" class="btn btn-success" style="margin-top: 10px"><i class="fa fa-plus"></i>Tambah Gologan</a>
                <!--a href="?page=golongan&aksi=import_excel" class="btn btn-success" style="margin-top: 10px"><i class="fa fa-plus"></i>Import Excel</a-->
            </div>
            <div class="panel-footer">
                Form Data Golongan
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
