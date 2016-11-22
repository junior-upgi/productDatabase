<?php

namespace App\Models\productDatabase;

use Illuminate\Database\Eloquent\Model;

class PlasticProduct extends Model
{   
    protected $connection = 'productDatabase';
    protected $table = "plasticProduct";
    public $timestamps = false;
}