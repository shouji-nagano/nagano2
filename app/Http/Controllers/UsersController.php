<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel; 
use App\Imports\UsersImport;



// use App\Exports\UsersExport; 
// use Maatwebsite\Excel\Concerns\FromCollection;
// use Maatwebsite\Excel\Concerns\WithHeadings;


    
    // public function export(){

	   // return Excel::download(new UsersExport, 'users.xlsx');

    // }

class UsersController extends Controller
{

    public function index(){

    	return view('index');

    }

    public function store(Request $request){

		$file = $request->file('file');

		Excel::import(new UsersImport, $file);

    }
}


