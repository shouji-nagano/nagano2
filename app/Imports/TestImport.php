<?php

namespace App\Imports;

use App\Models\Test;
use App\Models\Price;
use Maatwebsite\Excel\Concerns\OnEachRow;
use Maatwebsite\Excel\Row;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class TestImport implements OnEachRow, WithHeadingRow
{
    public function headingRow(): int
    {
        return 1; // ヘッダー行を指定
    }

    private $lastTyouhyouNo = 0;

    public function __construct() {
        // データベースから最後のtyouhyou_noを取得
        $lastNo = Test::max('tyouhyou_no');

        // 数値部分だけを抽出して保持
        $this->lastTyouhyouNo = intval(substr($lastNo, 5));
    }

    public function onRow(Row $row) {
        $rowArray = $row->toArray();

        // 数値部分をインクリメントして、新しいtyouhyouNoを生成
        $tyouhyouNo = 'S6660' . ++$this->lastTyouhyouNo;

        $customerCode = $rowArray["D諸掛請求請求番号"];
        $customerName = $rowArray["M請求先得意先名"];
        $billingClosingDate = isset($row['D諸掛請求請求日付']) ? Date::excelToDateTimeObject($row['D諸掛請求請求日付'])->format('Y-m-d') : null;
        $arrivalDate = isset($row['D諸掛請求納入日']) ? Date::excelToDateTimeObject($row['D諸掛請求納入日'])->format('Y-m-d') : null;
        $customsClearanceDate = isset($row['D諸掛請求納入日']) ? Date::excelToDateTimeObject($row['D諸掛請求納入日'])->modify('-3 days')->format('Y-m-d') : null;
        $deliveryDate = '2023-12-22';

        // refNoから送料を削除
        $refNo = str_replace('送料', '', html_entity_decode($rowArray["D諸掛請求明細商品名称"], ENT_QUOTES | ENT_XML1, 'UTF-8'));



        $quantity = $rowArray["D諸掛請求明細数量"];

        $productCode = $rowArray["D諸掛請求明細商品コード"];
        
            // Pricesテーブルから商品データを取得
        $product = Price::where('code', $productCode)->first();
    
        if ($product) {
            // 商品データが見つかった場合の処理
            $productName = $product->name;
            $unitPrice = $product->price;
            // 他の処理...
        } else {
            // 商品データが見つからない場合の処理
            $productName = '不明';
            $unitPrice = 0;
            Log::error('商品コード ' . $productCode . ' に対応する商品が見つかりません。');

        }
        $total_amount_excluding_tax = $unitPrice * $quantity;



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
                'quantity' => $quantity,
                'total_amount_excluding_tax' => $total_amount_excluding_tax,
                'specification' => $productName,
                'unit_price' => $unitPrice,

            ]
        );
    }
}
