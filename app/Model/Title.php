<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Title extends Model
{
    //
    protected $fillable=['text','img'];
    public $timestamps = false;
}
