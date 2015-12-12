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
		
		
	$id;
	if(isset($_POST["id"]))
	{
		$id = $_POST["id"];
	}
	else {die();}
	//Get hash off of username
	$result = $con->query("SELECT * FROM Characters WHERE id=".$id."");
	if($result->num_rows == 0)
	{
		echo "Character name does not exist";
	}
	else 
	{
		$row = $result->fetch_assoc();
		if($row['id'] == $id && $_SESSION['user_id'] == $row['player_id'])
		{
			$result = $con->query("DELETE FROM Characters WHERE id=".$id." AND player_id=".$_SESSION['user_id']."");
			if($result)
			{
				echo "Success";
			}
		}
	}
?>