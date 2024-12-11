<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommunityNeed extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'title', 'description', 'matched_research_project_id', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function matchedResearchProject()
    {
        return $this->belongsTo(ResearchProject::class, 'matched_research_project_id');
    }
}
