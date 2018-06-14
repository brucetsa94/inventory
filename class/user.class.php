<?php

	class users {
		var $con;

		public function connect($host, $user, $pass, $db){
			$this->con = new mysqli ($host, $user, $pass, $db);

			if($this->con->connect_error){
				return false;
			} else {
				return true;
			}
		}

		public function select(){
			$statement = mysqli_query($this->con, "SELECT *, DATE_FORMAT(dob, '%d %M %Y') AS dob FROM users");

			if($statement) {
				$result = mysqli_num_rows($statement);

				if($result > 0) {
					return $statement;
				} else {
					return false;
				}
			} else {
				return false;
			}

			$statement->free_result();
		}
		public function selectEdit($userid){
			$statement = mysqli_query($this->con, "SELECT * FROM users WHERE user_id = '$userid'");

			if($statement) {
				$result = mysqli_num_rows($statement);

				if($result > 0) {
					return $statement;
				} else {
					return false;
				}
			} else {
				return false;
			}

			$statement->free_result();
		}

		public function selectLogged(){
			$statement = mysqli_query($this->con, "SELECT * FROM users WHERE user_id = '".$_SESSION['user']."'");

			if($statement) {
				$result = mysqli_num_rows($statement);

				if($result == 1) {
					return $statement;
				} else {
					return false;
				}
			} else {
				return false;
			}

			$statement->free_result();
		}

		public function selectRole(){
			$statement = mysqli_query($this->con, "SELECT *, DATE_FORMAT(dob, '%d %M %Y') AS dob FROM users JOIN role ON role.role_id = users.role_id");

			if($statement) {
				$result = mysqli_num_rows($statement);

				if($result > 0) {
					return $statement;
				} else {
					return false;
				}
			} else {
				return false;
			}

			$statement->free_result();
		}

		public function insert($name, $dob, $email, $phone, $username, $pass2, $role, $status){
			//status value set to 1
			$statement = $this->con->prepare("INSERT INTO users (name, dob, email, phone, username, passw, role_id, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
			$statement->bind_param("ssssssii", $name, $dob, $email, $phone, $username, $pass2, $role, $status);
			$statement->execute();

			if($statement) {
				return true;
			} else {
				return false;
			}

			$statement->free_result();
		}

		public function update($ename, $edob, $eemail, $ephone, $eusername, $epass2, $euser){
			$statement = $this->con->prepare("UPDATE users SET name = ?, dob = ?, email = ?, phone = ?, username = ?, passw = ? WHERE user_id = ? ");
			$statement->bind_param("ssssssi", $ename, $edob, $eemail, $ephone, $eusername, $epass2, $euser);
			$statement->execute();

			if($statement) {
				return true;
			} else {
				return false;
			}

			$statement->free_result();
		}

		public function delete($userid){
			//the status value in the form should be 0
			$statement = $this->con->prepare("UPDATE users SET status = 0 WHERE user_id = ?");
			$statement->bind_param("i", $userid);
			$statement->execute();

			if($statement) {
				return true;
			} else {
				return false;
			}

			$statement->free_result();
		}

		public function activate($userid){
			//the status value in the form should be 0
			$statement = $this->con->prepare("UPDATE users SET status = 1 WHERE user_id = ?");
			$statement->bind_param("i", $userid);
			$statement->execute();

			if($statement) {
				return true;
			} else {
				return false;
			}

			$statement->free_result();
		}

		public function updatePass($username, $pass){
			$statement = $this->con->prepare("UPDATE users SET passw = ? WHERE username = ? ");
			$statement->bind_param("ss", $pass, $username);
			$statement->execute();

			if($statement) {
				return true;
			} else {
				return false;
			}

			$statement->free_result();
		}


	}

	class login extends users {

		var $con;

		public function connect($host, $user, $pass, $db){
			$this->con = new mysqli ($host, $user, $pass, $db);

			if($this->con->connect_error){
				return false;
			} else {
				return true;
			}
		}

		function userLogin($username, $passw) {
			$log = mysqli_query($this->con, "SELECT user_id, username, passw FROM users WHERE username = '$username' AND passw = '$passw'");
			$userdata = $log->fetch_assoc;
			$count = $userdata->num_rows;

			if($count == 1) {
				$_SESSION['login'] = true;
				$_SESSION['user_id'] = $userdata['user_id'];
				return true;
				} else {
					return false;
				}
		}

		function role($role) {
			$role = mysqli_query($this->con, "SELECT role.role_id, role.role_type, users.role_id FROM role JOIN users ON role.role_id = users.role_id WHERE users.username = '".$role."'  ");
		}
	}

?>