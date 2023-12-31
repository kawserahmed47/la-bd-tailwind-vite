<?php

namespace App\Http\Controllers;

use App\Models\ProjectManagement\ProjectAttachment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Validator;
use SebastianBergmann\Type\TrueType;

class ProjectAttachmentController extends Controller
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
            'name' => 'required',
            'file_path' => 'required',
            'description' => 'nullable',
            'status' => 'nullable|boolean'
        ]);

        if ($validator->fails()) {
            $data['status'] = false;
            $data['message'] = "Please enter all required fields!";
            $data['errors'] = $validator->errors();
            return response()->json($data, 400);
        }

        if($request->id){
            $attachment =  ProjectAttachment::find($request->id);
            if($attachment->file_path != $request->file_path){
                try {
                    unlink($attachment->file_path);
                } catch (\Throwable $th) {
                    //throw $th;
                }
            }

        } else {
            $attachment = new ProjectAttachment();
            $attachment->created_by = Auth::id();
        }

        

       


        try {
           
            $attachment->project_id = $request->project_id;
            $attachment->name = $request->name;
            $attachment->file_path = $request->file_path;
            $attachment->description = $request->description;
            $attachment->status = $request->status ?? false;
            $attachment->updated_by = Auth::id();

            $attachment->save();
            $data['status'] = true;
            $data['message'] = "Attachment saved successfully!";
            return response()->json($data, 200);
        } catch (\Throwable $th) {
            $data['status'] = false;
            $data['message'] = "Failed to save the attachment!";
            $data['errors'] = $th;
            return response()->json($data, 500);
        }
    }
    public function upload(Request $request)
    {
        $file = $request->file('file');
        $name = uniqid() . '_' . trim($file->getClientOriginalName());
        $upload_path = 'attachments/';
        $image_url = $upload_path . $name;
        $file->move($upload_path, $name);

        return response()->json([
            'name'          => $image_url,
            'original_name' => $file->getClientOriginalName(),
        ]);
    }

    public function remove(Request $request)
    {
        try {
            unlink($request->file_name);
            $data['status'] = true;
            $data['message'] = "Removed successfully!";
            return response()->json($data, 200);
        } catch (\Throwable $th) {
            $data['status'] = false;
            $data['message'] = "Failed to remove from server!";
            $data['errors'] = $th;
            return response()->json($data, 200);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(ProjectAttachment $projectAttachment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProjectAttachment $projectAttachment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProjectAttachment $projectAttachment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $attachment = ProjectAttachment::find($id);
        if($attachment){
            if($attachment->file_path){
                try {
                    unlink($attachment->file_path);
                } catch (\Throwable $th) {
                    //throw $th;
                }
            }

            if($attachment->delete()){
                $data['status'] = true;
                $data['message'] = "Attachment deleted successfully!";
                return response()->json($data, 200);
            } else {
                $data['status'] = false;
                $data['message'] = "Failed to delete!";
                return response()->json($data, 500);
            }


        } else {
            $data['status'] = false;
            $data['message'] = "Nothing found to delete!";
            return response()->json($data, 404);
        }

        try {
            //code...
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
