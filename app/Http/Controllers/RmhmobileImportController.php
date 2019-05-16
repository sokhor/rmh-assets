<?php

namespace App\Http\Controllers;

use App\Rmhmobile;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\RmhmobilesImport;

class RmhmobileImportController extends Controller
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

        Excel::import(new RmhmobilesImport, $request->file('excelFile'));

        return response()->json(['message' => 'Successfully imported'], 201);
    }
}
