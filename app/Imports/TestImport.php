<?php

namespace App\Imports;

use App\Models\Test;
use Maatwebsite\Excel\Concerns\OnEachRow;
use Maatwebsite\Excel\Row;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use PhpOffice\PhpSpreadsheet\Shared\Date; // この行を追加


class TestImport implements OnEachRow, WithHeadingRow
{
    public function headingRow(): int
    {
            
        return 1; // ヘッダー行が最初の行であることを示す
    }
    
    private $lastTyouhyouNo = 0; // 前回のtyouhyou_noの値を格納する変数

    public function __construct() {
        // データベースから最後のtyouhyou_noを取得し、$lastTyouhyouNoに格納する
        $this->lastTyouhyouNo = Test::max('tyouhyou_no');
    }

    public function onRow(Row $row) {
        $row = $row->toArray();

        // 各列からデータを取得し変換
        $tyouhyouNo = ++$this->lastTyouhyouNo;
        $customerCode = $row["D諸掛請求請求番号"]; // 2列目
        $customerName = $row["M請求先得意先名"]; // 3列目
        $billingClosingDate = isset($row['D諸掛請求請求日付']) ? Date::excelToDateTimeObject($row['D諸掛請求請求日付'])->format('Y-m-d') : null;
        $arrivalDate = isset($row['D諸掛請求納入日']) ? Date::excelToDateTimeObject($row['D諸掛請求納入日'])->format('Y-m-d') : null;
        $customsClearanceDate = isset($row['D諸掛請求納入日']) ? Date::excelToDateTimeObject($row['D諸掛請求納入日'])->format('Y-m-d') : null;
        $deliveryDate = '2023-12-22';
        $refNo = 'D' . $row["D諸掛請求明細商品名称"];
        $unitPrice = $row["D諸掛請求明細単価"];

        Test::updateOrCreate(
            ['tyouhyou_no' => $tyouhyouNo],
            [
                'customer_code' => $customerCode,
                'customer_name' => $customerName,
                'billing_closing_date' => $billingClosingDate,
                'arrival_date' => $arrivalDate,
                'customs_clearance_date' => $customsClearanceDate,
                'delivery_date' => $deliveryDate,
                'ref_no' => $refNo,
                'unit_price' => $unitPrice,
                // その他のカラムはNULLで保存
            ]
        );
    }
}
