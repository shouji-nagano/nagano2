<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        '帳票No',
        '顧客コード',
        '顧客名',
        '請求締日', // 日付形式に注意
        '入港日',   // 日付形式に注意
        '通関許可日', // 日付形式に注意
        '納入日',   // 日付形式に注意
        'REF_No',
        'Invoice_No',
        'No',
        '請求名',
        '規格',
        '数量',
        '単位',
        '明細単価',
        '合計金額税抜',
        '税区分テキスト',
        '税率',
        '摘要',
    ];
}
