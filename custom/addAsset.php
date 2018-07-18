<?php
  require('../func/config.php');
  //if not logged in redirect to login page
  global $db;
  if(!$user->is_logged_in()){ header('Location: login'); }

  $AssetTag = $_POST['AssetTag'];
  $assetModel = $_POST['assetModel'];
  $assetSerial = $_POST['assetSerial'];
  $assetSupplier = $_POST['assetSupplier'];
  $assetCondition = $_POST['assetCondition'];
  $assetLocation = $_POST['assetLocation'];
  $assetName = $_POST['assetName'];
  $quan = 1;
  $assetUser = $_POST['assetUser'];
  
  $stmt = mysqli_query($db,"insert into asset(TagId,sub_Id,serial_no,sup_id,con_id,loc_id,asset_name,quan,Id,date_added) values('".$AssetTag."','".$assetModel."','".$assetSerial."','".$assetSupplier."','".$assetCondition."','".$assetLocation."','".$assetName."','".$quan."','".$assetUser."',now())");
  if($stmt){
      echo "Thank you! Your information was successfully saved!";
      $stmt1 = mysqli_query($db,"update sub_category set Quantity=Quantity-'".$quan."' where sub_Id='".$assetModel."'");
  }
  ?>
