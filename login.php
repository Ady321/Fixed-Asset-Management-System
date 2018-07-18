<?php
	require('func/config.php');
        
	if($user->is_logged_in()){
		header('Location: log');
  }
 ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		
		<title>Login</title>
		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="assets/font-awesome/4.5.0/css/font-awesome.min.css" />

		<!-- text fonts -->
		<link rel="stylesheet" href="assets/css/fonts.googleapis.com.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="assets/css/ace.min.css" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="assets/css/ace-part2.min.css" />
		<![endif]-->
		<link rel="stylesheet" href="assets/css/ace-rtl.min.css" />
	</head>

	<body class="login-layout login-layout light-login">
		<div class="main-container">
			<div class="main-content">
				<div class="row">
					<div class="col-sm-10 col-sm-offset-1">
						<div class="login-container">
							<div class="center">
								<h1>
									<span class="red">Asset</span>
									<span class="grey" id="id-text2">Manager</span>
								</h1>
								
							</div>

							<div class="space-6"></div>

							<div class="position-relative">
								<div id="login-box" class="login-box visible widget-box no-border">
									<div class="widget-body">
										<div class="widget-main">
											<h4 class="header blue lighter bigger">
												Please Enter Your Information
											</h4>

											<div class="space-6"></div>
											<?php
							global $db;					//process login form if submitted
					            	if(isset($_POST['submit'])){

					            		$user_email = trim($_POST['user_email']);
					            		$password = trim($_POST['password']);

					            		if($user->login($user_email,$password))
					                {
					                  //check if account is activated
					                  //$stmt = $db->prepare('SELECT * FROM profilemaster WHERE Email = :user_email');
					                  //$stmt->execute(array(':user_email' => $user_email));
                                                          $stmt=mysqli_query($db,"select * from admin where email='".$user_email."'");
					                  while($row= mysqli_fetch_assoc($stmt)){
					                    //$status = $row['Status'];
                                                            $_SESSION["username"] = $row['Username'];
                                                            $_SESSION['usersfullname'] = $row['Name'];
                                                            $_SESSION["Role"] = $row['Role'];
                                                            $_SESSION["Id"] = $row['Id'];
					                  }
                                                          header('Location: log');
                                                          exit;
					        
                                                        }else {
					            			$message = '
					                  <div class="alert alert-danger">
					                      Wrong username or password.
					                  </div>
					                  ';
					            		}

					            	}//end of submit

					            	if(isset($message)){ echo $message; }
				            	?>
											<form action="" method="post">
												<fieldset>
													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="text" class="form-control" placeholder="Your email" name="user_email" value="<?php if(isset($_COOKIE["member_login"])) { echo $_COOKIE["member_login"]; } else if(isset($message)) { echo $_POST['user_email'];}?>" required=""/>
															
														</span>
													</label>

													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="password" class="form-control" placeholder="Your password" name="password" value="<?php if(isset($_COOKIE["member_password"])) { echo $_COOKIE["member_password"]; }else if(isset($message)) { echo $_POST['password'];} ?>" required="" />
															
														</span>
													</label>

													<div class="space"></div>

													<div class="clearfix">


														<button type="submit" name="submit" class="width-35 pull-right btn btn-sm btn-primary">
															
															<span class="bigger-110">Login</span>
														</button>
													</div>

													<div class="space-4"></div>
												</fieldset>
											</form>


										</div><!-- /.widget-main -->

										<!--<div class="toolbar clearfix">
											<div>
												<a href="forgot-password" class="forgot-password-link">
													<i class="ace-icon fa fa-arrow-left"></i>
													I forgot my password
												</a>
											</div>

											<div>
												<a href="register" class="user-signup-link">
													I want to register
													<i class="ace-icon fa fa-arrow-right"></i>
												</a>
											</div>
										</div> -->
									</div><!-- /.widget-body -->
								</div><!-- /.login-box -->
							<!--	<div class="center"><h2> <a href="index"><i class="ace-icon fa fa-home"></i></a><h2> </div>
							</div><!-- /.position-relative -->
						</div>
					</div><!-- /.col -->
				</div><!-- /.row -->
			</div><!-- /.main-content -->
		</div><!-- /.main-container -->

		<!-- basic scripts -->

		<!--[if !IE]> -->
		<script src="assets/js/jquery-2.1.4.min.js"></script>

		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>

		<!-- inline scripts related to this page -->
		<script type="text/javascript">
			jQuery(function($) {
			 $(document).on('click', '.toolbar a[data-target]', function(e) {
				e.preventDefault();
				var target = $(this).data('target');
				$('.widget-box.visible').removeClass('visible');//hide others
				$(target).addClass('visible');//show target
			 });
			});

		</script>
	</body>
</html>
