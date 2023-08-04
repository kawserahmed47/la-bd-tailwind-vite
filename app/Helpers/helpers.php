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

if(! function_exists('projectStatus')){
    function projectStatus()
    {
        $data= [
            "draft" => [
                'name' => 'Draft',
                'bn_name' => 'খসড়া',
                'color' => 'bg-status-draft'
            ] ,
            'current' => [
                'name' => 'Current',
                'bn_name' => 'চলমান',
                'color' => 'bg-status-current'
            ],
            'pending' => [
                'name' => 'Pending',
                'bn_name' => 'অমীমাংসিত',
                'color' => 'bg-status-pending'
            ],
            'finished' => [
                'name' => 'Finished',
                'bn_name' => 'সমাপ্ত',
                'color' => 'bg-status-finished'
            ]
        ];
        return $data;
    }
}


?>