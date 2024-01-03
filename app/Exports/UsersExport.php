<?php

namespace App\Exports;

use App\Models\User; //Laravel8以降の場合
// use Maatwebsite\Excel\Concerns\FromCollection;
// use Maatwebsite\Excel\Concerns\WithHeadings;/**１行目にタイトルをつける時に追加*/
// use Maatwebsite\Excel\Concerns\WithTitle;/**sheet名を変更するときに追加*/
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;



// class UsersExport implements FromView
// {
//     /**
//     * @return \Illuminate\Support\Collection
//     // */
//     // public function collection()
    
//     // {
//     //     // オールの場合
//     //     return User::all();
//     //     // 配列でカラムを選択する場合
//     //     // return User::select('id','name','email')->get();
//     // }
    
    
//     // １行目にタイトルをつける
    
//     public function headings():array
// 	{
// 		return [
// 				'id', 
// 				'#',
// 				'name', 
// 				'email', 
// 				'email_verified_at', 
// 				'created_at', 
// 				'updated_at'
// 			]; 
// 	}
	
// // 	sheetに名前をつける
// 	public function title(): string{
// 		return 'テストsheet';
// 	}
	
// 	public function view(): View
//     {
//         return view('exports.users', [
//             'users' => User::all()
//         ]);
//     }
    
    class UsersExport implements FromView
{

    public function view(): View
    {
        return view('exports.users', [
            'users' => User::all()
        ]);
    }
}

