<?php
  require('../func/config.php');
  //if not logged in redirect to login page
  global $db;
  if(!$user->is_logged_in()){ header('Location: login'); }

  //$pid = $_REQUEST['delete'];
  $Id = base64_decode($_REQUEST['Id']);
  //$CategoryID = strtoupper($_REQUEST['CategoryID']);
  $CategoryName = $_REQUEST['CategoryName'];
  $Manufactures = $_REQUEST['Manufactures'];
  $ModelName = $_REQUEST['ModelName'];
  $Quantity = $_REQUEST['Quantity'];
  $Price = $_REQUEST['Price'];
  $purchaseDate = $_REQUEST['purchaseDate'];
  $SupplierDate = $_REQUEST['SupplierDate'];
  $warrantyStart = $_REQUEST['warrantyStart'];
  $warrantyEnd = $_REQUEST['warrantyEnd'];

   $stmt = mysqli_query($db,"update sub_category set category_Id='".$CategoryName."',Name='".$ModelName."',manu_id='".$Manufactures."',Quantity='".$Quantity."',Purchase_date='".$purchaseDate."',Supplier_date='".$SupplierDate."',warranty_start='".$warrantyStart."',warranty_end='".$warrantyEnd."' where sub_Id='".$Id."'");
    if($stmt){
      echo "Thank you! Your information was successfully updated!";
    }else {
      echo "Failed to update";
    }



  ?>
