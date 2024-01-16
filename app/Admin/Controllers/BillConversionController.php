<?php

namespace App\Admin\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Imports\Bill_convert_Import;
use App\Models\BillConversion;
use App\Admin\Extensions\Tools\ImportButton;
use Encore\Admin\Widgets\Table;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Maatwebsite\Excel\Facades\Excel;


class BillConversionController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'BillConversion';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new BillConversion());

        $grid->column('id', __('Id'));
        $grid->column('bill_no', '帳票No');
        $grid->column('customer_code', '顧客コード');
        $grid->column('customer_name', '顧客名');
        $grid->column('billing_closure_date', '請求締日');
        $grid->column('arrival_date', '入港日');
        $grid->column('customs_clearance_date', '通関許可日');
        $grid->column('delivery_date', '納入日');
        $grid->column('ref_no', 'REF_No');
        $grid->column('invoice_no', 'Invoice_No');
        $grid->column('number', 'No');
        $grid->column('ship_name', '船名');
        $grid->column('billing_name', '請求名');
        $grid->column('standard', '規格');
        $grid->column('quantity', '数量');
        $grid->column('unit', '単位');
        $grid->column('unit_price', '明細単価');
        $grid->column('total_amount_excluding_tax', '合計金額(税抜)');
        $grid->column('tax_category_text', '税区分(テキスト)');
        $grid->column('tax_rate', '税率');
        $grid->column('description', '摘要');
        
        $grid->tools(function ($tools) {
        $tools->append(new ImportButton('bill_conversion'));
    });

        return $grid;
    }
    
    protected function importCsv(Request $request)
{
    // アップロードされたCSVファイル
    $file = $request->file('file');
    $fileName = $file->getClientOriginalName(); // ファイル名
    $uploadedAt = now(); // 現在の日時

    try {
        // BillImport インスタンスの作成
        $import = new BillImport($fileName, $uploadedAt);

        // CSVファイルのインポート
        Excel::import($import, $file);
    } catch (ValidationException $e) {
        Log::alert($e->errors());
    }
}

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(BillConversion::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('bill_no', '帳票No');
        $show->field('customer_code', '顧客コード');
        $show->field('customer_name', '顧客名');
        $show->field('billing_closure_date', '請求締日');
        $show->field('arrival_date', '入港日');
        $show->field('customs_clearance_date', '通関許可日');
        $show->field('delivery_date', '納入日');
        $show->field('ref_no', 'REF_No');
        $show->field('invoice_no', 'Invoice_No');
        $show->field('number', 'No');
        $show->field('ship_name', '船名');
        $show->field('billing_name', '請求名');
        $show->field('standard', '規格');
        $show->field('quantity', '数量');
        $show->field('unit', '単位');
        $show->field('unit_price', '明細単価');
        $show->field('total_amount_excluding_tax', '合計金額(税抜)');
        $show->field('tax_category_text', '税区分(テキスト)');
        $show->field('tax_rate', '税率');
        $show->field('description', '摘要');

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new BillConversion());

        $form->text('bill_no', '帳票No');
        $form->text('customer_code', '顧客コード');
        $form->text('customer_name', '顧客名');
        $form->date('billing_closure_date', '請求締日')->default(date('Y-m-d'));
        $form->date('arrival_date', '入港日')->default(date('Y-m-d'));
        $form->date('customs_clearance_date', '通関許可日')->default(date('Y-m-d'));
        $form->date('delivery_date', '納入日')->default(date('Y-m-d'));
        $form->text('ref_no', 'REF_No');
        $form->text('invoice_no', 'Invoice_No');
        $form->text('number', 'No');
        $form->text('ship_name', '船名');
        $form->text('billing_name', '請求名');
        $form->text('standard', '規格');
        $form->number('quantity', '数量');
        $form->text('unit', '単位');
        $form->text('unit_price', '明細単価');
        $form->text('total_amount_excluding_tax', '合計金額(税抜)');
        $form->text('tax_category_text', '税区分(テキスト)');
        $form->text('tax_rate', '税率');
        $form->textarea('description', '摘要');
        
        
        

        return $form;
    }
    
    
}
