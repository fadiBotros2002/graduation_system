<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HeadController extends Controller
{
    public function getAllProjects()
    {
        return \App\Models\Project::all();
    }

    public function acceptProject($project_id)
    {
        $project = \App\Models\Project::findOrFail($project_id);
        $project->status = 'accepted';
        $project->save();

        return response()->json($project);
    }

    public function assignSupervisor(Request $request, $project_id)
    {
        $project = \App\Models\Project::findOrFail($project_id);
        $project->supervisor_id = $request->supervisor_id;
        $project->save();

        return response()->json($project);
    }

    public function finalEvaluate(Request $request, $project_id)
    {
        $evaluation = \App\Models\Evaluation::updateOrCreate(
            ['project_id' => $project_id],
            [
                'head_id' => auth()->id(),
                'final_score' => $request->final_score,
                'final_comment' => $request->final_comment,
            ]
        );

        return response()->json($evaluation);
    }

}
