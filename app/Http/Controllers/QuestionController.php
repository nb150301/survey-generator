<?php

namespace App\Http\Controllers;

use App\Models\Questionaire;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function create($questionaireId) {
        $questionaire = Questionaire::find($questionaireId);
        return view('questions.create', [
            'questionaire' => $questionaire
        ]);
    }

    public function store($questionaireId) {
        $questionaire = Questionaire::find($questionaireId);
        $data = request()->validate([
            'question.question' => 'required',
            'answers.*.answer' => 'required'
        ]);

        $question = $questionaire->questions()->create($data['question']);
        $answers = $question->answers()->createMany($data['answers']);

        return redirect('/questionaires/' . $questionaire->id);
    }
}
