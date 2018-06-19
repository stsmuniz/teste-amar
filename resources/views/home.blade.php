@extends('adminlte::page')

@section('title', 'AMAR Assist - Home')
@section('header')
<meta name="csrf-token" content="{{ csrf_token() }}">
@stop
@section('content_header')
<h1>Usuários</h1>
@stop

@section('content')
<div class="box">
	<div class="box-body">
		<table id="myTable" class="display" style="width: 100%">
			<thead>
				<tr>
					<th>ID</th>
					<th>Nome</th>
					<th>Login</th>
					<th>E-mail</th>
					<th class="no-sort">Ações</th>
				</tr>
			</thead>
		</table>
	</div>
</div>
<button class="btn btn-success" data-toggle="modal" data-target="#modal-add">
	<i class="glyphicon glyphicon-user"></i> Novo Usuário
</button>
<div class="modal modal-success fade in" id="modal-add" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
					<span aria-hidden="true">×</span>
				</button>
				<h4 class="modal-title">Adicionar usuário</h4>
			</div>
			<form action="/user" role="form" id="modal-form-add" method="POST">
				<div class="modal-body">
					<div class="form-group">
						<label for="name">Nome</label>
						<input type="text" class="form-control" name="name" id="add-name" placeholder="Escreva o nome">
					</div>
					<div class="form-group">
						<label for="login">Login</label>
						<input type="text" class="form-control" name="login" id="add-login" placeholder="Escreva o login">
					</div>
					<div class="form-group">
						<label for="email">E-mail</label>
						<input type="email" class="form-control" name="email" id="add-email" placeholder="Escreva o email">
					</div>
					<div class="form-group">
						<label for="password">Senha</label>
						<input type="password" class="form-control" name="password" id="add-password">
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Fechar</button>
					<button type="submit" class="btn btn-success">Adicionar Usuário</button>
				</div>
			</form>
		</div>
	</div>
</div>

<div class="modal modal-info fade in" id="modal-edit" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
					<span aria-hidden="true">×</span>
				</button>
				<h4 class="modal-title">Editar usuário</h4>
			</div>
			<form action="/user/" role="form" id="modal-form-edit" method="POST">
				<input name="_method" type="hidden" value="PUT">
				<div class="modal-body">
					<div class="form-group">
						<label for="name">Nome</label>
						<input type="text" class="form-control" name="name" id="edit-name" placeholder="Escreva o nome">
					</div>
					<div class="form-group">
						<label for="login">Login</label>
						<input type="text" class="form-control" name="login" id="edit-login" placeholder="Escreva o login">
					</div>
					<div class="form-group">
						<label for="email">E-mail</label>
						<input type="email" class="form-control" name="password" id="edit-email" placeholder="Escreva o email">
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Fechar</button>
					<button type="submit" class="btn btn-primary">Editar Usuário</button>
				</div>
			</form>
		</div>
	</div>
</div>

<div class="modal modal-danger fade in" id="modal-delete" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
					<span aria-hidden="true">×</span>
				</button>
				<h4 class="modal-title">Apagar usuário</h4>
			</div>
			<form action="/user/" role="form" id="modal-form-delete" method="POST">
				<input name="_method" type="hidden" value="DELETE">
				<div class="modal-body">
					<div class="form-group">
						<p>Tem certeza de que quer desativar este usuário?</p>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button> 
					<button type="submit" class="btn btn-danger">Apagar Usuário</button>
				</div>
			</form>
		</div>
	</div>
</div>

@stop

@section('script')
<script src="{{asset('js/script.js')}}"></script>
@stop
