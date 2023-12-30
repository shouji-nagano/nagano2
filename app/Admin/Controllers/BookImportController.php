<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\BooksImport;
use Maatwebsite\Excel\Facades\Excel;

class BookImportController extends Controller
{
    public function showImportForm()
    {
        return view('import_form'); // インポート用のビューを表示
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:xlsx,xls',
        ]);

        Excel::import(new BooksImport, $request->file('file'));

        return back()->with('success', 'Books imported successfully.');
    }
}