<?php
ob_start();
session_start();

//database credentials
define('DBHOST','localhost');
define('DBUSER','aditya');
define('DBPASS','aditya1994');
//define('DBNAME','assets');
define('DBNAME', 'myapp');

//$db = new PDO("mysql:host=".DBHOST.";port=3306;dbname=".DBNAME, DBUSER, DBPASS);
//$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
global $db;
$db= mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME) or die("Error : Connecting to the database". mysqli_connect_error());
//set timezone

//load classes as needed
function __autoload($class) {

   $class = strtolower($class);

	//if call from within assets adjust the path
   $classpath = 'classes/class.'.$class . '.php';
   if ( file_exists($classpath)) {
      require_once $classpath;
	}

	//if call from within admin adjust the path
   $classpath = '../classes/class.'.$class . '.php';
   if ( file_exists($classpath)) {
      require_once $classpath;
	}

	//if call from within admin adjust the path
   $classpath = '../../classes/class.'.$class . '.php';
   if ( file_exists($classpath)) {
      require_once $classpath;
	}

}

$user = new User($db);
?>
