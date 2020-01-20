<?php 


?>


<?php 

	if ($getAllPostsByUsername!=FALSE ) {
		foreach ($getAllPostsByUsername as $row) {
			if($row['post_status']=='public'){
?>
<div class="media text-muted pt-3">
          <img class="rounded-circle mr-2" src="https://api.adorable.io/avatars/285/abott@adorable.png" alt=""
            style="height: 32px;">
          <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
            <span class="d-block text-gray-dark"><strong><a style="color:#6c757d;" href="/vulnapp/profile/<?=$row['username']?>"><!-- Nguyen Anh Tien --><?=$row['name']?></a></strong><span>&nbsp;@<?=$row['username']?></span></span>
           <!--  Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris
            condimentum nibh, ut fermentum massa justo sit amet risus. -->
            <?=$row['post_content']?>
          </p>
          <small class="ml-2">
            <a href="/vulnapp/profile/<?=$row['username']?>&like=<?=$row['post_id']?>"><?php $countLike=$db->countLike($row['post_id']);
            	echo $countLike[0]['countLike']." Likes";
            ?></a>
            <br>
            <a href="" class="text-muted">Report</a>
          </small>
        </div>
<?php 

			}
			else{
				if($row['user_id']==$_SESSION['user_id']){

?>

  <div class="media text-muted pt-3">
          <img class="rounded-circle mr-2" src="https://api.adorable.io/avatars/285/deptrai@adorable.png" alt=""
            style="height: 32px;">
          <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
            <span class="d-block text-gray-dark"><strong><a style="color:#6c757d;" href="/vulnapp/profile/<?=$row['username']?>"><!-- Nguyen Anh Tien --><?=$row['name']?></a></strong><span>&nbsp;@<?=$row['username']?></span></span>
           <!--  Private link! Only followers can see. --><?=$row['post_content']?>
          </p>
          <small class="ml-2">
            <a href="/vulnapp/profile/<?=$row['username']?>&like=<?=$row['post_id']?>"><?php $countLike=$db->countLike($row['post_id']);
            	echo $countLike[0]['countLike']." Likes";
            ?></a>
            <br>
            <a href="#" class="text-muted">Report</a>
          </small>
        </div>



<?php				
				}
				else{
					$check = $db->checkFollow($_SESSION['user_id'],$row['user_id']);
					if($check !=FALSE && $check[0]['follow_status']=='follow'){
?>


<div class="media text-muted pt-3">
          <img class="rounded-circle mr-2" src="https://api.adorable.io/avatars/285/deptrai@adorable.png" alt=""
            style="height: 32px;">
          <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
            <span class="d-block text-gray-dark"><strong><a style="color:#6c757d;" href="/vulnapp/profile/<?=$row['username']?>"><!-- Nguyen Anh Tien --><?=$row['name']?></a></strong><span>&nbsp;@<?=$row['username']?></span></span>
           <!--  Private link! Only followers can see. --><?=$row['post_content']?>
          </p>
          <small class="ml-2">
            <a href="/vulnapp/profile/<?=$row['username']?>&like=<?=$row['post_id']?>"><?php $countLike=$db->countLike($row['post_id']);
            	echo $countLike[0]['countLike']." Likes";
            ?></a>
            <br>
            <a href="#" class="text-muted">Report</a>
          </small>
        </div>


<?php						
					}
					else{
						
?>

  <div class="media text-muted pt-3">
          <img class="rounded-circle mr-2" src="https://api.adorable.io/avatars/285/deptrai@adorable.png" alt=""
            style="height: 32px;">
          <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
            <span class="d-block text-gray-dark"><strong><a style="color:#6c757d;" href="/vulnapp/profile/<?=$row['username']?>"><?=$row['name']?></a></strong><span>&nbsp;@<?=$row['username']?></span></span>
            Private link! Only followers can see.
          </p>
          <small class="ml-2">
            <a href="/vulnapp/profile/<?=$row['username']?>&like=<?=$row['post_id']?>"><?php $countLike=$db->countLike($row['post_id']);
            	echo $countLike[0]['countLike']." Likes";
            ?></a>
            <br>
            <a href="#" class="text-muted">Report</a>
          </small>
        </div>
<?php

					}
				}
			}
		}
	}
?>


<!-- <div class="media text-muted pt-3">
                <img class="rounded-circle mr-2" src="https://api.adorable.io/avatars/285/deptrai@adorable.png" alt=""
                  style="height: 32px;">
                <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                  <span class="d-block text-gray-dark"> --><!-- <strong>Nguyen Anh Tien</strong> --><!-- <strong><a style="color:#6c757d;" href="#">Nguyen Anh Tien</a></strong><span>&nbsp;@userA</span></span>
                  Private link! Only followers can see.
                </p>
                <small class="ml-2">
                  <a href="#">12 Likes</a>
                  <br>
                  <a href="#" class="text-muted">Report</a>
                </small>
              </div>
              <div class="media text-muted pt-3">
                <img class="rounded-circle mr-2" src="https://api.adorable.io/avatars/285/khanhact@adorable.png" alt=""
                  style="height: 32px;">
                <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                  <span class="d-block text-gray-dark"> --><!-- <strong>Nguyen Anh Tien</strong> --><!-- <strong><a style="color:#6c757d;" href="#">Nguyen Anh Tien</a></strong><span>&nbsp;@userA</span></span></span>
                  Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor
                  mauris
                  condimentum nibh, ut fermentum massa justo sit amet risus.
                </p>
                <small class="ml-2">
                  <a href="#">12 Likes</a>
                  <br>
                  <a href="#" class="text-muted">Report</a>
                </small>
              </div> -->