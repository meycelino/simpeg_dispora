<?php include "config/koneksi.php";?>
<div class="page-header">
	<h1>Dashboard<small> <i class="ace-icon fa fa-angle-double-right"></i> Overview &amp; statistic &nbsp;
		<?php
			if (isset($_SESSION['pesan']) && $_SESSION['pesan'] <> '') {
				echo "<small class='pesan'>&nbsp;<i class='ace-icon fa fa-bell icon-animated-bell bigger-100 orange'></i> &nbsp; ".$_SESSION['pesan']."</small>";
			}
			$_SESSION['pesan'] ="";
			
			$jmlpeg	=mysql_query("SELECT * FROM tb_pegawai ORDER BY id_peg DESC");
			$jpeg		=mysql_num_rows($jmlpeg);
			
			$jmlhar	=mysql_query("SELECT * FROM tb_penghargaan");
			$jhar	=mysql_num_rows($jmlhar);
			
			$jmltug	=mysql_query("SELECT * FROM tb_penugasan");
			$jtug	=mysql_num_rows($jmltug);
			
			$jmlmut	=mysql_query("SELECT * FROM tb_mutasi");
			$jmut	=mysql_num_rows($jmlmut);
			
			$jmldik	=mysql_query("SELECT * FROM tb_diklat");
			$jdik	=mysql_num_rows($jmldik);
			
			$jmllat	=mysql_query("SELECT * FROM tb_lat_jabatan");
			$jlat	=mysql_num_rows($jmllat);
			
			$jmlsem	=mysql_query("SELECT * FROM tb_seminar");
			$jsem	=mysql_num_rows($jmlsem);
		?></small>
	</h1>
