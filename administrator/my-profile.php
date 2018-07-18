<?php
	require('../func/config.php');
	if(!$user->is_logged_in()){ header('Location: login'); }

  $pagetitle ="My Profile";
	$activeregistrationusers = "active open";
	$activeMyProfile = "active";
?>
<?php
                                    global $db;
                                    if(isset($_POST['submit'])){
                                        $username = $_POST['Username'];
                                        $Name =$_POST['FullName'];
                                        $email =$_POST['email'];
                                        $phone = $_POST['phone'];
                                        $password =$_POST['password'];
                                        $hashPwd= sha1($password);
                                        $id=$_POST['Id'];
                                        $query = mysqli_query($db,"update admin set Username='".$username."',Name='".$Name."',Email='".$email."',Phno='".$phone."',Password='".$hashPwd."',Date=NOW() where Id='".$id."'");
                                        if($query){
                                           //echo "<p style='font-size: large; color: green; margin-left: 600px;'>Your Information is updated Succesfully</p>";
                                           $user->login($email,$password);
                                           $_SESSION['username']=$username;
                                           $_SESSION['usersfullname']=$Name;
                                        }else{
                                            //echo "<p style='font-size: large; color: red; margin-left: 600px;'>Fail to save</p>";
                                        }
                                    }
                                ?>
  <?php include('includes/header.php');?>

	<?php
		//get user shit
		$stmt = mysqli_query($db,"select * from admin where Username='".$_SESSION['username']."'");
		$fetchUserDetails = mysqli_fetch_row($stmt);
	 ?>
	<div class="main-content">
		<div class="main-content-inner">
			<div class="breadcrumbs ace-save-state" id="breadcrumbs">
				<ul class="breadcrumb">
					<li>
						<i class="ace-icon fa fa-home home-icon"></i>
						<a href="#">Home</a>
					</li>

					<li>
						<a href="#">Users</a>
					</li>
					<li class="active">My Profile</li>
				</ul><!-- /.breadcrumb -->

			<?php include('includes/nav-setings.php');?>

				<div class="page-header">
					<h1>
						My Profile

					</h1>
				</div><!-- /.page-header -->

	<div class="row">
		<div class="col-xs-12">
			<!-- PAGE CONTENT BEGINS -->
                    <div class="widget-box">
                        <div class="widget-header widget-header-blue widget-header-flat">
                                <h4 class="widget-title lighter">User information</h4>

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
                                              <h3 class="lighter block green">Your information</h3>

    				<form class="form-horizontal" id="validation-form" method="POST">
																					
                                                        
                                    <input type="hidden" name="Id" class="col-xs-12 col-sm-5" value='<?php echo $fetchUserDetails[0];?>' />

                                                        <div class="form-group">
                                                            <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="Username">Username:</label>

                                                              <div class="col-xs-12 col-sm-9">
                                                                    <div class="clearfix">
                                                                        <input type="text" id="Username" name="Username" class="col-xs-12 col-sm-5" value='<?php echo $fetchUserDetails[3];?>' />
                                                                    </div>
                                                              </div>
                                                          </div>
                                                          <div class="form-group">
                                                              <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="FullName">Name:</label>

                                                              <div class="col-xs-12 col-sm-9">
                                                                  <div class="clearfix">
                                                                      <input type="text" id="FullName" name="FullName" class="col-xs-12 col-sm-5" value='<?php echo $fetchUserDetails[1];?>' />
                                                                  </div>
                                                              </div>
                                                          </div>
                                                          <div class="form-group">
                                                              <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="email">Email Address:</label>

                                                                <div class="col-xs-12 col-sm-9">
                                                                  <div class="clearfix">
                                                                      <input type="email" name="email" id="email" class="col-xs-12 col-sm-6" value='<?php echo $fetchUserDetails[2];?>' />
                                                                  </div>
                                                              </div>
                                                         </div>

                                                        <div class="space-2"></div>
                                                      <div class="hr hr-dotted"></div>
                                                        <div class="space-2"></div>
                                                          <div class="space-2"></div>
                                                        <div class="form-group">
                                                          <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="phone">Phone Number:</label>

                                                              <div class="col-xs-12 col-sm-9">
                                                                  <div class="input-group">
                                                                        <span class="input-group-addon">
                                                                            <i class="ace-icon fa fa-phone"></i>
                                                                          </span>

                                                                        <input type="tel" id="phone" name="phone" value='<?php echo $fetchUserDetails[4];?>'/>
                                                                    </div>
                                                                </div>
                                                        </div>

                                                       <div class="form-group">
                                                            <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="password">Password:</label>

                                                                <div class="col-xs-12 col-sm-9">
                                                                    <div class="clearfix">
                                                                          <input type="password" name="password" id="password" class="col-xs-12 col-sm-4" />
                                                                      </div>
                                                                  </div>
                                                        </div>

                                                        <div class="space-2"></div>

                                                        <div class="form-group">
                                                            <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="password2">Confirm Password:</label>

                                                                <div class="col-xs-12 col-sm-9">
                                                                    <div class="clearfix">
                                                                            <input type="password" name="password2" id="password2" class="col-xs-12 col-sm-4" />
                                                                      </div>
                                                              </div>
                                                        </div>
                                                        <input type="submit" name="submit" class="submit1" value="Update" />
                                                                                                       
                                                  </form>
                                          </div>


                                      </div>
                                  </div>

                                        </div><!-- /.widget-main -->
                                   </div><!-- /.widget-body -->
                                </div>
                                <?php
                                    
                                    if(isset($_POST['submit'])){
                                      
                                           echo "<p style='font-size: large; color: green; margin-left: 600px;'>Your Information is updated Succesfully</p>";
                                    }
                                ?>
                                <!-- PAGE CONTENT ENDS -->
                                </div><!-- /.col -->
                        </div><!-- /.row -->
                </div><!-- /.page-content -->
        </div>
