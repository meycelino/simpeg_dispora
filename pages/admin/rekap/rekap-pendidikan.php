<div class="row">
	<div class="col-xs-12">
		<div class="row">
			<div class="col-sm-10 col-sm-offset-1">
				<div class="widget-box transparent">
					<div class="widget-header widget-header-large">
						<h3 class="widget-title grey lighter"><i class="ace-icon fa fa-calculator blue"></i> Rekapitulasi Pegawai Berdasarkan Pendidikan</h3>
						<div class="widget-toolbar hidden-480">
							<a href="./pages/admin/rekap/print-rekap-pendidikan.php" target="_blank" title="print"><i class="ace-icon fa fa-print"></i></a>
						</div>
					</div>					
					<div class="row">
						<div class="col-sm-4">
							<div class="widget-body">
								<div class="widget-main padding-24">
									<div>
										<table class="table table-striped table-bordered">
											<thead>
												<tr>
													<th class="center" width="5%">No #</th>
													<th class="center" width="70%">Tingkat Pendidikan</th>
													<th class="center" width="25%">Jumlah Pegawai</th>
												</tr>
											</thead>
											<tbody>
												<?php
													$no=0;
													$rekapsek	=mysql_query("SELECT * FROM tb_pegawai WHERE sekolah!='' GROUP BY sekolah ORDER BY sekolah DESC");
													while($sek=mysql_fetch_array($rekapsek)){
													$no++
												?>
												<tr>
													<td><?=$no?></td>
													<td><?=$sek['sekolah']?></td>
													<td><?php
															$jml=mysql_query("SELECT * FROM tb_pegawai WHERE sekolah='$sek[sekolah]'");
															echo mysql_num_rows($jml);
														?>
													</td>
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
						<div class="col-sm-8">
							<div class="widget-body">
								<div class="widget-main padding-4">
									<div id="container" class="col-sm-12" style="height:380px;"></div>
								</div>
							</div>
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