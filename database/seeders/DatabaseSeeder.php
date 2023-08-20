<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\BasicSettings\District;
use App\Models\BasicSettings\SurveyRecord;
use App\Models\BasicSettings\Thana;
use App\Models\BasicSettings\Upazila;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,

            MenuLabelSeeder::class,
            MenuSeeder::class,
            RoleMenuPermissionSeeder::class,

            DivisionSeeder::class,
            DistrictSeeder::class,
            UpazilaSeeder::class, 
            ThanaSeeder::class,
            CityCorporationSeeder::class,
            PostOfficeSeeder::class,
            UnionSeeder::class,
            
            SurveySeeder::class,
            SurveyDistrictSeeder::class,
            MouzaSeeder::class,
            MouzaSurveySeeder::class,


            LandClassSeeder::class,
            AreaSeeder::class,
            BankSeeder::class,
            OrganizationSeeder::class,
            MinistrySeeder::class,
            ReligionSeeder::class
        ]);
    }
}
