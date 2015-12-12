<?php
	session_start();
?>

<html>
	<head>
		<title>Home</title>
		<link rel="stylesheet" type="text/css" href="css/Home.css">
		<link rel="stylesheet" type="text/css" href="css/framework.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script type="text/javascript" src="./js/AccountLogin.js"></script>
		<script type="text/javascript" src="js/Nav.js"></script>
		<!-- <script type="text/javascript" src="js/Home.js"></script> -->
		<!-- Add another script with necessary info for char creation -->
	</head>
	
	<?php require("php/header.php") ?>
	
		<h1 id="welcomeHeader">Welcome to DM Development Tools!</h1>
		
		<p id="aboutPara">DMDevTools is a website catering to those who wish to store their character sheets in a digital format. While
		currently under construction, this core essence of the site is available and ready for use!</p>
		
		<?php 
			if(!isset($_SESSION['user_id']))
			{
				echo '<p id="loginPrompt">Login or Create an Account Below!</p>
				<form id="accountCreationForm">
					Username:<input id="username" type="text"/><br>
					Password:<input id="password" type="text"/>
				</form>
				<div id="buttonsDiv"><div id="loginDiv"><button id="formSubmitLogin">Login</button></div>
				<div id="createDiv"><button id="formSubmitCreate">Create Account</button></div></div>';
			}
			else
			{
				echo '<div id="loggedInDiv"><p id="useridLabel">Logged in as '.$_SESSION['user_id'].'</p>
					<table id="charTable">
						<tr>
							<td colspan="3">Characters</td>
						</tr>';
				$host="sql5.freemysqlhosting.net";
				$port=3306;
				$socket="";
				$user="sql591042";
				$password = "bV7%lL1%";
				$dbname="sql591042";

				$con = new mysqli($host, $user, $password, $dbname, $port, $socket)
					or die ('Could not connect to the database server' . mysqli_connect_error());
				
				$result = $con->query("SELECT * FROM Characters WHERE player_id='".$_SESSION['user_id']."'");
				
				while($row = $result->fetch_assoc())
				{
					echo '<tr><td>'.$row['char_name'].'</td><td><button class="edit" id="'.$row['id'].'">Edit</button></td><td><button class="delete" id="'.$row['id'].'">Delete</button></td></tr>';
				}
						
				echo '</table></div>';
			}
		?>
		
	<?php require("php/footer.php") ?>