<?php

namespace App\Http\Controllers;

use App\Models\ProjectModel;

class displayProjectController extends Controller
{
    public function index(): string
    {
        return ProjectModel::all()->toJson();
    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $project = ProjectModel::findorFail($id);
        if (!$project) {
            abort(404);
        }

        return json_encode($project);
    }
}
