<?php

namespace App\Http\Controllers;

use App\Models\Price;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PricesExport;
use App\Imports\PricesImport;

class PricesController extends Controller
{
    
    public function index()
{
    $prices = Price::all();
    return view('admin.prices.index', compact('prices'));
}

    public function store(Request $request)
    {
   		$file = $request->file('file');

		Excel::import(new PricesImport, $file);
    }

    public function download()
    {
        return Excel::download(new PricesExport, 'prices.xlsx');
    }
}
