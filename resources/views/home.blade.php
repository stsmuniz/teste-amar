@extends('adminlte::page')

@section('title', 'AMAR Assist - Home')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
<div class="box">
	<div class="box-header">
		<h3 class="box-title">Usuários</h3>
	</div>
	<div class="box-body">
		<table id="myTable" class="display" style="width: 100%">
			<thead>
				<tr>
					<th>ID</th>
					<th>Name</th>
					<th>Login</th>
					<th>E-mail</th>
					<th>Action</th>
				</tr>
			</thead>
		</table>
	</div>
</div>
@stop

@section('script')
<script src="{{asset('js/script.js')}}"></script>
@stop
