<?php

namespace App\Repository\Library;

use App\Http\Traits\AttachFilesTrait;
use App\Models\Grades\Grade;
use App\Models\Library\Library;
use App\Repository\Library\LibraryRepositoryInterface;

class LibraryRepository implements LibraryRepositoryInterface
{
    use  AttachFilesTrait;

    public function index()
    {
        $books = Library::all();
        return view('Pages.library.index', compact('books'));
    }

    public function create()
    {
        $grades = Grade::all();
        return view('Pages.library.create', compact('grades'));
    }

    public function store($request)
    {
        try {
            $books = new Library();
            $books->title = $request->title;
            $books->file_name = $request->file('file_name')->getClientOriginalName();
            $books->Grade_id = $request->Grade_id;
            $books->Classroom_id = $request->Classroom_id;
            $books->section_id = $request->section_id;
            $books->teacher_id = 1;
            $books->save();
            $this->uploadFile($request, 'file_name');

            toastr()->success(trans('messages.success'));
            return redirect()->route('library.create');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

    public
    function edit($id)
    {
        $grades = Grade::all();
        $book = Library::findOrFail($id);
        return view('Pages.library.edit', compact('book', 'grades'));
    }

    public
    function update($request)
    {

        try {

            $book = Library::findOrFail($request->id);
            $book->title = $request->title;

            if ($request->hasFile('file_name')) {
                $this->deleteFile($book->file_name); // حذف القديم
                $file_name = $request->file('file_name')->getClientOriginalName();
                $this->uploadFile($request, 'file_name'); // رفع الجديد
                $book->file_name = $file_name;
            }

            $book->Grade_id = $request->Grade_id;
            $book->classroom_id = $request->Classroom_id;
            $book->section_id = $request->section_id;
            $book->teacher_id = 1;
            $book->save();
            toastr()->success(trans('messages.Update'));
            return redirect()->route('library.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }

    }

    public
    function destroy($request)
    {
        $this->deleteFile($request->file_name);
        Library::destroy($request->id);
        toastr()->success(trans('messages.Delete'));
        return redirect()->route('library.index');
    }

    public
    function download($filename)
    {
        return response()->download(public_path('attachments/library/' . $filename));
    }
}
