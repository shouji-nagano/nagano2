<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillConversionTable extends Migration
{
    public function up()
    {
        Schema::create('bill_conversion', function (Blueprint $table) {
            $table->id();
            $table->string('bill_no'); // 帳票No (Bill Number)
            $table->string('customer_code'); // 顧客コード (Customer Code)
            $table->string('customer_name'); // 顧客名 (Customer Name)
            $table->date('billing_closure_date'); // 請求締日 (Billing Closure Date)
            $table->date('arrival_date'); // 入港日 (Arrival Date)
            $table->date('customs_clearance_date'); // 通関許可日 (Customs Clearance Date)
            $table->date('delivery_date'); // 納入日 (Delivery Date)
            $table->string('ref_no')->nullable(); // REF_No (Reference Number)
            $table->string('invoice_no')->nullable(); // Invoice_No (Invoice Number)
            $table->string('number')->nullable(); // No (Number)
            $table->string('ship_name')->nullable(); // 船名 (Ship Name)
            $table->string('billing_name'); // 請求名 (Billing Name)
            $table->string('standard')->nullable(); // 規格 (Standard)
            $table->integer('quantity'); // 数量 (Quantity)
            $table->string('unit'); // 単位 (Unit)
            $table->decimal('unit_price', 15, 2); // 明細単価 (Unit Price)
            $table->decimal('total_amount_excluding_tax', 15, 2); // 合計金額(税抜) (Total Amount Excluding Tax)
            $table->string('tax_category_text'); // 税区分(テキスト) (Tax Category - Text)
            $table->decimal('tax_rate', 5, 2); // 税率 (Tax Rate)
            $table->text('description')->nullable(); // 摘要 (Description)

        });
    }

    public function down()
    {
        Schema::dropIfExists('bill_conversion');
    }
}
