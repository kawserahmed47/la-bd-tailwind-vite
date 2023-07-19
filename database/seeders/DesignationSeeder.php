<?php

namespace Database\Seeders;

use App\Models\BasicSettings\Designation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DesignationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Designation::truncate();
        $data = [
            ['id' => 1, 'name' => '', 'bn_name' => 'সহকারী নির্বাহী প্রকৌশলি', 'slug' => '', 'description'=> null, 'status' => true],
            ['id' => 1, 'name' => '', 'bn_name' => 'নির্বাহী প্রকৌশলী', 'slug' => '', 'description'=> null, 'status' => true],
            ['id' => 1, 'name' => '', 'bn_name' => 'উপ-কমিশনার', 'slug' => '', 'description'=> null, 'status' => true],
        ];
        Designation::insert($data);
    }
}
