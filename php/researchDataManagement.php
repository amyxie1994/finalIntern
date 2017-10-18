<?php
/**********************************************************
Author: Amy XIe
18/17/2017

This file handle sql to db related to research data
***********************************************************/
class researchDataManager
{
	//Add research data into the system
	public function addResearchData($productId,$name,$AliBusinessCard,$Seller,$sellerPrice,$AliPrice,$fba,$estProfit,$Life_cycle,$otherInfo,$Creator,$BSR)
	{
		$Create_time=date("y:m:d:h:m:sa");
		$sql = "INSERT INTO research_result(ResultId,productName,AliBusinessCard,Seller,sellerPrice,AliPrice,FBA_fees,estProfit,life_cycle,OtherInfo,Creator,BSR,Create_time) VALUES('$productId','$name','$AliBusinessCard','$Seller','$sellerPrice','$AliPrice','$fba','$estProfit','$Life_cycle','$otherInfo','$Creator','$BSR','$Create_time');";
		
		return $this->execute($sql);
	}


// Search research data record based on filter condition
	public function filterSearch($name,$kw ,$LBSR ,$HBSR ,$LSales ,$HSales ,$LAPrice ,$HAPrice ,$LFBA ,$HFBA ,$LEST ,$HEST ,$LLC ,$HLC,$user,$permission)
	{
		
		$maxBSR = $this->getMax("BSR");
		$maxSales = $this->getMax("sellerPrice");
		$maxAprice = $this->getMax("AliPrice");
		$maxFBA = $this->getMax("FBA_fees");
		$maxEProfit = $this->getMax("estProfit");
		$maxLC = $this->getMax("Life_cycle");
		$searchName = "%%";
		$keyword = "%%";
		$minBSR = 0;
		$minSales = 0;
		$minAprice = 0;
		$minFBA = 0;
		$minEProfit = 0;
		$minLC = 0;

		if($searchName != "")
			$searchName = "%".$name."%";

		if($LBSR !="")
			$minBSR = (int)$LBSR;
		if($HBSR !="")
			$maxBSR =(int) $HBSR;

		if($LSales !="")
			$minSales =floatval($LSales);
		if($HSales !="")
			$maxSales =floatval($HSales);


		if($LAPrice !="")
			$minAprice =floatval($LAPrice);
		if($HSales !="")
			$maxAprice =floatval($HAPrice);

		if($LFBA !="")
			$minFBA =floatval($LFBA);
		if($HFBA !="")
			$maxFBA =floatval($HFBA);

		if($LEST !="")
			$minEProfit =floatval($LEST);
		if($HFBA !="")
			$maxEProfit =floatval($HEST);

		if($LLC !="")
			$minLC =(int)$LLC;
		if($HLC!="")
			$maxLC =(int)$HLC;

		//return $minSales;
		if($permission)
			$sql = "SELECT * FROM research_result WHERE productName like '$searchName' AND BSR BETWEEN '$minBSR' AND '$maxBSR' AND sellerPrice BETWEEN '$minSales' AND '$maxSales' AND AliPrice BETWEEN '$minAprice' AND '$maxAprice' AND FBA_fees BETWEEN '$minFBA' AND '$maxFBA' AND estProfit BETWEEN '$minEProfit' AND '$maxEProfit' AND Life_cycle BETWEEN '$minLC' AND '$maxLC' ;";
		else
			$sql = "SELECT * FROM research_result WHERE Creator = '$user' AND productName like '$searchName' AND BSR BETWEEN '$minBSR' AND '$maxBSR' AND sellerPrice BETWEEN '$minSales' AND '$maxSales' AND AliPrice BETWEEN '$minAprice' AND '$maxAprice' AND FBA_fees BETWEEN '$minFBA' AND '$maxFBA' AND estProfit BETWEEN '$minEProfit' AND '$maxEProfit' AND Life_cycle BETWEEN '$minLC' AND '$maxLC' ;";
		
		//return $sql;
		$result = $this->execute($sql);
		$data = $this->get_data($result);

		if($kw == "")
			return $data;
		else
		{
			$finalRe = [];
			for($i=0,$j =0;$i<count($data);$i++)
				if($this->checkKW($data[$i]["ResultId"],$kw))
				{
					$finalRe[$j] =$data[$i];
					$j++;
				}
			return $finalRe;
					
		}
	}

// check keyword
	private function checkKW($id,$kw)
	{	
	
		$check = 0;
		$sql = "SELECT * FROM keyword INNER JOIN main_kw ON keyword.kwId = main_kw.Kw_id WHERE Product_id = '$id' AND keyword = '$kw'; ";
		$result = $this->execute($sql);
		if(count($this->get_data($result)))
			return 1;
		else
		{
			$sql = "SELECT * FROM keyword INNER JOIN other_kw ON keyword.kwId = other_kw.Kw_id WHERE Product_id = '$id' AND keyword = '$kw'; ";
			$result = $this->execute($sql);
			if(count($this->get_data($result)))
				return 1;
			else
				return 0;
		}
	}
// get max value of one attribute
	private function getMax($variable)
	{
		$sql = "SELECT MAX($variable) AS MAX_VALUE FROM research_result;";

		$result = $this->execute($sql);
		$data = $this->get_data($result);
		return $data[0]["MAX_VALUE"];
	}

//update record
	public function updateResearchData($id,$name,$AliBusinessCard,$Seller,$sellerPrice,$AliPrice,$fba,$estProfit,$Life_cycle,$otherInfo,$BSR)
	{
		$sql = "UPDATE research_result SET productName ='$name' ,AliBusinessCard = '$AliBusinessCard',Seller = '$Seller',sellerPrice = '$sellerPrice',AliPrice = '$AliPrice' ,FBA_fees = '$fba',estProfit = '$estProfit',life_cycle = '$Life_cycle',OtherInfo = '$otherInfo',BSR = '$BSR' WHERE ResultId = '$id';";
		
		return $this->execute($sql);
	}
//list data
	public function listData($username,$permission)
	{	
		if($permission)
			$sql = "SELECT * FROM research_result;";
		else
			$sql = "SELECT * FROM research_result WHERE Creator = '$username';";
		$result = $this->execute($sql);
		return $this->get_data($result);
	}

