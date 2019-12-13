@extends('layouts.layout')

@section('titulo', 'Administrativo')

@section('conteudo')

	@if($subjects->count() <= 0)
		<h3>Não existem protocolos cadastrados</h3>
		<h3>Insira um novo agora mesmo!!</h3><br>
		<a class="btn btn-success" href="{{route('subject.create')}}">Cadastrar protocolo</a>
	@else
		<div class="container mt-4">
			<table class="table table-bordered table-dark table-striped table-hover table-sm table-responsive-sm">
				<thead class="thead-dark">
					<tr align="center">
						<th colspan="5">Protocolos</th>	
					</tr>
					<tr>
						<th>Nome</th>
						<th>Preço</th>
						<th colspan="2"></th>
					</tr>
				</thead>
				<tbody>
					@foreach($subjects as $sub)
						<tr>
							<td> {{ $sub->name }} </td>
							<td> {{ $sub->price }} </td>
							<td><a class="text-white btn btn-info btn-sm" href="{{route('subject.edit', $sub->id )}}">Editar</a></td>
							<td>
								@php $bool = true; @endphp
								@foreach($requests as $req)
									@if($sub->id==$req->subject_id)
										<form id="logout-form" method="post" action="{{ route('subject.destroy',$sub->id) }}" onsubmit="return confirm('cofirma exclusão do procedimento?');">
											@csrf
											@method('DELETE')
											<input class="btn btn-danger btn-sm" disabled type="submit" value="Excluir">
										</form>
										@php $bool = false;@endphp
										@break
									@endif
								@endforeach
								@if($bool == true)
									<form id="logout-form" method="post" action="{{ route('subject.destroy',$sub->id) }}" onsubmit="return confirm('cofirma exclusão do procedimento?');">
										@csrf
										@method('DELETE')
										<input class="btn btn-danger btn-sm" type="submit" value="Excluir">
									</form>
								@endif
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
			<div class="text-right">
			<a class="btn btn-success" href="{{route('subject.create')}}">Cadastrar protocolo</a>
			</div>
		</div>
	@endif
@endsection