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
				console.log("Mediawiki connection successful");
				var page = response.parse;
				console.log(response);
				var title = page.displaytitle;
				var text = page.text["*"];

				$returned.html(text);
				var $table = $('.wikitable tbody').first();
				$table.children('tr').each(function(e) {
					var key = $(this).find('th').text().trim();
					var value = $(this).find('td').text().trim();
					assetData[key] = value;
				});
				// createForm();
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

	$('select').change(function() {
		var $val = $('select option:selected');
		if($val.val() == 'viz' ) {
			console.log('viz preset');
			$('#slip_shipAddress').val('Viz Street Address');
			$('#slip_shipCity').val('Viz City');
			$('#slip_shipState').val('Viz State');
			$('#slip_shipZip').val('Viz Zip');
		} else if ($val.val() == 'troll') {
			console.log('troll preset');
			$('#slip_shipAddress').val('Troll Street Address');
			$('#slip_shipCity').val('Troll City');
			$('#slip_shipState').val('Troll State');
			$('#slip_shipZip').val('Troll Zip');
		} else {
			console.log('no preset');
			$('#slip_shipAddress').val(' ');
			$('#slip_shipCity').val(' ');
			$('#slip_shipState').val(' ');
			$('#slip_shipZip').val(' ');
		}
	});

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

});


