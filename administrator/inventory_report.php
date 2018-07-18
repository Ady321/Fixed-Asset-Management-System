<?php
	require('../func/config.php');
	if(!$user->is_logged_in()){ header('Location: login'); }
        global $db;
	$pagetitle ="Report Generation";
	$activeReport = "active open";
	$activeInventoryReport= "active";
//	$activeAddAsset = "active open";

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
								<a href="#">Reports</a>
							</li>
							<li class="active">Inventory Reports</li>
						</ul><!-- /.breadcrumb -->

					<?php include('includes/nav-setings.php');?>

						<div class="page-header">
							<h1>
								Generate Inventory Report

							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
                                                            <p>Report By Location</p>
                                                            <select name="byLocation" id="byLocation">
                                                                <option selected value="">--Select Location--</option>
                                                                <?php
                                                                   $stmt = mysqli_query($db,"select * from Locations");
                                                                   while ($row= mysqli_fetch_assoc($stmt)){
                                                                ?>
                                                                <option value="<?php echo $row['loc_id']; ?>"><?php echo $row['Location_name']; ?></option>
                                                                <?php
                                                                   }
                                                                ?>
                                                            </select>
								<!-- PAGE CONTENT BEGINS -->
							 <!-- PAGE CONTENT ENDS -->
							<!-- /.col -->
                                                        
                                                        </div>
                                                    <div class="col-xs-12" style="margin-top: 5px;">
                                                            <p>Report By Condition</p>
                                                            <select name="byCondition" id="byCondition">
                                                                <option selected value="">--Select Conditon--</option>
                                                                <?php
                                                                   $stmt = mysqli_query($db,"select * from asset_condition");
                                                                   while ($row= mysqli_fetch_assoc($stmt)){
                                                                ?>
                                                                <option value="<?php echo $row['con_id']; ?>"><?php echo $row['Conditions']; ?></option>
                                                                <?php
                                                                   }
                                                                ?>
                                                            </select>
								<!-- PAGE CONTENT BEGINS -->
							 <!-- PAGE CONTENT ENDS -->
							<!-- /.col -->
                                                        
                                                        </div>
                                                    <div class="col-xs-12" style="margin-top: 5px;">
                                                            <p>Report For all Asset</p>
                                                            <button type="button" class="btn btn-success pull-left" name="byAsset" id="byAsset">Generate Data</button>
								<!-- PAGE CONTENT BEGINS -->
							 <!-- PAGE CONTENT ENDS -->
							<!-- /.col -->
                                                        
                                                        </div>
                                                    <div class="row" id="Generate">
                                                            <div class="col-xs-12" id="Report" style="margin-top: 2px;">
                                                           </div>
                                                            
                                                        </div>
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->
		</div><!-- /.main-container -->

		<!-- basic scripts -->

		<!--[if !IE]> -->
		<script src="../assets/js/jquery-2.1.4.min.js"></script>

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

		<script src="../assets/js/jquery-ui.min.js"></script>
		<script src="../assets/js/jquery.ui.touch-punch.min.js"></script>

		<!-- ace scripts -->
		<script src="../assets/js/ace-elements.min.js"></script>
		<script src="../assets/js/ace.min.js"></script>

		<!-- inline scripts related to this page -->
                
		
	</body>
</html>
<script>  
 $(document).ready(function(){  
      $('#byLocation').change(function(){  
           var location_id = $(this).val();  
           $.ajax({  
                url:"load_data.php",  
                method:"POST",  
                data:{location_id:location_id},  
                success:function(data){  
                     $('#Report').html(data);  
                }  
           });  
      });
      $('#byLocation').change(function(){
         $('#s2').val(this.value);
         
      });
      $('#byCondition').change(function(){  
           var condition_id = $(this).val();  
           $.ajax({  
                url:"loadDataCondition.php",  
                method:"POST",  
                data:{condition_id:condition_id},  
                success:function(data){  
                     $('#Report').html(data);  
                }  
           });  
      });
      $('#byCondition').change(function(){
         $('#s2').val(this.value);
         
      });
      
      $('#byAsset').click(function(){  
           var byAsset = $(this).val();  
           $.ajax({  
                url:"loadDataAll.php",  
                method:"POST",  
                data:{byAsset:byAsset},  
                success:function(data){  
                     $('#Report').html(data);  
                }  
           });  
      });
      
 });  
 </script>
 
 
