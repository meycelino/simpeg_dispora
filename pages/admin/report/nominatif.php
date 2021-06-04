<div class="page-header">
	<h1>Report<small><i class="ace-icon fa fa-angle-double-right"></i> Nominatif</small></h1>
</div>
<div class="row">
	<div class="col-xs-12">
		<div class="clearfix">
			<div class="pull-right">
				<div class="btn-toolbar inline middle no-margin">
					<div class="widget-toolbar hidden-480">
						<a href="./pages/admin/report/print-nominatif.php" target="_blank" title="print"><i class="ace-icon fa fa-print"></i></a>
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-12">
			<?php
				include "config/koneksi.php";
				$kepala	=mysql_query("SELECT * FROM tb_setup WHERE id_setup='1'");
				$kep	=mysql_fetch_array($kepala);
			?>
			<h5 class="title" align="center">DAFTAR NOMINATIF PEGAWAI NEGERI SIPIL</h5>
			<h6 class="title" align="center" style="text-transform:uppercase">PER <?php echo date("j F Y");?></h6>
			<div class="space-6"></div>
			<table border="0">
				<tr>
					<td width="120">SATUAN KERJA</td>
					<td style="text-transform:uppercase">: <?=$kep['unit']?> KABUPATEN <?=$kep['kab']?></td>
				</tr>
			</table>
			<div class="space-6"></div>
			<table class="table table-bordered">				
				<tr>
					<th rowspan="2">No</th>
					<th colspan="2">NAMA, TTL</th>
					<th rowspan="2">JNS KELAMIN</th>
					<th colspan="2">PKT TERAKHIR</th>
					<th colspan="2">JABATAN</th>
					<th rowspan="2">ESLON</th>
					<th colspan="3">LATIHAN JABATAN</th>
					<th rowspan="2">PEND, JURUSAN, T.LULUS</th>
					<th rowspan="2">ALAMAT & NO. TELP</th>
					<th rowspan="2">KET</th>
				</tr>
				<tr>
					<th colspan="2">NIP, AGAMA</th>
					<th>GOL/RUANG</th>
					<th>TMT</th>
					<th>NAMA</th>
					<th>TMT</th>
					<th>NAMA</th>
					<th>THN</th>
					<th>JML JAM</th>
				</tr>
				<tr>
					<th>1</th>
					<th colspan="2">2</th>
					<th>3</th>
					<th>4</th>
					<th>5</th>
					<th>6</th>
					<th>7</th>
					<th>8</th>
					<th>9</th>
					<th>10</th>
					<th>11</th>
					<th>12</th>
					<th>13</th>
					<th>14</th>
				</tr>
				<?php
					$no=0;
					$idPeg=mysql_query("SELECT * FROM tb_pegawai WHERE status_kepeg='PNS' ORDER BY urut_pangkat DESC");
					while($peg=mysql_fetch_array($idPeg)){
					$no++
					?>
				<tr>
					<td><?=$no;?></td>
					<td colspan="2"><?php echo $peg['nama']; ?><br /><br /><?php echo $peg['tempat_lhr']; ?>, <?php echo $peg['tgl_lhr']; ?><br /><?php echo $peg['nip']; ?><br /><?php echo $peg['agama']; ?></td>
					<td><?php echo $peg['jk']; ?></td>
					<td><?php
						$idPan=mysql_query("SELECT * FROM tb_pangkat WHERE (id_peg='$peg[id_peg]' AND status_pan='Aktif')");
						$hpan=mysql_fetch_array($idPan);
					?>
					<?php echo $hpan['pangkat']; ?><br /><?php echo $hpan['gol']; ?></td>
					<td><?php echo $hpan['tmt_pangkat']; ?></td>
					<td><?php
						$idJab=mysql_query("SELECT * FROM tb_jabatan WHERE (id_peg='$peg[id_peg]' AND status_jab='Aktif')");
						$hjab=mysql_fetch_array($idJab);
					?>
					<?php echo $hjab['jabatan']; ?></td>
					<td><?php echo $hjab['tmt_jabatan']; ?></td>
					<td><?php echo $hjab['eselon']; ?></td>
					<td><?php
						$idLatjab=mysql_query("SELECT * FROM tb_lat_jabatan WHERE id_peg='$peg[id_peg]'");
						$hljab=mysql_fetch_array($idLatjab);
						?>
						<?php echo $hljab['nama_pelatih']; ?></td>
					<td><?php echo $hljab['tahun_lat']; ?></td>
					<td><?php echo $hljab['jml_jam']; ?></td>
					<td><?php
						$idSek=mysql_query("SELECT * FROM tb_sekolah WHERE (id_peg='$peg[id_peg]' AND status='Akhir')");
						$hsek=mysql_fetch_array($idSek);
						?>
						<?php echo $hsek['tingkat']; ?><br /><?php echo $hsek['nama_sekolah']; ?><br /><?php echo $hsek['jurusan']; ?><br /><?php echo $hsek['tgl_ijazah']; ?>
					</td>
					<td><?php echo $peg['alamat']; ?><br /><br /><?php echo $peg['telp']; ?></td>
					<td><?php echo $peg['status_kepeg']; ?></td>
				</tr>
				<?php
				}		
				?>		
			</table>
		</div>
	</div>
</div>
		<!-- page specific plugin scripts -->
		<script src="assets/js/jquery-ui.custom.min.js"></script>
		<script src="assets/js/jquery.ui.touch-punch.min.js"></script>
		<script src="assets/js/jquery.gritter.min.js"></script>
		<script src="assets/js/bootbox.js"></script>
		<script src="assets/js/jquery.easypiechart.min.js"></script>
		<script src="assets/js/bootstrap-datepicker.min.js"></script>
		<script src="assets/js/jquery.hotkeys.index.min.js"></script>
		<script src="assets/js/bootstrap-wysiwyg.min.js"></script>
		<script src="assets/js/select2.min.js"></script>
		<script src="assets/js/spinbox.min.js"></script>
		<script src="assets/js/bootstrap-editable.min.js"></script>
		<script src="assets/js/ace-editable.min.js"></script>
		<script src="assets/js/jquery.maskedinput.min.js"></script>
		<script> // 500 = 0,5 s
            $(document).ready(function(){setTimeout(function(){$(".pesan").fadeIn('slow');}, 500);});
            setTimeout(function(){$(".pesan").fadeOut('slow');}, 7000);
        </script>