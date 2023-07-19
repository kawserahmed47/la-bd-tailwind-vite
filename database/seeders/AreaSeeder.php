<?php

namespace Database\Seeders;

use App\Models\BasicSettings\Area;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $data=[
            ['id'=> 1, 'name' => 'Inside  of Metropolitan', 'bn_name'=> 'মহানগরের ভেতরে', 'slug'=> 'inside-of-metropolitan', 'description' => NULL, 'status'=> true ],
            ['id'=> 2, 'name' => 'Outside  of Metropolitan', 'bn_name'=> 'মহানগরের বাহিরে', 'slug'=> 'outside-of-metropolitan', 'description' => NULL, 'status'=> true ]
        ];

        Area::insert($data);
    }
}
