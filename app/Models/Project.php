<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ['team_id', 'user_id', 'title', 'description'];

    public function notes()
    {
        return $this->hasMany(ProjectNote::class, 'project_id', 'id');
    }

}
