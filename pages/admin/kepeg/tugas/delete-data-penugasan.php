<div class="row">
<?php
include "config/koneksi.php";
if (isset($_GET['id_penugasan'])) {
	$id_penugasan = $_GET['id_penugasan'];
	
	$query   =mysql_query("SELECT * FROM tb_penugasan WHERE id_penugasan='$id_penugasan'");
	$data    =mysql_fetch_array($query);
		$id_peg	=$data['id_peg'];
	}
	else {
		die ("Error. No ID Selected! ");	
	}
	
	if (!empty($id_penugasan) && $id_penugasan != "") {
		$delete	=mysql_query("DELETE FROM tb_penugasan WHERE id_penugasan='$id_penugasan'");		
		if($delete){
			$_SESSION['pesan'] = "Good! delete penugasan success...";
			header("location:home-admin.php?page=detail-data-pegawai&id_peg=$id_peg");
		}
		else {
			echo "<div class='register-logo'><b>Oops!</b> 404 Error Server.</div>";
		}
	}
	mysql_close($Open);
?>
</div>