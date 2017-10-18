<?php
/**********************************************************
Author: Amy XIe
18/17/2017

This file handle all the operations relatived to product.
***********************************************************/
include "productManagement.php";
include "keywordManagement.php";
include "fileOperations.php";
include "functions.php";
include "userManagement.php";


$type=$_POST['type'];
//echo json_encode($type);
// Based on user operations, call different functions	
switch ($type) {

	case "productNameHint":
		$result = productNameHint();
		echo json_encode($result);
		break;

	case "getMainKW":
		$result = getMainKW();
		echo json_encode($result);
		break;

	case "getOtherKW":
		$result = getOtherKW();
		echo json_encode($result);
		break;

	case "keywordHint":
		$result = keywordHint();
		echo json_encode($result);
		break;

	case "addProduct":
		addProduct();		
		break;

	case "deleteProduct":
		$result = deleteProduct();
		echo json_encode($result);
		break;

	case "getProductList":
		$result=getList();
		echo json_encode($result);
		break;

	case "showProduct":
		$result=showProduct();
		echo json_encode($result);
		break;

	case "loadProductList":	
		$result = loadProductList();
		echo json_encode($result);
	break;

	case "editProduct":
		editProduct();
		break;
	
	default:
		$Message = "Unknown operations!";
		echo json_encode($Message);
		break;
}

// load product list 
function loadProductList()
{	
	$query = $_POST['query'];
	$keywordManager = new keywordManager();
	$keywordList = $keywordManager->getKeywordList($query);

	$result = $keywordManager->getProductInfoByKW($keywordList);

	$userManager = new userManager();
	session_start();
	$user = $_SESSION["username"];
	$userInfo = $userManager->get_info_basedOnName($user);
	$permission = $userInfo[0]["vOrS_a_sudata"];

	$productManager = new productManager();
	return $productManager->getProductInfo($result,$user,$permission);

	//return $result;
}

//get the hint of product's name
function productNameHint()
{
	$query = $_POST['query'];
	$productManager = new productManager();
	return $productManager->getNameHint($query);
}


// edit product info
function editProduct()
{
	$name= $_POST["productName22"];
$supplierId = $_POST["editsupplierId"];
	

	$Craft = $_POST["Craft22"];
	$Psize = $_POST["PSize22"];

	$STime = $_POST["STime22"];
	$Price = $_POST["Price22"];

	$Size = $_POST["Size22"];
	$PLt = $_POST["PLt22"];

	$SampleSize = $_POST["Csize22"];
	$Model = $_POST["Model22"];
	
	$QTY = $_POST["QTY22"];
	$Packing = $_POST["Packing22"];

	$OtherInfo = $_POST["OtherInfo22"];
	$id = $_POST["EditProductId"];

	
	$productManager = new productManager();
	if($productManager->editProduct($id,$name,$Craft,$Psize,$STime,$Price,$Size,$PLt,$SampleSize,$Model,$QTY,$Packing,$OtherInfo))
	{	
		$mainKw = $_POST["mainKW22"];
		$otherKw = $_POST["otherKW22"];

		updateKw($id,$mainKw,$otherKw);
		echo "<script>
		window.location =\"../addProduct.php?supplier_id=".$supplierId."\";
		alert('Update Successfully!');
		</script>";


	}
	else{
		
		echo "<script>
		window.location =\"../addProduct.php?supplier_id=".$supplierId."\";
		alert('Update Product into qutation failed, Please try again later!');
		
		</script>";
}

	/*if($productId!=0)
	{	
		$mainKw = $_POST["mainKW"];
		$otherKw = $_POST["otherKW"];

		updateKw($productId,$mainKw,$otherKw);
		
		$imgNum = getUploadFile($productId);
		updateImgNum($productId,$imgNum);
//
		echo "<script>
		window.location =\"../addProduct.php?supplier_id=".$SupplierId."\";
		alert('Add Successfully!');
		</script>";
	}
	else
	{ 
		echo "<script>
		window.location =\"../addProduct.php?supplier_id=".$SupplierId."\";
		alert('Add Product into qutation failed, Please try again later!');
		location.reload();
		</script>";
	}
	*/
}

//Add product into db
function addProduct()
{

	$name= $_POST["productName"];
	$SupplierId = $_POST["supplierID"];

	$Craft = $_POST["Craft"];
	$Psize = $_POST["PSize"];

	$STime = $_POST["STime"];
	$Price = $_POST["Price"];

	$Size = $_POST["Size"];
	$PLt = $_POST["PLt"];

	$SampleSize = $_POST["Csize"];
	$Model = $_POST["Model"];
	
	$QTY = $_POST["QTY"];
	$Packing = $_POST["Packing"];

	$OtherInfo = $_POST["OtherInfo"];
	$Res_Mark = 0;
	
	$productManager = new productManager();
	$productId = $productManager->addProduct($name,$SupplierId,$Craft,$Psize,$STime,$Price,$Size,$PLt,$SampleSize,$Model,$QTY,$Packing,$OtherInfo,$Res_Mark);

	if($productId!=0)
	{	
		$mainKw = $_POST["mainKW"];
		$otherKw = $_POST["otherKW"];

		updateKw($productId,$mainKw,$otherKw);
		
		$imgNum = getUploadFile($productId);
		updateImgNum($productId,$imgNum);
//
		echo "<script>
		window.location =\"../addProduct.php?supplier_id=".$SupplierId."\";
		alert('Add Successfully!');
		</script>";
	}
	else
	{ 
		echo "<script>
		window.location =\"../addProduct.php?supplier_id=".$SupplierId."\";
		alert('Add Product into qutation failed, Please try again later!');
		location.reload();
		</script>";
	}
	
}



?>