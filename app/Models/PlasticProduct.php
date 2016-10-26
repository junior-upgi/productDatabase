<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PlasticProduct extends Model
{   
    protected $connection = 'MSSQL';
    protected $table = "plasticProduct";
    public $timestamps = false;
}