<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExDate extends Model
{
    protected $table='data_expired';
    public $timestamp=false;
    protected $fillable=['id_item','ex_date','qty','buy_date','location'];
}
