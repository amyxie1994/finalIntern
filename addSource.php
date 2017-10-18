
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
<script src="supplierJS.js"></script>
<script src="productJS.js"></script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

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


//load_data();
</script>

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
    color: #aaaaaa;
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
        <a href="index.php"><img src="assets/img/logo.png" class="img-responsive logo"></a>
      </div>
      <div class="container-fluid">
        <div class="navbar-btn">
          <button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
        </div>
      
        
        <div id="navbar-menu">
          <ul class="nav navbar-nav navbar-right">

            <li>
              <a href="#"><img src="assets/img/user.jpg" class="img-circle" alt="Avatar"></span></a>
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
              <a href="#subPages1" data-toggle="collapse" class="collapsed active"><i class="lnr lnr-dice"></i><span>Supplier Data Mgmt</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
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
              

							
	<div id="myModal" class="modal">
  		<div class="modal-content" width = "100px">
  		<form action="php/sourceOperations.php" method="post"  enctype="multipart/form-data">
      	<div class="modal-header">
        	<button type="button" onclick = "closeModal()" class="close" data-dismiss="modal">&times;</button>
        	<h4 class="modal-title">Add Source</h4>
        	
      	</div>
      	<div class="modal-body">
     <input type="hidden" value = "addSource" id = "type" name ="type">
<table style="width:100%">
    <tr>
        <td> Name: </td>
        <td> <input type="text"  placeholder="Name of Source" id = "sourceName" name ="sourceName"> </td>
       
    </tr>

    
      </table> 
            
      </div>
      <div class="modal-footer">
        <button type="submit" name="submit" value = "Submit" class="btn btn-default" data-dismiss="modal" ">Add</button>
        
      </div>
       </form>
    </div>

</div>


<div id="productInfoModal" class="modal">
  		<div class="modal-content" width = "100px">
      	<div class="modal-header">
        	<button type="button" onclick = "closeProModal()" class="close" data-dismiss="modal">&times;</button>
        	<h4 class="modal-title"><b>Product Infomation</b></h4>
        	
      	</div>
			<div class="modal-body">
		
				<p id= "name">dsfsd</p> 
				
			</div>
			</div>
</div>
<!-- /**********************************************************************/ -->
<div id="imgModal" class="imgmodal">
 <span class="close cursor"  style="color:#ff0000" onclick="closeImgModal()">&times;</span>
 <div class="imgmodal-content" id="modalReplace">

 
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
									<h3 class="panel-title" width= >Source Information</h3>
						
							
								</div>
								<div class="panel-body">
								
<button type="button" id = "addProduct" onclick = "clickFunction()" class="btn btn-success">Add Source</button>
<div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dTable">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                           
                                            <th>Creator</th>                                      
                                            <th>Operation</th>
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

	<script type="text/javascript">

loadData();
function loadData()
{

   $.ajax({
        type: "POST",
        url: "php/sourceOperations.php",
        data: {type:"getSourceList"},
        dataType: "json",
        success:function(data){

        var old_tbody = document.getElementById("dTable").getElementsByTagName("tbody")[0];
        var tbody = document.createElement('tbody');
        var table = document.getElementById("dTable");
        var row,cell,btn,temp,id;

          for(var i=0;i<data.length;i++)
          {
          
          row = tbody.insertRow(0);

          id = data[i].Id;
          cell = row.insertCell(0);
          cell.innerHTML = data[i].Id;
          cell.style.display = "none";

          cell = row.insertCell(1);
          cell.innerHTML = data[i].SourceName;

          cell = row.insertCell(2);
          cell.innerHTML = data[i].Creator;
          
          cell = row.insertCell(3);
          btn = document.createElement('button');
          btn.className = "btn btn-danger btn-xs";
          btn.onclick = function(){
            deleteSource(id);
          };

          temp = document.createElement('i');
          temp.className = "fa fa-trash-o";
          temp.setAttribute("aria-hidden", "true");
          btn.appendChild(temp);
          cell.appendChild(btn);


          }

          table.replaceChild(tbody,old_tbody);
        }
    });
}

function deleteSource(id)
{
  $.ajax({
        type: "POST",
        url: "php/sourceOperations.php",
        data: {type:"deleteSource",id:id},
        dataType: "json",
        success:function(data){
          alert(data);
          location.reload();
        }
      });
}

</script>

</body>

</html>
