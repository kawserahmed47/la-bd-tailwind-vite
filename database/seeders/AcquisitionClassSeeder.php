<?php

namespace Database\Seeders;

use App\Models\BasicSettings\AcquisitionClass;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AcquisitionClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        AcquisitionClass::truncate();
        $data = [
            [   
                'id' => 1,
                'name' => 'Land',                  
                'bn_name' => 'ভূমি',          
                'slug' => 'land',              
                'icon' => null, 
                'description' => null, 
                'status' => true, 
                'order_id' => 1, 
                'parent_id' => 0
            ],
                [   
                    'id' => 2,
                    'name' => 'Path', 
                    'bn_name' => 'পথ',
                    'slug' => 'path',
                    'icon' => null, 
                    'description' => null, 
                    'status' => true, 
                    'order_id' => 1, 
                    'parent_id' => 1
                ],
                [
                    'id' => 3,
                    'name' => 'Levee',
                    'bn_name' => 'কান্দা',
                    'slug' => 'levee',
                    'icon' => null,
                    'description' => null,
                    'status' => true,
                    'order_id' => 2,
                    'parent_id' => 1
                ],
                [
                    'id' => 4,
                    'name' => 'Garden',
                    'bn_name' => 'বাগান/বাঁশঝাড়',
                    'slug' => 'garden',
                    'icon' => null, 
                    'description' => null, 
                    'status' => true, 
                    'order_id' => 3, 
                    'parent_id' => 1
                ],
                [
                    'id' => 5,
                    'name' => 'House',
                    'bn_name' => 'বাড়ি',
                    'slug' => 'house',
                    'icon' => null,
                    'description' => null,
                    'status' => true,
                    'order_id' => 4,
                    'parent_id' => 1
                ],
                [
                    'id' => 6,
                    'name' => 'Nama',
                    'bn_name' => 'নামা',
                    'slug' => 'nama',
                    'icon' => null, 
                    'description' => null,
                    'status' => true,
                    'order_id' => 5,
                    'parent_id' => 1
                ],
                [
                    'id' => 7,
                    'name' => 'Haunted house',
                    'bn_name' => 'ছাড়াবাড়ি',
                    'slug' => 'haunted-house',
                    'icon' => null, 
                    'description' => null,
                    'status' => true, 
                    'order_id' => 6,
                    'parent_id' => 1
                ],
                [
                    'id' => 8,
                    'name' => 'Cemetery',
                    'bn_name' => 'কবরস্থান',
                    'slug' => 'cemetery',
                    'icon' => null,
                    'description' => null, 
                    'status' => true, 
                    'order_id' => 7, 
                    'parent_id' => 1
                ],
                [
                    'id' => 9,
                    'name' => 'Halt',
                    'bn_name' => 'হালট',
                    'slug' => 'halt',
                    'icon' => null,
                    'description' => null,
                    'status' => true,
                    'order_id' => 8,
                    'parent_id' => 1
                ],
                [
                    'id' => 10,
                    'name' => 'Market',
                    'bn_name' => 'বাজার',
                    'slug' => 'market',
                    'icon' => null,
                    'description' => null,
                    'status' => true,
                    'order_id' => 9,
                    'parent_id' => 1
                ],
                [
                    'id' => 11,
                    'name' => 'Canal',
                    'bn_name' => 'খাল',
                    'slug' => 'canal',
                    'icon' => null,
                    'description' => null,
                    'status' => true,
                    'order_id' => 10,
                    'parent_id' => 1
                ],
                [
                    'id' => 12,
                    'name' => 'Place of worship',
                    'bn_name' => 'উপাসনালয়',
                    'slug' => 'place-of-worship',
                    'icon' => null,
                    'description' => null,
                    'status' => true,
                    'order_id' => 11,
                    'parent_id' => 1
                ],
                [
                    'id' => 13,
                    'name' => 'Educational Institute', 
                    'bn_name' => 'শিক্ষা প্রতিষ্ঠান', 
                    'slug' => 'educational-institute',
                    'icon' => null,
                    'description' => null,
                    'status' => true,
                    'order_id' => 12,
                    'parent_id' => 1
                ],
                [
                    'id' => 14,
                    'name' => 'Homestead',
                    'bn_name' => 'ভিটা',
                    'slug' => 'homestead',
                    'icon' => null,
                    'description' => null,
                    'status' => true,
                    'order_id' => 13,
                    'parent_id' => 1
                ],
                [
                    'id' => 15,
                    'name' => 'Pool',
                    'bn_name' => 'ডোবা',
                    'slug' => 'pool',
                    'icon' => null,
                    'description' => null,
                    'status' => true,
                    'order_id' => 14,
                    'parent_id' => 1
                ],
                [
                    'id' => 16,
                    'name' => 'Pond',
                    'bn_name' => 'পুকুর',
                    'slug' => 'pond',
                    'icon' => null,
                    'description' => null,
                    'status' => true,
                    'order_id' => 15,
                    'parent_id' => 1
                ],


            [
                'id' => 17,
                'name' => 'Construction',
                'bn_name' => 'স্থাপনা', 
                'slug' => 'construction', 
                'icon' => null, 
                'description' => null, 
                'status' => true, 
                'order_id' => 2, 
                'parent_id' => 0
            ],

                [
                    'id' => 18,
                    'name' => 'Paved',
                    'bn_name' => 'পাকা',
                    'slug' => 'paved',
                    'icon' => null,
                    'description' => null,
                    'status' => true,
                    'order_id' => 1,
                    'parent_id' => 17
                ],
                [
                    'id' => 19,
                    'name' => 'Half Paved',
                    'bn_name' => 'আধা পাকা',
                    'slug' => 'half-paved',
                    'icon' => null,
                    'description' => null,
                    'status' => true,
                    'order_id' => 2,
                    'parent_id' => 17
                ],
                [
                    'id' => 20,
                    'name' => 'Raw paved',
                    'bn_name' => 'কাঁচা পাকা',
                    'slug' => 'raw-paved',
                    'icon' => null,
                    'description' => null,
                    'status' => true,
                    'order_id' => 3,
                    'parent_id' => 17
                ],
                [
                    'id' => 21,
                    'name' => 'Raw',
                    'bn_name' => 'কাঁচা',
                    'slug' => 'raw',
                    'icon' => null,
                    'description' => null,
                    'status' => true,
                    'order_id' => 4,
                    'parent_id' => 17
                ],
                [
                    'id' => 22,
                    'name' => 'Water Tank',
                    'bn_name' => 'পানির ট্যাংকি',
                    'slug' => 'water-tank',
                    'icon' => null,
                    'description' => null,
                    'status' => true,
                    'order_id' => 5,
                    'parent_id' => 17
                ],
                [
                    'id' => 23,
                    'name' => 'Concrete wall',
                    'bn_name' => 'কনক্রিটের ওয়াল',
                    'slug' => 'concrete-wall',
                    'icon' => null,
                    'description' => null,
                    'status' => true,
                    'order_id' => 6,
                    'parent_id' => 17
                ],
                [
                    'id' => 24,
                    'name' => 'Tin Wall',
                    'bn_name' => 'টিনের ওয়াল',
                    'slug' => 'tin-wall',
                    'icon' => null,
                    'description' => null,
                    'status' => true,
                    'order_id' => 7,
                    'parent_id' => 17
                ],
                [
                    'id' => 25,
                    'name' => 'Semi paved road',
                    'bn_name' => 'সেমি পাকা',
                    'slug' => 'semi-paved-road',
                    'icon' => null,
                    'description' => null,
                    'status' => true,
                    'order_id' => 8,
                    'parent_id' => 17
                ],
                [
                    'id' => 26,
                    'name' => 'Grill',
                    'bn_name' => 'গ্রিল',
                    'slug' => 'grill',
                    'icon' => null,
                    'description' => null,
                    'status' => true,
                    'order_id' => 9,
                    'parent_id' => 17
                ],
                [
                    'id' => 27,
                    'name' => 'Paved road',
                    'bn_name' => 'পাকা রাস্তা',
                    'slug' => 'paved-road',
                    'icon' => null,
                    'description' => null,
                    'status' => true,
                    'order_id' => 10,
                    'parent_id' => 17
                ],
                [
                    'id' => 28,
                    'name' => 'Brick Road',
                    'bn_name' => 'ইটের রাস্তা',
                    'slug' => 'brick-road',
                    'icon' => null,
                    'description' => null,
                    'status' => true,
                    'order_id' => 11,
                    'parent_id' => 17
                ],
                [
                    'id' => 29,
                    'name' => 'Pump',
                    'bn_name' => 'পাম্প',
                    'slug' => 'pump',
                    'icon' => null,
                    'description' => null,
                    'status' => true,
                    'order_id' => 12,
                    'parent_id' => 17
                ],
                [
                    'id' => 30,
                    'name' => 'Tube well',
                    'bn_name' => 'টিউবওয়েল',
                    'slug' => 'tube-well',
                    'icon' => null,
                    'description' => null,
                    'status' => true,
                    'order_id' => 13,
                    'parent_id' => 17
                ],
                [
                    'id' => 31,
                    'name' => 'Others',
                    'bn_name' => 'অন্যান্য',
                    'slug' => 'others',
                    'icon' => null,
                    'description' => null,
                    'status' => true,
                    'order_id' => 14,
                    'parent_id' => 17
                ],



            [
                'id' => 32,
                'name' => 'Plants',
                'bn_name' => 'গাছপালা',
                'slug' => 'plants',
                'icon' => null,
                'description' => null,
                'status' => true,
                'order_id' => 3,
                'parent_id' => 0
            ],  
                [
                    'id' => 33,
                    'name' => 'Forest-1',
                    'bn_name' => 'বনজ গাছ-১',
                    'slug' => 'forest-1',
                    'icon' => null,
                    'description' => null,
                    'status' => true,
                    'order_id' => 1,
                    'parent_id' => 32
                ],
                [
                    'id' => 34,
                    'name' => 'Forest-2',
                    'bn_name' => 'বনজ গাছ-2',
                    'slug' => 'forest-2',
                    'icon' => null,
                    'description' => null,
                    'status' => true,
                    'order_id' => 2,
                    'parent_id' => 32
                ],
                [
                    'id' => 35,
                    'name' => 'Forest-3',
                    'bn_name' => 'বনজ গাছ-৩',
                    'slug' => 'forest-3',
                    'icon' => null,
                    'description' => null,
                    'status' => true,
                    'order_id' => 3,
                    'parent_id' => 32
                ],
                [
                    'id' => 36,
                    'name' => 'Fruits-1',
                    'bn_name' => 'ফলদ-১',
                    'slug' => 'fruits-1',
                    'icon' => null,
                    'description' => null,
                    'status' => true,
                    'order_id' => 4,
                    'parent_id' => 32
                ],
                [
                    'id' => 37,
                    'name' => 'Fruits-2',
                    'bn_name' => 'ফলদ-২',
                    'slug' => 'fruits-2',
                    'icon' => null,
                    'description' => null,
                    'status' => true,
                    'order_id' => 5,
                    'parent_id' => 32
                ],
                [
                    'id' => 38,
                    'name' => 'Fruits-3',
                    'bn_name' => 'ফলদ-৩',
                    'slug' => 'fruits-3',
                    'icon' => null,
                    'description' => null,
                    'status' => true,
                    'order_id' => 6,
                    'parent_id' => 32
                ],
                [
                    'id' => 39,
                    'name' => 'Medicinal plants-1',
                    'bn_name' => 'ঔষধি গাছ-১',
                    'slug' => 'medicinal-plants-1',
                    'icon' => null,
                    'description' => null,
                    'status' => true,
                    'order_id' => 7,
                    'parent_id' => 32
                ],
                [
                    'id' => 40,
                    'name' => 'Medicinal plants-2',
                    'bn_name' => 'ঔষধি গাছ-২',
                    'slug' => 'medicinal-plants-2',
                    'icon' => null,
                    'description' => null,
                    'status' => true,
                    'order_id' => 8,
                    'parent_id' => 32
                ],
                [
                    'id' => 41,
                    'name' => 'Forest and Fruit Plant',
                    'bn_name' => 'বনজ ও ফলদ চারা',
                    'slug' => 'forest-and-fruit-plant',
                    'icon' => null,
                    'description' => null,
                    'status' => true,
                    'order_id' => 9,
                    'parent_id' => 32
                ],
                [
                    'id' => 42,
                    'name' => 'Flower',
                    'bn_name' => 'ফুল',
                    'slug' => 'flower',
                    'icon' => null,
                    'description' => null,
                    'status' => true,
                    'order_id' => 10,
                    'parent_id' => 32
                ],
                [
                    'id' => 43,
                    'name' => 'Others',
                    'bn_name' => 'অন্যান্য',
                    'slug' => 'others',
                    'icon' => null,
                    'description' => null,
                    'status' => true,
                    'order_id' => 11,
                    'parent_id' => 32
                ],

            [
                'id' => 44,
                'name' => 'Agriculture',
                'bn_name' => 'কৃষি ফসল',
                'slug' => 'plants',
                'icon' => null,
                'description' => null,
                'status' => true,
                'order_id' => 4,
                'parent_id' => 0
            ],
                [
                    'id' => 45,
                    'name' => 'Paddy',
                    'bn_name' => 'ধান',
                    'slug' => 'paddy',
                    'icon' => null,
                    'description' => null,
                    'status' => true,
                    'order_id' => 1,
                    'parent_id' => 44
                ],
                [
                    'id' => 46,
                    'name' => 'Jute',
                    'bn_name' => 'পাট',
                    'slug' => 'jute',
                    'icon' => null,
                    'description' => null,
                    'status' => true,
                    'order_id' => 2,
                    'parent_id' => 44
                ],
                [
                    'id' => 47,
                    'name' => 'Sugar Cane',
                    'bn_name' => 'আখ',
                    'slug' => 'sugar-cane',
                    'icon' => null,
                    'description' => null,
                    'status' => true,
                    'order_id' => 3,
                    'parent_id' => 44
                ],
                [
                    'id' => 48,
                    'name' => 'Wheat',
                    'bn_name' => 'গম',
                    'slug' => 'wheat',
                    'icon' => null,
                    'description' => null,
                    'status' => true,
                    'order_id' => 4,
                    'parent_id' => 44
                ],
                [
                    'id' => 49,
                    'name' => 'Kalai',
                    'bn_name' => 'কলাই',
                    'slug' => 'kalai',
                    'icon' => null,
                    'description' => null,
                    'status' => true,
                    'order_id' => 5,
                    'parent_id' => 44
                ],
                [
                    'id' => 50,
                    'name' => 'Ravi Shashya',
                    'bn_name' => 'রবি শষ্য',
                    'slug' => 'ravi-Shashya',
                    'icon' => null,
                    'description' => null,
                    'status' => true,
                    'order_id' => 6,
                    'parent_id' => 44
                ],
                [
                    'id' => 51,
                    'name' => 'Vegetables',
                    'bn_name' => 'সবজি',
                    'slug' => 'vegetables',
                    'icon' => null,
                    'description' => null,
                    'status' => true,
                    'order_id' => 7,
                    'parent_id' => 44
                ],
                [
                    'id' => 52,
                    'name' => 'Fish',
                    'bn_name' => 'মৎস্য',
                    'slug' => 'fish',
                    'icon' => null,
                    'description' => null,
                    'status' => true,
                    'order_id' => 8,
                    'parent_id' => 44
                ],
                


            [
                'id' => 53,
                'name' => 'Others',
                'bn_name' => 'অন্যান্য',
                'slug' => 'plants',
                'icon' => null, 
                'description' => null,
                'status' => true,
                'order_id' => 4,
                'parent_id' => 0
            ],
                [
                    'id' => 54,
                    'name' => 'Tube well',
                    'bn_name' => 'টিউবওয়েল',
                    'slug' => 'tube-well-2',
                    'icon' => null,
                    'description' => null,
                    'status' => true,
                    'order_id' => 1,
                    'parent_id' => 53
                ],
                [
                    'id' => 55,
                    'name' => 'Pump',
                    'bn_name' => 'পাম্প',
                    'slug' => 'pump-2',
                    'icon' => null,
                    'description' => null,
                    'status' => true,
                    'order_id' => 2,
                    'parent_id' => 53
                ],
                [
                    'id' => 56,
                    'name' => 'Deep Pump',
                    'bn_name' => 'ডিপ পাম্প',
                    'slug' => 'deep-pump',
                    'icon' => null,
                    'description' => null,
                    'status' => true,
                    'order_id' => 3,
                    'parent_id' => 53
                ],
                [
                    'id' => 57,
                    'name' => 'Pond',
                    'bn_name' => 'পুকুর',
                    'slug' => 'pond-2',
                    'icon' => null,
                    'description' => null,
                    'status' => true,
                    'order_id' => 4,
                    'parent_id' => 53
                ],
                [
                    'id' => 58,
                    'name' => 'Factory',
                    'bn_name' => 'কারখানা',
                    'slug' => 'factory',
                    'icon' => null,
                    'description' => null,
                    'status' => true,
                    'order_id' => 5,
                    'parent_id' => 53
                ],
                [
                    'id' => 59,
                    'name' => 'Shop',
                    'bn_name' => 'দোকান',
                    'slug' => 'shop',
                    'icon' => null,
                    'description' => null,
                    'status' => true,
                    'order_id' => 6,
                    'parent_id' => 53
                ],
                [
                    'id' => 60,
                    'name' => 'Boring',
                    'bn_name' => 'বোরিং',
                    'slug' => 'boring',
                    'icon' => null,
                    'description' => null,
                    'status' => true,
                    'order_id' => 7,
                    'parent_id' => 53
                ],
                [
                    'id' => 61,
                    'name' => 'Water Tank',
                    'bn_name' => 'পানির ট্যাংকি',
                    'slug' => 'water-tank',
                    'icon' => null,
                    'description' => null,
                    'status' => true,
                    'order_id' => 8,
                    'parent_id' => 53
                ],
        ];
        AcquisitionClass::insert($data);
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

    }
}
