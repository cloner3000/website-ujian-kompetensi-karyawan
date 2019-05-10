<?php

    $nama_pelatihan = $_GET['nama_pelatihan'];

    $sql = $koneksi->query("select * from t_pelatihan where nama_pelatihan='$nama_pelatihan'");

    $tampil = $sql->fetch_assoc();

    $sql3 = $koneksi->query("select * from t_soal where nama_tipe_soal='$nama_pelatihan'");

    $tampi3 = $sql3->fetch_assoc();

?>

<div class="row">
          <div class="col-md-12 col-sm-12">
              <div class="panel panel-primary">
                  <div class="panel-heading">
                      Form Daftar Tipe Test
                  </div>
                  <h2 align="center">Silahkan pilih tipe test yang akan di kelola : </h2>
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
                               <a href="?page=laporan_sudah_test&aksi=data_laporan_sudah_test&nama_pelatihan=<?php echo $nama_pelatihan;?>&nama_tipe_test=<?php echo $data['nama_tipe_test'];?>" class="btn btn-info">Masuk</a>
                            </td>
                        </tr>
                        <?php } ?> 
                    </table>
                  </div>
                  <a href="?page=laporan_sudah_test" class="btn btn-success" style="margin-top: 10px"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></i> Kembali</a>
                  <div class="panel-footer" align="center">
                      Form Daftar Tipe Test
                  </div>
              </div>
          </div>
      </div>
</div>

