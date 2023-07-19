<?php

namespace Database\Seeders;

use App\Models\BasicSettings\RoleMenuPermission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleMenuPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        RoleMenuPermission::truncate();
        $data = [
            ['id'=> 1, 'role_id'=> 1, 'menu_id' => 1, 'create'=> true, 'view'=> true, 'edit' => true, 'delete' => true, 'status' => true],
            ['id'=> 2, 'role_id'=> 1, 'menu_id' => 2, 'create'=> true, 'view'=> true, 'edit' => true, 'delete' => true, 'status' => true],
            ['id'=> 3, 'role_id'=> 1, 'menu_id' => 3, 'create'=> true, 'view'=> true, 'edit' => true, 'delete' => true, 'status' => true],
            ['id'=> 4, 'role_id'=> 1, 'menu_id' => 4, 'create'=> true, 'view'=> true, 'edit' => true, 'delete' => true, 'status' => true],
            ['id'=> 5, 'role_id'=> 1, 'menu_id' => 5, 'create'=> true, 'view'=> true, 'edit' => true, 'delete' => true, 'status' => true],
            ['id'=> 6, 'role_id'=> 1, 'menu_id' => 6, 'create'=> true, 'view'=> true, 'edit' => true, 'delete' => true, 'status' => true],
            ['id'=> 7, 'role_id'=> 1, 'menu_id' => 7, 'create'=> true, 'view'=> true, 'edit' => true, 'delete' => true, 'status' => true],
            ['id'=> 8, 'role_id'=> 1, 'menu_id' => 8, 'create'=> true, 'view'=> true, 'edit' => true, 'delete' => true, 'status' => true],
            ['id'=> 9, 'role_id'=> 1, 'menu_id' => 9, 'create'=> true, 'view'=> true, 'edit' => true, 'delete' => true, 'status' => true],
            ['id'=> 10, 'role_id'=> 1, 'menu_id' => 10, 'create'=> true, 'view'=> true, 'edit' => true, 'delete' => true, 'status' => true],
            ['id'=> 11, 'role_id'=> 1, 'menu_id' => 11, 'create'=> true, 'view'=> true, 'edit' => true, 'delete' => true, 'status' => true],
            ['id'=> 12, 'role_id'=> 1, 'menu_id' => 12, 'create'=> true, 'view'=> true, 'edit' => true, 'delete' => true, 'status' => true],
            ['id'=> 13, 'role_id'=> 1, 'menu_id' => 13, 'create'=> true, 'view'=> true, 'edit' => true, 'delete' => true, 'status' => true],
            ['id'=> 14, 'role_id'=> 1, 'menu_id' => 14, 'create'=> true, 'view'=> true, 'edit' => true, 'delete' => true, 'status' => true],
            ['id'=> 15, 'role_id'=> 1, 'menu_id' => 15, 'create'=> true, 'view'=> true, 'edit' => true, 'delete' => true, 'status' => true],
            ['id'=> 16, 'role_id'=> 1, 'menu_id' => 16, 'create'=> true, 'view'=> true, 'edit' => true, 'delete' => true, 'status' => true],
            ['id'=> 17, 'role_id'=> 1, 'menu_id' => 17, 'create'=> true, 'view'=> true, 'edit' => true, 'delete' => true, 'status' => true],
            ['id'=> 18, 'role_id'=> 1, 'menu_id' => 18, 'create'=> true, 'view'=> true, 'edit' => true, 'delete' => true, 'status' => true],
            ['id'=> 19, 'role_id'=> 1, 'menu_id' => 19, 'create'=> true, 'view'=> true, 'edit' => true, 'delete' => true, 'status' => true],
            ['id'=> 20, 'role_id'=> 1, 'menu_id' => 20, 'create'=> true, 'view'=> true, 'edit' => true, 'delete' => true, 'status' => true],
            ['id'=> 21, 'role_id'=> 1, 'menu_id' => 21, 'create'=> true, 'view'=> true, 'edit' => true, 'delete' => true, 'status' => true],
            ['id'=> 22, 'role_id'=> 1, 'menu_id' => 22, 'create'=> true, 'view'=> true, 'edit' => true, 'delete' => true, 'status' => true],
            ['id'=> 23, 'role_id'=> 1, 'menu_id' => 23, 'create'=> true, 'view'=> true, 'edit' => true, 'delete' => true, 'status' => true],
            ['id'=> 24, 'role_id'=> 1, 'menu_id' => 24, 'create'=> true, 'view'=> true, 'edit' => true, 'delete' => true, 'status' => true],
            ['id'=> 25, 'role_id'=> 1, 'menu_id' => 25, 'create'=> true, 'view'=> true, 'edit' => true, 'delete' => true, 'status' => true],
            ['id'=> 26, 'role_id'=> 1, 'menu_id' => 26, 'create'=> true, 'view'=> true, 'edit' => true, 'delete' => true, 'status' => true],
            ['id'=> 27, 'role_id'=> 1, 'menu_id' => 27, 'create'=> true, 'view'=> true, 'edit' => true, 'delete' => true, 'status' => true],
            ['id'=> 28, 'role_id'=> 1, 'menu_id' => 28, 'create'=> true, 'view'=> true, 'edit' => true, 'delete' => true, 'status' => true],
            ['id'=> 29, 'role_id'=> 1, 'menu_id' => 29, 'create'=> true, 'view'=> true, 'edit' => true, 'delete' => true, 'status' => true],
            ['id'=> 30, 'role_id'=> 1, 'menu_id' => 30, 'create'=> true, 'view'=> true, 'edit' => true, 'delete' => true, 'status' => true],
            ['id'=> 31, 'role_id'=> 1, 'menu_id' => 31, 'create'=> true, 'view'=> true, 'edit' => true, 'delete' => true, 'status' => true],
            ['id'=> 32, 'role_id'=> 1, 'menu_id' => 32, 'create'=> true, 'view'=> true, 'edit' => true, 'delete' => true, 'status' => true],
            ['id'=> 33, 'role_id'=> 1, 'menu_id' => 33, 'create'=> true, 'view'=> true, 'edit' => true, 'delete' => true, 'status' => true],
            ['id'=> 34, 'role_id'=> 1, 'menu_id' => 34, 'create'=> true, 'view'=> true, 'edit' => true, 'delete' => true, 'status' => true],
            ['id'=> 35, 'role_id'=> 1, 'menu_id' => 35, 'create'=> true, 'view'=> true, 'edit' => true, 'delete' => true, 'status' => true],
            ['id'=> 36, 'role_id'=> 1, 'menu_id' => 36, 'create'=> true, 'view'=> true, 'edit' => true, 'delete' => true, 'status' => true],
            ['id'=> 37, 'role_id'=> 1, 'menu_id' => 37, 'create'=> true, 'view'=> true, 'edit' => true, 'delete' => true, 'status' => true],
            ['id'=> 38, 'role_id'=> 1, 'menu_id' => 38, 'create'=> true, 'view'=> true, 'edit' => true, 'delete' => true, 'status' => true],
            ['id'=> 39, 'role_id'=> 1, 'menu_id' => 39, 'create'=> true, 'view'=> true, 'edit' => true, 'delete' => true, 'status' => true],
            ['id'=> 40, 'role_id'=> 1, 'menu_id' => 40, 'create'=> true, 'view'=> true, 'edit' => true, 'delete' => true, 'status' => true],
            ['id'=> 41, 'role_id'=> 1, 'menu_id' => 41, 'create'=> true, 'view'=> true, 'edit' => true, 'delete' => true, 'status' => true],
            ['id'=> 42, 'role_id'=> 1, 'menu_id' => 42, 'create'=> true, 'view'=> true, 'edit' => true, 'delete' => true, 'status' => true],
            ['id'=> 43, 'role_id'=> 1, 'menu_id' => 43, 'create'=> true, 'view'=> true, 'edit' => true, 'delete' => true, 'status' => true],
            ['id'=> 44, 'role_id'=> 1, 'menu_id' => 44, 'create'=> true, 'view'=> true, 'edit' => true, 'delete' => true, 'status' => true],
            ['id'=> 45, 'role_id'=> 1, 'menu_id' => 45, 'create'=> true, 'view'=> true, 'edit' => true, 'delete' => true, 'status' => true],
            ['id'=> 46, 'role_id'=> 1, 'menu_id' => 46, 'create'=> true, 'view'=> true, 'edit' => true, 'delete' => true, 'status' => true],
            ['id'=> 47, 'role_id'=> 1, 'menu_id' => 47, 'create'=> true, 'view'=> true, 'edit' => true, 'delete' => true, 'status' => true],
            ['id'=> 48, 'role_id'=> 1, 'menu_id' => 48, 'create'=> true, 'view'=> true, 'edit' => true, 'delete' => true, 'status' => true],
            ['id'=> 49, 'role_id'=> 1, 'menu_id' => 49, 'create'=> true, 'view'=> true, 'edit' => true, 'delete' => true, 'status' => true],
            ['id'=> 50, 'role_id'=> 1, 'menu_id' => 50, 'create'=> true, 'view'=> true, 'edit' => true, 'delete' => true, 'status' => true],
            ['id'=> 51, 'role_id'=> 1, 'menu_id' => 51, 'create'=> true, 'view'=> true, 'edit' => true, 'delete' => true, 'status' => true],
            ['id'=> 52, 'role_id'=> 1, 'menu_id' => 52, 'create'=> true, 'view'=> true, 'edit' => true, 'delete' => true, 'status' => true],
            ['id'=> 53, 'role_id'=> 1, 'menu_id' => 53, 'create'=> true, 'view'=> true, 'edit' => true, 'delete' => true, 'status' => true],
            ['id'=> 54, 'role_id'=> 1, 'menu_id' => 54, 'create'=> true, 'view'=> true, 'edit' => true, 'delete' => true, 'status' => true],
            ['id'=> 55, 'role_id'=> 1, 'menu_id' => 55, 'create'=> true, 'view'=> true, 'edit' => true, 'delete' => true, 'status' => true],
            ['id'=> 56, 'role_id'=> 1, 'menu_id' => 56, 'create'=> true, 'view'=> true, 'edit' => true, 'delete' => true, 'status' => true],
            ['id'=> 57, 'role_id'=> 1, 'menu_id' => 57, 'create'=> true, 'view'=> true, 'edit' => true, 'delete' => true, 'status' => true],
            ['id'=> 58, 'role_id'=> 1, 'menu_id' => 58, 'create'=> true, 'view'=> true, 'edit' => true, 'delete' => true, 'status' => true],
            ['id'=> 59, 'role_id'=> 1, 'menu_id' => 59, 'create'=> true, 'view'=> true, 'edit' => true, 'delete' => true, 'status' => true],
            ['id'=> 60, 'role_id'=> 1, 'menu_id' => 60, 'create'=> true, 'view'=> true, 'edit' => true, 'delete' => true, 'status' => true],

        ];
        RoleMenuPermission::insert($data);
    }
}
