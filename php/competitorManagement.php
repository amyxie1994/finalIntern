<?php
/**********************************************************
Author: Amy XIe
18/17/2017

This file implements the operations of competitor analysis. 
Related to competitor_ananlysis table.
***********************************************************/

include "database.php";

class competitorManager
{
	
	/*Add competitor*/
	public function addCompetitor($Price,$BrandName,$BSR,$Sales,$Size,$LaunchDay,$Link,$Review,$Pros,$Cons,$ResultId)
	{
		session_start();
		$user = $_SESSION["username"];
		$Create_time=date("y:m:d:h:m:sa");
		$sql = "INSERT INTO competitor_analysis(Price,BrandName,BSR,Sales,Size,LaunchDay,Link,Review,Pros,Cons,ResultId,Create_time,Creator) VALUES('$Price','$BrandName','$BSR','$Sales','$Size','$LaunchDay','$Link','$Review','$Pros','$Cons','$ResultId','$Create_time','$user');";

	 
		return $this->execute($sql);
	}

	/*Update competitor information*/
	public function editCompetitor($id,$BrandName,$BSR,$Sales,$Price,$Size,$LaunchDay,$Link,$Review,$Pros,$Cons)
	{
		$sql = "UPDATE competitor_analysis SET BrandName='$BrandName' ,BSR='$BSR',Sales='$Sales',Price = '$Price',Size = '$Size',LaunchDay = '$LaunchDay',Link='$Link',Review='$Review',Pros='$Pros',Cons='$Cons'  WHERE Id = '$id';";
		
		return $this->execute($sql);
	}

	/* Delete competitor record*/
	public function deleteCompetitor($id)
	{
		$sql = "DELETE FROM competitor_analysis WHERE Id ='$id'; ";
		return $this->execute($sql);
	}

	/* Get competitor record based on research data id*/
	public function getCompetitorData($id)
	{
		$sql = "SELECT * FROM competitor_analysis WHERE ResultId = '$id';";
		$result = $this->execute($sql);
		return $this->get_data($result);
	}

	/*Get competitor information based on id*/
	public function getCompetitorEditData($id)
	{
		$sql = "SELECT * FROM competitor_analysis WHERE Id = '$id';";
		$result = $this->execute($sql);
		return $this->get_data($result);
	}

	/*Execute sql sentence in db*/
	private function execute($sql)
	{
		$db = new Db();
		$result = $db->query($sql);
		return $result;
	}

	/*Fetch data from db query*/
	private function get_data($source)
	{
		$db = new Db();
		$result = $db->fetch_data($source);
		return $result;
	}
}


?>