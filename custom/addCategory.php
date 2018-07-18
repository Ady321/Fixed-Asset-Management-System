<?php
  require('../func/config.php');
  //if not logged in redirect to login page
  global $db;
  if(!$user->is_logged_in()){ header('Location: login'); }

  $CategoryID = $_REQUEST['CategoryID'];
  $CategoryName = $_REQUEST['CategoryName'];
  $Manufactures = $_REQUEST['Manufactures'];
  $ModelName = $_REQUEST['ModelName'];
  $Quantity =$_REQUEST['Quantity'];
  $Price =$_REQUEST['Price'];
  $purchaseDate = $_REQUEST['purchaseDate'];
  $SupplierDate = $_REQUEST['SupplierDate'];
  $warrantyStart = $_REQUEST['warrantyStart'];
  $warrantyEnd = $_REQUEST['warrantyEnd'];
  
  $stmt= mysqli_query($db,"insert into sub_category (sub_Id,category_Id,Name,manu_id,Quantity,Price,Purchase_date,Supplier_date,warranty_start,warranty_end) values('".$CategoryID."','".$CategoryName."','".$ModelName."','".$Manufactures."','".$Quantity."','".$Price."','".$purchaseDate."','".$SupplierDate."','".$warrantyStart."','".$warrantyEnd."')");
  if($stmt){  
        echo "Thank you! Your information was successfully saved!";
  }else {
    echo "A category with the category id $CategoryID already exists.";
  }
  ?>
