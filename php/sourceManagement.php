<?php
/**********************************************************
Author: Amy XIe
18/17/2017

This file handle sql to db related to cource table
***********************************************************/
include_once "database.php";


class sourceManager
{


/**********add*******************************************/

	public function addSource($SourceName,$Creator)
	{	
		$sql = "INSERT INTO source(SourceName,Creator) VALUES('$SourceName','$Creator');";

		$result = $this->execute($sql);
		return $result;
	}
// get source list
	public function getSourceList()
	{
		$sql = "SELECT * FROM source;";
		$result = $this->execute($sql);
		return $this->get_data($result);
	}

//delete
	public function deleteSource($id)
	{
		$sql = "DELETE FROM source WHERE Id = '$id';";
		return $this->execute($sql);

	}


/**********Execute****************************************/	
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