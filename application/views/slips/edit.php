<?php echo validation_errors('<div class="alert alert-danger" role="alert">', '</div>'); ?>

<?php 
$attributes = array('class' => 'form-horizontal', 'id' => 'packing-slip-form');
$hidden = array('slip_id' => $slips_item['slip_id']);
echo form_open('slips/edit', $attributes, $hidden); 
// echo $data['slips_item']['slip_assetTag'];

?>

	<div class='row'>
		<div class='col-md-6'>
			<h2 class='center'>Device</h2>
			<div class='form-group'>
				<label for='assetTag' class='col-sm-3 control-label'>Asset Tag Number</label>
				<div class='col-sm-9'>
					<input name="slip_assetTag" type='input' class='form-control' id='slip_assetTag' placeholder='' value="<?php echo set_value('slip_assetTag', $slips_item['slip_assetTag']); ?>">
				</div>
			</div>
			<div class='form-group'>
				<label for='manufacturer' class='col-sm-3 control-label'>Manufacturer</label>
				<div class='col-sm-9'>
					<input name='slip_manufacturer' type='input' class='form-control' id='slip_manufacturer' placeholder='' value="<?php echo set_value('slip_manufacturer', $slips_item['slip_manufacturer']); ?>">
				</div>
			</div>
			<div class='form-group'>
				<label for='deviceName' class='col-sm-3 control-label'>Device Name</label>
				<div class='col-sm-9'>
					<input name='slip_deviceName' type='input' class='form-control' id='slip_deviceName' placeholder='' value="<?php echo set_value('slip_deviceName', $slips_item['slip_deviceName']); ?>">
				</div>
			</div>
			<div class='form-group'>
				<label for='modelNumber' class='col-sm-3 control-label'>Model Number</label>
				<div class='col-sm-9'>
					<input name='slip_modelNumber' type='input' class='form-control' id='slip_modelNumber' placeholder='' value="<?php echo set_value('slip_modelNumber', $slips_item['slip_modelNumber']); ?>">
				</div>
			</div>
			<div class='form-group'>
				<label for='serialNumber' class='col-sm-3 control-label'>Serial Number</label>
				<div class='col-sm-9'>
					<input name='slip_serialNumber' type='input' class='form-control' id='slip_serialNumber' placeholder='' value="<?php echo set_value('slip_serialNumber', $slips_item['slip_serialNumber']); ?>">
				</div>
			</div>
			<div class='form-group'>
				<label for='slip_quantity' class='col-sm-3 control-label'>Quantity</label>
				<div class='col-sm-9'>
					<input name='slip_quantity' type='input' class='form-control' id='slip_quantity' placeholder='' value="<?php echo set_value('slip_quantity', $slips_item['slip_quantity']); ?>">
				</div>
			</div>
		</div>
		<div class='col-md-6'>
			<h2 class='center'>Ship To:</h2>
			<div class='form-group'>
				<label for='presets' class='col-sm-3 control-label'>Presets</label>
				<div class='col-sm-9'>
					<select class='select-address form-control' id='presets'>
						<option value='none' selected='selected'>None</option>
						<option value='viz'>Vizlink</option>
						<option value='troll'>Troll</option>
						<option value="sony-la">Sony LA</option>
					</select>
				</div>
			</div>
			<div class='form-group'>
				<label for='slip_shipName' class='col-sm-3 control-label'>Name</label>
				<div class='col-sm-9'>
					<input name="slip_shipName" type='input' class='form-control' id='slip_shipName' placeholder='' value="<?php echo set_value('slip_shipName', $slips_item['slip_shipName']); ?>">
				</div>
			</div>
			<div class='form-group'>
				<label for='device-name' class='col-sm-3 control-label'>Address</label>
				<div class='col-sm-9'>
					<input name='slip_shipAddress' type='input' class='form-control' id='slip_shipAddress' placeholder='' value="<?php echo set_value('slip_shipAddress', $slips_item['slip_shipAddress']); ?>">
				</div>
			</div>
			<div class='form-group'>
				<label for='device-name' class='col-sm-3 control-label'>City</label>
				<div class='col-sm-9'>
					<input name='slip_shipCity' type='input' class='form-control' id='slip_shipCity' placeholder='' value="<?php echo set_value('slip_shipCity', $slips_item['slip_shipCity']); ?>">
				</div>
			</div>
			<div class='form-group'>
				<label for='device-name' class='col-sm-3 control-label'>State</label>
				<div class='col-sm-9'>
					<input name='slip_shipState' type='input' class='form-control' id='slip_shipState' placeholder='' value="<?php echo set_value('slip_shipState', $slips_item['slip_shipState']); ?>">
				</div>
			</div>
			<div class='form-group'>
				<label for='device-name' class='col-sm-3 control-label'>Zip</label>
				<div class='col-sm-9'>
					<input name='slip_shipZip' type='input' class='form-control' id='slip_shipZip' placeholder='' value="<?php echo set_value('slip_shipZip', $slips_item['slip_shipZip']); ?>">
				</div>
			</div>
		</div>
	</div>
	<div class='row'>
		<h2 class='center'>Other Information</h2>
		<div class='col-md-6'>
			<div class='form-group'>
				<label for='device-name' class='col-sm-3 control-label'>FedEx Tracking Number</label>
				<div class='col-sm-9'>
					<input name='slip_fedexTracking' type='input' class='form-control' id='slip_fedexTracking' placeholder='' value="<?php echo set_value('slip_fedexTracking', $slips_item['slip_fedexTracking']); ?>">
				</div>
			</div>
			<div class='form-group'>
				<label for='device-name' class='col-sm-3 control-label'>RMA Number</label>
				<div class='col-sm-9'>
					<input name='slip_rmaNumber' type='input' class='form-control' id='rmaNumber' placeholder='' value="<?php echo set_value('slip_rmaNumber', $slips_item['slip_rmaNumber']); ?>">
				</div>
			</div>
			<div class='form-group'>
				<label for='device-name' class='col-sm-3 control-label'>Additional Comments</label>
				<div class='col-sm-9'>
					<textarea name='slip_comments' type='textarea' class='form-control' id='slip_comments' rows='3' placeholder=''><?php echo set_value('slip_comments', $slips_item['slip_comments']); ?></textarea>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class='form-group'>
				<label for='slip_customerContact' class='col-sm-3 control-label'>Customer Contact</label>
				<div class='col-sm-9'>
					<input name='slip_customerContact' type='input' class='form-control' id='slip_customerContact' placeholder='' value="<?php echo set_value('slip_customerContact', $slips_item['slip_customerContact']); ?>">
				</div>
			</div>
			<div class='form-group'>
				<label for='slip_customerPhone' class='col-sm-3 control-label'>Customer Phone #</label>
				<div class='col-sm-9'>
					<input name='slip_customerPhone' type='input' class='form-control' id='slip_customerPhone' placeholder='' value="<?php echo set_value('slip_customerPhone', $slips_item['slip_customerPhone']); ?>">
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
					$status_select = set_value('slip_status', $slips_item['slip_status']); 
					echo form_dropdown('slip_status', $status_options, $status_select, $status_classes);
					?>
				</div>
			</div>
		</div>
	</div>
	<input id="form-btn" type='submit' name="submit" class='btn btn-primary btn-lg btn-block' value="Update Packing Slip">
</form>
<div id="returned"></div>