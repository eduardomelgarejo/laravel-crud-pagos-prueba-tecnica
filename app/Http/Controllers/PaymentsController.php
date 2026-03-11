<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentsController extends Controller
{
    public function index()
    {
        return view('payments.list');
    }

    public function create()
    {
        return view('payments.create');
    }
}
