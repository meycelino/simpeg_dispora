<div class="row">
<?php
	if (isset($_GET['id_peg'])) {
	$id_peg = $_GET['id_peg'];
	}
	else {
		die ("Error. No Kode Selected! ");	
	}
	include "config/koneksi.php";
	$tampilPro	= mysql_query("SELECT * FROM tb_pegawai WHERE id_peg='$id_peg'");
	$hasil	= mysql_fetch_array ($tampilPro);
		$notnip	=$hasil['nip'];
				
	if ($_POST['edit'] == "edit") {
	$nip			=$_POST['nip'];
	$nama			=$_POST['nama'];
	$tempat_lhr		=$_POST['tempat_lhr'];
	$tgl_lhr		=$_POST['tgl_lhr'];
	$agama			=$_POST['agama'];
	$jk				=$_POST['jk'];	
	$gol_darah		=$_POST['gol_darah'];
	$status_nikah	=$_POST['status_nikah'];	
	$status_kepeg	=$_POST['status_kepeg'];	
	$tgl_naikpangkat=$_POST['tgl_naikpangkat'];	
	$tgl_naikgaji	=$_POST['tgl_naikgaji'];	
	$alamat			=$_POST['alamat'];
	$telp			=$_POST['telp'];
	$email			=$_POST['email'];
	
	$pensiun = new DateTime($tgl_lhr);
	$pensiun->modify('+58 year');
	$pensiun->format('Y-m-d');
	$tgl_pensiun=$pensiun->format('Y-m-d');
	
	$ceknip	=mysql_num_rows (mysql_query("SELECT nip FROM tb_pegawai WHERE nip='$_POST[nip]' AND nip!='$notnip'"));
	
		if (empty($_POST['nip']) || empty($_POST['nama'])) {
			$_SESSION['pesan'] = "Oops! Please fill nip and nama column...";
			header("location:home-admin.php?page=form-edit-data-pegawai&id_peg=$id_peg");
		}		
		else if($ceknip > 0) {
			$_SESSION['pesan'] = "Oops! Duplikat data...";
			header("location:home-admin.php?page=form-edit-data-pegawai&id_peg=$id_peg");
		}
		else{
		$update= mysql_query ("UPDATE tb_pegawai SET nip='$nip', nama='$nama', tempat_lhr='$tempat_lhr', tgl_lhr='$tgl_lhr', agama='$agama', jk='$jk', gol_darah='$gol_darah', status_nikah='$status_nikah', status_kepeg='$status_kepeg', tgl_naikpangkat='$tgl_naikpangkat', tgl_naikgaji='$tgl_naikgaji', alamat='$alamat', telp='$telp', email='$email', tgl_pensiun='$tgl_pensiun' WHERE id_peg='$id_peg'");
		if($update){
				$_SESSION['pesan'] = "Good! Edit pegawai $hasil[nip] success...";
				header("location:home-admin.php?page=form-view-data-pegawai");
			}
			else {
				echo "<div class='register-logo'><b>Oops!</b> 404 Error Server.</div>";
			}
		}
	}
?>
</div>