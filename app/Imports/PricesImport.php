<?php


namespace App\Imports;

use App\Models\Price;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;

class PricesImport implements ToModel, WithHeadingRow, WithCustomCsvSettings
{
    /**
     * モデルの作成
     */
    public function model(array $row)
    {
        \Log::info($row);
        return new Price([
            'code' => $row['コード'],
            'name' => $row['名前'],
            'price' => $row['価格']
        ]);
    }

    /**
     * カスタムCSV設定を定義
     */
    public function getCsvSettings(): array
    {
        return [
            'input_encoding' => 'UTF-8', // エンコーディングをUTF-8に設定
        ];
    }
}
