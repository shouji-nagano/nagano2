<?php

namespace App\Admin\Controllers;

use Illuminate\Http\Request;
use App\Models\Test;
use App\Admin\Extensions\Tools\ImportButton;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Controllers\HasResourceActions;
use Maatwebsite\Excel\Facades\Excel; 
use App\Imports\TestImport;

class TestControllers extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Test';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new test());
        
        $grid->filter(function($filter){
        $filter->like('tyouhyou_no', '帳票NO');
        $filter->like('customer_code', '商品コード');
        });

        $grid->column('id', __('Id'));
        $grid->column('tyouhyou_no', __('帳票NO'));
        $grid->column('customer_code', __('商品コード'));
        $grid->column('customer_name', __('顧客名'));
        $grid->column('billing_closing_date', __('請求締日'))->default(date('Y-m-d'));
        $grid->column('arrival_date', __('入港日'))->default(date('Y-m-d'));
        $grid->column('customs_clearance_date', __('通関許可日'))->default(date('Y-m-d'));
        $grid->column('delivery_date', __('納入日'))->default(date('Y-m-d'));
        $grid->column('ref_no', __('REF No'));
        $grid->column('invoice_no', __('Invoice No'));
        $grid->column('no', __('No'));
        $grid->column('billing_name', __('請求名'));
        $grid->column('specification', __('規格'));
        $grid->column('quantity', __('数量'));
        $grid->column('unit', __('単位'));
        $grid->column('unit_price', __('明細単価'));
        $grid->column('total_amount_excluding_tax', __('合計金額(税抜)'));
        $grid->column('tax_category_text', __('税区分(テキスト)'));
        $grid->column('percentage', __('%'));
        $grid->column('tax_rate', __('税率'));
        $grid->column('summary', __('摘要'));
        // $grid->column('created_at', __('Created at'));
        // $grid->column('updated_at', __('Updated at'));


        
        $grid->tools(function ($tools) {
        $tools->append(new ImportButton('tests'));
        });

        return $grid;
    }

    protected function importCsv(TestImport $testimpo, Request $request)
    {
        // アップロードされたCSVファイル
        $file = $request->file('file');
        // インポート
        Excel::import(new TestImport(), $file);
    }
    


    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(test::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('tyouhyou_no', __('帳票NO'));
        $show->field('customer_code', __('商品コード'));
        $show->field('customer_name', __('顧客名'));
        $show->field('billing_closing_date', __('請求締日'))->default(date('Y-m-d'));
        $show->field('arrival_date', __('入港日'))->default(date('Y-m-d'));
        $show->field('customs_clearance_date', __('通関許可日'))->default(date('Y-m-d'));
        $show->field('delivery_date', __('納入日'))->default(date('Y-m-d'));
        $show->field('ref_no', __('REF No'));
        $show->field('invoice_no', __('Invoice No'));
        $show->field('no', __('No'));
        $show->field('船名 ', __('請求名'));
        $show->field('specification', __('規格'));
        $show->field('quantity', __('数量'));
        $show->field('unit', __('単位'));
        $show->field('unit_price', __('明細単価'));
        $show->field('total_amount_excluding_tax', __('合計金額(税抜)'));
        $show->field('tax_category_text', __('税区分(テキスト)'));
        $show->field('percentage', __('%'));
        $show->field('tax_rate', __('税率'));
        $show->field('summary', __('摘要'));
        // $show->field('created_at', __('Created at'));
        // $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new test());

        $form->text('tyouhyou_no', __('帳票NO'));
        $form->number('customer_code', __('商品コード'));
        $form->text('customer_name', __('顧客名'));
        $form->date('billing_closing_date', __('請求締日'))->default(date('Y-m-d'));
        $form->date('arrival_date', __('入港日'))->default(date('Y-m-d'));
        $form->date('customs_clearance_date', __('通関許可日'))->default(date('Y-m-d'));
        $form->date('delivery_date', __('納入日'))->default(date('Y-m-d'));
        $form->text('ref_no', __('REF No'));
        $form->text('invoice_no', __('Invoice No'));
        $form->number('no', __('No'));
        $form->text('船名 ', __('請求名'));
        $form->text('specification', __('規格'));
        $form->number('quantity', __('数量'));
        $form->text('unit', __('単位'));
        $form->decimal('unit_price', __('明細単価'));
        $form->decimal('total_amount_excluding_tax', __('合計金額(税抜)'));
        $form->text('tax_category_text', __('税区分(テキスト)'));
        $form->decimal('percentage', __('%'));
        $form->decimal('tax_rate', __('税率'));
        $form->text('summary', __('摘要'));

        return $form;
    }
    

}
