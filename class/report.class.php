<?php

	class report {
		var $con; //connection variable to be used througout the class

        //database connection function
		public function connect($host, $user, $pass, $db){
			$this->con = new mysqli ($host, $user, $pass, $db);

			if($this->con->connect_error){
				return false;
			} else {
				return true;
			}
		}

        //retrieve information from database. While query in view
		public function select(){
			$statement = mysqli_query($this->con, "SELECT * FROM report");

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

        //prepared statements are good for data escaping, better against SQL injection

        // s for string, i for integer, d for double, b for blob
		public function insert($rname, $itemid, $pay_id, $userid, $status){
			//status value set to 1
			$statement = $this->con->prepare("INSERT INTO report (name, item_id, pay_id, user_id, status) VALUES (?, ?, ?, ?, ?)");
            $statement->bind_param("siiii", $rname, $itemid, $pay_id, $userid, $status);
            
			$statement->execute();

			if($statement) {
				return true;
			} else {
				return false;
			}

			$statement->free_result();
		}

        //prepared statements are good for data escaping, better against SQL injection
		public function update($rname, $itemid, $pay_id, $userid){
			$statement = $this->con->prepare("UPDATE report SET name = ?, item_id = ?, pay_id = ?, user_id = ?");
			$statement->bind_param("siiii", $rname, $itemid, $pay_id, $userid);
			$statement->execute();

			if($statement) {
				return true;
			} else {
				return false;
			}

			$statement->free_result();
        }
        
        //prepared statements are good for data escaping, better against SQL injection
		public function delete($status, $reportid){
			//the status value in the form should be 0
			$statement = $this->con->prepare("UPDATE report SET status = ? WHERE report_id = ?)");
			$statement->bind_param("ii", $status, $reportid);
			$statement->execute();

			if($statement) {
				return true;
			} else {
				return false;
			}

			$statement->free_result();
		}

		
	}

?>