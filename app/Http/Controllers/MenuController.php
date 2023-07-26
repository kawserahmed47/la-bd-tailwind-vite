<?php

namespace App\Http\Controllers;

use App\Models\BasicSettings\Menu;
use App\Models\BasicSettings\MenuLabel;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['menu_labels'] = MenuLabel::get();
        return view('backend.pages.menu.index', $data);
    }

    public function parentMenu()
    {
        $data['menu_labels'] = MenuLabel::with(['menus' => function($q1){
            $q1->where('parent_id', NULL);
        }])->get();
        return view('backend.pages.menu.parent_menu', $data);
    }

    public function childMenu()
    {
        $data['menu_labels'] = MenuLabel::with(['menus' => function($q1){
            $q1->with('child')->where('parent_id', NULL);
        }])->get();
        return view('backend.pages.menu.child_menu', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Menu $menu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Menu $menu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menu $menu)
    {
        //
    }
}
