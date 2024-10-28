<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class user extends Model
{
    protected $primaryKey = 'id';

    protected $fillable = [
        'username',
        'phone_number',
        'address',
        'password'
    ];

    public function role(){
        return $this->hasMany(Role::class,'role_ownerships');
    }
}
