<div class="row">
<?php
	if (isset($_GET['id_penghargaan'])) {
	$id_penghargaan = $_GET['id_penghargaan'];
	}
	else {
		die ("Error. No Kode Selected! ");	
	}
	include "config/koneksi.php";
	$tampilHar	= mysql_query("SELECT * FROM tb_penghargaan WHERE id_penghargaan='$id_penghargaan'");
	$hasil	= mysql_fetch_array ($tampilHar);
		$id_peg	=$hasil['id_peg'];
				
	if ($_POST['edit'] == "edit") {
	$penghargaan	=$_POST['penghargaan'];
	$tahun			=$_POST['tahun'];
	$pemberi		=$_POST['pemberi'];
	
		if (empty($_POST['penghargaan']) || empty($_POST['tahun']) || empty($_POST['pemberi'])) {
			$_SESSION['pesan'] = "Oops! Please fill all column...";
			header("location:home-admin.php?page=form-edit-data-penghargaan&id_penghargaan=$id_penghargaan");
		}		
		else{
		$update= mysql_query ("UPDATE tb_penghargaan SET penghargaan='$penghargaan', tahun='$tahun', pemberi='$pemberi' WHERE id_penghargaan='$id_penghargaan'");
			if($update){
				$_SESSION['pesan'] = "Good! edit data penghargaan success...";
				header("location:home-admin.php?page=detail-data-pegawai&id_peg=$id_peg");
			}
			else {
				echo "<div class='register-logo'><b>Oops!</b> 404 Error Server.</div>";
			}
		}
	}
?>
</div>