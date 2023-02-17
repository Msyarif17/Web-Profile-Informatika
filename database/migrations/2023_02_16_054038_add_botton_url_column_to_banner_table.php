<?php

use App\Models\Page;
use App\Models\Post;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('banners', function (Blueprint $table) {
            $table->longText('url')->nullable();
            $table->foreignIdFor(Page::class)->nullable();
            $table->foreignIdFor(Post::class)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('banner', function (Blueprint $table) {
            $table->longText('url')->nullable();
            $table->foreignIdFor(Page::class)->nullable();
            $table->foreignIdFor(Post::class)->nullable();
        });
    }
};
