<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterMahasiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mahasiswas', function (Blueprint $table) {
            $table->renameColumn('nama','nama_lengkap');
            $table->text('alamat')->after('tanggal_lahir');
            $table->dropColumn('ipk');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mahasiswas', function (Blueprint $table) {
            $table->renameColumn('nama_lengkap','nama');
            $table->dropColumn('alamat');
            $table->decimal('ipk',3,2)->default(1.00);
        });
    }
}