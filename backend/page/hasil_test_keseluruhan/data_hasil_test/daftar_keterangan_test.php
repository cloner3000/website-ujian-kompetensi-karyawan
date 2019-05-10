<?php

    $nama_pelatihan = $_GET['nama_pelatihan'];

    $nama_tipe_test = $_GET['nama_tipe_test'];

?>

<div class="row">
          <div class="col-md-12 col-sm-12">
              <div class="panel panel-primary">
                  <div class="panel-heading">
                      Form Daftar Keterangan Ujian
                  </div>
                  <h2 align="center">Silahkan pilih keterangan test yang akan di kelola : </h2>
                  <div class="panel-body">
                     <div class="table-responsive">
                      <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                       <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Keterangan Test</th>
                            <th>Option</th>
                        </tr>
                        </thead>
                         <tr>
                            <td>1</td>
                            <td>Lulus</td>
                            <td>
                               <a href="?page=laporan_hasil_test&aksi=data_laporan_hasil_test&nama_pelatihan=<?php echo $nama_pelatihan;?>&nama_tipe_test=<?php echo $nama_tipe_test;?>&nama_pelatihan=<?php echo $nama_pelatihan;?>&status_ujian=<?php echo 'Lulus';?>" class="btn btn-info">Masuk</a>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Tidak Lulus</td>
                            <td>
                               <a href="?page=laporan_hasil_test&aksi=data_laporan_hasil_test&nama_pelatihan=<?php echo $nama_pelatihan;?>&nama_tipe_test=<?php echo $nama_tipe_test;?>&nama_pelatihan=<?php echo $nama_pelatihan;?>&status_ujian=<?php echo 'Tidak Lulus';?>" class="btn btn-info">Masuk</a>
                            </td>
                        </tr>
                    </table>
                  </div>
                    <a href="?page=laporan_hasil_test&aksi=tipe_test&nama_pelatihan=<?php echo $nama_pelatihan;?>&nama_tipe_test=<?php echo $nama_tipe_test;?>" class="btn btn-success" style="margin-top: 10px"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></i> Kembali</a>
                  <div class="panel-footer" align="center">
                      Form Daftar Keterangan Ujian
                  </div>
              </div>
          </div>
      </div>
</div>