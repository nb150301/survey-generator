<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = [
        'question_id', 'answer'
    ];

    public function question() {
        return $this->belongsTo(Question::class);
    }

    public function responses() {
        return $this->hasMany(SurveyResponse::class);
    }

    public function firstName(): Attribute
    {
        return Attribute::make(
            get: function ($value, $attribute) {
                return $this->attributes['answer'] . 'hello';
            }
        );
    }
    use HasFactory;
}
