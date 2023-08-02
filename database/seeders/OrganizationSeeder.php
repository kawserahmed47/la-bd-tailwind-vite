<?php

namespace Database\Seeders;

use App\Models\BasicSettings\Organization;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class OrganizationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Organization::truncate();
        $data = [
            [
                'id' => 1, 
                'name' => 'Sherpur Road Division', 
                'bn_name' => 'শেরপুর সড়ক বিভাগ',
                'slug' => Str::slug('Sherpur Road Division', '-'),
                'description' => null,
                'status' => true
            ],
            [
                'id' => 2, 
                'name' => 'Roads and Highways Department', 
                'bn_name' => 'সড়ক ও জনপথ বিভাগ',
                'slug' => Str::slug('Roads and Highways Department', '-'),
                'description' => null,
                'status' => true
            ],
            [
                'id' => 3, 
                'name' => 'N.B.R.', 
                'bn_name' => 'এন.বি.আর.',
                'slug' => Str::slug('NBR', '-'),
                'description' => null,
                'status' => true
            ],
            [
                'id' => 4, 
                'name' => 'Department of Roads and Highways', 
                'bn_name' => 'সড়ক ও জনপথ অধিদপ্তর',
                'slug' => Str::slug('Department of Roads and Highways', '-'),
                'description' => null,
                'status' => true
            ],
        ];
        Organization::insert($data);
    }
}
