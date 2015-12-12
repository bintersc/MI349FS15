$(document).ready(function() 
{
	$("#submit_button_div").click(function(e)
	{
		e.preventDefault();
		var params = "query='" + $("#query").val() + "'";
		var req = new XMLHttpRequest();
		req.open("POST", "phpHandlers/spellLookup.php", true);
		req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		req.onreadystatechange = function() {
			if(req.readyState == 4 && req.status == 200) {
				console.log(req.responseText);
				var responseArray = req.responseText.split(",");
				if(responseArray[0] === "Success")
				{
				  if($("#spellTitle").length)
					{
						$("#spellTitle").html = responseArray[1];
						$("#spellDescription").html = responseArray[2];
						$("#spellDamage").html = responseArray[3];
					}
					else
					{
						$("#submit_button_div").after("<div id='spellLayoutDiv'><p id='spellTitle'>" + responseArray[1] + "</p><p id='spellDescription'>" + responseArray[2] + "</p><p id='spellDamage'>" + responseArray[3] + "</p></div>");
					}
				}
				else
				{
					console.log(req.responseText);
				}
			}
		}
		req.send(params);
	});
});

