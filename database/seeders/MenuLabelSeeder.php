<?php

namespace Database\Seeders;

use App\Models\BasicSettings\MenuLabel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuLabelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['id' => 1, 'name' => 'Main', 'bn_name' => 'মেইন', 'slug'=> 'main', 'description'=> null, 'status'=> true ],
            ['id' => 2, 'name' => 'Others', 'bn_name' => 'অন্যান্য', 'slug'=> 'others', 'description'=> null, 'status'=> true ]
        ];
        MenuLabel::insert($data);
    }
}
