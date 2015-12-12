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
		
	$result = $con->query("SELECT * FROM Spells WHERE name=".$_POST['query']."");
	
	if($result->num_rows == 1)
	{
		echo "Success,";
		$row = $result->fetch_assoc();
		echo $row['name'].",".$row['description'].",".$row['damage'];
	}
	
	
	$con->close();
	
	function CheckExists($varName, $defaultVal)
	{
		if(isset($_POST[$varName]))
			return $_POST[$varName];
		else
			return $defaultVal;
	}
	
	
	
	
?>