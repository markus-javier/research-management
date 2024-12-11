<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ResearchProject extends Model
{
    //
    use HasFactory;

    protected $fillable = ['user_id', 'title', 'description', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function researchParts()
    {
        return $this->hasMany(ResearchPart::class);
    }

    public function communityNeed()
    {
        return $this->hasOne(CommunityNeed::class, 'matched_research_project_id');
    }

    public function locations()
    {
        return $this->belongsToMany(Location::class, 'research_locations');
    }

    public function questionnaires()
    {
        return $this->hasMany(Questionnaire::class);
    }

    public function validationRequests()
    {
        return $this->hasMany(ValidationRequest::class);
    }

    public function responseDetails()
    {
        return $this->hasMany(ResponseDetail::class);
    }
}
