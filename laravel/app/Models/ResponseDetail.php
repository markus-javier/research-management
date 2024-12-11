<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResponseDetail extends Model
{
    use HasFactory;

    protected $fillable = ['respondent_id', 'research_project_id'];

    public function respondent()
    {
        return $this->belongsTo(Respondent::class);
    }

    public function researchProject()
    {
        return $this->belongsTo(ResearchProject::class);
    }

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }
}
