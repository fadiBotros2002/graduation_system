<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Project extends Model
{
    use HasFactory;
    protected $primaryKey = 'project_id';
    public $incrementing = true;

    protected $fillable = [
        'title',
        'project_desc',
        'status',
        'member_id',
        'supervisor_id'
    ];




    public function users()
    {
        return $this->belongsTo(User::class, 'supervisor_id', 'user_id');
    }


    public function notes()
    {
        return $this->hasMany(Note::class, 'project_id', 'project_id');
    }


    public function updates()
    {
        return $this->hasMany(Update::class, 'project_id', 'project_id');
    }


    public function members()
    {
        return $this->hasMany(Member::class, 'project_id', 'project_id');
    }
}
