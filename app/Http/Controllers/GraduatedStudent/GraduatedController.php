<?php

namespace App\Http\Controllers\GraduatedStudent;

use App\Http\Controllers\Controller;
use App\Repository\GraduatedStudent\GraduatedStudentRepositoryInterface;
use Illuminate\Http\Request;

class GraduatedController extends Controller
{

    protected $graduated;
    public function __construct(GraduatedStudentRepositoryInterface $graduated)
    {
        $this->graduated = $graduated;
    }

    public function index()
    {
        return $this->graduated->index();
    }

    public function create()
    {
        return $this->graduated->create();
    }


    public function store(Request $request)
    {
        return $this->graduated->softDelete($request);
    }


    public function update(Request $request)
    {
        return $this->graduated->returnData($request);
    }

    public function destroy(Request $request)
    {
        return $this->graduated->delete($request);
    }
}