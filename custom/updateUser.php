<?php
  require('../func/config.php');
  //if not logged in redirect to login page
  if(!$user->is_logged_in()){ header('Location: login'); }
  global $db;
  //$pid = $_REQUEST['delete'];
  $Id = base64_decode($_REQUEST['Id']);
  $Name = $_REQUEST['Name'];
  $email = $_REQUEST['email'];
  $title = $_REQUEST['title'];
  $team = $_REQUEST['team'];
  $mobno = $_REQUEST['mobno'];

   $stmt = mysqli_query($db,"update users set Name='".$Name."',Email='".$email."',job_title='".$title."',dept_Id='".$team."',Mob_no='".$mobno."',date=now() where Id='".$Id."'");
    if($stmt){
      echo "Thank you! Your information was successfully updated!";
    }else {
      echo "Failed to update";
    }

  ?>

