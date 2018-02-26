<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table='item';
    public $timestamp=false;
    protected $fillable=['nama','foto'];
}
