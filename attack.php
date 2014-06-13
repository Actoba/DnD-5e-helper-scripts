<?php
$filename = "attack.html";
$start = 1;
$max = 45;

$file = file_get_contents($filename);

$wrapper_start = <<<END
			<!-- BEGIN new spell page -->
			<div class="sheet-spell-page-attackPAGENUMBER">
				<div class="sheet-row sheet-sub-header">
					<div class="sheet-col-1-12 sheet-vert-bottom sheet-center sheet-small-label">Row#</div>
					<div class="sheet-col-5-12 sheet-vert-bottom sheet-center sheet-small-label">Spell name</div>
					<div class="sheet-col-1-6 sheet-vert-bottom sheet-center sheet-small-label">Spell Level</div>
					<div class="sheet-col-1-6 sheet-vert-bottom sheet-center sheet-small-label">Gained from</div>
					<div class="sheet-col-1-6 sheet-vert-bottom sheet-center sheet-small-label">Prepared?</div>
				</div>
END;

$wrapper_end = <<<END
			</div>
			<!-- END spell page -->
END;

$attack_rows = <<<'END'
	
	<!-- BEGIN attack spell row -->
	<div class="sheet-attack-spell-rowCURRENTROW">
		<div class="sheet-row sheet-grey-row">

			<div class="sheet-col-1-12 sheet-vert-middle sheet-spell-row-number">CURRENTROW</div>
			<div class="sheet-col-5-12 sheet-vert-middle"><input type="text" name="attr_attackspellnameCURRENTROW"></div>
			<div class="sheet-col-1-6 sheet-vert-middle">
				<select name="attr_attackspellbaselevelCURRENTROW">
					<option value="0">Cantrip</option>
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
					<option value="6">6</option>
					<option value="7">7</option>
					<option value="8">8</option>
					<option value="9">9</option>
				</select>
			</div>	
			<div class="sheet-col-1-6 sheet-vert-middle" title="Use this field to indicate where you learned or have access to this spell from.  Useful to know if multiclassing or if you gain access to spells your class would not normally have thanks to subclass bonuses">
				<select name="attr_attackspellgainedfromCURRENTROW">
					<option value="0">None</option>
					<option value="@{bard_spell_dc}">Bard</option>
					<option value="@{cleric_spell_dc}">Cleric</option>
					<option value="@{druid_spell_dc}">Druid</option>
					<option value="@{mage_spell_dc}">Mage</option>
					<option value="@{paladin_spell_dc}">Paladin</option>
					<option value="@{ranger_spell_dc}">Ranger</option>
					<option value="0">Racial Bonus</option>
				</select>
			</div>	
			<div class="sheet-col-1-6 sheet-vert-middle" title="Always prepared means the spell is either a cantrip or one that was provided to you via a method which indicated it would never count against your prepared limit for the day">
				<select name="attr_attackspellispreparedCURRENTROW">
					<option value="1">Yes</option>
					<option value="0">NO</option>
					<option value="0.0001">Always</option>
				</select>
			</div>
			
		</div>
				
		<div class="sheet-row sheet-grey-row">
			<div class="sheet-col-1-12 sheet-small-label sheet-center">
				<select name="attr_attackspellattackstatCURRENTROW">
					<option value="0">None</option>
					<option value="@{strength_mod}">STR</option>
					<option value="@{dexterity_mod}">DEX</option>
					<option value="@{constitution_mod}">CON</option>
					<option value="@{intelligence_mod}">INT</option>
					<option value="@{wisdom_mod}">WIS</option>
					<option value="@{charisma_mod}">CHA</option>
				</select>
			</div>
			<div class="sheet-col-1-4 sheet-small-label sheet-center"><input type="text" name="attr_attackspellattacktargetCURRENTROW" value="1 creature"></div>
			<div class="sheet-col-1-12 sheet-small-label sheet-center"><input type="text" name="attr_attackspellattackrangeCURRENTROW"></div>
			<div class="sheet-col-1-6 sheet-small-label sheet-center"><input type="text" name="attr_attackspelldamageCURRENTROW"></div>
			<div class="sheet-col-1-8 sheet-small-label sheet-center"><input type="text" name="attr_attackspelldamagetypeCURRENTROW"></div>
			<div class="sheet-col-5-24 sheet-small-label sheet-center"><input type="text" name="attr_attackspelldamageeffectsCURRENTROW" value="None"></div>
			<div class="sheet-col-1-12 sheet-vert-middle sheet-center"><button type="roll" class="sheet-roll" name="roll_AttackSpellCURRENTROW" value="/em uses @{attackspellnameCURRENTROW} to attack \n\n[[1d20 + @{attackspellattackstatCURRENTROW} [Attack stat mod] + @{PB} [Proficiency Bonus] ]] vs AC\n\n[[@{attackspelldamageCURRENTROW}]] @{attackspelldamagetypeCURRENTROW} damage on a hit\n\nAdditional effect on a hit : @{attackspelldamageeffectsCURRENTROW}">Use</button></div>
		</div>
		<div class="sheet-row sheet-footer-row sheet-grey-row">
			<div class="sheet-col-1-12 sheet-vert-bottom sheet-center sheet-small-label">Attack Stat</div>
			<div class="sheet-col-1-4 sheet-vert-bottom sheet-center sheet-small-label">Target</div>
			<div class="sheet-col-1-12 sheet-vert-bottom sheet-center sheet-small-label">Range</div>
			<div class="sheet-col-1-6 sheet-vert-bottom sheet-center sheet-small-label">Damage</div>
			<div class="sheet-col-1-8 sheet-vert-bottom sheet-center sheet-small-label">Damage Type</div>
			<div class="sheet-col-5-24 sheet-vert-bottom sheet-center sheet-small-label">Damage Effects</div>
			<div class="sheet-col-1-12 sheet-vert-bottom sheet-center sheet-small-label">Macro</div>
		</div>
			
	</div>
			
	<!-- END attack spell row -->

END;

$full_output = "";

for ($i=$start; $i<=$max; $i++)
{
	$return_text = "";
	
	if (($i%5==1 && $i<$max) || ($i%5==1 && $i==$max) )
	{
		//Add start of page wrapper
		$return_text .= $wrapper_start;
	}

	$return_text .= $attack_rows;
	
	if (is_int($i/5) || $i==$max)
	{
		//Add end of page wrapper
		$return_text .= $wrapper_end;
	}
	
	// Replace placeholders with correct values
	$return_text = str_replace("CURRENTROW", $i, $return_text);
	$return_text = str_replace("PAGENUMBER", ceil($i/5), $return_text);

	
	$full_output .= $return_text;
	
}

echo $full_output;

$file = $full_output;
file_put_contents($filename, $file);


?>