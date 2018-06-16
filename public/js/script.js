$(document).ready(function() {
	$('#myTable').DataTable({
		'processing': true,
		'serverSide': true,
		'ajax': {
			'url': '/user'
		},
		'columns': [
			{'data': 'id'},
			{'data': 'name'},
			{'data': 'login'},
			{'data': 'email'}
		]
    	})
})
