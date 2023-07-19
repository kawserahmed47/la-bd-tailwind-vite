<?php

namespace Database\Seeders;

use App\Models\BasicSettings\Division;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
class DivisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['id'=>1,'bn_name' => 'চট্টগ্রাম',  'name' => 'Chattogram', 'slug' => 'chattogram', 'url' => 'https://www.chittagongdiv.gov.bd/', 'status' => true],
            ['id'=>2,'bn_name' => 'রাজশাহী',  'name' => 'Rajshahi', 'slug' => 'rajshahi', 'url' => 'https://www.rajshahidiv.gov.bd/', 'status' => true],
            ['id'=>3,'bn_name' => 'খুলনা',  'name' => 'Khulna', 'slug' => 'khulna', 'url' => 'https://www.khulnadiv.gov.bd/', 'status' => true],
            ['id'=>4,'bn_name' => 'বরিশাল',  'name' => 'Barishal', 'slug' => 'barishal', 'url' => 'https://www.barisaldiv.gov.bd/', 'status' => true],
            ['id'=>5,'bn_name' => 'সিলেট',  'name' => 'Sylhet', 'slug' => 'sylhet', 'url' => 'https://www.sylhetdiv.gov.bd/', 'status' => true],
            ['id'=>6,'bn_name' => 'ঢাকা',  'name' => 'Dhaka', 'slug' => 'dhaka', 'url' => 'https://www.dhakadiv.gov.bd/', 'status' => true],
            ['id'=>7,'bn_name' => 'রংপুর',  'name' => 'Rangpur', 'slug' => 'rangpur', 'url' => 'https://www.rangpurdiv.gov.bd/', 'status' => true],
            ['id'=>8,'bn_name' => 'ময়মনসিংহ',  'name' => 'Mymensingh', 'slug' => 'mymensingh', 'url' => 'https://www.mymensinghdiv.gov.bd/', 'status' => true],
        ];
        Division::insert($data);
    }
}
