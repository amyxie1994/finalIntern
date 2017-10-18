<?php
/**********************************************************
Author: Amy XIe
18/17/2017

This file contains the keyword operations over database
***********************************************************/
class keywordManager
{
	//get keyword id based on the name of keyword
	public function getKwId($keyword)
	{
		$sql = "SELECT KwId FROM keyword WHERE Keyword = '$keyword';";
		$result=$this->execute($sql);
		if (mysqli_num_rows($result) > 0)
		{
			$data=$this->get_data($result);
			$row=$data[0];
			return $row["KwId"];
		} 
				
		else
			return 0;
		
	}

//get keyword list based on product id
	public function getKeywordList($query)
	{	

		$sql = "SELECT kw_id FROM main_kw WHERE Product_id = '$query';";

		$result = $this->execute($sql);
		$mainkw = $this->get_data($result);
		$sql = "SELECT kw_id FROM other_kw WHERE Product_id = '$query';";
		$result = $this->execute($sql);
		$otherkw = $this->get_data($result);

		$re =[];
		$len = count($mainkw);
		for ($i =0;$i<$len;$i++)
			$re[$i]=$mainkw[$i]["kw_id"];

		$len = count($otherkw);
		for ($j =0;$j<$len;$j++)
		{
			$re[$i]=$otherkw[$j]["kw_id"];
			$i++;
		}
		return $re;
	}

	public function mainKWExistRelation($productId,$keyword)
	{
		$sql = "SELECT * FROM main_kw WHERE Product_id = '$productId' AND kw_id = '$keyword';";
		$result = $this->execute($sql);
		return $this->get_data($result);
	}

	public function otherKWExistRelation($productId,$keyword)
	{
		$sql = "SELECT * FROM other_kw WHERE Product_id = '$productId' AND kw_id = '$keyword';";
		$result = $this->execute($sql);
		return $this->get_data($result);
	}


//Get hint of keyword
	public function keywordHint($keyword)
	{

		$sql = "SELECT DISTINCT Keyword FROM keyword WHERE Keyword LIKE '%$keyword%';";
		$result = $this->execute($sql);
		return $this->get_data($result);
	}
	//add new keyword
	public function addKeyWord($keyword)
	{	
		$sql = "INSERT INTO keyword(Keyword) VALUES ('$keyword');";

		if($this->execute($sql))
		{	
			
			$db = new Db();

			return $db->connect()->insert_id;
		}
		else
			return 0;

	}
//based on keywrod, get product id list
	public function getProducts($keywordId)
	{
		$sql = "SELECT Product_id FROM main_kw WHERE Kw_id = '$keywordId';";

		$result= $this->execute($sql);
		if(mysqli_num_rows($result) > 0)
		{	
	
			return $this->get_data($result);
		}
		else
			return null;
	}
//based on keywrod, get product product information
	public function getProductInfoByKW($keywordList)
	{	
		$result =[];
		$k = 0;
		for($i = 0;$i<count($keywordList);$i++)
		{

			$sql = "SELECT Product_id FROM main_kw WHERE Kw_id = '$keywordList[$i]';";
			$source = $this->execute($sql);
			$data = $this->get_data($source); //= '$keywordList[$i]';";
			for($j = 0;$j<count($data);$k++,$j++)
				$result[$k] = $data[$j]["Product_id"];
		}

		return array_unique($result);
	}
//add main keyword information
	public function addMainKw($productid,$kw_id)
	{	
		$sql = "INSERT INTO main_kw(Product_id,Kw_id) VALUES ('$productid','$kw_id');";

		return $this->execute($sql);
	}

// add other keyword relationship
	public function addOtherKw($productid,$kw_id)
	{
		$sql = "INSERT INTO other_kw(Product_id,Kw_id) VALUES ('$productid','$kw_id');";

		return $this->execute($sql);
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