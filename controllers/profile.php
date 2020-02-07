<?php 

	session_start();
	$username = $_SESSION['username'];
	$flag_follow = 0;
	$flag_rq_follow = 1;
	if(!$_SESSION['user_id']){
		header("location: ./");
	}
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
				if (!empty($data[2]) && $data[2] == 'follow') {
					$action = $data[2];
					$checkFollow = $db->checkFollow($_SESSION['user_id'], $info[0]['user_id']);
					if($checkFollow == FALSE){
						$db->addFollow($_SESSION['user_id'],$info[0]['user_id'],'waiting','Waiting');
						header("location: ./");
						// $display_status = 'Waiting';
					}
					else{
						$follow_status = $checkFollow[0]['follow_status'];
						switch ($follow_status) {
							case 'follow':
								$db->updateFollow($_SESSION['user_id'],$info[0]['user_id'],'unfollow','Follow');
								header("location: ./");
								break;
							case 'unfollow':
								$db->updateFollow($_SESSION['user_id'],$info[0]['user_id'],'waiting','Waiting');

								header("location: ./");
								break;
							case 'waiting':
								$db->updateFollow($_SESSION['user_id'],$info[0]['user_id'],'unfollow','Follow');
								header("location: ./");
								break;
							default:
								# code...
								break;
						}
					}
				}
				else{

				}
			}
		}
	}
	if(isset($_GET['approve'])){
		$approve_user = $_GET['approve'];
		$checkRequestFollow = $db->checkRequestFollow($_SESSION['user_id']);
		if($checkRequestFollow!=FALSE){
			foreach ($checkRequestFollow as $row) {
				if($approve_user == $row['username']){
					if($db->updateFollow($row['user_id'],$_SESSION['user_id'],'follow','UnFollow')){
						header("location: ./");
					}
				}
			}
		}
	}
	if(isset($_GET['reject'])){
		$reject_user = $_GET['reject'];
		$checkRequestFollow = $db->checkRequestFollow($_SESSION['user_id']);
		if($checkRequestFollow!=FALSE){
			foreach ($checkRequestFollow as $row) {
				if($reject_user == $row['username']){
					if($db->updateFollow($row['user_id'],$_SESSION['user_id'],'unfollow','Follow')){
						header("location: ./");
					}
				}
			}
		}
	}
	$messageUpload = "";

	$avatar = $db->getAvatar($_SESSION['user_id']);
	if (isset($_POST['edit_profile'])) {
		$target_dir = "public/images/";
		$target_file = $target_dir . basename($_FILES['profile_image']['name']);
		$allowUpload = true;
		$imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
		$maxfilesize = 900000;
		$allowtypes = array('jpg','png','jpeg','gif');
		$check = getimagesize($_FILES['profile_image']['tmp_name']);
		if($check !==false){
			$allowUpload = true;
			$messageUpload = "<div class='alert alert-success'>Avatar Change Successfully</div>";
		}
		else{
			$allowUpload = false;
			$messageUpload = "<div class='alert alert-danger'>Avatar Change Failed</div>";
		}
		if ($_FILES['profile_image']['size'] > $maxfilesize) {
			$allowUpload = false;
			$messageUpload = "<div class='alert alert-danger'>Avatar Change Failed</div>";
		}
		if(!in_array($imageFileType, $allowtypes)){
			$allowUpload = false;
			$messageUpload = "<div class='alert alert-danger'>Avatar Change Failed</div>";
		}
		if($allowUpload){
			$file_name = rand() . "." . $imageFileType;
			$target_location = $target_dir . $file_name;
			if (move_uploaded_file($_FILES['profile_image']['tmp_name'], $target_location)) {
				$messageUpload = "<div class='alert alert-success'>Avatar Change Successfully</div>";
				$db->updateAvatar($_SESSION['user_id'],$file_name);
				if($avatar[0]['avatar']!=NULL){
					unlink($target_dir. $avatar[0]['avatar']);
				}
				$_SESSION['avatar'] = $file_name;
			}
			else{
				$messageUpload = "<div class='alert alert-danger'>Avatar Change Failed</div>";
			}
		}
		else{
			$messageUpload = "<div class='alert alert-danger'>Avatar Change Failed</div>";
		}
	}
	$info = $db->checkUser($username);
	$checkFollow = $db->checkFollow($_SESSION['user_id'],$info[0]['user_id']);
	if($checkFollow == FALSE){
		$display_status = 'Follow';
	}
	else{
		$display_status = $checkFollow[0]['display_status'];
	}
	$checkRequestFollow = $db->checkRequestFollow($_SESSION['user_id']);
	$getAllPostsByUsername = $db->getAllPostsByUsername($username);
	require_once("likes.php");
	require_once("./views/profile.php");
?>