<?php
$filename = "save.html";
$start = 1;
$max = 45;

$file = file_get_contents($filename);

$wrapper_start = <<<END
			<!-- BEGIN new spell page -->
			<div class="sheet-spell-page-savePAGENUMBER">
				<div class="sheet-row sheet-sub-header">
					<div class="sheet-col-1-12 sheet-vert-bottom sheet-center sheet-small-label">Row#</div>
					<div class="sheet-col-5-12 sheet-vert-bottom sheet-center sheet-small-label">Spell Name</div>
					<div class="sheet-col-1-8 sheet-vert-bottom sheet-center sheet-small-label">Saving Stat</div>
					<div class="sheet-col-1-4 sheet-vert-bottom sheet-center sheet-small-label">Save DC</div>
					<div class="sheet-col-1-8 sheet-vert-bottom sheet-center sheet-small-label">Custom DC</div>
				</div>
END;

$wrapper_end = <<<END
			</div>
			<!-- END spell page -->
END;

$save_rows = <<<'END'
	
	<!-- BEGIN save spell row -->
	
	<div class="sheet-save-spell-rowCURRENTROW">
	
		<div class="sheet-row sheet-grey-row">
			<div class="sheet-col-1-12 sheet-vert-middle sheet-spell-row-number">CURRENTROW</div>
			<div class="sheet-col-5-12"><input type="text" name="attr_savespellnameCURRENTROW"></div>
			<div class="sheet-col-1-8">
				<select name="attr_savespellsavestatCURRENTROW">
					<option value="STR">STR</option>
					<option value="DEX">DEX</option>
					<option value="CON">CON</option>
					<option value="INT">INT</option>
					<option value="WIS">WIS</option>
					<option value="CHA">CHA</option>
				</select>
			</div>
			<div class="sheet-col-1-4" title="Pick the class that the save DC will be created from or set your own DC by selecting custom here and then entering the DC in the next field">
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
			<div class="sheet-col-1-8"><input type="number" name="attr_savespellcustomdcCURRENTROW" value="0" title="Unless you have selected Custom in the previous field this should always be 0"></div>
		</div>
		
		<div class="sheet-row sheet-footer-row sheet-grey-row">
			
			<div class="sheet-col-1-12 sheet-vert-middle sheet-small-label">Failed<br/>save</div>
			<div class="sheet-col-5-12"><textarea class="sheet-fluid-textarea" name="attr_savespellsavefailCURRENTROW"></textarea></div>
			<div class="sheet-col-1-12 sheet-vert-middle sheet-small-label">Successful<br/>save</div>
			<div class="sheet-col-1-3"><textarea class="sheet-fluid-textarea" name="attr_savespellsavesuccessCURRENTROW"></textarea></div>
			<div class="sheet-col-1-12 sheet-vert-middle sheet-center"><button type="roll" class="sheet-roll" name="roll_SaveThrowSpellCURRENTROW" value="/em uses @{savespellnameCURRENTROW} to attack\n\nDC [[@{savespellsavedcCURRENTROW} + @{savespellcustomdcCURRENTROW}]] @{savespellsavestatCURRENTROW} saving throw\nOn a failed save : @{savespellsavefailCURRENTROW}\nOn a successful save : @{savespellsavesuccessCURRENTROW}" >Use</button></div>
			
		</div>
		
	</div>
			
	<!-- END save spell row -->

END;

$full_output = "";

for ($i=$start; $i<=$max; $i++)
{
	$return_text = "";
	
	if ($i%5==1 && $i<$max)
	{
		//Add start of page wrapper
		$return_text .= $wrapper_start;
	}

	$return_text .= $save_rows;
	
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