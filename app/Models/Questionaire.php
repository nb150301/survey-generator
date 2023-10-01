<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Questionaire extends Model
{
    protected $fillable = [
        'title', 'purpose', 'user_id'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function questions() {
        return $this->hasMany(Question::class);
    }

    public function surveys() {
        return $this->hasMany(Survey::class);
    }
    use HasFactory;
}
