<?php

namespace App\Http\Controllers\Fees;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFeesRequest;
use App\Models\Fees\Fees;
use App\Repository\StudentFees\FeesStudentRepositoryinterface;
use Illuminate\Http\Request;

class FeesController extends Controller
{
    protected $fees;
    public function __construct(FeesStudentRepositoryinterface $fees)
    {
        $this->fees = $fees;
    }

    public function index()
    {
        return $this->fees->index();
    }

    public function create()
    {
        return $this->fees->create();
    }


    public function store(StoreFeesRequest $request)
    {
        return $this->fees->store($request);
    }


    // public function show($id)
    // {
    //     return $this->fees->show($id);
    // }


    public function edit($id)
    {
        return $this->fees->edit($id);
    }


    public function update(StoreFeesRequest  $request)
    {
        return $this->fees->update($request);
    }

    public function destroy(Request $request)
    {
        return $this->fees->destroy($request);
    }
}
