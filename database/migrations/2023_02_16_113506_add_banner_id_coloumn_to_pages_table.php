<?php

use App\Models\Menu;
use App\Models\Banner;
use App\Models\SubMenu;
use App\Models\CategoryMenu;
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
        Schema::table('pages', function (Blueprint $table) {
            $table->foreignIdFor(Banner::class)->nullable();
            $table->foreignIdFor(CategoryMenu::class)->nullable();
            $table->foreignIdFor(Menu::class)->nullable();
            $table->foreignIdFor(SubMenu::class)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pages', function (Blueprint $table) {
            $table->foreignIdFor(Banner::class)->nullable();
            $table->foreignIdFor(CategoryMenu::class)->nullable();
            $table->foreignIdFor(Menu::class)->nullable();
            $table->foreignIdFor(SubMenu::class)->nullable();
        });
    }
};
