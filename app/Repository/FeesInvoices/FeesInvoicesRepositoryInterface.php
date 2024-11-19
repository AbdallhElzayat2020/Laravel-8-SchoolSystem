<?php

namespace App\Repository\FeesInvoices;

interface FeesInvoicesRepositoryInterface
{
    public function index();

    public function store($request);

    public function show($id);
}
