<?php echo validation_errors('<div class="alert alert-danger" role="alert">', '</div>'); ?>

<?php 
$attributes = array('class' => 'form-horizontal', 'id' => 'packing-slip-form');
$hidden = array('slip_id' => $slips_item[0]->slip_id);
echo form_open('slips/edit/' . $slips_item[0]->slip_id, $attributes, $hidden); 
?>
	<div class="col-md-12" id="form">
	<div class="row">
		<div class="page-header">
				<h1>Edit Packing Slip</h1>
		</div>
		<h2>Ship To:</h2>
		<div class='col-md-6'>
			<div class='form-group'>
				<label for='presets' class='col-sm-3 control-label'>Presets</label>
				<div class='col-sm-9'>
					<select class='select-address form-control' id='select-address'> <!-- This select pulls the names of vendors from the db and uses them as options. On selecting an option the address fields are filled in via javascript at the end of this file -->
						<option value='none' selected='selected'>None</option>
						<?php
							$i = 0;
							foreach($vendors as $vendor) {
								echo "<option value='$i'>".$vendor['vendor_name']."</option>";
								$i = $i + 1;
							}
						?>
					</select>
				</div>
			</div>
			<div class='form-group'>
				<label for='slip_shipName' class='col-sm-3 control-label'>Name</label>
				<div class='col-sm-9'>
					<input name='slip_shipName' type='input' class='form-control' id='slip_shipName' placeholder='' value="<?php echo $slips_item[0]->slip_shipName; ?>">
				</div>
			</div>
			<div class='form-group'>
				<label for='device-name' class='col-sm-3 control-label'>Address</label>
				<div class='col-sm-9'>
					<input name='slip_shipAddress' type='input' class='form-control' id='slip_shipAddress' placeholder='' value="<?php echo $slips_item[0]->slip_shipAddress; ?>">
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class='form-group'>
				<label for='device-name' class='col-sm-3 control-label'>City</label>
				<div class='col-sm-9'>
					<input name='slip_shipCity' type='input' class='form-control' id='slip_shipCity' placeholder='' value="<?php echo $slips_item[0]->slip_shipCity; ?>">
				</div>
			</div>
			<div class='form-group'>
				<label for='device-name' class='col-sm-3 control-label'>State</label>
				<div class='col-sm-9'>
					<input name='slip_shipState' type='input' class='form-control' id='slip_shipState' placeholder='' value="<?php echo $slips_item[0]->slip_shipState; ?>">
				</div>
			</div>
			<div class='form-group'>
				<label for='device-name' class='col-sm-3 control-label'>Zip</label>
				<div class='col-sm-9'>
					<input name='slip_shipZip' type='input' class='form-control' id='slip_shipZip' placeholder='' value="<?php echo $slips_item[0]->slip_shipZip; ?>">
				</div>
			</div>
		</div>
	</div>
		<div class='row'>
		<h2>Other Information</h2>
		<div class='col-md-6'>
			<div class='form-group'>
				<label for='device-name' class='col-sm-3 control-label'>FedEx Tracking Number</label>
				<div class='col-sm-9'>
					<input name='slip_fedexTracking' type='input' class='form-control' id='slip_fedexTracking' placeholder='' value="<?php echo $slips_item[0]->slip_fedexTracking; ?>">
				</div>
			</div>
			<div class='form-group'>
				<label for='device-name' class='col-sm-3 control-label'>RMA Number</label>
				<div class='col-sm-9'>
					<input name='slip_rmaNumber' type='input' class='form-control' id='rmaNumber' placeholder='' value="<?php echo $slips_item[0]->slip_rmaNumber; ?>">
				</div>
			</div>
			<div class='form-group'>
				<label for='slip_comments' class='col-sm-3 control-label'>Additional Comments</label>
				<div class='col-sm-9'>
					<textarea name='slip_comments' type='textarea' class='form-control' id='slip_comments' rows='3' placeholder=''><?php echo $slips_item[0]->slip_comments; ?></textarea>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class='form-group'>
				<label for='slip_customerContact' class='col-sm-3 control-label'>Station Contact</label>
				<div class='col-sm-9'>
					<input name='slip_customerContact' type='input' class='form-control' id='slip_customerContact' placeholder='' value="<?php echo $slips_item[0]->slip_customerContact; ?>">
				</div>
			</div>
			<div class='form-group'>
				<label for='slip_customerPhone' class='col-sm-3 control-label'>Phone #</label>
				<div class='col-sm-9'>
					<input name='slip_customerPhone' type='input' class='form-control' id='slip_customerPhone' placeholder='' value="<?php echo $slips_item[0]->slip_customerPhone; ?>">
				</div>
			</div>
			<div class="form-group">
				<label for="description" class="col-sm-3 control-label">Packing Slip Description</label>
				<div class="col-sm-9">
					<input name='slip_description' type="input" class='form-control' id='slip_description' placeholder='' value="<?php echo $slips_item[0]->slip_description; ?>">
				</div>
			</div>
			<div class="form-group">
				<label for="status" class="col-sm-3 control-label">Status</label>
				<div class="col-sm-9">
					<?php 
					$status_options = array(
						'Created' => 'Created',
						'Shipped' => 'Shipped',
						'Arrived' => 'Arrived',
						'Being Returned' => 'Being Returned',
						'Complete' => 'Completed'
					);
					$status_classes = 'class="form-control"';
					$slip_status = $slips_item[0]->slip_status;
					echo form_dropdown('slip_status', $status_options, $slip_status, $status_classes);
					?>
				</div>
				
			</div>
	
		</div>

	
		</div> <!-- end row -->
		
