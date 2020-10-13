<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailtransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detailtrans', function (Blueprint $table) {
            $table->id();
            $table->string('kd_transaksi');
            $table->string('kd_pembelian');
            $table->double('berat',4,3);
            $table->integer('totalbelanja');
            $table->integer('totalharga');
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
        Schema::dropIfExists('detailtrans');
    }
}
