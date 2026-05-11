<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Member extends Model
{
    use HasFactory;

    protected $primaryKey = 'member_id';
    public $incrementing = true;

    protected $fillable = [
        'project_id',
        'student_id'
    ];


    public function projects()
    {
        return $this->belongsTo(Project::class, 'project_id', 'project_id');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'student_id', 'user_id');
    }

}
