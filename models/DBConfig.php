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
	}
?>