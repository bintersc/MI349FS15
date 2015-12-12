<?php
	session_start();
	if(!(isset($_SESSION['user_id'])))
	{
		header("Location: http://dmdevtools305.herokuapp.com/");
		exit;
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Character Creator</title>
		<link rel="stylesheet" type="text/css" href="css/CreateCharacter.css">
		<link rel="stylesheet" type="text/css" href="css/framework.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script type="text/javascript" src="js/CreateCharacter.js"></script>
		<script type="text/javascript" src="js/Nav.js"></script>
		<!-- Add another script with necessary info for char creation -->
	</head>
	
	<?php require("php/header.php") ?>
	
				<h1>Create a Character!</h1>
				<form>
					<div id="char_create_left_wrapper">
						<div class="char_create_div" id="general_info_div">
							<p class="div_title">General Info</p>
							<label class="char_create_text_label" for="char_name">Name:</label>
							<input class="char_create_text" id="char_name" type="text"/>
							<label class="char_create_text_label" for="player_name">Player:</label>
							<input class="char_create_text" id="player_name" type="text"/>
							<!--<label class="char_create_text_label" for="char_race">Race:</label>
							<input class="char_create_text" id="char_race" type="text"/>-->
							<label class="char_create_text_label" for="char_race">Race:</label>
							<select id="char_race">
								<option selected disabled hidden value=""></option>
								<option value="Human">Human</option>
								<option value="Elf">Elf</option>
								<option value="Dwarf">Dwarf</option>
								<option value="Other">Other</option>
							</select>
							<input type="hidden" class="char_create_text watermark_text" id="char_race_other" type="text"/>
							<br>
							<label class="char_create_text_label" for="char_size">Size:</label>
							<select id="char_size">
								<option selected disabled hidden value=""></option>
								<option value="S">S</option>
								<option value="M">M</option>
								<option value="L">L</option>
							</select>
							<label class="char_create_text_label" for="char_age">Age:</label>
							<input class="char_create_text" id="char_age" type="text"/>
							<label class="char_create_text_label" for="char_gender">Gender:</label>
							<input class="char_create_text" id="char_gender" type="text"/>
							<label class="char_create_text_label" for="char_height">Height:</label>
							<input class="char_create_text" id="char_height" type="text"/>
							<label class="char_create_text_label" for="char_weight">Weight:</label>
							<input class="char_create_text" id="char_weight" type="text"/>
							<label class="char_create_text_label" for="char_speed">Speed:</label>
							<input class="char_create_text" id="char_speed" type="text"/>
						</div>
						<div id="row_2">
							<div class="char_create_div" id="attribute_div">
								<p class="div_title">Attributes</p>
								<table id="attribute_table">
									<tr class="attr_table_row">
										<td class="attr_table_ability_name">Ability</td>
										<td class="attr_table_ability_total">Score</td>
										<td class="attr_table_ability_base">Base</td>
										<td class="attr_table_ability_bonus">Bonus</td>
										<td class="attr_table_ability_modifier">Mod</td>
									</tr>
									<tr class="attr_table_row">
										<td class="attr_table_ability_name">Strength</td>
										<td class="attr_table_ability_total"><input class="char_create_int attr_ability_total" id="char_str" type="number"/></td>
										<td class="attr_table_ability_base"><input class="char_create_int attr_ability_base" type="number"/></td>
										<td class="attr_table_ability_bonus"><input class="char_create_int attr_ability_bonus" id="char_str_bonus" type="number"/></td>
										<td class="attr_table_ability_modifier"><input class="char_create_int attr_ability_mod" type="number"/></td>
									</tr>
									<tr class="attr_table_row">
										<td class="attr_table_ability_name">Dexterity</td>
										<td class="attr_table_ability_total"><input class="char_create_int attr_ability_total" id="char_dex" type="number"/></td>
										<td class="attr_table_ability_base"><input class="char_create_int attr_ability_base" type="number"/></td>
										<td class="attr_table_ability_bonus"><input class="char_create_int attr_ability_bonus" id="char_dex_bonus" type="number"/></td>
										<td class="attr_table_ability_modifier"><input class="char_create_int attr_ability_mod" type="number"/></td>
									</tr>
									<tr class="attr_table_row">
										<td class="attr_table_ability_name">Constitution</td>
										<td class="attr_table_ability_total"><input class="char_create_int attr_ability_total" id="char_con" type="number"/></td>
										<td class="attr_table_ability_base"><input class="char_create_int attr_ability_base" type="number"/></td>
										<td class="attr_table_ability_bonus"><input class="char_create_int attr_ability_bonus" id="char_con_bonus" type="number"/></td>
										<td class="attr_table_ability_modifier"><input class="char_create_int attr_ability_mod" type="number"/></td>
									</tr>
									<tr class="attr_table_row">
										<td class="attr_table_ability_name">Intelligence</td>
										<td class="attr_table_ability_total"><input class="char_create_int attr_ability_total" id="char_int" type="number"/></td>
										<td class="attr_table_ability_base"><input class="char_create_int attr_ability_base" type="number"/></td>
										<td class="attr_table_ability_bonus"><input class="char_create_int attr_ability_bonus" id="char_int_bonus" type="number"/></td>
										<td class="attr_table_ability_modifier"><input class="char_create_int attr_ability_mod" type="number"/></td>
									</tr>
									<tr class="attr_table_row">
										<td class="attr_table_ability_name">Wisdom</td>
										<td class="attr_table_ability_total"><input class="char_create_int attr_ability_total" id="char_wis" type="number"/></td>
										<td class="attr_table_ability_base"><input class="char_create_int attr_ability_base" type="number"/></td>
										<td class="attr_table_ability_bonus"><input class="char_create_int attr_ability_bonus" id="char_wis_bonus" type="number"/></td>
										<td class="attr_table_ability_modifier"><input class="char_create_int attr_ability_mod" type="number"/></td>
									</tr>
									<tr class="attr_table_row">
										<td class="attr_table_ability_name">Charisma</td>
										<td class="attr_table_ability_total"><input class="char_create_int attr_ability_total" id="char_cha" type="number"/></td>
										<td class="attr_table_ability_base"><input class="char_create_int attr_ability_base" type="number"/></td>
										<td class="attr_table_ability_bonus"><input class="char_create_int attr_ability_bonus" id="char_cha_bonus" type="number"/></td>
										<td class="attr_table_ability_modifier"><input class="char_create_int attr_ability_mod" type="number"/></td>
									</tr>
								</table>
							</div>
							<div class="char_create_div" id="class_div">
								<table id="char_create_class_table">
									<p class="div_title">Classes<br><button id="addClassButton">Add Class</button></p>
									<tr>
										<td colspan="2" class="centered_cell" id="class_name_col">Name</td>
										<td class="centered_cell" id="class_level_col">Levels</td>
									</tr>
									<tr>
									</tr>
								</table>
							</div>
						</div>
						<div class="char_create_div" id="def_misc_div">
							<p class="div_title">Defence/Misc</p>
							<table>
								<tr class="def_table_row" id="def_row">
									<td class="def_table_cell">AC:<input class="char_create_int ac_cell" id="char_ac" type="number"/> = 10 +</td>
									<td class="def_table_cell">Armor:<input class="char_create_int ac_cell" id="char_armor_ac" type="number"/> + </td>
									<td class="def_table_cell">Shield:<input class="char_create_int ac_cell" id="char_shield_ac" type="number"/> + </td>
									<td class="def_table_cell">Dex:<input class="char_create_int ac_cell" id="char_dex_ac" type="number"/> + </td>
									<td class="def_table_cell">Size:<input class="char_create_int ac_cell" id="char_size_ac" type="number"/> + </td>
									<td class="def_table_cell">Misc:<input class="char_create_int ac_cell" id="char_misc_ac" type="number"/></td>
								</tr>
								<tr class="def_table_row" id="def_row_2">
									<td colspan="2" class="def_table_cell">Touch AC:<input class="char_create_int" id="char_tac" type="number"/></td>
									<td colspan="2" class="def_table_cell">Flat-Footed AC:<input class="char_create_int" id="char_fac" type="number"/></td>
									<td colspan="2" class="def_table_cell">HP:<input class="char_create_int" id="char_hp" type="number"/></td>
								</tr>
								<tr class="def_table_row" id="def_row_3">
									<td colspan="2" class="def_table_cell">Weapon:<input class="char_create_text" id="char_weapon" type="text"/></td>
									<td colspan="2" class="def_table_cell">Damage:<input class="char_create_text" id="char_dmg" type="text"/></td>
									<td colspan="2" class="def_table_cell">BAB:<input class="char_create_int" id="char_bab" type="number"/></td>
								</tr>
							</table>
						</div>
					</div>
					<div id="char_create_right_wrapper">
						<div class="char_create_div" id="skills_div">
							<p class="table_heading">Skills</p>
							<table class="black_small_text skills_table">
								<tr class="skills_table_row">
									<td class="skills_cell right_cell">Appraise:<input class="char_create_int" id="appraise" type="number" /></td>
									<td class="skills_cell right_cell">Autohypnosis:<input class="char_create_int" id="autohypnosis" type="number" /></td>
									<td class="skills_cell right_cell">Balance:<input class="char_create_int" id="balance" type="number" /></td>
								</tr>
								<tr class="skills_table_row">
									<td class="skills_cell right_cell">Bluff:<input class="char_create_int" id="bluff" type="number" /></td>
									<td class="skills_cell right_cell">Climb:<input class="char_create_int" id="climb" type="number" /></td>
									<td class="skills_cell right_cell">Concentration:<input class="char_create_int" id="concentration" type="number" /></td>
								</tr>
								<tr class="skills_table_row">
									<td class="skills_cell right_cell">Control Shape:<input class="char_create_int" id="control_shape" type="number" /></td>
									<td class="skills_cell right_cell">Craft Alchemy:<input class="char_create_int" id="craft_alch" type="number" /></td>
									<td class="skills_cell right_cell">Craft Armor:<input class="char_create_int" id="craft_armor" type="number" /></td>
								</tr>
								<tr class="skills_table_row">
									<td class="skills_cell right_cell">Craft Bows:<input class="char_create_int" id="craft_bows" type="number" /></td>
									<td class="skills_cell right_cell">Craft Weapons:<input class="char_create_int" id="craft_weapons" type="number" /></td>
									<td class="skills_cell right_cell">Craft Traps:<input class="char_create_int" id="craft_traps" type="number" /></td>
								</tr>
								<tr class="skills_table_row">
									<td class="skills_cell right_cell">Decipher Scpt:<input class="char_create_int" id="decipher_script" type="number" /></td>
									<td class="skills_cell right_cell">Diplomacy:<input class="char_create_int" id="diplomacy" type="number" /></td>
									<td class="skills_cell right_cell">Disable Device:<input class="char_create_int" id="disable_device" type="number" /></td>
								</tr>
								<tr class="skills_table_row">
									<td class="skills_cell right_cell">Disguise:<input class="char_create_int" id="disguise" type="number" /></td>
									<td class="skills_cell right_cell">Escape Artist:<input class="char_create_int" id="escape_artist" type="number" /></td>
									<td class="skills_cell right_cell">Forgery:<input class="char_create_int" id="forgery" type="number" /></td>
								</tr>
								<tr class="skills_table_row">
									<td class="skills_cell right_cell">Gather Info:<input class="char_create_int" id="gather_info" type="number" /></td>
									<td class="skills_cell right_cell">Handle Animal:<input class="char_create_int" id="handle_animal" type="number" /></td>
									<td class="skills_cell right_cell">Heal:<input class="char_create_int" id="heal" type="number" /></td>
								</tr>
								<tr class="skills_table_row">
									<td class="skills_cell right_cell">Hide:<input class="char_create_int" id="hide" type="number" /></td>
									<td class="skills_cell right_cell">Intimidate:<input class="char_create_int" id="intimidate" type="number" /></td>
									<td class="skills_cell right_cell">Jump:<input class="char_create_int" id="jump" type="number" /></td>
								</tr>
								<tr class="skills_table_row">
									<td class="skills_cell right_cell">Listen:<input class="char_create_int" id="listen" type="number" /></td>
									<td class="skills_cell right_cell">Move Silently:<input class="char_create_int" id="move_silently" type="number" /></td>
									<td class="skills_cell right_cell">Open Lock:<input class="char_create_int" id="open_lock" type="number" /></td>
								</tr>
								<tr class="skills_table_row">
									<td class="skills_cell right_cell">Perform:<input class="char_create_int" id="perform" type="number" /></td>
									<td class="skills_cell right_cell">Psicraft:<input class="char_create_int" id="psicraft" type="number" /></td>
									<td class="skills_cell right_cell">Profession:<input class="char_create_int" id="profession" type="number" /></td>
								</tr>
								<tr class="skills_table_row">
									<td class="skills_cell right_cell">Ride:<input class="char_create_int" id="ride" type="number" /></td>
									<td class="skills_cell right_cell">Search:<input class="char_create_int" id="search" type="number" /></td>
									<td class="skills_cell right_cell">Sense Motive:<input class="char_create_int" id="sense_motive" type="number" /></td>
								</tr>
								<tr class="skills_table_row">
									<td class="skills_cell right_cell">Sleight of Hand:<input class="char_create_int" id="slight_of_hand" type="number" /></td>
									<td class="skills_cell right_cell">Speak Language:<input class="char_create_int" id="speak_language" type="number" /></td>
									<td class="skills_cell right_cell">Spellcraft:<input class="char_create_int" id="spellcraft" type="number" /></td>
								</tr>
								<tr class="skills_table_row">
									<td class="skills_cell right_cell">Spot:<input class="char_create_int" id="spot" type="number" /></td>
									<td class="skills_cell right_cell">Survival:<input class="char_create_int" id="survival" type="number" /></td>
									<td class="skills_cell right_cell">Swim:<input class="char_create_int" id="swim" type="number" /></td>
								</tr>
								<tr class="skills_table_row">
									<td class="skills_cell right_cell">Tumble:<input class="char_create_int" id="tumble" type="number" /></td>
									<td class="skills_cell right_cell">Magic Device:<input class="char_create_int" id="use_magic" type="number" /></td>
									<td class="skills_cell right_cell">Psionic Device:<input class="char_create_int" id="use_psionic" type="number" /></td>
								</tr>
								<tr class="skills_table_row">
									<td colspan="3" class="skills_cell centered_cell">Use Rope:<input class="char_create_int" id="use_rope" type="number" /></td>
								</tr>
							</table>
							<p class="table_heading">Knowledge</p>
							<table class="black_small_text skills_table">
								<tr class="skills_table_row">
									<td class="skills_cell right_cell">Arcana:<input class="char_create_int" id="know_arcana" type="number" /></td>
									<td class="skills_cell right_cell">Arch/Eng:<input class="char_create_int" id="know_arch_eng" type="number" /></td>
								</tr>
								<tr class="skills_table_row">
									<td class="skills_cell right_cell">Dungeons:<input class="char_create_int" id="know_dungeons" type="number" /></td>
									<td class="skills_cell right_cell">Geography:<input class="char_create_int" id="know_geography" type="number" /></td>
								</tr>
								<tr class="skills_table_row">
									<td class="skills_cell right_cell">History:<input class="char_create_int" id="know_history" type="number" /></td>
									<td class="skills_cell right_cell">Local:<input class="char_create_int" id="know_local" type="number" /></td>
								</tr>
								<tr class="skills_table_row">
									<td class="skills_cell right_cell">Nature:<input class="char_create_int" id="know_nature" type="number" /></td>
									<td class="skills_cell right_cell">Nobility:<input class="char_create_int" id="know_nobility" type="number" /></td>
								</tr>
								<tr class="skills_table_row">
									<td class="skills_cell right_cell">Psionics:<input class="char_create_int" id="know_psionics" type="number" /></td>
									<td class="skills_cell right_cell">Religion:<input class="char_create_int" id="know_religion" type="number" /></td>
								</tr>
								<tr class="skills_table_row">
									<td colspan="2" class="skills_cell centered_cell">Planes:<input class="char_create_int" id="know_planes" type="number" /></td>
								</tr>
							</table>
						</div>
					</div>
					<div id="submit_button_div"><button id="submit_button">Submit Character</button></div>
				</form>
				<?php require("php/footer.php") ?>