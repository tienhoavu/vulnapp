<?php 
	session_start();
	if(isset($_SESSION['user_id'])) {
		if($_SESSION['permission']==0){
			require_once("./views/admin.php");
		}
		else{
			if($_SESSION['permission']==1){
				if(isset($_POST['share'])){
					$check_post = 1;
					if(isset($_POST['post_content']) && strlen($_POST['post_content'])){
						$post_content = htmlspecialchars($_POST['post_content']);
					}
					else{
						$check_post = 0;
					}
					if(isset($_POST['post_status']) && ($_POST['post_status']=='public' || $_POST['post_status'] == 'private')){
						$post_status = htmlspecialchars($_POST['post_status']);
					}
					else{
						$check_post = 0;
					}
					if($check_post==1){
						$db->addPost($_SESSION['user_id'],$post_content,$post_status);
					}
				}
				
				require_once("./views/index_loggedin.php");
			}
		}
	}
	else{
		require_once("./views/index.php");
	}
?>