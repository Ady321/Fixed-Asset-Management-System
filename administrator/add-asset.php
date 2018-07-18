
<?php
	require('../func/config.php');
	if(!$user->is_logged_in()){ header('Location: login'); }

        global $db;
        global $m1;
        $man='';
  $pagetitle ="Add asset";
	$activeParent = "active open";
	$activeAddAsset = "active open";
	$activeAddasset = "active";
        function random_num($size) {
            $alpha_key = '';
            $keys = range('A', 'Z');

            for ($i = 0; $i < 2; $i++) {
		$alpha_key .= $keys[array_rand($keys)];
            }

            $length = $size - 7;
            $key1='';
            $keys = range('a', 'z');
        
            for($i=0;$i<2;$i++){
                $key1.=$keys[array_rand($keys)];
            }

            $key = '';
            $key2 ='';
            $keys = range(0, 9);

            for ($i = 0; $i < $length; $i++) {
		$key .= $keys[array_rand($keys)];
            }
            for ($i = 0; $i < $length; $i++) {
		$key2 .= $keys[array_rand($keys)];
            }

            return "SY".$key .$key1.$key2.$alpha_key;
        }
        function randomString($length) {
            $str = "";
            $characters = array_merge(range('A','Z'), range('a','z'), range('0','9'));
            $max = count($characters) - 1;
            for ($i = 0; $i < $length; $i++) {
		$rand = mt_rand(0, $max);
		$str .= $characters[$rand];
            }
            return $str;
        }
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
							<li class="active">Add asset</li>
						</ul><!-- /.breadcrumb -->

					<?php include('includes/nav-setings.php');?>

						<div class="page-header">
							<h1>
								New Item Wizard
							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->

								<div class="widget-box">
									<div class="widget-header widget-header-blue widget-header-flat">

									</div>

									<div class="widget-body">
										<div class="widget-main">
											<div id="fuelux-wizard-container">
												<div>
													<ul class="steps">
														<li data-step="1" class="active">
															<span class="step">1</span>
															<span class="title">General Information</span>
														</li>

														<li data-step="2">
															<span class="step">2</span>
															<span class="title">Asset Information</span>
														</li>

														<li data-step="3">
															<span class="step">3</span>
															<span class="title">Finance Information</span>
														</li>

														<li data-step="4">
															<span class="step">4</span>
															<span class="title">Finish</span>
														</li>
													</ul>
												</div>

												<hr />

												<div class="step-content pos-rel">
													<div class="step-pane active" data-step="1">
														<h3 class="lighter block green">Enter the following information</h3>


														<form class="form-horizontal" id="general-information" method="POST">
															<div class="hr hr-dotted"></div>

                                                                                                                        <div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="AssetTag">Tag Id:</label>

																<div class="col-xs-12 col-sm-9">
																	<div class="clearfix">
                                                                                                                                            <input type="text" name="AssetTag" id="AssetTag" class="col-xs-12 col-sm-4" value="<?php echo random_num(10) ?>" disabled />
																	</div>
																</div>
															</div>

															<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="categories">AssetType:</label>

																<div class="col-xs-12 col-sm-9">
																	
<select name="categories" class="select1">
<option selected="selected">--Select Categories--</option>
<?php
	$stmt = mysqli_query($db,"select distinct(c.category_Id),c.cat_Name from category c,sub_category sc where sc.category_Id=c.category_Id");
	while($row= mysqli_fetch_assoc($stmt))
	{
		?>
        <option value="<?php echo $row['category_Id']; ?>"><?php echo $row['cat_Name']; ?></option>
        <?php
	} 
?>
</select>
																</div>
															</div>
															<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="manu">Manufacturer:</label>

																<div class="col-xs-12 col-sm-9">
<select name="manu" class="select3">
<option selected="selected">--Select Manufactures--</option>
</select>
<img src="../ajax-loader.gif" id="loding1"></img>
                                                                                                                                         
																</div>
															</div>

															<div class="space-2"></div>

															<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="model">Model:</label>

																<div class="col-xs-12 col-sm-9">
                                                
