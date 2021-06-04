<?php
ob_start();
session_start();
if(!isset($_SESSION['id_user'])){
    die("<b>Oops!</b> Access Failed.
		<p>Sistem Logout. Anda harus melakukan Login kembali.</p>
		<button type='button' onclick=location.href='index.php'>Back</button>");
}
if($_SESSION['hak_akses']!="Admin"){
    die("<b>Oops!</b> Access Failed.
		<p>Anda Bukan Admin.</p>
		<button type='button' onclick=location.href='index.php'>Back</button>");
}

	include "config/koneksi.php";
	$tampilUsr	=mysql_query("SELECT * FROM tb_user WHERE id_user='$_SESSION[id_user]'");
	$usr		=mysql_fetch_array($tampilUsr);
	
	$tampilPeg	=mysql_query("SELECT * FROM tb_pegawai");
	$jmlpeg		=mysql_num_rows($tampilPeg);
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Aplikasi Sistem Informasi Kepegawaian | Dinas Pemuda dan Olahraga Provinsi Kalimantan Tengah</title>
		<meta name="description" content="overview &amp; stats" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
		
		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="assets/font-awesome/4.5.0/css/font-awesome.min.css" />
		<!-- page specific plugin styles -->
		<link rel="stylesheet" href="assets/css/chosen.min.css" />
		<link rel="stylesheet" href="assets/css/bootstrap-datepicker3.min.css" />

		<!-- text fonts -->
		<link rel="stylesheet" href="assets/css/fonts.googleapis.com.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
		<![endif]-->
		<link rel="stylesheet" href="assets/css/ace-skins.min.css" />
		<link rel="stylesheet" href="assets/css/ace-rtl.min.css" />

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->

		<!-- inline styles related to this page -->

		<!-- ace settings handler -->
		<script src="assets/js/ace-extra.min.js"></script>
		<script src="assets/js/jquery-2.1.4.min.js"></script>
		
		<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

		<!--[if lte IE 8]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
		<![endif]-->
	</head>

	<body class="skin-2">
		<div id="navbar" class="navbar navbar-default ace-save-state">
			<div class="navbar-container ace-save-state" id="navbar-container">
				<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
					<span class="sr-only">Toggle sidebar</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<div class="navbar-header pull-left">
					<a href="home-admin.php" class="navbar-brand">
						<small><i class="fa fa-inbox"></i>&nbsp; Dinas Pemuda dan Olahraga Provinsi Kalimantan Tengah</small>
					</a>
				</div>
				<div class="navbar-buttons navbar-header pull-right" role="navigation">
					<ul class="nav ace-nav">
						<li class="purple dropdown-modal">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">
								<i class="ace-icon fa fa-user icon-animated-vertical"></i><span class="badge badge-primary"><?=$jmlpeg?></span>
							</a>
							<ul class="dropdown-menu-right dropdown-navbar dropdown-menu dropdown-caret dropdown-close">
								<li class="dropdown-header">
									<i class="ace-icon fa fa-user"></i> <?=$jmlpeg?> Pegawai
								</li>
								<li class="dropdown-content">
									<ul class="dropdown-menu dropdown-navbar">
										<?php
										while ($peg=mysql_fetch_array($tampilPeg)){
										?>
										<li>
											<a class="clearfix">
												<?php
												if (empty($peg['foto']))
													if ($peg['jk'] == "Laki-laki"){
														echo "<img class='msg-photo' src='assets/foto/no-foto-male.png' />";
													}
													else{
														echo "<img class='msg-photo' src='assets/foto/no-foto-female.png' />";
													}
													else
													echo "<img class='msg-photo' src='assets/foto/$peg[foto]' />";
												?>
												<span class="msg-body">
													<span class="msg-title">
														<span class="blue"><?php echo $peg['nip'] ?></span><br /><?php echo $peg['nama'] ?><br />Status: <?php echo $peg['status_kepeg'] ?>
													</span>
												</span>
											</a>
										</li>
										<?php
										}
										?>
									</ul>
								</li>
								<li class="dropdown-footer center">
									<a href="home-admin.php?page=form-view-data-pegawai">See All Pegawai <i class="ace-icon fa fa-arrow-right"></i></a>
								</li>
							</ul>
						</li>
						<li class="light-orange dropdown-modal">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								<?php
									if (empty($usr['avatar']))													
										echo "<img class='nav-user-photo' src='assets/images/avatars/no-avatar.jpg' />";
										else
										echo "<img class='nav-user-photo' src='assets/images/avatars/$usr[avatar]' />";
								?>
								<span class="user-info"><small>Welcome,</small> <?=$usr['nama_user']?>
								</span>
								<i class="ace-icon fa fa-caret-down"></i>
							</a>
							<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
								<li><a href="home-admin.php?page=form-ganti-password&id_user=<?=$_SESSION['id_user']?>"><i class="ace-icon fa fa-key"></i>Change Password</a></li>
								<li class="divider"></li>
								<li>
									<a href="pages/login/logout.php"><i class="ace-icon fa fa-power-off"></i>Logout</a>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="main-container ace-save-state" id="main-container">
			<script type="text/javascript">
				try{ace.settings.loadState('main-container')}catch(e){}
			</script>
			<div id="sidebar" class="sidebar responsive ace-save-state">
				<script type="text/javascript">
					try{ace.settings.loadState('sidebar')}catch(e){}
				</script>
				<div class="sidebar-shortcuts" id="sidebar-shortcuts">
					<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
						<button class="btn btn-success"><i class="ace-icon fa fa-signal"></i></button>
						<button class="btn btn-info"><i class="ace-icon fa fa-pencil"></i></button>
						<button class="btn btn-warning"><i class="ace-icon fa fa-user"></i></button>
						<button class="btn btn-danger"><i class="ace-icon fa fa-cogs"></i></button>
					</div>
					<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
						<span class="btn btn-success"></span>
						<span class="btn btn-info"></span>
						<span class="btn btn-warning"></span>
						<span class="btn btn-danger"></span>
					</div>
				</div>
				<ul class="nav nav-list">
					<li class=""><a href="home-admin.php"><i class="menu-icon fa fa-tachometer"></i><span class="menu-text"> Dashboard</span></a><b class="arrow"></b></li>
					<li class=""><a href="home-admin.php?page=form-view-data-pegawai"><i class="menu-icon fa fa-user"></i><span class="menu-text"> Data Pegawai</span></a><b class="arrow"></b></li>					
					<li class="">
						<a href="#" class="dropdown-toggle"><i class="menu-icon fa fa-male"></i><span class="menu-text"> Riwayat Keluarga</span><b class="arrow fa fa-angle-down"></b></a><b class="arrow"></b>
						<ul class="submenu">
							<li class=""><a href="home-admin.php?page=form-master-data-si"><i class="menu-icon fa fa-caret-right"></i> Suami / Istri</a></li>
							<li class=""><a href="home-admin.php?page=form-master-data-anak"><i class="menu-icon fa fa-caret-right"></i> Anak</a></li>
							<li class=""><a href="home-admin.php?page=form-master-data-ortu"><i class="menu-icon fa fa-caret-right"></i> Orang Tua</a></li>
						</ul>
					</li>
					<li class="">
						<a href="#" class="dropdown-toggle"><i class="menu-icon fa fa-graduation-cap"></i><span class="menu-text"> Riwayat Pendidikan</span><b class="arrow fa fa-angle-down"></b></a><b class="arrow"></b>
						<ul class="submenu">
							<li class=""><a href="home-admin.php?page=form-master-data-sekolah"><i class="menu-icon fa fa-caret-right"></i> Sekolah</a></li>
							<li class=""><a href="home-admin.php?page=form-master-data-bahasa"><i class="menu-icon fa fa-caret-right"></i> Bahasa</a></li>
						</ul>
					</li>
					<li class="">
						<a href="#" class="dropdown-toggle"><i class="menu-icon fa fa-bars"></i><span class="menu-text"> Kepegawaian</span><b class="arrow fa fa-angle-down"></b></a><b class="arrow"></b>
						<ul class="submenu">
							<li class=""><a href="home-admin.php?page=form-master-data-jabatan"><i class="menu-icon fa fa-caret-right"></i> Jabatan</a></li>
							<li class=""><a href="home-admin.php?page=form-master-data-pangkat"><i class="menu-icon fa fa-caret-right"></i> Pangkat</a></li>
							<li class=""><a href="home-admin.php?page=form-master-data-hukuman"><i class="menu-icon fa fa-caret-right"></i> Hukuman</a></li>
							<li class=""><a href="home-admin.php?page=form-master-data-diklat"><i class="menu-icon fa fa-caret-right"></i> Diklat</a></li>
							<li class=""><a href="home-admin.php?page=form-master-data-penghargaan"><i class="menu-icon fa fa-caret-right"></i> Penghargaan</a></li>
							<li class=""><a href="home-admin.php?page=form-master-data-penugasan"><i class="menu-icon fa fa-caret-right"></i> Penugasan LN</a></li>
							<li class=""><a href="home-admin.php?page=form-master-data-seminar"><i class="menu-icon fa fa-caret-right"></i> Seminar</a></li>
							<li class=""><a href="home-admin.php?page=form-master-data-cuti"><i class="menu-icon fa fa-caret-right"></i> Cuti</a></li>
							<li class=""><a href="home-admin.php?page=form-master-data-lat-jabatan"><i class="menu-icon fa fa-caret-right"></i> Latihan Jabatan</a></li>
						</ul>
					</li>
					<li class=""><a href="home-admin.php?page=form-master-data-mutasi"><i class="menu-icon fa fa-exchange"></i><span class="menu-text"> Mutasi</span></a><b class="arrow"></b></li>					
					<li class=""><a href="home-admin.php?page=form-master-data-skp"><i class="menu-icon fa fa-briefcase"></i><span class="menu-text"> SKP</span></a><b class="arrow"></b></li>					
					<li class="">
						<a href="#" class="dropdown-toggle"><i class="menu-icon fa fa-calculator"></i><span class="menu-text"> Rekapitulasi</span><b class="arrow fa fa-angle-down"></b></a><b class="arrow"></b>
						<ul class="submenu">
							<li class=""><a href="home-admin.php?page=rekap-golongan"><i class="menu-icon fa fa-caret-right"></i> Golongan</a></li>
							<li class=""><a href="home-admin.php?page=rekap-jabatan"><i class="menu-icon fa fa-caret-right"></i> Jabatan</a></li>
							<li class=""><a href="home-admin.php?page=rekap-pendidikan"><i class="menu-icon fa fa-caret-right"></i> Pendidikan</a></li>
						</ul>
					</li>
					<li class="">
						<a href="#" class="dropdown-toggle"><i class="menu-icon fa fa-print"></i><span class="menu-text"> Report</span><b class="arrow fa fa-angle-down"></b></a><b class="arrow"></b>
						<ul class="submenu">
							<li class=""><a href="home-admin.php?page=nominatif"><i class="menu-icon fa fa-caret-right"></i> Nominatif</a></li>
							<li class=""><a href="home-admin.php?page=daftar-urut-kepangkatan"><i class="menu-icon fa fa-caret-right"></i> DUK</a></li>
							<li class=""><a href="home-admin.php?page=bezetting"><i class="menu-icon fa fa-caret-right"></i> Bezetting</a></li>
							<li class=""><a href="home-admin.php?page=keadaan-pegawai"><i class="menu-icon fa fa-caret-right"></i> Keadaan Pegawai</a></li>
							<li class=""><a href="home-admin.php?page=pre-pensiun"><i class="menu-icon fa fa-caret-right"></i> Pensiun</a></li>
						</ul>
					</li>
				</ul>
				<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
					<i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
				</div>
			</div>
			<div class="main-content">
				<div class="main-content-inner">
					<div class="breadcrumbs ace-save-state" id="breadcrumbs">
						<ul class="breadcrumb">
							<li><i class="ace-icon fa fa-home home-icon"></i><a href="home-admin.php">Home</a></li>
							<li class="active">Admin</li>
						</ul>
					</div>
					<div class="page-content">
						<br />
						
						
						<!-- /.content -->
						<?php
							$page = (isset($_GET['page']))? $_GET['page'] : "main";
							switch ($page) {
								case 'form-view-data-pegawai': include "pages/admin/pegawai/form-view-data-pegawai.php"; break;
								case 'form-master-data-pegawai': include "pages/admin/pegawai/form-master-data-pegawai.php"; break;
								case 'master-data-pegawai': include "pages/admin/pegawai/master-data-pegawai.php"; break;
								case 'form-edit-data-pegawai': include "pages/admin/pegawai/form-edit-data-pegawai.php"; break;
								case 'edit-data-pegawai': include "pages/admin/pegawai/edit-data-pegawai.php"; break;
								case 'delete-data-pegawai': include "pages/admin/pegawai/delete-data-pegawai.php"; break;
								case 'detail-data-pegawai': include "pages/admin/pegawai/detail-data-pegawai.php"; break;
								case 'form-ganti-foto': include "pages/admin/pegawai/form-ganti-foto.php"; break;
								case 'ganti-foto': include "pages/admin/pegawai/ganti-foto.php"; break;
								
								case 'form-master-data-si': include "pages/admin/keluarga/si/form-master-data-si.php"; break;
								case 'master-data-si': include "pages/admin/keluarga/si/master-data-si.php"; break;
								case 'form-edit-data-si': include "pages/admin/keluarga/si/form-edit-data-si.php"; break;
								case 'edit-data-si': include "pages/admin/keluarga/si/edit-data-si.php"; break;
								case 'delete-data-si': include "pages/admin/keluarga/si/delete-data-si.php"; break;
								
								case 'form-master-data-anak': include "pages/admin/keluarga/anak/form-master-data-anak.php"; break;
								case 'master-data-anak': include "pages/admin/keluarga/anak/master-data-anak.php"; break;
								case 'form-edit-data-anak': include "pages/admin/keluarga/anak/form-edit-data-anak.php"; break;
								case 'edit-data-anak': include "pages/admin/keluarga/anak/edit-data-anak.php"; break;
								case 'delete-data-anak': include "pages/admin/keluarga/anak/delete-data-anak.php"; break;
								
								case 'form-master-data-ortu': include "pages/admin/keluarga/ortu/form-master-data-ortu.php"; break;
								case 'master-data-ortu': include "pages/admin/keluarga/ortu/master-data-ortu.php"; break;
								case 'form-edit-data-ortu': include "pages/admin/keluarga/ortu/form-edit-data-ortu.php"; break;
								case 'edit-data-ortu': include "pages/admin/keluarga/ortu/edit-data-ortu.php"; break;
								case 'delete-data-ortu': include "pages/admin/keluarga/ortu/delete-data-ortu.php"; break;
								
								case 'form-master-data-sekolah': include "pages/admin/pendidikan/sekolah/form-master-data-sekolah.php"; break;
								case 'master-data-sekolah': include "pages/admin/pendidikan/sekolah/master-data-sekolah.php"; break;
								case 'form-edit-data-sekolah': include "pages/admin/pendidikan/sekolah/form-edit-data-sekolah.php"; break;
								case 'edit-data-sekolah': include "pages/admin/pendidikan/sekolah/edit-data-sekolah.php"; break;
								case 'delete-data-sekolah': include "pages/admin/pendidikan/sekolah/delete-data-sekolah.php"; break;
								case 'set-pendidikan-akhir': include "pages/admin/pendidikan/sekolah/set-pendidikan-akhir.php"; break;
								
								case 'form-master-data-bahasa': include "pages/admin/pendidikan/bahasa/form-master-data-bahasa.php"; break;
								case 'master-data-bahasa': include "pages/admin/pendidikan/bahasa/master-data-bahasa.php"; break;
								case 'form-edit-data-bahasa': include "pages/admin/pendidikan/bahasa/form-edit-data-bahasa.php"; break;
								case 'edit-data-bahasa': include "pages/admin/pendidikan/bahasa/edit-data-bahasa.php"; break;
								case 'delete-data-bahasa': include "pages/admin/pendidikan/bahasa/delete-data-bahasa.php"; break;
								
								case 'form-master-data-jabatan': include "pages/admin/kepeg/jabatan/form-master-data-jabatan.php"; break;
								case 'master-data-jabatan': include "pages/admin/kepeg/jabatan/master-data-jabatan.php"; break;
								case 'form-edit-data-jabatan': include "pages/admin/kepeg/jabatan/form-edit-data-jabatan.php"; break;
								case 'edit-data-jabatan': include "pages/admin/kepeg/jabatan/edit-data-jabatan.php"; break;
								case 'delete-data-jabatan': include "pages/admin/kepeg/jabatan/delete-data-jabatan.php"; break;
								case 'set-jabatan-sekarang': include "pages/admin/kepeg/jabatan/set-jabatan-sekarang.php"; break;
								
								case 'masterjab': include "pages/admin/kepeg/jabatan/masterjab.php"; break;
								case 'form-edit-masterjab': include "pages/admin/kepeg/jabatan/form-edit-masterjab.php"; break;
								case 'edit-masterjab': include "pages/admin/kepeg/jabatan/edit-masterjab.php"; break;
								case 'delete-masterjab': include "pages/admin/kepeg/jabatan/delete-masterjab.php"; break;
								
								case 'masteresl': include "pages/admin/kepeg/jabatan/masteresl.php"; break;
								case 'form-edit-masteresl': include "pages/admin/kepeg/jabatan/form-edit-masteresl.php"; break;
								case 'edit-masteresl': include "pages/admin/kepeg/jabatan/edit-masteresl.php"; break;
								case 'delete-masteresl': include "pages/admin/kepeg/jabatan/delete-masteresl.php"; break;
								
								case 'form-master-data-pangkat': include "pages/admin/kepeg/pangkat/form-master-data-pangkat.php"; break;
								case 'master-data-pangkat': include "pages/admin/kepeg/pangkat/master-data-pangkat.php"; break;
								case 'form-edit-data-pangkat': include "pages/admin/kepeg/pangkat/form-edit-data-pangkat.php"; break;
								case 'edit-data-pangkat': include "pages/admin/kepeg/pangkat/edit-data-pangkat.php"; break;
								case 'delete-data-pangkat': include "pages/admin/kepeg/pangkat/delete-data-pangkat.php"; break;
								case 'set-pangkat-sekarang': include "pages/admin/kepeg/pangkat/set-pangkat-sekarang.php"; break;
								
								case 'mastergol': include "pages/admin/kepeg/pangkat/mastergol.php"; break;
								case 'form-edit-mastergol': include "pages/admin/kepeg/pangkat/form-edit-mastergol.php"; break;
								case 'edit-mastergol': include "pages/admin/kepeg/pangkat/edit-mastergol.php"; break;
								case 'delete-mastergol': include "pages/admin/kepeg/pangkat/delete-mastergol.php"; break;
								
								case 'form-master-data-hukuman': include "pages/admin/kepeg/hukum/form-master-data-hukuman.php"; break;
								case 'master-data-hukuman': include "pages/admin/kepeg/hukum/master-data-hukuman.php"; break;
								case 'form-edit-data-hukuman': include "pages/admin/kepeg/hukum/form-edit-data-hukuman.php"; break;
								case 'edit-data-hukuman': include "pages/admin/kepeg/hukum/edit-data-hukuman.php"; break;
								case 'delete-data-hukuman': include "pages/admin/kepeg/hukum/delete-data-hukuman.php"; break;
								
								case 'form-master-data-diklat': include "pages/admin/kepeg/diklat/form-master-data-diklat.php"; break;
								case 'master-data-diklat': include "pages/admin/kepeg/diklat/master-data-diklat.php"; break;
								case 'form-edit-data-diklat': include "pages/admin/kepeg/diklat/form-edit-data-diklat.php"; break;
								case 'edit-data-diklat': include "pages/admin/kepeg/diklat/edit-data-diklat.php"; break;
								case 'delete-data-diklat': include "pages/admin/kepeg/diklat/delete-data-diklat.php"; break;
								
								case 'form-master-data-penghargaan': include "pages/admin/kepeg/harga/form-master-data-penghargaan.php"; break;
								case 'master-data-penghargaan': include "pages/admin/kepeg/harga/master-data-penghargaan.php"; break;
								case 'form-edit-data-penghargaan': include "pages/admin/kepeg/harga/form-edit-data-penghargaan.php"; break;
								case 'edit-data-penghargaan': include "pages/admin/kepeg/harga/edit-data-penghargaan.php"; break;
								case 'delete-data-penghargaan': include "pages/admin/kepeg/harga/delete-data-penghargaan.php"; break;
								
								case 'form-master-data-penugasan': include "pages/admin/kepeg/tugas/form-master-data-penugasan.php"; break;
								case 'master-data-penugasan': include "pages/admin/kepeg/tugas/master-data-penugasan.php"; break;
								case 'form-edit-data-penugasan': include "pages/admin/kepeg/tugas/form-edit-data-penugasan.php"; break;
								case 'edit-data-penugasan': include "pages/admin/kepeg/tugas/edit-data-penugasan.php"; break;
								case 'delete-data-penugasan': include "pages/admin/kepeg/tugas/delete-data-penugasan.php"; break;
								
								case 'form-master-data-seminar': include "pages/admin/kepeg/seminar/form-master-data-seminar.php"; break;
								case 'master-data-seminar': include "pages/admin/kepeg/seminar/master-data-seminar.php"; break;
								case 'form-edit-data-seminar': include "pages/admin/kepeg/seminar/form-edit-data-seminar.php"; break;
								case 'edit-data-seminar': include "pages/admin/kepeg/seminar/edit-data-seminar.php"; break;
								case 'delete-data-seminar': include "pages/admin/kepeg/seminar/delete-data-seminar.php"; break;
								
								case 'form-master-data-cuti': include "pages/admin/kepeg/cuti/form-master-data-cuti.php"; break;
								case 'master-data-cuti': include "pages/admin/kepeg/cuti/master-data-cuti.php"; break;
								case 'form-edit-data-cuti': include "pages/admin/kepeg/cuti/form-edit-data-cuti.php"; break;
								case 'edit-data-cuti': include "pages/admin/kepeg/cuti/edit-data-cuti.php"; break;
								case 'delete-data-cuti': include "pages/admin/kepeg/cuti/delete-data-cuti.php"; break;
								
								case 'form-master-data-lat-jabatan': include "pages/admin/kepeg/latjab/form-master-data-lat-jabatan.php"; break;
								case 'master-data-lat-jabatan': include "pages/admin/kepeg/latjab/master-data-lat-jabatan.php"; break;
								case 'form-edit-data-lat-jabatan': include "pages/admin/kepeg/latjab/form-edit-data-lat-jabatan.php"; break;
								case 'edit-data-lat-jabatan': include "pages/admin/kepeg/latjab/edit-data-lat-jabatan.php"; break;
								case 'delete-data-lat-jabatan': include "pages/admin/kepeg/latjab/delete-data-lat-jabatan.php"; break;
								
								case 'form-master-data-mutasi': include "pages/admin/kepeg/mutasi/form-master-data-mutasi.php"; break;
								case 'master-data-mutasi': include "pages/admin/kepeg/mutasi/master-data-mutasi.php"; break;
								case 'form-edit-data-mutasi': include "pages/admin/kepeg/mutasi/form-edit-data-mutasi.php"; break;
								case 'edit-data-mutasi': include "pages/admin/kepeg/mutasi/edit-data-mutasi.php"; break;
								case 'delete-data-mutasi': include "pages/admin/kepeg/mutasi/delete-data-mutasi.php"; break;
								
								case 'form-master-data-skp': include "pages/admin/skp/form-master-data-skp.php"; break;
								case 'master-data-skp': include "pages/admin/skp/master-data-skp.php"; break;
								case 'form-edit-data-skp': include "pages/admin/skp/form-edit-data-skp.php"; break;
								case 'edit-data-skp': include "pages/admin/skp/edit-data-skp.php"; break;
								case 'delete-data-skp': include "pages/admin/skp/delete-data-skp.php"; break;
								case 'detail-data-skp': include "pages/admin/skp/detail-data-skp.php"; break;
								
								case 'rekap-golongan': include "pages/admin/rekap/rekap-golongan.php"; break;
								case 'rekap-jabatan': include "pages/admin/rekap/rekap-jabatan.php"; break;
								case 'rekap-pendidikan': include "pages/admin/rekap/rekap-pendidikan.php"; break;
								
								case 'daftar-urut-kepangkatan': include "pages/admin/report/daftar-urut-kepangkatan.php"; break;
								case 'bezetting': include "pages/admin/report/bezetting.php"; break;
								case 'keadaan-pegawai': include "pages/admin/report/keadaan-pegawai.php"; break;
								case 'nominatif': include "pages/admin/report/nominatif.php"; break;
								case 'pre-pensiun': include "pages/admin/report/pre-pensiun.php"; break;
								case 'pensiun': include "pages/admin/report/pensiun.php"; break;
								
								case 'form-ganti-password': include "pages/admin/form-ganti-password.php"; break;
								case 'ganti-password': include "pages/admin/ganti-password.php"; break;
								
								default : include 'dashboard.php';	
							}
						?>
						<br />
						<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
						<!-- Iklan Responsive -->
						<ins class="adsbygoogle"
							 style="display:block"
							 data-ad-client="ca-pub-5991913965502495"
							 data-ad-slot="6663988169"
							 data-ad-format="auto"></ins>
						<script>
						(adsbygoogle = window.adsbygoogle || []).push({});
						</script>
					</div>
				</div>
			</div>
			<div class="footer">
				<div class="footer-inner">
					<div class="footer-content">
						<span class="bigger-110">
							<a href="http://www.dispora.kalteng.go.id/" target="_blank">Dinas Pemuda dan Olahraga Provinsi Kalimantan Tengah</a> &copy; <?php date("Y"); ?>
						</span>
					</div>
				</div>
			</div>
			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
		</div>
		<!-- basic scripts -->
		<!--[if !IE]> -->
		<!-- <![endif]-->
		<!--[if IE]>
		<script src="assets/js/jquery-1.11.3.min.js"></script>
		<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="assets/js/bootstrap.min.js"></script>
		<!-- page specific plugin scripts -->
		<!--[if lte IE 8]>
		  <script src="assets/js/excanvas.min.js"></script>
		<![endif]-->
		<script src="assets/js/jquery-ui.custom.min.js"></script>
		<script src="assets/js/jquery.ui.touch-punch.min.js"></script>
		<script src="assets/js/jquery.easypiechart.min.js"></script>
		<script src="assets/js/jquery.sparkline.index.min.js"></script>
		<script src="assets/js/jquery.flot.min.js"></script>
		<script src="assets/js/jquery.flot.pie.min.js"></script>
		<script src="assets/js/jquery.flot.resize.min.js"></script>
		<!-- ace scripts -->
		<script src="assets/js/ace-elements.min.js"></script>
		<script src="assets/js/ace.min.js"></script>
		<!-- inline scripts related to this page -->
	</body>
</html>