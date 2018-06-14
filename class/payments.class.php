<?php

	class payment {
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
			$statement = mysqli_query($this->con, "SELECT * FROM payments");

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
		public function insert($user, $customer, $date, $amount, $total, $status){
			//status value set to 1
			$statement = $this->con->prepare("INSERT INTO payments (user_id, customer_name, date_submitted, amount, total, status) VALUES (?, ?, ?, ?, ?, ?)");
            $statement->bind_param("issiii", $user, $customer, $date, $amount, $total, $status);
            
			$statement->execute();

			if($statement) {
				return true;
			} else {
				return false;
			}

			$statement->free_result();
		}

        //prepared statements are good for data escaping, better against SQL injection
		public function update($user, $customer, $date, $amount, $total){
			$statement = $this->con->prepare("UPDATE payments SET user_id = ?, customer_name = ?, date_submitted = ?, amount = ?, total = ?");
			$statement->bind_param("issii", $user, $customer, $date, $amount, $total);
			$statement->execute();

			if($statement) {
				return true;
			} else {
				return false;
			}

			$statement->free_result();
        }
        
        //prepared statements are good for data escaping, better against SQL injection
		public function delete($status, $payid){
			//the status value in the form should be 0
			$statement = $this->con->prepare("UPDATE payments SET status = ? WHERE pay_id = ?)");
			$statement->bind_param("ii", $status, $payid);
			$statement->execute();

			if($statement) {
				return true;
			} else {
				return false;
			}
		}

		$statement->free_result();
	}

?>