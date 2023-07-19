<?php

namespace Database\Seeders;

use App\Models\BasicSettings\Survey;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SurveySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'id' => 1,  
                'name' => 'BS', 
                'bn_name' => 'বি এস', 
                'slug'=> 'bs', 
                'description' => '', 
                'status' => true
            ], 
            [   
                'id' => 2, 
                'name' => 'CS', 
                'bn_name' => 'সি এস', 
                'slug'=> 'cs', 
                'description' => '', 
                'status' => true
            ], 
            [
                'id' => 3, 
                'name' => 'BRS', 
                'bn_name' => 'বি আর এস', 
                'slug'=> 'brs', 
                'description' => '', 
                'status' => true
            ], 
            [   
                'id' => 4, 
                'name' => 'RS', 
                'bn_name' => 'আর এস', 
                'slug'=> 'rs', 
                'description' => '', 
                'status' => true
            ], 
            [
                'id' => 5, 
                'name' => 'SA', 
                'bn_name' => 'এস এ', 
                'slug'=> 'sa', 
                'description' => '', 
                'status' => true
            ], 
            [
                'id' => 6, 
                'name' => 'Peti', 
                'bn_name' => 'পেটি', 
                'slug'=> 'peti', 
                'description' => '', 
                'status' => true
            ], 
            [   
                'id' => 7,
                'name' => 'Diara',
                'bn_name' => 'দিয়ারা', 
                'slug'=> 'diara', 
                'description' => '', 
                'status' => true
            ], 
        ];
        Survey::insert($data);
    }
}
