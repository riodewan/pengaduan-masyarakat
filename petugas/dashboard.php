<h3 class="black-text" style="text-align:center; margin-left:-200px;"><b>Dashboard</h3></b>

	<div class="row" style="padding-top:25px;">
		<div class="col s12">
		  <div class="card cyan" style="margin-left:-100px;">
		    <div class="card-content black-text">
			<?php 
				$query = mysqli_query($koneksi,"SELECT * FROM pengaduan WHERE status='proses'");
				$jlmmember = mysqli_num_rows($query);
				if($jlmmember<1){
					$jlmmember=0;
				}
			 ?>
		      <span class="card-title"><b>Laporan Status Proses<b class="right"><?php echo $jlmmember; ?></b></span></b>
		      <p></p>
		    </div>
		  </div>
		</div>	

		<div class="col s12">
		    <div class="card red" style="margin-left:-100px;">
		    <div class="card-content black-text">
			<?php 
				$query = mysqli_query($koneksi,"SELECT * FROM tanggapan WHERE id_petugas='".$_SESSION['data']['id_petugas']."'");
				$jlmmember = mysqli_num_rows($query);
				if($jlmmember<1){
					$jlmmember=0;
				}
			 ?>
		      <span class="card-title"><b>Laporan Ditanggapi <b class="right"><?php echo $jlmmember; ?></b></span></b>
		      <p></p>
		    </div>
		  </div>
		</div>
	</div>