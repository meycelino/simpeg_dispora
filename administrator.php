<?php
ob_start();
session_start();
if(!isset($_SESSION['id_user'])){
    die("<b>Oops!</b> Access Failed.
		<p>Sistem Logout. Anda harus melakukan Login kembali.</p>
		<button type='button' onclick=location.href='index.php'>Back</button>");
}
if($_SESSION['hak_akses']!="Administrator"){
    die("<b>Oops!</b> Access Failed.
		<p>Anda Bukan Administrator.</p>
		<button type='button' onclick=location.href='index.php'>Back</button>");
}

	include "config/koneksi.php";
	$tampilUsr	=mysql_query("SELECT * FROM tb_user WHERE id_user='$_SESSION[id_user]'");
	$usr		=mysql_fetch_array($tampilUsr);
	
	$tampilAll	=mysql_query("SELECT * FROM tb_user WHERE hak_akses!='Administrator' ORDER BY id_user");
	$jmlall		=mysql_num_rows($tampilAll);
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
					<a href="administrator.php" class="navbar-brand">
						<small><i class="fa fa-inbox"></i>&nbsp; Dinas Pemuda dan Olahraga Provinsi Kalimantan Tengah</small>
					</a>
				</div>
				<div class="navbar-buttons navbar-header pull-right" role="navigation">
					<ul class="nav ace-nav">
						<li class="purple dropdown-modal">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">
								<i class="ace-icon fa fa-user icon-animated-vertical"></i><span class="badge badge-primary"><?=$jmlall?></span>
							</a>
							<ul class="dropdown-menu-right dropdown-navbar dropdown-menu dropdown-caret dropdown-close">
								<li class="dropdown-header">
									<i class="ace-icon fa fa-user"></i> <?=$jmlall?> Admin
								</li>
								<li class="dropdown-content">
									<ul class="dropdown-menu dropdown-navbar">
										<?php
										while ($all=mysql_fetch_array($tampilAll)){
										?>
										<li>
											<a class="clearfix">
												<?php
												if (empty($all['avatar']))													
													echo "<img class='msg-photo' src='assets/images/avatars/no-avatar.jpg' />";
													else
													echo "<img class='msg-photo' src='assets/images/avatars/$all[avatar]' />";
												?>
												<span class="msg-body">
													<span class="msg-title">
														<span class="blue"><?php echo $all['nama_user'] ?></span><br />
														<span>Admin</span><br />
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
									<a href="administrator.php?page=form-view-data-user">See All Users <i class="ace-icon fa fa-arrow-right"></i></a>
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
								<li><a href="administrator.php?page=form-ganti-password&id_user=<?=$_SESSION['id_user']?>"><i class="ace-icon fa fa-key"></i>Change Password</a></li>
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
					<li class=""><a href="administrator.php"><i class="menu-icon fa fa-tachometer"></i><span class="menu-text"> Dashboard</span></a><b class="arrow"></b></li>
					<li class=""><a href="administrator.php?page=form-view-data-user"><i class="menu-icon fa fa-user"></i><span class="menu-text"> Management User</span></a><b class="arrow"></b></li>					
					<li class=""><a href="administrator.php?page=form-view-setup"><i class="menu-icon fa fa-gear"></i><span class="menu-text"> Setup</span></a><b class="arrow"></b></li>					
				</ul>
				<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
					<i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
				</div>
			</div>
			<div class="main-content">
				<div class="main-content-inner">
					<div class="breadcrumbs ace-save-state" id="breadcrumbs">
						<ul class="breadcrumb">
							<li><i class="ace-icon fa fa-home home-icon"></i><a href="administrator.php">Home</a></li>
							<li class="active">Administrator</li>
						</ul>
					</div>
					<div class="page-content">
						<br />
						
					
						<!-- /.content -->
						<?php
							$page = (isset($_GET['page']))? $_GET['page'] : "main";
							switch ($page) {
								case 'form-view-data-user': include "pages/administrator/user/form-view-data-user.php"; break;
								case 'form-master-data-user': include "pages/administrator/user/form-master-data-user.php"; break;
								case 'master-user': include "pages/administrator/user/master-user.php"; break;
								case 'form-edit-data-user': include "pages/administrator/user/form-edit-data-user.php"; break;
								case 'edit-data-user': include "pages/administrator/user/edit-data-user.php"; break;
								case 'delete-data-user': include "pages/administrator/user/delete-data-user.php"; break;
								
								case 'form-view-setup': include "pages/administrator/setup/form-view-setup.php"; break;
								case 'form-setup': include "pages/administrator/setup/form-setup.php"; break;
								case 'setup': include "pages/administrator/setup/setup.php"; break;								
								
								case 'form-ganti-password': include "pages/administrator/form-ganti-password.php"; break;
								case 'ganti-password': include "pages/administrator/ganti-password.php"; break;
								
								default : include 'dashboard.php';	
							}
						?>
						<br />
						
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