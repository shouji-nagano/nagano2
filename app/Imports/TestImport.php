<?php

namespace App\Imports;

use App\Models\test;
use Maatwebsite\Excel\Concerns\ToModel;

class TestImport implements OnEachRow, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function onRow(Row $row)
    {
        $row = $row->toArray();
        // testテーブルのidで、CSVと合致するものがあれば更新し、なければ新規作成する
        test::updateOrCreate(
            [
                'id' => $row['id']
            ],
            [
            '帳票No' => $row['invoice_no'],
            '顧客コード' => $row['customer_code'],
            '顧客名' => $row['customer_name'],
            '請求締日' => $row['billing_closing_date'], // 日付形式に注意
            '入港日' => $row['arrival_date'], // 日付形式に注意
            '通関許可日' => $row['customs_clearance_date'], // 日付形式に注意
            '納入日' => $row['delivery_date'], // 日付形式に注意
            'REF_No' => $row['ref_no'],
            'Invoice_No' => $row['invoice_no'],
            'No' => $row['no'],
            '請求名' => $row['billing_name'],
            '規格' => $row['specification'],
            '数量' => $row['quantity'],
            '単位' => $row['unit'],
            '明細単価' => $row['unit_price'],
            '合計金額税抜' => $row['total_amount_excluding_tax'],
            '税区分テキスト' => $row['tax_category_text'],
            '税率' => $row['tax_rate'],
            '摘要' => $row['summary'],
            ]
        );
    }
    
    protected function importCsv(Content $content, Request $request)
    {
        // アップロードされたCSVファイル
        $file = $request->file('file');
        // インポート
        Excel::import(new TestImport(), $file);
    }

}
