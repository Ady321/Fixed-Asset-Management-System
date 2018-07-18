<?php
	require('../func/config.php');
	if(!$user->is_logged_in()){ header('Location: login'); }
        global $db;
	if(isset($_GET['id'])){
            $id = base64_decode($_GET['id']);
            $stmt = mysqli_query($db, "select u.job_title,u.dept_Id,u.user_Name,l.Location_name,a.quan,sc.Price,sc.warranty_end,sc.Purchase_date,sc.Supplier_date,sc.warranty_start,s.sup_Name,a.assetId,a.TagId,a.serial_no,c.cat_Name,c.Color,a.asset_name,m.manu_name,sc.Name,a.serial_no,ac.Conditions from users u,suppliers s,locations l,asset a,sub_category sc,asset_condition ac,category c,manufactures m where a.sup_id=s.sup_id and a.loc_id=l.loc_id and a.con_id=ac.con_id and sc.sub_id=a.sub_id and sc.category_Id=c.category_Id and m.manu_id=sc.manu_id and a.assetId='".$id."' and u.Id=a.Id");
            $row2 = mysqli_fetch_assoc($stmt);
    //if post does not exists redirect user.
        }

  $pagetitle ="View Asset";
	$activeParent = "active open";
	$activeViewAsset= "active";
	$activeAddAsset = "active open";
?>
  <?php include('includes/header.php');?>
			<div class="main-content">
				<div class="main-content-inner">
					<div class="breadcrumbs ace-save-state" id="breadcrumbs">
						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-home home-icon"></i>
								<a href="#">Home</a>
							</li>

							<li>
								<a href="#">Assets</a>
							</li>
							<li>
								<a href="#">My Assets</a>
							</li>
							<li class="active">View Asset</li>
						</ul><!-- /.breadcrumb -->

					<?php include('includes/nav-setings.php');
					?>

						<div class="page-header">
							<h1>
								<?php echo $row2['asset_name']; ?>
							</h1>
						</div><!-- /.page-header -->

						<div class="row">
                                                    <div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->

                                                                <div class="widget-box" style="width: 30%;">
									<div class="widget-header widget-header-blue widget-header-flat">
										<h4 class="widget-title lighter"> </h4>

									</div>

                                                                    <div class="widget-body" style="height: 690px;">
                                                                        <div class="widget-main" style="">
											<div id="fuelux-wizard-container">
												<div>
													<ul class="steps">
														<li data-step="1" class="active hidden">

														</li>

													</ul>
												</div>

												<div class="step-content pos-rel">
													<div class="step-pane active" data-step="1">
														<h3 class="lighter block green">Asset information</h3>
														<form class="form-horizontal" id="validation-form" method="get">

														<div class="vspace-6-sm"></div>
														<div class="step-content pos-rel col-sm-11 col-sm-offset-1 col-lg-offset-0 col-lg-12">
															<div class="row">
																<div class="tabbable">
																	

																	<div class="tab-content">
																		<div id="home" class="tab-pane fade in active">
                                                                                                                                                    <div class="form-group">
                                                                                                                                                        <table id="dynamic-table" class="table table-striped table-bordered table-hover" style="width: 90%;">
                                                                                                                                                            <tbody>
                                                                                                                                                            <tr><td><b>Tag Id</b></td>
                                                                                                                                                                <td><?php echo $row2['TagId']; ?></td></tr>
                                                                                                                                                            <tr><td><b>Serial Number</b></td>
                                                                                                                                                                <td><?php echo $row2['serial_no']; ?></td></tr>
                                                                                                                                                            <tr><td><b>Category</b></td>
                                                                                                                                                                <td><?php echo "<span class='lab1' style='background-color: #FFF;color: ".$row2['Color'].";border:1px solid ".$row2['Color']."'>" ?>
                                                                                                                                                                    <?php echo $row2['cat_Name'] ?>
                                                                                                                                                                    </span></td></tr>
                                                                                                                                                            <tr><td><b>Model Name</b></td>
                                                                                                                                                                <td><?php echo $row2['Name']; ?></td></tr>
                                                                                                                                                            <tr><td><b>Manufacture</b></td>
                                                                                                                                                                <td><?php echo $row2['manu_name']; ?></td></tr>
                                                                                                                                                            <tr><td><b>Condition</b></td>
                                                                                                                                                                <td><?php echo $row2['Conditions']; ?></td></tr>
                                                                                                                                                            <tr><td><b>Location</b></td>
                                                                                                                                                                <td><?php echo $row2['Location_name']; ?></td></tr>
                                                                                                                                                            <tr><td><b>Purchase Price</b></td>
                                                                                                                                                                <td>&#x20b9;<?php echo " ".$row2['Price']; ?></td></tr>
                                                                                                                                                            <tr><td><b>Quantity</b></td>
                                                                                                                                                                <td><?php echo $row2['quan']; ?></td></tr>
                                                                                                                                                            <tr><td><b>Purchase Date</b></td>
                                                                                                                                                                <td><?php echo date('jS M Y', strtotime($row2['Purchase_date'])); ?></td></tr>
                                                                                                                                                            <tr><td><b>Supplier</b></td>
                                                                                                                                                                <td><?php echo $row2['sup_Name']; ?></td></tr>
                                                                                                                                                            <tr><td><b>Supplier Date</b></td>
                                                                                                                                                                <td><?php echo date('jS M Y', strtotime($row2['Supplier_date'])); ?></td></tr>
                                                                                                                                                            <tr><td><b>Warranty Start</b></td>
                                                                                                                                                                <td><?php echo date('jS M Y', strtotime($row2['warranty_start'])); ?></td></tr>
                                                                                                                                                            <tr><td><b>Warranty Expiry</b></td>
                                                                                                                                                                <td><?php echo date('jS M Y', strtotime($row2['warranty_end'])); ?></td></tr>
                                                                                                                                                            <tr><td><b>Assigned User</b></td>
                                                                                                                                                                <td><?php echo $row2['user_Name']; ?></td></tr>
                                                                                                                                                            <tr><td><b>Title</b></td>
                                                                                                                                                                <td><?php echo $row2['job_title']; ?></td></tr>
                                                                                                                                                            <tr><td><b>Team</b></td>
                                                                                                                                                                <td><?php 
                                                                                                                                                                       $stmt2 = mysqli_query($db, "select Name from dept_teams where dept_Id='".$row2['dept_Id']."'");
                                                                                                                                                                       $row3 = mysqli_fetch_assoc($stmt2);
                                                                                                                                                                       echo $row3['Name']
                                                                                                                                                                ?></td></tr>
                                                                                                                                                            </tbody>
                                                                                                                                                        
                                                                                                                                                        </table>
                                                                                                                                                    </div>											
																	</div>
																</div>
															 </div>
															</div>
														</form>
													</div>


												</div>
											</div>

											<hr />
											<div class="wizard-actions center">

												<a class="btn btn-success btn-next" href="javascript:history.back()">
													<i class="ace-icon fa fa-arrow-left"></i>
													Back

												</a>
											</div>
										</div><!-- /.widget-main -->
									</div><!-- /.widget-body -->
								</div>
								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->

		</div><!-- /.main-container -->

		<!-- basic scripts -->

		<!--[if !IE]> -->
		<script src="../assets/js/jquery-2.1.4.min.js"></script>

		<!-- <![endif]-->

		<!--[if IE]>
