<?php

	 class category {
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
			$statement = mysqli_query($this->con, "SELECT * FROM category");

			if($statement) {
				$result = $statement->num_rows;

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

		public function insert($catname, $status){
			//status value set to 1
			$statement = $this->con->prepare("INSERT INTO category (category_name, status) VALUES (?, ?)");
			$statement->bind_param("si", $name, $status);
			$statement->execute();

			if($statement) {
				return true;
			} else {
				return false;
            }
            
            $statement->free_result();
		}

		public function update($catname, $catid){
            //prepare statements are good to escape SQL injection
			$statement = $this->con->prepare("UPDATE category SET category_name = ? WHERE category_id = ?");
			$statement->bind_param("si", $catname, $catid);
			$statement->execute();

			if($statement) {
				return true;
			} else {
				return false;
			}

			$statement->free_result();
		}

		public function delete($catid, $status){
			//the status value in the form should be 0
			$statement = $this->con->prepare("UPDATE category SET status = ? WHERE category_id = ?");
			$statement->bind_param("si", $status, $catid);
			$statement->execute();

			if($statement) {
				return true;
			} else {
				return false;
			}
			 $statement->free_result();
        }

        //JOIN THE STOCK CATEGORY
        public function selectStock($item){
			$statement = $this->con->prepare("SELECT * FROM category JOIN items ON items.category_id = category.category_id WHERE items.category_id = ? ");
			$statement->bind_param("i", $item);
			$statement->execute();

			if($statement) {
				//$result = $statement->num_rows;
				//if($result > 0) {
				return $statement;
			} else {
				echo "No Results";
				return;
			}

			$statement->free_result();
		}
        
       
    }

?>