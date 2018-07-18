<?php
  require('../func/config.php');
  global $db;
  //if not logged in redirect to login page
  if(!$user->is_logged_in()){ header('Location: login'); }

  /*if ($_REQUEST['delete']) {

		$pid = $_REQUEST['delete'];
		$stmt = mysqli_query($db, "delete from users where Id='".$pid."'");
		if ($stmt) {
			echo "User Deleted Successfully ...";
		}

	}
        */
        if($_POST['id']){
            $id=$_POST['id'];
            $stmt = mysqli_query($db,"delete from users where Id='".$id."'");
        }
  ?>
