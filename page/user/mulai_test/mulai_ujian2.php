<?php
if ($row['status']=="Y") {
  # code...
} else {
  ?>
    <script type="text/javascript">         
      alert("Anda tidak bisa akses ujian");
      window.location.href="index.php";
    </script>
    <?php
}
?>

<div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                           Form Mulai Ujian Kompetensi Karyawan
                        </div>
                        <h2 align="center">Silahkan pilih soal pelatihan yang akan di ujikan : </h2>
                        <div class="panel-body">
                           <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                             <thead>
                              <tr>
                                   <th>No</th>
                                   <th>Nama Ujian</th>
                                   <th>Option</th>
                              </tr>
                              </thead>
                                <?php
                                $no = 1;

                                $sql = $koneksi-> query("select * from t_pelatihan");

                                while($data=$sql->fetch_assoc()){    
                            ?>
                             <tr>
                                <td><?php echo $no++;?></td>
                                <td><?php echo $data['keterangan']; ?></td>
                                <td>
                                   <a href="?page=mulai_test2&aksi=tipe_test&nip=<?php echo $row['nip'];?>&nama_pelatihan=<?php echo $data['nama_pelatihan'];?>" class="btn btn-info">Mulai</a>
                                </td>
                            </tr>
                            <?php } ?>    
                          </table>
                        </div>
                        <div class="panel-footer" align="center">
                            Form Mulai Ujian Kompetensi Karyawan
                        </div>
                    </div>
                </div>
            </div>
      </div>

