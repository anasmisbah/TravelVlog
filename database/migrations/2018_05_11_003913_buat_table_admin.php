<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BuatTableAdmin extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin', function (Blueprint $table) {
          $table->increments('id');
          $table->string('nama','191');
          $table->string('gender');
          $table->string('foto')->nullable();
          $table->date('tgllahir');
          $table->string('no_identitas');
          $table->string('notlp','191')->nullable();
          $table->text('alamat')->nullable();
          $table->timestamps();
          $table->integer('user_id')->unsigned();
          $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admin');
    }
}
