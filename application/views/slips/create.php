<?php echo validation_errors('<div class="alert alert-danger" role="alert">', '</div>'); ?>
<?php 
$attributes = array('class' => 'form-horizontal', 'id' => 'packing-slip-form');
echo form_open('slips/create', $attributes); 

?>
	<div class="well" id="asset-id-form">
		<h2>Import Wiki Data</h2>
		<p>Type in the Asset Id of the device and submit to return info from Wiki Database. Otherwise continue with the form below.</p>
		<div class="form-group">
			<label for="wiki-asset-id" class='col-sm-2 control-label'>Asset ID</label>
			<div class="col-sm-4">
				<input type="text" class="form-control" id="wiki-asset" value="" placeholder="927-######">			
			</div>
			<div class="col-sm-6">
				<button id="wiki-submit-btn" class="btn btn-primary btn-block">Import Wiki Data</button>
			</div>
		</div>
		
	</div>

	<div class='row'>
		<h2 class="center">Device</h2>
		<div class='col-md-6'>
			<div class='form-group'>
				<label for='assetTag' class='col-sm-4 control-label'>Asset Tag Number</label>
				<div class='col-sm-8'>
					<input name="slip_assetTag" type='input' class='form-control' id='slip_assetTag' placeholder='' value="<?php echo set_value('slip_assetTag', ''); ?>">
				</div>
			</div>
			<div class='form-group'>
				<label for='manufacturer' class='col-sm-4 control-label'>Manufacturer</label>
				<div class='col-sm-8'>
					<input name='slip_manufacturer' type='input' class='form-control' id='slip_manufacturer' placeholder='' value="<?php echo set_value('slip_manufacturer', ''); ?>">
				</div>
			</div>
			<div class='form-group'>
				<label for='deviceName' class='col-sm-4 control-label'>Device Name</label>
				<div class='col-sm-8'>
					<input name='slip_deviceName' type='input' class='form-control' id='slip_deviceName' placeholder='' value="<?php echo set_value('slip_deviceName', ''); ?>">
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class='form-group'>
				<label for='modelNumber' class='col-sm-4 control-label'>Model Number</label>
				<div class='col-sm-8'>
					<input name='slip_modelNumber' type='input' class='form-control' id='slip_modelNumber' placeholder='' value="<?php echo set_value('slip_modelNumber', ''); ?>">
				</div>
			</div>
			<div class='form-group'>
				<label for='serialNumber' class='col-sm-4 control-label'>Serial Number</label>
				<div class='col-sm-8'>
					<input name='slip_serialNumber' type='input' class='form-control' id='slip_serialNumber' placeholder='' value="<?php echo set_value('slip_serialNumber', ''); ?>">
				</div>
			</div>
			<div class='form-group'>
				<label for='slip_quantity' class='col-sm-4 control-label'>Quantity</label>
				<div class='col-sm-8'>
					<input name='slip_quantity' type='input' class='form-control' id='slip_quantity' placeholder='' value="<?php echo set_value('slip_quantity', ''); ?>">
				</div>
			</div>
		</div>
		<h2 class='center'>Ship To:</h2>
		<div class='col-md-6'>
			<div class='form-group'>
				<label for='presets' class='col-sm-4 control-label'>Presets</label>
				<div class='col-sm-8'>
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
				<label for='slip_shipName' class='col-sm-4 control-label'>Name</label>
				<div class='col-sm-8'>
					<input name='slip_shipName' type='input' class='form-control' id='slip_shipName' placeholder='' value="<?php echo set_value('slip_shipName', ''); ?>">
				</div>
			</div>
			<div class='form-group'>
				<label for='device-name' class='col-sm-4 control-label'>Address</label>
				<div class='col-sm-8'>
					<input name='slip_shipAddress' type='input' class='form-control' id='slip_shipAddress' placeholder='' value="<?php echo set_value('slip_shipAddress', ''); ?>">
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class='form-group'>
				<label for='device-name' class='col-sm-4 control-label'>City</label>
				<div class='col-sm-8'>
					<input name='slip_shipCity' type='input' class='form-control' id='slip_shipCity' placeholder='' value="<?php echo set_value('slip_shipCity', ''); ?>">
				</div>
			</div>
			<div class='form-group'>
				<label for='device-name' class='col-sm-4 control-label'>State</label>
				<div class='col-sm-8'>
					<input name='slip_shipState' type='input' class='form-control' id='slip_shipState' placeholder='' value="<?php echo set_value('slip_shipState', ''); ?>">
				</div>
			</div>
			<div class='form-group'>
				<label for='device-name' class='col-sm-4 control-label'>Zip</label>
				<div class='col-sm-8'>
					<input name='slip_shipZip' type='input' class='form-control' id='slip_shipZip' placeholder='' value="<?php echo set_value('slip_shipZip', ''); ?>">
				</div>
			</div>
		</div>
	</div>
	<div class='row'>
		<h2 class='center'>Other Information</h2>
		<div class='col-md-6'>
			<div class='form-group'>
				<label for='device-name' class='col-sm-4 control-label'>FedEx Tracking Number</label>
				<div class='col-sm-8'>
					<input name='slip_fedexTracking' type='input' class='form-control' id='slip_fedexTracking' placeholder='' value="<?php echo set_value('slip_fedexTracking', ''); ?>">
				</div>
			</div>
			<div class='form-group'>
				<label for='device-name' class='col-sm-4 control-label'>RMA Number</label>
				<div class='col-sm-8'>
					<input name='slip_rmaNumber' type='input' class='form-control' id='rmaNumber' placeholder='' value="<?php echo set_value('slip_rmaNumber', ''); ?>">
				</div>
			</div>
			<div class='form-group'>
				<label for='slip_comments' class='col-sm-4 control-label'>Additional Comments</label>
				<div class='col-sm-8'>
					<textarea name='slip_comments' type='textarea' class='form-control' id='slip_comments' rows='3' placeholder=''><?php echo set_value('slip_comments', ''); ?></textarea>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class='form-group'>
				<label for='slip_customerContact' class='col-sm-4 control-label'>Customer Contact</label>
				<div class='col-sm-8'>
					<input name='slip_customerContact' type='input' class='form-control' id='slip_customerContact' placeholder='' value="<?php echo set_value('slip_customerContact', ''); ?>">
				</div>
			</div>
			<div class='form-group'>
				<label for='slip_customerPhone' class='col-sm-4 control-label'>Customer Phone #</label>
				<div class='col-sm-8'>
					<input name='slip_customerPhone' type='input' class='form-control' id='slip_customerPhone' placeholder='' value="<?php echo set_value('slip_customerPhone', ''); ?>">
				</div>
			</div>
			<div class="form-group">
				<label for="description" class="col-sm-4 control-label">Packing Slip Description</label>
				<div class="col-sm-8">
					<input name='slip_description' type="input" class='form-control' id='slip_description' placeholder='' value="<?php echo set_value('slip_description', ''); ?>">
				</div>
			</div>
			<div class="form-group">
				<label for="status" class="col-sm-4 control-label">Status</label>
				<div class="col-sm-8">
					<?php 
					$status_options = array(
						'Created' => 'Created',
						'Shipped' => 'Shipped',
						'Arrived' => 'Arrived',
						'Being Returned' => 'Being Returned',
						'Complete' => 'Completed'
					);
					$status_classes = 'class="form-control"';
					echo form_dropdown('slip_status', $status_options, set_value('slip_status'), $status_classes);
					?>
				</div>
				
			</div>
		</div>
	</div>
	<input id="form-btn" type='submit' name="submit" class='btn btn-primary btn-lg btn-block' value="Create New Packing Slip">
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