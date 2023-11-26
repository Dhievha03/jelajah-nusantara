<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWisatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wisatas', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('prov_id');
            $table->string('nama_wisata');
            $table->string('alamat');
            $table->string('url_maps');
            $table->text('iframe');
            $table->string('foto');
            $table->text('deskripsi');
            $table->enum('status', [1, 2, 3])->default(3);
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
        Schema::dropIfExists('wisatas');
    }
}
