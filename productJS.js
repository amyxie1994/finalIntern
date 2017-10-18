

function getProductList(supplierId)
{
	var url = window.location.href;
    var str = url.split("=");
    var supplierId= str[1];

	 $.ajax({
        type: "POST",
        url: "php/productOperations.php",
        data: {supplierId:supplierId,type:"getProductList"},
        dataType: "json",
        success:function(data){

        	var row;
        	var productId;
        	var name;
        	var mainkw;
        	var otherkw;
        	var proSize;
        	var QTY;
        	var packing;
        	var model;
        	var imgNum;
        	var price;


        	var old_tbody = document.getElementById("dTable").getElementsByTagName("tbody")[0];
    		var tbody = document.createElement('tbody');
    		var table = document.getElementById("dTable");

        	for(var i=0;i<data.length;i++)
        	{
        	
        		row = data[i];
        		productId = data[i].ProductId;

        		name = data[i].ProductName;
        		proSize = data[i].Size;
        		QTY = data[i].QTY;
        		packing = data[i].Packing;
        		model =data[i].Model;

        		price = data[i].Price;
        		imgNum = data[i].imgNum;

        		mainkw = getMainKW(productId);
        		otherkw = getOtherKW(productId);
        		
        		appendProductInfo(tbody,productId,name,mainkw,otherkw,price,proSize,QTY,packing,model,imgNum,row.Create_time,row.Creator)
        	}

        	table.replaceChild(tbody,old_tbody);
        }
    });
}

function editProduct(productId){
  var modal = document.getElementById('myModal2');
    modal.style.display = "block";
    editProductFunction(productId);

}



function editProductFunction(id) {
  
    $.ajax({
    type: "POST",
    url: "php/productOperations.php",
    dataType: "json",
    //async:false,
    data:{type:"showProduct",productId:id},
    success: function(data){
      var row;
      row = data[0];
      
      var element = document.getElementById('productName22');
        element.value = row.ProductName;

 var element = document.getElementById('EditProductId');
        element.value = row.ProductId;

 var element = document.getElementById('editsupplierId');
        element.value = row.SupplierId;

        
        element = document.getElementById('mainKW22');
        element.value = getMainKW(row.ProductId);
        element = document.getElementById('otherKW22');
        element.value = getOtherKW(row.ProductId);

        element = document.getElementById('Model22');
        element.value = row.Model;

        element = document.getElementById('Craft22');
        element.value = row.Craft;

        element = document.getElementById('PLt22');
        element.value = row.ProductionLt;

        element = document.getElementById('Size22');
        element.value  = row.Size;
        
        element = document.getElementById('Csize22');
        element.value = row.CartonSize;

        element = document.getElementById('Price22');
        element.value = row.Price;

        

        


        element = document.getElementById('STime22');
        element.value = row.SampleLt;

        
        element = document.getElementById('PSize22');
        element.value = row.ProductSize;
        

        element = document.getElementById('QTY22');
        element.value = row.QTY;

        element = document.getElementById('Packing22');
        element.value = row.Packing;

        element = document.getElementById('OtherInfo22');
        element.value = row.OtherInfo;

      }
    });

  
    
}

