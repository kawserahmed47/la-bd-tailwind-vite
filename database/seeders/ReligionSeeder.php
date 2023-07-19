<?php

namespace Database\Seeders;

use App\Models\BasicSettings\Religion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReligionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $records = [
            ['id' => 1, 'name' => 'Muslim ', 'bn_name' => 'মুসলিম', 'slug' => 'muslim', 'status' => true],
            ['id' => 2, 'name' => 'Hinduism ', 'bn_name' => 'সনাতন ', 'slug' => 'hinduism', 'status' => true],
            ['id' => 3, 'name' => 'Buddhism', 'bn_name' => 'বৌদ্ধ', 'slug' => 'buddhism ', 'status' => true],
            ['id' => 4, 'name' => 'Christianity', 'bn_name' => 'খ্রিস্টান', 'slug' => 'christianity', 'status' => true],
            ['id' => 5, 'name' => 'Others', 'bn_name' => 'অন্যান্য', 'slug' => 'others', 'status' => true],
        ];
        Religion::insert($records);
    }
}
