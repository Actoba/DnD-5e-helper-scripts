<?php
$filename = "weapons.html";
$start = 1;
$max = 6;

$file = file_get_contents($filename);

$melee_header = <<<'END'
		<h4 class="sheet-center">Melee Weapons <span class="sheet-pictos">D</span></h4>
		<div class="sheet-row sheet-sub-header">
			<div class="sheet-col-1-24 sheet-center sheet-small-label sheet-vert-bottom">Prof?</div>
			<div class="sheet-col-1-8 sheet-center sheet-small-label sheet-vert-bottom">Weapon</div>
			<div class="sheet-col-1-6 sheet-center sheet-small-label sheet-vert-bottom">Properties</div>
			<div class="sheet-col-1-12 sheet-center sheet-small-label sheet-vert-bottom">Finesse?</div>
			<div class="sheet-col-1-12 sheet-center sheet-small-label sheet-vert-bottom sheet-padr">Magic Bonus</div>
			<div class="sheet-col-1-24 sheet-center sheet-small-label sheet-vert-bottom sheet-padr">To<br/>Hit</div>
			<div class="sheet-col-1-12 sheet-center sheet-small-label sheet-vert-bottom">Damage Dice</div>
			<div class="sheet-col-1-24 sheet-center sheet-small-label sheet-vert-bottom">+ stat?</div>
			<div class="sheet-col-1-24 sheet-center sheet-small-label sheet-vert-bottom">Dmg<br/>Bonus</div>
			<div class="sheet-col-1-12 sheet-center sheet-small-label sheet-vert-bottom">Crit Dmg</div>
			<div class="sheet-col-1-8 sheet-center sheet-small-label sheet-vert-bottom">Damage Type</div>
			<div class="sheet-col-1-12 sheet-center sheet-small-label sheet-vert-bottom">Attack</div>
		</div>
END;

$melee_rows = <<<'END'
	<!-- BEGIN melee weapon row -->
	<div class="sheet-row">
		<div class="sheet-col-1-24 sheet-checkbox-row"><input type="checkbox" value="@{PB}" name="attr_pbmeleeCURRENTROW" checked="checked"></div>
		<div class="sheet-col-1-8"><input type="text" name="attr_meleeweaponnameCURRENTROW"></div>
		<div class="sheet-col-1-6"><input type="text" name="attr_meleeweaponpropsCURRENTROW"></div>
		<div class="sheet-col-1-12">
			<select name="attr_meleeattackstatCURRENTROW">
				<option value="@{strength_mod}">No</option>
				<option value="@{finesse_mod}">Yes</option>
			</select>
		</div>
		<div class="sheet-col-1-12 sheet-padr" title="The magic bonus will be added as a bonus to BOTH the attack and damage rolls"><input type="number" name="attr_meleemagicCURRENTROW" value="0" step="1"></div>
		<div class="sheet-col-1-24 sheet-padr"><input type="number" name="attr_meleetohitCURRENTROW" value="@{meleeattackstatCURRENTROW} + @{pbmeleeCURRENTROW} + @{meleemagicCURRENTROW}" disabled="disabled"></div>
		<div class="sheet-col-1-12" title="Only enter the base damage roll here without any bonuses from stats or other sources"><input class="sheet-center" type="text" name="attr_meleedmgCURRENTROW" value="0"></div>
		<div class="sheet-col-1-24 sheet-checkbox-row"><input type="checkbox" value="1" name="attr_meleeattackstatdmgCURRENTROW" checked="checked"></div>
		<div class="sheet-col-1-24"><input type="number" name="attr_meleedmgbonusCURRENTROW" value="(@{meleeattackstatCURRENTROW} * @{meleeattackstatdmgCURRENTROW}) + @{meleemagicCURRENTROW}" disabled="disabled"></div>
		<div class="sheet-col-1-12"><input class="sheet-center" type="text" name="attr_meleecritdmgCURRENTROW"></div>
		<div class="sheet-col-1-8"><input type="text" name="attr_meleedmgtypeCURRENTROW"></div>
		<div class="sheet-col-1-12 sheet-center"><button type="roll" class="sheet-roll" name="roll_MeleeAttackCURRENTROW" value="&{template:5eDefault} {{weapon=1}} {{title=@{meleeweaponnameCURRENTROW}}} {{subheader=@{character_name}}} {{subheaderright=Melee attack}} {{subheader2=@{meleeweaponpropsCURRENTROW}}} {{attack=[[1d20 + @{meleetohitCURRENTROW} + (@{global_melee_attack_bonus}) ]]}} {{attackadv=[[1d20 + @{meleetohitCURRENTROW} + (@{global_melee_attack_bonus}) ]]}} {{damage=[[@{meleedmgCURRENTROW} + @{meleedmgbonusCURRENTROW} + (@{global_melee_damage_bonus})  + 0d0]] @{meleedmgtypeCURRENTROW}}} {{critdamage=Additional [[@{meleecritdmgCURRENTROW}]] damage}}" >Attack</button></div>
	</div>
	<!-- END melee weapon row -->

END;

