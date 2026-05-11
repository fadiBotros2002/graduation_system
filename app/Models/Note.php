<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Note extends Model
{
    use HasFactory;
    protected $primaryKey = 'note_id';
    public $incrementing = true;

    protected $fillable = [
        'note_desc',
        'supervisor_id',
        'project_id'
    ];


    public function users()
    {
        return $this->belongsTo(User::class, 'supervisor_id', 'user_id');
    }


    public function projects()
    {
        return $this->belongsTo(Project::class, 'project_id', 'project_id');
    }
}
