<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SupportTeam extends Model
{
    protected $table = 'support_teams';

    protected $fillable = [
        'name'
    ];
}
