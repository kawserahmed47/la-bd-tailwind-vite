<?php

namespace App\Http\Controllers;

use App\Models\BasicSettings\Mouza;
use Illuminate\Http\Request;

class MouzaController extends Controller
{

    public function getMouzasByThanaAndSurvey(Request $request)
    {
        $data['mouzas'] = Mouza::rightJoin('mouza_surveys', 'mouza_surveys.mouza_id','=','mouzas.id')
        ->select('mouzas.thana_id',  'mouzas.name', 'mouzas.bn_name', 'mouza_surveys.id', 'mouza_surveys.jl_number', 'mouza_surveys.survey_id')
        ->where('mouza_surveys.survey_id', $request->survey_id)
        ->where('mouzas.thana_id', $request->thana_id)
        ->get();
        return response()->json($data);
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
    public function show(Mouza $mouza)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mouza $mouza)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mouza $mouza)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mouza $mouza)
    {
        //
    }
}
