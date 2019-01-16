$(document).ready(function(){
	$.fn.dataTableExt.ofnSearch['html-input'] = function(value) {
		return $(value).val();
	};

	var tableo = $("#dtableo").DataTable( {
		"columnDefs": [
		{ "type": "html-input", "targets": 2 },
		{ "orderable": false, "targets": "no-sort"}
		],
		"order": [[1, "asc"]],
		"paging": false,

		footerCallback: function( tfoot, data, start, end, display ) {
			var api = this.api();

			total = api.column(2).data().reduce(function ( a, b ) {
				var bnum = 0;
				var bsplit;
				if (b) {
					bsplit = b.split("value=")[1];
				}
				if (bsplit) {
					bnum = parseFloat(bsplit.replace(/[^0-9.+-]/g, ''));
				}

				return a + bnum;
			}, 0);
			$('#totalFracOutcome').html("Sum: " + total.toFixed(2));
		}
	}
	);

	$("#dtableo td input").on('change', function() {
		var $td = $(this).parent('td');
		var $tr = $td.parent('tr');
		var table = $tr.parent('table');
//      alert($tableparent);
//      var table = ($tableparent == 'dtableo') ? tableo : tablet;
if ($(this).is(':checkbox')) {
	if ($(this).prop('checked')) {
//	      	$tr.addClass("selected");
$tr.addClass("sel");
} else {
//	       	$tr.removeClass("selected");
$tr.removeClass("sel");
}
} else {
	$td.find('input').attr('value', this.value);
}
tableo.cell($td).invalidate().draw();
//      table.cell($td).invalidate().draw();
});


// Handle change event for "Show selected records" control
$('#ctrl-show-selected-outcomes, #ctrl-show-selected-topics').on('change', function(){
	var val = $(this).val();
	var id = $(this).attr('id');
	var table = (id == 'ctrl-show-selected-outcomes') ? tableo : tablet;
// If all records should be displayed
if(val === 'all'){
	$.fn.dataTable.ext.search.pop();
//         tableo.draw();
table.draw();
}

// If selected records should be displayed
if(val === 'selected'){
	$.fn.dataTable.ext.search.pop();
	$.fn.dataTable.ext.search.push(
		function (settings, data, dataIndex){             
//               return ($(tableo.row(dataIndex).node()).hasClass('sel')) ? true : false;
return ($(table.row(dataIndex).node()).hasClass('sel')) ? true : false;
}
);
	if ($(this))          
//         tableo.draw();
table.draw();
}
});

var tablet = $("#dtablet").DataTable( {
	"columnDefs": [
	{ "type": "html-input", "targets": 3 },
	{ "orderable": false, "targets": "no-sort"}
	],
	"order": [[1, "asc"]],
	"paging": false,

	footerCallback: function( tfoot, data, start, end, display ) {
		var api = this.api();

		total = api.column(3).data().reduce(function ( a, b ) {
			var bnum = 0;
			var bsplit;
			if (b) {
				bsplit = b.split("value=")[1];
			}
			if (bsplit) {
				bnum = parseFloat(bsplit.replace(/[^0-9.+-]/g, ''));
			}

			return a + bnum;
		}, 0);
		$('#totalFracTopic').html("Sum: " + total.toFixed(2));
	}
}
);

// TODO: make this one function for both tables
$("#dtablet td input").on('change', function() {
	var $td = $(this).parent('td');
	var $tr = $td.parent('tr');
//      var table = $tr.parent('table');
if ($(this).is(':checkbox')) {
	if ($(this).prop('checked')) {
		$tr.addClass("sel");
	} else {
		$tr.removeClass("sel");
	}
} else {
	$td.find('input').attr('value', this.value);
}
tablet.cell($td).invalidate().draw();
});

});