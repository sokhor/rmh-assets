<?php

namespace App\Http\Controllers;

use App\Mhpmobile;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\MhpmobilesImport;

class MhpmobileImportController extends Controller
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

        Excel::import(new MhpmobilesImport, $request->file('excelFile'));

        return response()->json(['message' => 'Successfully imported'], 201);
    }
}
