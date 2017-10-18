/*$( "#searchSupplier" ).autocomplete({
  source: [ "c++", "java", "php", "coldfusion", "javascript", "asp", "ruby" ]
});

*/
function search()
{  
    var query = document.getElementById("searchSupplier").value;
    $.ajax({
        type:"POST",
        url:"php/supplierOperations.php",
        data: {type:"searchSupplier",query:query},
        dataType: "json",
        success:function(data){

            update(data);        
        }
    });
}

function load_data(){
 	$.ajax({
 		type: "POST",
        url: "php/supplierOperations.php",
        data: {type:"listSupplier"},
        dataType: "json",
        success:function(data){
            update(data);
        }
 	});
 }
 
function update(data)
{
    var comName;
    var address;
    var conPerson;
    var Email;
    var aliSite;
    var ebsite;
    var skype;
    var fax;
    var phone;
    var role;
    var otherInfo;
    var creator;
    var create_time;

    var old_tbody = document.getElementById("dTable").getElementsByTagName("tbody")[0];
    var tbody = document.createElement('tbody');
    var table = document.getElementById("dTable");


    for (var i = 0; i < data.length; i++) {
        row = data[i];
        supId = row.SupplierId;
        name = row.ComName;
        address = row.Address;
        conPerson = row.ContactPerson;
        email = row.Email;
        aliSite = row.AlibabaSite;
        ebsite = row.Ebsite;
        skype = row.Skype;
        fax = row.Fax;
        phone= row.Phone;
        role = row.Role;
        otherInfo = row.OtherInfo;
        creator = row.Creator;
        create_time = row.Create_time;

        append_table(tbody,supId,name,address,conPerson,email,aliSite,ebsite,skype,fax,phone,role,otherInfo,creator, create_time);
    }
    table.replaceChild(tbody,old_tbody);
}
 function append_table(tbody,supId,name,address,conPerson,email,aliSite,ebsite,skype,fax,phone,role,otherInfo,creator, create_time){
 	
 	var row = tbody.insertRow(0);

 	var cell = row.insertCell(0);
 	cell.innerHTML = supId;
 	cell.style.display = "none";

 	var cell1 = row.insertCell(1);
    var link = document.createElement("a");
   link.setAttribute("href", "addProduct.php?supplier_id="+supId );
   var linkText = document.createTextNode(name);
    link.appendChild(linkText);
    cell1.appendChild(link);
 	//cell1.innerHTML = name;

 	//var cell2 = row.insertCell(2);
 	//cell2.innerHTML = address;

 	var cell3 = row.insertCell(2);
 	cell3.innerHTML = conPerson;

 	var cell4 = row.insertCell(3);
 	cell4.innerHTML = email;

 	var cell5 = row.insertCell(4);
 	cell5.innerHTML = aliSite;

 	var cell6 = row.insertCell(5);
 	cell6.innerHTML =ebsite;

 	//var cell7 = row.insertCell(7);
 	//cell7.innerHTML =skype;

 	var cell8 = row.insertCell(6);
 	cell8.innerHTML =fax;

 	var cell9 = row.insertCell(7);
 	cell9.innerHTML =phone;


 	var cell10 = row.insertCell(8);
 	cell10.innerHTML =role;

 	//var cell11 = row.insertCell(11);
 	//cell11.innerHTML =otherInfo;



 	cell8 = row.insertCell(9);
 	cell8.innerHTML = creator;


	cell8 = row.insertCell(10);
 	cell8.innerHTML = create_time;


 	var cell12 = row.insertCell(11);
 	var btn1 = document.createElement('button');
 	btn1.className = "btn btn-info btn-xs";
 	btn1.onclick = function(){
 		editSupplier(supId);
 	};

 	var temp1 = document.createElement('i');
    temp1.className = "fa fa-pencil-square-o";
    temp1.setAttribute("aria-hidden", "true");

 	var cell13 = row.insertCell(12);
 	var btn2 = document.createElement('button');
 	btn2.className = "btn btn-danger btn-xs";
 	btn2.onclick = function(){
 		deleteSupplier(supId);
 	};

 	var temp2 = document.createElement('i');
    temp2.className = "fa fa-trash-o";
    temp2.setAttribute("aria-hidden", "true");

    btn1.appendChild(temp1);
    cell12.appendChild(btn1);
    btn2.appendChild(temp2);
    cell13.appendChild(btn2);

 }


  function deleteSupplier(SupplierID){
    $.ajax({
        type: "POST",
        url: "php/supplierOperations.php",
        data:{SupplierID:SupplierID,type:"deleteSupplier"},
        dataType: "json",
        success:function(data){
            alert(data);
            location.reload();
        }
    });

 }

