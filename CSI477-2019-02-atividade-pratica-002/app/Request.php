<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
	//Atributos de request
    protected $fillable = [
        'user_id', 'subject_id', 'description', 'date',
    ];
}