</div>
<div class="row">
	<div class="col-xs-12">
		<div class="alert alert-block alert-success">
			<button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>
			<i class="ace-icon fa fa-check green"></i>
			Welcome to<strong class="green"> Dinas Pemuda dan Olahraga Provinsi Kalimantan Tengah</strong>. Aplikasi Sistem Informasi Kepegawaian. Dikembangkan oleh <a href="http://www.dispora.kalteng.go.id/" target="_blank">DISPORA KALTENG</a><i class="ace-icon fa fa-phone"></i> +62 852 4848 7470
		</div>
		<div class="row">
			<div class="col-sm-12 infobox-container">
				<div class="infobox infobox-red">
					<div class="infobox-icon"><i class="ace-icon fa fa-user"></i></div>
					<div class="infobox-data">
						<span class="infobox-data-number"><?=$jpeg?></span>
						<div class="infobox-content">Pegawai</div>
					</div>
					<div class="stat stat-success">&nbsp;</div>
				</div>
				<div class="infobox infobox-orange">
					<div class="infobox-icon"><i class="ace-icon fa fa-star"></i></div>
					<div class="infobox-data">
						<span class="infobox-data-number"><?=$jhar?></span>
						<div class="infobox-content">Penghargaan</div>
					</div>
					<div class="badge badge-success">&nbsp; -- &nbsp;<i class="ace-icon fa fa-star"></i></div>
				</div>
				<div class="infobox infobox-blue">
					<div class="infobox-icon"><i class="ace-icon fa fa-plane"></i></div>
					<div class="infobox-data">
						<span class="infobox-data-number"><?=$jtug?></span>
						<div class="infobox-content">Penugasan LN</div>
					</div>
					<div class="badge badge-important">&nbsp; -- &nbsp;<i class="ace-icon fa fa-plane"></i></div>
				</div>
				<div class="infobox infobox-pink">
					<div class="infobox-icon"><i class="ace-icon fa fa-exchange"></i></div>
					<div class="infobox-data">
						<span class="infobox-data-number"><?=$jmut?></span>
						<div class="infobox-content">Mutasi</div>
					</div>
					<div class="stat stat-success">&nbsp;</div>
				</div>
			</div>
		</div>
		<div class="space-6"></div>
		<div class="row">
			<div class="col-sm-12 infobox-container">
				<div class="infobox infobox-green infobox-small infobox-dark">
					<div class="infobox-icon"><i class="ace-icon fa fa-flag"></i></div>
					<div class="infobox-data">
						<div class="infobox-content">Diklat</div>
						<div class="infobox-content"><?=$jdik?></div>
					</div>
				</div>
				<div class="infobox infobox-purple infobox-small infobox-dark">
					<div class="infobox-icon"><i class="ace-icon fa fa-tasks"></i></div>
					<div class="infobox-data">
						<div class="infobox-content">Pelatihan</div>
						<div class="infobox-content"><?=$jlat?></div>
					</div>
				</div>
				<div class="infobox infobox-grey infobox-small infobox-dark">
					<div class="infobox-icon"><i class="ace-icon fa fa-desktop"></i></div>
					<div class="infobox-data">
						<div class="infobox-content">Seminar</div>
						<div class="infobox-content"><?=$jsem?></div>
					</div>
				</div>
			</div>
		</div>
		<div class="hr hr32 hr-dotted"></div>
		<div class="row">
			<div class="col-sm-12">
				<div class="widget-box transparent">
					<div class="widget-header widget-header-flat">
						<h4 class="widget-title lighter"><i class="ace-icon fa fa-bar-chart-o"></i>Jabatan</h4>
						<div class="widget-toolbar">
							<a href="#" data-action="collapse"><i class="ace-icon fa fa-chevron-up"></i></a>
						</div>
					</div>
					<div class="widget-body">
						<div class="widget-main padding-4">
							<div id="container" class="col-sm-12" style="height:380px;"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="hr hr32 hr-dotted"></div>
		<div class="row">
			<div class="col-sm-5">
				<div class="widget-box transparent">
					<div class="widget-header widget-header-flat">
						<h4 class="widget-title lighter"><i class="ace-icon fa fa-star blue"></i>Pensiun Tahun Ini</h4>
						<div class="widget-toolbar">
							<a href="#" data-action="collapse"><i class="ace-icon fa fa-chevron-up"></i></a>
						</div>
					</div>
					<div class="widget-body">
						<div class="widget-main no-padding">
							<table class="table table-bordered table-striped">
								<thead class="thin-border-bottom">
									<tr>
										<th width="25%"><i class="ace-icon fa fa-lock blue"></i> NIP</th>
										<th width="45%"><i class="ace-icon fa fa-caret-right blue"></i> Nama</th>
										<th width="15%"><i class="ace-icon fa fa-caret-right blue"></i> TTL</th>
										<th width="15%" class="hidden-480"><i class="ace-icon fa fa-caret-right blue"></i> Pensiun</th>
									</tr>
								</thead>
								<tbody>
									<?php
										$datenow=date("Y");
										$nowpen	=mysql_query("SELECT * FROM tb_pegawai WHERE tgl_pensiun LIKE '$datenow%' ORDER BY tgl_pensiun");
										while($now	=mysql_fetch_array($nowpen)){
									?>
									<tr>
										<td><?php echo $now['nip'];?></td>
										<td><?php echo $now['nama']?></td>
										<td><?php echo $now['tempat_lhr']?>, <?php echo $now['tgl_lhr']?></td>
										<td><?php echo $now['tgl_pensiun']?></td>
									</tr>
									<?php
										}
									?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<div class="hr hr32 hr-dotted"></div>
				<div class="widget-box transparent">
					<div class="widget-header widget-header-flat">
						<h4 class="widget-title lighter"><i class="ace-icon fa fa-star orange"></i>Pensiun 1 Tahun Yang Akan Datang</h4>
						<div class="widget-toolbar">
							<a href="#" data-action="collapse"><i class="ace-icon fa fa-chevron-up"></i></a>
						</div>
					</div>
					<div class="widget-body">
						<div class="widget-main no-padding">
							<table class="table table-bordered table-striped">
								<thead class="thin-border-bottom">
									<tr>
										<th width="25%"><i class="ace-icon fa fa-lock blue"></i> NIP</th>
										<th width="45%"><i class="ace-icon fa fa-caret-right blue"></i> Nama</th>
										<th width="15%"><i class="ace-icon fa fa-caret-right blue"></i> TTL</th>
										<th width="15%" class="hidden-480"><i class="ace-icon fa fa-caret-right blue"></i> Pensiun</th>
									</tr>
								</thead>
								<tbody>
									<?php
										$dateone=date("Y") + 1;
										$onepen	=mysql_query("SELECT * FROM tb_pegawai WHERE tgl_pensiun LIKE '$dateone%' ORDER BY tgl_pensiun");
										while($one	=mysql_fetch_array($onepen)){
									?>
									<tr>
										<td><?php echo $one['nip'];?></td>
										<td><?php echo $one['nama']?></td>
										<td><?php echo $one['tempat_lhr']?>, <?php echo $one['tgl_lhr']?></td>
										<td><?php echo $one['tgl_pensiun']?></td>
									</tr>
									<?php
										}
									?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<div class="hr hr32 hr-dotted"></div>
				<div class="widget-box transparent">
					<div class="widget-header widget-header-flat">
						<h4 class="widget-title lighter"><i class="ace-icon fa fa-star red"></i>Pensiun 2 Tahun Yang Akan Datang</h4>
						<div class="widget-toolbar">
							<a href="#" data-action="collapse"><i class="ace-icon fa fa-chevron-up"></i></a>
						</div>
					</div>
					<div class="widget-body">
						<div class="widget-main no-padding">
							<table class="table table-bordered table-striped">
								<thead class="thin-border-bottom">
									<tr>
										<th width="25%"><i class="ace-icon fa fa-lock blue"></i> NIP</th>
										<th width="45%"><i class="ace-icon fa fa-caret-right blue"></i> Nama</th>
										<th width="15%"><i class="ace-icon fa fa-caret-right blue"></i> TTL</th>
										<th width="15%" class="hidden-480"><i class="ace-icon fa fa-caret-right blue"></i> Pensiun</th>
									</tr>
								</thead>
								<tbody>
									<?php
										$datetwo=date("Y") + 2;
										$twopen	=mysql_query("SELECT * FROM tb_pegawai WHERE tgl_pensiun LIKE '$datetwo%' ORDER BY tgl_pensiun");
										while($two	=mysql_fetch_array($twopen)){
									?>
									<tr>
										<td><?php echo $two['nip'];?></td>
										<td><?php echo $two['nama']?></td>
										<td><?php echo $two['tempat_lhr']?>, <?php echo $two['tgl_lhr']?></td>
										<td><?php echo $two['tgl_pensiun']?></td>
									</tr>
									<?php
										}
									?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-7">
				<div class="widget-box transparent">
					<div class="widget-header widget-header-flat">
						<h4 class="widget-title lighter"><i class="ace-icon fa fa-bar-chart-o"></i>Pendidikan</h4>
						<div class="widget-toolbar">
							<a href="#" data-action="collapse"><i class="ace-icon fa fa-chevron-up"></i></a>
						</div>
					</div>
					<div class="widget-body">
						<div class="widget-main padding-4">
							<div id="container2" class="col-sm-12" style="height:380px;"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="hr hr32 hr-dotted"></div>
		<div class="row">
			<div class="col-sm-12">
				<div class="widget-box transparent">
					<div class="widget-header widget-header-flat">
						<h4 class="widget-title lighter"><i class="ace-icon fa fa-bar-chart-o"></i>Golongan</h4>
						<div class="widget-toolbar">
							<a href="#" data-action="collapse"><i class="ace-icon fa fa-chevron-up"></i></a>
						</div>
					</div>
					<div class="widget-body">
						<div class="widget-main padding-4">
							<div id="container1" class="col-sm-12" style="height:380px;"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
		<script src="assets/js/highcharts.js" type="text/javascript"></script>
			<script type="text/javascript">
				var chart1; // globally available
					$(document).ready(function() {
						chart1 = new Highcharts.Chart({
							chart: {
								renderTo: 'container',
								type: 'column'
							},   
							title: {
								text: 'Statistik Jabatan'
							},
							xAxis: {
								categories: ['Jabatan']
							},
								yAxis: {
								title: {
									text: 'Jumlah'
								}
							},
							series:             
								[
								<?php 
								$sql   = "SELECT * FROM tb_pegawai WHERE jabatan!='' GROUP BY jabatan ORDER BY jabatan DESC";
								$query = mysql_query( $sql )  or die(mysql_error());
									while( $ret = mysql_fetch_array( $query ) ){
											$jab	=$ret['jabatan'];
											
											$sql_jumlah   = "SELECT * FROM tb_pegawai WHERE jabatan='$jab'";        
											$query_jumlah = mysql_query( $sql_jumlah ) or die(mysql_error());
											$data = mysql_num_rows( $query_jumlah );																									
									?>
										{
											name: '<?php echo $jab; ?>',
											data: [<?php echo $data; ?>]
										},
									<?php 
									
									}
									?>
								]
						});
					});	
			</script>
			<script type="text/javascript">
				var chart1; // globally available
					$(document).ready(function() {
						chart1 = new Highcharts.Chart({
							chart: {
								renderTo: 'container1',
								type: 'column'
							},   
							title: {
								text: 'Statistik Golongan'
							},
							xAxis: {
								categories: ['Golongan']
							},
								yAxis: {
								title: {
									text: 'Jumlah'
								}
							},
							series:             
								[
								<?php 
								$sql   = "SELECT * FROM tb_pegawai WHERE urut_pangkat!='' GROUP BY urut_pangkat ORDER BY urut_pangkat DESC";
								$query = mysql_query( $sql )  or die(mysql_error());
									while( $ret = mysql_fetch_array( $query ) ){
											$gol	=$ret['urut_pangkat'];
											
											$sql_jumlah   = "SELECT * FROM tb_pegawai WHERE urut_pangkat='$gol'";        
											$query_jumlah = mysql_query( $sql_jumlah ) or die(mysql_error());
											$data = mysql_num_rows( $query_jumlah );																									
									?>
										{
											name: '<?php echo $gol; ?>',
											data: [<?php echo $data; ?>]
										},
									<?php 
									
									}
									?>
								]
						});
					});	
			</script>
			<script type="text/javascript">
				var chart1; // globally available
					$(document).ready(function() {
						chart1 = new Highcharts.Chart({
							chart: {
								renderTo: 'container2',
								type: 'column'
							},   
							title: {
								text: 'Statistik Tingkat Pendidikan'
							},
							xAxis: {
								categories: ['Pendidikan']
							},
								yAxis: {
								title: {
									text: 'Jumlah'
								}
							},
							series:             
								[
								<?php 
								$sql   = "SELECT * FROM tb_pegawai WHERE sekolah!='' GROUP BY sekolah ORDER BY sekolah DESC";
								$query = mysql_query( $sql )  or die(mysql_error());
									while( $ret = mysql_fetch_array( $query ) ){
											$sek	=$ret['sekolah'];
											
											$sql_jumlah   = "SELECT * FROM tb_pegawai WHERE sekolah='$sek'";        
											$query_jumlah = mysql_query( $sql_jumlah ) or die(mysql_error());
											$data = mysql_num_rows( $query_jumlah );																									
									?>
										{
											name: '<?php echo $sek; ?>',
											data: [<?php echo $data; ?>]
										},
									<?php 
									
									}
									?>
								]
						});
					});	
			</script>
		<script> // 500 = 0,5 s
            $(document).ready(function(){setTimeout(function(){$(".pesan").fadeIn('slow');}, 500);});
            setTimeout(function(){$(".pesan").fadeOut('slow');}, 7000);
        </script>