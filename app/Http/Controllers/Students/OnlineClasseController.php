<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Http\Traits\MeetingZoomTrait;
use App\Models\Grades\Grade;
use App\Models\online_classe\Online_classe;
use Carbon\Carbon;
use Illuminate\Http\Request;
use MacsiDigital\Zoom\Facades\Zoom;

class OnlineClasseController extends Controller
{

    use MeetingZoomTrait;

    public function index()
    {
        $online_classes = Online_classe::all();
        return view('Pages.OnlineClasses.index', compact('online_classes'));
    }


    public function create()
    {
        $Grades = Grade::all();
        return view('Pages.OnlineClasses.add', compact('Grades'));
    }

    public function indirectCreate()
    {
        $Grades = Grade::all();
        return view('Pages.OnlineClasses.indirect', compact('Grades'));
    }

    public function indirectStore(Request $request)
    {
        try {
            // تحويل وقت البدء إلى التنسيق الصحيح
            $start_at = date('Y-m-d H:i:s', strtotime($request->start_time));

            // إنشاء السجل
            Online_classe::create([
                'integration' => false,
                'Grade_id' => $request->Grade_id,
                'Classroom_id' => $request->Classroom_id,
                'section_id' => $request->section_id,
                'user_id' => auth()->user()->id,
                'meeting_id' => $request->meeting_id,
                'topic' => $request->topic,
                'start_at' => $start_at,
                'duration' => $request->duration,
                'password' => $request->password,
                'start_url' => $request->start_url,
                'join_url' => $request->join_url,
            ]);

            toastr()->success(trans('messages.success'));
            return redirect()->route('online_classes.index');

        } catch (\Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }
    }


    public function store(Request $request)
    {
        try {
            // قم بإنشاء الاجتماع على Zoom
            $meeting = $this->createMeeting($request);

            // تحويل وقت البدء إلى التنسيق الصحيح
            $start_at = date('Y-m-d H:i:s', strtotime($request->start_time));

            // إنشاء السجل
            Online_classe::create([
                'Grade_id' => $request->Grade_id,
                'integration' => true,
                'Classroom_id' => $request->Classroom_id,
                'section_id' => $request->section_id,
                'user_id' => auth()->user()->id,
                'meeting_id' => $meeting->id,
                'topic' => $request->topic,
                'start_at' => $start_at,
                'duration' => $meeting->duration,
                'password' => $meeting->password,
                'start_url' => $meeting->start_url,
                'join_url' => $meeting->join_url,
            ]);

            toastr()->success(trans('messages.success'));
            return redirect()->route('online_classes.index');

        } catch (\Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy(Request $request)
    {
        try {

            $info = Online_classe::find($request->id);
            if ($info->integration == true) {
                $meeting = Zoom::meeting()->find($request->meeting_id);
                $meeting->delete();
                // online_classe::where('meeting_id', $request->id)->delete();
                online_classe::destroy($request->id);
            } else {
                // online_classe::where('meeting_id', $request->id)->delete();
                online_classe::destroy($request->id);
            }
            toastr()->success(trans('messages.Delete'));
            return redirect()->route('online_classes.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }
    }
}
