<?php echo validation_errors('<div class="alert alert-danger" role="alert">', '</div>'); ?>

<?php 
$attributes = array('class' => 'form-horizontal', 'id' => 'vendors-form');
$hidden = array('vendor_id' => $vendors_item['vendor_id']);
echo form_open('vendors/edit', $attributes, $hidden); 
// echo $data['slips_item']['slip_assetTag'];

?>

<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<h2>Edit a Vendor Preset</h2>
		<div class="form-group">
			<label for="vendor_name" type="input" class="col-sm-3 control-label">Vendor Name</label>
			<div class="col-sm-9">
				<input type="input" name="vendor_name" class="form-control" id="vendor_name" placeholder="" value="<?php echo set_value('vendor_name', $vendors_item['vendor_name']); ?>">
			</div> 
		</div>
		<div class="form-group">
			<label for="vendor_address" type="input" class="col-sm-3 control-label">Vendor Address</label>
			<div class="col-sm-9">
				<input type="input" name="vendor_address" class="form-control" id="vendor_address" placeholder="" value="<?php echo set_value('vendor_address', $vendors_item['vendor_address']); ?>">
			</div> 
		</div>
		<div class="form-group">
			<label for="vendor_city" type="input" class="col-sm-3 control-label">Vendor City</label>
			<div class="col-sm-9">
				<input type="input" name="vendor_city" class="form-control" id="vendor_city" placeholder="" value="<?php echo set_value('vendor_city', $vendors_item['vendor_city']); ?>">
			</div> 
		</div>
		<div class="form-group">
			<label for="vendor_state" type="input" class="col-sm-3 control-label">Vendor State</label>
			<div class="col-sm-9">
				<input type="input" name="vendor_state" class="form-control" id="vendor_state" placeholder="" value="<?php echo set_value('vendor_state', $vendors_item['vendor_state']); ?>">
			</div> 
		</div>
		<div class="form-group">
			<label for="vendor_zip" type="input" class="col-sm-3 control-label">Vendor Zip</label>
			<div class="col-sm-9">
				<input type="input" name="vendor_zip" class="form-control" id="vendor_zip" placeholder="" value="<?php echo set_value('vendor_zip', $vendors_item['vendor_zip']); ?>">
			</div> 
		</div>
		<input id="form-btn" type='submit' name="submit" class='btn btn-primary btn-lg btn-block' value="Update Vendor">
		<?php echo anchor('vendors/delete/' . $vendors_item['vendor_id'], 'Delete Vendor', array('onclick' => "return confirm('Are you sure you want to delete this Vendor?')", 'class' => 'btn btn-lg btn-block btn-danger')) ?>
	</div>
</div>
</form>
<div id="returned"></div>