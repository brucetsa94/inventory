<?php

	class paydetail {
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
			$statement = mysqli_query($this->con, "SELECT * FROM paydetails");

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
		public function insert($quantity, $itemid, $price, $status){
			//status value set to 1
			$statement = $this->con->prepare("INSERT INTO paydetails (quantity, item_id, price, status) VALUES (?, ?, ?, ?)");
            $statement->bind_param("issiii", $quantity, $itemid, $price, $status);
            
			$statement->execute();

			if($statement) {
				return true;
			} else {
				return false;
			}

			$statement->free_result();
		}

        //prepared statements are good for data escaping, better against SQL injection
		public function update($quantity, $itemid, $price){
			$statement = $this->con->prepare("UPDATE paydetails SET quantity = ?, item_id = ?, price = ?");
			$statement->bind_param("iii", $quantity, $itemid, $price);
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
			$statement = $this->con->prepare("UPDATE paydetails SET status = ? WHERE pydet_id = ?)");
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