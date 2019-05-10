<?php

$nip = $_GET['nip'];

$nama_pelatihan = $_GET['nama_pelatihan'];

$sql2 = $koneksi-> query("select * from t_pelatihan where nama_pelatihan='$nama_pelatihan'");

$status = $sql2->fetch_assoc();

?>

<div class="row">
          <div class="col-md-12 col-sm-12">
              <div class="panel panel-primary">
                  <div class="panel-heading">
                      Form Daftar Tipe Test
                  </div>
                  <h2 align="center">Silahkan pilih soal unit test yang akan di ujikan : </h2>
                  <div class="panel-body">
                     <div class="table-responsive">
                      <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                       <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Tipe Test</th>
                            <th>Option</th>
                        </tr>
                        </thead>
                          <?php
                            $no = 1;

                            $sql = $koneksi-> query("select * from t_tipe_test");

                            while($data=$sql->fetch_assoc()){    
                        ?>
                         <tr>
                            <td><?php echo $no++;?></td>
                            <td><?php echo $data['nama_tipe_test']; ?></td>
                            <td>
                               <a href="?page=mulai_test2&aksi=materi&nip=<?php echo $row['nip'];?>&nama_pelatihan=<?php echo $nama_pelatihan;?>&nama_tipe_test=<?php echo $data['nama_tipe_test'];?>" class="btn btn-info">Masuk</a>
                            </td>
                        </tr>
                        <?php } ?> 
                    </table>
                  </div>
                  <a href="?page=mulai_test2" class="btn btn-success" style="margin-top: 10px"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></i> Kembali</a>
                  <div class="panel-footer" align="center">
                      Form Daftar Tipe Test
                  </div>
              </div>
          </div>
      </div>
</div>

