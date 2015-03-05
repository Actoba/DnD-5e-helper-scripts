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
			<div class="sheet-col-1-6 sheet-center"><button type='roll' class="sheet-roll" name="roll_classactionCURRENTROW" value="&{template:5eDefault} {{title=@{classactionnameCURRENTROW}}} {{subheader=@{character_name}}} {{subheaderright=Class/Racial/Other ability}} {{freetextname=@{classactionnameCURRENTROW}}} {{freetext=@{classactionoutputCURRENTROW}}}" >Use</button></div>
		</div>
		
		<div class="sheet-row">
			<div class="sheet-col-1-12 sheet-center sheet-small-label sheet-padt">Output</div>
			<div class="sheet-col-11-12 sheet-margin-top"><textarea class="sheet-fluid-textarea" name="attr_classactionoutputCURRENTROW"></textarea></div>
		</div>
		
		<span class="sheet-small-note sheet-padr sheet-offset-1-12">Show output options?</span><input type="checkbox" name="attr_classactionshowoptionsCURRENTROW" class="sheet-classactionshowoptionsCURRENTROW" value="1"/>
		
		<div class="sheet-classaction-output-options sheet-padb sheet-margin-bottom">
		
			<span class="sheet-col-1  sheet-padl sheet-padr sheet-small-note">Check the appropriate option(s) below to have the output automatically be included in the roll type specified</span>		
			
			<div class="sheet-row sheet-small-label sheet-center">
				<div class="sheet-col-1-5">Saving Throws</div>
				<div class="sheet-col-1-5">Weapons/Spell/Misc</div>
				<div class="sheet-col-2-5">Core Skills</div>
				<div class="sheet-col-1-5">Custom/Unskilled checks</div>
			</div>
			
			<div class="sheet-row">
			
				<div class="sheet-col-1-5 sheet-padl">
				
					<div class="sheet-class-action-zebra">
					
						<div class="sheet-row sheet-margin-right">
							<div class="sheet-col-5-6">Strength</div>
							<div class="sheet-col-1-12"><input type="checkbox" name="attr_classactionstrengthsaveCURRENTROW" value="{{@{classactionnameCURRENTROW}=@{classactionoutputCURRENTROW}}}"/></div>
						</div>
						
						<div class="sheet-row sheet-margin-right">
							<div class="sheet-col-5-6">Dexterity</div>
							<div class="sheet-col-1-12"><input type="checkbox" name="attr_classactiondexteritysaveCURRENTROW" value="{{@{classactionnameCURRENTROW}=@{classactionoutputCURRENTROW}}}"/></div>
						</div>
						
						<div class="sheet-row sheet-margin-right">
							<div class="sheet-col-5-6">Constitution</div>
							<div class="sheet-col-1-12"><input type="checkbox" name="attr_classactionconstitutionsaveCURRENTROW" value="{{@{classactionnameCURRENTROW}=@{classactionoutputCURRENTROW}}}"/></div>
						</div>
						
						<div class="sheet-row sheet-margin-right">
							<div class="sheet-col-5-6">Intelligence</div>
							<div class="sheet-col-1-12"><input type="checkbox" name="attr_classactionintelligencesaveCURRENTROW" value="{{@{classactionnameCURRENTROW}=@{classactionoutputCURRENTROW}}}"/></div>
						</div>
						
						<div class="sheet-row sheet-margin-right">
							<div class="sheet-col-5-6">Wisdom</div>
							<div class="sheet-col-1-12"><input type="checkbox" name="attr_classactionwisdomsaveCURRENTROW" value="{{@{classactionnameCURRENTROW}=@{classactionoutputCURRENTROW}}}"/></div>
						</div>
						
						<div class="sheet-row sheet-margin-right">
							<div class="sheet-col-5-6">Charisma</div>
							<div class="sheet-col-1-12"><input type="checkbox" name="attr_classactioncharismasaveCURRENTROW" value="{{@{classactionnameCURRENTROW}=@{classactionoutputCURRENTROW}}}"/></div>
						</div>
						
						<div class="sheet-row sheet-margin-right">
							<div class="sheet-col-5-6">Death</div>
							<div class="sheet-col-1-12"><input type="checkbox" name="attr_classactiondeathsaveCURRENTROW" value="{{@{classactionnameCURRENTROW}=@{classactionoutputCURRENTROW}}}"/></div>
						</div>	
						
					</div>
					
				</div>
				
				
				<div class="sheet-col-1-5 sheet-padl">
			
					<div class="sheet-class-action-zebra">
						
						<div class="sheet-row sheet-margin-right">
							<div class="sheet-col-5-6">Initiative</div>
							<div class="sheet-col-1-12"><input type="checkbox" name="attr_classactioninitiativeCURRENTROW" value="{{@{classactionnameCURRENTROW}=@{classactionoutputCURRENTROW}}}"/></div>
						</div>
					
						<div class="sheet-row sheet-margin-right">
							<div class="sheet-col-5-6">Hit Dice</div>
							<div class="sheet-col-1-12"><input type="checkbox" name="attr_classactionhitdiceCURRENTROW" value="{{@{classactionnameCURRENTROW}=@{classactionoutputCURRENTROW}}}"/></div>
						</div>
			
						<div class="sheet-row sheet-margin-right">
							<div class="sheet-col-5-6">Melee Weapons</div>
							<div class="sheet-col-1-12"><input type="checkbox" name="attr_classactionmeleeweaponCURRENTROW" value="{{@{classactionnameCURRENTROW}=@{classactionoutputCURRENTROW}}}"/></div>
						</div>
					
						<div class="sheet-row sheet-margin-right">
							<div class="sheet-col-5-6">Ranged Weapons</div>
							<div class="sheet-col-1-12"><input type="checkbox" name="attr_classactionrangedweaponCURRENTROW" value="{{@{classactionnameCURRENTROW}=@{classactionoutputCURRENTROW}}}"/></div>
						</div>
					
						<div class="sheet-row sheet-margin-right">
							<div class="sheet-col-5-6">Spell Info</div>
							<div class="sheet-col-1-12"><input type="checkbox" name="attr_classactionspellinfoCURRENTROW" value="{{@{classactionnameCURRENTROW}=@{classactionoutputCURRENTROW}}}"/></div>
						</div>
					
						<div class="sheet-row sheet-margin-right">
							<div class="sheet-col-5-6">Spell Cast</div>
							<div class="sheet-col-1-12"><input type="checkbox" name="attr_classactionspellcastCURRENTROW" value="{{@{classactionnameCURRENTROW}=@{classactionoutputCURRENTROW}}}"/></div>
						</div>
						
					</div>
					
				</div>
				
				<div class="sheet-col-1-5 sheet-padl">

					<div class="sheet-class-action-zebra">
					
						<div class="sheet-row sheet-margin-right">
							<div class="sheet-col-5-6">Acrobatics</div>
							<div class="sheet-col-1-12"><input type="checkbox" name="attr_classactionacrobaticsCURRENTROW" value="{{@{classactionnameCURRENTROW}=@{classactionoutputCURRENTROW}}}"/></div>
						</div>
						
						<div class="sheet-row sheet-margin-right">
							<div class="sheet-col-5-6">Animal Handling</div>
							<div class="sheet-col-1-12"><input type="checkbox" name="attr_classactionanimalhandlingCURRENTROW" value="{{@{classactionnameCURRENTROW}=@{classactionoutputCURRENTROW}}}"/></div>
						</div>
						
						<div class="sheet-row sheet-margin-right">
							<div class="sheet-col-5-6">Arcana</div>
							<div class="sheet-col-1-12"><input type="checkbox" name="attr_classactionarcanaCURRENTROW" value="{{@{classactionnameCURRENTROW}=@{classactionoutputCURRENTROW}}}"/></div>
						</div>
						
						<div class="sheet-row sheet-margin-right">
							<div class="sheet-col-5-6">Athletics</div>
							<div class="sheet-col-1-12"><input type="checkbox" name="attr_classactionathleticsCURRENTROW" value="{{@{classactionnameCURRENTROW}=@{classactionoutputCURRENTROW}}}"/></div>
						</div>
						
						<div class="sheet-row sheet-margin-right">
							<div class="sheet-col-5-6">Deception</div>
							<div class="sheet-col-1-12"><input type="checkbox" name="attr_classactiondeceptionCURRENTROW" value="{{@{classactionnameCURRENTROW}=@{classactionoutputCURRENTROW}}}"/></div>
						</div>
						
						<div class="sheet-row sheet-margin-right">
							<div class="sheet-col-5-6">History</div>
							<div class="sheet-col-1-12"><input type="checkbox" name="attr_classactionhistoryCURRENTROW" value="{{@{classactionnameCURRENTROW}=@{classactionoutputCURRENTROW}}}"/></div>
						</div>
						
						<div class="sheet-row sheet-margin-right">
							<div class="sheet-col-5-6">Insight</div>
							<div class="sheet-col-1-12"><input type="checkbox" name="attr_classactioninsightCURRENTROW" value="{{@{classactionnameCURRENTROW}=@{classactionoutputCURRENTROW}}}"/></div>
						</div>
						
						<div class="sheet-row sheet-margin-right">
							<div class="sheet-col-5-6">Intimidation</div>
							<div class="sheet-col-1-12"><input type="checkbox" name="attr_classactionintimidationCURRENTROW" value="{{@{classactionnameCURRENTROW}=@{classactionoutputCURRENTROW}}}"/></div>
						</div>
						
						<div class="sheet-row sheet-margin-right">
							<div class="sheet-col-5-6">Investigation</div>
							<div class="sheet-col-1-12"><input type="checkbox" name="attr_classactioninvestigationCURRENTROW" value="{{@{classactionnameCURRENTROW}=@{classactionoutputCURRENTROW}}}"/></div>
						</div>
						
					</div>
					
				</div>
				
				<div class="sheet-col-1-5 sheet-padl">

					<div class="sheet-class-action-zebra">
					
						<div class="sheet-row sheet-margin-right">
							<div class="sheet-col-5-6">Medicine</div>
							<div class="sheet-col-1-12"><input type="checkbox" name="attr_classactionmedicineCURRENTROW" value="{{@{classactionnameCURRENTROW}=@{classactionoutputCURRENTROW}}}"/></div>
						</div>
						
						<div class="sheet-row sheet-margin-right">
							<div class="sheet-col-5-6">Nature</div>
							<div class="sheet-col-1-12"><input type="checkbox" name="attr_classactionnatureCURRENTROW" value="{{@{classactionnameCURRENTROW}=@{classactionoutputCURRENTROW}}}"/></div>
						</div>
						
						<div class="sheet-row sheet-margin-right">
							<div class="sheet-col-5-6">Perception</div>
							<div class="sheet-col-1-12"><input type="checkbox" name="attr_classactionperceptionCURRENTROW" value="{{@{classactionnameCURRENTROW}=@{classactionoutputCURRENTROW}}}"/></div>
						</div>
						
						<div class="sheet-row sheet-margin-right">
							<div class="sheet-col-5-6">Performance</div>
							<div class="sheet-col-1-12"><input type="checkbox" name="attr_classactionperformanceCURRENTROW" value="{{@{classactionnameCURRENTROW}=@{classactionoutputCURRENTROW}}}"/></div>
						</div>
						
						<div class="sheet-row sheet-margin-right">
							<div class="sheet-col-5-6">Persuasion</div>
							<div class="sheet-col-1-12"><input type="checkbox" name="attr_classactionpersuasionCURRENTROW" value="{{@{classactionnameCURRENTROW}=@{classactionoutputCURRENTROW}}}"/></div>
						</div>
						
						<div class="sheet-row sheet-margin-right">
							<div class="sheet-col-5-6">Religion</div>
							<div class="sheet-col-1-12"><input type="checkbox" name="attr_classactionreligionCURRENTROW" value="{{@{classactionnameCURRENTROW}=@{classactionoutputCURRENTROW}}}"/></div>
						</div>
						
						<div class="sheet-row sheet-margin-right">
							<div class="sheet-col-5-6">Sleight of Hand</div>
							<div class="sheet-col-1-12"><input type="checkbox" name="attr_classactionsleightofhandCURRENTROW" value="{{@{classactionnameCURRENTROW}=@{classactionoutputCURRENTROW}}}"/></div>
						</div>
						
						<div class="sheet-row sheet-margin-right">
							<div class="sheet-col-5-6">Stealth</div>
							<div class="sheet-col-1-12"><input type="checkbox" name="attr_classactionstealthCURRENTROW" value="{{@{classactionnameCURRENTROW}=@{classactionoutputCURRENTROW}}}"/></div>
						</div>
						
						<div class="sheet-row sheet-margin-right">
							<div class="sheet-col-5-6">Survival</div>
							<div class="sheet-col-1-12"><input type="checkbox" name="attr_classactionsurvivalCURRENTROW" value="{{@{classactionnameCURRENTROW}=@{classactionoutputCURRENTROW}}}"/></div>
						</div>
						
					</div>
					
				</div>
				
				<div class="sheet-col-1-5 sheet-padl">

					<div class="sheet-class-action-zebra">
					
						<div class="sheet-row sheet-margin-right">
							<div class="sheet-col-5-6">Custom 1</div>
							<div class="sheet-col-1-12"><input type="checkbox" name="attr_classactioncustom1skillCURRENTROW" value="{{@{classactionnameCURRENTROW}=@{classactionoutputCURRENTROW}}}"/></div>
						</div>
						
						<div class="sheet-row sheet-margin-right">
							<div class="sheet-col-5-6">Custom 2</div>
							<div class="sheet-col-1-12"><input type="checkbox" name="attr_classactioncustom2skillCURRENTROW" value="{{@{classactionnameCURRENTROW}=@{classactionoutputCURRENTROW}}}"/></div>
						</div>
						
						<div class="sheet-row sheet-margin-right">
							<div class="sheet-col-5-6">Custom 3</div>
							<div class="sheet-col-1-12"><input type="checkbox" name="attr_classactioncustom3skillCURRENTROW" value="{{@{classactionnameCURRENTROW}=@{classactionoutputCURRENTROW}}}"/></div>
						</div>
						
						<div class="sheet-row sheet-margin-right">
							<div class="sheet-col-5-6">Custom 4</div>
							<div class="sheet-col-1-12"><input type="checkbox" name="attr_classactioncustom4skillCURRENTROW" value="{{@{classactionnameCURRENTROW}=@{classactionoutputCURRENTROW}}}"/></div>
						</div>
						
						<div class="sheet-row sheet-margin-right">
							<div class="sheet-col-5-6">Unskilled STR</div>
							<div class="sheet-col-1-12"><input type="checkbox" name="attr_classactionunskilledstrCURRENTROW" value="{{@{classactionnameCURRENTROW}=@{classactionoutputCURRENTROW}}}"/></div>
						</div>
						
						<div class="sheet-row sheet-margin-right">
							<div class="sheet-col-5-6">Unskilled DEX</div>
							<div class="sheet-col-1-12"><input type="checkbox" name="attr_classactionunskilleddexCURRENTROW" value="{{@{classactionnameCURRENTROW}=@{classactionoutputCURRENTROW}}}"/></div>
						</div>
						
						<div class="sheet-row sheet-margin-right">
							<div class="sheet-col-5-6">Unskilled CON</div>
							<div class="sheet-col-1-12"><input type="checkbox" name="attr_classactionunskilledconCURRENTROW" value="{{@{classactionnameCURRENTROW}=@{classactionoutputCURRENTROW}}}"/></div>
						</div>
						
						<div class="sheet-row sheet-margin-right">
							<div class="sheet-col-5-6">Unskilled INT</div>
							<div class="sheet-col-1-12"><input type="checkbox" name="attr_classactionunskilledintCURRENTROW" value="{{@{classactionnameCURRENTROW}=@{classactionoutputCURRENTROW}}}"/></div>
						</div>
						
						<div class="sheet-row sheet-margin-right">
							<div class="sheet-col-5-6">Unskilled WIS</div>
							<div class="sheet-col-1-12"><input type="checkbox" name="attr_classactionunskilledwisCURRENTROW" value="{{@{classactionnameCURRENTROW}=@{classactionoutputCURRENTROW}}}"/></div>
						</div>
						
						<div class="sheet-row sheet-margin-right">
							<div class="sheet-col-5-6">Unskilled CHA</div>
							<div class="sheet-col-1-12"><input type="checkbox" name="attr_classactionunskilledchaCURRENTROW" value="{{@{classactionnameCURRENTROW}=@{classactionoutputCURRENTROW}}}"/></div>
						</div>
			
					</div>
					
				</div>

			</div>
			
			
			
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

