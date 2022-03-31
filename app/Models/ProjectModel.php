<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectModel extends Model
{
    protected $fillable = ['project_name'];

    protected $table = 'project';
    protected $primaryKey = 'project_id';

}
