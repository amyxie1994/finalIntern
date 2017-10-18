<?php
/**********************************************************
Author: Amy XIe
18/17/2017

This file handle all the operations relatived to researchdata
***********************************************************/
include "productManagement.php";
include "researchDataManagement.php";
include "keywordManagement.php";
include "functions.php";
include "userManagement.php";

//based on request make operations
$type=$_POST['type'];

	
switch ($type) {

	case "listResearchData":
		$result = listData();
		echo json_encode($result);
		break;

	case "addResearchData":
		addResearchData();		
		break;

	case "updateResearchData":
		updateResearchData();		
		break;

	case "deleteResearchData":
		$Message = deleteData();
		echo json_encode($Message);
		break;
	case "QsearchData":
		$result = quickSearchData();
		echo json_encode($result);
		break;

	case "getResearchData":
		$result = getResearchData();
		echo json_encode($result);
		break;

	case "filter":
		$result = filterSearch();
		echo json_encode($result);
		break;
	
	default:
		$Message = "Unknown operations!";
		echo json_encode($Message);
		break;
}

// search by filter conditions
function filterSearch()
{
	$name= $_POST["name"];
	$kw = $_POST["keyword"];
	$LBSR = $_POST["LBSR"];
	$HBSR = $_POST["HBSR"];
	$LSales = $_POST["LSales"];
	$HSales = $_POST["HSales"];
	$LAPrice = $_POST["LAPrice"];
	$HAPrice = $_POST["HAPrice"];
	$LFBA = $_POST["LFBA"];
	$HFBA = $_POST["HFBA"];
	$LEST = $_POST["LEST"];
	$HEST = $_POST["HEST"];
	$LLC = $_POST["LLC"];
	$HLC = $_POST["HLC"];


	session_start();
	$user = $_SESSION["username"];

	$userManager = new userManager();
	$userInfo = $userManager->get_info_basedOnName($user);
	$permission = $userInfo[0]["vOrS_a_redata"];

	$reDataManager = new researchDataManager();
	return $reDataManager->filterSearch($name,$kw ,$LBSR ,$HBSR ,$LSales ,$HSales ,$LAPrice ,$HAPrice ,$LFBA ,$HFBA ,$LEST ,$HEST ,$LLC ,$HLC,$user,$permission);

}

//get data
function getResearchData()
{
	$id = $_POST["id"];
	$reDataManager = new researchDataManager();

	return $reDataManager->getResearchData($id);
}
//update
function updateResearchData()
{
	$id = $_POST["reId"];
	$name= $_POST["proName"];
	$AliBusinessCard= $_POST["AliBusinessCard"];
	$Seller= $_POST["Seller"];
	$sellerPrice=floatval($_POST["sellerPrice"]);
	$AliPrice= floatval($_POST["AliPrice"]);
	
	$BSR = (int)$_POST["BSR"];
	$fba=floatval($_POST["fba"]);
	$estProfit=floatval($_POST["estProfit"]);
	$Life_cycle= (int)$_POST["Life_cycle"];
	$otherInfo= $_POST["otherInfo"];

	$reDataManager = new researchDataManager();	
	if($reDataManager->updateResearchData($id,$name,$AliBusinessCard,$Seller,$sellerPrice,$AliPrice,$fba,$estProfit,$Life_cycle,$otherInfo,$BSR))
	{
		$mainKw = $_POST["mainKW"];
		$otherKw = $_POST["otherKW"];

		updateKw($id,$mainKw,$otherKw);

		echo "<script>
		window.location.href='../researchDataInfo.php';
			alert('Update Successfully!');
			</script>";
	}
	else
		echo "<script>
			
			window.location.href='../editResearchData.php?reId=".$id."';
			alert('Update  failed, Please try again later!');
			</script>";
}

//quick search based on keywrod
function quickSearchData()
{	

	$query = $_POST["query"];
	$reDataManager = new researchDataManager();

	session_start();
	$user = $_SESSION["username"];

	$userManager = new userManager();
	$userInfo = $userManager->get_info_basedOnName($user);
	$permission = $userInfo[0]["vOrS_a_redata"];


	return $reDataManager->quickSearch(getKwId($query),$permission,$user);
}
//delete
function deleteData()
{
	
	$id = $_POST["query"];
	$reDataManager = new researchDataManager();

	if($reDataManager->deleteData($id))
		return "Delete Successfully!";
	else
		return "Delete operation fail, please try again!";
}
// list data
function listData()
{	
	session_start();
	$user = $_SESSION["username"];

	$userManager = new userManager();
	$userInfo = $userManager->get_info_basedOnName($user);
	$permission = $userInfo[0]["vOrS_a_redata"];

	$reDataManager = new researchDataManager();
	return $reDataManager->listData($user,$permission);
}

//add record
function addResearchData()
{

	$name= $_POST["proName"];
	$AliBusinessCard= $_POST["AliBusinessCard"];
	$Seller= $_POST["Seller"];
	$sellerPrice=floatval($_POST["sellerPrice"]) ;
	$AliPrice= floatval($_POST["AliPrice"]);
	
	$BSR = (int)$_POST["BSR"];
	$fba=floatval($_POST["fba"]);
	$estProfit=floatval($_POST["estProfit"]);
	$Life_cycle= (int)$_POST["Life_cycle"];
	$otherInfo= $_POST["otherInfo"];
	session_start();
	$Creator = $_SESSION["username"];

	
	
	$productManager = new productManager();
	$productId = $productManager->addProductName($name);

	


	if($productId!=0)
	{	
		$reDataManager = new researchDataManager();	
		$mainKw = $_POST["mainKW"];
		$otherKw = $_POST["otherKW"];

		updateKw($productId,$mainKw,$otherKw);
		

		if($reDataManager->addResearchData($productId,$name,$AliBusinessCard,$Seller,$sellerPrice,$AliPrice,$fba,$estProfit,$Life_cycle,$otherInfo,$Creator,$BSR))
			echo "<script>
		window.location.href='../researchDataInfo.php';
			alert('Add Successfully!');
			</script>";
		else
			echo "<script>
			
			window.location.href='../addResearchData.php';
			alert('Add Product into qutation failed, Please try again later!');
			</script>";
	}
	else
	{ 
		echo "<script>
	
		window.location.href='../addResearchData.php';
			alert('Add Product into qutation failed, Please try again later!');
		</script>";
	}
	
}





?>