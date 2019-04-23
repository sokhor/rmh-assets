<?php

namespace App\Http\Controllers;

use App\Mhpmobile;
use Illuminate\Http\Request;
use App\Http\Resources\MhpmobileResource;

class MhpmobileController extends Controller
{
    public function index() {
        $mhpmobiles = Mhpmobile::when(request()->search, function($query) {
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

        return MhpmobileResource::collection($mhpmobiles);
    }

    public function store(Request $request)
    {
        $requestData = $request->validate([
            'asset_code' => 'required',
            'os' => 'required',
            'services' => 'nullable',
            'campus' => 'required',
            'team' => 'nullable',
            'floor' => 'required',
            'location' => 'nullable',
            'serial_number' => 'required',
            'make' => 'required',
            'model' => 'required',
            'ram' => 'nullable',
            'notes' => 'nullable',
            'purchase_date' => 'nullable',
            'mac_address' => 'nullable',
            'printer_mapped' => 'nullable',
            'replaced' => 'nullable'
        ]);

        $mhpmobile = Mhpmobile::create($requestData);

        return (new MhpmobileResource($mhpmobile))
            ->additional(['message' => 'Resource was created ']);
    }

    public function show(Mhpmobile $mhpmobile)
    {
        return new MhpmobileResource($mhpmobile);
    }

    public function update(Request $request, Mhpmobile $mhpmobile)
    {
        $mhpmobile->update($request->all());

        return (new MhpmobileResource($mhpmobile->fresh()))
            ->additional(['message' => 'Resource was updated']);
    }

    public function destroy(Mhpmobile $mhpmobile)
    {
        $mhpmobile->delete();

        return response()->json(['message' => 'Resource was deleted']);
    }
}
