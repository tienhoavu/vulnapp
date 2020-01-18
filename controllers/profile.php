<?php 

	session_start();
	$username = $_SESSION['username'];
	$flag_follow = 0;
	$flag_rq_follow = 1;
	$display_follow = 'Follow';
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
				if (!empty($data[2])) {
					$action = $data[2];
					$display_follow = 'Follow';
					if($action == 'follow'){
						$checkFollow = $db->checkFollow($_SESSION['user_id'],$info[0]['user_id']);
						if($checkFollow == FALSE){
							$db->addFollow($_SESSION['user_id'],$info[0]['user_id'],'waiting','Waiting');
							// $display_follow = 'Waiting';
							header("location: ./");
						}
						else{
							$follow_status = $checkFollow[0]['follow_status'];
							switch ($follow_status) {
								case 'follow':
									$db->updateFollow($_SESSION['user_id'],$info[0]['user_id'],'unfollow','Follow');
									// $display_follow = 'Follow';
									break;
								case 'unfollow':
									$db->updateFollow($_SESSION['user_id'],$info[0]['user_id'],'waiting','Waiting');
									// $display_follow = 'Waiting';
									break;
								case 'waiting':
									$db->updateFollow($_SESSION['user_id'],$info[0]['user_id'],'unfollow','Follow');
									// $display_follow = 'Follow';
									break;
								default:
									# code...
									break;
							}
						}
					}
					else{
						// $checkFollow = $db->checkFollow($_SESSION['user_id'],$info[0]['user_id']);
						// $follow_status = $checkFollow[0]['follow_status'];
						// switch ($follow_status) {
						// 		case 'follow':
						// 			$display_follow = 'Unfollow';
						// 			break;
						// 		case 'unfollow':
						// 			$display_follow = 'Follow';
						// 			break;
						// 		case 'waiting':
						// 			$display_follow = 'Waiting';
						// 			break;
						// 		default:
						// 			# code...
						// 			break;
						// 	}
					}
				}
			}
		}
	}
	$info = $db->checkUser($username);
	// $checkFollow = $db->checkFollow($_SESSION['user_id'],$info[0]['user_id']);
	// $display_status = $checkFollow[0]['display_status'];
	require_once("./views/profile.php");
?>