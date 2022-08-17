<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class UserProfile extends Model
{
    use HasFactory;

    public function user()
    {
        $this->belongsTo('App\Models\User');
    }
}
