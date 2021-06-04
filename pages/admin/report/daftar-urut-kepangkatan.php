<div class="page-header">
	<h1>Report<small><i class="ace-icon fa fa-angle-double-right"></i> DUK</small></h1>
</div>
<div class="row">
	<div class="col-xs-12">
		<div class="clearfix">
			<div class="pull-right">
				<div class="btn-toolbar inline middle no-margin">
					<div class="widget-toolbar hidden-480">
						<a href="./pages/admin/report/print-daftar-urut-kepangkatan.php" target="_blank" title="print"><i class="ace-icon fa fa-print"></i></a>
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
			<h5 class="title" align="center">DAFTAR URUT KEPANGKATAN PEGAWAI NEGERI SIPIL</h5>
			<h6 class="title" align="center" style="text-transform:uppercase"><?=$kep['unit']?> KABUPATEN <?=$kep['kab']?> TAHUN <?php echo date ("Y");?></h6>
			<div class="space-6"></div>
			<table class="table table-bordered">				
				<tr>
					<th rowspan="2">No</th>
					<th colspan="2">NAMA</th>
					<th rowspan="2">NIP</th>
					<th colspan="2">PKT TERAKHIR</th>
					<th colspan="2">JABATAN</th>
					<th rowspan="2">ESLON</th>
					<th colspan="2">MK GOL</th>
					<th colspan="3">LATIHAN JABATAN</th>
					<th colspan="3">PEND AKHIR</th>
					<th rowspan="2">KET</th>
				</tr>
				<tr>
					<th colspan="2">TTL</th>
					<th>GOL/RUANG</th>
					<th>TMT</th>
					<th>NAMA</th>
					<th>TMT</th>
					<th>THN</th>
					<th>BLN</th>
					<th>NAMA</th>
					<th>THN</th>
					<th>JML JAM</th>
					<th>ASAL</th>
					<th>T.LLS</th>
					<th>TK.IJAZAH</th>
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
					<th>15</th>
					<th>16</th>
					<th>17</th>
				</tr>
				<?php
					$no=0;
					$idPeg=mysql_query("SELECT * FROM tb_pegawai WHERE status_kepeg='PNS' ORDER BY urut_pangkat DESC");
					while($peg=mysql_fetch_array($idPeg)){
					$no++
					?>
				<tr>
					<td><?=$no;?></td>
					<td colspan="2"><?php echo $peg['nama']; ?><br /><?php echo $peg['tempat_lhr']; ?>, <?php echo $peg['tgl_lhr']; ?></td>
					<td><?php echo $peg['nip']; ?></td>
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
						$tgl_sk	= new DateTime($hpan['tgl_sk']);
						$today	= new DateTime();										
						$selisih	= $today->diff($tgl_sk);										
							echo $selisih->y;
						?>											
					</td>
					<td><?php echo $selisih->m;?></td>
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
						<?php echo $hsek['nama_sekolah']; ?>
					</td>
					<td><?php echo $hsek['tgl_ijazah']; ?></td>
					<td><?php echo $hsek['tingkat']; ?></td>
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