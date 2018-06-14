<?php

include "class/stock.class.php";

//instantiate class
$object = new stock();

//make database connection
$connect = $object->connect("localhost", "root", "", "inv");

if(!$connect){
	echo "mbola";
} else {
	//echo "success";
}

//adding new stock items
if(isset($_POST['add'])) {
	$name = $_POST['name'];
	$des = $_POST['desc'];
	$weight = $_POST['weight'];
	$size = $_POST['size'];
	$manuf = $_POST['manuf'];
	$type = $_POST['type'];
	$serial = $_POST['serial'];
	$categ = $_POST['category'];
	$quan = $_POST['quant'];
	$status = $_POST['status'];

	$insert = $object->insert($name, $des, $categ, $weight, $size, $manuf, $type, $serial, $quan, $status);

	if($insert) {
		echo "<div class='alert alert-success'>
        <button type='button' class='close' data-dismiss='alert'>×</button>
        Operation successful!
    </div>";
	} else {
		echo "Failed";
	}
}

//editing an item
if(isset($_POST['edits'])) {
	$ename = $_POST['ename'];
	$edes = $_POST['edesc'];
	$eweight = $_POST['eweight'];
	$esize = $_POST['esize'];
	$emanuf = $_POST['emanuf'];
	$etype = $_POST['etype'];
	$eserial = $_POST['eserial'];
	$ecateg = $_POST['ecategory'];
	$them = $_POST['theitem'];

	$insert = $object->update($ename, $edes, $ecateg, $eweight, $esize, $emanuf, $etype, $eserial, $them);

	if($insert) {
		echo "<div class='alert alert-success'>
        <button type='button' class='close' data-dismiss='alert'>×</button>
        Operation successful!
    </div>";
    echo "<script type='text/javascript'> window.location.href = 'stock.php'; </script>";
	} else {
		echo "Failed";
	}
}

//deleting a stock item
if(isset($_GET['del'])) {
	$itemid = $_GET['del'];
	#$status = 0;

	$del = $object->delete($itemid);

	if($del === TRUE) {
		echo "<div class='alert alert-warning'> Item deleted </div>";
	} else {
		
	}
}

?>