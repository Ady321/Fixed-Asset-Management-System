<?php
	require('../func/config.php');
	if(!$user->is_logged_in()){ header('Location: login'); }
   global $db;
  $pagetitle ="Add Category";
	$activeParent = "active open";
	$activeCatParent= "active open";
	$activeAddcategory = "active";
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
							<li class="active">Add category</li>
						</ul><!-- /.breadcrumb -->

					<?php include('includes/nav-setings.php');?>

						<div class="page-header">
							<h1>
								Add Asset Category

							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->

								<div class="widget-box">
									<div class="widget-header widget-header-blue widget-header-flat">
										<h4 class="widget-title lighter"> </h4>

									</div>

									<div class="widget-body">
										<div class="widget-main">
											<div id="fuelux-wizard-container">
												<div>
													<ul class="steps">
														<li data-step="1" class="active hidden">

														</li>

													</ul>
												</div>

												<div class="step-content pos-rel">
													<div class="step-pane active" data-step="1">
														<h3 class="lighter block green">Enter the following information</h3>


														<form class="form-horizontal" id="validation-form" method="get">

															<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="CategoryID">Category ID:</label>

																<div class="col-xs-12 col-sm-9">
																	<div class="clearfix">
                                                                                                                                            <input type="text" id="CategoryID" name="CategoryID" class="col-xs-12 col-sm-5" disabled 
                                                                                                                                                   value="<?php
                                                                                                                                                          $stmt5 = mysqli_query($db, "select max(sub_Id) from sub_category");
                                                                                                                                                          $row5 = mysqli_fetch_row($stmt5);
                                                                                                                                                          echo $row5[0]+1
                                                                                                                                                            ?>"
                                                                                                                                                   />
																	</div>
																</div>
															</div>
														<div class="form-group">
                                      <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="CategoryName">Category Name:</label>

                                          <div class="col-xs-12 col-sm-9">
                                              <div class="clearfix">
                                                    <select name="CategoryName" class="col-xs-12 col-sm-5">
                                                        <option selected value="">Select Category Name</option>
                                                      <?php
                                                        $stmt2 = mysqli_query($db,"select * from category");
                                                        while($row2 = mysqli_fetch_assoc($stmt2)){
                                                           
                                                       ?>
                                                                <option value="<?php echo $row2['category_Id'] ?>"><?php echo $row2['cat_Name'] ?></option>
                                                       <?php
    
                                                        }
                                                       ?>
                                                  </select>
                                              </div>
                                          </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="manu">Manufactures:</label>

                                          <div class="col-xs-12 col-sm-9">
                                              <div class="clearfix">
                                                  <select name="manu" class="col-xs-12 col-sm-5">
                                                      <option selected value="">select Manufactures</option>
                                                      <?php
                                                        $stmt3 = mysqli_query($db,"select * from manufactures");
                                                        while($row3 = mysqli_fetch_assoc($stmt3)){
                                   
                                                       ?>
                                                                <option value="<?php echo $row3['manu_id'] ?>"><?php echo $row3['manu_name'] ?></option>
                                                       <?php
                                                           
                                                        }
                                                       ?>
                                                  </select>
                                              </div>
                                          </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="model">Model Name:</label>

                                          <div class="col-xs-12 col-sm-9">
                                              <div class="clearfix">
                                                  <input type="text" id="model" name="model" class="col-xs-12 col-sm-5" value=""  />
                                              </div>
                                          </div>
                                  </div>
                                      <div class="form-group">
                                      <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="quan">Quantity:</label>

                                          <div class="col-xs-12 col-sm-9">
                                              <div class="clearfix">
                                                  <input type="text" id="quan" name="quan" class="col-xs-12 col-sm-5" value=""  />
                                              </div>
                                          </div>
                                  </div>
                                      <div class="form-group">
                                      <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="price">Price:</label>

                                          <div class="col-xs-12 col-sm-9">
                                              <div class="clearfix">
                                                  <input type="text" id="price" name="price" class="col-xs-12 col-sm-5" value="" />
                                              </div>
                                          </div>
                                  </div>
															<div class="space-2"></div>
                                        <div class="form-group">
                                <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="purchaseDate">Purchase Date:</label>

                                    <div class="col-xs-12 col-lg-3 col-md-4 col-sm-4">
					<div class="input-group input-group-sm">
                                            <input name ="purchaseDate" type="text" id="datepicker" class="form-control" />

					    <span class="input-group-addon">
						<i class="ace-icon fa fa-calendar"></i>
					    </span>
					</div>
                                    </div>
				</div>
                               <div class="form-group">
                                <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="SupplierDate">Supplier Date:</label>

                                    <div class="col-xs-12 col-lg-3 col-md-4 col-sm-4">
					<div class="input-group input-group-sm">
                                            <input name ="SupplierDate" type="text" id="datepicker1" class="form-control" />

					    <span class="input-group-addon">
						<i class="ace-icon fa fa-calendar"></i>
					    </span>
					</div>
                                    </div>
				</div>
                                <div class="form-group">
                                <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="warrantyStart">Warranty Start Date:</label>

                                    <div class="col-xs-12 col-lg-3 col-md-4 col-sm-4">
					<div class="input-group input-group-sm">
                                            <input name ="warrantyStart" type="text" id="datepicker2" class="form-control" />

					    <span class="input-group-addon">
						<i class="ace-icon fa fa-calendar"></i>
					    </span>
					</div>
                                    </div>
				</div>
                              <div class="form-group">
                                <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="warrantyEnd">Warranty End Date:</label>

                                    <div class="col-xs-12 col-lg-3 col-md-4 col-sm-4">
					<div class="input-group input-group-sm">
                                            <input name ="warrantyEnd" type="text" id="datepicker5" class="form-control" />

					    <span class="input-group-addon">
						<i class="ace-icon fa fa-calendar"></i>
					    </span>
					</div>
                                    </div>
				</div>

														</form>
													</div>


												</div>
											</div>

											<hr />
											<div class="wizard-actions center">


												<button class="btn btn-success btn-next" data-last="Finish">
													Save
													<i class="ace-icon fa fa-floppy-o icon-on-right"></i>
												</button>
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


				var $validation = true;
				$('#fuelux-wizard-container')
				.ace_wizard({
					//step: 2 //optional argument. wizard will jump to step "2" at first
					//buttons: '.wizard-actions:eq(0)'
				})
				.on('actionclicked.fu.wizard' , function(e, info){
					if(info.step == 1 && $validation) {
						if(!$('#validation-form').valid()) e.preventDefault();
					}
				})
				//.on('changed.fu.wizard', function() {
				//})
				.on('finished.fu.wizard', function(e) {
					bootbox.dialog({
						message: "Are you sure you want to create the new Category?",
						title: "<i class='glyphicon glyphicon-refresh'></i> New !",
						buttons: {
						success: {
							label: "No",
							className: "btn-success",
							callback: function() {
							 $('.bootbox').modal('hide');
							}
						},
						danger: {
							label: "Yes!",
							className: "btn-danger",
							callback: function() {


								$.post('../custom/addCategory.php', { 
                                                                    'CategoryID': $('[name=CategoryID]').val(), 
                                                                    'CategoryName': $('[name=CategoryName]').val(), 
                                                                    'Manufactures': $('[name=manu]').val(),
                                                                    'ModelName': $('[name=model]').val(),
                                                                    'Quantity': $('[name=quan]').val(),
                                                                    'Price': $('[name=price]').val(),
                                                                    'purchaseDate': $('[name=purchaseDate]').val(),
                                                                    'SupplierDate': $('[name=SupplierDate]').val(),
                                                                    'warrantyStart': $('[name=warrantyEnd]').val(),
                                                                    'warrantyEnd': $('[name=warrantyEnd]').val()
                                                                })
								.done(function(response){
									bootbox.alert(response);
                                                                        window.location = "view-category.php"; 
									//parent.fadeOut('slow');
								})
								.fail(function(){
									bootbox.alert('Something Went Wrog ....');
								})

							}
						}
						}
					});


				}).on('stepclick.fu.wizard', function(e){
					//e.preventDefault();//this will prevent clicking and selecting steps
				});

				jQuery.validator.addMethod("lettersOnly", function(value, element) {
				   return this.optional(element) || /^[a-z,\s]+$/i.test(value);
				}, "Use letters, spaces and commas only");

				$('#validation-form').validate({
					errorElement: 'div',
					errorClass: 'help-block',
					focusInvalid: false,
					ignore: "",
					rules: {
						CategoryID: {
							required: true
						},
						CategoryName: {
							required: true
						},
						manu: {
							required: true
						},
                                                model: {
                                                        required: true
                                                },
                                                quan: {
                                                        required: true
                                                },
                                                price: {
                                                        required: true
                                                },
                                                purchaseDate:  {
                                                        required: true
                                                },
                                                SupplierDate: {
                                                        required: true
                                                },
                                                warrantyStart: {
                                                        required: true
                                                },
                                                warrantyEnd: {
                                                        required: true
                                                }
					},

					messages: {
						CategoryID: {
							required: "Please provide a category ID."
						},
						CategoryName: {
							required: "Please provide a category Name"
						},
						manu: {
							required: "Please provide a manufacture name"
						},
                                                model: {
                                                        required: "please provide a model name"
                                                },
                                                quan: {
                                                        required: "please provide the qunatity"
                                                },
                                                price: {
                                                        required: "please provide the price"
                                                },
                                                purchaseDate:  {
                                                        required: "Please provide the purchase date"
                                                },
                                                SupplierDate: {
                                                        required: "Please provide the supplier date"
                                                },
                                                warrantyStart: {
                                                        required: "Please provide the warranty start date"
                                                },
                                                warrantyEnd: {
                                                        required: "Please provide warranty end date"
                                                }
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




				$('#modal-wizard-container').ace_wizard();
				$('#modal-wizard .wizard-actions .btn[data-dismiss=modal]').removeAttr('disabled');


				/**
				$('#date').datepicker({autoclose:true}).on('changeDate', function(ev) {
					$(this).closest('form').validate().element($(this));
				});

				$('#mychosen').chosen().on('change', function(ev) {
					$(this).closest('form').validate().element($(this));
				});
				*/


				$(document).one('ajaxloadstart.page', function(e) {
					//in ajax mode, remove remaining elements before leaving page
					$('[class*=select2]').remove();
				});
                                $("#datepicker").datepicker({
						showOtherMonths: true,
						selectOtherMonths: false,
				});
                                $("#datepicker1").datepicker({
						showOtherMonths: true,
						selectOtherMonths: false,
				});
                                $("#datepicker2").datepicker({
						showOtherMonths: true,
						selectOtherMonths: false,
				});
                                $("#datepicker5").datepicker({
						showOtherMonths: true,
						selectOtherMonths: false,
				});
			})
		</script>
	</body>
</html>
