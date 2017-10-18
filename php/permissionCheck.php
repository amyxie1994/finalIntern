<?php
/**********************************************************
Author: Amy XIe
18/17/2017

This file checks permissions of users based on their operations
***********************************************************/

include "userManagement.php";


$type = $_POST["type"];

session_start();
$username = $_SESSION["username"];
$userManager = new userManager();
$userInfo=$userManager->get_info_basedOnName($username);

switch($type){
	case "addSupplier":
	   checkPermission($userInfo,"add_Supplier");
	break;
	case "addResearchData":
	   checkPermission($userInfo,"add_ReData");
	break;
	default:
	break;
}


function checkPermission($userInfo,$type)
{
	$value=$userInfo[0][$type];
	if($value)
		echo json_encode("permit");
	else
		echo json_encode("reject");
}


?>