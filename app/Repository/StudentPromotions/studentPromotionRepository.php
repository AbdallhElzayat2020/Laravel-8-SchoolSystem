<?php

namespace App\Repository\StudentPromotions;

use App\Models\Grades\Grade;

class studentPromotionRepository implements studentPromotionRepositoryInterface
{

    public function index()
    {
        $Grades = Grade::all();

        return view('Pages.Students.Promotions.index', compact('Grades'));
    }
    public function store()
    {
        //
    }

    public function create()
    {
        //
    }

    // update function
    public function update()
    {
        //
    }

    // public edit
    public function edit()
    {
        //
    }
}
