<?php
	session_start();
	$host="sql5.freemysqlhosting.net";
	$port=3306;
	$socket="";
	$user="sql591042";
	$password = "bV7%lL1%";
	$dbname="sql591042";

	$con = new mysqli($host, $user, $password, $dbname, $port, $socket)
		or die ('Could not connect to the database server' . mysqli_connect_error());
		
	$username;
	if(isset($_POST["username"]))
	{
		$username = $_POST["username"];
	}
	else {die();}
	if(isset($_POST["password"]))
	{
		$password = $_POST["password"];
	}
	else {die();}
	
	//We have username and password
	
	$result = $con->query("SELECT * FROM Users WHERE username='".$username."'");
	if($result->num_rows > 0)
	{
		echo "Campaign name already exists...";
	}
	else
	{
		$salt_string = password_hash($password, PASSWORD_DEFAULT);
		$user_id = rand(1000000, 9999999);
		$result = $con->query("SELECT * FROM Users WHERE userid='".$user_id."'");
		while($result->num_rows > 0)
		{
			$user_id = rand(1000000, 9999999);
			$result = $con->query("SELECT * FROM Users WHERE userid='".$user_id."'");
		}
		$result = $con->query("INSERT INTO Users (username, password, userid) VALUES ('".$username."', '".$salt_string."', '".$user_id."')");
		if($result === TRUE)
		{
			echo "Success";
			$_SESSION['user_id'] = $user_id;
		}
		else
		{
			echo "Failure";
		}
	}
?>