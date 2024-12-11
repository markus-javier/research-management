<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];

    public function respondents()
    {
        return $this->hasMany(Respondent::class);
    }

    public function researchProjects()
    {
        return $this->belongsToMany(ResearchProject::class, 'research_locations');
    }
}
