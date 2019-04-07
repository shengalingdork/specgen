<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Environment extends Model
{
    protected $table = 'environments';

    protected $fillable = [
        'name'
    ];
}
