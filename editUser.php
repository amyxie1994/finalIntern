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

	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
	<script type="text/javascript">
		initial();

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


		function initial()
		{	
			var url = window.location.href;
			var str = url.split("=");
			var user_id = str[1];

			fill_data(user_id);

		}

		function fill_data(user_id)
		{
			
			$.ajax({
 			type: "POST",
        	url: "php/userOperations.php",
        	data: {user_id:user_id,type:"edit"},
        	dataType: "json",
        	success:function(data){

        		var row = data[0];
        		var element;

        		element = document.getElementById('user_id');
        		element.value=row.UserID;

        		element = document.getElementById('type');
        		element.value="update";

        		element = document.getElementById('username');
        		element.value=row.Username;
        		
        		element = document.getElementById('password');
        		element.value=row.Password;
        		element = document.getElementById('re_password');
        		element.value=row.Password;


        		fill('add_supplier',row.add_Supplier);
        		fill('add_ReData',row.add_ReData);
        		fill('vOrS_a_sudata',row.vOrS_a_sudata);
        		fill('vOrS_o_sudata',row.vOrS_o_sudata);
        		fill('vOrS_o_redata',row.vOrS_o_redata);
        		fill('vOrS_a_redata',row.vOrS_a_redata);

        	}
        	});
		}


		function fill(name,value)
		{	
			element = document.getElementById(name);
			if (value==1)
        		element.checked = true;
        	else 
        		element.checked = false;
		}
	</script>

</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<!-- NAVBAR -->
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="brand">
				<a href="index.html"><img src="assets/img/logo.png" class="img-responsive logo"></a>
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
							<a href="#subPages2" data-toggle="collapse" class="collapsed"><i class="lnr lnr-file-empty"></i> <span>Research Data Mgmt</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
							<div id="subPages2" class="collapse ">
								<ul class="nav">
									<li><a href="addResearchData.php" class="">Add Research Data</a></li>
									<li><a href="researchDataInfo.php" class="">Data List/Searching</a></li>
									
								</ul>
							</div>
						</li>
						<li>
							<a href="#subPages3" data-toggle="collapse" class="collapsed  active"><i class="lnr lnr-user"></i><span>User Management</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
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
									<h3 class="panel-title" width= >Register New Account</h3>
							<p class="panel-subtitle">Input information</p>
							
								</div>
								<div class="panel-body">
								<form class="form-horizontal" action="php/userOperations.php" method="post"  onsubmit="return check_password();">
									<input type="hidden" class="form-control" placeholder="text field" id = "user_id" name ="user_id">
									<input type="hidden" class="form-control" placeholder="text field" id = "type" name ="type">
								User name:
								<br>
									<input type="text" class="form-control" placeholder="text field" id = "username" name ="username">
								<br>
								Password:
									<br>
									<input type="password" class="form-control"  id="password" name="password">
									<br>
								Retype password:
									<br>
									<input type="password" class="form-control"  id = "re_password">
									<br>
									<p style="color:red;"><b>User permissions:</b> </p>    
							
									<label> 
										<input type="checkbox" name="add_supplier" id="add_supplier" value = "1" >
										<span>Add Supplier/Products</span>
									</label>
										&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;
									<label>
										<input type="checkbox" name="add_ReData" id="add_ReData" value="1">
										<span>Add Research Data</span>
									</label>
										<br>
									<label style="display:inline margin-left: 20px "">
										<input type="checkbox" name="vOrS_o_sudata" id="vOrS_o_sudata" value = "1">
										<span>View/Search Own Suppliers</span>
										</label>
										&emsp;&emsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										<label>
										<input type="checkbox" id = "vOrS_a_sudata" name="vOrS_a_sudata" value = "1">
										<span>View/Search All Suppliers</span>
									</label>
									<br>
									<label style="display:inline margin-left: 20px "">
										<input type="checkbox" name="vOrS_o_redata" id="vOrS_o_redata" value = "1">
										<span>View/Search Own Research Data</span>
										</label>
										&emsp;
										<label>
										<input type="checkbox" name="vOrS_a_redata" id="vOrS_a_redata" value = "1">
										<span>View/Search All Research Data</span>
									</label>
									<br>
									<br>
									<span class="input-group-btn"><button type="submit"  class="btn btn-primary">Go</button></span>
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
	<script>
function check_password(){

	var password = document.getElementById("password");
	var re_password = document.getElementById("re_password");


	if(password.value==re_password.value)
	{	
		return true;
	}
	else
	{
		alert("Password not the same! Please type again!");
		password.value="";
		re_password.value="";
		return false;
	}
	return false;
};
	</script>
</body>

</html>
