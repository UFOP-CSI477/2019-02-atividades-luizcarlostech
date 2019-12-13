<?php

Route::get('/', function () { return view('welcome'); });
Auth::routes(); //rotas automaticas de login
Route::get('/home', 'HomeController@index')->name('home'); //pagina inicial
Route::get('/geral', 'HomeController@geral')->name('areaGeral'); //pagina de area geral
Route::resource('/request', 'RequestController'); //Paginas de request (CRUD) + funcoes BD
Route::resource('/subject', 'SubjectController'); //Paginas de subject (CRUD) + funcoes BD