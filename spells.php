<?php
$filename = "spells.html";
$start = 1;
$per_page = 10;
$max = 10 * $per_page;

$selected_spell_level = " selected=\"selected\"";
$selected_array = array (
	"SELECTED0" => "",
	"SELECTED1" => "",
	"SELECTED2" => "",
	"SELECTED3" => "",
	"SELECTED4" => "",
	"SELECTED5" => "",
	"SELECTED6" => "",
	"SELECTED7" => "",
	"SELECTED8" => "",
	"SELECTED9" => "",
);


$file = file_get_contents($filename);

$wrapper_start = <<<END
		<!-- BEGIN new spell page -->
		<div class="sheet-spell-pagePAGENUMBER">
END;

$wrapper_end = <<<END
		</div>
		<!-- END spell page -->
END;

$attack_rows = <<<'END'
	
			<!-- BEGIN spell row -->
			<div class="sheet-spell-rowCURRENTROW sheet-grey-row sheet-margin-bottom">
				<div class="sheet-row">
					<div class="sheet-col-1-12 sheet-vert-bottom sheet-center sheet-small-label">Row#</div>
					<div class="sheet-col-1-3 sheet-vert-bottom sheet-center sheet-small-label">Spell name</div>
					<div class="sheet-col-1-6 sheet-vert-bottom sheet-center sheet-small-label">Range</div>
					<div class="sheet-col-1-12 sheet-vert-bottom sheet-center sheet-small-label">Spell Level</div>
					<div class="sheet-col-1-6 sheet-vert-bottom sheet-center sheet-small-label">Gained from</div>
					<div class="sheet-col-1-6 sheet-vert-bottom sheet-center sheet-small-label">Prepared?</div>
				</div>
				
				<div class="sheet-row">

					<div class="sheet-col-1-12 sheet-vert-middle sheet-spell-row-number">CURRENTROW</div>
					<div class="sheet-col-1-3 sheet-vert-middle"><input type="text" name="attr_spellnameCURRENTROW"></div>
					<div class="sheet-col-1-6 sheet-vert-middle"><input type="text" name="attr_spellrangeCURRENTROW"></div>
					<div class="sheet-col-1-12 sheet-vert-middle">
						<select name="attr_spellbaselevelCURRENTROW">
							<option value="0"SELECTED0>Cantrip</option>
							<option value="1"SELECTED1>1</option>
							<option value="2"SELECTED2>2</option>
							<option value="3"SELECTED3>3</option>
							<option value="4"SELECTED4>4</option>
							<option value="5"SELECTED5>5</option>
							<option value="6"SELECTED6>6</option>
							<option value="7"SELECTED7>7</option>
							<option value="8"SELECTED8>8</option>
							<option value="9"SELECTED9>9</option>
						</select>
					</div>	
					<div class="sheet-col-1-6 sheet-vert-middle" title="Use this field to indicate where you learned or have access to this spell from.  Useful to know if multiclassing or if you gain access to spells your class would not normally have thanks to subclass bonuses">
						<select name="attr_spellgainedfromCURRENTROW">
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
						<select name="attr_spellispreparedCURRENTROW">
							<option value="1">Yes</option>
							<option value="0">NO</option>
							<option value="0.0001">Always</option>
						</select>
					</div>
					
				</div>
				
				<span class="sheet-small-label">Spell Requires :</span>
				<input type="radio" name="attr_spelltypetabrowCURRENTROW" class="sheet-spelltypetab sheet-spelltypetab1" value="1" title="Attack Roll" checked="checked"/>
				<input type="radio" name="attr_spelltypetabrowCURRENTROW" class="sheet-spelltypetab sheet-spelltypetab2" value="2" title="Saving Throw"/>
				<input type="radio" name="attr_spelltypetabrowCURRENTROW" class="sheet-spelltypetab sheet-spelltypetab3" value="3" title="Healing"/>
				<input type="radio" name="attr_spelltypetabrowCURRENTROW" class="sheet-spelltypetab sheet-spelltypetab4" value="4" title="Other"/>
		
				<div class="sheet-spell-type-attack">
					<div class="sheet-row">
						<div class="sheet-col-1-12 sheet-vert-bottom sheet-center sheet-small-label">Attack Stat</div>
						<div class="sheet-col-1-4 sheet-vert-bottom sheet-center sheet-small-label">Target</div>
						<div class="sheet-col-1-6 sheet-vert-bottom sheet-center sheet-small-label">Damage</div>
						<div class="sheet-col-1-8 sheet-vert-bottom sheet-center sheet-small-label">Damage Type</div>
						<div class="sheet-col-7-24 sheet-vert-bottom sheet-center sheet-small-label">Damage Effects</div>
						<div class="sheet-col-1-12 sheet-vert-bottom sheet-center sheet-small-label">Macro</div>
					</div>
							
					<div class="sheet-row">
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
						<div class="sheet-col-1-6 sheet-small-label sheet-center"><input type="text" name="attr_attackspelldamageCURRENTROW"></div>
						<div class="sheet-col-1-8 sheet-small-label sheet-center"><input type="text" name="attr_attackspelldamagetypeCURRENTROW"></div>
						<div class="sheet-col-7-24 sheet-small-label sheet-center"><input type="text" name="attr_attackspelldamageeffectsCURRENTROW" value="None"></div>
						<div class="sheet-col-1-12 sheet-vert-middle sheet-center"><button type="roll" class="sheet-roll" name="roll_AttackSpellCURRENTROW" value="/em uses @{attackspellnameCURRENTROW} to attack \n\n[[1d20 + @{attackspellattackstatCURRENTROW} [Attack stat mod] + @{PB} [Proficiency Bonus] + @{global_spell_attack_bonus} [Active Spell Attack Bonus] ]] | [[1d20 + @{attackspellattackstatCURRENTROW} [Attack stat mod] + @{PB} [Proficiency Bonus] + @{global_spell_attack_bonus} [Active Spell Attack Bonus] ]] vs AC\n\n[[@{attackspelldamageCURRENTROW} [Base Spell Damage] + @{global_spell_damage_bonus} [Active Spell Damage Bonus] + 0d0 [Bugfix 0]]] @{attackspelldamagetypeCURRENTROW} damage on a hit\n\nAdditional effect on a hit : @{attackspelldamageeffectsCURRENTROW}">Use</button></div>
					</div>
				</div>
		
				<div class="sheet-spell-type-save">
					<div class="sheet-row">
						<div class="sheet-col-1-12 sheet-center sheet-small-label">Saving Stat</div>
						<div class="sheet-col-1-8 sheet-center sheet-small-label">Save DC</div>
						<div class="sheet-col-1-12 sheet-center sheet-small-label">Custom DC</div>
						<div class="sheet-col-1-12 sheet-center sheet-small-label">Damage</div>
						<div class="sheet-col-1-8 sheet-center sheet-small-label">Damage Type</div>
						<div class="sheet-col-1-4 sheet-center sheet-small-label">Other effects</div>
						<div class="sheet-col-1-6 sheet-center sheet-small-label">Successful Save</div>
						<div class="sheet-col-1-12 sheet-center sheet-small-label">Macro</div>
					</div>
					
					<div class="sheet-row sheet-footer-row">
						<div class="sheet-col-1-12">
							<select name="attr_savespellsavestatCURRENTROW">
								<option value="STR">STR</option>
								<option value="DEX">DEX</option>
								<option value="CON">CON</option>
								<option value="INT">INT</option>
								<option value="WIS">WIS</option>
								<option value="CHA">CHA</option>
							</select>
						</div>
						<div class="sheet-col-1-8" title="Pick the class that the save DC will be created from or set your own DC by selecting custom here and then entering the DC in the next field">
							<select name="attr_savespellsavedcCURRENTROW">
								<option value="0">Custom DC</option>
								<option value="@{bard_spell_dc}">Bard DC</option>
								<option value="@{cleric_spell_dc}">Cleric DC</option>
								<option value="@{druid_spell_dc}">Druid DC</option>
								<option value="@{mage_spell_dc}">Mage DC</option>
								<option value="@{paladin_spell_dc}">Paladin DC</option>
								<option value="@{ranger_spell_dc}">Ranger DC</option>
							</select>
						</div>
						<div class="sheet-col-1-12"><input type="number" name="attr_savespellcustomdcCURRENTROW" value="0" title="Unless you have selected Custom in the previous field this should always be 0"></div>
						<div class="sheet-col-1-12"><input type="text" name="attr_savespellbasedmgCURRENTROW"></div>
						<div class="sheet-col-1-8"><input type="text" name="attr_savespelldmgtypeCURRENTROW"></div>
						<div class="sheet-col-1-4"><input type="text" name="attr_savespellsavefailCURRENTROW"></div>
						<div class="sheet-col-1-6"><input type="text" name="attr_savespellsavesuccessCURRENTROW"></div>
						<div class="sheet-col-1-12 sheet-vert-middle sheet-center"><button type="roll" class="sheet-roll" name="roll_SaveThrowSpellCURRENTROW" value="/em uses @{spellnameCURRENTROW} to attack\n\nDC [[@{savespellsavedcCURRENTROW} + @{savespellcustomdcCURRENTROW}]] @{savespellsavestatCURRENTROW} saving throw\nOn a failed save :\n[[@{savespellbasedmgCURRENTROW} [Base Damage] + @{global_spell_damage_bonus} [Active Spell Damage Bonus] + 0d0 [Bugfix 0] ]] @{savespelldmgtypeCURRENTROW} damage and @{savespellsavefailCURRENTROW}\nOn a successful save :\n@{savespellsavesuccessCURRENTROW}" >Use</button></div>
						
					</div>
				</div>
		
				<div class="sheet-spell-type-heal">
				
					<div class="sheet-row">
						<div class="sheet-col-1-4 sheet-vert-bottom sheet-center sheet-small-label">Target</div>
						<div class="sheet-col-1-8 sheet-vert-bottom sheet-center sheet-small-label">Heal amount</div>
						<div class="sheet-col-1-2 sheet-vert-bottom sheet-center sheet-small-label">Other effects</div>
						<div class="sheet-col-1-12 sheet-vert-bottom sheet-center sheet-small-label">Macro</div>
					</div>
							
					<div class="sheet-row">
						<div class="sheet-col-1-4 sheet-small-label sheet-center"><input type="text" name="attr_healspelltargetCURRENTROW" value="1 creature"></div>
						<div class="sheet-col-1-8 sheet-small-label sheet-center"><input type="text" name="attr_healspellhealamountCURRENTROW"></div>
						<div class="sheet-col-1-2 sheet-small-label sheet-center"><input type="text" name="attr_healspelleffectCURRENTROW" value="None"></div>
						<div class="sheet-col-1-12 sheet-vert-middle sheet-center"><button type="roll" class="sheet-roll" name="roll_HealSpellCURRENTROW" value="/em uses @{spellnameCURRENTROW} to heal\n\n[[@{healspellhealamountCURRENTROW}]] hp healed\nAdditional effect : @{healspelleffectCURRENTROW}">Use</button></div>
					</div>
				
				</div>
		
				<div class="sheet-spell-type-utility">
					<div class="sheet-row">
						<div class="sheet-col-1-10 sheet-vert-middle sheet-small-label"><br/>Description<br/></div>
						<div class="sheet-col-4-5"><textarea class="sheet-fluid-textarea" name="attr_utilityspelldescriptionCURRENTROW"></textarea></div>
						<div class="sheet-col-1-10 sheet-vert-middle"><button type="roll" class="sheet-roll" name="roll_UtilitySpellCURRENTROW" value="/em uses @{utilityspellnameCURRENTROW} \n\n@{utilityspelldescriptionCURRENTROW}">Use</button></div>
					</div>
				</div>
			
			</div>
		
			<hr/>
			<!-- END spell row -->
