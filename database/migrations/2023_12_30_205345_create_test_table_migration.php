<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('tests', function (Blueprint $table) {
            $table->id();
            $table->string('tyouhyou_no');
            $table->integer('customer_code');
            $table->string('customer_name');
            $table->date('billing_closing_date');
            $table->date('arrival_date');
            $table->date('customs_clearance_date');
            $table->date('delivery_date');
            $table->string('ref_no');
            $table->string('invoice_no');
            $table->integer('no');
            $table->string('billing_name')->nullable();
            $table->string('specification')->nullable();
            $table->integer('quantity')->nullable();
            $table->string('unit')->nullable();
            $table->float('unit_price')->nullable();
            $table->float('total_amount_excluding_tax')->nullable();
            $table->string('tax_category_text')->nullable();
            $table->float('percentage')->nullable();
            $table->float('tax_rate')->nullable();
            $table->string('summary')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tests');
    }
};
