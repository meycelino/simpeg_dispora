<div class="page-header">
	<h1>Data<small><i class="ace-icon fa fa-angle-double-right"></i> Pegawai <i class="ace-icon fa fa-angle-double-right"></i>&nbsp;
		<a type="button" class="label label-lg label-light arrowed-in arrowed-right" href="home-admin.php?page=form-master-data-pegawai"><i class="ace-icon fa fa-plus-circle bigger-110 blue"></i> Add Pegawai &nbsp;</a>
		<?php
			if (isset($_SESSION['pesan']) && $_SESSION['pesan'] <> '') {
				echo "<small class='pesan'>&nbsp; <i class='ace-icon fa fa-bell icon-animated-bell bigger-100 orange'></i>&nbsp; ".$_SESSION['pesan']."</small>";
			}
			$_SESSION['pesan'] ="";
		?></small>
	</h1>
</div>
<?php
	include "config/koneksi.php";
	$tampilPeg	=mysql_query("SELECT * FROM tb_pegawai ORDER BY id_peg DESC");
?>
<div class="row">
	<div class="col-xs-12">
		<div class="row">
			<div class="col-xs-12">
				<div class="table-header"> Results <u><?php echo mysql_num_rows($tampilPeg);?></u> rows for "Data Pegawai"</div>
				<div>
					<table id="dynamic-table" class="table table-striped table-bordered table-hover">
						<thead>
							<tr>
								<th><i class="ace-icon fa fa-key bigger-110 hidden-480"></i>ID</th>
								<th>Foto</th>
								<th>NIP</th>
								<th>Nama</th>
								<th>TTL</th>
								<th>JK</th>
								<th>No. Telp</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							<?php
								while($peg	=mysql_fetch_array($tampilPeg)){
							?>
							<tr>
								<td><?php echo $peg['id_peg']?></td>
								<td><a href="home-admin.php?page=form-ganti-foto&id_peg=<?=$peg['id_peg'];?>">
									<?php
									if (empty($peg['foto']))
										if ($peg['jk'] == "Laki-laki"){
											echo "<img src='assets//foto/no-foto-male.png' title='$peg[nip]' width='80' height='100'>";
										}
										else{
											echo "<img src='assets/foto/no-foto-female.png' title='$peg[nip]' width='80' height='100'>";
										}
										else
											echo "<img src='assets/foto/$peg[foto]' title='$peg[nip]' width='80' height='100'>";
									?>
								</a></td>
								<td><a href="home-admin.php?page=detail-data-pegawai&id_peg=<?=$peg['id_peg']?>" title="detail"><?php echo $peg['nip'];?></a></td>
								<td><?php echo $peg['nama']?></td>
								<td><?php echo $peg['tempat_lhr']?>, <?php echo $peg['tgl_lhr']?></td>
								<td><?php echo $peg['jk']?></td>
								<td><?php echo $peg['telp']?></td>
								<td class="center">
									<div class="hidden-sm hidden-xs btn-group">
										<a type="button" class="btn btn-xs btn-success" href="home-admin.php?page=detail-data-pegawai&id_peg=<?=$peg['id_peg']?>" title="detail"><i class="ace-icon fa fa-folder-open-o bigger-120"></i></a>
										<a type="button" class="btn btn-xs btn-info" href="home-admin.php?page=form-edit-data-pegawai&id_peg=<?=$peg['id_peg']?>" title="edit"><i class="ace-icon fa fa-pencil bigger-120"></i></a>
										<a type="button" class="btn btn-xs btn-danger" href="home-admin.php?page=delete-data-pegawai&id_peg=<?=$peg['id_peg']?>" title="delete" onclick="return confirm('Are you sure you want to delete == Pegawai <?php echo $peg['nama']?> == from Database?');"><i class="ace-icon fa fa-trash-o bigger-120"></i></a>
									</div>
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
</div>
	<!-- page specific plugin scripts -->
		<script src="assets/js/jquery.dataTables.min.js"></script>
		<script src="assets/js/jquery.dataTables.bootstrap.min.js"></script>
		<script src="assets/js/dataTables.buttons.min.js"></script>
		<script src="assets/js/buttons.flash.min.js"></script>
		<script src="assets/js/buttons.html5.min.js"></script>
		<script src="assets/js/buttons.print.min.js"></script>
		<script src="assets/js/buttons.colVis.min.js"></script>
		<script src="assets/js/dataTables.select.min.js"></script>

		<!-- inline scripts related to this page -->
		<script type="text/javascript">
			jQuery(function($) {
				//initiate dataTables plugin
				var myTable = 
				$('#dynamic-table')
				//.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
				.DataTable( {
					bAutoWidth: false,
					"aoColumns": [
					  { "bSortable": false },
					  null, null, null, null, null, null,
					  { "bSortable": false }
					],
					"aaSorting": [],
					
					select: {
						style: 'multi'
					}
			    } );
			
				$.fn.dataTable.Buttons.defaults.dom.container.className = 'dt-buttons btn-overlap btn-group btn-overlap';
		
				myTable.on( 'select', function ( e, dt, type, index ) {
					if ( type === 'row' ) {
						$( myTable.row( index ).node() ).find('input:checkbox').prop('checked', true);
					}
				} );
				myTable.on( 'deselect', function ( e, dt, type, index ) {
					if ( type === 'row' ) {
						$( myTable.row( index ).node() ).find('input:checkbox').prop('checked', false);
					}
				} );
			
				//table checkboxes
				$('th input[type=checkbox], td input[type=checkbox]').prop('checked', false);
				
				//select/deselect all rows according to table header checkbox
				$('#dynamic-table > thead > tr > th input[type=checkbox], #dynamic-table_wrapper input[type=checkbox]').eq(0).on('click', function(){
					var th_checked = this.checked;//checkbox inside "TH" table header
					
					$('#dynamic-table').find('tbody > tr').each(function(){
						var row = this;
						if(th_checked) myTable.row(row).select();
						else  myTable.row(row).deselect();
					});
				});
				
				//select/deselect a row when the checkbox is checked/unchecked
				$('#dynamic-table').on('click', 'td input[type=checkbox]' , function(){
					var row = $(this).closest('tr').get(0);
					if(this.checked) myTable.row(row).deselect();
					else myTable.row(row).select();
				});
			
				$(document).on('click', '#dynamic-table .dropdown-toggle', function(e) {
					e.stopImmediatePropagation();
					e.stopPropagation();
					e.preventDefault();
				});
				
				//And for the first simple table, which doesn't have TableTools or dataTables
				//select/deselect all rows according to table header checkbox
				var active_class = 'active';
				$('#simple-table > thead > tr > th input[type=checkbox]').eq(0).on('click', function(){
					var th_checked = this.checked;//checkbox inside "TH" table header
					
					$(this).closest('table').find('tbody > tr').each(function(){
						var row = this;
						if(th_checked) $(row).addClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', true);
						else $(row).removeClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', false);
					});
				});
				
				//select/deselect a row when the checkbox is checked/unchecked
				$('#simple-table').on('click', 'td input[type=checkbox]' , function(){
					var $row = $(this).closest('tr');
					if($row.is('.detail-row ')) return;
					if(this.checked) $row.addClass(active_class);
					else $row.removeClass(active_class);
				});
			
				
				/********************************/
				//add tooltip for small view action buttons in dropdown menu
				$('[data-rel="tooltip"]').tooltip({placement: tooltip_placement});
				
				//tooltip placement on right or left
				function tooltip_placement(context, source) {
					var $source = $(source);
					var $parent = $source.closest('table')
					var off1 = $parent.offset();
					var w1 = $parent.width();
			
					var off2 = $source.offset();
					//var w2 = $source.width();
			
					if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) return 'right';
					return 'left';
				}
				
				/***************/
				$('.show-details-btn').on('click', function(e) {
					e.preventDefault();
					$(this).closest('tr').next().toggleClass('open');
					$(this).find(ace.vars['.icon']).toggleClass('fa-angle-double-down').toggleClass('fa-angle-double-up');
				});
				/***************/
				
				/**
				//add horizontal scrollbars to a simple table
				$('#simple-table').css({'width':'2000px', 'max-width': 'none'}).wrap('<div style="width: 1000px;" />').parent().ace_scroll(
				  {
					horizontal: true,
					styleClass: 'scroll-top scroll-dark scroll-visible',//show the scrollbars on top(default is bottom)
					size: 2000,
					mouseWheelLock: true
				  }
				).css('padding-top', '12px');
				*/
			})
		</script>
		<script> // 500 = 0,5 s
            $(document).ready(function(){setTimeout(function(){$(".pesan").fadeIn('slow');}, 500);});
            setTimeout(function(){$(".pesan").fadeOut('slow');}, 7000);
        </script>