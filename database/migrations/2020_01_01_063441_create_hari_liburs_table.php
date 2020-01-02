<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateHariLibursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hari_liburs', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('terapis_id')->nullable();
            $table->text('tanggal')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('hari_liburs');
    }
}
