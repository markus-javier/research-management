<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Questionnaire extends Model
{
    use HasFactory;

    protected $fillable = ['research_project_id', 'title', 'description'];

    public function researchProject()
    {
        return $this->belongsTo(ResearchProject::class);
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }
}
