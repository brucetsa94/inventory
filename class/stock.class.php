<?php

	class stock {
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
			$statement = mysqli_query($this->con, "SELECT * FROM items WHERE status = 1");

			if($statement) {
				return $statement;
			} else {
				return false;
			}
		}

		public function selectStock(){
			$statement = $this->con->prepare("SELECT * FROM category JOIN items ON items.category_id = category.category_id ");
			//$statement->bind_param("i", $item);
			$statement->execute();

			if($statement) {
				$result = $statement->num_rows;
				if($result >= 1) {
				return $statement;
			} else {
				echo "No Results";
				return;
			}

			
		} else {
			return false;
			}
			$statement->free_result();
		}

		public function selectEdit($item){
			$statement = mysqli_query($this->con, "SELECT * FROM items WHERE item_id = '$item' ");

			if($statement) {
				return $statement;
			} else {
				return false;
			}

			$statement->free_result();
		}

		public function insert($name, $des, $categ, $weight, $size, $manuf, $type, $serial, $quan, $status){
			//status value set to 1
			$statement = $this->con->prepare("INSERT INTO items (item_name, description, category_id, weight, size, manufacturer, type, serial_number, quantity, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
			$statement->bind_param("ssisssssii", $name, $des, $categ, $weight, $size, $manuf, $type, $serial, $quan, $status);
			$statement->execute();

			if($statement) {
				return true;
			} else {
				return false;
			}

			$statement->free_result();
		}

		public function update($ename, $edes, $ecateg, $eweight, $esize, $emanuf, $etype, $eserial, $them){
			$statement = $this->con->prepare("UPDATE items SET item_name = ?, description = ?, category_id = ?, weight = ?, size = ?, manufacturer = ?, type = ?, serial_number = ? WHERE item_id = ?");
			$statement->bind_param("ssisssssi", $ename, $edes, $ecateg, $eweight, $esize, $emanuf, $etype, $eserial, $them);
			$statement->execute();

			if($statement) {
				return true;
			} else {
				return false;
			}

			$statement->free_result();
		}

		public function delete($itemid){
			//the status value in the form should be 0
			$statement = $this->con->prepare("UPDATE items SET status = 0 WHERE item_id = ?");
			$statement->bind_param("i", $itemid);
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