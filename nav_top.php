<nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
          				<li class="text-center">
                        <img src="<?php echo "backend/assets/foto_karyawan/".$row['foto']; ?>" class="user-image img-responsive"/>
          					</li>
                    <li>
                        <a  href="index.php"><i class="fa fa-dashboard fa-2x"></i>Dashboard</a>
                    </li>
                    <li>
                        <a href=""><i class="fa fa-user fa-2x"></i>Profil<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="?page=profil">Biodata</a>
                            </li>
                            <li>
                                <a href="?page=ubah_password">Ubah Password</a>
                            </li>
                        </ul>
                    </li>  
                    <li>
                        <a  href="?page=aturan"><i class="fa fa-book fa-2x"></i>Aturan</a>
                    </li>
					<!--li>
                        <a  href="?page=mulai_test"><i class="fa fa-desktop fa-3x"></i>Mulai Test</a>
                    </li-->
                    <li>
                        <a  href="?page=mulai_test2"><i class="fa fa-desktop fa-2x"></i>Mulai Test</a>
                    </li>	
                    <li>
                        <a href="?page=hasil_test"><i class="fa fa-database fa-2x"></i>Hasil Test</a>
                    </li>
                    <li>
                        <a href="?page=about"><i class="fa fa-info-circle fa-2x"></i>About</a>
                    </li>	
                </ul>
               
            </div>
            
        </nav>  