function appendProductInfo(tbody,productId,name,mainkw,otherkw,price,proSize,QTY,packing,model,imgNum,Create_time,Creator)
{
	
	var row = tbody.insertRow(0);

 	var cell = row.insertCell(0);
 	cell.innerHTML = productId;
 	cell.style.display = "none";

 	var cell1 = row.insertCell(1);
  var link = document.createElement("a");
  link.style.textDecoration = "underline";
  var str1 = "clickProductFunction(";
  var str2 = ")";
  var p = str1.concat(productId,str2);
  link.setAttribute("onclick", p );
  var linkText = document.createTextNode(name);
  link.appendChild(linkText);
  cell1.appendChild(link);

  cell = row.insertCell(2);
  cell.innerHTML = model;

 	cell = row.insertCell(3);
  cell.innerHTML = mainkw;
 	

 	cell = row.insertCell(4);
  cell.innerHTML = otherkw;
 	

 	cell = row.insertCell(5);
 	cell.innerHTML = price;

 	cell = row.insertCell(6);
 	cell.innerHTML = proSize;

 	cell = row.insertCell(7);
 	cell.innerHTML = QTY;

 	cell = row.insertCell(8);
 	cell.innerHTML = packing;

  cell = row.insertCell(9);
  cell.innerHTML = Create_time;

  cell = row.insertCell(10);
  cell.innerHTML = Creator;

 	cell = row.insertCell(11);
 	var pic = document.createElement("IMG");
 	var path;
 	if(imgNum==0){
    path = "php/null.jpg";
 	}
  else
  {
    var tempPath = "php/image/";
    path = tempPath.concat(productId).concat("/").concat("0.jpg");
  }
  pic.setAttribute("src",path);
  pic.setAttribute("width", "80");
  pic.setAttribute("height", "80");

 	pic.onclick = function(){
 		clickImgFunction(imgNum,productId);

 	};
 	cell.appendChild(pic);


 	cell = row.insertCell(12);
 	var btn = document.createElement('button');
 	btn.className = "btn btn-danger btn-xs";
 	btn.onclick = function(){
 		deleteProduct(productId);
 	};

 	var temp = document.createElement('i');
    temp.className = "fa fa-trash-o";
    temp.setAttribute("aria-hidden", "true");
    btn.appendChild(temp);
    cell.appendChild(btn);

   cell = row.insertCell(13);
  var btn = document.createElement('button');
  btn.className = "btn btn-info btn-xs";
  btn.onclick = function(){
    editProduct(productId);
  };

   temp = document.createElement('i');
    temp.className = "fa fa-pencil-square-o";
    temp.setAttribute("aria-hidden", "true");
    btn.appendChild(temp);
    cell.appendChild(btn);

}

function closeEditModal() {
	var modal = document.getElementById('myModal2');
    modal.style.display = "none";
}


function deleteProduct(productId)
{
	$.ajax({
  		type: "POST",
        url: "php/productOperations.php",
        dataType: "json",
  		data:{type:"deleteProduct",productId:productId},
  		success: function(data){
  			
  			if(data){
  				alert("Delete successfully");
  				location.reload();
  			}
  			else
  				alert("Fail to delete, pleaze try again!");
          location.reload();
  		}
  	});
}

function clickFunction() {
	var modal = document.getElementById('myModal');
    modal.style.display = "block";
}

function clickProductFunction(id) {
	
	  var modal = document.getElementById('productInfoModal');
    modal.style.display = "block";

    $.ajax({
  	type: "POST",
    url: "php/productOperations.php",
    dataType: "json",
    //async:false,
    data:{type:"showProduct",productId:id},
    success: function(data){
  		var row;
  		row = data[0];
  		
  		var element = document.getElementById('name');
        element.innerHTML = "<b>Name: </b>"+row.ProductName;
        
        var element2 = document.getElementById('mainkw233');
element2.innerHTML = "<b>Main keyword:</b> "+getMainKW(row.ProductId);

        element = document.getElementById('otherkw233');
        element.innerHTML = "<b>Other keyword:</b> "+getOtherKW(row.ProductId);

        element = document.getElementById('craft');
        element.innerHTML = "<b>Material: </b>"+row.Craft;

        element = document.getElementById('psize');
        element.innerHTML = "<b>CBM/CTN:</b>"+row.ProductSize;

        element = document.getElementById('price');
        element.innerHTML = "<b>FOB fees(USD):</b>"+row.Price;

        element = document.getElementById('Size2');
        element.innerHTML = "<b>Size:</b>"+row.Size;

        element = document.getElementById('PLt2');
        element.innerHTML = "<b>Thickness:</b>"+row.ProductionLt;


        element = document.getElementById('SLt');
        element.innerHTML = "<b>Port:</b>"+row.SampleLt;

        element = document.getElementById('Csize2');
        element.innerHTML = "<b>Carton size:</b>"+row.CartonSize;

        element = document.getElementById('Model2');
        element.innerHTML = "<b>Model No:</b>"+row.Model;

        element = document.getElementById('QTY2');
        element.innerHTML = "<b>QTY:</b>"+row.QTY;

        element = document.getElementById('Packing2');
        element.innerHTML = "<b>PCs/CTN:</b>"+row.Packing;

        element = document.getElementById('comment');
        element.innerHTML = "<b>Other information:</b>"+row.OtherInfo;

  		}
  	});

  
    
}



