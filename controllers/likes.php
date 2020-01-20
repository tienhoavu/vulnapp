<?php 
	$post_id = '';
	if(isset($_GET['like'])){
		if(preg_match("/^[0-9]*$/", $_GET['like'])){
			$post_id = $_GET['like'];
		}
		$checkPost = $db->checkPost($post_id);
		if($checkPost!=FALSE){
			$checkLikePost = $db->checkLikePost($_SESSION['user_id'],$post_id);
			if($checkLikePost == FALSE){
				$db->addLike($_SESSION['user_id'],$post_id,'like');
				// header("location: ./$data[0]/$data[1]");
			}
			else{
				if($checkLikePost[0]['like_status']=='like'){
					$db->updateLike($_SESSION['user_id'],$post_id,'unlike');
					// header("location: ./$data[0]/$data[1]");
				}
				else{
					$db->updateLike($_SESSION['user_id'],$post_id,'like');
					// header("location: ./$data[0]/$data[1]");
				}
			}
		}
	}
?>