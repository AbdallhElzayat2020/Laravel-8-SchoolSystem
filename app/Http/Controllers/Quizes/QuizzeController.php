<?php

namespace App\Http\Controllers\Quizes;

use App\Http\Controllers\Controller;
use App\Models\Quizzes\Quizze;
use App\Repository\Quizze\QuizzeRepositoryInterface;
use Illuminate\Http\Request;

class QuizzeController extends Controller
{

    protected $quiz;

    public function __construct(QuizzeRepositoryInterface $quiz)
    {
        $this->quiz = $quiz;
    }

    public function index()
    {
        return $this->quiz->index();
    }


    public function create()
    {
        return $this->quiz->create();

    }


    public function store(Request $request)
    {
        return $this->quiz->store($request);
    }


    public function edit($id)
    {
        return $this->quiz->edit($id);

    }


    public function update(Request $request)
    {
        return $this->quiz->update($request);

    }


    public function destroy(Request $request)
    {
        return $this->quiz->destroy($request);

    }
}
