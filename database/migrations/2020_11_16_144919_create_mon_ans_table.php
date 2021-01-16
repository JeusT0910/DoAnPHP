<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMonAnsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mon_ans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('TenMon',50);
            $table->string('Anh');
            $table->double('DonGia',8,2);
            $table->string('ChiTiet');
            $table->unsignedInteger('danh_mucs_id');
            $table->unsignedInteger('don_vi_tinhs_id');
            $table->boolean('TrangThai')->default(true);
            $table->timestamps();
        });
        Schema::table('mon_ans', function (Blueprint $table) {
            $table->foreign('danh_mucs_id')->references('id')->on('danh_mucs');
            $table->foreign('don_vi_tinhs_id')->references('id')->on('don_vi_tinhs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mon_ans');
    }
}
