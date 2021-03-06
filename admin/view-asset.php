<?php
	require('../func/config.php');
	if(!$user->is_logged_in()){ header('Location: login'); }

global $db;
  $pagetitle ="View Assets";
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

					<?php include('includes/nav-setings.php');?>

						<div class="page-header">
							<h1>
								View Assets

							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->

								<div class="row">
									<div class="col-xs-12">
										<div class="clearfix">
											<div class="pull-right tableTools-container"></div>
										</div>

										<div class="table-header">
											All available Assets
										</div>

										<!-- div.table-responsive -->

										<!-- div.dataTables_borderWrap -->
										<div>
											<table id="dynamic-table" class="table table-striped table-bordered table-hover" style="width: 102%; margin-left: -10px; margin-top: 1px !important; margin-bottom: 1px !important;">
												<thead>
													<tr>
                                                                                                                <th>Tag Id</th>
														<th>Category</th>
														<th>Asset Name</th>
														<th>Model</th>
														<th>Serial Number</th>
														<th>Condition</th>
                                                                                                                <th>Assigned User</th>
														<th></th>
													</tr>
												</thead>

												<tbody>
												<?php
												$stmt = mysqli_query($db,"select u.user_Name,a.assetId,a.TagId,c.cat_Name,c.Color,a.asset_name,m.manu_name,sc.Name,a.serial_no,ac.Conditions from asset a,sub_category sc,asset_condition ac,category c,manufactures m,users u where u.Id=a.Id and a.con_id=ac.con_id and sc.sub_id=a.sub_id and sc.category_Id=c.category_Id and m.manu_id=sc.manu_id"); 
												
												while($row = mysqli_fetch_assoc($stmt))
              		  		{
              			   		//extract($row);
												 ?>
													<tr>
														

														<td><?php echo $row['TagId']; ?></td>
														<td><?php echo "<span class='lab1' style='background-color: #FFF;color: ".$row['Color'].";border:1px solid ".$row['Color']."'>" ?>
                                                                                                                    <?php echo $row['cat_Name'] ?>
                                                                                                                    </span></td>
														<td><?php echo $row['asset_name']; ?></td>
														<td><?php echo $row['manu_name']." ".$row['Name']; ?></td>
														<td><?php echo $row['serial_no']; ?></td>
                                                                                                                <td><?php echo $row['Conditions'] ?></td>
                                                                                                                <td><?php echo $row['user_Name']; ?></td>

														<td>
															<div class="hidden-sm hidden-xs action-buttons">
																<a class="blue" href="view-single-asset?id=<?php $key = base64_encode($row['assetId']); echo $key; ?>" title="View More">
																	<i class="ace-icon fa fa-search-plus bigger-130"></i>
																</a>
                                                                                                                                <a class="green" href="edit-asset?id=<?php $key = base64_encode($row['assetId']); echo $key; ?>" title="Edit Item">
																	<i class="ace-icon fa fa-pencil bigger-130"></i>
																</a>
                                                                    
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
		<script src="../assets/js/jquery.dataTables.min.js"></script>
		<script src="../assets/js/jquery.dataTables.bootstrap.min.js"></script>
		<script src="../assets/js/dataTables.buttons.min.js"></script>
		<script src="../assets/js/buttons.flash.min.js"></script>
		<script src="../assets/js/buttons.html5.min.js"></script>
		<script src="../assets/js/buttons.print.min.js"></script>
		<script src="../assets/js/buttons.colVis.min.js"></script>
		<script src="../assets/js/dataTables.select.min.js"></script>
		<script src="../assets/js/bootbox.js"></script>

		<!-- ace scripts -->
		<script src="../assets/js/ace-elements.min.js"></script>
		<script src="../assets/js/ace.min.js"></script>

                 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
           <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>            
           <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />  
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
<script>
 $(document).ready(function(){  
      $('#dynamic-table').DataTable();  
 });  
 </script> 