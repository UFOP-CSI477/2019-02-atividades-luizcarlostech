@extends('layouts.layout')

@section('titulo', 'SCP - Criar Requerimento')

@section('conteudo')        
    	
	<form name="Requestcreate" method="POST" action="{{ route('subject.store') }}">
		@csrf
	    <div class="container mt-4">    	
	    	<input id="user_id" type="hidden" name="user_id" value={{Auth::user()->id}}>
	    	<div class="form-group">
				<label for="name">Nome</label>
            	<input id="name" type="text" class="form-control" name="name" value="" required autofocus>
            </div>
           	<div class="form-group">
            	<label for="price">Preço</label>
            	<input id="price" type="number" class="form-control" name="price" value="" required autofocus>
            </div>
            <div class="form-group text-right">
            	<button type="submit" class="btn btn-success">Inserir</button>  
            </div>
	    </div>
	</form>

@endsection