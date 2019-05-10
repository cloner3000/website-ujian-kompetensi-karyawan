<?php

  //check data


    $sql = $koneksi->query("Select * from t_aturan");

    $tampil = $sql->fetch_assoc();

?> 
<div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                             Form Aturan Ujian Kompetensi Karyawan
                        </div>
                        <div class="panel-body">
                             <p><?php echo $tampil['isi_aturan'];?></p>
                            <a href="?page=aturan&aksi=ubah" class="btn btn-info" style="margin-top: 10px">Ubah Aturan</a>
                        </div>
                        <div class="panel-footer">
                            Form Aturan Ujian Kompetensi Karyawan
                        </div>
                    </div>
                </div>
        </div>
        