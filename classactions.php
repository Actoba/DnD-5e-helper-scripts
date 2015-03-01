<?php
$filename = "classactions.html";
$start = 1;
$max = 20;

$file = file_get_contents($filename);

$wrapper_start = <<<END
			<!-- BEGIN new classaction page -->
			<div class="sheet-classaction-pagePAGENUMBER">
END;

$wrapper_end = <<<END
			</div>
			<!-- END classaction page -->
END;

$classaction_rows = <<<'END'
	
	<!-- BEGIN classaction row -->
	<div class="sheet-classaction-rowCURRENTROW sheet-margin-bottom sheet-padr sheet-padl">
		
		<div class="sheet-row">
			<div class="sheet-col-1-12 sheet-vert-bottom sheet-center sheet-small-label">Row</div>
			<div class="sheet-col-1-4 sheet-vert-bottom sheet-center sheet-small-label">Name</div>
			<div class="sheet-col-1-12 sheet-vert-bottom sheet-center sheet-small-label">Used</div>
			<div class="sheet-col-1-12 sheet-vert-bottom sheet-center sheet-small-label">Max</div>
			<div class="sheet-col-1-6 sheet-vert-bottom sheet-center sheet-small-label">Recharge</div>
			<div class="sheet-col-1-6 sheet-vert-bottom sheet-center sheet-small-label">Gained from?</div>
			<div class="sheet-col-1-6 sheet-vert-bottom sheet-center sheet-small-label">Use</div>
		</div>
		
		<div class="sheet-row">
			<div class="sheet-col-1-12 sheet-classaction-row-number sheet-margin-top">CURRENTROW</div>
			<div class="sheet-col-1-4"><input type="text" name="attr_classactionnameCURRENTROW"></div>
			<div class="sheet-col-1-12"><input type="number" name="attr_classactionresourceCURRENTROW" value="1"/></div>
			<div class="sheet-col-1-12"><input type="number" name="attr_classactionresourceCURRENTROW_max" value="1"/></div>
			<div class="sheet-col-1-6">
				<select name="attr_classactionrechargeCURRENTROW">
					<option value="None">None</option>
					<option value="Short Rest">Short Rest</option>
					<option value="Long rest">Long Rest</option>
					<option value="Other">Other</option>
				</select>
			</div>
			<div class="sheet-col-1-6">
				<select name="attr_classactionsourceCURRENTROW">
					<option value="Not set" selected="selected">---</option>
					<option value="Barbarian">Barbarian</option>
					<option value="Bard">Bard</option>
					<option value="Cleric">Cleric</option>
					<option value="Druid">Druid</option>
					<option value="Fighter">Fighter</option>
					<option value="Monk">Monk</option>
					<option value="Paladin">Paladin</option>
					<option value="Ranger">Ranger</option>
					<option value="Rogue">Rogue</option>
					<option value="Sorcerer">Sorcerer</option>
					<option value="Warlock">Warlock</option>
					<option value="Wizard">Wizard</option>
					<option value="Feat">Feat</option>
					<option value="Other">Other</option>
				</select>
			</div>
			<div class="sheet-col-1-6 sheet-center"><button type='roll' class="sheet-roll" name="roll_classactionCURRENTROW" value="&{template:5eDefault} {{title=@{classactionnameCURRENTROW}}} {{subheader=@{character_name}}} {{freetextname=@{classactionnameCURRENTROW}}} {{freetext=@{classactionoutputCURRENTROW}}} {{debug=1}}" >Use</button></div>
		</div>
		
		<div class="sheet-row sheet-padb sheet-classaction-output-options">
			<div class="sheet-col-1-8 sheet-vert-middle sheet-small-label sheet-padl">Auto include output with</div>
			<div class="sheet-col-1-12 sheet-center sheet-small-label">Info block<br/><input type="checkbox" name="attr_spellshowinfoblock" value="{{spellshowinfoblock=1}}"/></div>
			<div class="sheet-col-1-12 sheet-center sheet-small-label">Description<br><input type="checkbox" name="attr_spellshowdesc" value="{{spellshowdesc=1}} {{spelldescription=@{spelldescription}}}"/></div>
			<div class="sheet-col-1-8 sheet-center sheet-small-label">At higher levels<br><input type="checkbox" name="attr_spellshowhigherlvl" value="{{spellshowhigherlvl=1}} {{spellhigherlevel=@{spellhighersloteffect}}}" /></div>
			<div class="sheet-col-1-12 sheet-center sheet-small-label">Attack roll<br/><input type="checkbox" name="attr_spellshowattack" value="{{spellshowattack=1}} {{spellattack=[[1d20 + @{attackstat} + @{PB} + (@{global_spell_attack_bonus})]]}}" /></div>
			<div class="sheet-col-1-8 sheet-center sheet-small-label">2nd Attack roll<br/><input type="checkbox" name="attr_spellshowattackadv" value="{{spellshowattackadv=1}} {{spellattackadv=[[1d20 + @{attackstat} + @{PB} + (@{global_spell_attack_bonus})]]}}" /></div>
			<div class="sheet-col-1-8 sheet-center sheet-small-label">Saving throw<br/><input type="checkbox" name="attr_spellshowsavethrow" value="{{spellshowsavethrow=1}} {{spellsavedc=[[@{spellsavedc} + @{customsavedc}]]}} {{spellsavestat=@{savestat}}} {{spellsavesuccess=@{savesuccess}}}" /></div>
			<div class="sheet-col-1-12 sheet-center sheet-small-label">Healing<br/><input type="checkbox" name="attr_spellshowhealing" value="{{spellshowhealing=1}} {{spellhealing=[[@{spellhealamount} + @{healstatbonus}]]}}" /></div>
			<div class="sheet-col-1-12 sheet-center sheet-small-label">Damage<br/><input type="checkbox" name="attr_spellshowdamage" value="{{spellshowdamage=1}} {{spelldamage=[[@{damage} + @{damagestatbonus} + @{damagemiscbonus} + (@{global_spell_damage_bonus}) + 0d0]] @{damagetype}}} @{spellcancrit}" /></div>
			<div class="sheet-col-1-12 sheet-center sheet-small-label">Effects<br/><input type="checkbox" name="attr_spellshoweffects" value="{{spellshoweffects=1}} {{spelleffect=@{spelleffect}}}" /></div>
			
			<input type="hidden" name="attr_spellcastmacrooptions" value="@{spellshowinfoblock} @{spellshowdesc} @{spellshowhigherlvl} @{spellshowattack} @{spellshowattackadv} @{spellshowsavethrow} @{spellshowhealing} @{spellshowdamage} @{spellshoweffects}" />
		</div>
		
		<div class="sheet-row ">
			<div class="sheet-col-1-6 sheet-center sheet-small-label sheet-padt">Output</div>
			<div class="sheet-col-5-6 sheet-margin-top"><textarea class="sheet-fluid-textarea" name="attr_classactionoutputCURRENTROW"></textarea></div>
		</div>
			
	</div>
			
	<!-- END classaction row -->

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

	$return_text .= $classaction_rows;
	
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

// Now stitch together all the hidden fileds that power the classactions being used elsewhere

/*
$weight_calc = "";
for ($i=$start; $i<=$max; $i++)
{
	$weight_calc .= "@{inventorycarried$i} + (((@{inventoryqty$i} - 1) * @{inventorycarried$i}) * @{weight_unit_setting})";
	if ($i < $max) $weight_calc .= " + ";
}

$html_weight_calc = "<input type=\"hidden\" name=\"attr_inventory_weight_calc\" value=\"(" . $weight_calc . ")\" />";

$full_output .= $html_weight_calc;
*/


//echo $full_output;

$file = $full_output;
file_put_contents($filename, $file);




?>