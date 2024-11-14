<?php

namespace App\Repository\StudentPromotions;


interface studentPromotionRepositoryInterface
{
    // index function
    public function index();

    // create function
    public function create();

    // store function
    public function store();


    // public edit
    public function edit();

    // update function
    public function update();
}
