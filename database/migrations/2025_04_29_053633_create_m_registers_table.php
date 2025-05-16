<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMRegistersTable extends Migration
{
    public function up()
    {
       Schema::create('tb_akun', function (Blueprint $table) {
        $table->id('id_akun'); // membuat kolom id_akun sebagai primary key
        $table->string('username')->unique();
        $table->string('nama');
        $table->string('password');
        $table->string('tipe_akun')->default('User');
});

    }

    public function down()
    {
        Schema::dropIfExists('tb_akun');
    }
}
