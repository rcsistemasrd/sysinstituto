<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as LaravelModel;

class Model extends LaravelModel
{
    public $timestamps = false;

    public $incrementing = false;

    protected $keyType = 'string';

    // public function __get($key)
    // {
    //     return $this->getAttribute(strtoupper($key));
    // }
}
