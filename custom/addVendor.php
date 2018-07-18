<?php
  require('../func/config.php');
  //if not logged in redirect to login page
  if(!$user->is_logged_in()){ header('Location: login'); }

  global $db;
  $supplierName = $_POST['supplierName'];
  
  $stmt = mysqli_query($db,"select max(sup_id) as suid from suppliers");
  $row = mysqli_fetch_assoc($stmt);
  $suid = $row['suid']+1;
  $stmt1 = mysqli_query($db,"insert into suppliers(sup_id,Name) values('".$suid."','".$supplierName."') ");
  if($stmt1){
      echo "Thank you! Your information was successfully saved!";
  }else {
    echo "Vendor with a similar vendor number already exists ";
  }
  ?>