<script src="../assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="../assets/js/bootstrap.min.js"></script>

		<!-- page specific plugin scripts -->
		<script src="../assets/js/wizard.min.js"></script>
		<script src="../assets/js/jquery.validate.min.js"></script>
		<script src="../assets/js/jquery-additional-methods.min.js"></script>
		<script src="../assets/js/bootbox.js"></script>
		<script src="../assets/js/jquery.maskedinput.min.js"></script>
		<script src="../assets/js/select2.min.js"></script>
		<script src="../assets/js/jquery.dataTables.min.js"></script>
		<script src="../assets/js/jquery.dataTables.bootstrap.min.js"></script>
		<script src="../assets/js/dataTables.buttons.min.js"></script>
		<script src="../assets/js/buttons.flash.min.js"></script>
		<script src="../assets/js/buttons.html5.min.js"></script>
		<script src="../assets/js/buttons.print.min.js"></script>
		<script src="../assets/js/buttons.colVis.min.js"></script>
		<script src="../assets/js/dataTables.select.min.js"></script>

		<!-- ace scripts -->
		<script src="../assets/js/ace-elements.min.js"></script>
		<script src="../assets/js/ace.min.js"></script>

		<!-- inline scripts related to this page -->
                <style>
                    .lab1{
                        text-align: center;
                        display: inline;
                        padding: .2em .6em .3em;
                        border-radius: .25em;
                    }
                </style>
		
	</body>
</html>
