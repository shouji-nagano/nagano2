<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFileInfoToBillSourceDataTable extends Migration
{
    public function up()
    {
        Schema::table('bill_source_data', function (Blueprint $table) {
            $table->string('file_name')->nullable(); // インポートされたファイル名
            $table->dateTime('uploaded_at')->nullable(); // ファイルのアップロード日時
        });
    }

    public function down()
    {
        Schema::table('bill_source_data', function (Blueprint $table) {
            $table->dropColumn('file_name');
            $table->dropColumn('uploaded_at');
        });
    }
}
