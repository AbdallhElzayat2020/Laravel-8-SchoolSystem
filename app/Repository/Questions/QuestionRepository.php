<?php

namespace App\Repository\Questions;

use App\Models\Questions\Question;
use App\Models\Quizzes\Quizze;
use App\Repository\Questions\QuestionRepositoryInterface;

class QuestionRepository implements QuestionRepositoryInterface
{
    public function index()
    {
        $questions = Question::all();
        return view('Pages.questions.index', compact('questions'));
    }

    public function create()
    {
        $quizzes = Quizze::all();
        return view('Pages.questions.add', compact('quizzes'));
    }

    public function store($request)
    {
        try {
            $question = new Question();
            $question->title = $request->title;
            $question->answers = $request->answers;
            $question->right_answer = $request->right_answer;
            $question->score = $request->score;
            $question->quizze_id = $request->quizze_id;
            $question->save();
            toastr()->success(trans('messages.success'));
            return redirect()->route('questions.create');
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        $question = Question::FindOrFail($id);
        $quizzes = Quizze::all();
        return view('pages.Questions.edit', compact('question', 'quizzes'));
    }

    public function update($request)
    {
        try {
            $question = Question::FindOrFail($request->id);
            $question->title = $request->title;
            $question->answers = $request->answers;
            $question->right_answer = $request->right_answer;
            $question->score = $request->score;
            $question->quizze_id = $request->quizze_id;
            $question->save();
            toastr()->success(trans('messages.Update'));
            return redirect()->route('questions.index');
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function destroy($request)
    {
        try {
            Question::destroy($request->id);
            toastr()->error(trans('messages.Delete'));
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
