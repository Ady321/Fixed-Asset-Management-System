<?php

//include('class.password.php');

class User{

    private $db;

	function __construct($db){
		$this->db = $db;
	}

	public function is_logged_in(){
		if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
			return true;
		}
	}
  public function get_user(){
			return $_SESSION['user'];
	}

	private function get_user_hash($user_email){
		/*try {

			$stmt = $this->_db->prepare('SELECT Password FROM profilemaster WHERE Email = :Email');
			$stmt->execute(array('Email' => $user_email));

			$row = $stmt->fetch();
			return $row['Password'];

		} catch(PDOException $e) {
		    echo '	<div class="alert alert-danger">'.$e->getMessage().'</div>';
		}*/
                try{
                    $stmt = mysqli_query($this->db,"select Password from admin where Email='".$user_email."'");
                    $row = mysqli_fetch_row($stmt);
                    return $row[0];
                    
                } catch (Exception $ex) {
                        echo '	<div class="alert alert-danger">'.$e->getMessage().'</div>';
                }
	}

	public function login($user_email,$password){

		/*$hashed = $this->get_user_hash($user_email);

		if($this->password_verify($password,$hashed) == 1){

		    $_SESSION['loggedin'] = true;
		    return true;
		}*/
                $hashed = $this->get_user_hash($user_email);
                $hash1= sha1($password);
                if(strcmp($hashed, $hash1)==0){
                    $_SESSION['loggedin']=true;
                    return true;
                }
	}

	public function logout(){
		session_destroy();
	}
///end
}


?>
