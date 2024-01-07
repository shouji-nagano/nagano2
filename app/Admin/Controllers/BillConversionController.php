<?php

namespace App\Admin\Controllers;

use App\Models\BillConversion;
use App\Models\ImportedFile; // ImportedFile モデルを使用
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class BillConversionController extends AdminController
{
    protected $title = 'Bill Conversion';

    protected function grid()
    {
        $grid = new Grid(new BillConversion());

        // ...

        // Column Expansion で ImportedFile の詳細を表示
        $grid->column('imported_file_id')->expand(function ($model) {
            $importedFile = ImportedFile::find($model->imported_file_id);
            // ここでカスタムビューを返す
            return view('laravel-admin.imported_file_details', ['importedFile' => $importedFile]);
        });

        return $grid;
    }

    // ...

    protected function form()
    {
        $form = new Form(new BillConversion());

        $form->text('bill_no', __('帳票No'))->nullable();
        $form->text('customer_code', __('顧客コード'))->nullable();
        $form->text('customer_name', __('顧客名'))->nullable();
        $form->date('billing_closure_date', __('請求締日'))->nullable();
        $form->date('arrival_date', __('入港日'))->nullable();
        $form->date('customs_clearance_date', __('通関許可日'))->nullable();
        $form->date('delivery_date', __('納入日'))->nullable();
        $form->text('ref_no', __('REF_No'))->nullable();
        $form->text('invoice_no', __('Invoice_No'))->nullable();
        $form->text('number', __('No'))->nullable();
        $form->text('ship_name', __('船名'))->nullable();
        $form->text('billing_name', __('請求名'))->nullable();
        $form->text('standard', __('規格'))->nullable();
        $form->number('quantity', __('数量'))->nullable();
        $form->text('unit', __('単位'))->nullable();
        $form->decimal('unit_price', 15, 2, __('明細単価'))->nullable();
        $form->decimal('total_amount_excluding_tax', 15, 2, __('合計金額(税抜)'))->nullable();
        $form->text('tax_category_text', __('税区分(テキスト)'))->nullable();
        $form->decimal('tax_rate', 5, 2, __('税率'))->nullable();
        $form->textarea('description', __('摘要'))->nullable();
        $form->select('imported_file_id', __('Imported File'), /* オプション配列 */)->nullable();

        return $form;
    }

    protected function detail($id)
    {
        $show = new Show(BillConversion::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('bill_no', __('帳票No'));
        $show->field('customer_code', __('顧客コード'));
        $show->field('customer_name', __('顧客名'));
        $show->field('billing_closure_date', __('請求締日'));
        $show->field('arrival_date', __('入港日'));
        $show->field('customs_clearance_date', __('通関許可日'));
        $show->field('delivery_date', __('納入日'));
        $show->field('ref_no', __('REF_No'));
        $show->field('invoice_no', __('Invoice_No'));
        $show->field('number', __('No'));
        $show->field('ship_name', __('船名'));
        $show->field('billing_name', __('請求名'));
        $show->field('standard', __('規格'));
        $show->field('quantity', __('数量'));
        $show->field('unit', __('単位'));
        $show->field('unit_price', __('明細単価'));
        $show->field('total_amount_excluding_tax', __('合計金額(税抜)'));
        $show->field('tax_category_text', __('税区分(テキスト)'));
        $show->field('tax_rate', __('税率'));
        $show->field('description', __('摘要'));
        $show->field('imported_file_id', __('Imported File Id'));


        return $show;
    }
}


// namespace App\Admin\Controllers;

// use App\Models\BillConversion;

// use Encore\Admin\Controllers\AdminController;
// use Encore\Admin\Form;
// use Encore\Admin\Grid;
// use Encore\Admin\Show;

// class BillConversionController extends AdminController
// {
//     protected $title = 'Bill Conversion';

//     protected function grid()
//     {
//         $grid = new Grid(new BillConversion());

//         $grid->column('id', __('Id'));
//         $grid->column('bill_no', __('帳票No'));
//         $grid->column('customer_code', __('顧客コード'));
//         $grid->column('customer_name', __('顧客名'));
//         $grid->column('billing_closure_date', __('請求締日'));
//         $grid->column('arrival_date', __('入港日'));
//         $grid->column('customs_clearance_date', __('通関許可日'));
//         $grid->column('delivery_date', __('納入日'));
//         $grid->column('ref_no', __('REF_No'))->nullable();
//         $grid->column('invoice_no', __('Invoice_No'))->nullable();
//         $grid->column('number', __('No'))->nullable();
//         $grid->column('ship_name', __('船名'))->nullable();
//         $grid->column('billing_name', __('請求名'));
//         $grid->column('standard', __('規格'))->nullable();
//         $grid->column('quantity', __('数量'));
//         $grid->column('unit', __('単位'));
//         $grid->column('unit_price', __('明細単価'));
//         $grid->column('total_amount_excluding_tax', __('合計金額(税抜)'));
//         $grid->column('tax_category_text', __('税区分(テキスト)'));
//         $grid->column('tax_rate', __('税率'));
//         $grid->column('description', __('摘要'))->nullable();
//         $grid->column('imported_file_id', __('Imported File Id'));

//         // 他のグリッド設定...

//         return $grid;
//     }

//     protected function form()
//     {
//         $form = new Form(new BillConversion());

//         $form->text('bill_no', __('帳票No'));
//         $form->text('customer_code', __('顧客コード'));
//         $form->text('customer_name', __('顧客名'));
//         $form->date('billing_closure_date', __('請求締日'));
//         $form->date('arrival_date', __('入港日'));
//         $form->date('customs_clearance_date', __('通関許可日'));
//         $form->date('delivery_date', __('納入日'));
//         $form->text('ref_no', __('REF_No'))->nullable();
//         $form->text('invoice_no', __('Invoice_No'))->nullable();
//         $form->text('number', __('No'))->nullable();
//         $form->text('ship_name', __('船名'))->nullable();
//         $form->text('billing_name', __('請求名'));
//         $form->text('standard', __('規格'))->nullable();
//         $form->number('quantity', __('数量'));
//         $form->text('unit', __('単位'));
//         $form->decimal('unit_price', 15, 2, __('明細単価'));
//         $form->decimal('total_amount_excluding_tax', 15, 2, __('合計金額(税抜)'));
//         $form->text('tax_category_text', __('税区分(テキスト)'));
//         $form->decimal('tax_rate', 5, 2, __('税率'));
//         $form->textarea('description', __('摘要'))->nullable();
//         $form->select('imported_file_id', __('Imported File'), /* オプション配列 */);

//         // 他のフォーム設定...

//         return $form;
//     }

//     protected function detail($id)
//     {
//         $show = new Show(BillConversion::findOrFail($id));

//         $show->field('id', __('Id'));
//         $show->field('bill_no', __('帳票No'));
//         $show->field('customer_code', __('顧客コード'));
//         $show->field('customer_name', __('顧客名'));
//         $show->field('billing_closure_date', __('請求締日'));
//         $show->field('arrival_date', __('入港日'));
//         $show->field('customs_clearance_date', __('通関許可日'));
//         $show->field('delivery_date', __('納入日'));
//         $show->field('ref_no', __('REF_No'));
//         $show->field('invoice_no', __('Invoice_No'));
//         $show->field('number', __('No'));
//         $show->field('ship_name', __('船名'));
//         $show->field('billing_name', __('請求名'));
//         $show->field('standard', __('規格'));
//         $show->field('quantity', __('数量'));
//         $show->field('unit', __('単位'));
//         $show->field('unit_price', __('明細単価'));
//         $show->field('total_amount_excluding_tax', __('合計金額(税抜)'));
//         $show->field('tax_category_text', __('税区分(テキスト)'));
//         $show->field('tax_rate', __('税率'));
//         $show->field('description', __('摘要'));
//         $show->field('imported_file_id', __('Imported File Id'));

//         // 他の詳細設定...

//         return $show;
//     }
// }
