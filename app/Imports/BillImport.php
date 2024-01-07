<?php

namespace App\Imports;

use App\Models\BillSourceData;
use Maatwebsite\Excel\Concerns\OnEachRow;
use Maatwebsite\Excel\Row;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Illuminate\Support\Facades\Log;


class BillImport implements OnEachRow, WithHeadingRow
{
    public function headingRow(): int
    {
        return 1; // ヘッダー行を指定
    }

    private $lastTyouhyouNo = 0;


    public function onRow(Row $row){
        $rowArray = $row->toArray();


        // BillSourceDataモデルの更新または作成
        BillSourceData::updateOrCreate(
            [
                'misc_billing_request_number' => $rowArray['D諸掛請求請求番号'],
                'misc_billing_request_date' => $rowArray['D諸掛請求請求日付'],
                'misc_billing_summary' => $rowArray['D諸掛請求摘要'],
                'misc_billing_total_amount' => $rowArray['D諸掛請求合計額'],
                'misc_billing_taxable_amount' => $rowArray['D諸掛請求課税対象額'],
                'misc_billing_nontaxable_amount' => $rowArray['D諸掛請求非課税対象額'],
                'misc_billing_exempt_amount' => $rowArray['D諸掛請求免税対象額'],
                'misc_billing_tax_amount' => $rowArray['D諸掛請求消費税額'],
                'misc_billing_request_total' => $rowArray['D諸掛請求請求合計額'],
                'misc_billing_arrival_departure_date' => $rowArray['D諸掛請求入出港日'],
                'misc_billing_ship_name' => $rowArray['D諸掛請求船名'],
                'misc_billing_customs_clearance_date' => $rowArray['D諸掛請求通関許可日'],
                'misc_billing_delivery_date' => $rowArray['D諸掛請求納入日'],
                'misc_billing_ref_no' => $rowArray['D諸掛請求REFNO'],
                'misc_billing_invoice_no' => $rowArray['D諸掛請求INVOICENO'],
                'misc_billing_container_count' => $rowArray['D諸掛請求コンテナ数'],
                'misc_billing_item_name' => $rowArray['D諸掛請求明細商品名称'],
                'misc_billing_item_specification' => $rowArray['D諸掛請求明細規格仕様'],
                'misc_billing_item_quantity' => $rowArray['D諸掛請求明細数量'],
                'misc_billing_item_unit' => $rowArray['D諸掛請求明細単位名称'],
                'misc_billing_item_unit_price' => $rowArray['D諸掛請求明細単価'],
                'misc_billing_item_amount' => $rowArray['D諸掛請求明細金額'],
                'misc_billing_item_tax_category' => $rowArray['D諸掛請求明細税区分名称'],
                'misc_billing_item_remarks' => $rowArray['D諸掛請求明細備考'],
                'company_name' => $rowArray['M自社名称'],
                'company_address1' => $rowArray['M自社住所１'],
                'company_bank_name1' => $rowArray['M自社銀行名1'],
                'company_bank_branch1' => $rowArray['M自社銀行支店名1'],
                'company_bank_account_type1' => $rowArray['M自社銀行口座種類1'],
                'company_bank_account_number1' => $rowArray['M自社銀行口座番号1'],
                'company_bank_name2' => $rowArray['M自社銀行名2'],
                'company_bank_branch2' => $rowArray['M自社銀行支店名2'],
                'company_bank_account_type2' => $rowArray['M自社銀行口座種類2'],
                'company_bank_account_number2' => $rowArray['M自社銀行口座番号2'],
                'company_office_name6' => $rowArray['M自社営業所名6'],
                'company_office_phone6' => $rowArray['M自社営業所電話番号6'],
                'company_office_fax6' => $rowArray['M自社営業所FAX番号6'],
                'client_code' => $rowArray['M得意先得意先コード'],
                'client_address1' => $rowArray['M得意先住所１'],
                'client_address2' => $rowArray['M得意先住所２'],
                'billing_client_name' => $rowArray['M請求先得意先名'],
            ]
        );
    }


    
}
