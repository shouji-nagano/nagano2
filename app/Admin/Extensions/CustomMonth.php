<?php
// CustomMonth.php

namespace App\Admin\Extensions;

use Carbon\Carbon;
use Encore\Admin\Form\Field\Date;

class CustomMonth extends Date {
    // 取得したDateの変換フォーマット
    protected $format = 'YYYY年MM月';
    
    // DateTimeで変換するためのフォーマット
    public static $defaultFormat = 'Y年m月';
        
    // 登録前の処理
    // そのままだと、self::$formatの形式(YYYY年MM月)で保存されるので手動で置換
    public function prepare($value) {
        $result = null;
        if ($value) {
            $date = \DateTime::createFromFormat(self::$defaultFormat, $value);
            $result = $date->format('Y-m-d');
        }
        return $result;
    }
    
    protected function form()
{
    // 変更
    $form->customMonth('target_at', 対象月)
        ->default(date('Y-m-d'));
        
    // 省略
}
}