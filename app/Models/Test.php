<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    use HasFactory;

    protected $table = 'tests';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
protected $fillable = [
        'tyouhyou_no', // '帳票No' ではなく、英語のカラム名
        'customer_code', // '顧客コード' ではなく、英語のカラム名
        'customer_name',            // 旧：'顧客名'
        'billing_closing_date',     // 旧：'請求締日'、日付形式に注意
        'arrival_date',             // 旧：'入港日'、日付形式に注意
        'customs_clearance_date',   // 旧：'通関許可日'、日付形式に注意
        'delivery_date',            // 旧：'納入日'、日付形式に注意
        'ref_no',                   // 旧：'REF_No'
        'invoice_no',               // 旧：'Invoice_No'
        'no',                       // 旧：'No'
        'billing_name',             // 旧：'請求名'
        'specification',            // 旧：'規格'
        'quantity',                 // 旧：'数量'
        'unit',                     // 旧：'単位'
        'unit_price',               // 旧：'明細単価'
        'total_amount_excluding_tax', // 旧：'合計金額税抜'
        'tax_category_text',        // 旧：'税区分テキスト'
        'percentage',               // 旧：'%'
        'tax_rate',                 // 旧：'税率'
        'summary',                  // 旧：'摘要'
        
    ];
}
