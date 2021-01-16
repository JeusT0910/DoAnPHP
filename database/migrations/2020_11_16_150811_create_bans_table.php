<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('TenBan',30);
            $table->unsignedInteger('loai_bans_id');
            $table->boolean('TrangThai')->default(true);
            $table->timestamps();
        });
        Schema::table('bans', function (Blueprint $table) {
            $table->foreign('loai_bans_id')->references('id')->on('loai_bans');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bans');
    }
}
