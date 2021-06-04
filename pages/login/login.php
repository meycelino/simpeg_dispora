<div class="row">
<?php
	include "config/koneksi.php";
	$id_user		= $_POST['id_user'];
	$password		= $_POST['password'];
	$op 			= $_GET['op'];

	if($op=="in"){
		$sql = mysql_query("SELECT * FROM tb_user WHERE id_user='$id_user' AND password='$password'");
		if(mysql_num_rows($sql)==1){
			$qry = mysql_fetch_array($sql);
			$_SESSION['id_user'] = $qry['id_user'];
			$_SESSION['nama_user'] = $qry['nama_user'];
			$_SESSION['hak_akses'] = $qry['hak_akses'];
			
			if($qry['hak_akses']=="Administrator"){
				$_SESSION['pesan'] = "Login Success!";
				header("location:administrator.php");
			}
			else if($qry['hak_akses']=="Admin"){
				$_SESSION['pesan'] = "Login Success!";
				header("location:home-admin.php");
			}
		}
		else{
			$_SESSION['pesan'] = "Login Failed! Username dan password tidak sesuai...";
			header("location:index.php?page=form-login");
		}
	}else if($op=="out"){
		unset($_SESSION['id_user']);
		unset($_SESSION['hak_akses']);
		header("location:index.php");
	}
?>
</div>