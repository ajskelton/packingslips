<div class="confirm-div"></div>

<?php

if($this->session->flashdata('msg') != '' ):
	echo $this->session->flashdata('msg');
endif; 
?>
<h2>Active Packing Slips</h2>
<table class="table table-striped">
	<tr>
		<th>ID</th>
		<th>Asset Tag</th>
		<th>Device Name</th>
		<th>Manufacturer</th>
		<th>Date Created</th>
		<th>Last Modified</th>
		<th>Status</th>
	</tr>
<?php 
$reverseSlips = array_reverse($slips);
foreach ($reverseSlips as $slips_item): 
	if ($slips_item['slip_status'] != 'Complete')

	echo "<tr><td>" . $slips_item['slip_id'] .
                            "</td><td><a href='slips/" . $slips_item['slip_id'] . "'>" . $slips_item['slip_assetTag'] . 
                            "</a></td><td>" . $slips_item['slip_deviceName'] . 
                            "</td><td>" . $slips_item['slip_manufacturer'] .
                            "</td><td>" . date( 'F j, Y g:i a', strtotime($slips_item['slip_date'])) . 
                            "</td><td>" . $slips_item['slip_lastModified'] .
                            "</td><td>" . $slips_item['slip_status'] . 
                            "</td><tr>"; 
 
endforeach ?>

</table>
<h2>Completed Slips</h2>
<table class="table table-striped">
	<tr>
		<th>ID</th>
		<th>Asset Tag</th>
		<th>Device Name</th>
		<th>Manufacturer</th>
		<th>Date Created</th>
		<th>Last Modified</th>
		<th>Status</th>
	</tr>
	<?php
	foreach ($reverseSlips as $slips_item) :
		if ($slips_item['slip_status'] == 'Complete')
		echo "<tr><td>" . $slips_item['slip_id'] .
                            "</td><td><a href='slips/" . $slips_item['slip_id'] . "'>" . $slips_item['slip_assetTag'] . 
                            "</a></td><td>" . $slips_item['slip_deviceName'] . 
                            "</td><td>" . $slips_item['slip_manufacturer'] .
                            "</td><td>" . date( 'F j, Y g:i a', strtotime($slips_item['slip_date'])) . 
                            "</td><td>" . $slips_item['slip_lastModified'] .                            
                            "</td><td>" . $slips_item['slip_status'] . 
                            "</td><tr>"; 
      endforeach ?>

</table>