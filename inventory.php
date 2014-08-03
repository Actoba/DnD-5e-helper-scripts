<?php
$filename = "inventory.html";
$start = 1;
$max = 40;

$file = file_get_contents($filename);

$wrapper_start = <<<END
			<!-- BEGIN new inventory page -->
			<div class="sheet-inventory-pagePAGENUMBER">
			
				<div class="sheet-row sheet-sub-header">	
					<div class="sheet-col-1-15 sheet-center sheet-small-label">Row #</div>
					<div class="sheet-col-1-15 sheet-center sheet-small-label">Qty</div>
					<div class="sheet-col-4-15 sheet-center sheet-small-label">Name</div>
					<div class="sheet-col-2-15 sheet-center sheet-small-label">Weight</div>
					<div class="sheet-col-7-15 sheet-center sheet-small-label">Descripton</div>
				</div>
				
END;

$wrapper_end = <<<END
			</div>
			<!-- END inventory page -->
END;

$inventory_rows = <<<'END'
	
	<!-- BEGIN inventory row -->
	<div class="sheet-inventory-rowCURRENTROW">
		
		<div class="sheet-row sheet-grey-row">
			<div class="sheet-col-1-15 sheet-vert-middle sheet-inventory-row-number">CURRENTROW</div>
			<div class="sheet-col-1-15"><input type="number" name="attr_inventoryqtyCURRENTROW" value="1" min="0" step="1"></div>
			<div class="sheet-col-4-15"><input type="text" name="attr_inventorynameCURRENTROW"></div>
			<div class="sheet-col-2-15"><input type="number" name="attr_inventoryweightCURRENTROW" value="0" step="0.01"></div>
			<div class="sheet-col-7-15"><input type="text" name="attr_inventorydescriptionCURRENTROW"></div>
		</div>
			
	</div>
			
	<!-- END inventory row -->

END;

$full_output = "";

for ($i=$start; $i<=$max; $i++)
{
	$return_text = "";
	
	if (($i%10==1 && $i<$max) || ($i%10==1 && $i==$max) )
	{
		//Add start of page wrapper
		$return_text .= $wrapper_start;
	}

	$return_text .= $inventory_rows;
	
	if (is_int($i/10) || $i==$max)
	{
		//Add end of page wrapper
		$return_text .= $wrapper_end;
	}
	
	// Replace placeholders with correct values
	$return_text = str_replace("CURRENTROW", $i, $return_text);
	$return_text = str_replace("PAGENUMBER", ceil($i/10), $return_text);

	
	$full_output .= $return_text;
	
}

//Now stitch together weight calc hidden field

$weight_calc = "";
for ($i=$start; $i<=$max; $i++)
{
	$weight_calc .= "@{inventoryweight$i} + (((@{inventoryqty$i} - 1) * @{inventoryweight$i}) * @{weight_unit_setting})";
	if ($i < $max) $weight_calc .= " + ";
}

$html_weight_calc = "<input type=\"hidden\" name=\"attr_inventory_weight_calc\" value=\"(" . $weight_calc . ")\" />";

$full_output .= $html_weight_calc;


//echo $full_output;

$file = $full_output;
file_put_contents($filename, $file);




?>