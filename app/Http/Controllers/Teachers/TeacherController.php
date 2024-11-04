<?php

namespace App\Http\Controllers\Teachers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTeachers;
use App\Repository\TeacherRepositoryInterface;

use Illuminate\Http\Request;

class TeacherController extends Controller
{
    protected $Teacher;
    public function __construct(TeacherRepositoryInterface $Teacher)
    {

        $this->Teacher = $Teacher;
    }

    public function index()
    {

        $Teachers =  $this->Teacher->getAllTeachers();

        return view('Pages.Teachers.teachers', compact('Teachers'));
    }

    public function create()
    {
        $specializations = $this->Teacher->GetSpecializations();

        $genders = $this->Teacher->GetGenders();

        return view('Pages.Teachers.Create', compact('specializations', 'genders'));
    }

    public function store(StoreTeachers $request)
    {
        return $this->Teacher->storeTeachers($request);
    }

    public function edit($id)
    {
        $Teachers = $this->Teacher->EditTeachers($id);

        $specializations = $this->Teacher->GetSpecializations();

        $genders = $this->Teacher->GetGenders();

        return view('Pages.Teachers.Edit', compact('Teachers', 'specializations', 'genders'));
    }


    public function update(Request $request)
    {

        return $this->Teacher->updateTeachers($request);
    }


    public function destroy(Request $request)
    {
        return $this->Teacher->DeleteTeachers($request);
    }
}