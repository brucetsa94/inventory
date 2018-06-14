<?php

include "class/paydetail.class.php";

$object = new paydetail();
$connect = $object->connect("localhost", "root", "", "inv");

if(!$connect){
	echo "mbola";
} else {
	//echo "success";
}

//adding new data, data passes from the form to the class and back
if(isset($_POST['add'])) {
	$quantity = $_POST['quantity'];
	$itemid = $_POST['itemid'];
	$price = $_POST['price'];
	$status = $_POST['status'];

	$insert = $object->insert($quantity, $itemid, $price, $status);

	if($insert) {
		echo "<div class='alert alert-success'>
        <button type='button' class='close' data-dismiss='alert'>×</button>
        Operation successful!
    </div>";
	} else {
		echo "Faileddddd";
	}
}

//updating existing data
if(isset($_POST['upd'])) {
	$quantity = $_POST['quantity'];
	$itemid = $_POST['itemid'];
	$price = $_POST['price'];

	$update = $object->update($quantity, $itemid, $price, $status);

	if($update) {
		echo "<div class='alert alert-success'>
        <button type='button' class='close' data-dismiss='alert'>×</button>
        Operation successful!
    </div>";
	} else {
		echo "Faileddddd";
	}
}


//deleting status
if(isset($_POST['del'])) {
	$status = $_POST['status'];
	$payid = $_POST['payid'];

	$delete = $object->delete($status, $payid);

	if($delete) {
		echo "<div class='alert alert-success'>
        <button type='button' class='close' data-dismiss='alert'>×</button>
        Operation successful!
    </div>";
	} else {
		echo "Faileddddd";
	}
}

?>