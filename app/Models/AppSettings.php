<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class AppSettings extends Model
{
    use HasFactory;

    protected $fillable = ['key', 'value'];


    public static function boot()
    {
        parent::boot();

        static::updating(function (AppSettings $appSettings) {
            Cache::forget("settings");
        });
    }
}
