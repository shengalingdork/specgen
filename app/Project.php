<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Project;

class Project extends Model
{
    protected $table = 'projects';

    protected $fillable = [
        'name',
        'repo_link',
        'db_name',
        'db_repo_link'
    ];
}
