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
		<th>Description</th>
		<th>Shipped To</th>
		<th>FedEx Tracking #</th>
		<th>Date Created</th>
		<th>Last Modified</th>
		<th>Status</th>
	</tr>
<?php 
$reverseSlips = array_reverse($slips);
foreach ($reverseSlips as $slips_item): 
	if ($slips_item['slip_status'] != 'Complete'){
		$url = $slips_item['slip_fedexTracking'];

	echo "<tr><td><a href='slips/" . $slips_item['slip_id'] . "'>" . $slips_item['slip_id'] .
                            "</a></td><td><a href='slips/" . $slips_item['slip_id'] . "'>" . $slips_item['slip_description'] . 
                            "</a></td><td>" . $slips_item['slip_shipName'] . 
                            "</td><td><a target='_blank' href='https://www.fedex.com/apps/fedextrack/?action=track&language=english&cntry_code=us&tracknumbers=" . $slips_item['slip_fedexTracking'] . "'>" . $slips_item['slip_fedexTracking'] . "</a>" .
                            "</td><td>" . date( 'F j, Y g:i a', strtotime($slips_item['slip_date'])) . 
                            "</td><td>" . $slips_item['slip_lastModified'] .
                            "</td><td>" . $slips_item['slip_status'] . 
                            "</td><tr>"; 
 }
endforeach ?>

</table>
<h2>Completed Slips</h2>
<table class="table table-striped">
	<tr>
		<th>ID</th>
		<th>Description</th>
		<th>Shipped To</th>
		<th>FedEx Tracking #</th>
		<th>Date Created</th>
		<th>Last Modified</th>
		<th>Status</th>
	</tr>
	<?php
	foreach ($reverseSlips as $slips_item) :
		if ($slips_item['slip_status'] == 'Complete')
		echo "<tr><td><a href='slips/" . $slips_item['slip_id'] . "'>" . $slips_item['slip_id'] .
                            "</a></td><td><a href='slips/" . $slips_item['slip_id'] . "'>" . $slips_item['slip_description'] . 
                            "</a></td><td>" . $slips_item['slip_shipName'] . 
                            "</td><td><a target='_blank' href='https://www.fedex.com/apps/fedextrack/?action=track&language=english&cntry_code=us&tracknumbers=" . $slips_item['slip_fedexTracking'] . "'>" . $slips_item['slip_fedexTracking'] .
                            "</td><td>" . date( 'F j, Y g:i a', strtotime($slips_item['slip_date'])) . 
                            "</td><td>" . $slips_item['slip_lastModified'] .
                            "</td><td>" . $slips_item['slip_status'] . 
                            "</td><tr>"; 
      endforeach ?>

</table>