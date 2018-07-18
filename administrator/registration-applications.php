<?php
	require('../func/config.php');
	if(!$user->is_logged_in()){ header('Location: login'); }

  $pagetitle ="Registration Entries";
	$activeregistrationusers = "active open";
	$activereg = "active";
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
							<li class="active">Gallery</li>
						</ul><!-- /.breadcrumb -->

						<?php include('includes/nav-setings.php');?>

							<div class="page-header">
								<h1>
									Registration Applicants

								</h1>
							</div><!-- /.page-header -->
                                                        <button class="pull1" onclick="myFunction()">Add New User</button>
							<div class="row">
								<div class="col-xs-12">
									<!-- PAGE CONTENT BEGINS -->

									<div class="row">
										<div class="col-xs-12">
											<div class="clearfix">
												<div class="pull-right tableTools-container"></div>
											</div>

											<div class="table-header">
												All available applicants
											</div>

											<!-- div.table-responsive -->

											<!-- div.dataTables_borderWrap -->
											<div>
                                                                                            <table id="dynamic-table" class="table table-striped table-bordered table-hover" style="width: 102%; margin-left: -10px; margin-top: 1px !important; margin-bottom: 1px !important;">
													<thead>
													<tr>
														
														<th>Id</th>
                                                                                                                <th>Name</th>
														<th>Email Address</th>
                                                                                                                <th>Job Title</th>
                                                                                                                <th>Team</th>
                                                                                                                <th>Mobile Number</th>
                                                                                                                <th>Date Registerd</th>
														<th></th>
													</tr>
												</thead>

												<tbody>
												<?php
												$stmt = mysqli_query($db, "select * from users order by Id desc");
												while($row = mysqli_fetch_assoc($stmt))
												{
													//extract($row);
												 ?>
													<tr>
														

														<td><?php echo $row['Id'] ?></td>
														<td><?php echo $row['user_Name'] ?></td>
														<td><?php echo $row['Email'] ?></td>
														<td><?php echo $row['job_title'] ?></td>
														<td><?php 
                                                                                                                         $qry = mysqli_query($db, "select Name from dept_teams where dept_Id='".$row['dept_Id']."'");
                                                                                                                         $row2 = mysqli_fetch_row($qry);
                                                                                                                         echo $row2[0]
                                                                                                                                 ?></td>
                                                                                                                <td><?php echo $row['Mob_no'] ?></td>
                                                                                                                 <td><?php echo date('jS M Y', strtotime($row['date'])) ?></td>
                                                                                                                 
														<td>
															<div class="hidden-sm hidden-xs btn-group">

																<a class="blue" href="view-assigned.php?id=<?php $key = base64_encode($row['Id']); echo $key; ?>" title="View More">
																	<i class="ace-icon fa fa-search-plus bigger-130"></i>
																</a>
                                                                                                                            <a style="margin-left: 10px" class="green" href="edit-user.php?id=<?php $key = base64_encode($row['Id']); echo $key ?>">
																	<i class="ace-icon fa fa-pencil bigger-130"></i>
																</a>
                                                                                                                            <a style="margin-left: 10px" class="delbutton" id="<?php echo $row['Id']; ?>" href="#">
                                                                                                                                    <img src="../trash.png" style="background: #FFFFFF"/>
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
		<script type="text/javascript" src="../js/jquery.js"></script>
                <script type="text/javascript">
                $(function(){
                    $(".delbutton").click(function(){
                        var element=$(this);
                        var del_id = element.attr("id");
                        var info = 'id=' + del_id;
                        if(confirm("Sure you want to delete this update? There is NO undo!"))
                        {
                            $.ajax({
                            type: "POST",
                            url: "../custom/deleteUser.php",
                            data: info,
                            success: function(){
                                window.location = "registration-applications.php"; 
                            }
                            });
                            
                        }
                        return false;
                    });
                });
                </script>
	</body>
        <style>
                    .pull1{
                        background-color: #307ecc;
                        border: #367fa9;
                        color: white;
                        padding: 10px 10px;
                        text-align: center;
                        font-size: 13px;
                        cursor: pointer;
                        margin-left: 94%;
                        
                    }
                    .pull1:hover{
                        background-color: #0092ef;
                    }
                </style>
                <script>
                    function myFunction(){
                        window.location.href = 'addNewUser.php'; 
                    }
                </script>
         
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
           <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>            
           <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />  
</html>
<script>
 $(document).ready(function(){  
      $('#dynamic-table').DataTable();  
 });  
 </script>  
