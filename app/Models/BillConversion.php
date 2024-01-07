<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BillConversion extends Model
{
    // データベーステーブル名
    protected $table = 'bill_conversion';

    // テーブルのカラム名を列挙
    protected $fillable = [
        'bill_no', // 帳票No (Bill Number)
        'customer_code', // 顧客コード (Customer Code)
        'customer_name', // 顧客名 (Customer Name)
        'billing_closure_date', // 請求締日 (Billing Closure Date)
        'arrival_date', // 入港日 (Arrival Date)
        'customs_clearance_date', // 通関許可日 (Customs Clearance Date)
        'delivery_date', // 納入日 (Delivery Date)
        'ref_no', // REF_No (Reference Number)
        'invoice_no', // Invoice_No (Invoice Number)
        'number', // No (Number)
        'ship_name', // 船名 (Ship Name)
        'billing_name', // 請求名 (Billing Name)
        'standard', // 規格 (Standard)
        'quantity', // 数量 (Quantity)
        'unit', // 単位 (Unit)
        'unit_price', // 明細単価 (Unit Price)
        'total_amount_excluding_tax', // 合計金額(税抜) (Total Amount Excluding Tax)
        'tax_category_text', // 税区分(テキスト) (Tax Category - Text)
        'tax_rate', // 税率 (Tax Rate)
        'description', // 摘要 (Description)
        'imported_file_id', // 外部キー
    ];

    // 外部キーとしての関連を定義
    public function importedFile()
    {
        return $this->belongsTo(ImportedFile::class, 'imported_file_id');
    }

    // 他の必要なメソッドやロジックを追加
}
