<?php

namespace App\Http\Controllers;

use App\Models\BasicSettings\Organization;
use App\Models\BasicSettings\OrganizationDesignation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Mpdf\Mpdf;

class OrganizationDesignationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['organization_designations'] = OrganizationDesignation::with('organization')->latest()->get();
        return view('backend.pages.organization.designation.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['organizations'] = Organization::where('status', true)->latest()->get();
        return view('backend.pages.organization.designation.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'organization_id' => 'required|exists:organizations,id',
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
            $organization_office = new OrganizationDesignation();
            $organization_office->organization_id = $request->organization_id;
            $organization_office->name = $request->name;
            $organization_office->bn_name = $request->bn_name;
            $organization_office->description = $request->description;
            $organization_office->status = $request->status ?? false;
            $organization_office->save();

            $data['status'] = true;
            $data['message'] = "Organization designation created successfully!";
            return response()->json($data, 200);
        } catch (\Throwable $th) {
            $data['status'] = false;
            $data['message'] = "Failed to create organization office!";
            $data['errors'] = $th;
            return response()->json($data, 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data['organization_designation'] = OrganizationDesignation::find($id);
        if (!$data['organization_designation']) {
            abort(404);
        }
        $data['organizations'] = Organization::where('status', true)->latest()->get();

        return view('backend.pages.organization.designation.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data['organization_designation'] = OrganizationDesignation::find($id);
        if (!$data['organization_designation']) {
            abort(404);
        }
        $data['organizations'] = Organization::where('status', true)->latest()->get();

        return view('backend.pages.organization.designation.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        $validator = Validator::make($request->all(), [
            'organization_id' => 'required|exists:organizations,id',
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
        $organization_designation =  OrganizationDesignation::find($id);


        if($organization_designation){
            try {
                $organization_designation->organization_id = $request->organization_id;
                $organization_designation->name = $request->name;
                $organization_designation->bn_name = $request->bn_name;
                $organization_designation->description = $request->description;
                $organization_designation->status = $request->status ?? false;
                $organization_designation->save();
    
                $data['status'] = true;
                $data['message'] = "Organization designation updated successfully!";
                return response()->json($data, 200);
            } catch (\Throwable $th) {
                $data['status'] = false;
                $data['message'] = "Failed to update organization designation!";
                $data['errors'] = $th;
                return response()->json($data, 500);
            }
        } else {
            $data['status'] = false;
            $data['message'] = "Failed to update organization designation!";
            return response()->json($data, 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        try {
            OrganizationDesignation::destroy($id);
            $data['status'] = true;
            $data['message'] = "Organization designation removed successfully!";
            return response()->json($data, 200);
        } catch (\Throwable $th) {
            $data['status'] = false;
            $data['message'] = "Failed to remove organization designation!";
            $data['errors'] = $th;
            return response()->json($data, 200);
        }
    }

    public function download($slug)
    {
        $data['organization_designation'] = OrganizationDesignation::with('organization')->where('slug',$slug)->first();
        if (!$data['organization_designation']) {
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
        $mpdf->showImageErrors = true;
        

        $html =  view('backend.pages.organization.designation.download', $data)->render();

        $mpdf->WriteHTML($html);
        $mpdf->debug = true;
        $mpdf->Output('organization.pdf', 'I');

        // return view('backend.pages.organization.download', $data);
 
    
    }
}
