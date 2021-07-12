<?php

namespace App\Http\Controllers;

use App\Files;
use App\Invoice;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $invoices = Invoice::orderBy('id','desc')->get();

        return view('admin.listing')->with(['invoices' => $invoices]);
    }

    public function showFiles()
    {
        $files = Files::orderBy('id','desc')->get();

        return view('admin.files')->with(['files' => $files]);
    }
}
