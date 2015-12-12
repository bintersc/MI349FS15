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
	
	//Get hash off of username
	$result = $con->query("SELECT * FROM Users WHERE username='".$username."'");
	if($result->num_rows == 0)
	{
		echo "Campaign name does not exist";
	}
	else 
	{
		$row = $result->fetch_assoc();
		//if info is correct, login
		//if(password_verify($password, password_hash($password, PASSWORD_DEFAULT)))
		//	echo "Successful verify?";
		if(password_verify($password, $row['password']))
		{
			$_SESSION['user_id'] = $row['userid'];
			echo "Success";
		}
		else
		{
			echo "Failure";
		}
	}
?>