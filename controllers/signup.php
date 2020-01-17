<?php
	session_start();
	if(isset($_SESSION['user_id'])){
		header("location: home");
	}
	$message = '';
	if(isset($_POST['signup'])){
		$email = $_POST['email'];
		$name = $_POST['name'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		if(empty($_POST['email'])){
			$message .= '<p><label>Email is required</label></p>';
		}
		else{
			if(!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){
				$message .='<p><label>Invalid email format</label></p>';
			}
			else{
				$email = htmlspecialchars($_POST['email']);
			}
		}
		if(empty($_POST['name'])){
			$message .= '<p><label>Name is required</label></p>';
		}
		else{
			if(!preg_match("/^[a-zA-Z ]*$/",$_POST['name'])){
				$message .= '<p><label>Invalid name format</label></p>';
			}
			else{
				$name = htmlspecialchars($_POST['name']);
			}
		}
		if(empty($_POST['username'])){
			$message .= '<p><label>Username is required</label></p>';
		}
		else{
			if(!preg_match("/^[a-zA-Z0-9]*$/",$_POST['username'])){
				$message .= '<p><label>Invalid username format</label></p>';
			}
			else{
				$username = htmlspecialchars($_POST['username']);
			}
		}
		if(empty($_POST['password'])){
			$message .= '<p><label>Password is required</label></p>';
		}
		else{
			if($password != $_POST['confirmpassword']){
				$message .= '<p><label>Password not mactch</label></p>';
			}
		}
		if($message==''){
			$check = $db->checkSignup($email,$username);
			if($check==FALSE){
				$db->addUser($email, $name, $username, $password,'1');
				$message = '<label> Signup Completed</label>';
			}
			else{
				foreach ($check as $row) {
					if($email === $row['email']){
						$message .= '<p><label>Email already</label></p>';
					}
					else{
						$message .='<p><label>Username already</label></p>';
					}
				}
			}
		}
	}
	require_once("./views/signup.php");
?>