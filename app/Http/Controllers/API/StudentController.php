<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function createProject(Request $request)
    {
        $project = \App\Models\Project::create([
            'title' => $request->title,
            'project_desc' => $request->project_desc,
            'status' => 'pending',
        ]);

        \App\Models\Member::create([
            'project_id' => $project->project_id,
            'student_id' => auth()->id()
        ]);

        return response()->json($project);
    }

    public function addUpdate(Request $request, $project_id)
    {
        $update = \App\Models\Update::create([
            'update_desc' => $request->update_desc,
            'project_id' => $project_id
        ]);

        return response()->json($update);
    }

    public function getNotes($project_id)
    {
        return \App\Models\Note::where('project_id', $project_id)->get();
    }

}
