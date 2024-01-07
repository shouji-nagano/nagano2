<?php

namespace App\Admin\Controllers;

use Illuminate\Http\Request;
use App\Models\BillSourceData;
use App\Admin\Extensions\Tools\ImportButton;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Controllers\HasResourceActions;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\BillImport;


class BillSourceDataController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '請求ソースデータ';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new BillSourceData());

        $grid->column('id', __('ID'));
        $grid->column('misc_billing_request_number', __('請求番号'));
        $grid->column('misc_billing_request_date', __('請求日'));
        $grid->column('misc_billing_summary', __('摘要'));
        $grid->column('misc_billing_total_amount', __('合計額'));
        $grid->column('misc_billing_taxable_amount', __('課税対象額'));
        $grid->column('misc_billing_nontaxable_amount', __('非課税対象額'));
        $grid->column('misc_billing_exempt_amount', __('免税額'));
        $grid->column('misc_billing_tax_amount', __('消費税額'));
        $grid->column('misc_billing_request_total', __('請求合計'));
        $grid->column('misc_billing_arrival_departure_date', __('入出港日'));
        $grid->column('misc_billing_ship_name', __('船名'));
        $grid->column('misc_billing_customs_clearance_date', __('通関許可日'));
        $grid->column('misc_billing_delivery_date', __('納入日'));
        $grid->column('misc_billing_ref_no', __('参照番号'));
        $grid->column('misc_billing_invoice_no', __('インボイス番号'));
        $grid->column('misc_billing_container_count', __('コンテナ数'));
        $grid->column('misc_billing_item_name', __('商品名'));
        $grid->column('misc_billing_item_specification', __('商品仕様'));
        $grid->column('misc_billing_item_quantity', __('数量'));
        $grid->column('misc_billing_item_unit', __('単位'));
        $grid->column('misc_billing_item_unit_price', __('単価'));
        $grid->column('misc_billing_item_amount', __('金額'));
        $grid->column('misc_billing_item_tax_category', __('税区分'));
        $grid->column('misc_billing_item_remarks', __('備考'));
        $grid->column('company_name', __('自社名'));
        $grid->column('company_address1', __('住所1'));
        $grid->column('company_bank_name1', __('銀行名1'));
        $grid->column('company_bank_branch1', __('支店名1'));
        $grid->column('company_bank_account_type1', __('口座種類1'));
        $grid->column('company_bank_account_number1', __('口座番号1'));
        $grid->column('company_bank_name2', __('銀行名2'));
        $grid->column('company_bank_branch2', __('支店名2'));
        $grid->column('company_bank_account_type2', __('口座種類2'));
        $grid->column('company_bank_account_number2', __('口座番号2'));
        $grid->column('company_office_name6', __('営業所名6'));
        $grid->column('company_office_phone6', __('電話番号6'));
        $grid->column('company_office_fax6', __('FAX番号6'));
        $grid->column('client_code', __('得意先コード'));
        $grid->column('client_address1', __('得意先住所1'));
        $grid->column('client_address2', __('得意先住所2'));
        $grid->column('billing_client_name', __('請求先名'));
        $grid->column('imported_file_id', __('インポートファイルID'));
        $grid->column('created_at', __('作成日'));
        $grid->column('updated_at', __('更新日'));
        
        $grid->tools(function ($tools) {
        $tools->append(new ImportButton('bill_source_data'));
        });

        return $grid;
    }


    protected function importCsv(BillImport $billimport, Request $request)
    {
        // アップロードされたCSVファイル
        $file = $request->file('file');
        // インポート
        Excel::import(new BillImport(), $file);
    }


    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
{
    $show = new Show(BillSourceData::findOrFail($id));

    $show->field('id', __('ID'));
    $show->field('misc_billing_request_number', __('請求番号'));
    $show->field('misc_billing_request_date', __('請求日'));
    $show->field('misc_billing_summary', __('摘要'));
    $show->field('misc_billing_total_amount', __('合計額'));
    $show->field('misc_billing_taxable_amount', __('課税対象額'));
    $show->field('misc_billing_nontaxable_amount', __('非課税対象額'));
    $show->field('misc_billing_exempt_amount', __('免税額'));
    $show->field('misc_billing_tax_amount', __('消費税額'));
    $show->field('misc_billing_request_total', __('請求合計'));
    $show->field('misc_billing_arrival_departure_date', __('入出港日'));
    $show->field('misc_billing_ship_name', __('船名'));
    $show->field('misc_billing_customs_clearance_date', __('通関許可日'));
    $show->field('misc_billing_delivery_date', __('納入日'));
    $show->field('misc_billing_ref_no', __('参照番号'));
    $show->field('misc_billing_invoice_no', __('インボイス番号'));
    $show->field('misc_billing_container_count', __('コンテナ数'));
    $show->field('misc_billing_item_name', __('商品名'));
    $show->field('misc_billing_item_specification', __('商品仕様'));
    $show->field('misc_billing_item_quantity', __('数量'));
    $show->field('misc_billing_item_unit', __('単位'));
    $show->field('misc_billing_item_unit_price', __('単価'));
    $show->field('misc_billing_item_amount', __('金額'));
    $show->field('misc_billing_item_tax_category', __('税区分'));
    $show->field('misc_billing_item_remarks', __('備考'));
    $show->field('company_name', __('自社名'));
    $show->field('company_address1', __('住所1'));
    $show->field('company_bank_name1', __('銀行名1'));
    $show->field('company_bank_branch1', __('支店名1'));
    $show->field('company_bank_account_type1', __('口座種類1'));
    $show->field('company_bank_account_number1', __('口座番号1'));
    $show->field('company_bank_name2', __('銀行名2'));
    $show->field('company_bank_branch2', __('支店名2'));
    $show->field('company_bank_account_type2', __('口座種類2'));
    $show->field('company_bank_account_number2', __('口座番号2'));
    $show->field('company_office_name6', __('営業所名6'));
    $show->field('company_office_phone6', __('電話番号6'));
    $show->field('company_office_fax6', __('FAX番号6'));
    $show->field('client_code', __('得意先コード'));
    $show->field('client_address1', __('得意先住所1'));
    $show->field('client_address2', __('得意先住所2'));
    $show->field('billing_client_name', __('請求先名'));
    $show->field('imported_file_id', __('インポートファイルID'));
    $show->field('created_at', __('作成日'));
    $show->field('updated_at', __('更新日'));

    return $show;
}

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
{
    $form = new Form(new BillSourceData());

    $form->text('misc_billing_request_number', __('請求番号'));
    $form->date('misc_billing_request_date', __('請求日'))->default(date('Y-m-d'));
    $form->textarea('misc_billing_summary', __('摘要'));
    $form->decimal('misc_billing_total_amount', __('合計額'));
    $form->decimal('misc_billing_taxable_amount', __('課税対象額'));
    $form->decimal('misc_billing_nontaxable_amount', __('非課税対象額'));
    $form->decimal('misc_billing_exempt_amount', __('免税額'));
    $form->decimal('misc_billing_tax_amount', __('消費税額'));
    $form->decimal('misc_billing_request_total', __('請求合計'));
    $form->date('misc_billing_arrival_departure_date', __('入出港日'))->default(date('Y-m-d'));
    $form->text('misc_billing_ship_name', __('船名'));
    $form->date('misc_billing_customs_clearance_date', __('通関許可日'))->default(date('Y-m-d'));
    $form->date('misc_billing_delivery_date', __('納入日'))->default(date('Y-m-d'));
    $form->text('misc_billing_ref_no', __('参照番号'));
    $form->text('misc_billing_invoice_no', __('インボイス番号'));
    $form->number('misc_billing_container_count', __('コンテナ数'));
    $form->text('misc_billing_item_name', __('商品名'));
    $form->textarea('misc_billing_item_specification', __('商品仕様'));
    $form->decimal('misc_billing_item_quantity', __('数量'));
    $form->text('misc_billing_item_unit', __('単位'));
    $form->decimal('misc_billing_item_unit_price', __('単価'));
    $form->decimal('misc_billing_item_amount', __('金額'));
    $form->text('misc_billing_item_tax_category', __('税区分'));
    $form->textarea('misc_billing_item_remarks', __('備考'));
    $form->text('company_name', __('自社名'));
    $form->text('company_address1', __('住所1'));
    $form->text('company_bank_name1', __('銀行名1'));
    $form->text('company_bank_branch1', __('支店名1'));
    $form->text('company_bank_account_type1', __('口座種類1'));
    $form->text('company_bank_account_number1', __('口座番号1'));
    $form->text('company_bank_name2', __('銀行名2'));
    $form->text('company_bank_branch2', __('支店名2'));
    $form->text('company_bank_account_type2', __('口座種類2'));
    $form->text('company_bank_account_number2', __('口座番号2'));
    $form->text('company_office_name6', __('営業所名6'));
    $form->text('company_office_phone6', __('電話番号6'));
    $form->text('company_office_fax6', __('FAX番号6'));
    $form->text('client_code', __('得意先コード'));
    $form->text('client_address1', __('得意先住所1'));
    $form->text('client_address2', __('得意先住所2'));
    $form->text('billing_client_name', __('請求先名'));

    return $form;
    }   

}
