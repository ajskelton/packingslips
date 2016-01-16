<?php 
$config = array(
	'packing-slip' => array(
		array(
			'field' => 'item_assetTag[]',
			'label' => 'Asset Tag',
			'rules' => 'required',
		),
		array(
			'field' => 'item_manufacturer[]',
			'label' => 'Manufacturer',
			'rules' => 'required',
		),
		array(
			'field' => 'item_deviceName[]',
			'label' => 'Device Name',
			'rules' => 'required',
		),
		array(
			'field' => 'item_modelNumber[]',
			'label' => 'Model Number',
		),
		array(
			'field' => 'item_serialNumber[]',
			'label' => 'Serial Number',
		),
		array(
			'field' => 'item_quantity[]',
			'label' => 'Quantity',
			'rules' => 'required',
		),

		array(
			'field' => 'slip_shipName',
			'label' => 'Ship Name',
			'rules' => 'required',
		),
		array(
			'field' => 'slip_shipAddress',
			'label' => 'Address',
			'rules' => 'required',
		),
		array(
			'field' => 'slip_shipCity',
			'label' => 'City',
			'rules' => 'required',
		),
		array(
			'field' => 'slip_shipState',
			'label' => 'State',
			'rules' => 'required',
		),
		array(
			'field' => 'slip_shipZip',
			'label' => 'Zip',
			'rules' => 'required',
		),
		array(
			'field' => 'slip_fedexTracking',
			'label' => 'FedEx Tracking Number',
		),
		array(
			'field' => 'slip_rmaNumber',
			'label' => 'RMA Number',
		),
		array(
			'field' => 'slip_customerContact',
			'label' => 'Customer Contact',
			'rules' => 'required',
		),
		array(
			'field' => 'slip_customerPhone',
			'label' => 'Customer Phone',
			'rules' => 'required',
		),
		array(
			'field' => 'slip_comments',
			'label' => 'Comments',
		),
		array(
			'field' => 'slip_description',
			'label' => 'Description',
			'rules' => 'required',
		),
	),
	'vendors' => array(
		array(
			'field' => 'vendor_name',
			'label' => 'Vendor Name',
			'rules' => 'required',
		),
		array(
			'field' => 'vendor_address',
			'label' => 'Vendor Address',
			'rules' => 'required',
		),
		array(
			'field' => 'vendor_city',
			'label' => 'Vendor City',
			'rules' => 'required',
		),
		array(
			'field' => 'vendor_state',
			'label' => 'Vendor State',
			'rules' => 'required',
		),
		array(
			'field' => 'vendor_zip',
			'label' => 'Vendor Zip',
			'rules' => 'required',
		),
	)
);