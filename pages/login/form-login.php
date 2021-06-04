<div class="page-header">
	<h1>Home<small> <i class="ace-icon fa fa-angle-double-right"></i> Login 
		<?php
			if (isset($_SESSION['pesan']) && $_SESSION['pesan'] <> '') {
				echo "<small class='pesan'>&nbsp; <i class='ace-icon fa fa-bell icon-animated-bell bigger-100 orange'></i>&nbsp; ".$_SESSION['pesan']."</small>";
			}
			$_SESSION['pesan'] ="";
		?></small>
	</h1>
</div>
<div class="row">
	<div class="col-sm-10 col-sm-offset-1">
		<div class="login-container">
			<div class="center">
				<h1><i class="ace-icon fa fa-inbox"></i><span class="blue"> SIMPEG</span> DISPORA KALTENG</h1>
			</div>
			<div class="position-relative">
				<div class="login-box visible widget-box no-border">
					<div class="widget-body">
						<div class="widget-main">
							<h4 class="header blue lighter bigger"><i class="ace-icon fa fa-coffee orange"></i> Login To Access Your Autorization</h4>
							<div class="space-6"></div>
							<form action="index.php?page=login&op=in" method="POST">
								<fieldset>
									<div class="col-sm-4">
										<div>
											<img src="assets/images/avatars/logo.png" width="110" height="110" />
										</div>
										<div class="space-4"></div>
									</div>
									<div class="col-sm-8">
										<label class="block clearfix">
											<span class="block input-icon input-icon-right">
												<input type="text" name="id_user" maxlength="64" class="form-control" placeholder="Username" /><i class="ace-icon fa fa-user"></i>
											</span>
										</label>
										<label class="block clearfix">
											<span class="block input-icon input-icon-right">
												<input type="password" name="password" maxlength="255" class="form-control" placeholder="Password" /><i class="ace-icon fa fa-lock"></i>
											</span>
										</label>
										<div class="space"></div>
										<div class="clearfix">
											<label class="inline">
												<input type="checkbox" class="ace" /><span class="lbl"> Remember Me</span>
											</label>
											<button type="submit" class="width-35 pull-right btn btn-sm btn-primary"><i class="ace-icon fa fa-key"></i><span class="bigger-110"> Login</span></button>
										</div>
										<div class="space-4"></div>
									</div>
								</fieldset>
							</form>
							<div class="social-or-login center">
								<span class="bigger-110"><i class="ace-icon fa fa-cog icon-animated-vertical"></i></span>
							</div>
							<div class="space-6"></div>	
							
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