<!doctype html>
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

	<link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" />

    </head>


	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>

	<script src="researchDataJS.js"></script>
	<script>
 load_data();
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
    background-color: rgba(0,0,0,0.6); /* Black w/ opacity */
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
	<!-- WRAPPER -->
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

					<!-- OVERVIEW -->
					  <div class="panel panel-default">
                        <div class="panel-heading">
                          <h3> Research Data List</h3>

                        </div>

                        <div class="panel-body">
  
                        
						<input type="text" style="width:150px;" id ="searchData"  name = "query"  placeholder="Input  keywords"><button type="button"  onclick = "quickSearch()">Quick Search</button> 
						
						
					<br>
						<br>
						<button type="button" class="btn btn-primary" onclick = "clickFunction()">More Search Condition</button> 
						<br>
						

					
						<br>
                            <div class="table-responsive">

                                <table class="table table-striped table-bordered table-hover" id="dTable">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>MainKW</th>
                                            <th>OtherKW</th>
                                            <th>BSR</th>
                                            <th>Sale Price</th>
                                            <th>Alibaba Price</th>                     
                                           <th>FBA</th>
                                            <th>Estimate profit</th>
                                            <th>life_cycle</th>
                                            <th>Create_time</th>
                                            <th>Creator</th>
                                            <th>Show Products</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
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


<div id="myModal" class="modal">
  		<div class="modal-content" width = "100px">
  			
      	<div class="modal-header">
        	<button type="button" onclick = "closeModal()" class="close" data-dismiss="modal">&times;</button>
        	<h4 class="modal-title"><b>Search Filters</b></h4>
        	
      	</div>
      	<div class="modal-body">
     <input type="hidden" value = "addCompetitor" id = "type" name ="type">
<table style="width:100%">
    <tr>
        <td>  <b>Name:</b> </td>
        <td> <input type="text"  id = "name" name ="name"> </td>
        </tr>

        <tr>
        <td> <b> Keyword: </b></td>
        <td> <input type="text"  id = "KW" name ="KW"> </td>
    </tr>

    <tr>
        <td><b>BSR Range:</b></td>
        <td> <input type="text"   id = "LBSR" name ="LBSR"> to <input type="text"   id = "HBSR" name ="HBSR"> </td>
        </tr>
        <tr>
        <td> <b>Sales Price Range:</b></td>
        <td><input type="text"  id = "LSales" name ="LSales"> to <input type="text"  id = "HSales" name ="HSales"></td>
   	</tr>
   
    <tr>
        <td><b>Ali Price Range:</b></td>
        <td> <input type="text"   id = "LAPrice" name ="LAPrice"> to <input type="text"   id = "HAPrice" name ="HAPrice"> </td>
        </tr>
        <tr>
        <td> <b>FBA fee Range:</b></td>
        <td><input type="text"  id = "LFBA" name ="LFBA"> to <input type="text"  id = "HFBA" name ="HFBA"></td>
   	</tr>
   <tr>
        <td> <b>Est profit Range:</b></td>
        <td><input type="text"  id = "LEST" name ="LEST"> to <input type="text"  id = "HEST" name ="HEST"></td>
   	</tr>
   	 <tr>
        <td> <b>Life cycle Range:</b></td>
        <td><input type="text"  id = "LLC" name ="LLC"> to <input type="text"  id = "HLC" name ="HLC"></td>
   	</tr>
   
      </table> 
            
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick = "filter()">Search</button> 
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
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.12.4.js"></script>
  <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

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

$(function() {

$("#KW").autocomplete({
  source: function(request, response){ 

    $.ajax({
      type: "POST",
        url: "php/productOperations.php",
        dataType: "json",
      data:{type:"keywordHint",query:request.term},
      success: function(data){
        
        var result=[];
        for(var i =0;i<data.length;i++)
          result[i]=data[i].Keyword;
        response(result);

      }
    });

  } 

});



$("#searchData").autocomplete({
  source: function(request, response){ 
  	$.ajax({
  		type: "POST",
        url: "php/productOperations.php",
        dataType: "json",
  		data:{type:"keywordHint",query:request.term},
  		success: function(data){
  			var row;
  			var result =[];
  			for(var i = 0; i < data.length;i++)
  			{
  				row = data[i];
  				result[i]= row.Keyword;

  			}

  			response(result);
  		}
  	});
  }
});


$("#name").autocomplete({

  source: function(request, response){ 

  	$.ajax({
  		type: "POST",
        url: "php/productOperations.php",
        dataType: "json",
  		data:{type:"productNameHint",query:request.term},
  		success: function(data){

  			var row;
  			var result =[];
  			var ProductName;
  			var MainKW;
  			var OtherKW;
  			for(var i = 0; i < data.length;i++)
  			{
  				row = data[i];
  				ProductName = row.ProductName;  	

  				MainKW = getMainKW(row.id);

  				OtherKW = getOtherKW(row.id);
  				result.push({label: row.ProductName,
  							//data:[row.mainKeyword,row.OtherKeyword] });
  							data:[MainKW] });

  			}

  			response(result);

  		}
  	});

  },
  select: function( event, ui ) {
	$('#KW').val(ui.item.data[0]);
 
  },

});

});

function filter()
{
	var name = document.getElementById("name").value;
	var keyword = document.getElementById("KW").value; 
	var LBSR = document.getElementById("LBSR").value; 
	var HBSR = document.getElementById("HBSR").value; 
	var LSales = document.getElementById("LSales").value; 
	var HSales = document.getElementById("HSales").value; 
	var LAPrice = document.getElementById("LAPrice").value; 
	var HAPrice = document.getElementById("HAPrice").value;
	var LFBA = document.getElementById("LFBA").value; 
	var HFBA = document.getElementById("HFBA").value; 
	var LEST = document.getElementById("LEST").value; 
	var HEST = document.getElementById("HEST").value; 
	var LLC = document.getElementById("LLC").value;
	var HLC = document.getElementById("HLC").value;  
	
	$.ajax({
  		type: "POST",
        url: "php/researchDataOperations.php",
        dataType: "json",
  		data:{type:"filter",name:name,keyword:keyword,LBSR:LBSR,HBSR:HBSR,LSales:LSales,HSales:HSales,LAPrice:LAPrice,HAPrice:HAPrice,LFBA:LFBA,HFBA:HFBA,LEST:LEST,HEST:HEST,LLC:LLC,HLC:HLC},
  		success: function(data){
  			
  			closeModal();
  			 update(data);
  			//location.reload();
  		}
  	});

	
}


</script>

</body>

</html>
