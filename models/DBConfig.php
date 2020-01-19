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
	}
?>