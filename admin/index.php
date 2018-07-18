<?php
	require('../func/config.php');
	if(!$user->is_logged_in()){ header('Location: login'); }
  global $db;
  $pagetitle ="Dashboard";

	include('includes/header.php');

?>
	<div class="main-content">
				<div class="main-content-inner">
					<div class="breadcrumbs ace-save-state" id="breadcrumbs">
						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-home home-icon"></i>
								<a href="#">Home</a>
							</li>
							<li class="active">Dashboard</li>
						</ul><!-- /.breadcrumb -->

					<?php include('includes/nav-setings.php');?>
						<div class="page-header">
							<h1>
								Dashboard

							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
                       <div class="col-lg-3 col-xs-6" style="width: 25%;float: left;">
           <!-- small box -->
           <div class="small-box bg-blue">
             <div class="inner">
                 <h3><?php $stm = mysqli_query($db,"select count(*) as assets from asset");
                 $row_as = mysqli_fetch_assoc($stm);
                 echo $row_as['assets']; ?>
               </h3>
               <p>Asset</p>
             </div>
             <div class="icon">
               <i class="fa fa-barcode"></i>
             </div>
               <a href="view-asset.php" class="small-box-footer"> View all <i class="fa fa-arrow-circle-right"></i></a>
           </div>
         </div>
                                                            <div style="width:900px;">  
                                                            
                                                            <br />  
                                                            <div id="piechart" style="width: 900px; height: 500px; margin-left: 600px; margin-top: -27px;"></div>  
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
		<script src="../assets/js/jquery-ui.custom.min.js"></script>
		<script src="../assets/js/jquery.ui.touch-punch.min.js"></script>
		<script src="../assets/js/jquery.easypiechart.min.js"></script>
		<script src="../assets/js/jquery.sparkline.index.min.js"></script>
		<script src="../assets/js/jquery.flot.min.js"></script>
		<script src="../assets/js/jquery.flot.pie.min.js"></script>
		<script src="../assets/js/jquery.flot.resize.min.js"></script>
		<script src="../assets/js/bootbox.js"></script>
		<script src="../assets/js/chosen.jquery.min.js"></script>

		<!-- ace scripts -->
		<script src="../assets/js/ace-elements.min.js"></script>
		<script src="../assets/js/ace.min.js"></script>

		<!-- inline scripts related to this page -->
		<script type="text/javascript" src="../js/loader.js"></script>  
           <script type="text/javascript">  
           google.charts.load('current', {'packages':['corechart']});  
           google.charts.setOnLoadCallback(drawChart);  
           function drawChart()  
           {  
                var data = google.visualization.arrayToDataTable([  
                          ['Categories', 'Number'],  
                          <?php
                          $stmt = mysqli_query($db,"select category_Id from category");
                          while($row= mysqli_fetch_assoc($stmt)){
                            $stmt1 = mysqli_query($db, "select c.cat_name,count(c.cat_name) as count_category from asset a, sub_category sc,category c where a.sub_Id=sc.sub_Id and sc.category_Id=c.category_Id and c.category_Id='".$row['category_Id']."'");
                            $row1= mysqli_fetch_assoc($stmt1);
                            echo "['".$row1["cat_name"]."', ".$row1["count_category"]."],";
                           }
                          ?>  
                     ]);  
                var options = {  
                      title: 'Asset By Category',  
                      //is3D:true,  
                      pieHole: 0.4  
                     };  
                var chart = new google.visualization.PieChart(document.getElementById('piechart'));  
                chart.draw(data, options);  
           }  
           </script> 
           <style>
               .small-box{
                    border-radius: 2px;
                    position: relative;
                    display: block;
                    margin-bottom: 20px;
                    box-shadow: 0 1px 1px rgba(0,0,0,0.1);
               }
               .small-box > .inner {
                    padding: 10px;
               }
               .small-box h3 {
                    font-size: 38px;
                    color: #FFFFFF;
                    font-weight: bold;
                    margin: 0 0 10px 0;
                    white-space: nowrap;
                    padding: 0;
               }
               .small-box p {
                    font-size: 15px;
                }
                p {
                    margin: 0 0 10px;
                    color: #FFFFFF;
                }
                .small-box .icon {
                    -webkit-transition: all .3s linear;
                    -o-transition: all .3s linear;
                    transition: all .3s linear;
                    position: absolute;
                    top: -14px;
                    right: 10px;
                    z-index: 0;
                    font-size: 90px;
                    color: rgba(0,0,0,0.15);
                }
                .fa {
                    display: inline-block;
                    font: normal normal normal 14px/1 FontAwesome;
                    font-size: 14px;
                    font-size: inherit;
                    text-rendering: auto;
                }
                .bg-blue {
                    background-color: #0073b7 !important;
                }
                .small-box > .small-box-footer {
                    position: relative;
                    text-align: center;
                    padding: 3px 0;
                    
                    color: rgba(255,255,255,0.8);
                    display: block;
                    z-index: 10;
                    background: rgba(0,0,0,0.1);
                    text-decoration: none;
                }
                
           </style>
	</body>
</html>
