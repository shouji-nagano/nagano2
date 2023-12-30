<?php

namespace App\Admin\Actions;

use Encore\Admin\Actions\Action;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\BooksImport;

class ImportBook extends Action
{
    public function handle(Request $request)
    {
        Excel::import(new BooksImport, $request->file('file'));
        return $this->response()->success('インポートが完了しました。')->refresh();
    }

    public function form()
    {
        $this->file('file', 'エクセルファイルを選択');
    }

    // public function html()
    // {
    //     return "<a class='btn btn-sm btn-success import-excel'>Excelインポート</a>";
    // }
}
