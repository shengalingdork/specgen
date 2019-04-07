<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkingGroup extends Model
{
    protected $table = 'working_groups';

    protected $fillable = [
        'name'
    ];
}
