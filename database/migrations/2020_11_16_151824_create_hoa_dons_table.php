<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHoaDonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hoa_dons', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('SoLuong');
            $table->dateTime('NgayLap');
            $table->dateTime('NgayThanhToan');
            $table->double('ThanhTien');
            $table->unsignedInteger('bans_id');
            $table->unsignedInteger('nhan_viens_id');
            $table->boolean('TrangThai')->default(true);
            $table->timestamps();
        });
        Schema::table('hoa_dons', function (Blueprint $table) {
            $table->foreign('bans_id')->references('id')->on('bans');
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
        Schema::dropIfExists('hoa_dons');
    }
}
