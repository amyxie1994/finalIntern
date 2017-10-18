<?php
/**********************************************************
Author: Amy XIe
18/17/2017

This file includes user table sql operations.
***********************************************************/
include "supplierManagement.php";



$type=$_POST['type'];

	//user operations about supplier
switch ($type) {

	case "addSupplier":
		addSupplier();
		break;

	case "listSupplier":
		listSupplier();
		break;
	case "supplierHint":

		supplierHint();
		break;

	case "searchSupplier":
		searchSupplier();
		break;

	case "deleteSupplier":
		deleteSupplier();
		break;

	case "editSupplier":
		editSupplier();
		break;

	case "updateSupplier":
		updateSupplier();
		break;

	
	
	default:
		$Message = "Unknown operations!";
		break;
}

//update supplier
function updateSupplier()
{
	$supplierId = $_POST["supplierId"];
	$comName = $_POST["comName"];
	$address = $_POST["address"];
	$email = $_POST["email"];
	$conPerson = $_POST["conPerson"];
	$aliSite= $_POST["aliSite"];
	$ebsite = $_POST["ebsite"];
	$skype = $_POST["skype"];
	$fax = $_POST["fax"];
	$phoneNo = $_POST["phoneNo"];
	$role = $_POST["role"];
	$otherInfo = $_POST["otherInfo"];
	$supplierManager = new supplierManager();
	if($supplierManager->update($supplierId,$comName,$address,$email,$conPerson,$aliSite,$ebsite,$skype,$fax,$phoneNo,$role,$otherInfo))
		header('Location: ../supplierInfo.php');
	else
	{
		echo "<script>
		alert('Update supplier info failed, Please try again later!');
		location.reload();
		</script>";
		
	}
}

//edit supplier information
function editSupplier()
{

	$supplierId = $_POST["supplierId"];
	$supplierManager = new supplierManager();
	echo json_encode($supplierManager->getEditInfo($supplierId));

}

// search supplier information based on query
function searchSupplier()
{
	$query = $_POST["query"];
	$supplierManager = new supplierManager();
	$result = $supplierManager->searchSupplier($query,"CN");
	echo json_encode($result);

	/*$keywordManager = new keywordManager();

	if($keywordManger->check_keywork($query))
		$result = $supplierManager->searchSupplier($query,"KW");
	else
		$result = $supplierManager->searchSupplier($query,"CN");
*/

}

//delete supplier record
function deleteSupplier()
{

	$supplierId = $_POST["SupplierID"];
	$supplierManager = new supplierManager();

	if($supplierManager->deleteSupplier($supplierId))
		echo json_encode("Delete supplier Successfully!");
	else
		echo json_encode("Failed to delete suppllier!");

}

//get supplier hint 
function supplierHint()
{	
	


	$term = $_POST["query"];
	$supManager = new supplierManager();
	$result = $supManager->hintSupplier($term);

	echo json_encode($result);
}

function listSupplier()
{	
	session_start();
	$username = $_SESSION["username"];

	$userManager = new userManager();
	$userinfo = $userManager->get_info_basedOnName($username);

	if($userinfo[0]["vOrS_a_sudata"])
		$permission = "all";
	else 
		$permission = "part";
	//echo json_encode($permission);

	$supManager = new supplierManager();
	$result = $supManager->listSupplier($permission,$username);
	echo json_encode($result);
	
}

//add supplier information

function addSupplier()
{
	$comName = $_POST["comName"];
	$address = $_POST["address"];
	$email = $_POST["email"];
	$conPerson = $_POST["conPerson"];
	$aliSite= $_POST["aliSite"];
	$ebsite = $_POST["ebsite"];
	$skype = $_POST["skype"];
	$fax = $_POST["fax"];
	$phoneNo = $_POST["phoneNo"];
	$role = $_POST["role"];
	$otherInfo = $_POST["otherInfo"];
	//$creator = $_POST["creator"];

	session_start();
	$creator = $_SESSION["username"];
	$supManager = new supplierManager();
	$result = $supManager->addSupplier($comName,$address,$email,$conPerson,$aliSite,$ebsite,$skype,$fax,$phoneNo,$role,$otherInfo,$creator);

	if($result)
		header('Location: ../supplierInfo.php');
	else
	{
		echo "<script>
		alert('Add supplier info failed, Please try again later!');
		window.location.href='../addSupplier.php';
		</script>";
	}

	
}


?>