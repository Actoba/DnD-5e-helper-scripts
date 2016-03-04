<?php
$filename = "weapons.html";
$start = 1;
$max = 6;

$file = file_get_contents($filename);

$melee_header = <<<'END'
		<h4 class="sheet-center">Melee Weapons <span class="sheet-pictos">D</span></h4>
		<div class="sheet-row sheet-sub-header">
			<div class="sheet-col-1-24 sheet-center sheet-small-label sheet-vert-bottom">Prof?</div>
			<div class="sheet-col-1-6 sheet-center sheet-small-label sheet-vert-bottom">Weapon</div>
			<div class="sheet-col-1-12 sheet-center sheet-small-label sheet-vert-bottom">Attack<br>Stat</div>
			<div class="sheet-col-1-12 sheet-center sheet-small-label sheet-vert-bottom sheet-padr">Magic Bonus</div>
			<div class="sheet-col-1-24 sheet-center sheet-small-label sheet-vert-bottom sheet-padr">To<br/>Hit</div>
			<div class="sheet-col-1-12 sheet-center sheet-small-label sheet-vert-bottom">Damage Dice</div>
			<div class="sheet-col-1-24 sheet-center sheet-small-label sheet-vert-bottom">+ stat?</div>
			<div class="sheet-col-1-18 sheet-center sheet-small-label sheet-vert-bottom">Dmg<br/>Bonus</div>
			<div class="sheet-col-1-8 sheet-center sheet-small-label sheet-vert-bottom sheet-padr">Damage Type</div>
			<div class="sheet-col-1-12 sheet-center sheet-small-label sheet-vert-bottom">Crit Dmg</div>
			<div class="sheet-col-1-12 sheet-center sheet-small-label sheet-vert-bottom sheet-padr">Crit on a</div>
			<div class="sheet-col-1-18 sheet-center sheet-small-label sheet-vert-bottom">Attack</div>
			<div class="sheet-col-1-18 sheet-center sheet-small-label sheet-vert-bottom">&nbsp;</div>
		</div>
END;

