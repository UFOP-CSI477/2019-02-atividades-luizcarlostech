@extends('layouts.layout')

@section('titulo', 'Usuário')

@section('conteudo')

	@if($requests->count() <= 0)
		<h3>Você não possui procedimentos cadastrados</h3>
		<h3>Insira um novo agora mesmo!!</h3><br>
		<a class="btn btn-success" href="{{route('request.create')}}" role="button">Cadastrar</a>
	@else
		<div class="container mt-4">
			<table class="table table-bordered table-dark table-striped table-hover table-sm table-responsive-sm">
				<thead class="thead-dark">
					<tr align="center">
						<th colspan="5">Requerimentos de {{Auth::user()->name}}</th>	
					</tr>
					<tr>
						<th>Protocolo</th>
						<th>Descrição</th>
						<th>Data</th>
						<th colspan="2"></th>
					</tr>
				</thead>
				<tbody>
					@foreach($requests as $req)
						<tr>
							<td> {{ $req->name }} </td>
							<td> {{ $req->description }} </td>
							<td> {{ $req->date }} </td>
							<td><a class="text-white btn btn-info btn-sm" href="{{route('request.edit', $req->id )}}">Editar</a></td>
							<td>
								<form id="logout-form" method="post" action="{{ route('request.destroy',$req->id) }}" onsubmit="return confirm('cofirma exclusão do procedimento?');">
								@csrf
								@method('DELETE')
								<input class="btn btn-danger btn-sm" type="submit" value="Excluir">
								</form>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
			<div class="text-right">
				<a class="btn btn-success" href="{{route('request.create')}}" role="button">Solicitar requerimento</a>
			</div>
		</div>
	@endif
@endsection