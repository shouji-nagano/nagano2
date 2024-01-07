<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillSourceDataTable extends Migration
{
    public function up()
    {
        Schema::create('bill_source_data', function (Blueprint $table) {
            $table->id();
            $table->string('misc_billing_request_number'); // D諸掛請求請求番号 (Miscellaneous Billing Request Number)
            $table->date('misc_billing_request_date'); // D諸掛請求請求日付 (Miscellaneous Billing Request Date)
            $table->text('misc_billing_summary')->nullable(); // D諸掛請求摘要 (Miscellaneous Billing Summary)
            $table->decimal('misc_billing_total_amount', 15, 2); // D諸掛請求合計額 (Miscellaneous Billing Total Amount)
            $table->decimal('misc_billing_taxable_amount', 15, 2); // D諸掛請求課税対象額 (Miscellaneous Billing Taxable Amount)
            $table->decimal('misc_billing_nontaxable_amount', 15, 2)->nullable(); // D諸掛請求非課税対象額 (Miscellaneous Billing Non-Taxable Amount)
            $table->decimal('misc_billing_exempt_amount', 15, 2)->nullable(); // D諸掛請求免税対象額 (Miscellaneous Billing Exempt Amount)
            $table->decimal('misc_billing_tax_amount', 15, 2); // D諸掛請求消費税額 (Miscellaneous Billing Tax Amount)
            $table->decimal('misc_billing_request_total', 15, 2); // D諸掛請求請求合計額 (Miscellaneous Billing Request Total)
            $table->date('misc_billing_arrival_departure_date')->nullable(); // D諸掛請求入出港日 (Miscellaneous Billing Arrival/Departure Date)
            $table->string('misc_billing_ship_name')->nullable(); // D諸掛請求船名 (Miscellaneous Billing Ship Name)
            $table->date('misc_billing_customs_clearance_date')->nullable(); // D諸掛請求通関許可日 (Miscellaneous Billing Customs Clearance Date)
            $table->date('misc_billing_delivery_date')->nullable(); // D諸掛請求納入日 (Miscellaneous Billing Delivery Date)
            $table->string('misc_billing_ref_no')->nullable(); // D諸掛請求REFNO (Miscellaneous Billing REFNO)
            $table->string('misc_billing_invoice_no')->nullable(); // D諸掛請求INVOICENO (Miscellaneous Billing INVOICENO)
            $table->integer('misc_billing_container_count')->nullable(); // D諸掛請求コンテナ数 (Miscellaneous Billing Container Count)
            $table->string('misc_billing_item_name')->nullable(); // D諸掛請求明細商品名称 (Miscellaneous Billing Item Name)
            $table->text('misc_billing_item_specification')->nullable(); // D諸掛請求明細規格仕様 (Miscellaneous Billing Item Specification)
            $table->decimal('misc_billing_item_quantity', 15, 3)->nullable(); // D諸掛請求明細数量 (Miscellaneous Billing Item Quantity)
            $table->string('misc_billing_item_unit')->nullable(); // D諸掛請求明細単位名称 (Miscellaneous Billing Item Unit)
            $table->decimal('misc_billing_item_unit_price', 15, 2)->nullable(); // D諸掛請求明細単価 (Miscellaneous Billing Item Unit Price)
            $table->decimal('misc_billing_item_amount', 15, 2)->nullable(); // D諸掛請求明細金額 (Miscellaneous Billing Item Amount)
            $table->string('misc_billing_item_tax_category')->nullable(); // D諸掛請求明細税区分名称 (Miscellaneous Billing Item Tax Category)
            $table->text('misc_billing_item_remarks')->nullable(); // D諸掛請求明細備考 (Miscellaneous Billing Item Remarks)
            $table->string('company_name'); // M自社名称 (Company Name)
            $table->string('company_address1'); // M自社住所１ (Company Address 1)
            $table->string('company_bank_name1'); // M自社銀行名1 (Company Bank Name 1)
            $table->string('company_bank_branch1'); // M自社銀行支店名1 (Company Bank Branch 1)
            $table->string('company_bank_account_type1'); // M自社銀行口座種類1 (Company Bank Account Type 1)
            $table->string('company_bank_account_number1'); // M自社銀行口座番号1 (Company Bank Account Number 1)
            $table->string('company_bank_name2')->nullable(); // M自社銀行名2 (Company Bank Name 2)
            $table->string('company_bank_branch2')->nullable(); // M自社銀行支店名2 (Company Bank Branch 2)
            $table->string('company_bank_account_type2')->nullable(); // M自社銀行口座種類2 (Company Bank Account Type 2)
            $table->string('company_bank_account_number2')->nullable(); // M自社銀行口座番号2 (Company Bank Account Number 2)
            $table->string('company_office_name6')->nullable(); // M自社営業所名6 (Company Office Name 6)
            $table->string('company_office_phone6')->nullable(); // M自社営業所電話番号6 (Company Office Phone 6)
            $table->string('company_office_fax6')->nullable(); // M自社営業所FAX番号6 (Company Office Fax 6)
            $table->string('client_code'); // M得意先得意先コード (Client Code)
            $table->string('client_address1')->nullable(); // M得意先住所１ (Client Address 1)
            $table->string('client_address2')->nullable(); // M得意先住所２ (Client Address 2)
            $table->string('billing_client_name'); // M請求先得意先名 (Billing Client Name)
        });
    }

    public function down()
    {
        Schema::dropIfExists('bill_source_data');
    }
}
