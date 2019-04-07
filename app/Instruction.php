<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instruction extends Model
{
    protected $table = 'instructions';

    protected $fillable = [
        'release_id',
        'ticket_id',
        'support_team_id',
        'environment_id',
        'instruction',
        'db_code_review_link',
        'db_affected_core_table',
        'db_revision_num'
    ];
}