$melee_rows = <<<'END'
	<!-- BEGIN melee weapon row -->
	<div class="sheet-row">
		<div class="sheet-col-1-24 sheet-checkbox-row"><input type="checkbox" value="@{PB}" name="attr_pbmeleeCURRENTROW" checked="checked"></div>
		<div class="sheet-col-1-6"><input type="text" name="attr_meleeweaponnameCURRENTROW"></div>
		<div class="sheet-col-1-12">
			<select name="attr_meleeattackstatCURRENTROW">
				<option value="@{strength_mod}" selected="selected">STR</option>
				<option value="@{finesse_mod}">Finesse</option>
				<option value="@{dexterity_mod}">DEX</option>
				<option value="@{constitution_mod}">CON</option>
				<option value="@{intelligence_mod}">INT</option>
				<option value="@{wisdom_mod}">WIS</option>
				<option value="@{charisma_mod}">CHA</option>
			</select>
		</div>
		<div class="sheet-col-1-12 sheet-padr" title="The magic bonus will be added as a bonus to BOTH the attack and damage rolls"><input type="number" name="attr_meleemagicCURRENTROW" value="0" step="1"></div>
		<div class="sheet-col-1-24 sheet-padr"><input type="number" name="attr_meleetohitCURRENTROW" value="@{meleeattackstatCURRENTROW} + @{pbmeleeCURRENTROW} + @{meleemagicCURRENTROW}" disabled="disabled"></div>
		<div class="sheet-col-1-12" title="Only enter the base damage roll here without any bonuses from stats or other sources"><input class="sheet-center" type="text" name="attr_meleedmgCURRENTROW" value="0"></div>
		<div class="sheet-col-1-24 sheet-checkbox-row"><input type="checkbox" value="1" name="attr_meleeattackstatdmgCURRENTROW" checked="checked"></div>
		<div class="sheet-col-1-18"><input type="number" name="attr_meleedmgbonusCURRENTROW" value="(@{meleeattackstatCURRENTROW} * @{meleeattackstatdmgCURRENTROW}) + @{meleemagicCURRENTROW}" disabled="disabled"></div>
		<div class="sheet-col-1-8 sheet-padr"><input type="text" name="attr_meleedmgtypeCURRENTROW"></div>
		<div class="sheet-col-1-12"><input class="sheet-center" type="text"  value="0" name="attr_meleecritdmgCURRENTROW"></div>
		<div class="sheet-col-1-12 sheet-padr"><input type="number" name="attr_meleeweaponcritrangeCURRENTROW" value="20" step="1"></div>
		<div class="sheet-col-1-18 sheet-center"><button type="roll" class="sheet-roll" name="roll_MeleeAttackCURRENTROW" value="&{template:5eDefault} {{character_name=@{character_name}}} {{title=@{meleeweaponnameCURRENTROW}}} {{subheader=@{character_name}}} {{subheaderright=Melee attack}}  {{weapon=1}} {{simple=1}} {{rollname=Attack}} {{roll1=[[ 1d20cs>@{meleeweaponcritrangeCURRENTROW} + [[@{meleetohitCURRENTROW}]] + [[@{global_melee_attack_bonus}]] ]]}} {{weapondamage=[[@{meleedmgCURRENTROW} + [[@{meleedmgbonusCURRENTROW}]] + [[(@{global_melee_damage_bonus})]] ]] @{meleedmgtypeCURRENTROW}}} {{weaponcritdamage=Additional [[@{meleecritdmgCURRENTROW}]] damage}} @{classactionmeleeweapon}} @{ro_meleeCURRENTROW} @{classactionmeleeweapon}" >Attack</button></div>
		<div class="sheet-col-1-18 sheet-align-center">
			<input type="checkbox" name="attr_meleeCURRENTROW_ro" class="sheet-ro-checkbox" value="1" /><span class="sheet-ro-label">y</span>
			
			<!-- Modal template Should be placed as the first element immediately after the input checkbox to open it -->
			<div class="sheet-ro-modal sheet-weapon-modal">
				
				<div>							
					<!-- Modal Title and close button row -->
					<div class="sheet-row sheet-ro-header sheet-border-bottom sheet-padb">
						<div class="sheet-col-3-4 sheet-ro-title">Melee weapon roll options</div>
						<div class="sheet-col-1-4 sheet-ro-close-wrapper">
							<input type="checkbox" name="attr_meleeCURRENTROW_ro" class="sheet-ro-close-checkbox" value="1" />
							<span class="sheet-ro-close-label"></span>
						</div>
					</div>
					
					<!-- define hidden attribute to store summary of all options selected -->
					<input type="hidden" name="attr_ro_meleeCURRENTROW" value="@{ro_meleeCURRENTROW_rolltype}@{ro_meleeCURRENTROW_roll2_closing} @{ro_meleeCURRENTROW_emoteprompt} @{ro_meleeCURRENTROW_showmath}" />
					
					<!--Help text and copy of roll button-->
					<div class="sheet-row sheet-padb">
						<div class="sheet-col-2-3 sheet-small-note">The settings here apply <b>only</b> to the roll specified in the title above.  </div>
						<div class="sheet-col-1-3 sheet-padl"><button type="roll" class="sheet-roll" name="roll_MeleeAttackCURRENTROW_ro" value="&{template:5eDefault} {{character_name=@{character_name}}} {{title=@{meleeweaponnameCURRENTROW}}} {{subheader=@{character_name}}} {{subheaderright=Melee attack}}  {{weapon=1}} {{simple=1}} {{rollname=Attack}} {{roll1=[[ 1d20cs>@{meleeweaponcritrangeCURRENTROW} + [[@{meleetohitCURRENTROW}]] + [[@{global_melee_attack_bonus}]] ]]}} {{weapondamage=[[@{meleedmgCURRENTROW} + [[@{meleedmgbonusCURRENTROW}]] + [[(@{global_melee_damage_bonus})]] ]] @{meleedmgtypeCURRENTROW}}} {{weaponcritdamage=Additional [[@{meleecritdmgCURRENTROW}]] damage}} @{classactionmeleeweapon}} @{ro_meleeCURRENTROW} @{classactionmeleeweapon}">Roll</button></div>
					</div>
					
					<hr/>
					
					<!-- Define options here -->
					

					<div class="sheet-row sheet-checkbox-row">
						<div class="sheet-col-1-3 sheet-ro-optionlabel">Roll type</div>
						<div class="sheet-col-2-3 sheet-padl sheet-ro-option">
							<input type="hidden" name="attr_ro_meleeCURRENTROW_roll2_closing" value="cs>@{meleeweaponcritrangeCURRENTROW} + [[@{meleetohitCURRENTROW}]] + [[@{global_melee_attack_bonus}]] ]] }}" />
							 <select name="attr_ro_meleeCURRENTROW_rolltype">
								<option value="{{showadvroll=1}} {{roll2=[[ 1d20">Roll 2d20</option>
								<option value="{{noadvroll=1}}">Roll 1d20</option>
								<option value="?{Roll type?|Normal,&#123&#123noadvroll=1&#125&#125 |Advantage,&#123&#123rollhasadv=1&#125&#125 &#123&#123roll2=[[1d20|Disadvantage,&#123&#123rollhasdisadv=1&#125&#125 &#123&#123roll2=[[1d20}">Prompt for adv/disadv</option>
								<option value="{{rollhasadv=1}} {{roll2=[[ 1d20">ALWAYS Advantage</option>
								<option value="{{rollhasdisadv=1}} {{roll2=[[ 1d20">ALWAYS Disadvantage</option>
							</select>
						</div>
					</div>
					
					<hr/>
					
					<div class="sheet-row sheet-checkbox-row">
						<div class="sheet-col-1-3 sheet-ro-optionlabel">Prompt for emote?</div>
						<div class="sheet-col-2-3 sheet-padl sheet-ro-option"><input type="checkbox" name="attr_ro_meleeCURRENTROW_emoteprompt" value="{{emote=?{Emote text} }}"></div>
					</div>
					
					<hr/>
					
					<div class="sheet-row sheet-checkbox-row">
						<div class="sheet-col-1-3 sheet-ro-optionlabel">Show math?</div>
						<div class="sheet-col-2-3 sheet-padl sheet-ro-option"><input type="checkbox" name="attr_ro_meleeCURRENTROW_showmath" value="{{math=Attack: 
						1d20
						+ [[@{meleetohitCURRENTROW}]] [To Hit mod]
						+ (@{global_melee_attack_bonus}) [Global melee attack bonus]
						Damage: 
						@{meleedmgCURRENTROW} [Damage dice] + 
						[[@{meleedmgbonusCURRENTROW}]] [Damage bonus] +
						((@{global_melee_damage_bonus})) [Global melee damage bonus] }}"></div>
					</div>
					

					
					
				</div> <!-- close inner modal div -->
			</div> <!-- close outer modal div -->
			
			
		</div>
	</div>
	<!-- END melee weapon row -->

