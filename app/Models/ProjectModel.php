<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectModel extends Model
{
    use HasFactory;

    protected $fillable = ['project_name'];

    protected $table = 'project';
    protected $primaryKey = 'project_id';

}
