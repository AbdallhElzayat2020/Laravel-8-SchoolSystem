<?php

namespace App\Http\Controllers\Exam;

use App\Http\Controllers\Controller;
use App\Models\Exam;
use App\Repository\Exams\ExamRepositoryInterface;
use Illuminate\Http\Request;

class ExamController extends Controller
{

    protected $exam;

    public function __construct(ExamRepositoryInterface $exam)
    {
        $this->exam = $exam;
    }

    public function index()
    {
        return $this->exam->index();
    }


    public function create()
    {
        return $this->exam->create();
    }


    public function store(Request $request)
    {
        return $this->exam->store($request);
    }


    public function edit($id)
    {
        return $this->exam->edit($id);
    }

    public function update(Request $request)
    {
        return $this->exam->update($request);
    }


    public function destroy(Request $request)
    {
        return $this->exam->destroy($request);
    }
}
