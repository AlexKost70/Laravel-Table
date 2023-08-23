<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Info extends Model
{
    protected $fillable = [
        'user_id',
        'phone',
        'address'
    ];
    public function info()
    {
        return $this->belongsTo('App\User');
    }
}