function editSupplier(supplier_id)
{
    window.location = 'editSupplier.php?supplier_id='+supplier_id ;
 }


function initial()
{   
    var url = window.location.href;
    var str = url.split("=");
    var supllierId= str[1];

    fill_data(supllierId);

}

function fill_data(supplierId)
{
    
    $.ajax({
        type: "POST",
        url: "php/supplierOperations.php",
        data: {supplierId:supplierId,type:"editSupplier"},
        dataType: "json",
        success:function(data){

            var row = data[0];
            var element;

            element = document.getElementById('supplierId');
            element.value=row.SupplierId;

            element = document.getElementById('comName');
            element.value=row.ComName;

            element = document.getElementById('address');
            element.value=row.Address;
            
            element = document.getElementById('conPerson');
            element.value=row.ContactPerson;

            element = document.getElementById('email');
            element.value=row.Email;

            element = document.getElementById('aliSite');
            element.value=row.AlibabaSite;

            element = document.getElementById('ebsite');
            element.value=row.Ebsite;

            element = document.getElementById('skype');                
            element.value=row.Skype;
                
            element = document.getElementById('fax');
            element.value=row.Fax;

            element = document.getElementById('phoneNo');
            element.value=row.Phone;

            element = document.getElementById('otherInfo');
            element.value=row.OtherInfo;

                
            if(row.Role=="Trading")
            {
                element = document.getElementById('trading');
                element.checked = true;
            }
            else if (row.Role == "Manufacture")
            {
                element = document.getElementById('manufacture');
                element.checked = true;
            }
            else
            {
                element = document.getElementById('both');
                element.checked = true;
            }


        }
    });
}


function get_href()
{
    var url = window.location.href;
    var str = url.split("=");
    var supplierId= str[1];
    load_info(supplierId);
    
}

function load_info(supplierId)
{

    $.ajax({
        type: "POST",
        url: "php/supplierOperations.php",
        data: {supplierId:supplierId,type:"editSupplier"},
        dataType: "json",
        success:function(data){
            
            var row = data[0];
            var element;
           element = document.getElementById('supplierId');
          element.value = row.SupplierId;
           element = document.getElementById('ComName');
          element.innerHTML = "<b>Name:</b> "+row.ComName;

          element = document.getElementById('Address');
          element.innerHTML = "<b>Address:</b> "+row.Address;

          element = document.getElementById('Email');
          element.innerHTML = "<b>Email:</b> "+row.ComName;

          element = document.getElementById('ConPerson');
          element.innerHTML = "<b>Contact Person: </b>"+row.ContactPerson;

          element = document.getElementById('AliSite');
          element.innerHTML = "<b>Source(Alibaba) Site:</b> "+row.AlibabaSite;

          element = document.getElementById('Ebsite');
          element.innerHTML = "<b>Company Website: </b>"+row.Ebsite;

          element = document.getElementById('Fax');
          element.innerHTML = "<b>Fax:</b> "+row.Fax;

          element = document.getElementById('Skype');
          element.innerHTML = "<b>Skype:</b> "+row.Skype;

          element = document.getElementById('Phone');
          element.innerHTML = "<b>Phone:</b> "+row.Phone;

          element = document.getElementById('Role');
          element.innerHTML = "<b>Role:</b> "+row.Role;

          element = document.getElementById('OtherInfo');
          element.innerHTML = "<b>OtherInfo:</b> "+row.OtherInfo;
        }
     });
 }

