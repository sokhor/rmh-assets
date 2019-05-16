<?php

namespace App\Http\Controllers;

use App\Rp;
use Illuminate\Http\Request;
use App\Http\Resources\RpResource;

class RpController extends Controller
{
    public function index() {
        $rps = Rp::when(request()->search, function($query) {
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

        return RpResource::collection($rps);
    }

    public function store(Request $request)
    {
        $requestData = $request->validate([
            'asset_code' => 'required',
            'os' => 'nullable',
            'building' => 'nullable',
            'campus' => 'nullable',
            'department' => 'nullable',
            'floor' => 'nullable',
            'location' => 'nullable',
            'serial_number' => 'nullable',
            'make' => 'nullable',
            'model' => 'nullable',
            'ram' => 'nullable',
            'notes' => 'nullable',
            'purchase_date' => 'nullable',
            'mac_address' => 'nullable',
            'replaced' => 'nullable',
        ]);

        $rp = Rp::create($requestData);

        return (new RpResource($rp))
            ->additional(['message' => 'Resource was created ']);
    }

    public function show(Rp $rp)
    {
        return new RpResource($rp);
    }

    public function update(Request $request, Rp $rp)
    {
        $rp->update($request->all());

        return (new RpResource($rp->fresh()))
            ->additional(['message' => 'Resource was updated']);
    }

    public function destroy(Rp $rp)
    {
        $rp->delete();

        return response()->json(['message' => 'Resource was deleted']);
    }
}
