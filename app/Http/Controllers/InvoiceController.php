<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    function show (){
        $invoices = Invoice::all();
        // return dd($invoices);
        return view('invoice.list', compact('invoices'));
    }
}
