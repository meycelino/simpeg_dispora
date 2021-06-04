<div class="row">
<?php
include "config/koneksi.php";
if (isset($_GET['id_peg'])) {
	$id_peg = $_GET['id_peg'];
	
	$query   =mysql_query("SELECT * FROM tb_pegawai WHERE id_peg='$id_peg'");
	$data    =mysql_fetch_array($query);
	$nama	=$data['nama'];
	}
	else {
		die ("Error. No ID Selected! ");	
	}
	
	if (!empty($id_peg) && $id_peg != "") {
		$delete	=mysql_query("DELETE FROM tb_pegawai WHERE id_peg='$id_peg'");		
		if($delete){
			$_SESSION['pesan'] = "Good! delete Pegawai success...";
			header("location:home-admin.php?page=form-view-data-pegawai");
		}
		else {
			echo "<div class='register-logo'><b>Oops!</b> 404 Error Server.</div>";
		}
	}
	mysql_close($Open);
?>
</div>