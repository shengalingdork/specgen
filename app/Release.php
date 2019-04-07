<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Release extends Model
{
    protected $table = 'releases';

    protected $fillable = [
        'name',
        'working_group_id',
        'project_id',
        'start_deployment',
        'end_deployment',
        'type_of_service',
        'downtime_req',
        'business_hours'
    ];
}
