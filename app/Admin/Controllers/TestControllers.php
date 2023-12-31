<?php

namespace App\Admin\Controllers;

use App\Models\test;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class TestControllers extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'test';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new test());

        $grid->column('id', __('Id'));
        $grid->column('帳票No', __('帳票No'));
        $grid->column('顧客コード', __('顧客コード'));
        $grid->column('顧客名', __('顧客名'));
        $grid->column('請求締日', __('請求締日'));
        $grid->column('入港日', __('入港日'));
        $grid->column('通関許可日', __('通関許可日'));
        $grid->column('納入日', __('納入日'));
        $grid->column('REF No', __('REF No'));
        $grid->column('Invoice No', __('Invoice No'));
        $grid->column('No', __('No'));
        $grid->column('請求名', __('請求名'));
        $grid->column('規格', __('規格'));
        $grid->column('数量', __('数量'));
        $grid->column('単位', __('単位'));
        $grid->column('明細単価', __('明細単価'));
        $grid->column('合計金額(税抜)', __('合計金額(税抜)'));
        $grid->column('税区分(テキスト)', __('税区分(テキスト)'));
        $grid->column('%', __('%'));
        $grid->column('税率', __('税率'));
        $grid->column('摘要', __('摘要'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

        return $grid;
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
        $show->field('帳票No', __('帳票No'));
        $show->field('顧客コード', __('顧客コード'));
        $show->field('顧客名', __('顧客名'));
        $show->field('請求締日', __('請求締日'));
        $show->field('入港日', __('入港日'));
        $show->field('通関許可日', __('通関許可日'));
        $show->field('納入日', __('納入日'));
        $show->field('REF No', __('REF No'));
        $show->field('Invoice No', __('Invoice No'));
        $show->field('No', __('No'));
        $show->field('請求名', __('請求名'));
        $show->field('規格', __('規格'));
        $show->field('数量', __('数量'));
        $show->field('単位', __('単位'));
        $show->field('明細単価', __('明細単価'));
        $show->field('合計金額(税抜)', __('合計金額(税抜)'));
        $show->field('税区分(テキスト)', __('税区分(テキスト)'));
        $show->field('%', __('%'));
        $show->field('税率', __('税率'));
        $show->field('摘要', __('摘要'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

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

        $form->text('帳票No', __('帳票No'));
        $form->number('顧客コード', __('顧客コード'));
        $form->text('顧客名', __('顧客名'));
        $form->date('請求締日', __('請求締日'))->default(date('Y-m-d'));
        $form->date('入港日', __('入港日'))->default(date('Y-m-d'));
        $form->date('通関許可日', __('通関許可日'))->default(date('Y-m-d'));
        $form->date('納入日', __('納入日'))->default(date('Y-m-d'));
        $form->text('REF No', __('REF No'));
        $form->text('Invoice No', __('Invoice No'));
        $form->number('No', __('No'));
        $form->text('請求名', __('請求名'));
        $form->text('規格', __('規格'));
        $form->number('数量', __('数量'));
        $form->text('単位', __('単位'));
        $form->decimal('明細単価', __('明細単価'));
        $form->decimal('合計金額(税抜)', __('合計金額(税抜)'));
        $form->text('税区分(テキスト)', __('税区分(テキスト)'));
        $form->decimal('%', __('%'));
        $form->decimal('税率', __('税率'));
        $form->text('摘要', __('摘要'));

        return $form;
    }
}
