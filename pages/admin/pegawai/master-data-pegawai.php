<div class="row">
<?php
	if (isset($_GET['id_peg'])) {
	$id_peg = $_GET['id_peg'];
	}
	else {
		die ("Error. No ID Selected! ");	
	}
	
	if ($_POST['save'] == "save") {
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
	$foto			=$_FILES['foto']['name'];
	
	$date_reg	=date("Ymd");
	
	$pensiun = new DateTime($tgl_lhr);
	$pensiun->modify('+58 year');
	$pensiun->format('Y-m-d');
	$tgl_pensiun=$pensiun->format('Y-m-d');
	
	include "config/koneksi.php";
	$ceknip	=mysql_num_rows (mysql_query("SELECT nip FROM tb_pegawai WHERE nip='$_POST[nip]'"));
	
		if (empty($_POST['nip']) || empty($_POST['nama'])) {
			$_SESSION['pesan'] = "Oops! Please fill nip and nama column...";
			header("location:home-admin.php?page=form-master-data-pegawai");
		}
		else if($ceknip > 0) {
			$_SESSION['pesan'] = "Oops! Duplikat data...";
			header("location:home-admin.php?page=form-master-data-pegawai");
		}
		
		else{
		$insert = "INSERT INTO tb_pegawai (id_peg, nip, nama, tempat_lhr, tgl_lhr, agama, jk, gol_darah, status_nikah, status_kepeg, tgl_naikpangkat, tgl_naikgaji, alamat, telp, email, foto, tgl_pensiun, date_reg) VALUES ('$id_peg', '$nip', '$nama', '$tempat_lhr', '$tgl_lhr', '$agama', '$jk', '$gol_darah', '$status_nikah', '$status_kepeg', '$tgl_naikpangkat', '$tgl_naikgaji', '$alamat', '$telp', '$email', '$foto', '$tgl_pensiun', '$date_reg')";
		$query = mysql_query ($insert);
		
		if($query){
			$_SESSION['pesan'] = "Good! Insert master pegawai success...";
			header("location:home-admin.php?page=form-view-data-pegawai");
		}
			else {
				echo "<div class='register-logo'><b>Oops!</b> 404 Error Server.</div>";
			}
		}
		if (strlen($foto)>0) {
			if (is_uploaded_file($_FILES['foto']['tmp_name'])) {
				move_uploaded_file ($_FILES['foto']['tmp_name'], "assets/foto/".$foto);
			}
		}
	}
?>
</div>