<?php
	require('../func/config.php');
	if(!$user->is_logged_in()){ header('Location: login'); }

        global $db;
        if(isset($_GET['id'])){
            $id = base64_decode($_GET['id']);
            $stmt = mysqli_query($db,"select * from users where Id='".$id."'");
            $row = mysqli_fetch_row($stmt);
        }
  $pagetitle ="Edit Users";
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

							<li>
								<a href="#">Gallary</a>
							</li>
							<li class="active">Edit Users</li>
						</ul><!-- /.breadcrumb -->

					<?php include('includes/nav-setings.php');?>

						<div class="page-header">
							<h1>
                                                            <small>Edit The User Information for</small> <?php echo $row[1] ?>

							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<div class="widget-box">
                                                                    <div class="widget-header widget-header-blue widget-header-flat" style="border-bottom: 3px solid #DDD">

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


														<form class="form-horizontal" id="edit-form" method="POST" >

                                  <div class="form-group">
                                    <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="Name">Name:</label>

                                        <div class="col-xs-12 col-sm-9">
                                                  <div class="clearfix">
                                                      <input type="text" id="Name" name="Name" class="col-xs-12 col-sm-5" value="<?php echo $row[1]; ?>" />
                                                 </div>
                                        </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="email">Email:</label>

                                          <div class="col-xs-12 col-sm-9">
                                              <div class="clearfix">
                                                  <input type="text" id="email" name="email" class="col-xs-12 col-sm-5" value="<?php echo $row[2]; ?>" disabled />
                                              </div>
                                          </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="title">Title:</label>

                                          <div class="col-xs-12 col-sm-9">
                                              <div class="clearfix">
                                                 <input type="text" id="title" name="title" class="col-xs-12 col-sm-5" value="<?php echo $row[3]; ?>" />
                                              </div>
                                          </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="team">Team:</label>

                                          <div class="col-xs-12 col-sm-9">
                                              <div class="clearfix">
                                                 <select name="team" class="col-xs-12 col-sm-5">
                                                      <?php
                                                        $stmt2 = mysqli_query($db,"select * from dept_teams");
                                                        while($row2 = mysqli_fetch_assoc($stmt2)){
                                                            if($row[6]==$row2['dept_Id']){
                                                       ?>
                                                                <option selected value="<?php echo $row2['dept_Id'] ?>"><?php echo $row2['Name'] ?></option>
                                                       <?php
                                                            }else{
                                                                echo "<option value=".$row2['dept_Id'].">".$row2['Name']."</option>";
                                                            }
                                                        }
                                                       ?>
                                                  </select>
                                              </div>
                                          </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="mobno">Mobile No:</label>

                                          <div class="col-xs-12 col-sm-9">
                                              <div class="clearfix">
                                                 <input type="text" id="mobno" name="mobno" class="col-xs-12 col-sm-5" value="<?php echo $row[4]; ?>" />
                                              </div>
                                          </div>
                                  </div>
                                  
                              <div class="space-2"></div>

														</form>
													</div>


												</div>
											</div>

											<hr />
											<div class="wizard-actions center">

												<button class="btn btn-white btn-info btn-bold btn-next" data-last="Finish">
													<i class="ace-icon fa fa-floppy-o bigger-120 green"></i>
													Save
												</button>

												<a href="javascript:history.back()" class="btn btn-white btn-default btn-bold">
													<i class="ace-icon fa fa-times red2"></i>
													Cancel
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
						if(!$('#edit-form').valid()) e.preventDefault();
					}
				})
				//.on('changed.fu.wizard', function() {
				//})
				.on('finished.fu.wizard', function(e) {
					bootbox.dialog({
						message: "Are you sure you want to update user information?",
						title: "<i class='glyphicon glyphicon-refresh'></i> Update !",
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


								$.post('../custom/updateUser.php', { 
                                                                    'Name': $('[name=Name]').val(), 
                                                                    'email': $('[name=email]').val(), 
                                                                    'title': $('[name=title]').val(),
                                                                    'team': $('[name=team]').val(),
                                                                    'mobno': $('[name=mobno]').val(),
                                                                
                                                                    'Id': "<?php echo $_GET['id'];?>" 
                                                                })
								.done(function(response){
									bootbox.alert(response);
									parent.fadeOut('slow');
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


				//jump to a step
				/**
				var wizard = $('#fuelux-wizard-container').data('fu.wizard')
				wizard.currentStep = 3;
				wizard.setState();
				*/

				//determine selected step
				//wizard.selectedItem().step



				//hide or show the other form which requires validation
				//this is for demo only, you usullay want just one form in your application
        jQuery.validator.addMethod("lettersOnly", function(value, element) {
				   return this.optional(element) || /^[a-z,\s]+$/i.test(value);
				}, "Use letters, spaces and commas only");

				$('#edit-form').validate({
					errorElement: 'div',
					errorClass: 'help-block',
					focusInvalid: false,
					ignore: "",
					rules: {
						Name: {
							required: true
						},
						email: {
							required: true
						},
						title: {
							required: true
						},
                                                team: {
                                                        required: true
                                                },
                                                mobno: {
                                                        required: true
                                                }
					},

					messages: {
						Name: {
							required: "Please provide a User Name."
						},
						email: {
							required: "Please provide user email id"
						},
						title: {
							required: "Please provide title"
						},
                                                team: {
                                                        require: "please provide team name"
                                                },
                                                mobno: {
                                                        required: "please provide mobile number"
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


				$(document).one('ajaxloadstart.page', function(e) {
					//in ajax mode, remove remaining elements before leaving page
					$('[class*=select2]').remove();
				});

			});
		</script>
	</body>
</html>


