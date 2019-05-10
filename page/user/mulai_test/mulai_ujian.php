<div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            Form Mulai Ujian Kompetensi Karyawan
                        </div>
                        <h2 align="center">Silahkan pilih test yang akan di ujikan : </h2>
                        <div class="panel-body">
                            <li><h3><a href="?page=mulai_test&aksi=bhd&nik=<?php echo $row['nik'];?>" style="margin-bottom: 10px">BHD (Bantuan hidup dasar)</a></h3></li>
                            <li><h3><a href="?page=mulai_test&aksi=k3rs&nik=<?php echo $row['nik'];?>"  style="margin-bottom: 10px">K3RS (Keselamatan dan kesehatan kerja rumah Sakit)</a></h3></li>
                            <li><h3><a href="?page=mulai_test&aksi=kprs&nik=<?php echo $row['nik'];?>" style="margin-bottom: 10px">KPRS (Keselamatan Pasien Rumah Sakit)</a></h3></li>
                            <li><h3><a href="?page=mulai_test&aksi=ppi&nik=<?php echo $row['nik'];?>&nama_kategori=<?php echo $row['nama_kategori'];?>"  style="margin-bottom: 10px ">PPI (Program pencegahan dan pengendalian infeksi)</a></h3></li>
                        </div>
                        <div class="panel-footer" align="center">
                            Form Mulai Ujian Kompetensi Karyawan
                        </div>
                    </div>
                </div>
            </div>
