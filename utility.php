<?php
$filename = "utility.html";
$start = 1;
$max = 50;

$file = file_get_contents($filename);


$header_row = <<<END
	<div class="sheet-row sheet-sub-header">
		<div class="sheet-col-1-2 sheet-vert-bottom sheet-center sheet-small-label">Spell name</div>
		<div class="sheet-col-1-6 sheet-vert-bottom sheet-center sheet-small-label">Spell Level</div>
		<div class="sheet-col-1-6 sheet-vert-bottom sheet-center sheet-small-label">Gained from</div>
		<div class="sheet-col-1-6 sheet-vert-bottom sheet-center sheet-small-label">Prepared?</div>
	</div>
END;

$buttons = <<<END
	<input type="checkbox" name="attr_add_spell_rowgroupNEXTGROUP" class="sheet-add-spell-rowgroupNEXTGROUP sheet-add-spell-rowgroup" value="NEXTGROUP" title="Show another 5 rows/>
END;

$utility_rows = <<<END
	<!-- BEGIN utility spell row -->
	<div class="sheet-spell-rowCURRENTROW sheet-spell-rowgroupCURRENTGROUP">
		<div class="sheet-row sheet-grey-row">

			<div class="sheet-col-1-2 sheet-vert-middle"><input type="text" name="attr_utilityspellname"></div>
			<div class="sheet-col-1-6 sheet-vert-middle">
				<select name="attr_utilityspellbaselevel">
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
				<select name="attr_utilityspellgainedfrom">
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
				<select name="attr_utilityspellisprepared">
					<option value="1">Yes</option>
					<option value="0">NO</option>
					<option value="0.0001">Always</option>
				</select>
			</div>
			
		</div>
				
		<div class="sheet-row sheet-grey-row sheet-footer-row">
			<div class="sheet-col-1-10 sheet-vert-middle"><br/>Description<br/></div>
			<div class="sheet-col-4-5"><textarea class="sheet-fluid-textarea" name="attr_utilityspelldescription"></textarea></div>
			<div class="sheet-col-1-10 sheet-vert-middle"><button type="roll" class="sheet-roll" name="roll_UtilitySpellCURRENTROW" value="/em uses @{utilityspellname} \n\n@{utilityspelldescription}">Use</button></div>
			</div>
			
	</div>
			
	<!-- END utility spell row -->

END;

$full_output = "";

for ($i=$start; $i<=$max; $i++)
{
	$return_text = $utility_rows;
	
	if (is_int($i/5) && $i<$max)
	{
		//Add buttons for more rows then repeat header every 5 rows, except for the last set
		$return_text .= $buttons;
		$return_text .= $header_row;
	}
	
	// Replace placeholders with correct values
	$return_text = str_replace("CURRENTROW", $i, $return_text);
	$return_text = str_replace("CURRENTGROUP", ceil($i/5), $return_text);
	$return_text = str_replace("NEXTGROUP", ceil($i/5)+1, $return_text);
	
	$full_output .= $return_text;
	
}

echo $full_output;

$file = $full_output;
file_put_contents($filename, $file);


?>