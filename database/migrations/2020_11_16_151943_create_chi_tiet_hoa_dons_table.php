<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChiTietHoaDonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chi_tiet_hoa_dons', function (Blueprint $table) {
            $table->integer('id');
            $table->unsignedInteger('hoa_dons_id');
            $table->unsignedInteger('mon_ans_id');
            $table->integer('SoLuong');
            $table->integer('GiamGia');
            $table->string('GhiChu');
            $table->double('ThanhTien');
            $table->timestamps();
        });
        Schema::table('chi_tiet_hoa_dons', function (Blueprint $table) {
            $table->foreign('hoa_dons_id')->references('id')->on('hoa_dons');
            $table->foreign('mon_ans_id')->references('id')->on('mon_ans');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chi_tiet_hoa_dons');
    }
}
