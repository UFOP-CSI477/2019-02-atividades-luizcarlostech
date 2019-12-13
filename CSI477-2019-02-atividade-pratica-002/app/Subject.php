<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
	//Atributos de subject
    protected $fillable = [
        'name', 'price',
    ];
}
