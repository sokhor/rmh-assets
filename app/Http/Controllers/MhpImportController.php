<?php

namespace App\Http\Controllers;

use App\Mhp;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\MhpsImport;

class MhpImportController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //return $request->file('excelFile')->getFilename();

        Excel::import(new MhpsImport, $request->file('excelFile'));

        return response()->json(['message' => 'Successfully imported'], 201);
    }
}
