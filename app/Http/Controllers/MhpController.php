<?php

namespace App\Http\Controllers;

use App\Mhp;
use Illuminate\Http\Request;
use App\Http\Resources\MhpResource;

class MhpController extends Controller
{
    public function index() {
        $mhps = Mhp::when(request()->search, function($query) {
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

        return MhpResource::collection($mhps);
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

        $mhp = Mhp::create($requestData);

        return (new MhpResource($mhp))
            ->additional(['message' => 'Resource was created ']);
    }

    public function show(Mhp $mhp)
    {
        return new MhpResource($mhp);
    }

    public function update(Request $request, Mhp $mhp)
    {
        $mhp->update($request->all());

        return (new MhpResource($mhp->fresh()))
            ->additional(['message' => 'Resource was updated']);
    }

    public function destroy(Mhp $mhp)
    {
        $mhp->delete();

        return response()->json(['message' => 'Resource was deleted']);
    }
}
