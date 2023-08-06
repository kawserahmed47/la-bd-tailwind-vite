<?php

namespace App\Http\Controllers;

use App\Models\ProjectManagement\ProjectOrganizationOfficer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProjectOrganizationOfficerController extends Controller
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
            'project_id' => 'required|exists:projects,id',
            'organization_office_id' => 'required|exists:organization_offices,id',
            'organization_designation_id' => 'required|exists:organization_designations,id',
            'organization_officer_id' => 'required|exists:organization_officers,id',
            'status' => 'nullable|boolean'
        ]);

        if ($validator->fails()) {
            $data['status'] = false;
            $data['message'] = "Please enter all required fields!";
            $data['errors'] = $validator->errors();
            return response()->json($data, 400);
        }

        try {
            $project_organization_officer = new ProjectOrganizationOfficer();
            $project_organization_officer->project_id = $request->project_id;
            $project_organization_officer->organization_officer_id = $request->organization_officer_id;
            $project_organization_officer->status =  $request->status ?? false;
            $project_organization_officer->save();
            $data['status'] = true;
            $data['project_organization_officer'] = $project_organization_officer;
            $data['message'] = "Organization officer created successfully!";
            return response()->json($data, 200);
        } catch (\Throwable $th) {
            $data['status'] = false;
            $data['message'] = "Failed to create organization officer!";
            $data['errors'] = $th;
            return response()->json($data, 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(ProjectOrganizationOfficer $projectOrganizationOfficer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProjectOrganizationOfficer $projectOrganizationOfficer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProjectOrganizationOfficer $projectOrganizationOfficer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProjectOrganizationOfficer $projectOrganizationOfficer)
    {
        //
    }
}
