<?php

namespace App\Repository\StudentPromotions;


interface studentPromotionRepositoryInterface
{
    // index function
    public function index();

    // create function
    public function create();

    // store function
    public function store($request);

    //Destroy function
    public function destroy($request);
}
