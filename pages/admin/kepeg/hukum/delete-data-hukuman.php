<div class="row">
<?php
include "config/koneksi.php";
if (isset($_GET['id_hukuman'])) {
	$id_hukuman = $_GET['id_hukuman'];
	
	$query   =mysql_query("SELECT * FROM tb_hukuman WHERE id_hukuman='$id_hukuman'");
	$data    =mysql_fetch_array($query);
		$id_peg	=$data['id_peg'];
	}
	else {
		die ("Error. No ID Selected! ");	
	}
	
	if (!empty($id_hukuman) && $id_hukuman != "") {
		$delete	=mysql_query("DELETE FROM tb_hukuman WHERE id_hukuman='$id_hukuman'");		
		if($delete){
			$_SESSION['pesan'] = "Good! delete hukuman success...";
			header("location:home-admin.php?page=detail-data-pegawai&id_peg=$id_peg");
		}
		else {
			echo "<div class='register-logo'><b>Oops!</b> 404 Error Server.</div>";
		}
	}
	mysql_close($Open);
?>
</div>