<?php 

	session_start();
	$username = $_SESSION['username'];
	$flag_follow = 0;
	$flag_rq_follow = 1;
	if(!empty($data[1])){
		$username = $data[1];
		$info = $db->checkUser($username);
		if($info == FALSE){
			$username = $_SESSION['username'];
			$flag_follow = 0;
			$flag_rq_follow = 1;
		}
		else{
			if($info[0]['username'] == $_SESSION['username']){
				$flag_follow = 0;
				$flag_rq_follow = 1;
			}
			else{
				$flag_follow = 1;
				$flag_rq_follow = 0;
			}
		}
	}
	$info = $db->checkUser($username);
	require_once("./views/profile.php");
?>