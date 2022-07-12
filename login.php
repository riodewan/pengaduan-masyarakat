<div class="container">
	<div class="row">
		<div class="col-6">
			<div class="card" style="padding: 45px; width: 55%; margin: 0 auto; margin-top: 25%; margin-right:25%;">
			<h2 style="text-align: center; margin-top:-5px;" class="black-text">Silahkan Login</h2>
				<form method="POST" style="margin-top: 25px;">
					<div class="input_field">
						<label for="username">Username</label>
						<input id="username" type="text" name="username" required>
					</div>
					<div class="input_field">
						<label for="password">Password</label>
						<input id="password" type="password" name="password" required>
					</div>
					<input type="submit" name="login" value="Login" class="btn blue" style="width: 100%;">
				</form>
			</div>
		</div>
	</div>
</div>
<?php 
	if(isset($_POST['login'])){
		$username = mysqli_real_escape_string($koneksi,$_POST['username']);
		$password = mysqli_real_escape_string($koneksi,md5($_POST['password']));
	
		$sql = mysqli_query($koneksi,"SELECT * FROM masyarakat WHERE username='$username' AND password='$password' ");
		$cek = mysqli_num_rows($sql);
		$data = mysqli_fetch_assoc($sql);
	
		$sql2 = mysqli_query($koneksi,"SELECT * FROM petugas WHERE username='$username' AND password='$password' ");
		$cek2 = mysqli_num_rows($sql2);
		$data2 = mysqli_fetch_assoc($sql2);

		if($cek>0){
			session_start();
			$_SESSION['username']=$username;
			$_SESSION['data']=$data;
			$_SESSION['level']='masyarakat';
			header('location:masyarakat/');
		}
		elseif($cek2>0){
			if($data2['level']=="admin"){
				session_start();
				$_SESSION['username']=$username;
				$_SESSION['data']=$data2;
				header('location:admin/');
			}
			elseif($data2['level']=="petugas"){
				session_start();
				$_SESSION['username']=$username;
				$_SESSION['data']=$data2;
				header('location:petugas/');
			}
		}
		else{
			echo "<script>alert('Gagal Login! Silahkan login kembali')</script>";
		}

	}
 ?>