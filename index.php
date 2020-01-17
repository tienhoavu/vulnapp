<?php 
	require_once("models/DBConfig.php");
	$db = new DBConfig();
	$page = '';
	if(isset($_GET['url'])){
		$data = explode("/", $_GET['url']);
	}
	if(!empty($data[0])){
		$page = $data[0];
	}
	switch ($page) {
		case 'signup':
			require_once("controllers/signup.php");
			break;
		case 'signin':
			require_once("controllers/signin.php");
			break;
		case 'home':
			require_once("controllers/home.php");
			break;
		case 'signout':
			require_once("controllers/signout.php");
			break;
		case 'profile':
			require_once("controllers/profile.php");
			break;
		default:
			require_once("views/index.php");
			break;
	}
?>