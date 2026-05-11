<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SupervisorController extends Controller
{
    public function getMyProjects()
    {
        return \App\Models\Project::where('supervisor_id', auth()->id())->get();
    }

    public function addNote(Request $request, $project_id)
    {
        $note = \App\Models\Note::create([
            'note_desc' => $request->note_desc,
            'project_id' => $project_id,
            'supervisor_id' => auth()->id(),
        ]);

        return response()->json($note);
    }

    public function evaluateProject(Request $request, $project_id)
    {
        $evaluation = \App\Models\Evaluation::updateOrCreate(
            ['project_id' => $project_id],
            [
                'supervisor_id' => auth()->id(),
                'progress_score' => $request->progress_score,
                'progress_comment' => $request->progress_comment,
            ]
        );

        return response()->json($evaluation);
    }

}
