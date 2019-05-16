<?php

namespace App\Http\Controllers;

use App\Mhp;
use Illuminate\Http\Request;
use App\Http\Resources\MhpResource;

class MhpRemovedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rmhs = Mhp::onlyTrashed()->when(request()->search, function($query) {
            $query
            ->orWhere('asset_code', 'LIKE', '%' . request()->search . '%')
            ->orWhere('os', 'LIKE', '%' . request()->search . '%')
            ->orWhere('services', 'LIKE', '%' . request()->search . '%')
            ->orWhere('campus', 'LIKE', '%' . request()->search . '%')
            ->orWhere('team', 'LIKE', '%' . request()->search . '%')
            ->orWhere('floor', 'LIKE', '%' . request()->search . '%')
            ->orWhere('location', 'LIKE', '%' . request()->search . '%')
            ->orWhere('serial_number', 'LIKE', '%' . request()->search . '%')
            ->orWhere('make', 'LIKE', '%' . request()->search . '%')
            ->orWhere('model', 'LIKE', '%' . request()->search . '%')
            ->orWhere('ram', 'LIKE', '%' . request()->search . '%')
            ->orWhere('notes', 'LIKE', '%' . request()->search . '%')
            ->orWhere('purchase_date', 'LIKE', '%' . request()->search . '%')
            ->orWhere('mac_address', 'LIKE', '%' . request()->search . '%')
            ->orWhere('printer_mapped', 'LIKE', '%' . request()->search . '%')
            ->orWhere('replaced', 'LIKE', '%' . request()->search . '%');

        })
        ->latest()
        ->paginate(request()->rowsPerPage);

        return MhpResource::collection($rmhs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Mhp  $mhp
     * @return \Illuminate\Http\Response
     */
    public function show(Mhp $mhp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Mhp  $mhp
     * @return \Illuminate\Http\Response
     */
    public function edit(Mhp $mhp)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Mhp  $mhp
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mhp $mhp)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Mhp  $mhp
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mhp $mhp)
    {
        //
    }
}
