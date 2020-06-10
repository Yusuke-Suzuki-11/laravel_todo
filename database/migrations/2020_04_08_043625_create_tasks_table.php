<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            // 外部キー
            $table->integer('folder_id')->unsigned();

            // タイトル
            $table->string('title', 100);
            // 期限日
            $table->date('due_date');
            // 実行状況(デフォルトで未着手を設定)
            $table->integer('status')->default(1);
            // 外部キーの結びつけ
            $table->foreign('folder_id')->references('id')->on('folders');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