<select name="model" class="select4" id="s1">
<option selected="selected">--Select Model--</option>
</select>
<img src="../ajax-loader.gif" id="loding2"></img>

																</div>
															</div>

															<div class="space-2"></div>
														</form>
													</div>

													<div class="step-pane" data-step="2">
														<h3 class="lighter block green">Enter the following information</h3>

														<form class="form-horizontal" id="asset-information" method="get">
                                                                                                                    <div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="assetName">Asset Name:</label>

																<div class="col-xs-12 col-sm-9">
																	<div class="clearfix">
                                                                                                                                            <input type="text" name="assetName" id="assetName" class="col-xs-12 col-sm-4" value="" />
																	</div>
                                                                                                                                        
																</div>
															</div>
															<div class="hr hr-dotted"></div>
															<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="assetSerial">Serial Number:</label>

																<div class="col-xs-12 col-sm-9">
																	<div class="clearfix">
                                                                                                                                            <input type="text" name="assetSerial" id="assetSerial" class="col-xs-12 col-sm-4" value="<?php echo randomString(12) ?> " disabled />
																	</div>
																</div>
															</div>

															<div class="space-2"></div>


															<div class="space-2"></div>

															

															<div class="space-2"></div>

															<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="assetCondition">Condition:</label>

																<div class="col-xs-12 col-sm-9">
																	<select id="assetCondition" name="assetCondition" class="select2" data-placeholder="Click to Choose...">
																		<option value="">&nbsp;</option>
																		<?php
																			$stmt = mysqli_query($db,"select Con_id,Conditions from asset_condition order by Conditions asc");
																			while($row_Condition = mysqli_fetch_assoc($stmt) )
																			{
																				?>
																					<option value="<?php echo $row_Condition['Con_id']; ?>" > <?php echo $row_Condition['Conditions'];?></option>
																				<?php
																			}
																		 ?>
																	</select>
																</div>
															</div>
                                                                                                                        
                                                                                                                        <div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="assetLocation">Location:</label>

																<div class="col-xs-12 col-sm-9">
																	<select id="assetCondition" name="assetLocation" class="select2" data-placeholder="Click to Choose...">
																		<option value="">&nbsp;</option>
																		<?php
																			$stmt1 = mysqli_query($db,"select loc_id,Location_name from locations order by Location_name asc");
																			while($row_location = mysqli_fetch_assoc($stmt1) )
																			{
																				?>
																					<option value="<?php echo $row_location['loc_id']; ?>" > <?php echo $row_location['Location_name'];?></option>
																				<?php
																			}
																		 ?>
																	</select>
																</div>
															</div>
                                                                                                                        <div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="assetUser">Assigned User:</label>

																<div class="col-xs-12 col-sm-9">
																	<select id="assetUser" name="assetUser" class="select2" data-placeholder="Click to Choose...">
																		<option value="">&nbsp;</option>
																		<?php
																			$stmt11 = mysqli_query($db,"select Id,user_Name from users");
																			while($row_users = mysqli_fetch_assoc($stmt11) )
																			{
																				?>
																					<option value="<?php echo $row_users['Id']; ?>" > <?php echo $row_users['user_Name'];?></option>
																				<?php
																			}
																		 ?>
																	</select>
																</div>
															</div>

															<div class="space-2"></div>
                                                                                                                        <!--<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="warrantyStart">Warranty Start:</label>

																<div class="col-xs-12 col-lg-3 col-md-4 col-sm-4">
																	<div class="input-group input-group-sm">
                                                                                                                                            <input name ="warrantyStart" type="text" id="warrantyStart" class="form-control" value="<?php
                                                                                                                                                                                                                                       //$stmt3 = mysqli_query($db,"select warranty_start from sub_category where sub_Id='".$m1."'");
                                                                                                                                                                                                                                       //$row_st = mysqli_fetch_assoc($stmt3);
                                                                                                                                                                                                                                       //echo date('jS M Y', strtotime($row_st['warranty_start']));
                                                                                                                                                                                                                                       ?>" disabled />
																		
																	</div>
																</div>
															</div>-->

															<!--<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="warrantyExpiry">Warranty Expiry:</label>

																<div class="col-xs-12 col-lg-3 col-md-4 col-sm-4">
																	<div class="input-group input-group-sm">
																		<input name ="warrantyExpiry" type="text" id="warrantyExpiry" class="form-control" value="<?php
                                                                                                                                                                                                                                       //$stmt4 = mysqli_query($db,"select warranty_end from sub_category where sub_Id='".$_SESSION['model1']."'");
                                                                                                                                                                                                                                       //$row_en = mysqli_fetch_assoc($stmt4);
                                                                                                                                                                                                                                       //echo date('jS M Y', strtotime($row_en['warranty_end']));
                                                                                                                                                                                                                                       ?>" disabled />
																		
																	</div>
																</div>
															</div>-->
														</form>
													</div>

													<div class="step-pane" data-step="3">
														<h3 class="lighter block green">Enter the following information</h3>

														<form class="form-horizontal" id="finance-information" method="get">
															<div class="hr hr-dotted"></div>
															<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="assetSupplier">Supplier:</label>
																<div class="col-xs-12 col-sm-9">
																	<select id="assetSupplier" name="assetSupplier" class="select2" data-placeholder="Click to Choose...">
																		<option value="">&nbsp;</option>
																		<?php
																			$stmt11 = mysqli_query($db,"select sup_id,sup_Name from suppliers");
																			while($row_sup = mysqli_fetch_assoc($stmt11) )
																			{
																				?>
																		<option value="<?php echo $row_sup['sup_id']; ?>" > <?php echo $row_sup['sup_Name'];?></option>
																				<?php
																			}
																		 ?>
																	</select>
																</div>

															</div>

															<div class="space-2"></div>

															<!--<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="assetPurchasePrice">Purchase price:</label>

																<div class="col-xs-12 col-sm-9">
																	<div class="clearfix">
																		<input type="text" name="assetPurchasePrice" id="assetPurchasePrice" class="col-xs-12 col-sm-4" value="<?php
                                                                                                                                                                                                                                       //$stmt6 = mysqli_query($db,"select Price from sub_category where sub_Id='".$_SESSION['model1']."'");
                                                                                                                                                                                                                                       //$row_p = mysqli_fetch_assoc($stmt6); echo $row_p['Price']; ?>" disabled />
																	</div>
																</div>
															</div>-->

															<div class="space-2"></div>

															<!--<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="SupplierDate">Supplier Date:</label>

																<div class="col-xs-12 col-sm-9">
																	<div class="clearfix">
                                                                                                                                            <input type="text" name="SupplierDate" id="SupplierDate" class="col-xs-12 col-sm-4" value="<?php 
                                                                                                                                                            //$stmt42 = mysqli_query($db,"select Supplier_date from sub_category where sub_Id='".$_SESSION['model1']."'");
                                                                                                                                                            //$row_dt1 = mysqli_fetch_assoc($stmt42);
                                                                                                                                                            //echo date('jS M Y', strtotime($row_dt1['Supplier_date'])); ?>" disabled />
																	</div>
																</div>
															</div>-->



															<div class="space-2"></div>

															<!--<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="purchaseDate">Purchase Date:</label>

																<div class="col-xs-12 col-sm-9">
																	<div class="clearfix">
                                                                                                                                            <input name ="purchaseDate" type="text" id="purchaseDate" class="col-xs-12 col-sm-4" value="<?php 
                                                                                                                                                                       // $stmt41 = mysqli_query($db,"select Purchase_date from sub_category where sub_Id='".$_SESSION['model1']."'");
                                                                                                                                                                       // $row_dt = mysqli_fetch_assoc($stmt41);
                                                                                                                                                                       // echo date('jS M Y', strtotime($row_dt['Purchase_date'])); ?>" disabled />

																		
																	</div>
																</div>
															</div>-->
														</form>
													</div>

													<div class="step-pane" data-step="4">
														<div class="center">
															<h3 class="green">Congrats!</h3>
															Your asset information was entered succesfully! Click finish to save your date!
														</div>
													</div>
												</div>
											</div>

											<hr />
											<div class="wizard-actions">
												<button class="btn btn-prev">
													<i class="ace-icon fa fa-arrow-left"></i>
													Prev
												</button>

												<button class="btn btn-success btn-next" data-last="Finish">
													Next
													<i class="ace-icon fa fa-arrow-right icon-on-right"></i>
												</button>
											</div>
											<div id="dialog-success" class="hide">
												<p>
												Office Deleted successfully.
												</p>

											</div><!-- #dialog-message -->
										</div><!-- /.widget-main -->
									</div><!-- /.widget-body -->
								</div>
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
		<script src="../assets/js/jquery-ui.min.js"></script>
		<script src="../assets/js/jquery.ui.touch-punch.min.js"></script>

		<!-- ace scripts -->
		<script src="../assets/js/ace-elements.min.js"></script>
		<script src="../assets/js/ace.min.js"></script>

		<!-- inline scripts related to this page -->
		<script type="text/javascript">
			jQuery(function($) {

				$('[data-rel=tooltip]').tooltip();

				$('.select2').css('width','200px').select2({allowClear:true})
				.on('change', function(){
					$(this).closest('form').validate().element($(this));
				});

				//override dialog's title function to allow for HTML titles
				$.widget("ui.dialog", $.extend({}, $.ui.dialog.prototype, {
					_title: function(title) {
						var $title = this.options.title || '&nbsp;'
						if( ("title_html" in this.options) && this.options.title_html == true )
							title.html($title);
						else title.text($title);
					}
				}));


				var $validation = true;
				$('#fuelux-wizard-container')
				.ace_wizard({
					//step: 2 //optional argument. wizard will jump to step "2" at first
					//buttons: '.wizard-actions:eq(0)'
				})
				.on('actionclicked.fu.wizard' , function(e, info){
					if(info.step == 1 && $validation) {
						if(!$('#general-information').valid()) e.preventDefault();
					}else if(info.step == 2 && $validation) {
						if(!$('#asset-information').valid()) e.preventDefault();
					}else if(info.step == 3 && $validation) {
						if(!$('#finance-information').valid()) e.preventDefault();
					}
				})
				//.on('changed.fu.wizard', function() {
				//})
				.on('finished.fu.wizard', function(e) {
					$.post('../custom/addAsset.php',
				  {
				    AssetTag: $('[name=AssetTag]').val(),
                                    assetModel: $('[name=model]').val(), 
                                    assetSerial:  $('[name=assetSerial]').val(), 
                                    assetSupplier:  $('[name=assetSupplier]').val(),
                                    assetCondition:  $('[name=assetCondition]').val(), 
                                    assetLocation:  $('[name=assetLocation]').val(), 
                                    assetName:  $('[name=assetName]').val(),
                                    assetUser:  $('[name=assetUser]').val()
				  },
				  function(data){
						bootbox.dialog({
							message: data,
							buttons: {
								"success" : {
									"label" : "OK",
									"className" : "btn-sm btn-primary",
                                                                        
                                                                        
								}
							}
						});
                                                
          
				  });
                                  

				}).on('stepclick.fu.wizard', function(e){
					//e.preventDefault();//this will prevent clicking and selecting steps
				});


				//jump to a step
				/**
				var wizard = $('#fuelux-wizard-container').data('fu.wizard')
				wizard.currentStep = 3;
				wizard.setState();
				*/

				//determine selected step
				//wizard.selectedItem().step

				//documentation : http://docs.jquery.com/Plugins/Validation/validate

				$('#general-information').validate({
					errorElement: 'div',
					errorClass: 'help-block',
					focusInvalid: false,
					ignore: "",
					rules: {
						categories: {
							required: true

						},
						manu: {
							required: true

						},
						model: {
							required: true
						}
					},

					messages: {
                                                categories: "please select the asset type",
                                                manu: "please select the asset manufacture",
                                                model: "please select the aseet model"
						
					},


					highlight: function (e) {
						$(e).closest('.form-group').removeClass('has-info').addClass('has-error');
					},

					success: function (e) {
						$(e).closest('.form-group').removeClass('has-error');//.addClass('has-info');
						$(e).remove();
					},

					errorPlacement: function (error, element) {
						if(element.is('input[type=checkbox]') || element.is('input[type=radio]')) {
							var controls = element.closest('div[class*="col-"]');
							if(controls.find(':checkbox,:radio').length > 1) controls.append(error);
							else error.insertAfter(element.nextAll('.lbl:eq(0)').eq(0));
						}
						else if(element.is('.select1')) {
							error.insertAfter(element.siblings('[class*="select1-container"]:eq(0)'));
						}
                                                else if(element.is('.select3')) {
							error.insertAfter(element.siblings('[class*="select3-container"]:eq(0)'));
                                                }
                                                if(element.is('.select4')) {
							error.insertAfter(element.siblings('[class*="select4-container"]:eq(0)'));
                                                }
						else if(element.is('.chosen-select')) {
							error.insertAfter(element.siblings('[class*="chosen-container"]:eq(0)'));
						}
						else error.insertAfter(element.parent());
					},

					submitHandler: function (form) {
					},
					invalidHandler: function (form) {
					}
				});

				$('#asset-information').validate({
					errorElement: 'div',
					errorClass: 'help-block',
					focusInvalid: false,
					ignore: "",
					rules: {
						assetName: {
							required: true

						},
						assetUser: {
							required: true

						},
						assetLocation: {
							required: true
						},
						assetCondition: {
							required: true

						}
						
					},

					messages: {
						assetName: {
							required: "Please specify the asset's name"

						},
						assetUser: {
							required: "Please specify the asset User"
						},
						
						assetLocation: "Please specify the asset Location",
						assetCondition: "Please choose the asset's condition"
						
					},


					highlight: function (e) {
						$(e).closest('.form-group').removeClass('has-info').addClass('has-error');
					},

					success: function (e) {
						$(e).closest('.form-group').removeClass('has-error');//.addClass('has-info');
						$(e).remove();
					},

					errorPlacement: function (error, element) {
						if(element.is('input[type=checkbox]') || element.is('input[type=radio]')) {
							var controls = element.closest('div[class*="col-"]');
							if(controls.find(':checkbox,:radio').length > 1) controls.append(error);
							else error.insertAfter(element.nextAll('.lbl:eq(0)').eq(0));
						}
						else if(element.is('.select2')) {
							error.insertAfter(element.siblings('[class*="select2-container"]:eq(0)'));
						}
						else if(element.is('.chosen-select')) {
							error.insertAfter(element.siblings('[class*="chosen-container"]:eq(0)'));
						}
						else error.insertAfter(element.parent());
					},

					submitHandler: function (form) {
					},
					invalidHandler: function (form) {
					}
				});

				$('#finance-information').validate({
					errorElement: 'div',
					errorClass: 'help-block',
					focusInvalid: false,
					ignore: "",
					rules: {
						assetSupplier: {
							required: true

						}
					},

					messages: {
						
						assetSupplier: "Please choose the asset Supplier"
					},


					highlight: function (e) {
						$(e).closest('.form-group').removeClass('has-info').addClass('has-error');
					},

					success: function (e) {
						$(e).closest('.form-group').removeClass('has-error');//.addClass('has-info');
						$(e).remove();
					},

					errorPlacement: function (error, element) {
						if(element.is('input[type=checkbox]') || element.is('input[type=radio]')) {
							var controls = element.closest('div[class*="col-"]');
							if(controls.find(':checkbox,:radio').length > 1) controls.append(error);
							else error.insertAfter(element.nextAll('.lbl:eq(0)').eq(0));
						}
						else if(element.is('.select2')) {
							error.insertAfter(element.siblings('[class*="select2-container"]:eq(0)'));
						}
						else if(element.is('.chosen-select')) {
							error.insertAfter(element.siblings('[class*="chosen-container"]:eq(0)'));
						}
						else error.insertAfter(element.parent());
					},

					submitHandler: function (form) {
					},
					invalidHandler: function (form) {
					}
				});


				$(document).one('ajaxloadstart.page', function(e) {
					//in ajax mode, remove remaining elements before leaving page
					$('[class*=select2]').remove();
				});


					$("#datepicker").datepicker({
						showOtherMonths: true,
						selectOtherMonths: false,
					});
					$("#datepicker2").datepicker({
						showOtherMonths: true,
						selectOtherMonths: false,
					});
			})
		</script>
                <script type="text/javascript" src="../js/jquery-1.4.1.min.js"></script>
                <script type="text/javascript">
$(document).ready(function()
{
	$("#loding1").hide();
	$("#loding2").hide();
	$(".select1").change(function()
	{
		$("#loding1").show();
		var id=$(this).val();
		var dataString = 'id='+ id;
		$(".select3").find('option').remove();
		$(".select4").find('option').remove();
		$.ajax
		({
			type: "POST",
			url: "getManu.php",
			data: dataString,
			cache: false,
			success: function(html)
			{
				$("#loding1").hide();
				$(".select3").html(html);
			} 
		});
	});
	
	
	$(".select3").change(function()
	{
		$("#loding2").show();
		var id=$(this).val();
		var dataString = 'id='+ id;
	
		$.ajax
		({
			type: "POST",
			url: "getModel.php",
			data: dataString,
			cache: false,
			success: function(html)
			{
				$("#loding2").hide();
				$(".select4").html(html);
			} 
		});
	});
        //$(".select4").change(function(){
          //  var elem1=$(this).val();
            //$("#assetName").val($(this).val());
            
        //});	
});
</script>



	</body>
</html>
