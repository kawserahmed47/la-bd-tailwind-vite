<?php

namespace App\Http\Controllers;

use App\Models\BasicSettings\District;
use App\Models\BasicSettings\Division;
use App\Models\BasicSettings\Ministry;
use App\Models\BasicSettings\Organization;
use App\Models\BasicSettings\OrganizationDesignation;
use App\Models\BasicSettings\OrganizationOffice;
use App\Models\ProjectManagement\Project;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Mpdf\Mpdf;

class ProjectController extends Controller
{

    public function uniqueProjectID($unique_project_id = '')
    {
        $prefix = date('y');
        $uniqueId = $unique_project_id ? $unique_project_id : $prefix . '0001';
        if($this->checkUniqueProjectID($uniqueId)){
            $count = Project::where('project_id', 'like', "$prefix%")->get()->count();
            $count = $count+2;
            $uniqueId = $prefix.str_pad($count, 4, '0', STR_PAD_LEFT);
            $this->uniqueProjectID($uniqueId);
        }
        return $uniqueId;
    }

    public function checkUniqueProjectID($unique_project_id)
    {
        return Project::where('project_id', $unique_project_id)->exists();
    }


    public function current()
    {
        $data['projects'] = Project::whereIn('status', [ 'draft', 'current'] )->latest()->get();
        return view('backend.pages.project.current', $data);
    }

    public function finished()
    {
        $data['projects'] = Project::where('status', 'finished')->latest()->get();
        return view('backend.pages.project.finished', $data);
    }

    public function pending()
    {
        $data['projects'] = Project::where('status', 'pending')->latest()->get();
        return view('backend.pages.project.pending', $data);
    }

    public function officers($id)
    {
        $project = Project::with(['organization_officers' => function($q1){
            $q1->with(['officer' => function($q2){
                $q2->with('office', 'designation', 'user');
            }]);
        }])->with('organization')->find($id);

        $data['organization_offices'] = OrganizationOffice::where('organization_id', $project->organization_id )->get();
        $data['organization_designations'] = OrganizationDesignation::where('organization_id', $project->organization_id )->get();

        $data['project'] = $project;
        // return response()->json($data, 200);
        return view('backend.pages.project.organization_officers.index', $data);
    }

    public function attachments($id)
    {
        $project = Project::with('attachments')->find($id);
        $data['project'] = $project;
        return view('backend.pages.project.attachments.index', $data);
    }

 

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return redirect()->route('admin.project.current');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['ministries'] = Ministry::where('status', true)->orderBy('name', 'asc')->get();
        $data['organizations'] = Organization::where('status', true)->orderBy('name', 'asc')->get();
        $data['divisions'] = Division::orderBy('name', 'asc')->where('status', true)->get();
        $data['sections'] = Section::orderBy('name', 'asc')->where('status', true)->get();
        return view('backend.pages.project.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required | unique:projects,name',
            'bn_name' => 'required | unique:projects,bn_name',
            'description' => 'nullable',
            'status' => 'required|in:draft,current,pending,finished'
        ]);

        if ($validator->fails()) {
            $data['status'] = false;
            $data['message'] = "Please enter all required fields!";
            $data['errors'] = $validator->errors();
            return response()->json($data, 400);
        }

        try {
            $project = new Project();
            $project->project_id = $this->uniqueProjectID();
            $project->name = $request->name;
            $project->bn_name = $request->bn_name;
            $project->organization_id = $request->organization_id;
            $project->ministry_id  = $request->ministry_id ;
            $project->district_id  = $request->district_id ;
            $project->section_id = $request->section_id;
            $project->description = $request->description;
            $project->status = $request->status;
            $project->created_by = Auth::id();
            $project->updated_by = Auth::id();
            $project->save();

            $data['status'] = true;
            $data['message'] = "Project created successfully!";
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
        $data['sections'] = Section::orderBy('name', 'asc')->where('status', true)->get();
        $data['ministries'] = Ministry::where('status', true)->orderBy('name', 'asc')->get();
        $data['organizations'] = Organization::where('status', true)->orderBy('name', 'asc')->get();
        $data['divisions'] = Division::orderBy('name', 'asc')->where('status', true)->get();
        $project= Project::with('district')->find($id);
        if($project){
            $data['districts'] = District::where('division_id', $project->district->division_id)->get();
            $data['project'] =  $project;
            return view('backend.pages.project.show', $data);
        } else {
            abort(404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data['sections'] = Section::orderBy('name', 'asc')->where('status', true)->get();
        $data['ministries'] = Ministry::where('status', true)->orderBy('name', 'asc')->get();
        $data['organizations'] = Organization::where('status', true)->orderBy('name', 'asc')->get();
        $data['divisions'] = Division::orderBy('name', 'asc')->where('status', true)->get();
        $project= Project::with('district')->find($id);
        if($project){
            $data['districts'] = District::where('division_id', $project->district->division_id)->get();
            $data['project'] =  $project;
            return view('backend.pages.project.edit', $data);
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
            'name' => 'required | unique:projects,name,'.$id,
            'bn_name' => 'required | unique:projects,bn_name,'.$id,
            'description' => 'nullable',
            'status' => 'required|in:draft,current,pending,finished'
        ]);

        if ($validator->fails()) {
            $data['status'] = false;
            $data['message'] = "Please enter all required fields!";
            $data['errors'] = $validator->errors();
            return response()->json($data, 400);
        }
        $project =  Project::find($id);

        if($project){
            try {
                $project->name = $request->name;
                $project->bn_name = $request->bn_name;
                $project->organization_id = $request->organization_id;
                $project->ministry_id  = $request->ministry_id;
                $project->district_id  = $request->district_id;
                $project->section_id = $request->section_id;
                $project->description = $request->description;
                $project->status = $request->status;
                $project->updated_by = Auth::id();
                $project->save();
    
                $data['status'] = true;
                $data['message'] = "Project updated successfully!";
                return response()->json($data, 200);
            } catch (\Throwable $th) {
                $data['status'] = false;
                $data['message'] = "Failed to update project!";
                $data['errors'] = $th;
                return response()->json($data, 500);
            }
        } else {
            $data['status'] = false;
            $data['message'] = "Nothing found to update project!";
            return response()->json($data, 404);
        }

       
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            Project::destroy($id);
            $data['status'] = true;
            $data['message'] = "Project removed successfully!";
            return response()->json($data, 200);
        } catch (\Throwable $th) {
            $data['status'] = false;
            $data['message'] = "Failed to remove project!";
            $data['errors'] = $th;
            return response()->json($data, 200);
        }
    }

    public function download($slug)
    {
        $data['project'] = Project::where('slug',$slug)->first();
        if (!$data['project']) {abort(404);}

        $config = [
            'mode' => 'utf-8', // Set the character encoding
            'format' => 'A4',  // Set the paper size (A4 is the default)
            'orientation' => 'P', // 'P' for portrait, 'L' for landscape
            'default_font_size' => 12, // Set the default font size
            'default_font' => 'bangla', // Set the default font to your Bengali font
        ];
        $mpdf = new Mpdf($config);
        $mpdf->showImageErrors = true;

        $html =  view('backend.pages.project.download', $data)->render();

        $mpdf->WriteHTML($html);
        $mpdf->Output('project.pdf', 'I');

        // return view('backend.pages.project.download', $data);
    }
}
