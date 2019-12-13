@extends('layouts.layout')

@section('titulo', 'SCP - Editar Requerimento')

@section('conteudo')        
    	
	<form name="requestedit" method="post" action="{{ route('request.update', $request->id) }}">
		@method('PUT')
		@csrf
	    <div class="container mt-4">    	
		    <input id="user_id" type="hidden" name="user_id" value={{Auth::user()->id}}>
	    	<div class="form-group">
		    	<label for="subject_id">Protocolo</label>
		    	<select class="form-control" id="subject_id" name="subject_id">
		    		<option>Selecione um requerimento</option>
		    		@foreach($subjects as $sub)
						<option 
						@if($sub->id == $request->subject_id) selected @endif value="{{$sub->id}}">{{ $sub->name }}  => R${{ $sub->price }}</option>
					@endforeach
				</select>
			</div>
			<div class="form-group">
				<label for="description">Descrição</label>
	            <input id="description" type="text" class="form-control" name="description" value="{{$request->description}}" required autofocus>
	        </div>
	        <div class="form-group">
	            <label for="date">Data</label>
	            <input id="date" type="date" class="form-control" name="date" value="{{$request->date}}" required autofocus>
	        </div>
	        <div class="form-group text-right">
	            <button type="submit" class="btn btn-success">Editar</button>  
	        </div>
	    </div>
	</form>

@endsection