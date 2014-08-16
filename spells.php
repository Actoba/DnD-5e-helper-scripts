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
			<div class="sheet-row sheet-spell-header">
				<div class="sheet-col-1 sheet-vert-bottom sheet-center sheet-small-label">SPELLLEVEL</div>
			</div>
			
			<fieldset class="repeating_spellbookSPELLSHORTLEVEL">
			<!-- BEGIN spell row -->
			<div class="sheet-margin-bottom sheet-padr sheet-padl">
				<div class="sheet-row">
					<div class="sheet-col-1-12 sheet-vert-bottom sheet-center sheet-small-label">Spell Level</div>
					<div class="sheet-col-1-3 sheet-vert-bottom sheet-center sheet-small-label">Spell name</div>
					<div class="sheet-col-1-8 sheet-vert-bottom sheet-center sheet-small-label">School</div>
					<div class="sheet-col-1-6 sheet-vert-bottom sheet-center sheet-small-label">Cast time</div>
					<div class="sheet-col-1-12 sheet-vert-bottom sheet-center sheet-small-label" title="Concentration">Conc?</div>
					<div class="sheet-col-1-12 sheet-vert-bottom sheet-center sheet-small-label">Ritual?</div>
					<div class="sheet-col-1-8 sheet-vert-bottom sheet-center sheet-small-label">Prepared?</div>
				</div>
				
				<div class="sheet-row">
					<div class="sheet-col-1-12 sheet-vert-middle sheet-center">FRIENDLYLEVEL<input type="hidden" name="attr_spellbaselevel" value="PAGENUMBER"><input type="hidden" name="attr_spellfriendlylevel" value="FRIENDLYLEVEL"></div>	
					<div class="sheet-col-1-3 sheet-vert-middle"><input type="text" class=" sheet-center" name="attr_spellname"></div>
					<div class="sheet-col-1-8 sheet-vert-middle">
						<select name="attr_spellschool">
							<option value="" selected="selected">n/a</option>
							<option value="Abjuration">Abjuration</option>
							<option value="Conjuration">Conjuration</option>
							<option value="Divination">Divination</option>
							<option value="Enchantment">Enchantment</option>
							<option value="Evocation">Evocation</option>
							<option value="Illusion">Illusion</option>
							<option value="Necromancy">Necromancy</option>
							<option value="Transmutation">Transmutation</option>
						</select>
					</div>
					<div class="sheet-col-1-6 sheet-vert-middle"><input type="text" class="sheet-center" name="attr_spellcasttime"></div>
					<div class="sheet-col-1-12 sheet-checkbox-row">
						<select name="attr_spellconcentration">
							<option value="" selected="selected">No</option>
							<option value="(Concentration)">Yes</option>
						</select>
					</div>
					<div class="sheet-col-1-12 sheet-checkbox-row">
						<select name="attr_spellritual">
							<option value="" selected="selected">No</option>
							<option value="(Ritual)">Yes</option>
						</select>
					</div>
					<div class="sheet-col-1-8 sheet-vert-middle" title="Always prepared means the spell is either a cantrip or one that was provided to you via a method which indicated it would never count against your prepared/known limits.">
						<select name="attr_spellisprepared"DISABLEPREP>
							<option value="1">Yes</option>
							<option value="0"SELECTEDPREPNO>NO</option>
							<option value="0.0001"SELECTEDPREPALWAYS>Always</option>
						</select>
					</div>
				</div>
				
				<div class="sheet-row">
					<div class="sheet-col-1-8 sheet-vert-bottom sheet-center sheet-small-label">Gained from</div>
					<div class="sheet-col-1-3 sheet-vert-bottom sheet-center sheet-small-label">Target/Area of Effect</div>					
					<div class="sheet-col-1-8 sheet-vert-bottom sheet-center sheet-small-label">Range</div>
					<div class="sheet-col-1-8 sheet-vert-bottom sheet-center sheet-small-label">Duration</div>
					<div class="sheet-col-7-24 sheet-vert-bottom sheet-center sheet-small-label">Components</div>
				</div>
				
				<div class="sheet-row">
					<div class="sheet-col-1-8 sheet-vert-middle" title="Use this field to indicate where you learned or have access to this spell from.  Useful to know if multiclassing or if you gain access to spells your class would not normally have thanks to subclass bonuses">
						<select name="attr_spellgainedfrom">
							<option value="Not Set">Not Set</option>
							<option value="Arcane Trickster">Arcane Trickster</option>
							<option value="Bard">Bard</option>
							<option value="Cleric">Cleric</option>
							<option value="Druid">Druid</option>
							<option value="Eldritch Knight">Eldritch Knight</option>
							<option value="Paladin">Paladin</option>
							<option value="Ranger">Ranger</option>
							<option value="Sorcerer">Sorcerer</option>
							<option value="Warlock">Warlock</option>
							<option value="Wizard">Wizard</option>
							<option value="Other Source">Other</option>
						</select>
					</div>	
					<div class="sheet-col-1-3 sheet-vert-middle"><input type="text" class="sheet-center" name="attr_spelltarget"></div>
					<div class="sheet-col-1-8 sheet-vert-middle"><input type="text" class="sheet-center" name="attr_spellrange"></div>
					<div class="sheet-col-1-8 sheet-vert-middle"><input type="text" class="sheet-center" name="attr_spellduration"></div>
					<div class="sheet-col-7-24 sheet-vert-middle"><input type="text" class="sheet-center" name="attr_spellcomponents"></div>
				</div>
				
				<span class="sheet-spacer"></span>
				<span class="sheet-small-label">Show :</span>
				<input type="checkbox" name="attr_spelltypeadvanced" class="sheet-spelltypetab sheet-spelltypeadvanced" value="1"/><span class="sheet-spelltypetab sheet-spelltypeadvanced">Advanced</span> |
				<input type="checkbox" name="attr_spelltypeattack" class="sheet-spelltypetab sheet-spelltypeattack" value="1"/><span class="sheet-spelltypetab sheet-spelltypeattack">Attack</span>
				<input type="checkbox" name="attr_spelltypesave" class="sheet-spelltypetab sheet-spelltypesave" value="1"/><span class="sheet-spelltypetab sheet-spelltypesave">Save</span>
				<input type="checkbox" name="attr_spelltypeheal" class="sheet-spelltypetab sheet-spelltypeheal" value="1"/><span class="sheet-spelltypetab sheet-spelltypeheal">Healing</span> |
				<input type="checkbox" name="attr_spelltypdamage" class="sheet-spelltypetab sheet-spelltypedamage" value="1"/><span class="sheet-spelltypetab sheet-spelltypedamage">Damage</span>
				<input type="checkbox" name="attr_spelltypeeffects" class="sheet-spelltypetab sheet-spelltypeeffects" value="1"/><span class="sheet-spelltypetab sheet-spelltypeeffects">Effects</span>
				<span class="sheet-spacer"></span>
				
				<div class="sheet-spell-type-advanced">
					<div class="sheet-row">
						<div class="sheet-col-1-2 sheet-vert-bottom sheet-center sheet-small-label">Spell Description/Flavour</div>
						<div class="sheet-col-1-3 sheet-vert-bottom sheet-center sheet-small-label">Higher Spell Slot Effect</div>
						<div class="sheet-col-1-6 sheet-vert-bottom sheet-center sheet-small-label">&nbsp;</div>
					</div>
					
					<div class="sheet-row">
						<div class="sheet-col-1-2 sheet-small-label sheet-center"><textarea class="sheet-medium-textarea" name="attr_spelldescription"></textarea></div>
						<div class="sheet-col-1-3 sheet-small-label sheet-center"><textarea name="attr_spellhighersloteffect" class="sheet-medium-textarea"></textarea></div>
						<div class="sheet-col-1-6 sheet-center"><button type="roll" class="sheet-roll" name="roll_SpellInfo" value="/em looks at the details for @{spellname}\n\nName : @{spellname}\n@{spellschool} @{spellfriendlylevel}\nCast time : @{spellcasttime}\nRange : @{spellrange}\nDuration : @{spellduration}\n\n@{spellconcentration} @{spellritual}\n\nDescription : \n@{spelldescription}\n\n\nAt Higher Levels :\n@{spellhighersloteffect}">Spell Card</button></div>
					</div>
				
				
				</div>
		
				<div class="sheet-spell-type-attack">
				
					<div class="sheet-row">
						<div class="sheet-col-1-6 sheet-offset-2-3 sheet-vert-bottom sheet-center sheet-small-label">Attack Stat</div>
						<div class="sheet-col-1-6 sheet-vert-bottom sheet-center sheet-small-label">&nbsp;</div>
					</div>
							
					<div class="sheet-row">
						<div class="sheet-col-2-3"><p class="sheet-small-note sheet-margin-top">Select the attack stat for the attack. This is normally your spellcasting stat from the class you gained the spell from.</p></div>
						<div class="sheet-col-1-6 sheet-small-label sheet-center">
							<select name="attr_attackstat">
								<option value="0">None</option>
								<option value="@{strength_mod}">STR</option>
								<option value="@{dexterity_mod}">DEX</option>
								<option value="@{constitution_mod}">CON</option>
								<option value="@{intelligence_mod}">INT</option>
								<option value="@{wisdom_mod}">WIS</option>
								<option value="@{charisma_mod}">CHA</option>
							</select>
						</div>
						<div class="sheet-col-1-6 sheet-vert-middle sheet-center"><button type="roll" class="sheet-roll" name="roll_Attack" value="/em uses @{spellname} to attack \n\n[[1d20 + @{attackstat} [Attack stat mod] + @{PB} [Proficiency Bonus] + @{global_spell_attack_bonus} [Active Spell Attack Bonus] ]] | [[1d20 + @{attackstat} [Attack stat mod] + @{PB} [Proficiency Bonus] + @{global_spell_attack_bonus} [Active Spell Attack Bonus] ]] vs AC">Attack</button></div>
					</div>
				</div>
		
				<div class="sheet-spell-type-save">
					<div class="sheet-row">
						<div class="sheet-col-1-12 sheet-center sheet-small-label">Saving Stat</div>
						<div class="sheet-col-1-6 sheet-center sheet-small-label">Save DC</div>
						<div class="sheet-col-1-12 sheet-center sheet-small-label">Custom DC</div>
						<div class="sheet-col-1-2 sheet-center sheet-small-label">On a successful save</div>
						<div class="sheet-col-1-6 sheet-center sheet-small-label">&nbsp;</div>
					</div>
					
					<div class="sheet-row">
						<div class="sheet-col-1-12">
							<select name="attr_savestat">
								<option value="STR">STR</option>
								<option value="DEX">DEX</option>
								<option value="CON">CON</option>
								<option value="INT">INT</option>
								<option value="WIS">WIS</option>
								<option value="CHA">CHA</option>
							</select>
						</div>
						<div class="sheet-col-1-6" title="Pick the class that the save DC will be created from or set your own DC by selecting custom here and then entering the DC in the next field">
							<select name="attr_spellsavedc">
								<option value="0">Choose...</option>
								<option value="@{arcane_trickster_spell_dc}">Arcane Trickster DC</option>
								<option value="@{bard_spell_dc}">Bard DC</option>
								<option value="@{cleric_spell_dc}">Cleric DC</option>
								<option value="@{druid_spell_dc}">Druid DC</option>
								<option value="@{eldritch_knight_spell_dc}">Eldritch Knight DC</option>
								<option value="@{paladin_spell_dc}">Paladin DC</option>
								<option value="@{ranger_spell_dc}">Ranger DC</option>
								<option value="@{sorcerer_spell_dc}">Sorcerer DC</option>
								<option value="@{warlock_spell_dc}">Warlock DC</option>
								<option value="@{wizard_spell_dc}">Wizard DC</option>
								<option value="0">Custom DC</option>
							</select>
						</div>
						<div class="sheet-col-1-12"><input type="number" name="attr_customsavedc" value="0" min="0" step="1" title="Unless you have selected Custom in the previous field this should always be 0"></div>
						<div class="sheet-col-1-2"><input type="text" class="sheet-center" name="attr_savesuccess"></div>
						<div class="sheet-col-1-6 sheet-vert-middle sheet-center"><button type="roll" class="sheet-roll" name="roll_Save" value="/em uses @{spellname} to attack\n\nDC [[@{spellsavedc} + @{customsavedc}]] @{savestat} saving throw\nOn a successful save :\n@{savesuccess}" >Attack</button></div>
						
					</div>
				</div>
						
				<div class="sheet-spell-type-heal">
					<div class="sheet-row">
						<div class="sheet-col-1-3 sheet-offset-1-4 sheet-vert-bottom sheet-center sheet-small-label">Heal amount</div>
						<div class="sheet-col-1-6 sheet-vert-bottom sheet-center sheet-small-label">Stat Bonus</div>
						<div class="sheet-col-1-6 sheet-offset-1-12 sheet-vert-bottom sheet-center sheet-small-label">&nbsp;</div>
					</div>
							
					<div class="sheet-row">
						<div class="sheet-col-1-3 sheet-offset-1-4 sheet-small-label sheet-center"><input type="text" class="sheet-center" name="attr_spellhealamount"></div>
						<div class="sheet-col-1-6 sheet-center">
							<select name="attr_healstatbonus">
								<option value="0">None</option>
								<option value="@{strength_mod}">STR mod</option>
								<option value="@{dexterity_mod}">DEX mod</option>
								<option value="@{constitution_mod}">CON mod</option>
								<option value="@{intelligence_mod}">INT mod</option>
								<option value="@{wisdom_mod}">WIS mod</option>
								<option value="@{charisma_mod}">CHA mod</option>
							</select>
						
						</div>
						<div class="sheet-col-1-6 sheet-offset-1-12 sheet-vert-middle sheet-center"><button type="roll" class="sheet-roll" name="roll_Heal" value="/em uses @{spellname} to heal\n\n[[@{spellhealamount} + @{healstatbonus}]] hp healed\nAdditional effects: @{spelleffect}">Heal</button></div>
					</div>
				</div>
				
				<div class="sheet-spell-type-damage">
					<div class="sheet-row">
						<div class="sheet-col-1-6 sheet-offset-1-6 sheet-vert-bottom sheet-center sheet-small-label">Damage Dice</div>
						<div class="sheet-col-1-6 sheet-vert-bottom sheet-center sheet-small-label">Stat Bonus</div>
						<div class="sheet-col-1-6 sheet-vert-bottom sheet-center sheet-small-label">Other Bonus</div>
						<div class="sheet-col-1-6 sheet-vert-bottom sheet-center sheet-small-label">Damage Type</div>
						<div class="sheet-col-1-6 sheet-vert-bottom sheet-center sheet-small-label">&nbsp;</div>
					</div>
							
					<div class="sheet-row">
						<div class="sheet-col-1-6 sheet-offset-1-6 sheet-small-label sheet-center"><input type="text" class="sheet-center" name="attr_damage"></div>
						<div class="sheet-col-1-6">
							<select name="attr_damagestatbonus">
								<option value="0">None</option>
								<option value="@{strength_mod}">STR mod</option>
								<option value="@{dexterity_mod}">DEX mod</option>
								<option value="@{constitution_mod}">CON mod</option>
								<option value="@{intelligence_mod}">INT mod</option>
								<option value="@{wisdom_mod}">WIS mod</option>
								<option value="@{charisma_mod}">CHA mod</option>
							</select>
						</div>
						<div class="sheet-col-1-6 sheet-small-label sheet-center"><input type="number" class="sheet-center" name="attr_damagemiscbonus" value="0" step="1"></div>
						<div class="sheet-col-1-6 sheet-small-label sheet-center"><input type="text" class="sheet-center" name="attr_damagetype"></div>
						<div class="sheet-col-1-6 sheet-center"><button type="roll" class="sheet-roll" name="roll_Damage" value="[[@{damage} [Base Spell Damage] + @{damagestatbonus} + @{damagemiscbonus} + @{global_spell_damage_bonus} [Active Spell Damage Bonus] + 0d0 [Bugfix 0]]] @{damagetype} damage\nExtra [[@{damage}]] damage on a crit\nAdditional effects: @{spelleffect}">Damage</button></div>
					</div>
				</div>
				
				<div class="sheet-spell-type-effects">
					<div class="sheet-row">
						<div class="sheet-col-5-6 sheet-vert-bottom sheet-center sheet-small-label">Spell Effects</div>
						<div class="sheet-col-1-6 sheet-vert-bottom sheet-center sheet-small-label">&nbsp;</div>
					</div>
							
					<div class="sheet-row">
						<div class="sheet-col-5-6 sheet-small-label sheet-center"><textarea name="attr_spelleffect" class="sheet-medium-textarea">None</textarea></div>
						<div class="sheet-col-1-6 sheet-vert-middle sheet-center"><button type="roll" class="sheet-roll" name="roll_SpellEffect" value="/em uses @{spellname}\n\n@{spelleffect}">Effect</button></div>
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
	
	if ($current_page == 0) $friendly_level = "Cantrip";
	else $friendly_level = "Level ". $current_page;
	
	// Add start of page wrapper
	$return_text .= $wrapper_start;

	// Add repeating section 
	$return_text .= $spell_row;
	
	//Add end of page wrapper
	$return_text .= $wrapper_end;
	
	// Replace placeholders with correct values
	$return_text = str_replace("PAGENUMBER", $current_page, $return_text);
	$return_text = str_replace("SPELLLEVEL", $spell_level_array[$current_page], $return_text);
	$return_text = str_replace("FRIENDLYLEVEL", $friendly_level, $return_text);
	$return_text = str_replace("SPELLSHORTLEVEL", strtolower(str_replace(" ", "", $spell_level_array[$current_page])), $return_text);
	
	if ($current_page == 0) 
	{
		$return_text = str_replace("DISABLEPREP", ' disabled="disabled"', $return_text);
		$return_text = str_replace("SELECTEDPREPNO", '', $return_text);
		$return_text = str_replace("SELECTEDPREPALWAYS", ' selected="selected"', $return_text);
	}
	else 
	{
		$return_text = str_replace("DISABLEPREP", '', $return_text);	
		$return_text = str_replace("SELECTEDPREPALWAYS", '', $return_text);
		$return_text = str_replace("SELECTEDPREPNO", ' selected="selected"', $return_text);
	}
	
	$full_output .= $return_text;
	$current_page++;
	
}

//echo $full_output;

$file = $full_output;
file_put_contents($filename, $file);


?>