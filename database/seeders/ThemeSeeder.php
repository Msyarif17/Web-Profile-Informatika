<?php

namespace Database\Seeders;

use App\Models\CustomUserInterface;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ThemeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CustomUserInterface::insert([
            [

                'name' => 'Theme 1',
                'logo' => '/assets/images/Logo Teknik Informatika.png',
                'logo_name' => 'Teknik Informatika',
                'favicon' => '/assets/images/Logo Teknik Informatika.png',
                'navbar_color' => '#161d6f',
                'navbar_text_color' => '#f6f6f6',
                'video_thumbnail' => '#',
                'background_color' => '#ffffff' ,
                'card_color' => '#161d6f',
                'card_text_color' => '#ffffff' ,
                'button_color' =>'#161d6f',
                'font' => 'Montserrat' ,
                'footer_color' => '#161d6f',
                'footer_text_color' => '#ffffff',
                'isActive' => true,
            ],
        ]);
    }
}
