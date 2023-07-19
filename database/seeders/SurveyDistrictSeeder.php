<?php

namespace Database\Seeders;

use App\Models\BasicSettings\SurveyDistrict;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SurveyDistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [

            // 25 => Kushtia
            ['district_id' => 25, 'survey_id' => 2],
            ['district_id' => 25, 'survey_id' => 3],
            ['district_id' => 25, 'survey_id' => 4],
            ['district_id' => 25, 'survey_id' => 5],
            ['district_id' => 25, 'survey_id' => 6],
            ['district_id' => 25, 'survey_id' => 7],

            // 61 => Sherpur
            ['district_id' => 61, 'survey_id' => 1],
            ['district_id' => 61, 'survey_id' => 2],
            ['district_id' => 61, 'survey_id' => 3],
            ['district_id' => 61, 'survey_id' => 4],
            ['district_id' => 61, 'survey_id' => 5],
            ['district_id' => 61, 'survey_id' => 6],
            ['district_id' => 61, 'survey_id' => 7],





        ];
        SurveyDistrict::insert($data);
    }
}
