<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Update extends Model
{
    use HasFactory;

    protected $primaryKey = 'update_id';
    public $incrementing = true;

    protected $fillable = [
        'update_desc',
        'project_id'
    ];


    public function projects()
    {
        return $this->belongsTo(Project::class, 'project_id', 'project_id');
    }
}
