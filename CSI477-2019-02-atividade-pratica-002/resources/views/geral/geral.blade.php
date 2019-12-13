@extends('layouts.layout')

@section('titulo', 'SCP - Geral')

@section('conteudo')        
    	
	<div class="container mt-4">
		<table class="table table-striped table-dark table-hover table-sm table-responsive-sm">
			<thead class="thead-dark">
				<tr>
					<th>Nome</th>
					<th>Preço</th>
				</tr>
			</thead>

			<tbody>
				@foreach($subjects as $sub)
				<tr>
					<td> {{ $sub->name }} </td>
					<td> {{ $sub->price }} </td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>

@endsection