</div><!-- /.main-content -->



<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
        <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
</a>
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

<script src="../assets/js/jquery-ui.custom.min.js"></script>
		<script src="../assets/js/jquery.ui.touch-punch.min.js"></script>
    <script src="../assets/js/bootstrap-editable.min.js"></script>
		<script src="../assets/js/chosen.jquery.min.js"></script>
		<script src="../assets/js/bootstrap-datepicker.min.js"></script>
		<script src="../assets/js/moment.min.js"></script>
		<script src="../assets/js/autosize.min.js"></script>
		<script src="../assets/js/jquery.inputlimiter.min.js"></script>
		<script src="../assets/js/bootstrap-tag.min.js"></script>

<!-- ace scripts -->
<script src="../assets/js/ace-elements.min.js"></script>
<script src="../assets/js/ace.min.js"></script>

<!-- inline scripts related to this page -->
<style>
    .submit1{
        color: #fff;
        border-radius: 3px;
        background: #69AA46;
        padding: 2px;
        margin-top: 40px;
        margin-left: 700px;
        border: none;
        width: 100px;
        height: 30px;
        font-size: 16px;
        box-shadow: 0 0 1px 1px #123456;
    }
    .error {
        color: red;
        margin-left: 5px;
    }

    label.error {
        display: inline;
    }
</style>
<script>
   $(document).ready(function() {

    $('form[id="validation-form"]').validate({
        rules: {
            Username: {
                required: true
            },
            FullName: {
                required: true
            },
            email: {
                required: true,
                email: true,
            },
            password: {
                required: true,
                minlength: 8,
            },
            password2: {
                required: true,
                minlength: 8,
                equalTo: "#password"
            },
            phone: {
                required: true
            }
        },
        messages: {
            Username: 'Please Enter the user Name',
            FullName: 'Please Enter the full name',
            email: 'Enter a valid email',
            password: {
                required: 'please specify the password',
                minlength: 'Password must be at least 8 characters long'
            },
            phone: 'Please Enter the phone number'
        },
    
        submitHandler: function(form) {
        form.submit();
    }
  });

});
    </script>
</body>
</html>
