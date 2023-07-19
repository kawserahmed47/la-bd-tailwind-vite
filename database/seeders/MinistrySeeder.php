<?php

namespace Database\Seeders;

use App\Models\BasicSettings\Ministry;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class MinistrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'id' => 1, 
                'name' => 'Ministry of Road Communication and Bridges', 
                'bn_name' => 'সড়ক যোগাযোগ ও সেতু মন্ত্রণালয়',
                'slug' => Str::slug('Ministry of Road Communication and Bridges', '-'),
                'url' => null,
                'address' => null,
                'description' => null,
                'status' => true
            ],
            [
                'id' => 2, 
                'name' => 'Ministry of Finance', 
                'bn_name' => 'অর্থ মন্ত্রণালয়',
                'slug' => Str::slug('Ministry of Finance', '-'),
                'url' => null,
                'address' => null,
                'description' => null,
                'status' => true
            ],
            [
                'id' => 3, 
                'name' => 'Ministry of Communications and Bridges', 
                'bn_name' => 'যোগাযোগ ও সেতু মন্ত্রণালয়',
                'slug' => Str::slug('Ministry of Communications and Bridges', '-'),
                'url' => null,
                'address' => null,
                'description' => null,
                'status' => true
            ],
        ];
        Ministry::insert($data);
    }
}
