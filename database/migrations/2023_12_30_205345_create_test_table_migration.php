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
            $table->string('帳票No');
            $table->integer('顧客コード');
            $table->string('顧客名');
            $table->date('請求締日');
            $table->date('入港日');
            $table->date('通関許可日');
            $table->date('納入日');
            $table->string('REF No');
            $table->string('Invoice No');
            $table->integer('No');
            $table->string('請求名')->nullable();
            $table->string('規格')->nullable();
            $table->integer('数量')->nullable();
            $table->string('単位')->nullable();
            $table->float('明細単価')->nullable();
            $table->float('合計金額(税抜)')->nullable();
            $table->string('税区分(テキスト)')->nullable();
            $table->float('%')->nullable();
            $table->float('税率')->nullable();
            $table->string('摘要')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tests');
    }
};
