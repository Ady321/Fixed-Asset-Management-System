<?php
  require('../func/config.php');
  //if not logged in redirect to login page
  global $db;
  if(!$user->is_logged_in()){ header('Location: login'); }

  $Id = base64_decode($_REQUEST['Id']);
  $supplierName = $_REQUEST['supplierName'];

    $stmt = mysqli_query($db,"update suppliers set Name='".$supplierName."' where sup_id='".$Id."'");
    if($stmt){
      echo "Thank you! Your information was successfully updated!";
    }else {
      echo "Failed to update";
    }

  ?>
