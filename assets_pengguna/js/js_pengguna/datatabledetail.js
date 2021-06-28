"use strict";
var KTDatatablesExtensionsRowgroup = function() {

	var initTable1 = function() {
		var table = $('#table_row');

		// begin first table
		table.DataTable({
			responsive: true,
		});

	};

	return {

		//main function to initiate the module
		init: function() {
			initTable1();
		},

	};

}();

jQuery(document).ready(function() {
	KTDatatablesExtensionsRowgroup.init();
});
