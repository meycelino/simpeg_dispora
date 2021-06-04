<div class="row">
<?php
	if (isset($_GET['id_cuti'])) {
	$id_cuti = $_GET['id_cuti'];
	}
	else {
		die ("Error. No ID Selected! ");	
	}
	
	if ($_POST['save'] == "save") {
	$id_peg			=$_POST['id_peg'];
	$jns_cuti		=$_POST['jns_cuti'];
	$no_suratcuti	=$_POST['no_suratcuti'];
	$tgl_suratcuti	=$_POST['tgl_suratcuti'];
	$tgl_mulai		=$_POST['tgl_mulai'];
	$tgl_selesai	=$_POST['tgl_selesai'];
	$ket			=$_POST['ket'];
	
	include "config/koneksi.php";
	
		if (empty($_POST['id_peg']) || empty($_POST['jns_cuti']) || empty($_POST['no_suratcuti']) || empty($_POST['tgl_suratcuti']) || empty($_POST['tgl_mulai']) || empty($_POST['tgl_selesai'])) {
			$_SESSION['pesan'] = "Oops! Please fill all column...";
			header("location:home-admin.php?page=form-master-data-cuti");
		}
		
		else{
		$insert = "INSERT INTO tb_cuti (id_cuti, id_peg, jns_cuti, no_suratcuti, tgl_suratcuti, tgl_mulai, tgl_selesai, ket) VALUES ('$id_cuti', '$id_peg', '$jns_cuti', '$no_suratcuti', '$tgl_suratcuti', '$tgl_mulai', '$tgl_selesai', '$ket')";
		$query = mysql_query ($insert);
		
		if($query){
			$_SESSION['pesan'] = "Good! Insert data cuti success...";
			header("location:home-admin.php?page=form-master-data-cuti");
		}
			else {
				echo "<div class='register-logo'><b>Oops!</b> 404 Error Server.</div>";
			}
		}
	}
?>
</div>