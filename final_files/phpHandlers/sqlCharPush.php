<?php
	session_start();
	$response = "Success!";
	echo $response;
	$char = CheckExists("name", "Unknown");
	$player = CheckExists("player", "Unknown");
	
	$host="sql5.freemysqlhosting.net";
	$port=3306;
	$socket="";
	$user="sql591042";
	$password = "bV7%lL1%";
	$dbname="sql591042";

	$con = new mysqli($host, $user, $password, $dbname, $port, $socket)
		or die ('Could not connect to the database server' . mysqli_connect_error());

	$result = $con->query("SELECT * FROM Characters WHERE char_name='".$char."' AND player_id='".$_SESSION['user_id']."'");
	if($result->num_rows > 0)
	{
		echo "Name already exists in this campaign";
	}
	else
	{
		$race = CheckExists("race", "Unknown");
		$base = "".CheckExists("size", "M").",".CheckExists("age", 0).",".CheckExists("gender", "-").",".
						CheckExists("height", 0).",".CheckExists("weight", 0).",".CheckExists("speed", 0);
		$attr = CheckExists("str", 0).",".CheckExists("dex", 0).",".CheckExists("con", 0).",".
						CheckExists("int", 0).",".CheckExists("wis", 0).",".CheckExists("cha", 0);
		$def = CheckExists("ac", 0).",".CheckExists("hp", 0).",".CheckExists("fac", 0).",".CheckExists("tac", 0);
		$skills = CheckExists("ap", 0).",".CheckExists("au", 0).",".
					CheckExists("ba", 0).",".CheckExists("bl", 0).",".
					CheckExists("cl", 0).",".CheckExists("conc", 0).",".
					CheckExists("cont", 0).",".CheckExists("cal", 0).",".
					CheckExists("car", 0).",".CheckExists("cb", 0).",".
					CheckExists("cw", 0).",".CheckExists("ct", 0).",".
					CheckExists("de", 0).",".CheckExists("dip", 0).",".
					CheckExists("disa", 0).",".CheckExists("disg", 0).",".
					CheckExists("e", 0).",".CheckExists("f", 0).",".
					CheckExists("g", 0).",".CheckExists("ha", 0).",".
					CheckExists("he", 0).",".CheckExists("hi", 0).",".
					CheckExists("i", 0).",".CheckExists("j", 0).",".
					CheckExists("l", 0).",".CheckExists("m", 0).",".
					CheckExists("o", 0).",".CheckExists("pe", 0).",".
					CheckExists("ps", 0).",".CheckExists("pr", 0).",".
					CheckExists("r", 0).",".CheckExists("sea", 0).",".
					CheckExists("sen", 0).",".CheckExists("sl", 0).",".
					CheckExists("spea", 0).",".CheckExists("spel", 0).",".
					CheckExists("spo", 0).",".CheckExists("su", 0).",".
					CheckExists("sw", 0).",".CheckExists("t", 0).",".
					CheckExists("um", 0).",".CheckExists("up", 0).",".
					CheckExists("ur", 0).",".CheckExists("arc", 0).",".
					CheckExists("ae", 0).",".CheckExists("dun", 0).",".
					CheckExists("geo", 0).",".CheckExists("his", 0).",".
					CheckExists("loc", 0).",".CheckExists("nat", 0).",".
					CheckExists("nob", 0).",".CheckExists("psi", 0).",".
					CheckExists("rel", 0).",".CheckExists("pla", 0);
		$weapons = CheckExists("weapon", "-").",".CheckExists("dmg", 0).",".CheckExists("bab", 0);
		$classes = "";
		$count = 1;
		while(CheckExists("clsName".$count, false))
		{
			if($count == 1)
			{
				$classes = CheckExists("clsName1", "Class1").",".CheckExists("clsLvl1", 1);
			}
			else 
			{
				$classes = $classes.",".CheckExists("clsName".$count, "Class1").",".CheckExists("clsLvl".$count, 1);
			}
			$count++;
		}
		
		echo "INSERT INTO Characters (player_id, char_name, player_name, race, attributes, base_stats, defense_stats, weapon_stats, classes, skills) 
							VALUES ('".$_SESSION['user_id']."', '".$char."', '".$player."', '".$race."', '".$attr."', '".$base."', '".$def."', '".$weapons."', '".$classes."', '".$skills."')";
		$result = $con->query("INSERT INTO Characters (player_id, char_name, player_name, race, attributes, base_stats, defense_stats, weapon_stats, classes, skills) 
							VALUES ('".$_SESSION['user_id']."', '".$char."', '".$player."', '".$race."', '".$attr."', '".$base."', '".$def."', '".$weapons."', '".$classes."', '".$skills."')");
		if($result === TRUE)
			echo "Record created successfully";
	}
	
	$con->close();
	
	echo " End!";
	
	
	
	
	/*$xml = new DOMDocument();
	//Root
	$xml_root = $xml->createElement("root");
	$xml->appendChild($xml_root);
	
	//Base Stats
	$xml_char = $xml->createElement("Characteristics");
	$xml_fname = $xml->createElement("FName", $fname);
	$xml_lname = $xml->createElement("LName", $lname);
	$xml_race = $xml->createElement("Race", $race);
	
	//Base Stats Appends
	$xml_char->appendChild($xml_fname);
	$xml_char->appendChild($xml_lname);
	$xml_char->appendChild($xml_race);
	
	//Attributes
	$xml_attr = $xml->createElement("Attributes");
	$xml_attr_str = $xml->createElement("Strength", $attr[0]);
	$xml_attr_dex = $xml->createElement("Dexterity", $attr[1]);
	$xml_attr_con = $xml->createElement("Constitution", $attr[2]);
	$xml_attr_int = $xml->createElement("Intelligence", $attr[3]);
	$xml_attr_wis = $xml->createElement("Wisdom", $attr[4]);
	$xml_attr_cha = $xml->createElement("Charisma", $attr[5]);
	
	//Attribute Appends
	$xml_attr->appendChild($xml_attr_str);
	$xml_attr->appendChild($xml_attr_dex);
	$xml_attr->appendChild($xml_attr_con);
	$xml_attr->appendChild($xml_attr_int);
	$xml_attr->appendChild($xml_attr_wis);
	$xml_attr->appendChild($xml_attr_cha);
	
	//Defense
	$xml_def = $xml->createElement("Defense");
	$xml_def_hp = $xml->createElement("HP", $hp);
	$xml_def_ac = $xml->createElement("AC", $ac);
	$xml_def_tac = $xml->createElement("TAC", $tac);
	$xml_def_fac = $xml->createElement("FAC", $fac);
	
	//Defense Appends
	$xml_def->appendChild($xml_def_hp);
	$xml_def->appendChild($xml_def_ac);
	$xml_def->appendChild($xml_def_tac);
	$xml_def->appendChild($xml_def_fac);
	
	//Base Level Appends
	$xml_root->appendChild($xml_char);
	$xml_root->appendChild($xml_attr);
	$xml_root->appendChild($xml_def);
	
	
	$xml->save("text.xml");
	*/
	function CheckExists($varName, $defaultVal)
	{
		if(isset($_POST[$varName]))
			return $_POST[$varName];
		else
			return $defaultVal;
	}
	
	
	
	
?>