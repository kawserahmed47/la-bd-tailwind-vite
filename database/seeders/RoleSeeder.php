<?php

namespace Database\Seeders;

use App\Models\BasicSettings\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data =[
            ['id'=> 1, 'order_id'=> 1, 'name'=> 'Admin', 'bn_name' => 'অ্যাডমিন', 'slug'=> 'admin', 'description'=> '', 'status'=> true],
            ['id'=> 2, 'order_id'=> 2, 'name'=> 'District Administrator', 'bn_name' => 'জেলা প্রশাসক', 'slug'=> 'district-administrator', 'description'=> '', 'status'=> true],
            ['id'=> 3, 'order_id'=> 3, 'name'=> 'Additional Deputy Commissioner (Revenue)', 'bn_name' => 'অতিরিক্ত জেলা প্রশাসক (রাজস্ব)', 'slug'=> 'additional-deputy-commissioner-revenue', 'description'=> '', 'status'=> true],
            ['id'=> 4, 'order_id'=> 4, 'name'=> 'Land Acquisition Officer', 'bn_name' => 'ভূমি অধিগ্রহণ কর্মকর্তা', 'slug'=> 'land-acquisition-officer', 'description'=> '', 'status'=> true],
            ['id'=> 5, 'order_id'=> 5, 'name'=> 'LAO', 'bn_name' => 'এলএও', 'slug'=> 'lao', 'description'=> '', 'status'=> true],
            ['id'=> 6, 'order_id'=> 6, 'name'=> 'Additional Land Acquisition Officer', 'bn_name' => 'অতিরিক্ত ভূমি অধিগ্রহণ কর্মকর্তা', 'slug'=> 'additional-land-acquisition-officer', 'description'=> '', 'status'=> true],
            ['id'=> 7, 'order_id'=> 7, 'name'=> 'Kanungo', 'bn_name' => 'কানুনগো', 'slug'=> 'kanungo', 'description'=> '', 'status'=> true],
            ['id'=> 8, 'order_id'=> 8, 'name'=> 'Surveyor', 'bn_name' => 'সার্ভেয়ার', 'slug'=> 'surveyor', 'description'=> '', 'status'=> true],
            ['id'=> 9, 'order_id'=> 9, 'name'=> 'Nazir', 'bn_name' => 'নাজির', 'slug'=> 'nazir', 'description'=> '', 'status'=> true],
        ];
        Role::insert($data);
    }
}