function closeModal() {
	var modal = document.getElementById('myModal');
    modal.style.display = "none";
}

function closeProModal(){
	var modal = document.getElementById('productInfoModal');
    modal.style.display = "none";
   
}

function addProduct(){
	var url = window.location.href;
    var str = url.split("=");
    var supplierId= str[1];  
}


function getOtherKW(ProductId)
{
	var otherkw = "null";
	$.ajax({
  		type: "POST",
        url: "php/productOperations.php",
        dataType: "json",
        async:false,
  		data:{type:"getOtherKW",query:ProductId},
  		success: function(data){	
  			otherkw= concatOtherKeyword(data);
  		}

  	});
  	return otherkw;
}

function concatOtherKeyword(data)
{
	var row;
  	var result;
  	var temp = ",";


  	if(data.length > 0)
  		result=data[0].Keyword;

  	for(var i= 1; i<data.length;i++)
  	{  
  		result = result.concat(temp);
  		row = data[i];
  		result = result.concat(row.Keyword);
  	}
  	
  	return result;
}

function getMainKW(ProductId){

	var kw = "null";
	$.ajax({
  		type: "POST",
        url: "php/productOperations.php",
        dataType: "json",
        async:false,
  		data:{type:"getMainKW",query:ProductId},
  		success: function(data){
        //alert(data);
       // kw = "maink";
  			kw = data[0].Keyword;
  		}

  	});
	return kw;
	
}

var slideIndex = 1;
showSlides(slideIndex);
//showSlides(slideIndex);

function clickImgFunction(n,id) {
	var modal = document.getElementById('imgModal');
    modal.style.display = "block";

  var path = [],temp;
  for (var i=0;i<n;i++)
  {
    temp="php/image/";
    path[i] = temp.concat(id).concat("/").concat(i).concat(".jpg");
  }
  createImgTag(n,path);
  currentSlide(1);
}

function closeImgModal(){
	var modal = document.getElementById('imgModal');
    modal.style.display = "none";
   
}



function createImgTag(n,path)
{
	var modal = document.getElementById("modalReplace");
  modal.innerHTML = '';

	var divElement,pic;

	for(var i=0;i<n;i++)
	{
		divElement = document.createElement("div");
		divElement.className="mySlides";

		pic = document.createElement("IMG");
 		pic.setAttribute("src",path[i]);

 		pic.style.width="100%";
    //spic.style.height="70%";
   	divElement.appendChild(pic);
   	modal.appendChild(divElement);
	}

  var atag = document.createElement("A");
  atag.innerHTML = "&#10094;";
  atag.className = "prev";
  atag.setAttribute("onclick","plusSlides(-1)");
  modal.appendChild(atag);

  atag = document.createElement("A");
  atag.innerHTML = "&#10095;";
  atag.className = "next";
  atag.setAttribute("onclick","plusSlides(1)");
  modal.appendChild(atag);


	for(var i=0;i<n;i++)
	{
		divElement = document.createElement("div");
		divElement.className="column";

		var pic = document.createElement("IMG");
		pic.className="demo cursor";

		
 		pic.setAttribute("src",path[i]);
 		pic.style.width = "100%";

 		var temp ="currentSlide(";
 		var fun = temp.concat(i+1).concat(")");
    pic.setAttribute("onclick",fun);


   	divElement.appendChild(pic);
   	modal.appendChild(divElement);
	}


}

function plusSlides(n) {
  showSlides(slideIndex += n);
}


function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) 
{
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demo");

  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";

}