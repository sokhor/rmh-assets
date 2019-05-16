<?php

namespace App\Http\Controllers;

use App\Vidrl;
use Illuminate\Http\Request;
use App\Http\Resources\VidrlResource;

class VidrlRemovedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vidrl = Vidrl::onlyTrashed()->when(request()->search, function($query) {
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

        return VidrlResource::collection($vidrl);
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
     * @param  \App\Vidrl  $vidrl
     * @return \Illuminate\Http\Response
     */
    public function show(Vidrl $vidrl)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Vidrl  $vidrl
     * @return \Illuminate\Http\Response
     */
    public function edit(Vidrl $vidrl)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Vidrl  $vidrl
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vidrl $vidrl)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Vidrl  $vidrl
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vidrl $vidrl)
    {
        //
    }
}
