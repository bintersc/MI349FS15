<?php
	session_start();
	if(isset($_POST['id']))
	{
		$_SESSION['modify'] = $_POST['id'];
		echo "Success";
	}
?>