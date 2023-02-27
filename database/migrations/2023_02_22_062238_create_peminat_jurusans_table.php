<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peminat_jurusans', function (Blueprint $table) {
            $table->id();
            $table->string('tahun_akademik');
            $table->unsignedBigInteger('peminat');
            $table->unsignedBigInteger('lulus');
            $table->unsignedBigInteger('reg');
            $table->softDeletes();
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
        Schema::dropIfExists('peminat_jurusans');
    }
};