	public function deleteData($id)
	{
		$sql = "DELETE FROM research_result WHERE ResultId = '$id'; ";

		if($this->execute($sql))
		{	
			$sql = "DELETE FROM main_kw WHERE Product_id = '$id'; ";
			if($this->execute($sql))
			{
				$sql = "DELETE FROM other_kw WHERE Product_id = '$id'; ";
				if($this->execute($sql))
				{
					$sql = "DELETE FROM product WHERE id = '$id'; ";
					return $this->execute($sql);
				}
			}
		}

		return false;
	}

	public function getResearchData($id)
	{
		$sql = "SELECT * FROM research_result WHERE ResultId = '$id'";
		$result = $this->execute($sql);
		return $this->get_data($result);
	}
//quick serach by keywrord
	public function quickSearch($id,$permission,$user)
	{	

	/*	$sql = "SELECT *
FROM research_result INNER JOIN main_kw ON research_result.ResultId = main_kw.Product_id INNER JOIN other_kw ON research_result.ResultId = main_kw.Product_id WHERE main_kw.Kw_id = '$id' OR other_kw.Kw_id = '$id';";
return $sql;*/
		//session_start();
		//$user = $_SESSION["username"];

		$keywordList = $this->searchKWList($id);

		$final = [];
		$j =0;
		for($i = 0;$i < count($keywordList);$i++)
		{
			$kw = $keywordList[$i];
			if($permission)
				$sql = "SELECT * FROM research_result WHERE ResultId = '$kw'; ";
			else
				$sql = "SELECT * FROM research_result WHERE ResultId = '$kw' AND Creator = '$user'; ";
			$result = $this->execute($sql);
			$temp = $this->get_data($result);

			if(count($temp) !=0)
			{	
				$final[$j] = $temp[0];
				$j++;		
			}
			
		}

		return $final;
	}

	private function searchKWList($kwId)
	{
		$sql = "SELECT Product_id FROM main_kw WHERE Kw_id = '$kwId';";
		$list = $this->execute($sql);
		$result = $this->get_data($list);
		
		$sql = "SELECT Product_id FROM other_kw WHERE Kw_id = '$kwId';";
		$list = $this->execute($sql);
		$otherKwList = $this->get_data($list);
		$re =[];

		$len = count($result);
		for ($i =0;$i<$len;$i++)
			$re[$i]=$result[$i]["Product_id"];

		$len = count($otherKwList);
		for ($j =0;$j<$len;$j++)
		{
			$re[$i]=$otherKwList[$j]["Product_id"];
			$i++;
		}
		return array_unique($re);

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