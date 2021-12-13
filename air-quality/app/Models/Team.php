<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    //Accessor : getter

    //Last name in capital 
    public function getLastNameAttribute()
    {
        return strtoupper($this->attributes['last_name']);
    }
}
