<?php

namespace App\Http\Controllers;

use App\Rmh;
use Illuminate\Http\Request;
use App\Http\Resources\RmhResource;

class RmhController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rmhs = Rmh::when(request()->search, function($query) {
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

        return RmhResource::collection($rmhs);
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

        $rmh = Rmh::create($requestData);

        return (new RmhResource($rmh))
            ->additional(['message' => 'Resource was created ']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Rmh  $rmh
     * @return \Illuminate\Http\Response
     */
    public function show(Rmh $rmh)
    {
        return new RmhResource($rmh);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Rmh  $rmh
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rmh $rmh)
    {
        $rmh->update($request->all());

        return (new RmhResource($rmh->fresh()))
            ->additional(['message' => 'Resource was updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Rmh  $rmh
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rmh $rmh)
    {
        $rmh->delete();

        return response()->json(['message' => 'Resource was deleted']);
    }
}
