<?php

namespace App\Http\Controllers;

use App\Models\BasicSettings\Ministry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Mpdf\Mpdf;

class MinistryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['ministries'] = Ministry::latest()->get();
        return view('backend.pages.ministry.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.pages.ministry.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required | unique:ministries,name',
            'bn_name' => 'required | unique:ministries,bn_name',
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
            $ministry = new Ministry();
            $ministry->name = $request->name;
            $ministry->bn_name = $request->bn_name;
            $ministry->description = $request->description;
            $ministry->status = $request->status ?? false;
            $ministry->save();

            $data['status'] = true;
            $data['message'] = "Ministry created successfully!";
            return response()->json($data, 200);
        } catch (\Throwable $th) {
            $data['status'] = false;
            $data['message'] = "Failed to create ministry!";
            $data['errors'] = $th;
            return response()->json($data, 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data['ministry'] = Ministry::find($id);
        if (!$data['ministry']) {
            abort(404);
        }
        return view('backend.pages.ministry.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data['ministry'] = Ministry::find($id);
        if (!$data['ministry']) {
            abort(404);
        }
        return view('backend.pages.ministry.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required | unique:ministries,name,' . $id,
            'bn_name' => 'required | unique:ministries,bn_name,' . $id,
            'description' => 'nullable',
            'status' => 'nullable|boolean'
        ]);

        if ($validator->fails()) {
            $data['status'] = false;
            $data['message'] = "Please enter all required fields!";
            $data['errors'] = $validator->errors();
            return response()->json($data, 400);
        }

        $ministry =  Ministry::find($id);

        if ($ministry) {
            try {
                $ministry->name = $request->name;
                $ministry->bn_name = $request->bn_name;
                $ministry->description = $request->description;
                $ministry->status = $request->status ?? false;
                $ministry->save();

                $data['status'] = true;
                $data['message'] = "Ministry updated successfully!";
                return response()->json($data, 200);
            } catch (\Throwable $th) {
                $data['status'] = false;
                $data['message'] = "Failed to update ministry!";
                $data['errors'] = $th;
                return response()->json($data, 500);
            }
        } else {
            $data['status'] = false;
            $data['message'] = "Nothing to update ministry!";
            return response()->json($data, 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            Ministry::destroy($id);
            $data['status'] = true;
            $data['message'] = "Ministry removed successfully!";
            return response()->json($data, 200);
        } catch (\Throwable $th) {
            $data['status'] = false;
            $data['message'] = "Failed to remove ministry!";
            $data['errors'] = $th;
            return response()->json($data, 200);
        }
    }

    public function download($slug)
    {
        $data['ministry'] = Ministry::where('slug',$slug)->first();
        if (!$data['ministry']) {
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

        $html =  view('backend.pages.ministry.download', $data)->render();

        $mpdf->WriteHTML($html);
        $mpdf->Output('ministry.pdf', 'I');

        // return view('backend.pages.ministry.download', $data);
 
    
    }
}
