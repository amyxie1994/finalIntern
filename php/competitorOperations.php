<?php
/**********************************************************
Author: Amy XIe
18/17/2017

This file implements the operations relative to  competitor analysis. 
Based on html request, call different functions to handle request.
***********************************************************/

include "competitorManagement.php";


$type=$_POST['type'];

/*Based on request, choose different operations*/
switch ($type) {

	case "addCompetitor": 
		addCompetitor();
	break;

	case "getCompetitorData":
		$result = getCompetitorData();
		echo json_encode($result);
	break;

	case "getCompetitorEditData":
		$result = getCompetitorEditData();
		echo json_encode($result);
	break;

	case "deleteCompetitor":
		$result = deleteCompetitor();
		echo json_encode($result);
	break;
	
	case "editCompetitor":
		updateCompetitor();
	break;

	default:
		$Message = "Unknown operations!";
		echo json_encode($Message);
	break;
}

//Update
function updateCompetitor()
{
	$competitorManager = new competitorManager();
	$BrandName = $_POST["BrandName22"];
	$BSR = $_POST["BSR22"];
	$Sales = $_POST["Sales22"];
	$Price = $_POST["Price22"];
	$Size = $_POST["Size22"];
	$LaunchDay = $_POST["LaunchDay22"];
	$Link = $_POST["Link22"];
	$Review= $_POST["Review22"];
	$Pros = $_POST["Strength22"];
	$Cons = $_POST["Weakness22"];
	$Id = $_POST["editId"];
	$ResultId = $_POST["editResultId"];

	
	if($competitorManager->editCompetitor($Id,$BrandName,$BSR,$Sales,$Price,$Size,$LaunchDay,$Link,$Review,$Pros,$Cons))	
	{
		echo "<script>
		window.location =\"../addCompetitorAnalysis.php?research_id=".$ResultId."\";
		alert('Update Successfully!');
		</script>";

	}
else
{
		echo "<script>
		window.location =\"../addCompetitorAnalysis.php?research_id=".$ResultId."\";
		alert('Update Failed, \' are not allow in this area.Please try again!');
		</script>";

	}
	//header('Location: ../addCompetitorAnalysis.php?research_id='.$ResultId);

}

// Initial data when edit
function getCompetitorEditData()
{
	$id = $_POST["id"];
	$competitorManager = new competitorManager();
return $competitorManager->getCompetitorEditData($id);
}

//Delete competitor record
function deleteCompetitor()
{
	$id = $_POST["id"];
	$competitorManager = new competitorManager();
	if($competitorManager->deleteCompetitor($id))
		return "Delete Successfully!";
	else
		return "Delete Fail, Please try again!";
}


//Recieve competitor data based on research data id.
function getCompetitorData()
{
	$id = $_POST["id"];
	$competitorManager = new competitorManager();
	return $competitorManager->getCompetitorData($id);
}

//Add compeitor record to the system
function addCompetitor()
{
	$competitorManager = new competitorManager();
	$BrandName = $_POST["BrandName"];
	$BSR = $_POST["BSR"];
	$Sales = $_POST["Sales"];
	$Price = $_POST["Price"];
	$Size = $_POST["Size"];
	$LaunchDay = $_POST["LaunchDay"];
	$Link = $_POST["Link"];
	$Review= $_POST["Review"];
	$Pros = $_POST["Strength"];
	$Cons = $_POST["Weakness"];
	$ResultId = $_POST["reDataId"];
	if($competitorManager->addCompetitor($Price,$BrandName,$BSR,$Sales,$Size,$LaunchDay,$Link,$Review,$Pros,$Cons,$ResultId))
		echo "<script>
		window.location =\"../addCompetitorAnalysis.php?research_id=".$ResultId."\";
		alert('Add Successfully!');
		</script>";
	else
		
		echo "<script>
			window.location =\"../addCompetitorAnalysis.php?research_id=".$ResultId."\";
			alert('Add Failed,  \' are not allow in this area.Please try again!');
			</script>";


}


?>