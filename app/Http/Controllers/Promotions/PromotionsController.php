<?php

namespace App\Http\Controllers\Promotions;

use App\Http\Controllers\Controller;
use App\Repository\StudentPromotions\studentPromotionRepositoryInterface;
use Illuminate\Http\Request;

class PromotionsController extends Controller
{
    protected $promotion;

    public function __construct(studentPromotionRepositoryInterface $promotion)
    {
        $this->promotion = $promotion;
    }


    // Controller Functions
    public function index()
    {
        return $this->promotion->index();
    }

    public function create()
    {
        return $this->promotion->create();
    }


    public function store(Request $request)
    {
        return $this->promotion->store($request);
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
        return $this->promotion->destroy($request);
    }
}
