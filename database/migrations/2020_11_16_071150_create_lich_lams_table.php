<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLichLamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lich_lams', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('Ca');
            $table->string('Thu',10);
            $table->unsignedInteger('nhan_viens_id');
            $table->timestamps();
        });
        Schema::table('lich_lams', function (Blueprint $table) {
            $table->foreign('nhan_viens_id')->references('id')->on('nhan_viens');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lich_lams');
    }
}
