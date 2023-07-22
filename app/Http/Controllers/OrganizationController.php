<?php

namespace App\Http\Controllers;

use App\Models\BasicSettings\Organization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
// Import the mpdf class at the beginning of your file
use Mpdf\Mpdf;

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
            'name' => 'required | unique:organizations,name',
            'bn_name' => 'required | unique:organizations,bn_name',
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
        $data['organization'] = Organization::find($id);
        if (!$data['organization']) {
            abort(404);
        }
        return view('backend.pages.organization.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data['organization'] = Organization::find($id);
        if (!$data['organization']) {
            abort(404);
        }
        return view('backend.pages.organization.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required | unique:organizations,name,' . $id,
            'bn_name' => 'required | unique:organizations,bn_name,' . $id,
            'description' => 'nullable',
            'status' => 'nullable|boolean'
        ]);

        if ($validator->fails()) {
            $data['status'] = false;
            $data['message'] = "Please enter all required fields!";
            $data['errors'] = $validator->errors();
            return response()->json($data, 400);
        }

        $organization =  Organization::find($id);

        if ($organization) {
            try {
                $organization->name = $request->name;
                $organization->bn_name = $request->bn_name;
                $organization->description = $request->description;
                $organization->status = $request->status ?? false;
                $organization->save();

                $data['status'] = true;
                $data['message'] = "Organization updated successfully!";
                return response()->json($data, 200);
            } catch (\Throwable $th) {
                $data['status'] = false;
                $data['message'] = "Failed to update organization!";
                $data['errors'] = $th;
                return response()->json($data, 500);
            }
        } else {
            $data['status'] = false;
            $data['message'] = "Nothing to update organization!";
            return response()->json($data, 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            Organization::destroy($id);
            $data['status'] = true;
            $data['message'] = "Organization removed successfully!";
            return response()->json($data, 200);
        } catch (\Throwable $th) {
            $data['status'] = false;
            $data['message'] = "Failed to remove organization!";
            $data['errors'] = $th;
            return response()->json($data, 200);
        }
    }

    public function download($id)
    {
        $data['organization'] = Organization::find($id);
        if (!$data['organization']) {
            abort(404);
        }

        $config = [
            'mode' => 'utf-8', // Set the character encoding
            'format' => 'A4',  // Set the paper size (A4 is the default)
            'orientation' => 'P', // 'P' for portrait, 'L' for landscape
            'default_font_size' => 12, // Set the default font size
            'default_font' => 'bangla', // Set the default font to your Bengali font
        ];
        $mpdf = new Mpdf($config);


        $html =  view('backend.pages.organization.download', $data)->render();

        $mpdf->WriteHTML($html);
        $mpdf->Output('organization.pdf', 'I');

        // return view('backend.pages.organization.download', $data);
 
    
    }
}
