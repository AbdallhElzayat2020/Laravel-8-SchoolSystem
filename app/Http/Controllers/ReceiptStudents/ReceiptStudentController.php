<?php

namespace App\Http\Controllers\ReceiptStudents;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddReceipeStudentRequest;
use App\Models\ReceiptStudents\ReceiptStudent;
use App\Repository\ReceiptStudents\ReceiptStudentsRepositoryInterface;
use Illuminate\Http\Request;

class ReceiptStudentController extends Controller
{
    protected $receipt;

    public function __construct(ReceiptStudentsRepositoryInterface $receipt)
    {
        $this->receipt = $receipt;
    }


    public function index()
    {
        return $this->receipt->index();
    }

    public function create()
    {
        //
    }

    public function store(AddReceipeStudentRequest $request)
    {
        return $this->receipt->store($request);
    }


    public function show($id)
    {
        return $this->receipt->show($id);
    }


    public function edit($id)
    {
        return $this->receipt->edit($id);
    }


    public function update(Request $request)
    {
        return $this->receipt->update($request);
    }


    public function destroy(Request $request)
    {
        return $this->receipt->destroy($request);
    }
}