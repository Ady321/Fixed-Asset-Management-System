<?php
  require('../func/config.php');
  //if not logged in redirect to login page
  global $db;
  if(!$user->is_logged_in()){ header('Location: login'); }

  $Id = $_REQUEST['Id'];
  $assetModel = $_REQUEST['assetModel'];
  $assetSupplier = $_REQUEST['assetSupplier'];
  $assetCondition = $_REQUEST['assetCondition'];
  $assetLocation = $_REQUEST['assetLocation'];
  $assetName = $_REQUEST['assetName'];
  $assetUser = $_REQUEST['assetUser'];
  $stmt = mysqli_query($db,"update asset set sub_Id='".$assetModel."',sup_id='".$assetSupplier."',con_id='".$assetCondition."',loc_id='".$assetLocation."',asset_name='".$assetName."',Id='".$assetUser."',date_added=now() where assetId='".$Id."'");

    if($stmt){
        echo "Thank you! Your information was successfully updated!";
    }else {
        echo "Failed to update";
    }
    
?>
