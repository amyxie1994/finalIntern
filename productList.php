
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


	<script src="//code.jquery.com/jquery-1.12.4.js"></script>
  <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>



<style>

* {
  box-sizing: border-box;
}

.row > .column {
  padding: 0 8px;
}

.row:after {
  content: "";
  display: table;
  clear: both;
}

.column {
  float: left;
  width: 25%;
}
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

.imgmodal {
  display: none;
  position: fixed;
  z-index: 1;
  padding-top: 100px;
  padding-left: 300px;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  overflow: auto;
  background-color: rgba(0,0,0,0.4); 
}

/* Modal Content */
.imgmodal-content {
  position: relative;
  background-color: #fefefe;
  margin: auto;
  border: 1px solid #888;
  padding: 0;
  width: 40%;
  height: 40%;

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
.close {
    color: #ff0000;
    float: right;
    font-size: 50px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
}

.mySlides {
  display: none;
}

.cursor {
  cursor: pointer
}

/* Next & previous buttons */
.prev,
.next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  padding: 16px;
  margin-top: -50px;
  color: #ff0000;
  font-weight: bold;
  font-size: 20px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
  user-select: none;
  -webkit-user-select: none;
}

.imgclosestyle {
  cursor: pointer;
  position: absolute;
  top: 100%;
  width: auto;
  padding: 16px;
  margin-top: -50px;
  color: #aaaaaa;
  font-weight: bold;
  font-size: 20px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
  user-select: none;
  -webkit-user-select: none;
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover,
.next:hover {
  background-color: rgba(0, 0, 0, 0.8);
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

img {
  margin-bottom: -4px;
}

.caption-container {
  text-align: center;
  background-color: black;
  padding: 2px 16px;
  color: white;
}

.demo {
  opacity: 0.6;
}

.active,
.demo:hover {
  opacity: 1;
}

img.hover-shadow {
  transition: 0.3s
}

.hover-shadow:hover {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19)
}
</style>

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
							<a href="#"><img src="assets/img/user.jpg" class="img-circle" alt="Avatar"> </a>
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

						<div class="col-md-4">
							<!-- PANEL DEFAULT -->
              

						
	


<div id="productInfoModal" class="modal">
  		<div class="modal-content" width = "100px">
      	<div class="modal-header">
        	<button type="button" onclick = "closeProModal()" class="close" data-dismiss="modal">&times;</button>
        	<h4 class="modal-title"><b>Product Infomation</b></h4>
        	
      	</div>
			<div class="modal-body">	
				<p id= "name"></p> 
        <p id= "Model2"></p>
        <p id= "mainkw233"></p>
        <p id= "otherkw233"></p>
        <p id= "craft"></p>
        <p id= "PLt2"></p>
        <p id= "Size2"></p>
        <p id= "Csize2"></p>
        <p id= "price"></p>
        <p id= "SLt"></p>
        <p id= "psize"></p>
        <p id= "Packing2"></p>
        <p id= "QTY2"></p>
        <p id= "comment"></p> 
			</div>
			</div>
</div>
<!-- /**********************************************************************/ -->
<div id="imgModal" class="imgmodal">

 <span class="close cursor"  style="color: #ff0000" onclick="closeImgModal()">&times;</span>
 <div class="imgmodal-content" id="modalReplace">
 <div class="modal-header">
          <button type="button" onclick = "closeProModal()" class="close" data-dismiss="modal">&times;</button>
          </div>

 </div>
</div>
<!-- /*****************************************************************************/ -->


							</div>
							<!-- END PANEL DEFAULT -->
						</div>
					</div>
					<!-- OVERVIEW -->
					<div class="panel panel-headline">
				
						<div class="panel" width="20px";>
								<div class="panel-heading">
									<h3 class="panel-title" width= >Product List</h3>
							<p class="panel-subtitle">Product Information</p>
							
								</div>
								<div class="panel-body">
								

<div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dTable">
                                    <thead>
                                        <tr>
                                           <th>Name</th>
                                            <th>Model</th>
                                            <th>Main KeyWords</th>
                                            <th>OtherKeywords</th>
                                            <th>FOB Price</th>
                                            <th>Product Size</th>
                                            <th>QTY</th>
                                            <th>PCs/CTN</th> 
                                            <th>Image</th>                                       
                                            <th>Supplier</th>
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
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script> 
    <script src="productJS.js"></script> 
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

load_productList();

function load_productList()
{
    var url = window.location.href;
    var str = url.split("=");
    var reId= str[1];
    $.ajax({
        type: "POST",
        url: "php/productOperations.php",
        dataType: "json",
        data:{type:"loadProductList",query:reId},
        success: function(data){    
            //window.reload();
            var i = 0;
            var row,id,name,mainkw,otherkw,price,psize,qty,packing,model,supplier,supplierId,imgNum;
            var old_tbody = document.getElementById("dTable").getElementsByTagName("tbody")[0];
    		var tbody = document.createElement('tbody');
    		var table = document.getElementById("dTable");

            for(i =0;i<data.length;i++)
            {	

            	row = data[i];
            	id = row.ProductId;
            	name = row.ProductName;
            	mainkw = getMainKW(id);
            	otherkw = getOtherKW(id);
            	price = row.Price;
            	psize = row.Size;
            	qty = row.QTY;
            	packing = row.Packing;
            	model = row.Model;
            	supplier = row.ComName;
            	supplierId = row.SupplierId;
            	imgNum = row.imgNum;
            	InitialProductList(tbody,id,name,mainkw,otherkw,price,psize,qty,packing,model,supplierId,supplier,imgNum);
            }
            table.replaceChild(tbody,old_tbody);
        }

    });
}


function InitialProductList(tbody,id,name,mainkw,otherkw,price,psize,qty,packing,model,supplierId,supplier,imgNum)
{
	
	var row = tbody.insertRow(0);

 	var cell = row.insertCell(0);
 	cell.innerHTML = id;
 	cell.style.display = "none";


	var cell1 = row.insertCell(1);
  	var link = document.createElement("a");
  	link.style.textDecoration = "underline";
  	var str1 = "clickProductFunction(";
  	var str2 = ")";
  	var p = str1.concat(id,str2);
  	link.setAttribute("onclick", p );
  	var linkText = document.createTextNode(name);
  	link.appendChild(linkText);
  	cell1.appendChild(link);

 	//cell = row.insertCell(1);
 	//cell.innerHTML = name;

 	cell = row.insertCell(2);
 	cell.innerHTML = model;

 	cell = row.insertCell(3);
 	cell.innerHTML = mainkw;

  cell = row.insertCell(4);
  cell.innerHTML = mainkw;

 	cell = row.insertCell(5);
 	cell.innerHTML = price;

 	cell = row.insertCell(6);
 	cell.innerHTML = psize;

 	cell = row.insertCell(7);
 	cell.innerHTML = qty;

 	cell = row.insertCell(8);
 	cell.innerHTML = packing;

 
 	
 	cell = row.insertCell(9);
 	var pic = document.createElement("IMG");
 	var path;

 	if(imgNum==0){
    path = "php/null.jpg";
 	}
  	else
  	{ 
    var tempPath = "php/image/";
    path = tempPath.concat(id).concat("/").concat("0.jpg");
 	}
 	 
 	 pic.setAttribute("src",path);
  	pic.setAttribute("width", "80");
  	pic.setAttribute("height", "80");

 	pic.onclick = function(){
 		clickImgFunction(imgNum,id);

 	};
 	cell.appendChild(pic);



 	cell = row.insertCell(10);
 	var link = document.createElement("a");
    link.setAttribute("href", "addProduct.php?supplier_id="+supplierId);
    var linkText = document.createTextNode(supplier);
    link.appendChild(linkText);
    cell.appendChild(link);
}
</script>

</body>

</html>
