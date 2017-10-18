<?php
/**********************************************************
Author: Amy XIe
18/17/2017

This file includes user table sql operations.
***********************************************************/
include_once "database.php";


class userManager
{

/**************login *************************/

	public function verify($username,$password)
	{
		$sql = "SELECT * FROM user WHERE Username = '$username';";
		$result = $this->execute($sql);
		if (mysqli_num_rows($result) > 0) {
    		while($row = mysqli_fetch_assoc($result)) {
    			 echo nl2br("\nThe query result is:\n");
        		$re_pwd = $row["Password"];

        		if(strcmp($re_pwd,$password)==0)
        			return true;
        		else
        			return false;
    		}
		} 
		else 
    		return false;
	}
/**********Register*******************************************/

	public function add_user($username,$password,$add_supOrPro,$add_ReData,$vOrS_a_sudata,$vOrS_o_sudata,$vOrS_a_redata,$vOrS_o_redata)
	{	
		$create_time=date("y:m:d:h:m:sa");
		$sql = "INSERT INTO user(Username,Password,add_Supplier,add_ReData,vOrS_a_sudata,vOrS_o_sudata,vOrS_a_redata,vOrS_o_redata,Createtime) VALUES('$username','$password','$add_supOrPro','$add_ReData','$vOrS_a_sudata','$vOrS_o_sudata','$vOrS_a_redata','$vOrS_o_redata','$create_time');";

		$result = $this->execute($sql);
		//echo $result;
		return $result;
	}


	public function check_name($username)
	{
		$sql = "SELECT * FROM user WHERE Username = '$username';";
		$result = $this->execute($sql);
		if (mysqli_num_rows($result) > 0) 
			return 0;
		else
			return 1;
	}

/**********get all user infor****************************************/
	public function all_userInfo()
	{
		$sql = "SELECT * FROM user;";
		//echo $sql;
		$result = $this->execute($sql);
		$data = $this->get_data($result);

		return $data;
	}

/**********Delete****************************************/	
	public function delete_user($user_id)
	{
		$sql = "DELETE FROM user WHERE UserID = '$user_id';";
		$result = $this->execute($sql);
		return $result;
	}

/**********Edit****************************************/	
	
	public function get_userInfo($user_id)
	{
		$sql = "SELECT * FROM user WHERE UserID = '$user_id';";
		$result = $this->execute($sql);
		return $this->get_data($result);
	}

	public function get_info_basedOnName($username)
	{
		$sql = "SELECT * FROM user WHERE Username = '$username';";
		$result = $this->execute($sql);
		return $this->get_data($result);
	}


	public function update_user($user_id,$username,$password,$add_supOrPro,$add_ReData,$vOrS_a_sudata,$vOrS_o_sudata,$vOrS_a_redata,$vOrS_o_redata)
	{
		$sql = "UPDATE user SET Username ='$username',Password ='$password',add_Supplier = '$add_supOrPro',add_ReData = '$add_ReData',vOrS_a_sudata = '$vOrS_a_sudata',vOrS_o_sudata = '$vOrS_o_sudata',vOrS_a_redata= '$vOrS_a_redata',vOrS_o_redata= '$vOrS_o_redata' WHERE UserID = '$user_id';";
		

		$result = $this->execute($sql);
		//echo $result;
		return $result;
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