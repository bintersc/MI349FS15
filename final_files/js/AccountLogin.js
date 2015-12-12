$(document).ready(function() 
{
	$("#formSubmitCreate").click(function(e) 
	{
		e.preventDefault();
		
		var params = "username=" + $("#username").val() + 
						"&password=" + $("#password").val();
		
		console.log(params);
		
		var req = new XMLHttpRequest();
		req.open("POST", "phpHandlers/createAccountHandler.php", true);
		req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		req.onreadystatechange = function() {
			if(req.readyState == 4 && req.status == 200) {
				if(req.responseText === "Success")
				{
					window.location.href = "http://dmdevtools305.herokuapp.com/";
				}
				else if(!$("#rejectText").length)
				{
					$("#accountCreationForm").append("<p id=\"rejectText\">That username already exists</p");
				}
				else
				{
					$("#rejectText").html = "That username already exists";
				}
			}
		}
		req.send(params);
	});
	
	$("#formSubmitLogin").click(function(e) 
	{
		e.preventDefault();
		
		var params = "username=" + $("#username").val() + 
						"&password=" + $("#password").val();
		
		console.log(params);
		
		var req = new XMLHttpRequest();
		req.open("POST", "phpHandlers/loginAccount.php", true);
		req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		req.onreadystatechange = function() {
			if(req.readyState == 4 && req.status == 200) {
				if(req.responseText === "Success")
				{
					window.location.href = "http://dmdevtools305.herokuapp.com/";
				}
				else if(!$("#rejectText").length)
				{
					$("#accountCreationForm").append("<p id=\"rejectText\">The username and password do not match any records in our system</p");
				}
				else
				{
					$("#rejectText").html = "The username and password do not match any records in our system";
				}
			}
		}
		req.send(params);
	});
	
	$(".delete").click(function(e)
	{
		e.preventDefault();
		
		var params = "id=" + $(this).attr('id');
		
		console.log(params);
		
		var req = new XMLHttpRequest();
		req.open("POST", "phpHandlers/deleteChar.php", true);
		req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		req.onreadystatechange = function() {
			if(req.readyState == 4 && req.status == 200) {
				if(req.responseText === "Success")
				{
				  window.location.href = "http://dmdevtools305.herokuapp.com/";
				}
			}
		}
		req.send(params);
	});
	
	$(".edit").click(function(e)
	{
		e.preventDefault();
		
		var params = "id=" + $(this).attr('id');
		
		console.log(params);
		
		var req = new XMLHttpRequest();
		req.open("POST", "phpHandlers/modifyChar.php", true);
		req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		req.onreadystatechange = function() {
			if(req.readyState == 4 && req.status == 200) {
				if(req.responseText === "Success")
				{
					console.log("Success!");
				  window.location.href = "http://dmdevtools305.herokuapp.com/ModifyCharacter.php";
				}
			}
		}
		req.send(params);
	});
});

