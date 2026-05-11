<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Evaluation extends Model
{
    use HasFactory;

    protected $primaryKey = 'evaluation_id';
    public $incrementing = true;

    protected $fillable = [
        'project_id',
        'supervisor_id',
        'head_id',
        'progress_score',
        'progress_comment ',
        'final_score',
        'final_comment'
    ];


    public function userssuper()
    {
        return $this->belongsTo(User::class, 'supervisor_id', 'user_id');
    }
    public function usershead()
    {
        return $this->belongsTo(User::class, 'head_id', 'user_id');
    }
    public function projects()
    {
        return $this->belongsTo(Project::class, 'project_id', 'project_id');
    }


    }
