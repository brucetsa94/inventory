<?php

include "class/payments.class.php";

$object = new payment();
$connect = $object->connect("localhost", "root", "", "inv");

if(!$connect){
	echo "mbola";
} else {
	//echo "success";
}

//adding new data, data passes from the form to the class and back
if(isset($_POST['add'])) {
	$user = $_POST['user'];
	$customer = $_POST['customer'];
	$date = $_POST['dates'];
	$amount = $_POST['amount'];
	$total = $_POST['total'];
	$status = $_POST['status'];

	$insert = $object->insert($user, $customer, $date, $amount, $total, $status);

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
	$user = $_POST['user'];
	$customer = $_POST['customer'];
	$date = $_POST['dates'];
	$amount = $_POST['amount'];
	$total = $_POST['total'];

	$update = $object->update($user, $customer, $date, $amount, $total);

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