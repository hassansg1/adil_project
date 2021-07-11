<?php

namespace App\Http\Controllers;

use App\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    //

    public function store(Request $request)
    {
        Invoice::create($request->except('_token'));
        return redirect('/')->with('success', 'Success. Data is saved successfully.');
    }
}
