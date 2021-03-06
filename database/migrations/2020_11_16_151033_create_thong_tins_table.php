<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThongTinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thong_tins', function (Blueprint $table) {
            $table->increments('id');
            $table->string('TenNH',70);
            $table->integer('SDT');
            $table->string('DiaChi',100);
            $table->string('Email',30);
            $table->string('LoiChuc',150);
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
        Schema::dropIfExists('thong_tins');
    }
}
