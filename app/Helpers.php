<?php

use Illuminate\Support\Facades\Cache;

function settings($key)
{
    return Cache::get('settings')->where('key', $key)->first()->value;
}
