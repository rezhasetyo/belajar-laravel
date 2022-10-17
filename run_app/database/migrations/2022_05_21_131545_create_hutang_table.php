<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHutangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hutang', function (Blueprint $table) {
            // $table->id();
            $table->increments('id');
            $table->string('nama');
            $table->text('alamat');
            $table->datetime('tanggal_hutang');
            $table->string('jenis_kelamin');
            $table->bigInteger('hutang');
            $table->string('jaminan');
            $table->date('jatuhTempo');
            $table->unsignedBigInteger('cicilan_id');     
            $table->foreign('cicilan_id')->references('id')->on('cicilan');
            
            $table->string('status');
            $table->datetime('bayar_hutang')->nullable();
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
        Schema::dropIfExists('hutang');
    }
}
