<div class="page-header">
	<h1>Report<small><i class="ace-icon fa fa-angle-double-right"></i> Bezetting</small></h1>
</div>
<div class="row">
	<div class="col-xs-12">
		<div class="clearfix">
			<div class="pull-right">
				<div class="btn-toolbar inline middle no-margin">
					<div class="widget-toolbar hidden-480">
						<a href="./pages/admin/report/print-bezetting.php" target="_blank" title="print"><i class="ace-icon fa fa-print"></i></a>
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
			<h5 class="title" align="center">DAFTAR BEZETTING PNS</h5>
			<h6 class="title" align="center" style="text-transform:uppercase"><?=$kep['unit']?> KABUPATEN <?=$kep['kab']?> PERIODE BULAN <?php echo date ("m");?> TAHUN <?php echo date ("Y");?></h6>
			<div class="space-6"></div>
			<table class="table table-bordered">				
				<tr>
					<th>No</th>
					<th>NAMA<br />TEMPAT TANGGAL LAHIR</th>
					<th>NIP</th>
					<th>PANGKAT<br />GOL/RUANG</th>
					<th>JABATAN</th>
					<th>PENDIDIKAN<br />TERAKHIR</th>
					<th>UMUR (THN)</th>
					<th>KET</th>
				</tr>
				<tr>
					<th>1</th>
					<th>2</th>
					<th>3</th>
					<th>4</th>
					<th>5</th>
					<th>6</th>
					<th>7</th>
					<th>8</th>
				</tr>
				<?php
					$no=0;
					$idPeg=mysql_query("SELECT * FROM tb_pegawai WHERE status_kepeg='PNS' ORDER BY urut_pangkat DESC");
					while($peg=mysql_fetch_array($idPeg)){
					$no++
				?>
				<tr>
					<td><?=$no;?></td>
					<td><?php echo $peg['nama']; ?><br /><?php echo $peg['tempat_lhr']; ?>, <?php echo $peg['tgl_lhr']; ?></td>
					<td><?php echo $peg['nip']; ?></td>
					<td><?php
						$idPan=mysql_query("SELECT * FROM tb_pangkat WHERE (id_peg='$peg[id_peg]' AND status_pan='Aktif')");
						$hpan=mysql_fetch_array($idPan);
						?>
						<?php echo $hpan['pangkat']; ?><br /><?php echo $hpan['gol']; ?></td>
					<td><?php
						$idJab=mysql_query("SELECT * FROM tb_jabatan WHERE (id_peg='$peg[id_peg]' AND status_jab='Aktif')");
						$hjab=mysql_fetch_array($idJab);
						?>
						<?php echo $hjab['jabatan']; ?></td>
					<td><?php
						$idSek=mysql_query("SELECT * FROM tb_sekolah WHERE (id_peg='$peg[id_peg]' AND status='Akhir')");
						$hsek=mysql_fetch_array($idSek);
						?>
						<?php echo $hsek['tingkat']; ?>
					</td>
					<td><?php
						$lhr	= new DateTime($peg['tgl_lhr']);
						$today	= new DateTime();										
						$selisih	= $today->diff($lhr);										
							echo $selisih->y;
						?>											
					</td>
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