<?php
$filename = "spells.html";
$start = 0;
$max = 9;
$current_page = 0;

$selected_spell_level = " selected=\"selected\"";
$spell_level_array = array (
	0 => "Cantrip",
	1 => "Level 1",
	2 => "Level 2",
	3 => "Level 3",
	4 => "Level 4",
	5 => "Level 5",
	6 => "Level 6",
	7 => "Level 7",
	8 => "Level 8",
	9 => "Level 9",
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

$spell_row = <<<'END'
			<div class="sheet-row sheet-sub-header">
				<div class="sheet-col-1 sheet-vert-bottom sheet-center sheet-small-label">SPELLLEVEL</div>
			</div>
			
			<fieldset class="repeating_spellbook_SPELLSHORTLEVEL">
			<!-- BEGIN spell row -->
			<div class="sheet-grey-row sheet-margin-bottom sheet-padr sheet-padl">
				<div class="sheet-row">
					<div class="sheet-col-1-12 sheet-vert-bottom sheet-center sheet-small-label">Spell Level</div>
					<div class="sheet-col-1-3 sheet-vert-bottom sheet-center sheet-small-label">Spell name</div>
					<div class="sheet-col-1-12 sheet-vert-bottom sheet-center sheet-small-label">Range</div>
					<div class="sheet-col-1-4 sheet-vert-bottom sheet-center sheet-small-label">Target/AoE</div>
					<div class="sheet-col-1-8 sheet-vert-bottom sheet-center sheet-small-label">Gained from</div>
					<div class="sheet-col-1-8 sheet-vert-bottom sheet-center sheet-small-label">Prepared?</div>
				</div>
				
				<div class="sheet-row">
					<div class="sheet-col-1-12 sheet-vert-middle sheet-center">RAWLEVEL<input type="hidden" name="attr_spellbaselevel" value="PAGENUMBER"></div>	
					<div class="sheet-col-1-3 sheet-vert-middle"><input type="text" name="attr_spellname"></div>
					<div class="sheet-col-1-12 sheet-vert-middle"><input type="text" name="attr_spellrange"></div>
					<div class="sheet-col-1-4 sheet-vert-middle"><input type="text" name="attr_spelltarget" value="1 creature"></div>
					<div class="sheet-col-1-8 sheet-vert-middle" title="Use this field to indicate where you learned or have access to this spell from.  Useful to know if multiclassing or if you gain access to spells your class would not normally have thanks to subclass bonuses">
						<select name="attr_spellgainedfrom">
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
					<div class="sheet-col-1-8 sheet-vert-middle" title="Always prepared means the spell is either a cantrip or one that was provided to you via a method which indicated it would never count against your prepared limit for the day">
						<select name="attr_spellisprepared">
							<option value="1">Yes</option>
							<option value="0" selected="selected">NO</option>
							<option value="0.0001">Always</option>
						</select>
					</div>
					
				</div>
				
				<span class="sheet-small-label">Spell Requires :</span>
				<input type="radio" name="attr_spelltypetabrow" class="sheet-spelltypetab sheet-spelltypetab1" value="1" title="Attack Roll" checked="checked"/>
				<input type="radio" name="attr_spelltypetabrow" class="sheet-spelltypetab sheet-spelltypetab2" value="2" title="Saving Throw"/>
				<input type="radio" name="attr_spelltypetabrow" class="sheet-spelltypetab sheet-spelltypetab3" value="3" title="Healing"/>
				<input type="radio" name="attr_spelltypetabrow" class="sheet-spelltypetab sheet-spelltypetab4" value="4" title="Other"/>
		
				<div class="sheet-spell-type-attack">
					<div class="sheet-row">
						<div class="sheet-col-1-12 sheet-vert-bottom sheet-center sheet-small-label">Attack Stat</div>
						<div class="sheet-col-1-6 sheet-vert-bottom sheet-center sheet-small-label">Damage</div>
						<div class="sheet-col-1-8 sheet-vert-bottom sheet-center sheet-small-label">Damage Type</div>
						<div class="sheet-col-7-24 sheet-vert-bottom sheet-center sheet-small-label">Additional Effects</div>
						<div class="sheet-col-1-4 sheet-vert-bottom sheet-center sheet-small-label">Higher Spell Slot Effect</div>
						<div class="sheet-col-1-12 sheet-vert-bottom sheet-center sheet-small-label">Macro</div>
					</div>
							
					<div class="sheet-row">
						<div class="sheet-col-1-12 sheet-small-label sheet-center">
							<select name="attr_attackspellattackstat">
								<option value="0">None</option>
								<option value="@{strength_mod}">STR</option>
								<option value="@{dexterity_mod}">DEX</option>
								<option value="@{constitution_mod}">CON</option>
								<option value="@{intelligence_mod}">INT</option>
								<option value="@{wisdom_mod}">WIS</option>
								<option value="@{charisma_mod}">CHA</option>
							</select>
						</div>
						<div class="sheet-col-1-6 sheet-small-label sheet-center"><input type="text" name="attr_attackspelldamage"></div>
						<div class="sheet-col-1-8 sheet-small-label sheet-center"><input type="text" name="attr_attackspelldamagetype"></div>
						<div class="sheet-col-7-24 sheet-small-label sheet-center"><input type="text" name="attr_attackspelldamageeffects" value="None"></div>
						<div class="sheet-col-1-4 sheet-small-label sheet-center"><input type="text" name="attr_attackspellhighersloteffect" value="None"></div>
						<div class="sheet-col-1-12 sheet-vert-middle sheet-center"><button type="roll" class="sheet-roll" name="roll_AttackSpell" value="/em uses @{spellname} to attack \n\n[[1d20 + @{attackspellattackstat} [Attack stat mod] + @{PB} [Proficiency Bonus] + @{global_spell_attack_bonus} [Active Spell Attack Bonus] ]] | [[1d20 + @{attackspellattackstat} [Attack stat mod] + @{PB} [Proficiency Bonus] + @{global_spell_attack_bonus} [Active Spell Attack Bonus] ]] vs AC\n\n[[@{attackspelldamage} [Base Spell Damage] + @{global_spell_damage_bonus} [Active Spell Damage Bonus] + 0d0 [Bugfix 0]]] @{attackspelldamagetype} damage on a hit\n\nAdditional effect on a hit : @{attackspelldamageeffects}">Use</button></div>
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
							<select name="attr_savespellsavestat">
								<option value="STR">STR</option>
								<option value="DEX">DEX</option>
								<option value="CON">CON</option>
								<option value="INT">INT</option>
								<option value="WIS">WIS</option>
								<option value="CHA">CHA</option>
							</select>
						</div>
						<div class="sheet-col-1-8" title="Pick the class that the save DC will be created from or set your own DC by selecting custom here and then entering the DC in the next field">
							<select name="attr_savespellsavedc">
								<option value="0">Custom DC</option>
								<option value="@{bard_spell_dc}">Bard DC</option>
								<option value="@{cleric_spell_dc}">Cleric DC</option>
								<option value="@{druid_spell_dc}">Druid DC</option>
								<option value="@{mage_spell_dc}">Mage DC</option>
								<option value="@{paladin_spell_dc}">Paladin DC</option>
								<option value="@{ranger_spell_dc}">Ranger DC</option>
							</select>
						</div>
						<div class="sheet-col-1-12"><input type="number" name="attr_savespellcustomdc" value="0" min="0" step="1" title="Unless you have selected Custom in the previous field this should always be 0"></div>
						<div class="sheet-col-1-12"><input type="text" name="attr_savespellbasedmg"></div>
						<div class="sheet-col-1-8"><input type="text" name="attr_savespelldmgtype"></div>
						<div class="sheet-col-1-4"><input type="text" name="attr_savespellsavefail"></div>
						<div class="sheet-col-1-6"><input type="text" name="attr_savespellsavesuccess"></div>
						<div class="sheet-col-1-12 sheet-vert-middle sheet-center"><button type="roll" class="sheet-roll" name="roll_SaveThrowSpell" value="/em uses @{spellname} to attack\n\nDC [[@{savespellsavedc} + @{savespellcustomdc}]] @{savespellsavestat} saving throw\nOn a failed save :\n[[@{savespellbasedmg} [Base Damage] + @{global_spell_damage_bonus} [Active Spell Damage Bonus] + 0d0 [Bugfix 0] ]] @{savespelldmgtype} damage and @{savespellsavefail}\nOn a successful save :\n@{savespellsavesuccess}" >Use</button></div>
						
					</div>
				</div>
		
				<div class="sheet-spell-type-heal">
				
					<div class="sheet-row">
						<div class="sheet-col-1-8 sheet-vert-bottom sheet-center sheet-small-label">Heal amount</div>
						<div class="sheet-col-1-2 sheet-vert-bottom sheet-center sheet-small-label">Additional effects</div>
						<div class="sheet-col-1-4 sheet-vert-bottom sheet-center sheet-small-label">Higher Spell Slot effect</div>
						<div class="sheet-col-1-12 sheet-vert-bottom sheet-center sheet-small-label">Macro</div>
					</div>
							
					<div class="sheet-row">
						<div class="sheet-col-1-8 sheet-small-label sheet-center"><input type="text" name="attr_healspellhealamount"></div>
						<div class="sheet-col-1-2 sheet-small-label sheet-center"><input type="text" name="attr_healspelleffect" value="None"></div>
						<div class="sheet-col-1-4 sheet-small-label sheet-center"><input type="text" name="attr_healspellhighersloteffect" value="None"></div>
						<div class="sheet-col-1-12 sheet-vert-middle sheet-center"><button type="roll" class="sheet-roll" name="roll_HealSpell" value="/em uses @{spellname} to heal\n\n[[@{healspellhealamount}]] hp healed\nAdditional effect : @{healspelleffect}">Use</button></div>
					</div>
				
				</div>
		
				<div class="sheet-spell-type-utility">
					<div class="sheet-row">
						<div class="sheet-col-1-10 sheet-vert-middle sheet-small-label"><br/>Description<br/></div>
						<div class="sheet-col-4-5"><textarea class="sheet-fluid-textarea" name="attr_utilityspelldescription"></textarea></div>
						<div class="sheet-col-1-10 sheet-vert-middle"><button type="roll" class="sheet-roll" name="roll_UtilitySpell" value="/em uses @{spellname} \n\n@{utilityspelldescription}">Use</button></div>
					</div>
				</div>
			
			</div>
		
			<!-- END spell row -->	
			</fieldset>



END;

$full_output = "";

for ($i=$start; $i<=$max; $i++)
{
	// Reset current loop vars
	$return_text = "";
	
	if ($current_page == 0) $raw_level = "Cantrip";
	else $raw_level = $current_page;
	
	// Add start of page wrapper
	$return_text .= $wrapper_start;

	// Add repeating section 
	$return_text .= $spell_row;
	
	//Add end of page wrapper
	$return_text .= $wrapper_end;
	
	// Replace placeholders with correct values
	$return_text = str_replace("PAGENUMBER", $current_page, $return_text);
	$return_text = str_replace("SPELLLEVEL", $spell_level_array[$current_page], $return_text);
	$return_text = str_replace("RAWLEVEL", $raw_level, $return_text);
	$return_text = str_replace("SPELLSHORTLEVEL", strtolower(str_replace(" ", "", $spell_level_array[$current_page])), $return_text);
		
	
	
	$full_output .= $return_text;
	$current_page++;
	
}

//echo $full_output;

$file = $full_output;
file_put_contents($filename, $file);


?>