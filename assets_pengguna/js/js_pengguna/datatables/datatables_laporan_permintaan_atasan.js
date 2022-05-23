"use strict";
var KTDatatablesExtensionButtons = function() {

	var initTable1 = function() {

		// begin first table
		var table = $('#tabel_data_laporan_permintaan_layanan_atasan').DataTable({
            "searching": true,
            "scrollX": true,
              dom: 'Bfrtip',
                  buttons: [
                      { 
                        text: '<i class="fa fa-lg fa-clipboard"></i> Copy',
                        extend: 'copyHtml5',
                        className: 'btn btn-sm btn-secondary',  
                        footer: true,
                        exportOptions: {
                                  stripHtml : false,
                                  columns: [0, 1, 2, 3, 4, 5, 6, 7, 8]  
                        } 
                      },
                      { 
                        text: '<i class="fa fa-file-excel"></i> Excel',
                        extend: 'excelHtml5',
                        className: 'btn btn-sm btn-success', 
                        footer: true,
                        exportOptions: {
                                  stripHtml : false,
                                  columns: [0, 1, 2, 3, 4, 5, 6, 7, 8]  
                        } 
                      },
                      { 
                        text: '<i class="fa fa-file-csv"></i> CSV',
                        extend: 'csvHtml5',
                        className: 'btn btn-sm btn-info', 
                        footer: true,
                        exportOptions: {
                                  stripHtml : false,
                                  columns: [0, 1, 2, 3, 4, 5, 6, 7, 8]  
                        }
                      },
                      { 
                        text: '<i class="fa fa-print"></i> Print',
                        extend: 'print',
                        className: 'btn btn-sm btn-primary',
                        footer: true,
                        exportOptions: {
                                  stripHtml : false,
                                  columns: [0, 1, 2, 3, 4, 5, 6, 7, 8]  
                        }
                      }
                  ],   
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
	KTDatatablesExtensionButtons.init();
});
  
  
  
  
  