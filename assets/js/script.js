$(document).ready(function($) {
	var assetData = {};

	function loadData() {
		var $body = $('body');
		var $returned = $('#returned');
		var asset = $('#wiki-asset').val();

		var wikiRequestTimeout = setTimeout(function() {
			$('body').append("Failed to get wikipedia resources");
		}, 8000);

		var wikiUrl = "http://10.151.4.115/mediawiki/api.php?format=json&action=parse&page=" + asset;
		$.ajax({
			url: wikiUrl,
			dataType: "jsonp",
			success: function( response ) {
				var page = response.parse;
				var title = page.displaytitle;
				var text = page.text["*"];

				$returned.html(text);
				var $table = $('.wikitable tbody').first();
				$table.children('tr').each(function(e) {
					var key = $(this).find('th').text().trim();
					var value = $(this).find('td').text().trim();
					assetData[key] = value;
				});
				insertData(assetData);
				clearTimeout(wikiRequestTimeout);
			}
		});
		return false;
	}

	$('#wiki-submit-btn').on('click', function(e) {
		e.preventDefault();
		loadData();
		var asset = $('#wiki-asset').val();
		$('#asset-id-form').hide();
		$('#slip_assetTag').val(asset);
	});

	function insertData(assetData) {
		$('#slip_manufacturer').val(assetData['Manufacturer']);
		$('#slip_deviceName').val(assetData['Device Name']);
		$('#slip_modelNumber').val(assetData['Model Number']);
		$('#slip_serialNumber').val(assetData['Serial Number']);
	}

	function resetTextFields() {
		$("#manufacturer").val(' ');
		$("#device-name").val(' ');
		$("#model-number").val(' ');
		$("#serial-number").val(' ');
		$("#quantity").val(' ');
		$("#address").val(' ');
		$("#city").val(' ');
		$("#state").val(' ');
		$("#zip").val(' ');
		$("#FedEx-Tracking-Number").val(' ');
		$("#RMA-Number").val(' ');
		$("#Additinal-Comments").val(' ');
	}

	$("#cancel").click(function() {
		resetTextFields();
	});
	$("#refresh").click(function() {
		location.reload();
	});

	counter = 1;
  $('#add-device').click(function(e){
  	e.preventDefault;
  	console.log('clicked');
		$('#add-device').before(
			"<hr>\
			<div class='row' id='device_"+(counter+1)+"'>\
			<h2 class='center' id='device_1'>Device "+(counter+1)+"</h2>\
				<div class='col-md-6'>\
					<div class='form-group'>\
						<label for='item_assetTag' class='col-sm-3 control-label'>Asset Tag Number</label>\
						<div class='col-sm-9'>\
							<input name='item_assetTag["+counter+"]'' type='input' class='form-control' id='item_assetTag' placeholder='' value=''>\
						</div>\
					</div>\
					<div class='form-group'>\
						<label for='item_manufacturer' class='col-sm-3 control-label'>Manufacturer</label>\
						<div class='col-sm-9'>\
							<input name='item_manufacturer["+counter+"]' type='input' class='form-control' id='item_manufacturer' placeholder='' value=''>\
						</div>\
					</div>\
					<div class='form-group'>\
						<label for='item_deviceName' class='col-sm-3 control-label'>Device Name</label>\
						<div class='col-sm-9'>\
							<input name='item_deviceName["+counter+"]' type='input' class='form-control' id='item_deviceName' placeholder='' value=''>\
						</div>\
					</div>\
				</div>\
				<div class='col-md-6'>\
					<div class='form-group'>\
						<label for='item_modelNumber' class='col-sm-3 control-label'>Model Number</label>\
						<div class='col-sm-9'>\
							<input name='item_modelNumber["+counter+"]' type='input' class='form-control' id='item_modelNumber' placeholder='' value=''>\
						</div>\
					</div>\
					<div class='form-group'>\
						<label for='item_serialNumber' class='col-sm-3 control-label'>Serial Number</label>\
						<div class='col-sm-9'>\
							<input name='item_serialNumber["+counter+"]' type='input' class='form-control' id='item_serialNumber' placeholder='' value=''>\
						</div>\
					</div>\
					<div class='form-group'>\
						<label for='item_quantity' class='col-sm-3 control-label'>Quantity</label>\
						<div class='col-sm-9'>\
							<input name='item_quantity["+counter+"]' type='input' class='form-control' id='item_quantity' placeholder='' value=''>\
						</div>\
					</div>\
				</div>\
			</div>"
		);
		// console.log('button clicked');
		counter++;
  });
});


