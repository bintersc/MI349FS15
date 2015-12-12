<?php
	$race_name = CheckExists("race", "Unknown");
	if($race_name == "Unknown")
	{
		echo "null";
		exit;
	}
	$host="sql5.freemysqlhosting.net";
	$port=3306;
	$socket="";
	$user="sql591042";
	$password = "bV7%lL1%";
	$dbname="sql591042";

	$con = new mysqli($host, $user, $password, $dbname, $port, $socket)
		or die ('Could not connect to the database server' . mysqli_connect_error());
		
	$result = $con->query("SELECT * FROM Races WHERE name='".$race_name."'");
	if($result->num_rows != 1)
	{
		echo "error";
		exit;
	}
	$row = $result->fetch_row();
	echo $row[1].":".$row[2].":".$row[3].":".$row[4];
	exit;
		
	function CheckExists($varName, $defaultVal)
	{
		if(isset($_POST[$varName]))
			return $_POST[$varName];
		else
			return $defaultVal;
	}
?>