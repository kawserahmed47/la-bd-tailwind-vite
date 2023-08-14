<?php

namespace App\Http\Controllers;

use App\Models\BasicSettings\Role;
use App\Models\Section;
use App\Models\SectionOfficer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Mpdf\Mpdf;

class SectionOfficerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    { 
        $data['section_officers'] = SectionOfficer::with('user', 'section')->latest()->get();
        return view('backend.pages.section.officer.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['roles'] = Role::where('status', true)->get();
        $data['sections'] = Section::where('status', true)->get();
        return view('backend.pages.section.officer.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'section_id' => 'required|exists:sections,id',
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
                $section_officer = new SectionOfficer();
                $section_officer->user_id = $user->id;
                $section_officer->section_id = $request->section_id;
                $section_officer->status =  $request->status ?? false;
                $section_officer->save();
                DB::commit();
                $data['status'] = true;
                $data['message'] = "Section officer created successfully!";
                return response()->json($data, 200);
            }
        } catch (\Throwable $th) {
            DB::rollBack();
            $data['status'] = false;
            $data['message'] = "Failed to create section officer!";
            $data['errors'] = $th;
            return response()->json($data, 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $section_officer = SectionOfficer::with('user', 'section')->find($id);

        if ($section_officer) {
            $data['roles'] = Role::where('status', true)->get();
            $data['sections'] = Section::where('status', true)->get();
            $data['section_officer'] = $section_officer;
            return view('backend.pages.section.officer.show', $data);
        } else {
            abort(404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $organization_officer = SectionOfficer::with('user', 'section')->find($id);

        if ($organization_officer) {
            $data['roles'] = Role::where('status', true)->get();
            $data['sections'] = Section::where('status', true)->get();
            $data['section_officer'] = $organization_officer;
            // return response()->json($data,200);
            return view('backend.pages.section.officer.edit', $data);
        } else {
            abort(404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        
        $validator = Validator::make($request->all(), [
            'section_id' => 'required|exists:sections,id',
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

        $section_officer = SectionOfficer::find($id);

        if ($section_officer) {
            DB::beginTransaction();
            try {
                $user =  User::find($section_officer->user_id);
                $user->name = $request->name;
                $user->bn_name = $request->bn_name;
                $user->mobile = $request->mobile;
                $user->email = $request->email;
                $user->role_id = $request->role_id;
                $user->status =  $request->status ?? false;
                if ($user->save()) {
                    $section_officer->user_id = $section_officer->user_id;
                    $section_officer->section_id = $request->section_id;
                    $section_officer->status =  $request->status ?? false;
                    $section_officer->save();
                    DB::commit();
                    $data['status'] = true;
                    $data['message'] = "Section officer updated successfully!";
                    return response()->json($data, 200);
                }
            } catch (\Throwable $th) {
                DB::rollBack();
                $data['status'] = false;
                $data['message'] = "Failed to update section officer!";
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
            $section_officer = SectionOfficer::find($id);
            if( $section_officer){
                 User::find($section_officer->user_id)->delete();
            }
             $data['status'] = true;
             $data['message'] = "Section officer removed successfully!";
             return response()->json($data, 200);
         } catch (\Throwable $th) {
             $data['status'] = false;
             $data['message'] = "Failed to remove section officer!";
             $data['errors'] = $th;
             return response()->json($data, 200);
         }
    }

    public function download(Request $request, $id)
    {
        $data['section_officer'] = SectionOfficer::with('section')
        ->with(['user' => function ($q2) {
            $q2->with('role');
        }])
        ->find($id);

        if (!$data['section_officer']) {
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


        $html =  view('backend.pages.section.officer.download', $data)->render();

        $mpdf->WriteHTML($html);
        $mpdf->debug = true;
        $mpdf->Output('section.pdf', 'I');

        // return view('backend.pages.download.organization', $data);
    }

    
}
