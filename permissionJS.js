
function check_privilege(type)
{
	$.ajax({
		type: "POST",
        url: "php/permissionCheck.php",
        data: {type:type},
        dataType: "json",
        success:function(data){
        	if(data=="reject")
        	{
        		alert("sorry you do not have permission to add supplier!")
        		window.location.href = "index.php";
        	}
        	
        }
	});
}