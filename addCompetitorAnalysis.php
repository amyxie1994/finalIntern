
<html lang="en">

<head>
	<title>Home</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/vendor/linearicons/style.css">
	<link rel="stylesheet" href="assets/vendor/chartist/css/chartist-custom.css">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="assets/css/main.css">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<link rel="stylesheet" href="assets/css/demo.css">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">

	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">


<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script type="text/javascript">

//load_data();
</script>

<style>

/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px;
    padding-left: 300px; /* Location of the box */
    left: 0;
    top: 0;
    width:100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}


/* Modal Content */
.modal-content {
	position:relative;
    background-color: #fefefe;
    margin: auto;
    padding: 20px;
    border: 1px solid #888;
    width: 90%;
    max-width: :1200px;
}

/* The Close Button */



</style>
</head>
<body>


<div id="wrapper">
		<!-- NAVBAR -->
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="brand">
				<a href="index.php"><img src="assets/img/logo.png" class="img-responsive logo"></a>
			</div>
			<div class="container-fluid">
				<div class="navbar-btn">
					<button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
				</div>
			
				
				<div id="navbar-menu">
					<ul class="nav navbar-nav navbar-right">

						<li>
							<a href="#"><img src="assets/img/user.jpg" class="img-circle" alt="Avatar"> <span><?php session_start(); echo $_SESSION["username"];?></span></a>
						</li>
							
						
						<li><a href="#"><i class="lnr lnr-exit"></i><button onclick= "log_out()">Logout</button></li>
					</ul>
				</div>
			</div>
		</nav>
		<!-- END NAVBAR -->
		<!-- LEFT SIDEBAR -->
		<div id="sidebar-nav" class="sidebar">
			<div class="sidebar-scroll">
				<nav>
					<ul class="nav">
						<li><a href="index.php" class=""><i class="lnr lnr-home"></i> <span>Overview</span></a></li>
						<li>
							<a href="#subPages1" data-toggle="collapse" class="collapsed"><i class="lnr lnr-dice"></i><span>Supplier Data Mgmt</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
							<div id="subPages1" class="collapse ">
								<ul class="nav">
									<li><a href="addSupplier.php" class="">Add Supplier</a></li>
									<li><a href="supplierInfo.php" class="">Supplier List/Searching</a></li>
									
								</ul>
							</div>
						</li>
						<li>
							<a href="#subPages2" data-toggle="collapse" class="collapsed active"><i class="lnr lnr-file-empty"></i> <span>Research Data Mgmt</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
							<div id="subPages2" class="collapse ">
								<ul class="nav">
									<li><a href="addResearchData.php" class="">Add Research Data</a></li>
									<li><a href="researchDataInfo.php" class="">Data List/Searching</a></li>
									
								</ul>
							</div>
						</li>
						<li>
							<a href="#subPages3" data-toggle="collapse" class="collapsed"><i class="lnr lnr-user"></i><span>User Management</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
							<div id="subPages3" class="collapse ">
								<ul class="nav">
									<li><a href="register.php" class="">Register new account</a></li>
									<li><a href="userInfo.php" class="">User List</a></li>
									
								</ul>
							</div>
						</li>
						
						<li><a href="addSource.php" class=""><i class="lnr lnr-linearicons"></i> <span>Add Source</span></a></li>
					</ul>
				</nav>
			</div>
		</div>
		<!-- END LEFT SIDEBAR -->
		<!-- MAIN -->
		
		<div class="main">
		
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
				<div class="row">

													<!-- PANEL DEFAULT -->
              


				
						<div class="panel" width="100px";>
								<div class="panel-heading">
									<h1 class="panel-title"><b>Research Data</b></h1>
									
								</div>
								<div class="panel-body">
									<input type="hidden" class="form-control" placeholder="text field" id = "resultId" name ="supplierId" >
									<p id= "ProName"></p>
<p id= "mainkw333"></p>
<p id= "otherkw333"></p>
									<p id= "BSR"></p>
									<p id= "AliBusinessCard"></p>
									<p id= "Seller"></p>

									<p id= "sellerPrice"></p>
									<p id= "AliPrice"></p>
                 								
									<p id= "FBA_fees"></p>
                  <p id= "Est_profit"></p>
                  <p id= "life_cycle"></p>
                  <p id= "OtherInfo"></p>
                  <p id= "Create_time"></p>
								</div>
                </div>

	<div id="myModal" class="modal">
  		<div class="modal-content" width = "100px">
  		<form action="php/competitorOperations.php" method="post"  enctype="multipart/form-data">
      	<div class="modal-header">
        	<button type="button" onclick = "closeModal()" class="close" data-dismiss="modal">&times;</button>
        	<h4 class="modal-title">Add Competitor Analysis</h4>
        	
      	</div>
      	<div class="modal-body">
     <input type="hidden" value = "addCompetitor" id = "type" name ="type">
