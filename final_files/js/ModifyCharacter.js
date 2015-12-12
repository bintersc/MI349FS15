var classNum = 1;
var watermarkArray = {};
watermarkArray["char_race_other"] = "Enter Race";

$(document).ready(function()
{
	$(".watermark_text").each(function () {
		$(this).val(watermarkArray[$(this).attr("id")]).addClass("watermark");
	});
	
	$(".watermark_text").blur(function()
	{
		if(!$(this).val())
		{
			$(this).val(watermarkArray[$(this).attr("id")]).addClass("watermark");
		}
	});
	
	$(".watermark_text").focus(function() {
		$(this).removeClass("watermark");
		if($(this).val() == watermarkArray[$(this).attr("id")])
		{
			$(this).val("");
		}
	});
	
	$("#addClassButton").click(function(e)
	{
		e.preventDefault();
		$("#char_create_class_table tr:last").before("<tr><td colspan=\"2\"><select class=\"class_name\" id=\"classSelector" + classNum + "\"></select></td><td><input class=\"attrInputNum level_input\" type=\"number\" id=\"classLvl"+classNum+"\"></td></tr>");
		
		//Class options for insertion to selector above
		var nonCLS = "<option value=\"Default\">-</option>";
		var barCLS = "<option value=\"Barbarian\">Barbarian</option>";
		var brdCLS = "<option value=\"Bard\">Bard</option>";
		var cleCLS = "<option value=\"Cleric\">Cleric</option>";
		var druCLS = "<option value=\"Druid\">Druid</option>";
		var fghCLS = "<option value=\"Fighter\">Fighter</option>";
		var mnkCLS = "<option value=\"Monk\">Monk</option>";
		var pldCLS = "<option value=\"Paladin\">Paladin</option>";
		var psnCLS = "<option value=\"Psion\">Psion</option>";
		var pswCLS = "<option value=\"PsychicWarrior\">Psychic Warrior</option>";
		var rngCLS = "<option value=\"Ranger\">Ranger</option>";
		var rogCLS = "<option value=\"Rogue\">Rogue</option>";
		var sorCLS = "<option value=\"Sorcerer\">Sorcerer</option>";
		var sknCLS = "<option value=\"Soulknife\">Soulknife</option>";
		var wilCLS = "<option value=\"Wilder\">Wilder</option>";
		var wizCLS = "<option value=\"Wizard\">Wizard</option>";
		var aarCLS = "<option value=\"ArcaneArcher\">Arcane Archer</option>";
		var aatCLS = "<option value=\"ArcaneTrickster\">Arcane Trickster</option>";
		var arcCLS = "<option value=\"Archmage\">Archmage</option>";
		var assCLS = "<option value=\"Assassin\">Assassin</option>";
		var blkCLS = "<option value=\"Blackguard\">Blackguard</option>";
		var cerCLS = "<option value=\"Cerebremancer\">Cerebremancer</option>";
		var ddsCLS = "<option value=\"DragonDisciple\">Dragon Disciple</option>";
		var dueCLS = "<option value=\"Duelist\">Duelist</option>";
		var ddfCLS = "<option value=\"DwarvenDefender\">Dwarven Defender</option>";
		var elkCLS = "<option value=\"EldritchKnight\">Eldritch Knight</option>";
		var eloCLS = "<option value=\"Elocater\">Elocater</option>";
		var hieCLS = "<option value=\"Hierophant\">Hierophant</option>";
		var horCLS = "<option value=\"HorizonWalker\">Horizon Walker</option>";
		var lorCLS = "<option value=\"Loremaster\">Loremaster</option>";
		var metCLS = "<option value=\"Metamind\">Metamind</option>";
		var mysCLS = "<option value=\"MysticTheurge\">Mystic Theurge</option>";
		var psuCLS = "<option value=\"PsionUncarnate\">Psion Uncarnate</option>";
		var psfCLS = "<option value=\"PsionicFist\">Psionic Fist</option>";
		var pyrCLS = "<option value=\"Pyrokineticist\">Pyrokineticist</option>";
		var shdCLS = "<option value=\"Shadowdancer\">Shadowdancer</option>";
		var slyCLS = "<option value=\"Slayer\">Slayer</option>";
		var thaCLS = "<option value=\"Thaumaturgist\">Thaumaturgist</option>";
		var thrCLS = "<option value=\"Thrallherd\">Thrallherd</option>";
		var warCLS = "<option value=\"WarMind\">War Mind</option>";
		//Create the necessary html tags
		$("#classSelector" +classNum).append(nonCLS, barCLS, brdCLS, cleCLS, druCLS, fghCLS, mnkCLS, 
								pldCLS, psnCLS, pswCLS, rngCLS, rogCLS, sorCLS, sknCLS, wilCLS, wizCLS,
								aarCLS, aatCLS, arcCLS, assCLS, blkCLS, cerCLS, ddsCLS, dueCLS, ddfCLS, 
								elkCLS, eloCLS, hieCLS, horCLS, lorCLS, metCLS, mysCLS, psuCLS, psfCLS,
								pyrCLS, shdCLS, slyCLS, thaCLS, thrCLS, warCLS);
								
		classNum++;
	});
	
	$("#addClassButton").click();
	
	$("#submit_button").click( function(e) {
		e.preventDefault();
		var raceChoice = $("#char_race").val();
		if(raceChoice == "other")
			raceChoice = $("#char_race_other").val();
		
		//Gather Core Data
		var params = "name=" + $("#char_name").val() + 
						"&player=" + $("#player_name").val() +
						"&race=" + raceChoice +
						"&size=" + $("#char_size").val() +
						"&age=" + $("#char_age").val() +
						"&gender=" + $("#char_gender").val() +
						"&height=" + $("#char_height").val() +
						"&weight=" + $("#char_weight").val() +
						"&speed=" + $("#char_speed").val();
						
		//Pull Attribute Data
		params += "&str=" + $("#char_str").val() +
					"&dex=" + $("#char_dex").val() +
					"&con=" + $("#char_con").val() +
					"&int=" + $("#char_int").val() +
					"&wis=" + $("#char_wis").val() +
					"&cha=" + $("#char_cha").val();
						
		//Pull AC/Health Data
		params += "&hp=" + $("#char_hp").val() +
					"&ac=" + $("#char_ac").val() +
					"&tac=" + $("#char_tac").val() +
					"&fac=" + $("#char_fac").val();
					
		//Weapon Data
		params += "&weapon=" + $("#char_weapon").val() +
					"&dmg=" + $("#char_dmg").val() +
					"&bab=" + $("#char_bab").val();
					
		//Skills that kills
		params += "&ap=" + GrabInt("#appraise") +
					"&au=" + GrabInt("#autohypnosis") +
					"&ba=" + GrabInt("#balance") +
					"&bl=" + GrabInt("#bluff") +
					"&cl=" + GrabInt("#climb") +
					"&conc=" + GrabInt("#concentration") +
					"&cont=" + GrabInt("#control_shape") +
					"&cal=" + GrabInt("#craft_alch") +
					"&car=" + GrabInt("#craft_armor") +
					"&cb=" + GrabInt("#craft_bows") +
					"&cw=" + GrabInt("#craft_weapons") +
					"&ct=" + GrabInt("#craft_traps") +
					"&de=" + GrabInt("#decipher_script")+
					"&dip=" + GrabInt("#diplomacy") +
					"&disa=" + GrabInt("#disable_device") +
					"&disg=" + GrabInt("#disguise") +
					"&e=" + GrabInt("#escape_artist") +
					"&f=" + GrabInt("#forgery") +
					"&g=" + GrabInt("#gather_info")+
					"&ha=" + GrabInt("#handle_animal") +
					"&he=" + GrabInt("#heal") +
					"&hi=" + GrabInt("#hide") +
					"&i=" + GrabInt("#intimidate") +
					"&j=" + GrabInt("#jump")+
					"&l=" + GrabInt("#listen") +
					"&m=" + GrabInt("#move_silently") +
					"&o=" + GrabInt("#open_lock") +
					"&pe=" + GrabInt("#perform") +
					"&ps=" + GrabInt("#psicraft")+
					"&pr=" + GrabInt("#profession") +
					"&r=" + GrabInt("#ride") +
					"&sea=" + GrabInt("#search") +
					"&sen=" + GrabInt("#sense_motive") +
					"&sl=" + GrabInt("#slight_of_hand") +
					"&spea=" + GrabInt("#speak_language")+
					"&spel=" + GrabInt("#spellcraft") +
					"&spo=" + GrabInt("#spot") +
					"&su=" + GrabInt("#survival") +
					"&sw=" + GrabInt("#swim") +
					"&t=" + GrabInt("#tumble") +
					"&um=" + GrabInt("#use_magic")+
					"&up=" + GrabInt("#use_psionic") +
					"&ur=" + GrabInt("#use_rope") +
					"&arc=" + GrabInt("#know_arcana") +
					"&ae=" + GrabInt("#know_arch_eng")+
					"&dun=" + GrabInt("#know_dungeons") +
					"&geo=" + GrabInt("#know_geography") +
					"&his=" + GrabInt("#know_history") +
					"&loc=" + GrabInt("#know_local") +
					"&nat=" + GrabInt("#know_nature") +
					"&nob=" + GrabInt("#know_nobility")+
					"&psi=" + GrabInt("#know_psionics") +
					"&rel=" + GrabInt("#know_religion") +
					"&pla=" + GrabInt("#know_planes");
		
		//Pull Class Data
		var classString = "";
		var cNum = 1;
		while( $("#classSelector" + cNum).length != 0)
		{
			if($("#classSelector" + cNum).val() != "Default")
			{
				classString += "&clsName" + cNum + "=" + $("#classSelector" + cNum).val() + "&clsLvl" + cNum + "=" + GrabInt("#classLvl" + cNum);
			}
			cNum++;
		}
		params += classString;
		console.log(params);
		//Make POST
		var req = new XMLHttpRequest();
		req.open("POST", "phpHandlers/sqlCharModify.php", true);
		req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		req.onreadystatechange = function() {
			if(req.readyState == 4 && req.status == 200) {
				if(req.responseText === "Success")
				{
				  window.location.href = "http://dmdevtools305.herokuapp.com/";
				}
				else
				{
					console.log(req.responseText);
				}
			}
		}
		req.send(params);
	});
});



function GrabInt(name)
{
	if($(name).val() == "" || $(name).val() % 1 != 0 || $(name).val() < 0)
		return 0;
	else 
		return $(name).val();
}
