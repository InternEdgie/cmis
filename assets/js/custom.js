// Call the dataTables jQuery plugin
$(document).ready(function() {
  	$('#dataTable').DataTable();
  	$('#table_desc').DataTable({
	  	"pagingType": "full_numbers",
	  	"lengthMenu": [
	  	[10, 25, 50, -1],
	  	[10, 25, 50, "All"]
	  	],
	  	order: [[0, 'desc']],
	  	responsive: true,
	  	language: {
	  		search: "_INPUT_",
	  		searchPlaceholder: "Search...",
	  	}
  	});
    $('#table_entry').DataTable({
        paging: false,
        scrollY: 400,
        order: [[0, 'desc']],
        responsive: true,
        language: {
            search: "_INPUT_",
            searchPlaceholder: "Search...",
        }
    });
    $('#table_asc').DataTable({
        "pagingType": "full_numbers",
        "lengthMenu": [
        [10, 25, 50, -1],
        [10, 25, 50, "All"]
        ],
        order: [[0, 'asc']],
        responsive: true,
        language: {
            search: "_INPUT_",
            searchPlaceholder: "Search...",
        }
    });
    $('.table-asc').DataTable({
        "pagingType": "full_numbers",
        "lengthMenu": [
        [10, 25, 50, -1],
        [10, 25, 50, "All"]
        ],
        order: [[0, 'asc']],
        responsive: true,
        language: {
            search: "_INPUT_",
            searchPlaceholder: "Search...",
            infoFiltered: "",
        },
        "dom" : 'rtp',
        "bInfo" : false
    });
  	$('.select2').select2({
        theme: "bootstrap4",
        width: '100%',
        placeholder: $( this ).data( 'placeholder' )
    });

    $(".multiselect").select2({
        theme: "bootstrap-5",
        width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
        maximumSelectionLength: 3,
        placeholder: "SELECT 3 PANGKAT",
        allowClear: true,
    });

    $('.resp_id').select2({
        theme: 'bootstrap4',
        placeholder: 'Select Respondent',
        dropdownParent: $('#fileComplaintModal, #invitationModal')
    })

    $('.fc_type').select2({
        theme: 'bootstrap4',
        width: '100%',
        placeholder: 'Type of Complainant',
        dropdownParent: $('#fileComplaintModal, #invitationModal')
    })

    $('.res_comp_id').select2({
        theme: 'bootstrap4',
        placeholder: 'Select Complainant (Resident)',
        dropdownParent: $('#fileComplaintModal, #invitationModal')
    })

    $('.nres_comp_id').select2({
        theme: 'bootstrap4',
        placeholder: 'Select Complainant (Non-Resident)',
        dropdownParent: $('#fileComplaintModal, #invitationModal')
    })

    $('.com_id').select2({
        theme: 'bootstrap4',
        placeholder: 'Nature of The Case (Complaint Type)',
        dropdownParent: $('#proceedToSummonModal, #fileComplaintModal')
    })

    $('.for_schedule').select2({
        theme: 'bootstrap4',
        width: '100%',
        placeholder: 'Select from Filed Complaints',
        dropdownParent: $('#addScheduleModal')
    })

    $('.event').select2({
        theme: 'bootstrap4',
        width: '100%',
        placeholder: 'Select Event',
        dropdownParent: $('#addScheduleModal')
    })

    $('[data-mask]').inputmask();
});