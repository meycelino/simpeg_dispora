<div class="row">
<?php
	if (isset($_GET['id_setup'])) {
	$id_setup = $_GET['id_setup'];
	}
	else {
		die ("Error. No Kode Selected! ");	
	}
	include "config/koneksi.php";
	$setup	= mysql_query("SELECT * FROM tb_setup WHERE id_setup='$id_setup'");
	$hasil	= mysql_fetch_array ($setup);
				
	if ($_POST['setup'] == "setup") {
	$unit	=$_POST['unit'];
	$kab	=$_POST['kab'];
	$alamat	=$_POST['alamat'];
	$kepala	=$_POST['kepala'];
		
		if (empty($_POST['unit']) || empty($_POST['kab']) || empty($_POST['alamat'])) {
			$_SESSION['pesan'] = "Oops! Please fill all column...";
			header("location:administrator.php?page=form-setup&id_setup=$id_setup");
		}
		else{
		$update= mysql_query ("UPDATE tb_setup SET unit='$unit', kab='$kab', alamat='$alamat', kepala='$kepala' WHERE id_setup='$id_setup'");
			if($update){
				$_SESSION['pesan'] = "Good! Edit setup success...";
				header("location:administrator.php?page=form-view-setup");
			}
			else {
				echo "<div class='register-logo'><b>Oops!</b> 404 Error Server.</div>";
			}
				
		}
	}
?>
</div>