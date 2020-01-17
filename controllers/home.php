<?php 
	session_start();
	if(isset($_SESSION['user_id'])) {
		if($_SESSION['permission']==0){
			require_once("./views/admin.php");
		}
		else{
			if($_SESSION['permission']==1){
				require_once("./views/index_loggedin.php");
			}
		}
	}
	else{
		require_once("./views/index.php");
	}
?>