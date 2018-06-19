$(document).ready(function() {
	var table = $('#myTable').DataTable({
		'language': {
			'url': '//cdn.datatables.net/plug-ins/1.10.18/i18n/Portuguese-Brasil.json'
		},
		'processing': true,
		'serverSide': true,
		'searching': false,
		'ajax': {
			'url': '/user'
		},
		'columns': [
		{'data': 'id'},
		{'data': 'name'},
		{'data': 'login'},
		{'data': 'email'},
		{
			'data': 'id',
			'render': function(data, type, row, meta) {
				row = '<button type="button" class="btn btn-xs btn-primary user-edit" title="edit" data-id="' + data + '" data-toggle="modal" data-target="#modal-edit"><i class="glyphicon glyphicon-edit"></i></button> '
				row += '<button type="button" class="btn btn-xs btn-danger user-delete" title="delete" data-id="' + data + '" data-toggle="modal" data-target="#modal-delete"><i class="glyphicon glyphicon-erase"></i></button>'
				return row
			},
			'orderable': false
		}
		]
	})

	$('.modal').on('hidden.bs.modal', function () {
		$(this).find('form')[0].reset()
	})

	$(document).on('click', '.user-edit', function() {
		var id = $(this).data('id')
		var action = '/user/' + id

		$('#modal-form-edit').attr('action', action)
		$.ajax({
			method: 'get',
			url: action,
			dataType: 'json',
			success: function(data) {
				$('#edit-name').val(data.name)
				$('#edit-email').val(data.email)
				$('#edit-login').val(data.login)
			},
			error: function(data) {
				console.log('error')
			}
		})
	})

	$(document).on('click', '.user-delete', function() {
		var id = $(this).data('id')
		var action = '/user/' + id

		$('#modal-form-delete').attr('action', action)
	})

	$('#modal-form-add').on('submit', function(e) {
		var form = $(this)
		var data = form.serialize()
		form.find('button[type=submit]').prop('disabled', true)

		$.ajax({
			type: 'post',
			url: '/user',
			dataType: 'json',
			data: data,
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			},
			success: function(content) {
				alert(content.message)
				table.ajax.reload()
				$('#modal-add').modal('hide')
			},
			error: function(data) {
				var errors = data.responseJSON
				console.log(errors.errors)
				$.each(errors.errors, function(i, item) {
					form.find('#add-' + i).parent('.form-group').addClass('has-error')
				})
			}
		})
		.always(function() {
			form.find('button[type=submit]').prop('disabled', false)
		})
		e.preventDefault()
	})

	$('#modal-form-delete').on('submit', function(e) {
		var form = $(this)
		form.find('button[type=submit]').prop('disabled', true)

		$.ajax({
			type: 'DELETE',
			url: form.attr('action'),
			dataType: 'json',
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			},
			success: function(content) {
				alert(content.message)
				table.ajax.reload()
				$('#modal-delete').modal('hide')
			},
			error: function(data) {
				var errors = data.responseJSON
				console.log(errors.errors)
				$.each(errors.errors, function(i, item) {
					form.find('#add-' + i).parent('.form-group').addClass('has-error')
				})
			}
		})
		.always(function() {
			form.find('button[type=submit]').prop('disabled', false)
		})
		e.preventDefault()
	})

	$('#modal-form-edit').on('submit', function(e) {
		var form = $(this)
		var data = form.serialize()
		form.find('button[type=submit]').prop('disabled', true)

		$.ajax({
			type: 'PUT',
			url: form.attr('action'),
			dataType: 'json',
			data: data,
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			},
			success: function(content) {
				alert(content.message)
				table.ajax.reload()
				$('#modal-edit').modal('hide')
			},
			error: function(data) {
				var errors = data.responseJSON
				console.log(errors.errors)
				$.each(errors.errors, function(i, item) {
					form.find('#add-' + i).parent('.form-group').addClass('has-error')
				})
			}
		})
		.always(function() {
			form.find('button[type=submit]').prop('disabled', false)
		})
		e.preventDefault()
	})
})


