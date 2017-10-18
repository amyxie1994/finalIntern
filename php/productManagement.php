<?php
/**********************************************************
Author: Amy XIe
18/17/2017

This file declares the operations to product in the db
***********************************************************/

include_once "database.php";

class productManager{

//edit product info
	public function editProduct($id,$name,$Craft,$Psize,$STime,$Price,$Size,$PLt,$SampleSize,$Model,$QTY,$Packing,$OtherInfo)
	{
		$sql = "UPDATE product_info SET ProductName = '$name',Craft = '$Craft',ProductSize = '$Psize',Price = '$Price',Size = '$Size',ProductionLt = '$PLt',OtherInfo = '$OtherInfo',SampleLt = '$STime',CartonSize = '$SampleSize',Model = '$Model',QTY = '$QTY',Packing = '$Packing' WHERE ProductId = '$id';";
		return $this->execute($sql);

		
	}

// get product name hint
	public function getNameHint($query)
	{

		$variable="%".$query."%";
		$sql = "SELECT MIN(id) as id, ProductName FROM product WHERE ProductName LIKE '$variable' GROUP BY ProductName;";
		$result = $this->execute($sql);
		return $this->get_data($result);
		//$name_hint = $this->get_data($result);
	}

// update product image number
	public function updateImgNum($id,$num)
	{
		$sql = "UPDATE product_info SET imgNum = '$num' WHERE ProductId = '$id';";
		return $this->execute($sql);
	}


//get main kw of one product
	public function getMainKW($productID)
	{
		
		$sql = "SELECT Keyword FROM keyword INNER JOIN main_kw ON keyword.KwId = main_kw.Kw_id WHERE main_kw.Product_id = '$productID' ;";
		$result = $this->execute($sql);
		return $this->get_data($result);
	}

//get other keywrod list of one product based on product id
	public function getOtherKW($productID)
	{

		$sql = "SELECT Keyword FROM keyword INNER JOIN other_kw ON keyword.KwId = other_kw.Kw_id WHERE other_kw.Product_id = '$productID' ;";
		$result = $this->execute($sql);
		//return $this->get_data($result);
		return $this->get_data($result);
	}

// add product information to db
	public function addProduct($name,$SupplierId,$Craft,$Psize,$STime,$Price,$Size,$PLt,$SampleSize,$Model,$QTY,$Packing,$OtherInfo,$Res_Mark)
	{	
		session_start();
		$Creator = $_SESSION["username"];
		$Create_time=date("y:m:d:h:m:sa");
		$ProductId = $this->addProductName($name);

		$sql = "INSERT INTO product_info(ProductId,ProductName,Craft,ProductSize,Price,Size,ProductionLt,OtherInfo,SampleLt,CartonSize,Model,SupplierId,QTY,Packing,Res_Mark,Creator,Create_time) VALUES('$ProductId','$name','$Craft','$Psize','$Price','$Size','$PLt','$OtherInfo','$STime','$SampleSize','$Model','$SupplierId','$QTY','$Packing','$Res_Mark','$Creator','$Create_time');";
		
		if($this->execute($sql))
		{	
			return $ProductId;
		}
		else
			return 0;

	}

	/*public function getProductInfoByKW($keywordList)
	{	
		for($i = 0;$i<count($keywordList);$i++)
		{
			$sql = "";
		}
		return $keywordList;
	}*/

//get product information basd on supplier
	public function getProductInfo($list,$user,$permission)
	{	
		$result = [];
		for($i=0,$j=0;$i<count($list);$i++)
		{
			if($permission)
				$sql = "SELECT * FROM product_info  INNER JOIN supplier ON supplier.SupplierId = product_info.SupplierId WHERE product_info.ProductId= '$list[$i]';";
			else
				$sql = "SELECT * FROM product_info  INNER JOIN supplier ON supplier.SupplierId = product_info.SupplierId WHERE product_info.ProductId= '$list[$i]' and supplier.Creator = '$user';";

			$source = $this->execute($sql);
			$data = $this->get_data($source);
			if(count($data)>0)
			{
				$result[$j] = $data[0];
				$j++;
			}

		}
		return $result;

	}
//add product into product list
	public function addProductName($name)
	{
		$sql = "INSERT INTO product(ProductName) VALUES('$name');";
		if($this->execute($sql))
		{	
			
			$db = new Db();

		return $db->connect()->insert_id;
		}
		else
			return 0;
	}

// delete product record
	public function deleteProduct($productId)
	{
		$sql = "DELETE FROM product_info WHERE ProductId = '$productId';";
		if($this->execute($sql))
		{
			$sql = "DELETE FROM main_kw WHERE Product_id = '$productId';";
			if($this->execute($sql))
			{
				$sql = "DELETE FROM other_kw WHERE Product_id = '$productId';";
				$result = $this->execute($sql);
				$sql = "DELETE FROM product WHERE id = '$productId';";
				return $this->execute($sql);

			}
			else
				return 0;
		}
		else
			return 0;
	}

//get product list based on supplier id
	public function productList($SupplierId)
	{
		$sql = "SELECT * FROM product_info WHERE SupplierId = '$SupplierId';";
		$result = $this->execute($sql);
		return $this->get_data($result);
		
	}
//get product infor based on id
	public function showProduct($productId)
	{
		$sql = "SELECT * FROM product_info WHERE ProductId = '$productId';";
		$result = $this->execute($sql);
		return $this->get_data($result);
		
	}


	private function execute($sql)
	{
		$db = new Db();
		$result = $db->query($sql);
		return $result;
	}


	private function get_data($source)
	{
		$db = new Db();
		$result = $db->fetch_data($source);
		return $result;
	}

}


?>