<table style="width:100%">
    <tr>
        <td> Brand Name: </td>
        <td> <input type="text"  id = "BrandName" name ="BrandName"> </td>
        </tr>
        <tr>
        <td> <input type="hidden"  id = "reDataId" name ="reDataId"> </td>
    </tr>

    <tr>
        <td>BSR(90 days)</td>
        <td> <input type="text"   id = "BSR" name ="BSR"> </td>
        </tr>
        <tr>
        <td> Sales </td>
        <td><input type="text"  id = "Sales" name ="Sales"></td>
   	</tr>
 <tr>
        <td>  Price </td>
        <td><input type="text"  id = "Price" name ="Price"></td>
   	</tr>

    <tr>
       
       <tr>
       <td> Size:</td>
       <td> <input type="text"   id = "Size" name ="Size"></td>
    </tr>
    <tr>
    	<td>LaunchDay</td>
        <td><input type="text"  id = "LaunchDay" name ="LaunchDay"></td>
        </tr>
        <tr>
		<td> Link</td>
        <td> <input type="text"  id = "Link" name ="Link"> </td>
   </tr>
   <tr> 
   		<td>Review </td>
    	<td> <input type="text"   id = "Review" name ="Review"></td>
    </tr>
    <tr>
    	<td> Strength</td>
        <td><textarea rows="4" cols="50"  id = "Strength" name ="Strength"></textarea></td>
        
    </tr>
    <tr>
      <td> Weakness </td>
        <td><textarea rows="4" cols="50"   id = "Weakness" name ="Weakness"></textarea></td>
        
    </tr>
   
      </table> 
            
      </div>
      <div class="modal-footer">
        <button type="submit" name="submit" value = "Submit" class="btn btn-default" data-dismiss="modal" ">Add</button>
        
      </div>
       </form>
    </div>

</div>


<div id="myModal2" class="modal">
  		<div class="modal-content" width = "100px">
  		<form action="php/competitorOperations.php" method="post"  enctype="multipart/form-data">
      	<div class="modal-header">
        	<button type="button" onclick = "closeEditModal()" class="close" data-dismiss="modal">&times;</button>
        	<h4 class="modal-title">Update Competitor Analysis Information</h4>
        	
      	</div>
      	<div class="modal-body">
     <input type="hidden" value = "editCompetitor" id = "type" name ="type">
     <input type="hidden"  id = "editId" name ="editId">
<input type="hidden"  id = "editResultId" name ="editResultId">

<table style="width:100%">
    <tr>
        <td> Brand Name: </td>
        <td> <input type="text"  id = "BrandName22" name ="BrandName22"> </td>
        </tr>
        

    <tr>
        <td>BSR(90 days)</td>
        <td> <input type="text"   id = "BSR22" name ="BSR22"> </td>
        </tr>
        <tr>
        <td> Sales  </td>
        <td><input type="text"  id = "Sales22" name ="Sales22"></td>
   	</tr>
<tr>
        <td>  Price </td>
        <td><input type="text"  id = "Price22" name ="Price22"></td>
   	</tr>
    <tr>
       
       <tr>
       <td> Size:</td>
       <td> <input type="text"   id = "Size22" name ="Size22"></td>
    </tr>
    <tr>
    	<td>LaunchDay</td>
        <td><input type="text"  id = "LaunchDay22" name ="LaunchDay22"></td>
        </tr>
        <tr>
		<td> Link</td>
        <td> <input type="text"  id = "Link22" name ="Link22"> </td>
   </tr>
   <tr> 
   		<td>Review </td>
    	<td> <input type="text"   id = "Review22" name ="Review22"></td>
    </tr>
    <tr>
    	<td> Strength</td>
        <td><textarea rows="4" cols="50"  id = "Strength22" name ="Strength22"></textarea></td>
        
    </tr>
    <tr>
      <td> Weakness </td>
        <td><textarea rows="4" cols="50"   id = "Weakness22" name ="Weakness22"></textarea></td>
        
    </tr>
   
      </table> 
            
      </div>
      <div class="modal-footer">
        <button type="submit" name="submit" value = "Submit" class="btn btn-default" data-dismiss="modal" ">Update</button>
        
      </div>
       </form>
    </div>

</div>

<!-- /*****************************************************************************/ -->


														<!-- END PANEL DEFAULT -->
						</div>
					</div>
					<!-- OVERVIEW -->
					<div class="panel panel-headline">
				
						<div class="panel" width="20px";>
								<div class="panel-heading">
									<h3 class="panel-title" width= >Competitor Analysis</h3>
							<p class="panel-subtitle">Competitor Information</p>
							
								</div>
								<div class="panel-body">
								
<button type="button" id = "addCompetitor Analysis" onclick = "clickFunction()" class="btn btn-success">Add Competitor Analysis</button>
<div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dTable">
                                    <thead>
                                        <tr>
                                            <th>BrandName</th>
                                            <th>BSR(90 days)</th>
                                            <th>Sales</th>
					    <th>Price</th>
                                            <th>Size</th>
                                            <th>Launch Day</th>
                                            <th>Link</th>
                                            <th>Number of Review</th>
                                            
                                            <th>Pros</th>                      <th>Cons</th>     <th>Create time</th>  
                                             <th>Creator</th>        
                                            <th>Delete</th>
                                            <th>Edit</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       
                           
                                    </tbody>
                                </table>
            </div>




									</div>
								</div>
							</div>
						
				</div>
			</div>
			<!-- END MAIN CONTENT -->
		</div>
		<!-- END MAIN -->
		<div class="clearfix"></div>
		<footer>
			<div class="container-fluid">
				<p class="copyright">Copyright &copy; 2017.Company name All rights reserved.<a target="_blank" href="http://sc.chinaz.com/moban/">&#x7F51;&#x9875;&#x6A21;&#x677F;</a></p>
			</div>
		</footer>
	</div>


	<!-- END WRAPPER -->
	<!-- Javascript -->
	<script src="assets/vendor/jquery/jquery.min.js"></script>
	<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<script src="assets/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js"></script>
	<script src="assets/vendor/chartist/js/chartist.min.js"></script>
	<script src="assets/scripts/klorofil-common.js"></script>
		<script src="//code.jquery.com/jquery-1.12.4.js"></script>
  <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
 <script src="competitorJS.js"></script>
	<script type="text/javascript">
	function log_out()
{
	$.ajax({
		type: "POST",
        url: "php/userOperations.php",
        data: {type:"log_out"},
        dataType: "json",
        success:function(data){
        	window.location.href = "login.html";
        }
	});
}
loadReData();

</script>

</body>

</html>
