<?php
	require('../func/config.php');
	if(!$user->is_logged_in()){ header('Location: login'); }

        global $db;
  $pagetitle ="View Categories";
	$activeParent = "active open";
	$activeCatParent= "active open";
	$activeViewcategory = "active";
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
								<a href="#">Categories</a>
							</li>
							<li class="active">View Category</li>
						</ul><!-- /.breadcrumb -->

					<?php include('includes/nav-setings.php');?>

						<div class="page-header">
							<h1>
								Categories

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
											All available Categories
										</div>

										<!-- div.table-responsive -->

										<!-- div.dataTables_borderWrap -->
										<div>
											<table id="dynamic-table" class="table table-striped table-bordered table-hover" style="width: 102%; margin-left: -10px; margin-top: 1px !important; margin-bottom: 1px !important;" >
												<thead>
													<tr>
														
														<th>Category ID</th>
														<th>Category Name</th>
														<th>Manufacture</th>
														<th>Model Name</th>
														<th></th>
													</tr>
												</thead>

												<tbody>
												<?php
												$stmt = mysqli_query($db,"select sc.sub_Id,c.cat_Name,c.Color,sc.Name,m.manu_name from category c,sub_category sc,manufactures m WHERE c.category_Id=sc.category_Id and m.manu_id=sc.manu_id");
                                                                    
												while($row= mysqli_fetch_assoc($stmt))
                                                                                                {
              			   		//extract($row);
												 ?>
													<tr>
												

														<td><?php echo $row['sub_Id'] ?></td>
                                                                                                                <td>
                                                                                                                    <?php echo "<span class='lab1' style='background-color: #FFF;color: ".$row['Color'].";border:1px solid ".$row['Color']."'>" ?>
                                                                                                                    <?php echo $row['cat_Name'] ?>
                                                                                                                    </span>
                                                                                                                </td>
														<td><?php echo $row['manu_name'] ?></td>
														<td><?php echo $row['Name'] ?></td>


														<td>
															<div class="hidden-sm hidden-xs action-buttons">
																<a class="green" href="edit-category?id=<?php $key = base64_encode($row['sub_Id']); echo $key ?>">
																	<i class="ace-icon fa fa-pencil bigger-130"></i>
																</a>

																<a class="red delete_category" data-id="<?php echo $row['Id']; ?>" href="javascipt:void(0)">
																	<i class="ace-icon fa fa-trash-o bigger-130"></i>
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

		<!-- inline scripts related to this page -->
		<script type="text/javascript">

				$(document).ready(function(){

					$('.delete_category').click(function(e){

						e.preventDefault();

						var pid = $(this).attr('data-id');
						var parent = $(this).parent("td").parent("tr");

						bootbox.dialog({
							message: "Are you sure you want to Delete ?",
							title: "<i class='glyphicon glyphicon-trash'></i> Delete !",
							buttons: {
							success: {
								label: "No",
								className: "btn-success",
								callback: function() {
								 $('.bootbox').modal('hide');
								}
							},
							danger: {
								label: "Delete!",
								className: "btn-danger",
								callback: function() {


									$.post('../custom/deleteCategory.php', { 'delete':pid })
									.done(function(response){
										bootbox.alert(response);
										parent.fadeOut('slow');
										//rload page
										window.setTimeout(function(){
											location.reload()
										}, 3000)
									})
									.fail(function(){
										bootbox.alert('Something Went Wrog ....');
									})

								}
							}
							}
						});


					});

				});
		</script>
              
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