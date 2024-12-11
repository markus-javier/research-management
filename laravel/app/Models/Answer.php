<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;

    protected $fillable = ['response_details_id', 'question_id', 'answer_text', 'question_option_id', 'answer_boolean'];

    public function responseDetail()
    {
        return $this->belongsTo(ResponseDetail::class);
    }

    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    public function questionOption()
    {
        return $this->belongsTo(QuestionOption::class);
    }
}
