<div class="row">
<?php
include "config/koneksi.php";
if (isset($_GET['id_penghargaan'])) {
	$id_penghargaan = $_GET['id_penghargaan'];
	
	$query   =mysql_query("SELECT * FROM tb_penghargaan WHERE id_penghargaan='$id_penghargaan'");
	$data    =mysql_fetch_array($query);
		$id_peg	=$data['id_peg'];
	}
	else {
		die ("Error. No ID Selected! ");	
	}
	
	if (!empty($id_penghargaan) && $id_penghargaan != "") {
		$delete	=mysql_query("DELETE FROM tb_penghargaan WHERE id_penghargaan='$id_penghargaan'");		
		if($delete){
			$_SESSION['pesan'] = "Good! delete penghargaan success...";
			header("location:home-admin.php?page=detail-data-pegawai&id_peg=$id_peg");
		}
		else {
			echo "<div class='register-logo'><b>Oops!</b> 404 Error Server.</div>";
		}
	}
	mysql_close($Open);
?>
</div>