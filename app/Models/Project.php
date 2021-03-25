<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ['team_id', 'user_id', 'title', 'description'];

    public function notes()
    {
        return $this->hasMany(ProjectNote::class, 'project_id', 'id');
    }
    public function scopeOwned($query)
    {
        return $query->where('user_id', Auth::user()->id);
    }

}
