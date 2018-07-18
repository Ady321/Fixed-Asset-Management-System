<?php
  require('../func/config.php');
  //if not logged in redirect to login page
  if(!$user->is_logged_in()){ header('Location: login'); }
  global $db;
  if ($_REQUEST['delete']) {

		$pid = $_REQUEST['delete'];
		$stmt = mysqli_query($db, "delete from suppliers where sup_id='".$pid."'");
		if ($stmt) {
			echo "Supplier Deleted Successfully ...";
		}

	}

  ?>
