$(document).ready(function(){
	$("#tblResultados").DataTable({
		"responsive": true,
		"language": espaniol,
		"paging": false,
		"lengthChange": false,
		"ordering": true,
		"info": true,
		"autoWidth": false
	});
});