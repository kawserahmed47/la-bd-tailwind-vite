<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $data = [
            ['id' => 1, 'role_id' => 1, 'name' => 'Admin', 'bn_name'=> 'অ্যাডমিন', 'email' => 'admin@la.com', 'password'=> '$2a$12$h2mIwi.o/Gt1aVOp.NEtsup6n4Eqm16PyaKnQkWCum5/VYSjIQAQq', 'status'=> true ],
            ['id' => 2, 'role_id' => 2, 'name' => 'Md. Mominur Rashid', 'bn_name'=> 'মোঃ মোমিনুর রশীদ', 'email' => 'dc@gmail.com', 'password'=> '$2y$10$NM8dH8x2wAmbwYbxmyYknemUXMZ4fydyRdQsNDjvfv/JiYUwj3qsi', 'status'=> true ],
            ['id' => 3, 'role_id' => 3, 'name' => 'Farida Yasmin', 'bn_name'=> 'ফরিদা ইয়াসমিন', 'email' => 'adc1@gmail.com', 'password'=> '$2y$10$GvvHTOiJ7B.hBHtTVH75YOlnOeC049dXg9vPlGuKlfBLphdADJj/u', 'status'=> true ],
            ['id' => 4, 'role_id' => 4, 'name' => 'Md. Mizanur Rahman', 'bn_name'=> 'মোঃ মিজানুর রহমান', 'email' => 'dm.lao@gmail.com', 'password'=> '$2y$10$rJfaG6rqm65KvqH2Yh2.auMOYO0b2TmkLpxqBIrtpiHm1vT06a2fW', 'status'=> true ],
            ['id' => 5, 'role_id' => 5, 'name' => 'Md. Afzal Hossain', 'bn_name'=> 'মোঃ আফজাল হোসেন', 'email' => 'afzal@gmail.com', 'password'=> '$2y$10$npCna3gBqdHMeToNJHROO.i3HGHeR9yWUcARk2B/RsKk9MQ0qoZqa', 'status'=> true ],
            ['id' => 6, 'role_id' => 6, 'name' => 'Md. Ali Hossain', 'bn_name'=> 'মোঃ আলী হোসেন', 'email' => 'alihossain@gmail.com', 'password'=> '$2y$10$Ic4I..3DLG.cdXhj7uF9NObUhlvUq/11xTXTe218LsWXZSIv80BHy', 'status'=> true ],
            ['id' => 7, 'role_id' => 7, 'name' => 'Abdur Rahman Rana', 'bn_name'=> 'আব্দুর রহমান রানা', 'email' => 'afnad@la.com', 'password'=> '$2y$10$Ui7gxJdDlidOFcBrzSJ6VO0Q1ohrt6awC8a8WHyR5YBQjyxVgrarG', 'status'=> true ],
            ['id' => 8, 'role_id' => 8, 'name' => 'Surveyor User', 'bn_name'=> 'সার্ভেয়ার ব্যবহারকারী', 'email' => 'surveyor@la.com', 'password'=> '$2a$12$h2mIwi.o/Gt1aVOp.NEtsup6n4Eqm16PyaKnQkWCum5/VYSjIQAQq', 'status'=> true ],
            ['id' => 9, 'role_id' => 9, 'name' => 'Najir', 'bn_name'=> 'Najir', 'email' => 'najir1@la.com', 'password'=> '$2y$10$uY6QgFYhG1JnU6Q/A3/xeuXIjGVljWPGc99Jw6pz32hEytuD594uK', 'status'=> true ],

        ]; 
        User::insert($data);
    }
}
