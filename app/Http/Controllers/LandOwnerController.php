<?php

namespace App\Http\Controllers;

use App\Models\Land\KhatianDagShuchi;
use App\Models\Land\LandDagShuchi;
use App\Models\Land\LandKhatian;
use App\Models\Land\LandKhatianOwner;
use App\Models\Land\LandOwner;
use App\Models\Land\ProjectLandOwner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class LandOwnerController extends Controller
{


    public function uniqueLandOwnerID($unique_owner_id = '')
    {
        $prefix = date('y');
        $uniqueId = $unique_owner_id ? $unique_owner_id : $prefix . '0001';
        if($this->checkUniqueLandOwnerID($uniqueId)){
            $count = LandOwner::where('owner_id', 'like', "$prefix%")->get()->count();
            $count = $count+2;
            $uniqueId = $prefix.str_pad($count, 4, '0', STR_PAD_LEFT);
            $this->uniqueLandOwnerID($uniqueId);
        }
        return $uniqueId;
    }

    public function checkUniqueLandOwnerID($unique_owner_id)
    {
        return LandOwner::where('owner_id', $unique_owner_id)->exists();
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
        $validator = Validator::make($request->all(), [
            'thana_id' => 'required',
            'survey' => 'required',
            'mouza' => 'required',
            'land_class_id' => 'required',
            'dag_number' => 'required',
            'khatian_number' => 'required',
            'quantity' => 'required',
            'name' => 'required',
            'father_name' => 'required',
            'address' => 'required',
            'comment' => 'nullable',
        ]);

        if ($validator->fails()) {
            $data['status'] = false;
            $data['message'] = "Please check your entries!";
            $data['errors'] = $validator->errors();
            return response()->json($data, 400);
        }

        
        DB::beginTransaction();

        try {
            $dag = LandDagShuchi::firstOrNew(['mouza_id' => $request->mouza]);
            $dag->dag_number = $request->dag_number;
            $dag->save();

            $khatian = LandKhatian::firstOrNew(['mouza_id' => $request->mouza]);
            $khatian->khatian_number = $request->khatian_number;
            $khatian->save();

            $khatian_dag =  new KhatianDagShuchi();
            $khatian_dag->land_khatian_id = $khatian->id;
            $khatian_dag->land_dag_shuchi_id = $dag->id;

            $owner = new LandOwner();
            $owner->owner_id = $this->uniqueLandOwnerID();
            $owner->name = $request->name;
            $owner->father_name = $request->father_name;
            $owner->address = $request->address;
            $owner->save();

            $khatian_owner = new LandKhatianOwner();
            $khatian_owner->land_khatian_id = $khatian->id;
            $khatian_owner->land_owner_id = $owner->id;
            $khatian_owner->land_class_id = $request->land_class_id;
            $khatian_owner->land_quantity = $request->quantity;
            $khatian_owner->comment = $request->comment;
            $khatian_owner->save();

            $project_owner = new ProjectLandOwner();
            $project_owner->project_id = $request->project_id;
            $project_owner->land_owner_id = $owner->id;
            $project_owner->save();


            DB::commit();
            $data['status'] = true;
            $data['message'] = "Record saved successfully!";
            return response()->json($data, 200);

        } catch (\Throwable $th) {
            DB::rollBack();
            $data['status'] = false;
            $data['message'] = "Failed to save the record!";
            $data['errors'] = $th;
            return response()->json($data, 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(LandOwner $landOwner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LandOwner $landOwner)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, LandOwner $landOwner)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LandOwner $landOwner)
    {
        //
    }
}
