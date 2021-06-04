<?php	
	include "config/koneksi.php";
	$query	=mysql_query("SELECT * FROM tb_setup WHERE id_setup='1'");
	$data	=mysql_fetch_array($query);	
?>
	<div class="row">
		<div class="col-xs-12">
			<div class="space-6"></div>
			<div class="row">
				<div class="col-sm-10 col-sm-offset-1">
					<div class="widget-box transparent">
						<div class="widget-header widget-header-large">
							<h3 class="widget-title grey lighter"><i class="ace-icon fa fa-home orange"></i> Unit Kerja Aplikasi
								<?php
									if (isset($_SESSION['pesan']) && $_SESSION['pesan'] <> '') {
										echo "<small class='pesan'>&nbsp; <i class='ace-icon fa fa-bell icon-animated-bell bigger-100 orange'></i>&nbsp; ".$_SESSION['pesan']."</small>";
									}
									$_SESSION['pesan'] ="";
								?>
							</h3>
							<div class="widget-toolbar no-border invoice-info">
							</div>
							<div class="widget-toolbar hidden-480">
								<a href="administrator.php?page=form-setup&id_setup=<?=$data['id_setup']?>" title="setup"><i class="ace-icon fa fa-gear"></i> Setup</a>
							</div>
						</div>
						<div class="widget-body">
							<div class="widget-main padding-24">
								<div class="row">
									<div class="profile-user-info profile-user-info-striped">
										<div class="profile-info-row">
											<div class="profile-info-name">Unit Kerja</div>
											<div class="profile-info-value">
												<span class="editable"><?=$data['unit']?></span>
											</div>
										</div>
										<div class="profile-info-row">
											<div class="profile-info-name">Kabupaten / Kota</div>
											<div class="profile-info-value">
												<span class="editable"><?=$data['kab']?></span>
											</div>
										</div>
										<div class="profile-info-row">
											<div class="profile-info-name">Alamat</div>
											<div class="profile-info-value">
												<span class="editable"><?=$data['alamat']?></span>
											</div>
										</div>
										<div class="profile-info-row">
											<div class="profile-info-name">Kepala Unit</div>
											<div class="profile-info-value">
												<span class="editable"><?php
													$kepala	=mysql_query("SELECT * FROM tb_pegawai WHERE id_peg='$data[kepala]'");
													$kep	=mysql_fetch_array($kepala);
													echo $kep['nama']?>
												</span>
											</div>
										</div>
										<div class="profile-info-row">
											<div class="profile-info-name">NIP</div>
											<div class="profile-info-value">
												<span class="editable"><?=$kep['nip']?></span>
											</div>
										</div>
									</div>
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