<?php
$filename = "npcactions.html";
$start = 1;
$max = 20;

$file = file_get_contents($filename);

$wrapper_start = <<<END
END;

$action_rows = <<<'END'
	<!-- BEGIN npc action row -->
	<div class="sheet-npc-row">
		<div class="sheet-row">
			<div class="sheet-col-1-12 sheet-center sheet-small-label sheet-vert-bottom">Row</div>
			<div class="sheet-col-1-2 sheet-center sheet-small-label sheet-vert-bottom">Name</div>
			<div class="sheet-col-1-6 sheet-center sheet-small-label sheet-vert-bottom">Action Type</div>
			<div class="sheet-col-1-6 sheet-center sheet-small-label sheet-vert-bottom">Multiattack?</div>
			<div class="sheet-col-1-12 sheet-center sheet-small-label sheet-vert-bottom">Macro</div>
		</div>	
		
		<div class="sheet-row">
			<div class="sheet-col-1-12 sheet-center sheet-small-label sheet-margin-top">CURRENTROW</div>
			<div class="sheet-col-1-2 sheet-center"><input type="text" class="sheet-center" name="attr_npc_action_nameCURRENTROW"></div>
			<div class="sheet-col-1-6">
				<select name="attr_npc_action_typeCURRENTROW">
					<option value="(Normal Action) " selected="selected">Normal</option>
					<option value="(Bonus Action) ">Bonus</option>
					<option value="(Reaction) ">Reaction</option>
					<option value="(Lair Action) ">Lair</option>
					<option value="(Legendary Action) ">Legendary</option>
					<option value="(Special Action) ">Other/Special</option>
				</select>
			</div>
			<div class="sheet-col-1-6 sheet-center sheet-checkbox-row">
				<input type="checkbox" name="attr_npc_action_multiattackCURRENTROW" value="{{npc_showmultiattack=1}} {{npc_multiattack=@{npc_multiattack}}}" \>
			</div>
			<div class="sheet-col-1-12 sheet-center"><button type="roll" class="sheet-roll" name="roll_NPCActionCURRENTROW" value="/w GM &{template:5eDefault} {{npcaction=1}} {{title=@{npc_action_nameCURRENTROW}}} {{subheader=@{character_name}}} {{subheaderright=@{npc_action_typeCURRENTROW}}} @{npc_action_multiattackCURRENTROW} {{npc_action_description=@{npc_action_descriptionCURRENTROW}}} {{npc_action_effect=@{npc_action_effectCURRENTROW}}}" >Use</button></div>
			
		</div>
		
		<div class="sheet-row">
			<div class="sheet-col-5-12 sheet-offset-1-12 sheet-center sheet-small-label sheet-vert-bottom">Description</div>
			<div class="sheet-col-5-12 sheet-center sheet-small-label sheet-vert-bottom">Effect</div>
		</div>	
		<div class="sheet-row">
			<div class="sheet-col-5-12 sheet-offset-1-12 sheet-margin-top"><textarea class="sheet-medium-textarea" name="attr_npc_action_descriptionCURRENTROW"></textarea></div>
			<div class="sheet-col-5-12 sheet-margin-top"><textarea class="sheet-medium-textarea" name="attr_npc_action_effectCURRENTROW"></textarea></div>
		</div>	
	</div>
	<!-- END npc action row -->

END;


$wrapper_end = <<<END
	<hr/>
END;

$full_output = "";

// action loop
for ($i=$start; $i<=$max; $i++)
{
	$return_text = "";
	
	if (($i==1) )
	{
		//Add start of section wrapper
		$return_text .= $wrapper_start;
	}

	$return_text .= $action_rows;
		
	// Replace placeholders with correct values
	$return_text = str_replace("CURRENTROW", $i, $return_text);
	
	$full_output .= $return_text;
	
}

$full_output .= $wrapper_end;

//echo $full_output;

$file = $full_output;
file_put_contents($filename, $file);


?>