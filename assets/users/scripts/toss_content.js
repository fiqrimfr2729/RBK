
function addManpowerJabatan(){

	$('#manpower_level_training_row').fadeOut();
	$('#manpower_no_ktp_row').fadeOut();
	$('#manpower_tanggal_masuk_row').fadeOut();
	$('#manpower_keterangan_row').fadeOut();

	$('#manpower_level_training_row').val('');
	$('#manpower_no_ktp_row').val('');
	$('#manpower_tanggal_masuk_row').val('');
	$('#manpower_keterangan_row').val('');

	// setTimeout(showDetailManpowerJabatan, 500);

	showDetailManpowerJabatan();
}

function showDetailManpowerJabatan(){
	if($('#manpower_jabatan').val() == 'tech'){
		$('#manpower_no_ktp_row').fadeIn('slow');
		$('#manpower_tanggal_masuk_row').fadeIn('slow');
		$('#manpower_keterangan_row').fadeIn('slow');
	}

	if($('#manpower_jabatan').val() == 'admin' || $('#manpower_jabatan').val() == 'others'){
		$('#manpower_tanggal_masuk_row').fadeIn('slow');
		$('#manpower_keterangan_row').fadeIn('slow');
	}

	if($('#manpower_jabatan').val() == 'pro_tech'){
		$('#manpower_level_training_row').fadeIn('slow');
		$('#manpower_no_ktp_row').fadeIn('slow');
		$('#manpower_tanggal_masuk_row').fadeIn('slow');
		$('#manpower_keterangan_row').fadeIn('slow');
	}
}

var DatatablesResponsive = function () {

    var initTable1 = function () {
        var table = $('#man_power_list');

        var oTable = table.dataTable({
            // Internationalisation. For more info refer to http://datatables.net/manual/i18n
            "language": {
                "aria": {
                    "sortAscending": ": activate to sort column ascending",
                    "sortDescending": ": activate to sort column descending"
                },
                "emptyTable": "No data available in table",
                "info": "Showing _START_ to _END_ of _TOTAL_ entries",
                "infoEmpty": "No entries found",
                "infoFiltered": "(filtered1 from _MAX_ total entries)",
                "lengthMenu": "_MENU_ entries",
                "search": "Search:",
                "zeroRecords": "No matching records found"
            },
            "paging":   false,
            "info":     false,
            searching: false,

            // Or you can use remote translation file
            //"language": {
            //   url: '//cdn.datatables.net/plug-ins/3cfcc339e89/i18n/Portuguese.json'
            //},

            // setup buttons extentension: http://datatables.net/extensions/buttons/
            buttons: [],

            // setup responsive extension: http://datatables.net/extensions/responsive/
            responsive: {
                details: {
                   
                }
            },

            "order": [
                [0, 'asc']
            ],
            
            "lengthMenu": [
                [5, 10, 15, 20, -1],
                [5, 10, 15, 20, "All"] // change per page values here
            ],
            // set the initial value
            "pageLength": 10,

            "dom": "<'row' <'col-md-12'B>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>", // horizobtal scrollable datatable

            // Uncomment below line("dom" parameter) to fix the dropdown overflow issue in the datatable cells. The default datatable layout
            // setup uses scrollable div(table-scrollable) with overflow:auto to enable vertical scroll(see: assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js). 
            // So when dropdowns used the scrollable div should be removed. 
            //"dom": "<'row' <'col-md-12'T>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r>t<'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>",
        });
    }

    return {

        //main function to initiate the module
        init: function () {

            if (!jQuery().dataTable) {
                return;
            }

            initTable1();
        }

    };

}();

jQuery(document).ready(function() {
  $('.datedropper').dateDropper();
  DatatablesResponsive.init();

});

