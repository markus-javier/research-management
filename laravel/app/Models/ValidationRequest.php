<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ValidationRequest extends Model
{
    use HasFactory;

    protected $fillable = ['research_project_id', 'user_id', 'status', 'comments'];

    public function researchProject()
    {
        return $this->belongsTo(ResearchProject::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
