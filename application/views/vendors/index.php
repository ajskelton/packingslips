<div class="confirm-div"></div>

<?php

if($this->session->flashdata('msg') != '' ):
	echo $this->session->flashdata('msg');
endif; 
?>
<h2>Current Vendor List</h2>
<table class="table table-striped">
	<tr>
		<th>Name</th>
		<th>Address</th>
		<th>City</th>
		<th>State</th>
		<th>Zip</th>
		<th>Edit</th>
	</tr>
<?php
foreach($vendors as $vendor):
	echo "<td>" . $vendor['vendor_name'] .
										"</a></td><td>" . $vendor['vendor_address'] .
										"</td><td>" . $vendor['vendor_city'] .
										"</td><td>" . $vendor['vendor_state'] .
										"</td><td>" . $vendor['vendor_zip'] .
										"</td><td><a href='vendors/edit/" . $vendor['vendor_id'] . "'>EDIT</a>" .
										"</td></tr>";

endforeach ?>
</table>
<?php echo anchor('vendors/create', 'Create Vendor', 'class="btn btn-lg btn-primary"'); ?>