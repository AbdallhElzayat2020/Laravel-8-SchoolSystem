<?php

namespace App\Repository\GraduatedStudent;

interface GraduatedStudentRepositoryInterface
{
    public function index();

    public function create();

    public function softDelete($request);

    public function returnData($request);

    public function delete($request);
}