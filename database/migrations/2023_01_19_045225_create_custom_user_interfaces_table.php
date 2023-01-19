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
            $table->string('logo');
            $table->string('favicon');
            $table->string('video_thumbnail');
            $table->string('navbar_color')->default('#FFFF');
            $table->string('background_color')->default('#FFFF');
            $table->string('card_color')->default('#FFFF');
            $table->string('button_color')->default('#FFFF');
            $table->string('font')->default('roboto');
            $table->string('footer_color')->default('#FFFF');
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
