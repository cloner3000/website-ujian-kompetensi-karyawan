<?php


?>
<div class="panel panel-primary">
        <div class="panel-heading">
            Form Hasil Test Ujian Kompetensi
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-11">
                    <h3> Hasil Test Ujian Kompetensi</h3>
                    <form method="POST">
                        <table class="table table-striped table-condensed">
                        <tr>
                          <th width="20%">NIP</th>
                          <td><?php echo $row['nip']; ?></td>
                        </tr>
                        <tr>
                          <th>Nama Lengkap</th>
                          <td><?php echo $row['nama_lengkap']; ?></td>
                        </tr>
                        <tr>
                          <th>Jabatan</th>
                          <td><?php echo $row['nama_jabatan']; ?></td>
                        </tr>
                        <tr>
                          <th>Unit Kerja</th>
                          <td><?php echo $row['unit_kerja']; ?></td>
                        </tr>
                    </table>
                  </form>   
                  <h3> List Test Ujian Kompetensi</h3>
                  <table class="table table-striped table-condensed"> 
                      <tr>
                          <th>No</th>
                          <th>Nama Ujian</th>
                          <th>Tipe Test</th>
                          <th>Nilai</th>
                          <th>Status Ujian</th>
                      </tr>
                      <?php
                        $no = 1;

                        $sql = $koneksi-> query("select * from t_nilai inner join t_pelatihan on t_nilai.nama_pelatihan = t_pelatihan.nama_pelatihan where nip='".$row['nip']."' order by t_nilai.nama_pelatihan asc");

                        while($data=$sql->fetch_assoc()){ 

                      ?>
                      <tr>
                          <td><?php echo $no++;?></td>
                          <td><?php echo $data['keterangan'];?></td>
                          <td><?php echo $data['nama_tipe_test'];?></td>
                          <td><?php echo $data['nilai'];?></td>
                          <td><?php echo $data['status_ujian'];?></td>
                      </tr>
                      <?php } ?> 
                  </table> 
                  </div>
             </div>
        </div>
        <div class="panel-footer">
            Form Hasil Test Ujian Kompetensi
        </div>
</div> 