END;

$ranged_header = <<<'END'
		<h4 class="sheet-center">Ranged Weapons <span class="sheet-pictos">e</span></h4>
		<div class="sheet-row sheet-sub-header">			
			<div class="sheet-col-1-24 sheet-center sheet-small-label sheet-vert-bottom">Prof?</div>
			<div class="sheet-col-1-18 sheet-center sheet-small-label sheet-vert-bottom">Ammo</div>
			<div class="sheet-col-1-6 sheet-center sheet-small-label sheet-vert-bottom">Weapon</div>
			<div class="sheet-col-1-12 sheet-center sheet-small-label sheet-vert-bottom">Attack<br>Stat</div>
			<div class="sheet-col-1-12 sheet-center sheet-small-label sheet-vert-bottom sheet-padr">Magic Bonus</div>
			<div class="sheet-col-1-24 sheet-center sheet-small-label sheet-vert-bottom sheet-padr">To<br/>Hit</div>
			<div class="sheet-col-1-12 sheet-center sheet-small-label sheet-vert-bottom">Damage Dice</div>
			<div class="sheet-col-1-24 sheet-center sheet-small-label sheet-vert-bottom">Dmg<br/>Bonus</div>
			<div class="sheet-col-1-8 sheet-center sheet-small-label sheet-vert-bottom sheet-padr">Damage Type</div>
			<div class="sheet-col-1-12 sheet-center sheet-small-label sheet-vert-bottom">Crit Dmg</div>
			<div class="sheet-col-1-12 sheet-center sheet-small-label sheet-vert-bottom sheet-padr">Crit on a</div>
			<div class="sheet-col-1-18 sheet-center sheet-small-label sheet-vert-bottom">Attack</div>
			<div class="sheet-col-1-18 sheet-center sheet-small-label sheet-vert-bottom">&nbsp;</div>
		</div>
		
				
