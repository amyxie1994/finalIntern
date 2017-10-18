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
 load_data();

 function load_data(){
 	$.ajax({
 		type: "POST",
        url: "php/userOperations.php",
        data: {type:"list"},
        dataType: "json",
        success:function(data){
        	if(data=="false")
        	{
        		alert("Operation not allow!");
        	}	
		else{
        	var username;
        	var password;
        	var create_time;
        	var add_supplier;
        	var add_ReData;
        	var vOrS_a_sudata;
        	var vOrS_o_sudata;
        	var vOrS_a_redata;
        	var vOrS_o_redata;
        	var row;
        	var user_id;

        	var old_tbody = document.getElementById("dTable").getElementsByTagName("tbody")[0];
        	 var tbody = document.createElement('tbody');
        	 var table = document.getElementById("dTable");

        	for (var i = 0; i < data.length; i++) {
        		row = data[i];
        		user_id = row.UserID;
                username = row.Username;
                password = row.Password;
                create_time = row.Createtime;
                add_Supplier = row.add_Supplier
                add_ReData = row.add_ReData;
                vOrS_a_sudata = row.vOrS_a_sudata;
                vOrS_o_sudata = row.vOrS_o_sudata;
                vOrS_a_redata = row.vOrS_a_redata;
                vOrS_o_redata = row.vOrS_o_redata;

                append_table(tbody,user_id,username,password,add_Supplier,add_ReData,vOrS_o_redata,vOrS_a_redata,vOrS_o_sudata,vOrS_a_sudata,create_time);

        	}
        	 table.replaceChild(tbody,old_tbody);

        }
    }
 	});
 }

 function append_table(tbody,user_id,username,password,add_Supplier,add_ReData,vOrS_o_redata,vOrS_a_redata,vOrS_o_sudata,vOrS_a_sudata,create_time){
 	
 	var row = tbody.insertRow(0);

 	var cell = row.insertCell(0);
 	cell.innerHTML = username;

 	var cell1 = row.insertCell(1);
 	cell1.innerHTML = password;


 	add_new_element(row,add_Supplier,2);
 	add_new_element(row,add_ReData,3);
 	add_new_element(row,vOrS_o_sudata,4);
 	add_new_element(row,vOrS_a_sudata,5);
 	add_new_element(row,vOrS_o_redata,6);
 	add_new_element(row,vOrS_a_redata,7);

 	var cell8 = row.insertCell(8);
 	cell8.innerHTML = create_time;


 	var cell9 = row.insertCell(9);
 	var btn1 = document.createElement('button');
 	btn1.className = "btn btn-info btn-xs";
 	btn1.onclick = function(){
 		edit_user(user_id);
 	};

 	var temp1 = document.createElement('i');
    temp1.className = "fa fa-pencil-square-o";
    temp1.setAttribute("aria-hidden", "true");

 	var cell10 = row.insertCell(10);
 	var btn2 = document.createElement('button');
 	btn2.className = "btn btn-danger btn-xs";
 	btn2.onclick = function(){
 		delete_user(user_id);
 	};

 	var temp2 = document.createElement('i');
    temp2.className = "fa fa-trash-o";
    temp2.setAttribute("aria-hidden", "true");

    btn1.appendChild(temp1);
    cell9.appendChild(btn1);
    btn2.appendChild(temp2);
    cell10.appendChild(btn2);

 }

 function delete_user(user_id){

 	$.ajax({
 		type: "POST",
        url: "php/userOperations.php",
        data:{user_id:user_id,type:"delete"},
        dataType: "json",
        success:function(data){
        	location.reload();
        }
    });
 }

function edit_user(user_id)
{

 	window.location = 'editUser.php?user_id='+user_id ;
 }


 function add_new_element(row,value,index)
 {
 	var cell = row.insertCell(index);
 	if(value == 0)
 	{
 		var temp = document.createElement('i');
        temp.className = "fa fa-times";
        temp.setAttribute("aria-hidden", "true");
        cell.appendChild(temp);
    }
 	else
 	{
 		var temp = document.createElement('i');
        temp.className = "fa fa-check";
        temp.setAttribute("aria-hidden", "true");
        cell.appendChild(temp);
 	}	
 }

</script>
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
							<a href="#subPages3" data-toggle="collapse" class="collapsed active"><i class="lnr lnr-user"></i><span>User Management</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
							<div id="subPages3" class="collapse ">
								<ul class="nav">
									<li><a href="register.php" class="">Register new account</a></li>
									<li><a href="#" class="">User List</a></li>
									
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
                          <h3>  User Information List</h3>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dTable">
                                    <thead>
                                        <tr>
                                            <th>Username</th>
                                            <th>Password</th>
                                            <th>Add Supplier/Products</th>
                                            <th>Add Research Data</th>
                                            <th>View/Search Own Suppliers</th>
                                            <th>View/Search All Suppliers</th>
                                            <th>View/Search Own Research Data</th>
                                            <th>View/Search All Research Data</th>
                                            <th>Create Time</th>
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
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
	<script>
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
</script>

</body>

</html>
