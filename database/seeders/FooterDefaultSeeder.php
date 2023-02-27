<?php

namespace Database\Seeders;

use App\Models\Footer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FooterDefaultSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Footer::insert([
            [

                'name' => 'Layanan Akademik',
                'url' => '#',
                'parent_id' => null,
            ],
            
            [

                'name' => 'Akses Cepat',
                'url' => '#',
                'parent_id' => null,
            ],
            [

                'name' => 'Sistem Informasi Layanan Akademik (SALAM)',
                'url' => '#',
                'parent_id' => 1,
            ],
            [

                'name' => 'Learning Management Sistem (LMS)',
                'url' => '#',
                'parent_id' => 1,
            ],
            
            [

                'name' => 'E-Library UIN Sunan Gunung Djati',
                'url' => '#',
                'parent_id' => 1,
            ],
            [

                'name' => 'E-Library Teknik Informatika',
                'url' => '#',
                'parent_id' => 1,
            ],
            
            [

                'name' => 'Jurnal Online Informatika',
                'url' => '#',
                'parent_id' => 1,
            ],
            [

                'name' => 'Fakultas Sains Dan Teknologi',
                'url' => '#',
                'parent_id' => 2,
            ],
            [

                'name' => 'UIN Sunan Gunung Djati',
                'url' => '#',
                'parent_id' => 2,
            ],
            [

                'name' => 'SINTA Dikti Kemdikbud RI',
                'url' => '#',
                'parent_id' => 2,
            ],
            
            [

                'name' => 'Pangkalan Data DIKTI Kemdikbud RI',
                'url' => '#',
                'parent_id' => 2,
            ],
            
        ]);
    }
}
