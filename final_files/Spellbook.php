<!DOCTYPE html>
<html>
	<head>
		<title>Spellbook</title>
		<link rel="stylesheet" type="text/css" href="css/framework.css">
		<link rel="stylesheet" type="text/css" href="css/Spellbook.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script type="text/javascript" src="js/Spellbook.js"></script>
		<script type="text/javascript" src="js/Nav.js"></script>
		<!-- Add another script with necessary info for char creation -->
	</head>
	
	<?php require("php/header.php") ?>
	
	<h1>Search For Spells!</h1>
	<div id="centeringDiv">
		<form>
			<div id="query_div"><input id="query" type="text"/></div>
			<div id="submit_button_div"><button id="submit_button">Search</button></div>
		</form>
	</div>
	
	<?php require("php/footer.php") ?>