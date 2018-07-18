<?php
  require('../func/config.php');
  global $db;
  //if not logged in redirect to login page
  if(!$user->is_logged_in()){ header('Location: login'); }

  if ($_REQUEST['delete']) {

		$pid = $_REQUEST['delete'];
                $stmt1 = mysqli_query($db, "select quan,sub_Id from asset where assetId='".$pid."'");
                $row = mysqli_fetch_assoc($stmt1);
		$stmt = mysqli_query($db, "delete from asset where assetId='".$pid."'");
		if ($stmt) {
                        $stmt2 = mysqli_query($db,"update sub_category set Quantity=Quantity + '".$row['quan']."' where sub_Id='".$row['sub_Id']."'");
			echo "Asset Deleted Successfully ...";
		}

	}

  ?>
