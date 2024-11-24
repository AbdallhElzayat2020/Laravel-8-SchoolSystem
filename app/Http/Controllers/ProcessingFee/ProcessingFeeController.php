<?php

namespace App\Http\Controllers\ProcessingFee;

use App\Http\Controllers\Controller;
use App\Models\ProcessingFee\ProcessingFee;
use App\Repository\ProcessingFees\ProcessingFeeRepositoryInterface;
use Illuminate\Http\Request;

class ProcessingFeeController extends Controller
{

    protected $processingFee;
    public function __construct(ProcessingFeeRepositoryInterface $processingFee)
    {
        $this->processingFee = $processingFee;
    }

    public function index()
    {

        return $this->processingFee->index();
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        return $this->processingFee->store($request);
    }

    public function show($id)
    {
        return $this->processingFee->show($id);
    }


    public function edit($id)
    {
        return $this->processingFee->edit($id);
    }

    public function update(Request $request)
    {
        return $this->processingFee->update($request);
    }


    public function destroy(Request $request)
    {
        return $this->processingFee->destroy($request);
    }
}