// Now stitch together all the hidden fields that power the classactions being used elsewhere

$full_output .=<<<END

		<!-- Hidden attributes to power output to other rolls -->
		
END;

$autocalcs = array (
	"classactionstrengthsave" => "",
	"classactiondexteritysave"=> "",
	"classactionconstitutionsave"=> "",
	"classactionintelligencesave"=> "",
	"classactionwisdomsave"=> "",
	"classactioncharismasave"=> "",
	"classactiondeathsave"=> "",
	
	"classactioninitiative" => "",
	"classactionhitdice" => "",
	
	"classactionmeleeweapon" => "",
	"classactionrangedweapon" => "",
	
	"classactionspellinfo" => "",
	"classactionspellcast" => "",
	
	"classactionacrobatics" => "",
	"classactionanimalhandling" => "",
	"classactionarcana" => "",
	"classactionathletics" => "",
	"classactiondeception" => "",
	"classactionhistory" => "",
	"classactioninsight" => "",
	"classactionintimidation" => "",
	"classactioninvestigation" => "",
	
	"classactionmedicine" => "",
	"classactionnature" => "",
	"classactionperception" => "",
	"classactionperformance" => "",
	"classactionpersuasion" => "",
	"classactionreligion" => "",
	"classactionsleightofhand" => "",
	"classactionstealth" => "",
	"classactionsurvival" => "",
	
	"classactioncustom1skill" => "",
	"classactioncustom2skill" => "",
	"classactioncustom3skill" => "",
	"classactioncustom4skill" => "",

	"classactionunskilledstr" => "",
	"classactionunskilleddex" => "",
	"classactionunskilledcon" => "",
	"classactionunskilledint" => "",
	"classactionunskilledwis" => "",
	"classactionunskilledcha" => ""	
);

foreach ($autocalcs as $key => $value)
{
	$full_output .= '<input type="hidden" name="attr_' . $key . '" value="';
	
	for ($i=$start; $i<=$max; $i++)
	{
		$autocalcs[$key] .= "@{" . $key . $i . "} ";
	}
	
	$autocalcs[$key] .= ' {{showclassactions=1}}" disabled="disabled">';
	
	$full_output .= $autocalcs[$key];
	
}

$full_output .=<<<END

		<!--  END Hidden attributes to power output to other rolls ->
END;



//echo $full_output;

$file = $full_output;
file_put_contents($filename, $file);




?>