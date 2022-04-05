<?php

namespace App\Http\Controllers;

use App\Models\ProjectModel;
use Illuminate\Http\Request;

class projectController extends Controller
{

    public function index()
    {
        $request = Request::create('api/projectData', 'GET', [
            'HTTP_Accept' => 'application/json',
            'Content-type' => 'application/json'
        ]);
        $result = app()->handle($request);

        return view('projectTable', ['tableData' => json_decode($result->getContent(), true)]);
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     * @throws \Exception
     */
    public function store(Request $request)
    {
        try {
            $rules = [
                'project_name' => 'required'
            ];

            $validator = \Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()->all()]);
            }

            $project = new ProjectModel();
            $project->project_name = $request->project_name;
            $project->project_description = $request->project_description;
            $project->project_status = ($request->is_active == 'true') ? 1 : 0;
            $project->project_code = $this->rand_string(8);
            $project->save();
        } catch (\Exception $e) {
            throw $e;

        }

        return response()->json(['success' => 'Data is successfully added']);
    }

    function rand_string($length)
    {
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        return substr(str_shuffle($chars), 0, $length);
    }

    public function show($id)
    {
        //
    }


    public function update(Request $request,$id)
    {
        try {
            $rules = [
                'project_name' => 'required'
            ];

            $validator = \Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()->all()]);
            }

            $project = ProjectModel::findorFail($id);
            $project->project_name = $request->project_name;
            $project->project_description = $request->project_description;
            $project->project_status = ($request->is_active == 'true') ? 1 : 0;
            $project->save();
        } catch (\Exception $e) {
            throw $e;

        }

        return response()->json(['success' => 'Data is successfully added']);
    }

    public function destroy($id)
    {
        try {
            $customer = ProjectModel::findorFail($id);
            $customer->delete();
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
}
