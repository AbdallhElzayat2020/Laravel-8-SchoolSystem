<?php

namespace App\Http\Controllers\StudentFeesInvoices;

use App\Http\Controllers\Controller;
use App\Repository\FeesInvoices\FeesInvoicesRepositoryInterface;
use Illuminate\Http\Request;

class FeesInvoicesController extends Controller
{

    protected $feesInvoices;

    public function __construct(FeesInvoicesRepositoryInterface $feesInvoices)
    {
        $this->feesInvoices = $feesInvoices;
    }




    public function index()
    {
        return $this->feesInvoices->index();
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        return $this->feesInvoices->store($request);
    }

    public function show($id)
    {
        return $this->feesInvoices->show($id);
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
