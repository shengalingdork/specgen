<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teammate extends Model
{
    protected $table = 'teammates';

    protected $fillable = [
        'name',
        'role'
    ];
}
