<?php
  require('../func/config.php');
  //if not logged in redirect to login page
  if(!$user->is_logged_in()){ header('Location: login'); }
  global $db;
  //$pid = $_REQUEST['delete'];
  $Name = $_REQUEST['Name'];
  $email = $_REQUEST['email'];
  $title = $_REQUEST['title'];
  $team = $_REQUEST['team'];
  $mobno = $_REQUEST['mobno'];
 
  $stmt = mysqli_query($db,"insert into users (Name,Email,job_title,Mob_no,dept_Id,date) values('".$Name."','".$email."','".$title."','".$mobno."','".$team."',now())");
    if($stmt){
      echo "Thank you! Your information was successfully updated!";
    }else {
      echo "Failed to update";
    }

  ?>