<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Respondent extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'age', 'gender', 'location_id'];

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function responseDetails()
    {
        return $this->hasMany(ResponseDetail::class);
    }
}
