<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BuatTabelOrders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pembeli_id')->unsigned();
            $table->integer('tiket_id')->unsigned();
            $table->integer('total_pembayaran');
            $table->integer('jml_tiket');
            $table->tinyInteger('status')->default(0);
            $table->string('bukti_pembayaran')->nullable();
            $table->timestamps();

            $table->foreign('pembeli_id')->references('id')->on('pembeli')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('tiket_id')->references('id')->on('tiket')->onDelete('cascade')->onUpdate('cascade');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
