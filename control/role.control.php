<?php

include "class/role.class.php";

$obj = new role();
$connect = $obj->connect("localhost", "root", "", "inv");

if(!$connect){
    echo "mbola";
} else {
    //echo "success";
}

?>