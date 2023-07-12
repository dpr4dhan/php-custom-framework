<?php

namespace App\Controllers;

use App\View;

class Invoice
{
    public function index(): string
    {
        return View::make('invoices/index', 'layouts/app-layout');
    }
}