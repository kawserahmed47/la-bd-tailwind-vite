<?php

namespace App\Http\Controllers;

use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Mpdf\Mpdf;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['sections'] = Section::latest()->get();
        return view('backend.pages.section.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.pages.section.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required | unique:sections,name',
            'bn_name' => 'required | unique:sections,bn_name',
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
            $section = new Section();
            $section->name = $request->name;
            $section->bn_name = $request->bn_name;
            $section->description = $request->description;
            $section->status = $request->status ?? false;
            $section->save();

            $data['status'] = true;
            $data['message'] = "Section created successfully!";
            return response()->json($data, 200);
        } catch (\Throwable $th) {
            $data['status'] = false;
            $data['message'] = "Failed to create section!";
            $data['errors'] = $th;
            return response()->json($data, 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data['section'] = Section::find($id);
        if (!$data['section']) {
            abort(404);
        }
        return view('backend.pages.section.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        $data['section'] = Section::find($id);
        if (!$data['section']) {
            abort(404);
        }
        return view('backend.pages.section.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required | unique:sections,name,' . $id,
            'bn_name' => 'required | unique:sections,bn_name,' . $id,
            'description' => 'nullable',
            'status' => 'nullable|boolean'
        ]);

        if ($validator->fails()) {
            $data['status'] = false;
            $data['message'] = "Please enter all required fields!";
            $data['errors'] = $validator->errors();
            return response()->json($data, 400);
        }

        $section =  Section::find($id);

        if ($section) {
            try {
                $section->name = $request->name;
                $section->bn_name = $request->bn_name;
                $section->description = $request->description;
                $section->status = $request->status ?? false;
                $section->save();

                $data['status'] = true;
                $data['message'] = "Section updated successfully!";
                return response()->json($data, 200);
            } catch (\Throwable $th) {
                $data['status'] = false;
                $data['message'] = "Failed to update section!";
                $data['errors'] = $th;
                return response()->json($data, 500);
            }
        } else {
            $data['status'] = false;
            $data['message'] = "Nothing to update section!";
            return response()->json($data, 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            Section::destroy($id);
            $data['status'] = true;
            $data['message'] = "Section removed successfully!";
            return response()->json($data, 200);
        } catch (\Throwable $th) {
            $data['status'] = false;
            $data['message'] = "Failed to remove section!";
            $data['errors'] = $th;
            return response()->json($data, 200);
        }
    }

    public function download($slug)
    {
        $data['section'] = Section::where('slug',$slug)->first();
        if (!$data['section']) {
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

        $html =  view('backend.pages.section.download', $data)->render();

        $mpdf->WriteHTML($html);
        $mpdf->Output('section.pdf', 'I');
    }
}
