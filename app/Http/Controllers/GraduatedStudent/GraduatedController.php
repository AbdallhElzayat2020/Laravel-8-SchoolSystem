<?php

namespace App\Http\Controllers\GraduatedStudent;

use App\Http\Controllers\Controller;
use App\Repository\GraduatedStudent\GraduatedStudentRepositoryInterface;
use Illuminate\Http\Request;

class GraduatedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $graduated;
    public function __construct(GraduatedStudentRepositoryInterface $graduated)
    {
        $this->graduated = $graduated;
    }

    public function index()
    {
        return $this->graduated->index();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return $this->graduated->create();
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->graduated->softDelete($request);
    }


    public function update(Request $request)
    {
        return $this->graduated->returnData($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        return $this->graduated->delete($request);
    }
}