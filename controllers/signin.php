<?php 
	session_start();
	$message="";
	if(isset($_SESSION['user_id'])) {
		header("location: home");
	}
	if(isset($_POST['signin'])){
		$email = trim(htmlspecialchars($_POST['email']));
		$password = $_POST['password'];
		$result = $db->checkSignin($email,$password);
		if($result==FALSE){
			$message = '<label> Wrong username or password</label>';
		}
		else{
			foreach ($result as $row) {
				$_SESSION['user_id'] = $row['user_id'];
				$_SESSION['name'] = $row['name'];
				$_SESSION['username'] = $row['username'];
				$_SESSION['permission'] = $row['permission'];
				header("location: home");
			}
		}
	}
	require_once("./views/signin.php");
?>