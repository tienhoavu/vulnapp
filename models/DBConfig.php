<?php 


	class DBConfig{
		private $hostname = "localhost";
		private $dbname = "vulnapp";
		private $username = "root";
		private $password = "";
		private $conn = '';

		function __construct(){
			$this->conn = new PDO("mysql:host=$this->hostname;dbname=$this->dbname",$this->username,$this->password);
			if(!$this->conn){
				echo "Database connect failed";
			}
		}
		public function addUser($email, $name, $username, $password,$permission){
			$query = "INSERT INTO users(email,name,username,password,permission) VALUES (:email,:name,:username,:password,:permission)";
			$stmt = $this->conn->prepare($query);
			$data = array(
				':email' => $email,
				':name' => $name,
				':username' => $username,
				':password' => password_hash($password, PASSWORD_DEFAULT),
				':permission' => $permission
			);
			foreach ($data as $key => &$value) {
				$stmt->bindParam($key,$value);
			}
			if($stmt->execute()){
				return TRUE;
			}
			return FALSE;
		}
		public function checkSignup($email,$username){
			$query = "SELECT * FROM users WHERE email = :email OR username = :username";
			$stmt = $this->conn->prepare($query);
			$data = array(
				':email' => $email,
				':username' => $username
			);
			foreach ($data as $key => &$value) {
				$stmt->bindParam($key,$value);
			}
			if($stmt->execute()){
				if($stmt->rowCount()>0){
					$result = $stmt->fetchAll();
					return $result;
				}
				return FALSE;
			}
		}
		public function checkSignin($email,$password){
			$query = "SELECT * FROM users WHERE email = :email";
			$stmt = $this->conn->prepare($query);
			$data = array(
				':email' => $email
			);
			foreach ($data as $key => &$value) {
				$stmt->bindParam($key,$value);
			}
			if($stmt->execute()){
				if($stmt->rowCount()>0){
					$result = $stmt->fetchAll();
					foreach ($result as $row) {
						if(password_verify($password, $row['password'])){
							return $result;
						}
						return FALSE;
					}
				}
				return FALSE;
			}
		}
		public function checkUser($username){
			$query = "SELECT * FROM users WHERE username = :username";
			$stmt = $this->conn->prepare($query);
			$data = array(
				':username' => $username
			);
			foreach ($data as $key => &$value) {
				$stmt->bindParam($key,$value);
			}
			if($stmt->execute()){
				if($stmt->rowCount()>0){
					$result = $stmt->fetchAll();
					return $result;
				}
				return FALSE;
			}
		}
		public function addFollow($user_id,$follow_user_id,$follow_status,$display_status){
			$query = "INSERT INTO follows(user_id,follow_user_id,follow_status,display_status) VALUES(:user_id,:follow_user_id,:follow_status,:display_status)";
			$stmt = $this->conn->prepare($query);
			$data = array(
				':user_id' => $user_id,
				':follow_user_id' => $follow_user_id,
				':follow_status' => $follow_status,
				':display_status' => $display_status
			);
			foreach ($data as $key => &$value) {
				$stmt->bindParam($key,$value);
			}
			if($stmt->execute()){
				return TRUE;
			}
			return FALSE;
		}
		public function updateFollow($user_id,$follow_user_id,$follow_status,$display_status){
			$query = "UPDATE follows SET follow_status = :follow_status,display_status = :display_status WHERE user_id = :user_id AND follow_user_id = :follow_user_id";
			$stmt = $this->conn->prepare($query);
			$data = array(
				':user_id' => $user_id,
				':follow_user_id' => $follow_user_id,
				':follow_status' => $follow_status,
				':display_status' => $display_status
			);
			foreach ($data as $key => &$value) {
				$stmt->bindParam($key,$value);
			}
			if($stmt->execute()){
				return TRUE;
			}
			return FALSE;
		}
		public function checkFollow($user_id,$follow_user_id){
			$query = "SELECT * FROM follows WHERE user_id = :user_id AND follow_user_id = :follow_user_id";
			$stmt = $this->conn->prepare($query);
			$data = array(
				':user_id' => $user_id,
				':follow_user_id' => $follow_user_id
			);
			foreach ($data as $key => &$value) {
				$stmt->bindParam($key,$value);
			}
			if($stmt->execute()){
				if($stmt->rowCount()>0){
					$result = $stmt->fetchAll();
					return $result;
				}
				return FALSE;
			}
			return FALSE;
		}
		public function checkRequestFollow($follow_user_id){
			$query = "SELECT * FROM users LEFT JOIN follows ON users.user_id = follows.user_id WHERE follows.follow_user_id = :follow_user_id AND follows.follow_status = :follow_status";
			$stmt = $this->conn->prepare($query);
			$data = array(
				':follow_user_id' => $follow_user_id,
				':follow_status' => 'waiting'
			);
			foreach ($data as $key => &$value) {
				$stmt->bindParam($key,$value);
			}
			if($stmt->execute()){
				if($stmt->rowCount()>0){
					$result = $stmt->fetchAll();
					return $result;
				}
				return FALSE;
			}
		}
		public function addPost($user_id,$post_content,$post_status){
			$query = "INSERT INTO posts(user_id,post_content,post_status) VALUES (:user_id,:post_content,:post_status)";
			$stmt = $this->conn->prepare($query);
			$data = array(
				':user_id' => $user_id,
				':post_content' => $post_content,
				':post_status' => $post_status
			);
			foreach ($data as $key => &$value) {
				$stmt->bindParam($key,$value);
			}
			if($stmt->execute()){
				return TRUE;
			}
			return FALSE;
		}
		public function getAllPosts(){
			$query = "SELECT * FROM posts LEFT JOIN users ON posts.user_id = users.user_id ORDER BY posts.post_id DESC LIMIT 10";
			$stmt = $this->conn->prepare($query);
			if($stmt->execute()){
				if($stmt->rowCount()>0){
					$result = $stmt->fetchAll();
					return $result;
				}
				return FALSE;
			}
			return FALSE;
		}
		public function getAllPostsByUsername($username){
			$query = "SELECT * FROM posts LEFT JOIN users ON posts.user_id = users.user_id WHERE users.username = :username ORDER BY posts.post_id DESC";
			$stmt = $this->conn->prepare($query);
			$data = array(
				':username' => $username
			);
			foreach ($data as $key => &$value) {
				$stmt->bindParam($key,$value);
			}
			if($stmt->execute()){
				if($stmt->rowCount()>0){
					$result = $stmt->fetchAll();
					return $result;
				}
				return FALSE;
			}
			return FALSE;
		}
		public function addLike($user_id,$post_id,$like_status){
			$query = "INSERT INTO likes(user_id,post_id,like_status) VALUES (:user_id,:post_id,:like_status)";
			$stmt = $this->conn->prepare($query);
			$data = array(
				':user_id' => $user_id,
				':post_id' => $post_id,
				':like_status' => $like_status
			);
			foreach ($data as $key => &$value) {
				$stmt->bindParam($key,$value);
			}
			if($stmt->execute()){
				return TRUE;
			}
			return FALSE;
		}
		public function updateLike($user_id,$post_id,$like_status){
			$query = "UPDATE likes SET like_status = :like_status WHERE user_id = :user_id AND post_id = :post_id";
			$stmt = $this->conn->prepare($query);
			$data = array(
				':user_id' => $user_id,
				':post_id' => $post_id,
				':like_status' => $like_status
			);
			foreach ($data as $key => &$value) {
				$stmt->bindParam($key,$value);
			}
			if($stmt->execute()){
				return TRUE;
			}
			return FALSE;
		}
		public function checkLikePost($user_id,$post_id){
			$query = "SELECT * FROM likes WHERE user_id = :user_id AND post_id = :post_id";
			$stmt = $this->conn->prepare($query);
			$data = array(
				':user_id' => $user_id,
				':post_id' => $post_id
			);
			foreach ($data as $key => &$value) {
				$stmt->bindParam($key,$value);
			}
			if($stmt->execute()){
				if($stmt->rowCount()>0){
					$result = $stmt->fetchAll();
					return $result;
				}
				return FALSE;
			}
			return FALSE;
		}
		public function checkPost($post_id){
			$query =  "SELECT * FROM posts WHERE post_id = :post_id";
			$stmt = $this->conn->prepare($query);
			$data = array(
				':post_id' => $post_id
			);
			foreach ($data as $key => &$value) {
				$stmt->bindParam($key,$value);
			}
			if($stmt->execute()){
				if($stmt->rowCount()>0){
					$result = $stmt->fetchAll();
					return $result;
				}
				return FALSE;
			}
			return FALSE;
		}
		public function countLike($post_id){
			$query = "SELECT COUNT(like_status) AS countLike FROM likes WHERE post_id = :post_id AND like_status = :like_status";
			$stmt = $this->conn->prepare($query);
			$data = array(
				':post_id' => $post_id,
				':like_status' => 'like'
			);
			foreach ($data as $key => &$value) {
				$stmt->bindParam($key,$value);
			}
			if($stmt->execute()){
				if($stmt->rowCount()>0){
					$result = $stmt->fetchAll();
					return $result;
				}
				return FALSE;
			}
			return FALSE;
		}
		public function updateAvatar($user_id,$avatar){
			$query = "UPDATE users SET avatar = :avatar WHERE user_id = :user_id";
			$stmt = $this->conn->prepare($query);
			$data = array(
				':user_id' => $user_id,
				':avatar' => $avatar
			);
			foreach ($data as $key => &$value) {
				$stmt->bindParam($key,$value);
			}
			if($stmt->execute()){
				return TRUE;
			}
			return FALSE;
		}
		public function getAvatar($user_id){
			$query = "SELECT avatar FROM users WHERE user_id = :user_id";
			$stmt = $this->conn->prepare($query);
			$data = array(
				':user_id' => $user_id
			);
			foreach ($data as $key => &$value) {
				$stmt->bindParam($key,$value);
			}
			if($stmt->execute()){
				if($stmt->rowCount()>0){
					$result = $stmt->fetchAll();
					return $result;
				}
				return FALSE;
			}
			return FALSE;
		}
	}
?>