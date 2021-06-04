<div class="row">
<?php
	if (isset($_GET['id_user'])) {
	$id_user = $_GET['id_user'];
	}
	else {
		die ("Error. No ID Selected! ");	
	}
	include "config/koneksi.php";

	if ($_POST['change'] == "change") {
	$password_lama	= $_POST['password_lama'];
	$password_baru	= $_POST['password_baru'];
	$confirm_password	= $_POST['confirm_password'];
	
	include "config/koneksi.php";
	//cek old password
	$old =mysql_query("SELECT * FROM tb_user WHERE id_user='$id_user' AND password='$password_lama'");
	$cek = mysql_num_rows ($old);
	
		if (empty($_POST['password_lama']) || empty($_POST['password_baru']) || empty($_POST['confirm_password'])) {
			$_SESSION['pesan'] = "Sebaiknya ISI setiap kolom yang tersedia!";
			header("location:home-admin.php?page=form-ganti-password&id_user=$id_user");
		}
		else if (! $cek >= 1) {
			$_SESSION['pesan'] = "Oops! Password Wrong";
			header("location:home-admin.php?page=form-ganti-password&id_user=$id_user");
		}
		else if (($_POST['password_baru']) != ($_POST['confirm_password'])) {
			$_SESSION['pesan'] = "Oops! Confirm Password Failed";
			header("location:home-admin.php?page=form-ganti-password&id_user=$id_user");
		}
		else{
			$update= mysql_query ("UPDATE tb_user SET password='$password_baru' WHERE id_user='$id_user'");
			if($update){
				$_SESSION['pesan'] = "Good! Edit password success...";
				header("location:home-admin.php");
			}
			else {
				echo "<div class='register-logo'><b>Oops!</b> 404 Error Server.</div>";
			}
			
		}
	}
?>
</div>