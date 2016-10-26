<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductDatabase extends Model
{   
    protected $connection = 'MSSQL';
    protected $table = "productDatabase";
}