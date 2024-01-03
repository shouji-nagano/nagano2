<?php

namespace App\Imports;

use App\Models\Test;
use Maatwebsite\Excel\Concerns\OnEachRow;
use Maatwebsite\Excel\Row;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use PhpOffice\PhpSpreadsheet\Shared\Date; // この行を追加


class TestImport implements OnEachRow, WithHeadingRow
{
    public function onRow(Row $row){
        $row = $row->toArray();

            $billingClosingDate = isset($row['billing_closing_date']) 
                ? Date::excelToDateTimeObject($row['billing_closing_date'])->format('Y-m-d') : null;
            $arrivalDate = isset($row['arrival_date']) 
                ? Date::excelToDateTimeObject($row['arrival_date'])->format('Y-m-d') 
                : null;
            
            $customsClearanceDate = isset($row['customs_clearance_date']) 
                ? Date::excelToDateTimeObject($row['customs_clearance_date'])->format('Y-m-d') 
                : null;
            
            $deliveryDate = isset($row['delivery_date']) 
                ? Date::excelToDateTimeObject($row['delivery_date'])->format('Y-m-d') 
                : null;

        Test::updateOrCreate(
            ['tyouhyou_no' => $row['tyouhyou_no']],
            [
                'customer_code' => $row['customer_code'],
                'customer_name' => $row['customer_name'],
                'billing_closing_date' => $billingClosingDate,
                'arrival_date' => $arrivalDate,
                'customs_clearance_date' => $customsClearanceDate,
                'delivery_date' => $deliveryDate,
                'ref_no' => $row['ref_no'],
                'invoice_no' => $row['invoice_no'],
                'no' => $row['no'],
                'billing_name' => $row['billing_name'],
                'specification' => $row['specification'],
                'quantity' => $row['quantity'],
                'unit' => $row['unit'],
                'unit_price' => $row['unit_price'],
                'total_amount_excluding_tax' => $row['total_amount_excluding_tax'],
                'tax_category_text' => $row['tax_category_text'],
                // 'percentage' => $row['percentage'],
                // 'tax_rate' => $row['tax_rate'],
                'summary' => $row['summary'],
            ]
        );
    }
}
