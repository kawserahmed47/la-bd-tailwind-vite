<?php

namespace App\Http\Controllers;

use App\Models\BasicSettings\MenuLabel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MenuLabelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
            'name' => 'required',
            'bn_name' => 'required',
            'slug' => 'required',
            'order_id' => 'required',
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
            $menu_label = new MenuLabel();
            $menu_label->name = $request->name;
            $menu_label->bn_name = $request->bn_name;
            $menu_label->slug = $request->slug ? $request->slug : '#' ;
            $menu_label->order_id = $request->order_id ? $request->order_id : 1;
            $menu_label->description = $request->description;
            $menu_label->status = $request->status ?? false;
            $menu_label->save();

            $data['status'] = true;
            $data['message'] = "Menu label updated successfully!";
            return response()->json($data, 200);
        } catch (\Throwable $th) {
            $data['status'] = false;
            $data['message'] = "Failed to update menu label!";
            $data['errors'] = $th;
            return response()->json($data, 500);
        }
      
    }

    /**
     * Display the specified resource.
     */
    public function show(MenuLabel $menuLabel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MenuLabel $menuLabel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'bn_name' => 'required',
            'slug' => 'required',
            'order_id' => 'required',
            'description' => 'nullable',
            'status' => 'nullable|boolean'
        ]);

        if ($validator->fails()) {
            $data['status'] = false;
            $data['message'] = "Please enter all required fields!";
            $data['errors'] = $validator->errors();
            return response()->json($data, 400);
        }

        $menu_label =  MenuLabel::find($id);

        if ($menu_label) {
            try {
                $menu_label->name = $request->name;
                $menu_label->bn_name = $request->bn_name;
                $menu_label->slug = $request->slug ? $request->slug : '#' ;
                $menu_label->order_id = $request->order_id ? $request->order_id : 1;
                $menu_label->description = $request->description;
                $menu_label->status = $request->status ?? false;
                $menu_label->save();

                $data['status'] = true;
                $data['message'] = "Menu label updated successfully!";
                return response()->json($data, 200);
            } catch (\Throwable $th) {
                $data['status'] = false;
                $data['message'] = "Failed to update menu label!";
                $data['errors'] = $th;
                return response()->json($data, 500);
            }
        } else {
            $data['status'] = false;
            $data['message'] = "Nothing to update on menu label!";
            return response()->json($data, 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        try {
            MenuLabel::destroy($request->id);
            $data['status'] = true;
            $data['message'] = "Menu label removed successfully!";
            return response()->json($data, 200);
        } catch (\Throwable $th) {
            $data['status'] = false;
            $data['message'] = "Failed to remove menu label!";
            $data['errors'] = $th;
            return response()->json($data, 200);
        }
    }

    public function clone(Request $request)
    {
        try {
            $clone_menu_label =  MenuLabel::find($request->id)->duplicate();

            $data_content['duplicate'] = 'Duplicate';
            $data_content['form_action'] = route('admin.menu-label.update', $clone_menu_label->id);
            $data_content['form_class'] = 'updateMenuLabelForm';
            $data_content['menu_label'] = $clone_menu_label;

            $data['status'] = true;
            $data['html'] = view('backend.pages.menu.label.partials.accordion', $data_content)->render();
            $data['message'] = "Menu label duplicated successfully!";
            return response()->json($data, 200);
        } catch (\Throwable $th) {
            $data['status'] = false;
            $data['message'] = "Failed to duplicate menu label!";
            $data['errors'] = $th;
            return response()->json($data, 200);
        }
    }
}
