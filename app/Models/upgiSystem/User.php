<?php

namespace App\Models\upgiSystem;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

class User extends Model implements AuthenticatableContract
{
    use SoftDeletes;
    use Authenticatable;
    
    protected $connection = 'upgiSystem';
    protected $table = "user";
    protected $softDelete = true;

    protected $primaryKey = 'ID';
    public $incrementing = false;
    
    protected $fillable = [
        'ID', 
        'mobileSystemAccount', 
        'password', 
        'authorization',
        'erpID',
    ];
    protected $hidden = array('password', 'remember_token');

}
