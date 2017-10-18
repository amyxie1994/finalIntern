function load_data(){
 	$.ajax({
 		type: "POST",
        url: "php/researchDataOperations.php",
        data: {type:"listResearchData"},
        dataType: "json",
        success:function(data){
            update(data);
           
        }
 	});
 }

 function quickSearch()
{  
    var query = document.getElementById("searchData").value;

    $.ajax({
        type:"POST",
        url:"php/researchDataOperations.php",
        data: {type:"QsearchData",query:query},
        dataType: "json",
        success:function(data){
          
            update(data);        
        }
    });
}
 
function update(data)
{
    var id,mainkw,otherkw,name,QTY,sampleCost,totalCost,estProfit,FBA,MOQ,life_cycle;

    var old_tbody = document.getElementById("dTable").getElementsByTagName("tbody")[0];
    var tbody = document.createElement('tbody');
    var table = document.getElementById("dTable");


    for (var i = 0; i < data.length; i++) {
        row = data[i];

        id = row.ResultId;
        mainkw = getMainKW(id);
        otherkw = getOtherKW(id);
        name = row.productName;
        BSR = row.BSR;
        sellerPrice = row.sellerPrice;
        AliPrice = row.AliPrice;
        estProfit = row.estProfit;
        FBA = row.FBA_fees;
        life_cycle = row.life_cycle;
        
        
        append_table(tbody,id,mainkw,otherkw,name,BSR,sellerPrice,AliPrice,estProfit,FBA,life_cycle,row.Create_time,row.Creator);
    }
    table.replaceChild(tbody,old_tbody);
}
 function append_table(tbody,id,mainkw,otherkw,name,BSR,sellerPrice,AliPrice,estProfit,FBA,life_cycle,Create_time,Creator)
 {

 	var row = tbody.insertRow(0);

 	var cell = row.insertCell(0);
 	cell.innerHTML = id;
 	cell.style.display = "none";

 	var cell1 = row.insertCell(1);
    var link = document.createElement("a");
   link.setAttribute("href", "addCompetitorAnalysis.php?reseach_id="+id );
   var linkText = document.createTextNode(name);
    link.appendChild(linkText);
    cell1.appendChild(link);
 	//cell1.innerHTML = name;

 	var cell2 = row.insertCell(2);
 	cell2.innerHTML = mainkw;

 	var cell3 = row.insertCell(3);
 	cell3.innerHTML = otherkw;

 	var cell4 = row.insertCell(4);
 	cell4.innerHTML = BSR;

 	var cell5 = row.insertCell(5);
 	cell5.innerHTML = sellerPrice;

 	var cell6 = row.insertCell(6);
 	cell6.innerHTML =AliPrice;

 	var cell7 = row.insertCell(7);
 	cell7.innerHTML =FBA;

 	var cell8 = row.insertCell(8);
 	cell8.innerHTML =estProfit;

 	var cell9 = row.insertCell(9);
 	cell9.innerHTML =life_cycle;

    var cell10 = row.insertCell(10);
    cell10.innerHTML =Create_time;
 
    var cell11 = row.insertCell(11);
    cell11.innerHTML =Creator;


 	var cell12 = row.insertCell(12);
 	var btn1 = document.createElement('button');
 	btn1.className = "btn btn-info btn-xs";
 	btn1.onclick = function(){	
        viewProduct(id);
 	};
    var temp1 = document.createElement('i');
    temp1.className = "fa fa-pencil-square-o";
    temp1.setAttribute("aria-hidden", "true");

    btn1.appendChild(temp1);
    cell12.appendChild(btn1);

    cell12 = row.insertCell(13);
    btn1 = document.createElement('button');
    btn1.className = "btn btn-info btn-xs";
    btn1.onclick = function(){
       editData(id);
    };
    temp1 = document.createElement('i');
    temp1.className = "fa fa-database";
    temp1.setAttribute("aria-hidden", "true");

    btn1.appendChild(temp1);
    cell12.appendChild(btn1);
 	

 	var cell13 = row.insertCell(14);
 	var btn2 = document.createElement('button');
 	btn2.className = "btn btn-danger btn-xs";
 	btn2.onclick = function(){
 		deleteData(id);
 	};

 	var temp2 = document.createElement('i');
    temp2.className = "fa fa-trash-o";
    temp2.setAttribute("aria-hidden", "true");
  
    btn2.appendChild(temp2);
    cell13.appendChild(btn2);

 }

function viewProduct(id)
{   
    window.location.href = "productList.php?re_id="+id;
}
function editData(id)
{
   
    window.location.href = "editResearchData.php?re_id="+id;
}

function deleteData(id)
{
    $.ajax({
        type: "POST",
        url: "php/researchDataOperations.php",
        dataType: "json",
        data:{type:"deleteResearchData",query:id},
        success: function(data){    
             alert(data);
             location.reload();
        }

    });
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



function getMainKW(ProductId){
    var kw = "null";
    $.ajax({
        type: "POST",
        url: "php/productOperations.php",
        dataType: "json",
        async:false,
        data:{type:"getMainKW",query:ProductId},
        success: function(data){
            kw = data[0].Keyword;
        }

    });
    return kw;
    
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

function clickFunction() {
  var modal = document.getElementById('myModal');
    modal.style.display = "block";
}
function closeModal() {
  var modal = document.getElementById('myModal');
    modal.style.display = "none";
}
