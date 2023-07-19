<?php

use App\Models\BasicSettings\MenuLabel;
use App\Models\BasicSettings\Role;
use Illuminate\Support\Facades\Auth;

if (! function_exists('userRole')) {
    function userRole()
    {
        return Role::find(Auth::user()->role_id);
    }
}

if (! function_exists('menuLabels')) {
    function menuLabels()
    {
        $menuLabels = MenuLabel::with(['menus' => function($q1){
            $q1->with('child')->where('parent_id', null);
        }])->get();
        return $menuLabels;
    }
}


?>