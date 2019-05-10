<div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="panel panel-primary">
                    <script type="text/javascript">
                        function isChecked()
                        {
                            if (document.getElementById("exam_chkbox").checked == true) {
                            window.location = "?page=mulai_test&aksi=test";
                            } else {
                                alert("Harap setujui jika sudah selesai membaca materinya");
                            return false; 
                            }
                        }
                    </script>
                        <div class="panel-heading">
                            Form Materi Ujian Komptensi
                        </div>
                        <h2 align="center">Materi Ujian Kompetensi</h2>
                        <div class="panel-body">
                            <div style='width:100%; border: 1px solid #EBEBEB; overflow:scroll;height:700px;'>
                                 <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum tincidunt est vitae ultrices accumsan. Aliquam ornare lacus adipiscing, posuere lectus et, fringilla augue.</p>
                            </div>
                        </div>
                        <script type = "text/javascript">
                        
                        </script>
                        
                        <center><input type="checkbox" name="checkbox" id="exam_chkbox" >
                            <label for="checkbox"></label>Saya Sudah Membaca Materi Sampai Selesai </center>
                        <center><p><a class="btn btn-primary" style="cursor:pointer;" onclick="isChecked(); return false; "/>Mulai Test</a></p></center>
                        <div class="panel-footer" align="center">
                            Form Materi Ujian Komptensi
                        </div>
                    </div>
                </div>
            </div>
