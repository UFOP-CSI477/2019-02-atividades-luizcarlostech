@extends('layouts.layout')

@section('titulo', 'SCP - Editar Protocolo')

@section('conteudo')        
   
	<form name="subjectedit" method="post" action="{{ route('subject.update', $subject->id) }}">
		@method('PUT')
		@csrf
	    <div class="container mt-4">    	
	    	<div class="form-group">
				<label for="name">Nome</label>
            	<input id="name" type="text" class="form-control" name="name" value="{{$subject->name}}" required autofocus>
            </div>
            <div class="form-group">
            	<label for="price">price</label>
            	<input id="price" type="number" class="form-control" name="price" value="{{$subject->price}}" required autofocus>
            </div>
            <div class="form-group text-right">
            	<button type="submit" class="btn btn-success">Editar</button>  
            </div>
	    </div>
	</form>

@endsection