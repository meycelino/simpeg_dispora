<div class="row">
<?php
	if (isset($_GET['id_cuti'])) {
	$id_cuti = $_GET['id_cuti'];
	}
	else {
		die ("Error. No Kode Selected! ");	
	}
	include "config/koneksi.php";
	$tampilCut	= mysql_query("SELECT * FROM tb_cuti WHERE id_cuti='$id_cuti'");
	$hasil	= mysql_fetch_array ($tampilCut);
		$id_peg	=$hasil['id_peg'];
				
	if ($_POST['edit'] == "edit") {
	$jns_cuti		=$_POST['jns_cuti'];
	$no_suratcuti	=$_POST['no_suratcuti'];
	$tgl_suratcuti	=$_POST['tgl_suratcuti'];
	$tgl_mulai		=$_POST['tgl_mulai'];
	$tgl_selesai	=$_POST['tgl_selesai'];
	$ket			=$_POST['ket'];
	
		if (empty($_POST['jns_cuti']) || empty($_POST['no_suratcuti']) || empty($_POST['tgl_suratcuti']) || empty($_POST['tgl_mulai']) || empty($_POST['tgl_selesai'])) {
			$_SESSION['pesan'] = "Oops! Please fill all column...";
			header("location:home-admin.php?page=form-edit-data-cuti&id_cuti=$id_cuti");
		}		
		else{
		$update= mysql_query ("UPDATE tb_cuti SET jns_cuti='$jns_cuti', no_suratcuti='$no_suratcuti', tgl_suratcuti='$tgl_suratcuti', tgl_mulai='$tgl_mulai', tgl_selesai='$tgl_selesai', ket='$ket' WHERE id_cuti='$id_cuti'");
			if($update){
				$_SESSION['pesan'] = "Good! edit data cuti success...";
				header("location:home-admin.php?page=detail-data-pegawai&id_peg=$id_peg");
			}
			else {
				echo "<div class='register-logo'><b>Oops!</b> 404 Error Server.</div>";
			}
		}
	}
?>
</div>