<div class="row">
<?php
	if (isset($_GET['id_penugasan'])) {
	$id_penugasan = $_GET['id_penugasan'];
	}
	else {
		die ("Error. No Kode Selected! ");	
	}
	include "config/koneksi.php";
	$tampilTug	= mysql_query("SELECT * FROM tb_penugasan WHERE id_penugasan='$id_penugasan'");
	$hasil	= mysql_fetch_array ($tampilTug);
		$id_peg	=$hasil['id_peg'];
				
	if ($_POST['edit'] == "edit") {
	$tujuan		=$_POST['tujuan'];
	$tahun		=$_POST['tahun'];
	$lama		=$_POST['lama'];
	$alasan		=$_POST['alasan'];
	
		if (empty($_POST['tujuan']) || empty($_POST['tahun']) || empty($_POST['lama']) || empty($_POST['alasan'])) {
			$_SESSION['pesan'] = "Oops! Please fill all column...";
			header("location:home-admin.php?page=form-edit-data-penugasan&id_penugasan=$id_penugasan");
		}		
		else{
		$update= mysql_query ("UPDATE tb_penugasan SET tujuan='$tujuan', tahun='$tahun', lama='$lama', alasan='$alasan' WHERE id_penugasan='$id_penugasan'");
			if($update){
				$_SESSION['pesan'] = "Good! edit data penugasan success...";
				header("location:home-admin.php?page=detail-data-pegawai&id_peg=$id_peg");
			}
			else {
				echo "<div class='register-logo'><b>Oops!</b> 404 Error Server.</div>";
			}
		}
	}
?>
</div>