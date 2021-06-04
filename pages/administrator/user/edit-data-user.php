<div class="row">
<?php
	if (isset($_GET['id_user'])) {
	$id_user = $_GET['id_user'];
	}
	else {
		die ("Error. No Kode Selected! ");	
	}
	include "config/koneksi.php";
	$tampilUsr	= mysql_query("SELECT * FROM tb_user WHERE id_user='$id_user'");
	$hasil	= mysql_fetch_array ($tampilUsr);
				
	if ($_POST['edit'] == "edit") {
	$nama_user	=$_POST['nama_user'];
	$password	=$_POST['password'];
	$avatar		=$_FILES['avatar']['name'];
		
		if (empty($_POST['nama_user']) || empty($_POST['password'])) {
			$_SESSION['pesan'] = "Oops! Please fill all column...";
			header("location:administrator.php?page=form-edit-data-user&id_user=$id_user");
		}
		else{
		$update= mysql_query ("UPDATE tb_user SET nama_user='$nama_user', password='$password', avatar='$avatar' WHERE id_user='$id_user'");
			if($update){
				$_SESSION['pesan'] = "Good! Edit user $id_user success...";
				header("location:administrator.php?page=form-view-data-user");
			}
			else {
				echo "<div class='register-logo'><b>Oops!</b> 404 Error Server.</div>";
			}
		}
		if (strlen($avatar)>0) {
			if (is_uploaded_file($_FILES['avatar']['tmp_name'])) {
				move_uploaded_file ($_FILES['avatar']['tmp_name'], "assets/images/avatars/".$avatar);
			}
		}
	}
?>
</div>