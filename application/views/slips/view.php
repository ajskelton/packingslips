<?php 
$this->session->set_userdata('referred_from', current_url());
if($this->session->flashdata('msg') != '' ):
	echo $this->session->flashdata('msg');
endif; 
?>
<div id="kcra-address" class="print-only">
	<div class="printRow">
		<p>
			<img src="<?php echo asset_url() . 'img/kcralogo.png'?>" style="width:400px"><span style="font-size:36px;">Packing Slip</span>
		</p>
	</div><!-- end printRow -->
	<div class="printRow">
		<div class="printAddressCell">
			<table>
				<tbody>
					<tr>
						<td style="width:120px">Address: </td>
						<td>3 Television Circle</td>
					</tr>
					<tr>
						<td></td>
						<td>Sacramento Ca, 95814</td>
					</tr>
					<tr>
						<td></td>
						<td>Phone: 916 446-3333</td>
					</tr>
					<tr>
						<td></td>
						<td>Fax: 916-325-3728</td>
					</tr>
				</tbody>
			</table>
		</div><!-- end printAddressCell -->

		<div class="printAddressCell">
			<table>
				<tbody>
					<tr>
						<td style="width:120px">Ship To: </td>
						<td><?php echo $slips_item["slip_shipName"] ?></td>
					</tr>
					<tr>
						<td></td>
						<td><?php echo $slips_item["slip_shipAddress"] ?></td>
					</tr>
					<tr>
						<td></td>
						<td><?php echo $slips_item["slip_shipCity"] ?></td>
					</tr>
					<tr>
						<td></td>
						<td><?php echo $slips_item["slip_shipState"] ?></td>
					</tr>
					<tr>
						<td></td>
						<td><?php echo $slips_item["slip_shipZip"] ?></td>
					</tr>
				</tbody>
			</table>
		</div><!-- end printAddressCell -->
	</div><!-- end printRow -->
	<div class="printRow">
		<div class="printOrderCell">
			<table>
				<tbody>
					<tr>
						<td style="font-weight:bold;width:200px;">RMA Number</td>
						<td><?php echo $slips_item["slip_rmaNumber"]?></td>
					</tr>
					<tr>
						<td style="font-weight: bold">Customer Contact</td>
						<td><?php echo $slips_item['slip_customerContact']?></td>
					</tr>
					<tr>
						<td style="font-weight: bold">Customer Phone: </td>
						<td><?php echo $slips_item['slip_customerPhone']?></td>
					</tr>
				</tbody>
			</table>
		</div><!-- end printOrderCell -->
	</div><!-- end printRow -->
	<div id="device-table">
		<table class="table">
			<tbody>
				<tr>
					<th>Manufacturer</th>
					<th>Device Name</th>
					<th>Model Number</th>
					<th>Serial Number</th>
					<th>Quantity</th>
				</tr>
				<tr>
					<td><?php echo $slips_item["slip_manufacturer"] ?></td>
					<td><?php echo $slips_item["slip_deviceName"] ?></td>
					<td><?php echo $slips_item["slip_modelNumber"] ?></td>
					<td><?php echo $slips_item["slip_serialNumber"] ?></td>
					<td><?php echo $slips_item["slip_quantity"] ?></td>
				</tr>
				<tr>
					<td style="height:37px;"> </td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td style="height:37px"> </td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
			</tbody>
		</table>
	</div><!-- end device-table -->
	<div class="printRow">
		<h3>Comments</h3>
		<p><?php echo $slips_item["slip_comments"] ?></p>
	</div><!-- end printRow -->
</div><!-- end kcra-address -->


<div class="jumbotron no-print">
	<h2>Packing slip for <?php echo $slips_item["slip_deviceName"]?></h2>
	<h3>Slip Status <span class="label label-primary"><?php echo $slips_item["slip_status"]?></span></h3>
	<h3>Creation Date : <strong><?php echo date( 'F j, Y g:i a', strtotime($slips_item['slip_date'])) ?></strong></h3>
	<h3>Last Modified : <strong><?php echo $slips_item["slip_lastModified"]?></strong></h3>
	<hr>
	<a href="javascript:window.print()">
		<button class="btn btn-lg btn-success" id="print-button" />Print Packing Slip</button>
	</a>
	<?php echo anchor('slips/edit/' . $slips_item['slip_id'], 'Edit Packing Slip', 'class="btn btn-lg btn-warning"'); ?>
	<?php echo anchor('slips/delete/' . $slips_item['slip_id'], 'Delete Slip', array('onclick' => "return confirm('Are you sure you want to delete this Packing Slip?')", 'class' => 'btn btn-lg btn-danger')) ?>

</div>
<div class="no-print">
	<h3>Device</h3>
	<table id="device-table" class="table">
		<tr>
			<th>Product</th>
			<th>Description</th>
			<th>Model</th>
			<th>Serial Number</th>
			<th>Ship Quantity</th>
		</tr>
		<tr>
			<td><?php echo $slips_item["slip_manufacturer"] ?></td>
			<td><?php echo $slips_item["slip_deviceName"] ?></td>
			<td><?php echo $slips_item["slip_modelNumber"] ?></td>
			<td><?php echo $slips_item["slip_serialNumber"] ?></td>
			<td><?php echo $slips_item["slip_quantity"] ?></td>
		</tr>
	</table>
	<h3>Shipping Information</h3>
	<table id="shipping-table" class="table">
		<tr>
			<th>Address</th>
			<th>City</th>
			<th>State</th>
			<th>Zip</th>
		</tr>
		<tr>
			<td><?php echo $slips_item["slip_shipAddress"] ?></td>
			<td><?php echo $slips_item["slip_shipCity"]?></td>
			<td><?php echo $slips_item["slip_shipState"]?></td>
			<td><?php echo $slips_item["slip_shipZip"]?></td>
		</tr>
	</table>
	<h3>Other Information</h3>
	<table id="info-table" class="table">
		<tr>
			<th>FedEx Tracking Number</th>
			<th>RMA Number</th>
			<th>Customer Contact</th>
			<th>Customer Phone</th>
		</tr>
		<tr>
			<td><?php echo $slips_item["slip_fedexTracking"]?></td>
			<td><?php echo $slips_item["slip_rmaNumber"]?></td>
			<td><?php echo $slips_item["slip_customerContact"]?></td>
			<td><?php echo $slips_item["slip_customerPhone"]?></td>
		</tr>
	</table>
	<h3>Comments</h3>
	<p id="comments"><?php echo $slips_item["slip_comments"]?></p>
</div><!-- end no-print -->

