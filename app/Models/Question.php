<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
        'questionaire_id', 'question',
    ];

    public function questionaire() {
        return $this->belongsTo(Questionaire::class);
    }

    public function answers() {
        return $this->hasMany(Answer::class);
    }

    public function responses() {
        return $this->hasMany(SurveyResponse::class);
    }
    use HasFactory;
}
