<?php

namespace App\Http\Controllers\Attendance;

use App\Http\Controllers\Controller;
use App\Models\Attendance\Attendance;
use App\Repository\Attendance\AttendanceRepositoryInterface;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    protected $attendees;

    public function __construct(AttendanceRepositoryInterface $attendees)
    {
        $this->attendees = $attendees;
    }

    public function index()
    {
        return $this->attendees->index();
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        return $this->attendees->store($request);
    }


    public function show($id)
    {
        return $this->attendees->show($id);
    }


    public function edit(Attendance $attendance)
    {
        //
    }


    public function update(Request $request, Attendance $attendance)
    {
        return $this->attendees->update($request);
    }

    public function destroy(Request $request)
    {
        return $this->attendees->destroy($request);
    }
}
