<?php

namespace Database\Seeders;

use App\Models\Menu;
use App\Models\SubMenu;
use App\Models\CategoryMenu;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CategoryMenu::insert([
            [
                'name'=> 'Profil Jurusan',
                'slug' => 'profil-jurusan',
                'url_target' => '#',
                'page_id' =>null,
            ],
            [
                'name' => 'Akademi',
                'slug' => 'akademik',
                'url_target' => '#',
                'page_id' => null,
            ],
            [
                'name' => 'Layanan',
                'slug' => 'layanan',
                'url_target' => '#',
                'page_id' => null,
            ],
        ]);
        Menu::insert([
            [
                'category_menu_id' => 1,
                'name'=> 'Sejarah',
                'url_target' => '#',
                'slug' => 'sejarah',
                'page_id' => null  
            ],
            [
                'category_menu_id' => 1,
                'name' => 'Visi, Misi, Tujuan dan Sasaran',
                'url_target' => '#',
                'slug' => 'VMTS',
                'page_id' => null
            ],
            [
                'category_menu_id' => 1,
                'name' => 'Struktur Organisasi',
                'url_target' => '#',
                'slug' => 'struktur-organisasi',
                'page_id' => null
            ],
            [
                'category_menu_id' => 1,
                'name' => 'stuff',
                'url_target' => '#',
                'slug' => 'stuff',
                'page_id' => null
            ],
            [
                'category_menu_id' => 1,
                'name' => 'kelompok keahlian',
                'url_target' => '#',
                'slug' => 'kelompok-keahlian',
                'page_id' => null
            ],
            [
                'category_menu_id' => 1,
                'name' => 'publikasi',
                'url_target' => '#',
                'slug' => 'publikasi',
                'page_id' => null
            ],
            [
                'category_menu_id' => 2,
                'name' => 'portal',
                'url_target' => '#',
                'slug' => 'portal',
                'page_id' => null
            ],
            [
                'category_menu_id' => 2,
                'name' => 'e-learning',
                'url_target' => '#',
                'slug' => 'e-learning',
                'page_id' => null
            ],
            [
                'category_menu_id' => 2,
                'name' => 'kalender',
                'url_target' => '#',
                'slug' => 'kalender',
                'page_id' => null
            ],
            [
                'category_menu_id' => 2,
                'name' => 'pedoman',
                'url_target' => '#',
                'slug' => 'pedoman',
                'page_id' => null
            ],
            [
                'category_menu_id' => 3,
                'name' => 'alumni',
                'url_target' => '#',
                'slug' => 'alumni',
                'page_id' => null
            ],
            [
                'category_menu_id' => 3,
                'name' => 'sidang',
                'url_target' => '#',
                'slug' => 'sidang',
                'page_id' => null
            ],
            [
                'category_menu_id' => 3,
                'name' => 'permohonan-transkrip',
                'url_target' => '#',
                'slug' => 'permohonan-transkrip',
                'page_id' => null
            ],
        ]);
        SubMenu::insert([
            [
                'menu_id' => 1,
                'name'=> 'dosen',
                'slug' => 'dosen',
                'url_target' =>'',
                'page_id'=> null
            ],
            [
                'menu_id' => 1,
                'name' => 'admin',
                'slug' => 'admin',
                'url_target' => '',
                'page_id' => null
            ],
            [
                'menu_id' => 6,
                'name' => 'SINTA',
                'slug' => 'SINTA',
                'url_target' => '',
                'page_id' => null
            ],
            [
                'menu_id' => 6,
                'name' => 'PDDIKTI',
                'slug' => 'PDDIKTI',
                'url_target' => '',
                'page_id' => null
            ],
            [
                'menu_id' => 6,
                'name' => 'jurnal-online-informatika',
                'slug' => 'join',
                'url_target' => '',
                'page_id' => null
            ],
            [
                'menu_id' => 6,
                'name' => 'library-uin',
                'slug' => 'library-uin',
                'url_target' => '',
                'page_id' => null
            ],
            [
                'menu_id' => 6,
                'name' => 'e-library-informatika',
                'slug' => 'e-library-informatika',
                'url_target' => '',
                'page_id' => null
            ],
            [
                'menu_id' => 10,
                'name' => 'kerja-praktik',
                'slug' => 'kerja-praktik',
                'url_target' => '',
                'page_id' => null
            ],
            [
                'menu_id' => 10,
                'name' => 'tugas-akhir',
                'slug' => 'tugas-akhir',
                'url_target' => '',
                'page_id' => null
            ],
            [
                'menu_id' => 10,
                'name' => 'komprehensif',
                'slug' => 'komprehensif',
                'url_target' => '',
                'page_id' => null
            ],
        ]);
    }
}
