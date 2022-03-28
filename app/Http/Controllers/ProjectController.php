<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProjectModel;

class ProjectController extends Controller
{
    public function index()
    {
        dd("here");
        return ProjectModel::all();
    }
}