END;

$full_output = "";

for ($i=$start; $i<=$max; $i++)
{
	// Reset current loop vars
	$return_text = "";
	foreach ($selected_array as $key => $value)
	{
		$selected_array[$key] = "";
	}
	
	if (($i%$per_page==1 && $i<$max) || ($i%5==1 && $i==$max) )
	{
		//Add start of page wrapper
		$return_text .= $wrapper_start;
	}

	$return_text .= $attack_rows;
	
	if (is_int($i/$per_page) || $i==$max)
	{
		//Add end of page wrapper
		$return_text .= $wrapper_end;
	}
	
	// Replace placeholders with correct values
	$return_text = str_replace("CURRENTROW", $i, $return_text);
	$return_text = str_replace("PAGENUMBER", floor(($i-1)/$per_page), $return_text);
		
	switch (floor(($i-1)/$per_page))
	{
			case 0:
				$selected_array["SELECTED0"] = $selected_spell_level;
				break;
			case 1:
				$selected_array["SELECTED1"] = $selected_spell_level;
				break;
			case 2:
				$selected_array["SELECTED2"] = $selected_spell_level;
				break;
			case 3:
				$selected_array["SELECTED3"] = $selected_spell_level;
				break;
			case 4:
				$selected_array["SELECTED4"] = $selected_spell_level;
				break;
			case 5:
				$selected_array["SELECTED5"] = $selected_spell_level;
				break;
			case 6:
				$selected_array["SELECTED6"] = $selected_spell_level;
				break;
			case 7:
				$selected_array["SELECTED7"] = $selected_spell_level;
				break;
			case 8:
				$selected_array["SELECTED8"] = $selected_spell_level;
				break;
			case 9:
				$selected_array["SELECTED9"] = $selected_spell_level;
				break;
	}
	
	foreach ($selected_array as $key => $value)
	{
		$return_text = str_replace($key, $value, $return_text);
	}
	
	$full_output .= $return_text;
	
}

//Now stitch together prepared spells calc hidden field

$prep_calc = "";
for ($i=$start; $i<=$max; $i++)
{
	$prep_calc .= "@{spellisprepared$i}";
	
	if ($i < $max) $prep_calc .= " + ";
}

$html_prep_calc = "<input type=\"hidden\" name=\"attr_total_spells_prepared_calc\" value=\"floor(" . $prep_calc . ")\" />";
$html_always_prep_calc = "<input type=\"hidden\" name=\"attr_total_spells_always_prepared_calc\" value=\"round(((" . $prep_calc . ") * 10000) - (floor(" . $prep_calc . ") * 10000))\" />";


$full_output .= $html_prep_calc;
$full_output .= $html_always_prep_calc;

//echo $full_output;

$file = $full_output;
file_put_contents($filename, $file);


?>