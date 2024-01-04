<?php

namespace App\Exports;


use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Models\Price;

class PricesExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Price::all();
    }

    public function headings(): array
    {
        // ここにヘッダー行のタイトルを定義します
        return [
            'ID', 'コード', '名前', '価格'
        ];
    }
}