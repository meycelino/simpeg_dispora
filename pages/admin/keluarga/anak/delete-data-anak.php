<div class="row">
<?php
include "config/koneksi.php";
if (isset($_GET['id_anak'])) {
	$id_anak = $_GET['id_anak'];
	
	$query   =mysql_query("SELECT * FROM tb_anak WHERE id_anak='$id_anak'");
	$data    =mysql_fetch_array($query);
		$id_peg	=$data['id_peg'];
	}
	else {
		die ("Error. No ID Selected! ");	
	}
	
	if (!empty($id_anak) && $id_anak != "") {
		$delete	=mysql_query("DELETE FROM tb_anak WHERE id_anak='$id_anak'");		
		if($delete){
			$_SESSION['pesan'] = "Good! delete anak success...";
			header("location:home-admin.php?page=detail-data-pegawai&id_peg=$id_peg");
		}
		else {
			echo "<div class='register-logo'><b>Oops!</b> 404 Error Server.</div>";
		}
	}
	mysql_close($Open);
?>
</div>