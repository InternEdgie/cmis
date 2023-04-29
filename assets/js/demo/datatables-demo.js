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
});
