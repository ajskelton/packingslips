$(document).ready(function($) {
	var assetData = {};
	var deviceNumber = 0;

	function loadData() {
		console.log('loading-data');
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
				console.log(assetData);
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
		deviceNumber = $('#deviceNumber').find(":selected").val();
		$('#item_assetTag_'+deviceNumber).val(asset);
		$('#wiki-asset').val('927-######');
	});

	function insertData(assetData) {
		$('#item_manufacturer_'+deviceNumber).val(assetData['Manufacturer']);
		$('#item_deviceName_'+deviceNumber).val(assetData['Device Name']);
		$('#item_modelNumber_'+deviceNumber).val(assetData['Model Number']);
		$('#item_serialNumber_'+deviceNumber).val(assetData['Serial Number']);
	}

	$('#devices').on('click', '.delete', function(e){
		e.preventDefault;
		console.log('delete activated');
		var parentID = $(this).parent().attr('id').slice(-1);
		console.log(parentID);
		$("#deviceNumber option[value="+parentID+"]").remove();
		$(this).closest('div').remove();
	});

  $('#add-device').click(function(e){
  	e.preventDefault;
  	console.log('clicked');
  	counter = $('.device').length;
		$('#devices').append(
			"<div class='row device' id='device_"+(counter+1)+"'>\
			<h2 id='device_1'>Device "+(counter+1)+"<button type='button' class='btn btn-default btn-md delete pull-right'><span class='glyphicon glyphicon-remove-circle' aria-hidden='true'></span></button></h2>\
				<div class='col-md-6'>\
					<div class='form-group'>\
						<label for='item_assetTag' class='col-sm-3 control-label'>Asset Tag Number</label>\
						<div class='col-sm-9'>\
							<input name='item_assetTag["+counter+"]'' type='input' class='form-control' id='item_assetTag_"+counter+"' placeholder='' value=''>\
						</div>\
					</div>\
					<div class='form-group'>\
						<label for='item_manufacturer' class='col-sm-3 control-label'>Manufacturer</label>\
						<div class='col-sm-9'>\
							<input name='item_manufacturer["+counter+"]' type='input' class='form-control' id='item_manufacturer_"+counter+"' placeholder='' value=''>\
						</div>\
					</div>\
					<div class='form-group'>\
						<label for='item_deviceName' class='col-sm-3 control-label'>Device Name</label>\
						<div class='col-sm-9'>\
							<input name='item_deviceName["+counter+"]' type='input' class='form-control' id='item_deviceName_"+counter+"' placeholder='' value=''>\
						</div>\
					</div>\
				</div>\
				<div class='col-md-6'>\
					<div class='form-group'>\
						<label for='item_modelNumber' class='col-sm-3 control-label'>Model Number</label>\
						<div class='col-sm-9'>\
							<input name='item_modelNumber["+counter+"]' type='input' class='form-control' id='item_modelNumber_"+counter+"' placeholder='' value=''>\
						</div>\
					</div>\
					<div class='form-group'>\
						<label for='item_serialNumber' class='col-sm-3 control-label'>Serial Number</label>\
						<div class='col-sm-9'>\
							<input name='item_serialNumber["+counter+"]' type='input' class='form-control' id='item_serialNumber_"+counter+"' placeholder='' value=''>\
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
		$('#deviceNumber').append('<option value="'+counter+'">Device '+(counter+1)+'</option>');
		console.log('button clicked');
		counter++;
  });
});


