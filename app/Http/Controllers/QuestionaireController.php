<?php

namespace App\Http\Controllers;

use App\Models\Questionaire;
use Illuminate\Http\Request;

class QuestionaireController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        return view('questionaires.create');
    }

    public function store(Request $request)
    {
        $object = $request->validate([
            'title' => 'required',
            'purpose' => 'required'
        ]);
        $object['user_id'] = auth()->user()->id;

        $questionaire = auth()->user()->questionaires()->create($object);

        return redirect('/questionaires/' . $questionaire->id);
    }

    public function show(Questionaire $questionaire)
    {
        $questionaire->load('questions.answers');

        $responses_count = $questionaire->surveys()->count();
        $answers_count = [];

        foreach ($questionaire->questions as $question) {
            $answers_count[$question->id] = [];

            foreach ($question->answers as $answer) {
                $answers_count[$question->id][$answer->id] = intval(($answer->responses()->count() * 100) / $responses_count);
            }
        }

        return view('questionaires.show', compact('questionaire', 'responses_count', 'answers_count'));
    }

    public function edit(Questionaire $questionaire)
    {
        return view('questionaires.edit', compact('questionaire'));
    }
    public function update(Request $request, Questionaire $questionaire)
    {
        $data = $request->validate([
            'title' => 'required',
            'purpose' => 'required',
        ]);


        $questionaire = $questionaire->update($data);
        dd($questionaire);
        return redirect('/questionaires/' . $questionaire->id);
    }
}
