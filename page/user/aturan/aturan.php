 <?php

     $sql = $koneksi->query("Select * from t_aturan");
     $tampil = $sql->fetch_assoc();
 ?>
        <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            Form Aturan Ujian Kompetensi Karyawan
                        </div>
                        <div class="panel-body">
                             <p><?php echo $tampil['isi_aturan'];?></p>
                        </div>
                        <div class="panel-footer">
                            Form Aturan Ujian Kompetensi Karyawan
                        </div>
                    </div>
                </div>
            </div>