$ranged_header = <<<'END'
		<h4 class="sheet-center">Ranged Weapons <span class="sheet-pictos">e</span></h4>
		<div class="sheet-row sheet-sub-header">			
			<div class="sheet-col-1-24 sheet-center sheet-small-label sheet-vert-bottom">Prof?</div>
			<div class="sheet-col-1-20 sheet-center sheet-small-label sheet-vert-bottom">Ammo</div>
			<div class="sheet-col-1-8 sheet-center sheet-small-label sheet-vert-bottom">Weapon</div>
			<div class="sheet-col-1-6 sheet-center sheet-small-label sheet-vert-bottom">Properties</div>
			<div class="sheet-col-1-10 sheet-center sheet-small-label sheet-vert-bottom">Type</div>
			<div class="sheet-col-1-12 sheet-center sheet-small-label sheet-vert-bottom sheet-padr">Magic Bonus</div>
			<div class="sheet-col-1-24 sheet-center sheet-small-label sheet-vert-bottom sheet-padr">To<br/>Hit</div>
			<div class="sheet-col-1-12 sheet-center sheet-small-label sheet-vert-bottom">Damage Dice</div>
			<div class="sheet-col-1-24 sheet-center sheet-small-label sheet-vert-bottom">Dmg<br/>Bonus</div>
			<div class="sheet-col-1-12 sheet-center sheet-small-label sheet-vert-bottom">Crit Dmg</div>
			<div class="sheet-col-1-10 sheet-center sheet-small-label sheet-vert-bottom">Damage Type</div>
			<div class="sheet-col-1-12 sheet-center sheet-small-label sheet-vert-bottom">Attack</div>
		</div>
		
				
END;

$ranged_rows = <<<'END'
	<!-- BEGIN ranged weapon row -->
	<div class="sheet-row">
		<div class="sheet-col-1-24 sheet-checkbox-row"><input type="checkbox" value="@{PB}" name="attr_pbrangedCURRENTROW" checked="checked"></div>
		<div class="sheet-col-1-20"><input type="number" name="attr_rangedammoCURRENTROW" value="1"></div>
		<div class="sheet-col-1-8"><input type="text" name="attr_rangedweaponnameCURRENTROW"></div>
		<div class="sheet-col-1-6"><input type="text" name="attr_rangedweaponpropsCURRENTROW"></div>
		<div class="sheet-col-1-10" title="Choose either normal or thrown">
			<select name="attr_rangedtypeCURRENTROW">
				<option value="@{dexterity_mod}">Normal</option>
				<option value="@{strength_mod}">Thrown</option>
				<option value="@{finesse_mod}">Thrown(finesse)</option>
			</select>
		</div>
		<div class="sheet-col-1-12 sheet-padr" title="The magic bonus will be added as a bonus to BOTH the attack and damage rolls"><input type="number" name="attr_rangedmagicCURRENTROW" value="0" step="1"></div>
		<div class="sheet-col-1-24 sheet-padr"><input type="number" name="attr_rangedtohitCURRENTROW" value="@{rangedtypeCURRENTROW} + @{pbrangedCURRENTROW} + @{rangedmagicCURRENTROW}" disabled="disabled"></div>
		<div class="sheet-col-1-12" title="Only enter the base damage roll here without any bonuses from stats or other sources"><input class="sheet-center" type="text" name="attr_rangeddmgCURRENTROW" value="0"></div>		
		<div class="sheet-col-1-24"><input type="number" name="attr_rangeddmgbonusCURRENTROW" value="@{rangedtypeCURRENTROW} + @{rangedmagicCURRENTROW}" disabled="disabled"></div>
		<div class="sheet-col-1-12"><input class="sheet-center" type="text" name="attr_rangedcritdmgCURRENTROW"></div>
		<div class="sheet-col-1-10"><input type="text" name="attr_rangeddmgtypeCURRENTROW"></div>
		<div class="sheet-col-1-12 sheet-center"><button type="roll" class="sheet-roll" name="roll_RangedAttackCURRENTROW" value="&{template:5eDefault} {{weapon=1}} {{title=@{rangedweaponnameCURRENTROW}}} {{subheader=@{character_name}}} {{subheaderright=Ranged attack}} {{subheader2=@{rangedweaponpropsCURRENTROW}}} {{attack=[[1d20 + @{rangedtohitCURRENTROW} + (@{global_ranged_attack_bonus}) ]]}} {{attackadv=[[1d20 + @{rangedtohitCURRENTROW} + (@{global_ranged_attack_bonus}) ]]}} {{damage=[[@{rangeddmgCURRENTROW} + @{rangeddmgbonusCURRENTROW} + (@{global_ranged_damage_bonus})  + 0d0]] @{rangeddmgtypeCURRENTROW}}} {{critdamage=Additional [[@{rangedcritdmgCURRENTROW}]] damage}}" >Attack</button></div>
	</div>
	<!-- END ranged weapon row -->

END;


$wrapper_end = <<<END
		<hr/>
END;

$full_output = "";

//Melee loop
for ($i=$start; $i<=$max; $i++)
{
	$return_text = "";
	
	if (($i==1) )
	{
		//Add start of section wrapper
		$return_text .= $melee_header;
	}

	$return_text .= $melee_rows;
		
	// Replace placeholders with correct values
	$return_text = str_replace("CURRENTROW", $i, $return_text);
	$return_text = str_replace("PAGENUMBER", ceil($i/5), $return_text);
	
	$full_output .= $return_text;
	
}

//Ranged loop
for ($i=$start; $i<=$max; $i++)
{
	$return_text = "";
	
	if (($i==1) )
	{
		//Add start of section wrapper
		$return_text .= $ranged_header;
	}

	$return_text .= $ranged_rows;
		
	// Replace placeholders with correct values
	$return_text = str_replace("CURRENTROW", $i, $return_text);
	$return_text = str_replace("PAGENUMBER", ceil($i/5), $return_text);
	
	$full_output .= $return_text;
	
}

$full_output .= $wrapper_end;

//echo $full_output;

$file = $full_output;
file_put_contents($filename, $file);


?>