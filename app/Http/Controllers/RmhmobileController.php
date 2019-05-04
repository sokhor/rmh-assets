<?php

namespace App\Http\Controllers;

use App\Rmhmobile;
use Illuminate\Http\Request;
use App\Http\Resources\RmhmobileResource;

class RmhmobileController extends Controller
{
    public function index()
    {
        $rmhmobiles = Rmhmobile::when(request()->search, function($query) {
            $query
            ->orWhere('asset_code', 'LIKE', '%' . request()->search . '%')
            ->orWhere('os', 'LIKE', '%' . request()->search . '%')
            ->orWhere('building', 'LIKE', '%' . request()->search . '%')
            ->orWhere('campus', 'LIKE', '%' . request()->search . '%')
            ->orWhere('department', 'LIKE', '%' . request()->search . '%')
            ->orWhere('floor', 'LIKE', '%' . request()->search . '%')
            ->orWhere('location', 'LIKE', '%' . request()->search . '%')
            ->orWhere('serial_number', 'LIKE', '%' . request()->search . '%')
            ->orWhere('make', 'LIKE', '%' . request()->search . '%')
            ->orWhere('model', 'LIKE', '%' . request()->search . '%')
            ->orWhere('ram', 'LIKE', '%' . request()->search . '%')
            ->orWhere('notes', 'LIKE', '%' . request()->search . '%')
            ->orWhere('purchase_date', 'LIKE', '%' . request()->search . '%')
            ->orWhere('mac_address', 'LIKE', '%' . request()->search . '%')
            ->orWhere('replaced', 'LIKE', '%' . request()->search . '%');
        })
        ->latest()
        ->paginate(request()->rowsPerPage);

        return RmhmobileResource::collection($rmhmobiles);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $requestData = $request->validate([
            'asset_code' => 'required',
            'os' => 'required',
            'building' => 'required',
            'campus' => 'required',
            'department' => 'required',
            'floor' => 'required',
            'location' => 'nullable',
            'serial_number' => 'required',
            'make' => 'required',
            'model' => 'required',
            'ram' => 'nullable',
            'notes' => 'nullable',
            'purchase_date' => 'nullable',
            'mac_address' => 'nullable',
            'replaced' => 'nullable',
        ]);

        $rmhmobile = Rmhmobile::create($requestData);

        return (new RmhmobileResource($rmhmobile))
            ->additional(['message' => 'Resource was created ']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Rmhmobile  $Rmhmobile
     * @return \Illuminate\Http\Response
     */
    public function show(Rmhmobile $rmhmobile)
    {
        return new RmhmobileResource($rmhmobile);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Rmhmobile  $Rmhmobile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rmhmobile $rmhmobile)
    {
        $rmhmobile->update($request->all());

        return (new RmhmobileResource($rmhmobile->fresh()))
            ->additional(['message' => 'Resource was updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Rmhmobile  $Rmhmobile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rmhmobile $rmhmobile)
    {
        $rmhmobile->delete();

        return response()->json(['message' => 'Resource was deleted']);
    }
}
