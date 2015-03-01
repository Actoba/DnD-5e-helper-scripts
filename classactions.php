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
			<div class="sheet-col-1-6 sheet-center"><button type='roll' class="sheet-roll" name="roll_classactionCURRENTROW" value="&{template:5eDefault} {{title=@{classactionnameCURRENTROW}}} {{subheader=@{character_name}}} {{subheaderright=Class/Racial/Other ability}} {{freetextname=@{classactionnameCURRENTROW}}} {{freetext=@{classactionoutputCURRENTROW}}} {{debug=1}}" >Use</button></div>
		</div>
		
		<div class="sheet-row">
			<div class="sheet-col-1-12 sheet-center sheet-small-label sheet-padt">Output</div>
			<div class="sheet-col-11-12 sheet-margin-top"><textarea class="sheet-fluid-textarea" name="attr_classactionoutputCURRENTROW"></textarea></div>
		</div>
		
		<span class="sheet-small-note sheet-padr sheet-offset-1-12">Show output options?</span><input type="checkbox" name="attr_classactionshowoptionsCURRENTROW" class="sheet-classactionshowoptionsCURRENTROW" value="1"/>
		
		<div class="sheet-classaction-output-options sheet-padb sheet-margin-bottom">
		
			<span class="sheet-offset-1-12 sheet-col-5-6 sheet-small-note">Check the appropriate option(s) below to have the output automatically be included in the roll type specified</span>
			
			<hr>
			
			<div class="sheet-row">
				<div class="sheet-offset-1-12 sheet-col-1-3 sheet-small-label sheet-center sheet-border-right">Saving throws</div>
				<div class="sheet-col-1-6 sheet-small-label sheet-center sheet-border-right">Misc</div>
				<div class="sheet-col-1-6 sheet-small-label sheet-center sheet-border-right">Weapon attacks</div>
				<div class="sheet-col-1-6 sheet-small-label sheet-center">Spell</div>
				
			</div>
			
			
			<div class="sheet-row">
				
				<div class="sheet-offset-1-12 sheet-col-1-24 sheet-center sheet-small-label">STR<br/><input type="checkbox" name="attr_classactionstrengthsaveCURRENTROW" value="{{@{classactionnameCURRENTROW}=@{classactionoutputCURRENTROW}}}"/></div>
				<div class="sheet-col-1-24 sheet-center sheet-small-label">DEX<br/><input type="checkbox" name="attr_classactiondexteritysaveCURRENTROW" value="{{@{classactionnameCURRENTROW}=@{classactionoutputCURRENTROW}}}"/></div>
				<div class="sheet-col-1-24 sheet-center sheet-small-label">CON<br/><input type="checkbox" name="attr_classactionconstitutionsaveCURRENTROW" value="{{@{classactionnameCURRENTROW}=@{classactionoutputCURRENTROW}}}"/></div>
				<div class="sheet-col-1-24 sheet-center sheet-small-label">INT<br/><input type="checkbox" name="attr_classactionintelligencesaveCURRENTROW" value="{{@{classactionnameCURRENTROW}=@{classactionoutputCURRENTROW}}}"/></div>
				<div class="sheet-col-1-24 sheet-center sheet-small-label">WIS<br/><input type="checkbox" name="attr_classactionwisdomhsaveCURRENTROW" value="{{@{classactionnameCURRENTROW}=@{classactionoutputCURRENTROW}}}"/></div>
				<div class="sheet-col-1-24 sheet-center sheet-small-label">CHA<br/><input type="checkbox" name="attr_classactioncharismasaveCURRENTROW" value="{{@{classactionnameCURRENTROW}=@{classactionoutputCURRENTROW}}}"/></div>
				<div class="sheet-col-1-12 sheet-center sheet-small-label sheet-border-right">Death<br/><input type="checkbox" name="attr_classactiondeathsaveCURRENTROW" value="{{@{classactionnameCURRENTROW}=@{classactionoutputCURRENTROW}}}"/></div>
				
				<div class="sheet-col-1-12 sheet-center sheet-small-label">Initiative<br/><input type="checkbox" name="attr_classactioninitiativeCURRENTROW" value="{{@{classactionnameCURRENTROW}=@{classactionoutputCURRENTROW}}}"/></div>
				<div class="sheet-col-1-12 sheet-center sheet-small-label sheet-border-right">Hit dice<br/><input type="checkbox" name="attr_classactionhitdiceCURRENTROW" value="{{@{classactionnameCURRENTROW}=@{classactionoutputCURRENTROW}}}"/></div>
				
				<div class="sheet-col-1-12 sheet-center sheet-small-label">Melee<br/><input type="checkbox" name="attr_classactionmeleeweaponCURRENTROW" value="{{@{classactionnameCURRENTROW}=@{classactionoutputCURRENTROW}}}"/></div>
				<div class="sheet-col-1-12 sheet-center sheet-small-label sheet-border-right">Ranged<br/><input type="checkbox" name="attr_classactionrangedweaponCURRENTROW" value="{{@{classactionnameCURRENTROW}=@{classactionoutputCURRENTROW}}}"/></div>
				
				<div class="sheet-col-1-12 sheet-center sheet-small-label">Info<br/><input type="checkbox" name="attr_classactionspellinfoCURRENTROW" value="{{@{classactionnameCURRENTROW}=@{classactionoutputCURRENTROW}}}"/></div>
				<div class="sheet-col-1-12 sheet-center sheet-small-label">Cast<br/><input type="checkbox" name="attr_classactionspellcastCURRENTROW" value="{{@{classactionnameCURRENTROW}=@{classactionoutputCURRENTROW}}}"/></div>
				
			</div>
			
			<hr>
			
			<div class="sheet-row">
				<div class="sheet-col-1 sheet-small-label sheet-center">Core Skills</div>
			</div>
			
			<div class="sheet-row">
	
				<div class="sheet-col-1-9 sheet-center sheet-small-label">Acrobatics<br/><input type="checkbox" name="attr_classactionacrobaticsCURRENTROW" value="{{@{classactionnameCURRENTROW}=@{classactionoutputCURRENTROW}}}"/></div>
				<div class="sheet-col-1-9 sheet-center sheet-small-label">Animal Handling<br/><input type="checkbox" name="attr_classactionanimalhandlingCURRENTROW" value="{{@{classactionnameCURRENTROW}=@{classactionoutputCURRENTROW}}}"/></div>
				<div class="sheet-col-1-9 sheet-center sheet-small-label">Arcana<br/><input type="checkbox" name="attr_classactionarcanaCURRENTROW" value="{{@{classactionnameCURRENTROW}=@{classactionoutputCURRENTROW}}}"/></div>
				<div class="sheet-col-1-9 sheet-center sheet-small-label">Athletics<br/><input type="checkbox" name="attr_classactionathleticsCURRENTROW" value="{{@{classactionnameCURRENTROW}=@{classactionoutputCURRENTROW}}}"/></div>
				<div class="sheet-col-1-9 sheet-center sheet-small-label">Deception<br/><input type="checkbox" name="attr_classactiondeceptionCURRENTROW" value="{{@{classactionnameCURRENTROW}=@{classactionoutputCURRENTROW}}}"/></div>
				<div class="sheet-col-1-9 sheet-center sheet-small-label">History<br/><input type="checkbox" name="attr_classactionhistoryCURRENTROW" value="{{@{classactionnameCURRENTROW}=@{classactionoutputCURRENTROW}}}"/></div>
				<div class="sheet-col-1-9 sheet-center sheet-small-label">Insight<br/><input type="checkbox" name="attr_classactioninsightCURRENTROW" value="{{@{classactionnameCURRENTROW}=@{classactionoutputCURRENTROW}}}"/></div>
				<div class="sheet-col-1-9 sheet-center sheet-small-label">Intimidation<br/><input type="checkbox" name="attr_classactionintimidationCURRENTROW" value="{{@{classactionnameCURRENTROW}=@{classactionoutputCURRENTROW}}}"/></div>
				<div class="sheet-col-1-9 sheet-center sheet-small-label">Investigation<br/><input type="checkbox" name="attr_classactioninvestigationCURRENTROW" value="{{@{classactionnameCURRENTROW}=@{classactionoutputCURRENTROW}}}"/></div>
				
			</div>
			
			
			<div class="sheet-row">
			
				<div class="sheet-col-1-9 sheet-center sheet-small-label">Medicine<br/><input type="checkbox" name="attr_classactionmedicineCURRENTROW" value="{{@{classactionnameCURRENTROW}=@{classactionoutputCURRENTROW}}}"/></div>
				<div class="sheet-col-1-9 sheet-center sheet-small-label">Nature<br/><input type="checkbox" name="attr_classactionnatureCURRENTROW" value="{{@{classactionnameCURRENTROW}=@{classactionoutputCURRENTROW}}}"/></div>
				<div class="sheet-col-1-9 sheet-center sheet-small-label">Perception<br/><input type="checkbox" name="attr_classactionperceptionCURRENTROW" value="{{@{classactionnameCURRENTROW}=@{classactionoutputCURRENTROW}}}"/></div>
				<div class="sheet-col-1-9 sheet-center sheet-small-label">Performance<br/><input type="checkbox" name="attr_classactionperformanceCURRENTROW" value="{{@{classactionnameCURRENTROW}=@{classactionoutputCURRENTROW}}}"/></div>
				<div class="sheet-col-1-9 sheet-center sheet-small-label">Persuasion<br/><input type="checkbox" name="attr_classactionpersuasionCURRENTROW" value="{{@{classactionnameCURRENTROW}=@{classactionoutputCURRENTROW}}}"/></div>
				<div class="sheet-col-1-9 sheet-center sheet-small-label">Religion<br/><input type="checkbox" name="attr_classactionreligionCURRENTROW" value="{{@{classactionnameCURRENTROW}=@{classactionoutputCURRENTROW}}}"/></div>
				<div class="sheet-col-1-9 sheet-center sheet-small-label">Sleight of Hand<br/><input type="checkbox" name="attr_classactionsleightofhandCURRENTROW" value="{{@{classactionnameCURRENTROW}=@{classactionoutputCURRENTROW}}}"/></div>
				<div class="sheet-col-1-9 sheet-center sheet-small-label">Stealth<br/><input type="checkbox" name="attr_classactionstealthCURRENTROW" value="{{@{classactionnameCURRENTROW}=@{classactionoutputCURRENTROW}}}"/></div>
				<div class="sheet-col-1-9 sheet-center sheet-small-label">Survival<br/><input type="checkbox" name="attr_classactionsurvivalCURRENTROW" value="{{@{classactionnameCURRENTROW}=@{classactionoutputCURRENTROW}}}"/></div>
				
			</div>
			
			<hr>
			
			<div class="sheet-row">
				<div class="sheet-offset-1-7 sheet-col-1-3 sheet-small-label sheet-center sheet-border-right">Custom skills</div>
				<div class="sheet-col-1-3 sheet-small-label sheet-center ">Unskilled checks</div>
			</div>
			
			<div class="sheet-row">
			
				<div class="sheet-offset-1-7 sheet-col-1-12 sheet-center sheet-small-label">Custom 1<br/><input type="checkbox" name="attr_classactioncustom1skillCURRENTROW" value="{{@{classactionnameCURRENTROW}=@{classactionoutputCURRENTROW}}}"/></div>
				<div class="sheet-col-1-12 sheet-center sheet-small-label">Custom 2<br/><input type="checkbox" name="attr_classactioncustom2skillCURRENTROW" value="{{@{classactionnameCURRENTROW}=@{classactionoutputCURRENTROW}}}"/></div>
				<div class="sheet-col-1-12 sheet-center sheet-small-label">Custom 3<br/><input type="checkbox" name="attr_classactioncustom3skillCURRENTROW" value="{{@{classactionnameCURRENTROW}=@{classactionoutputCURRENTROW}}}"/></div>
				<div class="sheet-col-1-12 sheet-center sheet-small-label sheet-border-right">Custom 4<br/><input type="checkbox" name="attr_classactioncustom4skillCURRENTROW" value="{{@{classactionnameCURRENTROW}=@{classactionoutputCURRENTROW}}}"/></div>
				
				
				<div class="sheet-col-1-18 sheet-center sheet-small-label">STR<br/><input type="checkbox" name="attr_classactionunskilledstrCURRENTROW" value="{{@{classactionnameCURRENTROW}=@{classactionoutputCURRENTROW}}}"/></div>
				<div class="sheet-col-1-18 sheet-center sheet-small-label">DEX<br/><input type="checkbox" name="attr_classactionunskilleddexCURRENTROW" value="{{@{classactionnameCURRENTROW}=@{classactionoutputCURRENTROW}}}"/></div>
				<div class="sheet-col-1-18 sheet-center sheet-small-label">CON<br/><input type="checkbox" name="attr_classactionunskilledconCURRENTROW" value="{{@{classactionnameCURRENTROW}=@{classactionoutputCURRENTROW}}}"/></div>
				<div class="sheet-col-1-18 sheet-center sheet-small-label">INT<br/><input type="checkbox" name="attr_classactionunskilledintCURRENTROW" value="{{@{classactionnameCURRENTROW}=@{classactionoutputCURRENTROW}}}"/></div>
				<div class="sheet-col-1-18 sheet-center sheet-small-label">WIS<br/><input type="checkbox" name="attr_classactionunskilledwisCURRENTROW" value="{{@{classactionnameCURRENTROW}=@{classactionoutputCURRENTROW}}}"/></div>
				<div class="sheet-col-1-18 sheet-center sheet-small-label">CHA<br/><input type="checkbox" name="attr_classactionunskilledchaCURRENTROW" value="{{@{classactionnameCURRENTROW}=@{classactionoutputCURRENTROW}}}"/></div>
			
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
	
	$full_output .= $autocalcs[$key] . '" disabled="disabled">';
	
}

$full_output .=<<<END

		<!--  END Hidden attributes to power output to other rolls ->
END;



//echo $full_output;

$file = $full_output;
file_put_contents($filename, $file);




?>