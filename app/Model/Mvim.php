<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mvim extends Model
{
    //
    protected $fillable=['text','img'];
    public $timestamps = false;
}
