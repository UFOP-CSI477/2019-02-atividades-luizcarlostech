@extends('layouts.layout')

@section('titulo', 'SCP - Criar Requerimento')

@section('conteudo')        
    	
	<form name="Requestcreate" method="POST" action="{{ route('request.store') }}">
		@csrf
	    <div class="container mt-4">    	
	    	<input id="user_id" type="hidden" name="user_id" value={{Auth::user()->id}}>

	    	<div class="form-group">
				<label for="subject_id">Protocolo</label>
		    	<select class="form-control" id="subject_id" name="subject_id">
		    		<option value="-1">Selecione um protocolo</option>
		    		@foreach($subjects as $sub)
						<option value="{{$sub->id}}">{{ $sub->name }}  => R${{ $sub->price }}</option>
					@endforeach
				</select>
			</div>

	    	<div class="form-group">
				<label for="description">Descrição</label>
	            <input id="description" type="text" class="form-control" name="description" value="" required autofocus>
	        </div>

	        <div class="form-group">
            	<label for="date">Data</label>
            	<input id="date" type="date" class="form-control" name="date" value="" required autofocus>
           	</div>

           	<div class="form-group">
            	<div class="text-right">
            		<button type="submit" class="btn btn-success">Inserir</button>  
            	</div>
            </div>
	    </div>
	</form>

@endsection