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
									<li><a href="#" class="">Add Research Data</a></li>
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
					<div class="panel panel-headline">
				
						<div class="panel" width="20px";>
								<div class="panel-heading">
									<h3 class="panel-title" width= >Update Research Data Information</h3>
							<p class="panel-subtitle">Input information</p>
							
								</div>
								<div class="panel-body">
								<form class="form-horizontal" action="php/researchDataOperations.php" method="post">
								<input type="hidden" class="form-control" placeholder="text field" id = "type" name ="type" value = "updateResearchData">
								<input type="hidden" class="form-control" placeholder="text field" id = "reId" name ="reId" >
								Name:
								<br>
									<input type="text" class="form-control" id = "proName" name ="proName">
								<br>
								Main Keyword:
								<br>
									<input type="text" class="form-control" id = "mainKW" name ="mainKW">
								<br>
								Other Keyword:
								<br>
									<input type="text" class="form-control" id = "otherKW" name ="otherKW">
								<br>


								
								BSR:
								<br>
									<input type="text" class="form-control" id = "BSR" name ="BSR">
								<br>
								Alibaba business card:
									<br>
									<input type="text" class="form-control" id="AliBusinessCard" name="AliBusinessCard">
									<br>

								Seller business card:
									<br>
									<input type="text" class="form-control"  id="Seller" name="Seller">
									<br>

								Sale price:
									<br>
									<input type="text" class="form-control"  id="sellerPrice" name="sellerPrice">
									<br>

								Alibaba Price:
									<br>
									<input type="text"  class="form-control"  id="AliPrice" name="AliPrice">
									<br>

								FBA fees:
									<br>
									<input type="text" class="form-control"  id="fba" name="fba">
									<br>

								
								Est_profit
									<br>
									<input type="text" class="form-control"  id="estProfit" name="estProfit">
									<br>

								Life_cycle:
									<br>
									<input type="text" class="form-control"  id="Life_cycle" name="Life_cycle">
									<br>

								Other Information:
									<br>
									<textarea class="form-control" placeholder="comment" id = "otherInfo" name="otherInfo" rows="4"></textarea>
									<br>


								
									<br>
									<span class="input-group-btn"><button type="submit"  class="btn btn-primary">Update</button></span>
									</form>

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
  <script src="productJS.js"></script>
  <script src="permissionJS.js"></script>
	<script type="text/javascript">


check_privilege("addResearchData");

initialRedata();


function initialRedata()
{   
    var url = window.location.href;
    var str = url.split("=");
    var reId= str[1];

    fillRedata(reId);

}


function fillRedata(reId)
{
    
    $.ajax({
        type: "POST",
        url: "php/researchDataOperations.php",
        data: {id:reId,type:"getResearchData"},
        dataType: "json",
        success:function(data){



            var row = data[0];
            var element;

            element = document.getElementById('reId');
            element.value=row.ResultId;

            element = document.getElementById('proName');
            element.value=row.productName;

 	    element = document.getElementById('mainKW');
            element.value=getMainKW(row.ResultId);

            element = document.getElementById('otherKW');
            element.value=getOtherKW(row.ResultId);

            element = document.getElementById('BSR');
            element.value=row.BSR;
            
            element = document.getElementById('AliBusinessCard');
            element.value=row.AliBusinessCard;

            element = document.getElementById('Seller');
            element.value=row.Seller;

         	element = document.getElementById('sellerPrice');
            element.value=row.sellerPrice;

            element = document.getElementById('AliPrice');
            element.value=row.AliPrice;


            element = document.getElementById('fba');
            element.value=row.FBA_fees;

          
            element = document.getElementById('estProfit');
            element.value=row.estProfit;

            element = document.getElementById('otherInfo');
            element.value=row.OtherInfo;
            element = document.getElementById('Life_cycle');
            element.value=row.life_cycle;

           

        }
    });
}



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

$("#proName").autocomplete({

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
  							data:[MainKW,OtherKW] });

  			}

  			response(result);

  		}
  	});

  },
  select: function( event, ui ) {
	$('#mainKW').val(ui.item.data[0]);
    $('#otherKW').val(ui.item.data[1]);
  },

});

$("#mainKW").autocomplete({

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

$("#otherKW").autocomplete({

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


});





</script>
	
</body>

</html>
