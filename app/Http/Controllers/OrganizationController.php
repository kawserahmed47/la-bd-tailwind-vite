<?php

namespace App\Http\Controllers;

use App\Models\BasicSettings\Organization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OrganizationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['organizations'] = Organization::latest()->get();
        return view('backend.pages.organization.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.pages.organization.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'bn_name' => 'required',
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
            $organization = new Organization();
            $organization->name = $request->name;
            $organization->bn_name = $request->bn_name;
            $organization->description = $request->description;
            $organization->status = $request->status ?? false;
            $organization->save();

            $data['status'] = true;
            $data['message'] = "Organization created successfully!";
            return response()->json($data, 200);

        } catch (\Throwable $th) {
            $data['status'] = false;
            $data['message'] = "Failed to create organization!";
            $data['errors'] = $th;
            return response()->json($data, 500);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return view('backend.pages.organization.show');

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        return view('backend.pages.organization.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        //
    }
}
