<?php
/**********************************************************
Author: Amy XIe
18/17/2017

This file  contains functions which will be repeated in the system to reduce redundancy.
***********************************************************/
//get keyword hint 
function keywordHint()
{
	$query = $_POST['query'];
	$keywordManager = new keywordManager();
	return $keywordManager->keywordHint($query);
}

// show product information based on id
function showProduct()
{
	$productId = $_POST["productId"];
	$productManager = new productManager();
	
	return $productManager->showProduct($productId);
}
//get list of product of one supplier
function getList()
{
	$SupplierId = $_POST["supplierId"];
	//return $SupplierId;
	$productManager = new productManager();
	//return $SupplierId;
	return $productManager->productList($SupplierId);
}
//delete product record
function deleteProduct()
{
	$productId = $_POST["productId"];
	$productManager = new productManager();
	return $productManager->deleteProduct($productId);
}

//update image number
function updateImgNum($productId,$imgNum)
{	
	$productManager = new productManager();
	$productManager->updateImgNum($productId,$imgNum);
}

//Update keyword 
function updateKw($productId,$mainKw,$otherKw)
{
	$otherkws = explode(",", $otherKw);
	$tag=[];

	$keyword[0]=$mainKw;
	for($i=1;$i<=count($otherkws);$i++)
		$keyword[$i]=$otherkws[$i-1];
	//print_r($keyword);


	for($i=0;$i<count($keyword);$i++)
	{
		$tag[$i]=getKwId($keyword[$i]);
	}

	if($tag[0]==0)
	{	
		

		$newId=addKeyword($mainKw);
		addMainKw($productId,$newId);
		updatePreKw($newId,$tag,0);
		$tag[0]=$newId;
	}
	else if(!mainKWExistRelation($productId, $tag[0]))
	{
		addMainKw($productId,$tag[0]);

	}


	for($i=1;$i<count($keyword);$i++)
	{	

		if($tag[$i]==0&&$keyword[$i]!="")
		{
			$newId=addKeyword($keyword[$i]);
			updatePreKw($newId,$tag,$i);
			//addOtherKw($productId,$newId);

		}
		else if(!otherKWExistRelation($productId, $tag[i]))
			addOtherKw($productId,$tag[$i]);
	}
}


//Update previous keyword based on current new added keyword
function updatePreKw($newId,$tag,$position)
{

	for($i= 0;$i<count($tag);$i++)
	{	
		if($i != $position && $tag[$i]!= 0)
		{
	
			$products=getProducts($tag[$i]);
			
			if($products!=null)
				for($j=0;$j<count($products);$j++){
				
					//echo $products[$j]["Product_id"];
					addOtherKw((int)$products[$j]["Product_id"],$newId);
				}
		}
	}
}

//Based on keyword get product list
function getProducts($keywordId)
{
	$keywordManager = new keywordManager();
	return $keywordManager->getProducts($keywordId);
}

// Check whether other keyword relationshop exist or not
function otherKWExistRelation($productId, $keyword)
{
	$keywordManager = new keywordManager();
	if(count($keywordManager->otherKWExistRelation($productId,$keyword))>0)
		return true;
	else
		return false;
}

// Check whether mainkeyword relationship exist or not
function mainKWExistRelation($productId, $keyword)
{
	$keywordManager = new keywordManager();
	if(count($keywordManager->mainKWExistRelation($productId,$keyword))>0)
		return true;
	else
		return false;
}
// Add keyword into database
function addKeyword($keyword)
{
	$keywordManager = new keywordManager();
	return $keywordManager->addKeyWord($keyword);
}
 
 //Add one main keyword relationship record
function addMainKw($productid,$kw_id)
{
	$keywordManager = new keywordManager();
	$keywordManager->addMainKw($productid,$kw_id);
}

//Add one other keyword relationship record
function addOtherKw($productid,$keyword)
{
	$keywordManager = new keywordManager();
	$keywordManager->addOtherKw($productid,$keyword);
}

//get keyword Id of one product
function getKwId($keyword)
{
	$keywordManager = new keywordManager();
	return $keywordManager->getKwId($keyword);
}

//get main keyword of one product
function getMainKW()
{
	$query = $_POST['query'];
	$productManager = new productManager();
	return $productManager->getMainKW($query);
}

//Get other keyword of one product
function getOtherKW()
{
	$query = $_POST['query'];
	//return $query;
	$productManager = new productManager();
	return $productManager->getOtherKW($query);
}
?>