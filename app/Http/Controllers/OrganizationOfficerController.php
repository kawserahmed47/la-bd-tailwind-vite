<?php

namespace App\Http\Controllers;

use App\Models\BasicSettings\Organization;
use App\Models\BasicSettings\OrganizationDesignation;
use App\Models\BasicSettings\OrganizationOffice;
use App\Models\BasicSettings\OrganizationOfficer;
use App\Models\BasicSettings\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Mpdf\Mpdf;

class OrganizationOfficerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['organization_officers'] = OrganizationOfficer::with('user', 'designation')->with(['office' => function ($q1) {
            $q1->with('organization');
        }])->latest()->get();
        return view('backend.pages.organization.officer.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['roles'] = Role::where('status', true)->get();
        $data['organizations'] = Organization::where('status', true)->latest()->get();
        return view('backend.pages.organization.officer.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'organization_id' => 'required|exists:organizations,id',
            'organization_designation_id' => 'required|exists:organization_designations,id',
            'organization_office_id' => 'required|exists:organization_offices,id',
            'role_id' => 'required|exists:roles,id',
            'name' => 'required',
            'bn_name' => 'required',
            'mobile' => 'required',
            'email' => 'required',
            'status' => 'nullable|boolean'
        ]);

        if ($validator->fails()) {
            $data['status'] = false;
            $data['message'] = "Please enter all required fields!";
            $data['errors'] = $validator->errors();
            return response()->json($data, 400);
        }

        DB::beginTransaction();
        try {
            $user = new User();
            $user->name = $request->name;
            $user->bn_name = $request->bn_name;
            $user->mobile = $request->mobile;
            $user->email = $request->email;
            $user->password = Hash::make($request->mobile);
            $user->role_id = $request->role_id;
            $user->status =  $request->status ?? false;
            if ($user->save()) {
                $organization_officer = new OrganizationOfficer();
                $organization_officer->user_id = $user->id;
                $organization_officer->organization_office_id = $request->organization_office_id;
                $organization_officer->organization_designation_id = $request->organization_designation_id;
                $organization_officer->status =  $request->status ?? false;
                $organization_officer->save();
                DB::commit();
                $data['status'] = true;
                $data['message'] = "Organization officer created successfully!";
                return response()->json($data, 200);
            }
        } catch (\Throwable $th) {
            DB::rollBack();
            $data['status'] = false;
            $data['message'] = "Failed to create organization officer!";
            $data['errors'] = $th;
            return response()->json($data, 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $organization_officer = OrganizationOfficer::with('user', 'designation')->with(['office' => function ($q1) {
            $q1->with('organization');
        }])->find($id);

        if ($organization_officer) {
            $data['roles'] = Role::where('status', true)->get();
            $data['organizations'] = Organization::where('status', true)->latest()->get();
            $data['offices'] = OrganizationOffice::where('organization_id', $organization_officer->office->organization_id)->get();
            $data['designations'] = OrganizationDesignation::where('organization_id', $organization_officer->designation->organization_id)->get();
            $data['organization_officer'] = $organization_officer;
            return view('backend.pages.organization.officer.show', $data);
        } else {
            abort(404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $organization_officer = OrganizationOfficer::with('user', 'designation')->with(['office' => function ($q1) {
            $q1->with('organization');
        }])->find($id);

        if ($organization_officer) {
            $data['roles'] = Role::where('status', true)->get();
            $data['organizations'] = Organization::where('status', true)->latest()->get();
            $data['offices'] = OrganizationOffice::where('organization_id', $organization_officer->office->organization_id)->get();
            $data['designations'] = OrganizationDesignation::where('organization_id', $organization_officer->designation->organization_id)->get();
            $data['organization_officer'] = $organization_officer;
            return view('backend.pages.organization.officer.edit', $data);
        } else {
            abort(404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'organization_id' => 'required|exists:organizations,id',
            'organization_designation_id' => 'required|exists:organization_designations,id',
            'organization_office_id' => 'required|exists:organization_offices,id',
            'role_id' => 'required|exists:roles,id',
            'name' => 'required',
            'bn_name' => 'required',
            'mobile' => 'required',
            'email' => 'required',
            'status' => 'nullable|boolean'
        ]);

        if ($validator->fails()) {
            $data['status'] = false;
            $data['message'] = "Please enter all required fields!";
            $data['errors'] = $validator->errors();
            return response()->json($data, 400);
        }

        $organization_officer = OrganizationOfficer::find($id);

        if ($organization_officer) {
            DB::beginTransaction();
            try {
                $user =  User::find($organization_officer->user_id);
                $user->name = $request->name;
                $user->bn_name = $request->bn_name;
                $user->mobile = $request->mobile;
                $user->email = $request->email;
                $user->role_id = $request->role_id;
                $user->status =  $request->status ?? false;
                if ($user->save()) {
                    $organization_officer->organization_office_id = $request->organization_office_id;
                    $organization_officer->organization_designation_id = $request->organization_designation_id;
                    $organization_officer->status =  $request->status ?? false;
                    $organization_officer->save();
                    DB::commit();
                    $data['status'] = true;
                    $data['message'] = "Organization officer updated successfully!";
                    return response()->json($data, 200);
                }
            } catch (\Throwable $th) {
                DB::rollBack();
                $data['status'] = false;
                $data['message'] = "Failed to update organization officer!";
                $data['errors'] = $th;
                return response()->json($data, 500);
            }
        } else {
            $data['status'] = false;
            $data['message'] = "Nothing found to update!";
            return response()->json($data, 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
           $organization_officer = OrganizationOfficer::find($id);
           if( $organization_officer){
                User::find($organization_officer->user_id)->delete();
           }
            $data['status'] = true;
            $data['message'] = "Organization officer removed successfully!";
            return response()->json($data, 200);
        } catch (\Throwable $th) {
            $data['status'] = false;
            $data['message'] = "Failed to remove organization officer!";
            $data['errors'] = $th;
            return response()->json($data, 200);
        }
    }

    public function download($id)
    {
        $data['organization_officer'] = OrganizationOfficer::with('designation')
        ->with(['office' => function ($q1) {
            $q1->with('organization');
        }])
        ->with(['user' => function ($q2) {
            $q2->with('role');
        }])
        ->find($id);

        if (!$data['organization_officer']) {
            abort(404);
        }

        // return response()->json($data, 200);

        $config = [
            'mode' => 'utf-8', // Set the character encoding
            'format' => 'A4',  // Set the paper size (A4 is the default)
            'orientation' => 'P', // 'P' for portrait, 'L' for landscape
            'default_font_size' => 12, // Set the default font size
            'default_font' => 'bangla', // Set the default font to your Bengali font
        ];
        $mpdf = new Mpdf($config);
        $mpdf->showImageErrors = true;


        $html =  view('backend.pages.organization.officer.download', $data)->render();

        $mpdf->WriteHTML($html);
        $mpdf->debug = true;
        $mpdf->Output('organization.pdf', 'I');

        // return view('backend.pages.download.organization', $data);


    }

    public function options(Request $request)
    {
        $officers = OrganizationOfficer::with('user')->where('organization_office_id', $request->organization_office_id)
        ->where('organization_designation_id', $request->organization_designation_id)
        ->get();

        $options = '<option value="">Select Officer</option>';

        if(count($officers)){
            foreach ($officers as $officer) {
                $options .= '<option value="'.$officer->id.'">'.$officer->user->name.'</option>';
            }
            
            $data['status'] = true;
            $data['message'] = "Select Next Options";
            $data['html'] = $options;
            return response()->json($data, 200);        
        } else {
            $data['status'] = false;
            $data['message'] = "No Officers found!";
            $data['html'] = $options;
            return response()->json($data, 404);   
        }

    }
}
