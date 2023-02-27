<?php

namespace Database\Seeders;

use App\Models\PeminatJurusan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PeminatJurusanInformatikaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PeminatJurusan::insert([
            [
                'tahun_akademik' => '2009',
                'peminat' => 720,
                'lulus' => 178,
                'reg' => 155,
            ],
            [
                'tahun_akademik' => '2010',
                'peminat' => 1003,
                'lulus' =>183 ,
                'reg' => 161,
            ],
            [
                'tahun_akademik' => '2011',
                'peminat' => 997,
                'lulus' => 205,
                'reg' => 174,
            ],
            [
                'tahun_akademik' => '2012',
                'peminat' => 1331,
                'lulus' => 197,
                'reg' => 175,
            ],
            [
                'tahun_akademik' => '2013',
                'peminat' => 2401,
                'lulus' => 289,
                'reg' => 226,
            ],
            [
                'tahun_akademik' => '2014',
                'peminat' => 3007,
                'lulus' => 233,
                'reg' => 174,
            ],
            [
                'tahun_akademik' => '2015',
                'peminat' => 4007,
                'lulus' => 242,
                'reg' => 185,
            ],
            [
                'tahun_akademik' => '2016',
                'peminat' => 2318,
                'lulus' => 193,
                'reg' => 171,
            ],
            [
                'tahun_akademik' => '2017',
                'peminat' => 2395,
                'lulus' => 152,
                'reg' => 130,
            ],
            [
                'tahun_akademik' => '2018',
                'peminat' => 2766,
                'lulus' => 121,
                'reg' => 103,
            ],
            [
                'tahun_akademik' => '2019',
                'peminat' => 1941,
                'lulus' => 142,
                'reg' => 136,
            ],
        ]);
    }
}
