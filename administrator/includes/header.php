<?php
 if($_SESSION['Role']!="1"){

    header('Location: ../error-404.php');
  }
	?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title><?php echo $pagetitle ?> - Asset Manager</title>

		<meta name="description" content="and Validation" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="../assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="../assets/font-awesome/4.5.0/css/font-awesome.min.css" />

		<!-- page specific plugin styles -->
		<link rel="stylesheet" href="../assets/css/select2.min.css" />
		<link rel="stylesheet" href="../assets/css/jquery-ui.min.css" />
		<link rel="stylesheet" href="../assets/css/jquery-ui.custom.min.css" />
		<link rel="stylesheet" href="../assets/css/fullcalendar.min.css" />
		<link rel="stylesheet" href="../custom/styles.css" />
		<link rel="stylesheet" href="../assets/css/jquery-ui.custom.min.css" />
		<link rel="stylesheet" href="../assets/css/chosen.min.css" />
		<link rel="stylesheet" href="../assets/css/bootstrap-datepicker3.min.css" />
		<link rel="stylesheet" href="../assets/css/bootstrap-timepicker.min.css" />
		<link rel="stylesheet" href="../assets/css/daterangepicker.min.css" />
		<link rel="stylesheet" href="../assets/css/bootstrap-datetimepicker.min.css" />
		<link rel="stylesheet" href="../assets/css/bootstrap-colorpicker.min.css" />

		<link rel="stylesheet" href="../assets/css/jquery-ui.custom.min.css" />
		<link rel="stylesheet" href="../assets/css/jquery.gritter.min.css" />
		<link rel="stylesheet" href="../assets/css/select2.min.css" />

		<link rel="stylesheet" href="../assets/css/bootstrap-editable.min.css" />

		<!-- text fonts -->
		<link rel="stylesheet" href="../assets/css/fonts.googleapis.com.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="../assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

		<link rel="stylesheet" href="../assets/css/ace-skins.min.css" />
		<link rel="stylesheet" href="../assets/css/ace-rtl.min.css" />

		
		<script src="assets/js/ace-extra.min.js"></script>

	</head>

	<body class="no-skin">

		<div id="navbar" class="navbar navbar-default          ace-save-state">
			<div class="navbar-container ace-save-state" id="navbar-container">

				<div class="navbar-header pull-left">
					<a href="index" class="navbar-brand">
						<small>
							<i class="fa fa-desktop"></i>
							Asset Manager
						</small>
					</a>
				</div>
				<div class="navbar-buttons navbar-header pull-right" role="navigation">
					<ul class="nav ace-nav">
						<li class="light-blue dropdown-modal">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								
								<span class="user-info">
									<small>Welcome,</small>
									<?php echo $_SESSION["username"]; ?>
								</span>

								<i class="ace-icon fa fa-caret-down"></i>
							</a>

							<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">

								<li>
									<a href="my-profile">
										<i class="ace-icon fa fa-user"></i>
										Profile
									</a>
								</li>

								<li class="divider"></li>

								<li>
									<a href="../logout">
										<i class="ace-icon fa fa-power-off"></i>
										Logout
									</a>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</div><!-- /.navbar-container -->
		</div>

		<div class="main-container ace-save-state" id="main-container">
			<script type="text/javascript">
				try{ace.settings.loadState('main-container')}catch(e){}
			</script>

			<div id="sidebar" class="sidebar                  responsive                    ace-save-state">
				<script type="text/javascript">
					try{ace.settings.loadState('sidebar')}catch(e){}
				</script>

				<ul class="nav nav-list">
					<li class="">
						<a href="index">
							<i class="menu-icon fa fa-tachometer"></i>
							<span class="menu-text"> Dashboard </span>
						</a>

						<b class="arrow"></b>
					</li>

					<li class="<?php if(isset($activeParent)){echo $activeParent;} ?>">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-desktop"></i>
							<span class="menu-text">
								Assets
							</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<!--Start assets-->
							<li class="<?php if(isset($activeAddAsset)){echo $activeAddAsset;} ?>">
								<a href="#" class="dropdown-toggle">
									<i class="menu-icon fa fa-caret-right"></i>

									My Assets
									<b class="arrow fa fa-angle-down"></b>
								</a>

								<b class="arrow"></b>

								<ul class="submenu">
									<li class="<?php if(isset($activeAddasset)){echo $activeAddasset;} ?>">
										<a href="add-asset">
											<i class="menu-icon fa fa-caret-right"></i>
											Add Asset
										</a>

										<b class="arrow"></b>
									</li>

									<li class="<?php if(isset($activeViewAsset)){echo $activeViewAsset;} ?>">
										<a href="#" class="dropdown-toggle">
										<i class="menu-icon fa fa-caret-right"></i>

										View Asset
										<b class="arrow fa fa-angle-down"></b>
									</a>

										<b class="arrow"></b>
										<ul class="submenu">
				 					<li class="<?php if(isset($active_ViewAsset)){echo $active_ViewAsset;} ?>">
										<a href="view-asset">
											All Assets
										</a>

										<b class="arrow"></b>
									</li>
									
								</ul>
									</li>
								</ul>
							</li>
							<!--End Assets-->
							<!--Stert categories-->
							<li class="<?php if(isset($activeCatParent)){echo $activeCatParent;} ?>">
								<a href="#" class="dropdown-toggle">
									<i class="menu-icon fa fa-caret-right"></i>

									Categories
									<b class="arrow fa fa-angle-down"></b>
								</a>

								<b class="arrow"></b>

								<ul class="submenu">
									<li class="<?php if(isset($activeAddcategory)){echo $activeAddcategory;} ?>">
										<a href="add-category">
											<i class="menu-icon fa fa-caret-right"></i>
											Add category
										</a>

										<b class="arrow"></b>
									</li>

									<li class="<?php if(isset($activeViewcategory)){echo $activeViewcategory;} ?>">
										<a href="view-category">
											<i class="menu-icon fa fa-caret-right"></i>
											View category
										</a>

										<b class="arrow"></b>
									</li>
								</ul>
							</li>
							<!--End Categories-->

						</ul>
					</li>
					<li class="<?php if(isset($activevendorParent)){echo $activevendorParent;} ?>">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-user-plus"></i>
							<span class="menu-text"> Suppliers </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">

							<li class="<?php if(isset($activeAddvendor)){echo $activeAddvendor;} ?>">
								<a href="add-vendor">
									<i class="menu-icon fa fa-caret-right"></i>
									Add Supplier
								</a>

								<b class="arrow"></b>
							</li>

							<li class="<?php if(isset($activeviewVendor)){echo $activeviewVendor;} ?>">
								<a href="view-vendor">
									<i class="menu-icon fa fa-caret-right"></i>
									View Suppliers
								</a>

								<b class="arrow"></b>
							</li>

						</ul>
					</li>
					<li class="<?php if(isset($activeReport)){echo $activeReport;} ?>">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-bar-chart-o "></i>
							<span class="menu-text"> Reports </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">

							<li class="<?php if(isset($activeInventoryReport)){echo $activeInventoryReport;} ?>">
								<a href="inventory_report">
									<i class="menu-icon fa fa-caret-right"></i>
									Inventory Report
								</a>

								<b class="arrow"></b>
							</li>

						</ul>
					</li>
					<li class="<?php if(isset($activeregistrationusers)){echo $activeregistrationusers;} ?>">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-users"></i>
							<span class="menu-text"> Users </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">

							<li class="<?php if(isset($activereg)){echo $activereg;} ?>">
								<a href="registration-applications">
									<i class="menu-icon fa fa-caret-right"></i>
									View Apllicants
								</a>

								<b class="arrow"></b>
							</li>
						</ul>
					</li>
				</ul><!-- /.nav-list -->

			</div>
