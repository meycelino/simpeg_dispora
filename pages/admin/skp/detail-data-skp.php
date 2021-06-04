<?php	
	if (isset($_GET['id_skp'])) {
	$id_skp = $_GET['id_skp'];
	}
	else {
		die ("Error. No ID Selected! ");	
	}
	include "config/koneksi.php";
	$query	=mysql_query("SELECT * FROM tb_skp WHERE id_skp='$id_skp'");
	$data	=mysql_fetch_array($query);
		$orientasi		=$data['nilai_orientasi'];
		$integritas		=$data['nilai_integritas'];
		$komitmen		=$data['nilai_komitmen'];
		$disiplin		=$data['nilai_disiplin'];
		$kerjasama		=$data['nilai_kerjasama'];
		$kepemimpinan	=$data['nilai_kepemimpinan'];
		$jml_nilai	=$orientasi+$integritas+$komitmen+$disiplin+$kerjasama+$kepemimpinan;
		$rata		=$jml_nilai/6;
	
	$tampilPeg   =mysql_query("SELECT * FROM tb_pegawai WHERE id_peg='$data[id_peg]'");
	$peg    =mysql_fetch_array($tampilPeg);
?>
	<div class="row">
		<div class="col-xs-12">
			<div class="space-6"></div>
			<div class="row">
				<div class="col-sm-10 col-sm-offset-1">
					<div class="widget-box transparent">
						<div class="widget-header widget-header-large">
							<h3 class="widget-title grey lighter"><i class="ace-icon fa fa-briefcase orange"></i> Detail SKP
								<?php
									if (isset($_SESSION['pesan']) && $_SESSION['pesan'] <> '') {
										echo "<small class='pesan'>&nbsp; <i class='ace-icon fa fa-bell icon-animated-bell bigger-100 orange'></i>&nbsp; ".$_SESSION['pesan']."</small>";
									}
									$_SESSION['pesan'] ="";
								?>
							</h3>
							<div class="widget-toolbar no-border invoice-info">
								<span class="invoice-info-label">NIP:</span>
								<span class="red"># <?=$peg['nip']?></span>
								<br />
								<span class="invoice-info-label">Nama:</span>
								<span class="blue"> <?=$peg['nama']?></span>
							</div>
							<div class="widget-toolbar hidden-480">
								<a href="home-admin.php?page=form-edit-data-skp&id_skp=<?=$id_skp?>" title="edit"><i class="ace-icon fa fa-edit"></i></a>
							</div>
							<div class="widget-toolbar hidden-480">
								<a href="home-admin.php?page=detail-data-pegawai&id_peg=<?=$peg['id_peg']?>" title="back"><i class="ace-icon fa fa-arrow-left"></i></a>
							</div>
						</div>
						<div class="widget-body">
							<div class="widget-main padding-24">
								<div class="row">
									<div class="profile-user-info profile-user-info-striped">
										<div class="profile-info-row">
											<div class="profile-info-name">Periode</div>
											<div class="profile-info-value">
												<span class="editable"><?=$data['periode_awal']?> &nbsp; <b>s/d</b> &nbsp; <?=$data['periode_akhir']?></span>
											</div>
										</div>
										<div class="profile-info-row">
											<div class="profile-info-name">Pejabat Penilai</div>
											<div class="profile-info-value">
												<span class="editable"><?=$data['penilai']?></span>
											</div>
										</div>
										<div class="profile-info-row">
											<div class="profile-info-name">Atasan Pejabat Penilai</div>
											<div class="profile-info-value">
												<span class="editable"><?=$data['atasan_penilai']?></span>
											</div>
										</div>
									</div>
								</div>
								<div class="space"></div>
								<div>
									<table class="table table-striped table-bordered">
										<thead>
											<tr>
												<th class="center" width="5%">No #</th>
												<th width="70%">Aspek Penilaian SKP</th>
												<th width="25%">Nilai Perolehan</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>1</td>
												<td>Orientasi Pelayanan</td>
												<td><?php echo $data['nilai_orientasi'];?></td>
											</tr>
											<tr>
												<td>2</td>
												<td>Integritas</td>
												<td><?php echo $data['nilai_integritas'];?></td>
											</tr>
											<tr>
												<td>3</td>
												<td>Komitmen</td>
												<td><?php echo $data['nilai_komitmen'];?></td>
											</tr>
											<tr>
												<td>4</td>
												<td>Disiplin</td>
												<td><?php echo $data['nilai_disiplin'];?></td>
											</tr>
											<tr>
												<td>5</td>
												<td>Kerjasama</td>
												<td><?php echo $data['nilai_kerjasama'];?></td>
											</tr>
											<tr>
												<td>6</td>
												<td>Kepemimpinan</td>
												<td><?php echo $data['nilai_kepemimpinan'];?></td>
											</tr>
										</tbody>
										<tfoot>
											<tr>
												<th colspan="2">Nilai Total</th>
												<th><?=$jml_nilai?></th>
											</tr>
											<tr>
												<th colspan="2">Rata-rata</th>
												<th><?=number_format($rata,2,",",",")?></th>
											</tr>
											<tr>
												<th colspan="2">Mutu</th>
												<th><?=$data['hasil_penilaian']?></th>
											</tr>
										</tfoot>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script> // 500 = 0,5 s
		$(document).ready(function(){setTimeout(function(){$(".pesan").fadeIn('slow');}, 500);});
		setTimeout(function(){$(".pesan").fadeOut('slow');}, 7000);
	</script>