<?php 
$i = 0;
foreach ($slips_item as $item) :

?>
<div class='row device' id='device_<?= ($i+1) ?>'>
	<h2>Device <?php echo ($i+1) ?><?php echo anchor('slips/delete_device/' . $item->item_id, 'Delete Device', array('onclick' => "return confirm('Are you sure you want to delete this Device?')", 'class' => 'btn btn-md btn-danger pull-right')) ?></h2>
	<input type="hidden" name="item_id[]" value="<?php echo $item->item_id; ?>" style="display:none;">
		<div class='col-md-6'>
			<div class='form-group'>
				<label for='item_assetTag' class='col-sm-3 control-label'>Asset Tag Number</label>
				<div class='col-sm-9'>
					<input name="item_assetTag[<?php echo $i; ?>]" type='input' class='form-control' id='item_assetTag' placeholder='' value="<?php echo $item->item_assetTag; ?>">
				</div>
			</div>
			<div class='form-group'>
				<label for='item_manufacturer' class='col-sm-3 control-label'>Manufacturer</label>
				<div class='col-sm-9'>
					<input name='item_manufacturer[<?php echo $i; ?>]' type='input' class='form-control' id='item_manufacturer' placeholder='' value="<?php echo $item->item_manufacturer; ?>">
				</div>
			</div>
			<div class='form-group'>
				<label for='item_deviceName' class='col-sm-3 control-label'>Device Name</label>
				<div class='col-sm-9'>
					<input name='item_deviceName[<?php echo $i; ?>]' type='input' class='form-control' id='item_deviceName' placeholder='' value="<?php echo $item->item_deviceName; ?>">
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class='form-group'>
				<label for='item_modelNumber' class='col-sm-3 control-label'>Model Number</label>
				<div class='col-sm-9'>
					<input name='item_modelNumber[<?php echo $i; ?>]' type='input' class='form-control' id='item_modelNumber' placeholder='' value="<?php echo $item->item_modelNumber; ?>">
				</div>
			</div>
			<div class='form-group'>
				<label for='item_serialNumber' class='col-sm-3 control-label'>Serial Number</label>
				<div class='col-sm-9'>
					<input name='item_serialNumber[<?php echo $i; ?>]' type='input' class='form-control' id='item_serialNumber' placeholder='' value="<?php echo $item->item_serialNumber; ?>">
				</div>
			</div>
			<div class='form-group'>
				<label for='item_quantity' class='col-sm-3 control-label'>Quantity</label>
				<div class='col-sm-9'>
					<input name='item_quantity[<?php echo $i; ?>]' type='input' class='form-control' id='item_quantity' placeholder='' value="<?php echo $item->item_quantity; ?>">
				</div>
			</div>
		</div>
	</div>

	<?php 

	$i++;
	endforeach;
	
	?>
</div> <!-- end col-md-12 -->
<div class="row">
	<div class="col-sm-12">
		<input id="form-btn" type='submit' name="submit" class='btn btn-primary btn-lg btn-block' value="Update Packing Slip">
	</div>	
</div>
</form>

<div id="returned"></div>

<script>
	var vendors = <?php echo json_encode($vendors) ?>; // Convert the vendors variable from php to javascript

	window.onload = function() {
        if(window.addEventListener) {
            document.getElementById('select-address').addEventListener('change', loadAddress, false);
        } else if (window.attachEvent){
            document.getElementById('select-address').attachEvent("onchange", loadXMLDoc);
        }

        function loadAddress(){ // When select change detected, use the vendors variable to fill in the address fields
        	var select = document.getElementById('select-address');
        	var val = select.options[select.selectedIndex].value;

        	var name = document.getElementById('slip_shipName');
        	var address = document.getElementById('slip_shipAddress');
        	var city = document.getElementById('slip_shipCity');
        	var state = document.getElementById('slip_shipState');
        	var zip = document.getElementById('slip_shipZip');

        	if(val == 'none'){ // Check if None preset selected
        		name.value = '';
        		address.value = '';
        		city.value = '';
        		state.value = '';
        		zip.value = '';

        		return;
        	}

          name.value = vendors[val]['vendor_name'];
          address.value = vendors[val]['vendor_address'];					
          city.value = vendors[val]['vendor_city'];
          state.value = vendors[val]['vendor_state'];
          zip.value = vendors[val]['vendor_zip'];
        }
    }    
</script>