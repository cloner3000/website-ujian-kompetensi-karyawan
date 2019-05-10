<?php

	$id = $_GET['id'];

    $sql = $koneksi->query("select * from t_unit_kerja where id='$id'");

    $tampil = $sql->fetch_assoc();

?>

 <div class="panel panel-primary">
		<div class="panel-heading">
		    Form Lihat Unit Kerja </div>
		<div class="panel-body">
	        <div class="row">
	            <div class="col-md-11">
	                <h3>Lihat Unit Kerja</h3>
	                <form method="POST">
	                	<table class="table table-striped table-condensed">
	                        <tr>
	                          <th>Unir Kerja</th>
	                          <td><?php echo $tampil['nama_unit_kerja'];?></td>
	                        </tr>
	                        <tr>
	                          <th>keterangan</th>
	                          <td><?php echo $tampil['keterangan'];?></td>
	                        </tr>
                   	 </table>
                  </form> 
                  <a href="?page=unit_kerja" class="btn btn-sm btn-success"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> </span>Kembali</a>               
	            </div>
	         </div>
		</div>
		<div class="panel-footer">
	       Form Lihat Unit Kerja
	    </div>
</div> 

