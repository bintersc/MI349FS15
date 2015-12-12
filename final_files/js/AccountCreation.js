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
				$("#formSubmit").after(req.responseText);
				console.log(req.responseText);
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
				$("#formSubmit").after(req.responseText);
				console.log(req.responseText);
			}
		}
		req.send(params);
	});
});