<?php

namespace App\Http\Controllers;

use App\Models\BasicSettings\Menu;
use App\Models\BasicSettings\MenuLabel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['menu_labels'] = MenuLabel::get();
        return view('backend.pages.menu.label.index', $data);
    }

    public function parentMenu()
    {
        $data['menu_labels'] = MenuLabel::with(['menus' => function($q1){
            $q1->where('parent_id', NULL)->orderBy('order_id');
        }])->get();
        return view('backend.pages.menu.parent.index', $data);
    }

    public function childMenu()
    {
        $data['menu_labels'] = MenuLabel::with(['menus' => function($q1){
            $q1->with(['child' => function($q1){
                $q1->orderBy('order_id');            
            }])->where('parent_id', NULL)->orderBy('order_id');
        }])->get();
        return view('backend.pages.menu.child.index', $data);
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
        $validator = Validator::make($request->all(), [
            'order_id' => 'required',
            'menu_label_id' => 'required',
            'parent_id' => 'nullable',
            'name' => 'required',
            'bn_name' => 'required',
            'slug' => 'required',
            'icon' => 'nullable',
            'description' => 'nullable',
            'status' => 'nullable|boolean'
        ]);

        if ($validator->fails()) {
            $data['status'] = false;
            $data['message'] = "Please enter all required fields!";
            $data['errors'] = $validator->errors();
            return response()->json($data, 400);
        }

            try {
                $menu = new Menu();
                $menu->order_id = $request->order_id;
                $menu->menu_label_id = $request->menu_label_id;
                $menu->parent_id = $request->parent_id ?  $request->parent_id : NULL;
                $menu->name = $request->name;
                $menu->bn_name = $request->bn_name;
                $menu->slug = $request->slug ? $request->slug : '#' ;
                $menu->icon = $request->icon;
                $menu->description = $request->description;
                $menu->status = $request->status ?? false;
                $menu->save();

                $data['status'] = true;
                $data['message'] = "Menu saved successfully!";
                return response()->json($data, 200);
            } catch (\Throwable $th) {
                $data['status'] = false;
                $data['message'] = "Failed to save menu!";
                $data['errors'] = $th;
                return response()->json($data, 500);
            }
       
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
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'order_id' => 'required',
            'menu_label_id' => 'required',
            'parent_id' => 'nullable',
            'name' => 'required',
            'bn_name' => 'required',
            'slug' => 'required',
            'icon' => 'nullable',
            'description' => 'nullable',
            'status' => 'nullable|boolean'
        ]);

        if ($validator->fails()) {
            $data['status'] = false;
            $data['message'] = "Please enter all required fields!";
            $data['errors'] = $validator->errors();
            return response()->json($data, 400);
        }

        $menu =  Menu::find($id);
        if ($menu) {
            try {
                $menu->order_id = $request->order_id;
                $menu->menu_label_id = $request->menu_label_id;
                $menu->parent_id = $request->parent_id;
                $menu->name = $request->name;
                $menu->bn_name = $request->bn_name;
                $menu->slug = $request->slug ? $request->slug : '#' ;
                $menu->icon = $request->icon;
                $menu->description = $request->description;
                $menu->status = $request->status ?? false;
                $menu->save();

                $data['status'] = true;
                $data['message'] = "Menu updated successfully!";
                return response()->json($data, 200);
            } catch (\Throwable $th) {
                $data['status'] = false;
                $data['message'] = "Failed to update menu!";
                $data['errors'] = $th;
                return response()->json($data, 500);
            }
        } else {
            $data['status'] = false;
            $data['message'] = "Nothing to update on menu!";
            return response()->json($data, 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        try {
            Menu::destroy($request->id);
            $data['status'] = true;
            $data['message'] = "Menu removed successfully!";
            return response()->json($data, 200);
        } catch (\Throwable $th) {
            $data['status'] = false;
            $data['message'] = "Failed to remove menu!";
            $data['errors'] = $th;
            return response()->json($data, 200);
        }
    }

    public function clone(Request $request)
    {
        try {
            $clone_menu =  Menu::find($request->id)->duplicate();

            $data_content['duplicate'] = 'Duplicate';
            $data_content['form_action'] = route('admin.menu.update', $clone_menu->id);
            $data_content['form_class'] = 'updateMenuForm';
            $data_content['menu_label_id'] = $clone_menu->menu_label_id;

            if($request->type == 'parent'){
                $data_content['menu'] = $clone_menu;
                $data['html'] = view('backend.pages.menu.parent.partials.accordion', $data_content)->render();
    
            } else if($request->type == 'child') {
                $data_content['child'] = $clone_menu;
                $data_content['parent_id'] = $clone_menu->parent_id;
                $data['html'] = view('backend.pages.menu.child.partials.accordion', $data_content)->render();
            } else {
                $data['status'] = false;
                $data['message'] = "Failed to duplicate menu!";
                return response()->json($data, 404);
            }

           
            $data['status'] = true;
            $data['message'] = "Menu duplicated successfully!";
            return response()->json($data, 200);
        } catch (\Throwable $th) {
            $data['status'] = false;
            $data['message'] = "Failed to duplicate menu!";
            $data['errors'] = $th;
            return response()->json($data, 500);
        }
    }
}