END;

$ranged_rows = <<<'END'
	<!-- BEGIN ranged weapon row -->
	<div class="sheet-row">
		<div class="sheet-col-1-24 sheet-checkbox-row"><input type="checkbox" value="@{PB}" name="attr_pbrangedCURRENTROW" checked="checked"></div>
		<div class="sheet-col-1-18"><input type="number" name="attr_rangedammoCURRENTROW" value="1"></div>
		<div class="sheet-col-1-6"><input type="text" name="attr_rangedweaponnameCURRENTROW"></div>
		<div class="sheet-col-1-12" title="Choose either normal or thrown">
			<select name="attr_rangedtypeCURRENTROW">
				<option value="@{dexterity_mod}" selected="selected">DEX</option>
				<option value="@{strength_mod}">STR</option>
				<option value="@{finesse_mod}">Finesse</option>
				<option value="@{constitution_mod}">CON</option>
				<option value="@{intelligence_mod}">INT</option>
				<option value="@{wisdom_mod}">WIS</option>
				<option value="@{charisma_mod}">CHA</option>
			</select>
		</div>
		<div class="sheet-col-1-12 sheet-padr" title="The magic bonus will be added as a bonus to BOTH the attack and damage rolls"><input type="number" name="attr_rangedmagicCURRENTROW" value="0" step="1"></div>
		<div class="sheet-col-1-24 sheet-padr"><input type="number" name="attr_rangedtohitCURRENTROW" value="@{rangedtypeCURRENTROW} + @{pbrangedCURRENTROW} + @{rangedmagicCURRENTROW}" disabled="disabled"></div>
		<div class="sheet-col-1-12" title="Only enter the base damage roll here without any bonuses from stats or other sources"><input class="sheet-center" type="text" name="attr_rangeddmgCURRENTROW" value="0"></div>		
		<div class="sheet-col-1-24"><input type="number" name="attr_rangeddmgbonusCURRENTROW" value="@{rangedtypeCURRENTROW} + @{rangedmagicCURRENTROW}" disabled="disabled"></div>
		<div class="sheet-col-1-8 sheet-padr"><input type="text" name="attr_rangeddmgtypeCURRENTROW"></div>
		<div class="sheet-col-1-12"><input class="sheet-center" type="text" value="0" name="attr_rangedcritdmgCURRENTROW"></div>
		<div class="sheet-col-1-12 sheet-padr"><input class="sheet-center" type="number" name="attr_rangedweaponcritrangeCURRENTROW" value="20" step="1"></div>
	
		<div class="sheet-col-1-18 sheet-center"><button type="roll" class="sheet-roll" name="roll_RangedAttackCURRENTROW" value="&{template:5eDefault} {{character_name=@{character_name}}} {{title=@{rangedweaponnameCURRENTROW}}} {{subheader=@{character_name}}} {{subheaderright=Ranged attack}}  {{weapon=1}} {{simple=1}} {{rollname=Attack}} {{roll1=[[ 1d20cs>@{rangedweaponcritrangeCURRENTROW} + [[@{rangedtohitCURRENTROW}]] + [[@{global_ranged_attack_bonus}]] ]]}} {{weapondamage=[[@{rangeddmgCURRENTROW} + [[@{rangeddmgbonusCURRENTROW}]] + [[(@{global_ranged_damage_bonus})]] ]] @{rangeddmgtypeCURRENTROW}}} {{weaponcritdamage=Additional [[@{rangedcritdmgCURRENTROW}]] damage}} @{classactionrangedweapon}} @{ro_rangedCURRENTROW} @{classactionrangedweapon}" >Attack</button></div>
		<div class="sheet-col-1-18 sheet-align-center">
			<input type="checkbox" name="attr_rangedCURRENTROW_ro" class="sheet-ro-checkbox" value="1" /><span class="sheet-ro-label">y</span>
			
			<!-- Modal template Should be placed as the first element immediately after the input checkbox to open it -->
			<div class="sheet-ro-modal sheet-weapon-modal">
				
				<div>							
					<!-- Modal Title and close button row -->
					<div class="sheet-row sheet-ro-header sheet-border-bottom sheet-padb">
						<div class="sheet-col-3-4 sheet-ro-title">Ranged weapon roll options</div>
						<div class="sheet-col-1-4 sheet-ro-close-wrapper">
							<input type="checkbox" name="attr_rangedCURRENTROW_ro" class="sheet-ro-close-checkbox" value="1" />
							<span class="sheet-ro-close-label"></span>
						</div>
					</div>
					
					<!-- define hidden attribute to store summary of all options selected -->
					<input type="hidden" name="attr_ro_rangedCURRENTROW" value="@{ro_rangedCURRENTROW_rolltype}@{ro_rangedCURRENTROW_roll2_closing} @{ro_rangedCURRENTROW_emoteprompt} @{ro_rangedCURRENTROW_showmath}" />
					
					<!--Help text and copy of roll button-->
					<div class="sheet-row sheet-padb">
						<div class="sheet-col-2-3 sheet-small-note">The settings here apply <b>only</b> to the roll specified in the title above.  </div>
						<div class="sheet-col-1-3 sheet-padl"><button type="roll" class="sheet-roll" name="roll_rangedAttackCURRENTROW_ro" value="&{template:5eDefault} {{character_name=@{character_name}}} {{title=@{rangedweaponnameCURRENTROW}}} {{subheader=@{character_name}}} {{subheaderright=Ranged attack}}  {{weapon=1}} {{simple=1}} {{rollname=Attack}} {{roll1=[[ 1d20cs>@{rangedweaponcritrangeCURRENTROW} + [[@{rangedtohitCURRENTROW}]] + [[@{global_ranged_attack_bonus}]] ]]}} {{weapondamage=[[@{rangeddmgCURRENTROW} + [[@{rangeddmgbonusCURRENTROW}]] + [[(@{global_ranged_damage_bonus})]] ]] @{rangeddmgtypeCURRENTROW}}} {{weaponcritdamage=Additional [[@{rangedcritdmgCURRENTROW}]] damage}} @{classactionrangedweapon}} @{ro_rangedCURRENTROW} @{classactionrangedweapon}">Roll</button></div>
					</div>
					
					<hr/>
					
					<!-- Define options here -->
					

					<div class="sheet-row sheet-checkbox-row">
						<div class="sheet-col-1-3 sheet-ro-optionlabel">Roll type</div>
						<div class="sheet-col-2-3 sheet-padl sheet-ro-option">
							<input type="hidden" name="attr_ro_rangedCURRENTROW_roll2_closing" value="cs>@{rangedweaponcritrangeCURRENTROW} + [[@{rangedtohitCURRENTROW}]] + [[@{global_ranged_attack_bonus}]] ]] }}" />
							 <select name="attr_ro_rangedCURRENTROW_rolltype">
								<option value="{{showadvroll=1}} {{roll2=[[ 1d20">Roll 2d20</option>
								<option value="{{noadvroll=1}}">Roll 1d20</option>
								<option value="?{Roll type?|Normal,&#123&#123noadvroll=1&#125&#125 |Advantage,&#123&#123rollhasadv=1&#125&#125 &#123&#123roll2=[[1d20|Disadvantage,&#123&#123rollhasdisadv=1&#125&#125 &#123&#123roll2=[[1d20}">Prompt for adv/disadv</option>
								<option value="{{rollhasadv=1}} {{roll2=[[ 1d20">ALWAYS Advantage</option>
								<option value="{{rollhasdisadv=1}} {{roll2=[[ 1d20">ALWAYS Disadvantage</option>
							</select>
						</div>
					</div>
					
					<hr/>
					
					<div class="sheet-row sheet-checkbox-row">
						<div class="sheet-col-1-3 sheet-ro-optionlabel">Prompt for emote?</div>
						<div class="sheet-col-2-3 sheet-padl sheet-ro-option"><input type="checkbox" name="attr_ro_rangedCURRENTROW_emoteprompt" value="{{emote=?{Emote text} }}"></div>
					</div>
					
					<hr/>
					
					<div class="sheet-row sheet-checkbox-row">
						<div class="sheet-col-1-3 sheet-ro-optionlabel">Show math?</div>
						<div class="sheet-col-2-3 sheet-padl sheet-ro-option"><input type="checkbox" name="attr_ro_rangedCURRENTROW_showmath" value="{{math=Attack: 
						1d20
						+ [[@{rangedtohitCURRENTROW}]] [To Hit mod]
						+ (@{global_ranged_attack_bonus}) [Global ranged attack bonus]
						Damage: 
						@{rangeddmgCURRENTROW} [Damage dice] + 
						[[@{rangeddmgbonusCURRENTROW}]] [Damage bonus] +
						((@{global_ranged_damage_bonus})) [Global ranged damage bonus] }}"></div>
					</div>
					

					
					
				</div> <!-- close inner modal div -->
			</div> <!-- close outer modal div -->
			
			
		</div>
	</div>
	<!-- END ranged weapon row -->

END;


$wrapper_end = <<<END
		<hr/>
END;

$full_output = "";

//Melee loop
for ($i=$start; $i<=$max; $i++)
{
	$return_text = "";
	
	if (($i==1) )
	{
		//Add start of section wrapper
		$return_text .= $melee_header;
	}

	$return_text .= $melee_rows;
		
	// Replace placeholders with correct values
	$return_text = str_replace("CURRENTROW", $i, $return_text);
	$return_text = str_replace("PAGENUMBER", ceil($i/5), $return_text);
	
	$full_output .= $return_text;
	
}

//Ranged loop
for ($i=$start; $i<=$max; $i++)
{
	$return_text = "";
	
	if (($i==1) )
	{
		//Add start of section wrapper
		$return_text .= $ranged_header;
	}

	$return_text .= $ranged_rows;
		
	// Replace placeholders with correct values
	$return_text = str_replace("CURRENTROW", $i, $return_text);
	$return_text = str_replace("PAGENUMBER", ceil($i/5), $return_text);
	
	$full_output .= $return_text;
	
}

$full_output .= $wrapper_end;

//echo $full_output;

$file = $full_output;
file_put_contents($filename, $file);


?>