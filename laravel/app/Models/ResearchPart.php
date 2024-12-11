<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResearchPart extends Model
{
    use HasFactory;

    protected $fillable = ['research_project_id', 'title', 'content', 'order_number'];

    public function researchProject()
    {
        return $this->belongsTo(ResearchProject::class);
    }
}
