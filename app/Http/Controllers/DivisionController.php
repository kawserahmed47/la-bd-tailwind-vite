<?php

namespace App\Http\Controllers;

use App\Models\BasicSettings\Division;
use Illuminate\Http\Request;

class DivisionController extends Controller
{

    public function options(Request $request)
    {
        $division = Division::with(['districts' => function($q1){
            $q1->where('status', true)->orderBy('name', 'asc');
        }])->find($request->id);

        $district_options = '<option value="">Select District</option>';

        if($division){
            if(count($division->districts)){
                foreach ($division->districts as $district) {
                    $district_options .='<option value="'.$district->id.'">'.$district->name.'</option>';
                }
            }
            $data['district_options'] = $district_options;
            $data['division'] = $division;
            $data['message'] = 'Select Next Options!';
            $data['status'] = true;
            return response()->json($data, 200);
        } else {
            $data['district_options'] = $district_options;
            $data['division'] = $division;
            $data['message'] = 'Options Failed!';
            $data['status'] = false;
            return response()->json($data, 500);
        }

       

    }

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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Division $division)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Division $division)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Division $division)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Division $division)
    {
        //
    }
}
