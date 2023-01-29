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
        Schema::create('custom_user_interfaces', function (Blueprint $table) {
            $table->id();
            $table->string('theme_name');
            $table->string('logo')->default(asset('assets/images/Logo Teknik Informatika.png'));
            $table->string('logo_name')->default('TEKNIK<br>INFORMATIKA')->nullable();
            $table->string('favicon')->default(asset('assets/images/Logo Teknik Informatika.png'));
            $table->string('video_thumbnail')->nullable();
            $table->string('navbar_color')->default('#FFFF');
            $table->string('background_color')->default('#FFFF');
            $table->string('card_color')->default('#FFFF');
            $table->string('button_color')->default('#FFFF');
            $table->string('font')->default('roboto');
            $table->string('footer_color')->default('#FFFF');
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
        Schema::dropIfExists('custom_user_interfaces');
    }
};
